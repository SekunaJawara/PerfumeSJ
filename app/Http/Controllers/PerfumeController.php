<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class PerfumeController extends Controller
{
    //Muestra todos los perfumes
    public function index(){
        return view('perfumes.index',[
            'perfumes' => Perfume::latest()->filter(request(['nota','search']))->simplePaginate(6)
            ]
        );
    }

    //Muestra un perfume 
    public function show(Perfume $perfume){      
        return view('perfumes.show',[
            'perfume' =>$perfume]
        );
    }

    //Mostrar el formulario de creacion
    public function create(){
        return view('perfumes.create');
    }



    //Almacenar datos de un perfume
    public function store(Request $request){
        //dd(Auth::id());
        // $user = Auth::User()->getAttributes();
        // dd($user);
        $formFields = $request->validate([
            'Name'=>['required', Rule::unique('perfumes','Name')],
            'Brand'=>'required',
            'Description'=>'required',
            'price'=>'required',
            'notas_principales'=>'required'
        ]);
        $formFields['user_id'] = Auth::id();

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }

        Perfume::create($formFields);

        return redirect('/')->with('message','Perfume subido');
    }

    //Almacenar datos de un perfume
    public function update(Request $request, Perfume $perfume){
        //Aseguramos que el usuario es el dueño del perfume
        if($perfume->user_id != auth()->id()){
            abort(403,'Acción desautorizada');
        }

        
        $formFields = $request->validate([
            'Name'=>['required'],
            'Brand'=>'required',
            'Description'=>'required',
            'price'=>'required',
            'notas_principales'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');
        }

        $perfume->update($formFields);

        return redirect()->route('perfumes.show',$perfume)->with('message','Perfume actualizado');
    }

    //Mostrar el formulario de edición
    public function edit(Perfume $perfume){
        return view('perfumes.edit',['perfume' => $perfume]);
    }

    //Borrar perfume
    public function destroy(Perfume $perfume){
        //Aseguramos que el usuario es el dueño del perfume
        if($perfume->user_id != auth()->id()){
            abort(403,'Acción desautorizada');
        }
        $perfume->delete();
        return redirect('/')->with('message','Perfume borrado correctamente');
    }

    public function manage(){
        return view('perfumes.manage', ['perfumes' => auth()->user()->perfumes()->get()]);
    }

    public function comparar($ids)
    {
        $idArray = explode(',', $ids);
        $perfumes = Perfume::whereIn('id', $idArray)->get();

        return view('perfumes.comparator', ['perfumes' => $perfumes]);
    }



}
