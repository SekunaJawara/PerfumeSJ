@props(['perfume'])



<div class="bg-gray-50 border border-gray-200 rounded p-4">
    <div class="flex flex-col items-center">

        <!-- Imagen ajustada al ancho completo -->
        <div class="w-full h-[22rem] flex justify-center">
            <img class="w-full h- [17rem] object-cover rounded-md"
                src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
                alt="Imagen del perfume" />
        </div>

        <!-- Bloque de textos debajo -->
        <div class="text-left w-full mt-4">
            <p class="text-xl font-bold">
                <a href="/perfumes/{{$perfume->id}}">{{$perfume->Name}}</a>
            </p>
            <div class="text-lg mt-2">
                <i class="fa-solid fa-house"></i> {{$perfume->Brand}}
            </div>
        </div>



    </div>
</div>