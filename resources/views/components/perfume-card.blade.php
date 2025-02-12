@props(['perfume'])



<x-card>
    <div class="flex">

        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
            alt=""
        />
        
        <div>
            <h3 class="text-2xl">
                <a href="/perfumes/{{$perfume->id}}">{{$perfume->Name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$perfume->Description}}</div>
            <x-notas-principales :notas_principalesCsv="$perfume->notas_principales"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-house"></i> {{$perfume->Brand}}
            </div>
        </div>
    </div>
</x-card>