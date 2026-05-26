<x-layout>
    <div>
        @if(request('search'))
            <h1 class="text-[28px] font-bold text-center mt-8">Todos los perfumes</h1>
            <p class="text-center">Resultados para la búsqueda: <span class="font-bold text-gray-900">"{{ request('search') }}"</span></p>
        @elseif(request('nota'))
            <h1 class="text-[28px] font-bold text-center mt-8">Todos los perfumes</h1>
            <p class="text-center">Mostrando perfumes con la nota: <span class="font-bold text-gray-900">{{ request('nota') }}</span>
        @else
            <h1 class="text-[28px] font-bold text-center mt-8">Todos los perfumes</h1>
            <p class="text-center">Explora nuestra colección completa</p>
        @endif
        
    </div>

    <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 mt-8">
        @if (count($perfumes)==0)
            <p>No hay perfumes</p>
        @endif
        @foreach ($perfumes as $perfume)
            <x-perfume-card :perfume="$perfume"/>
        @endforeach
    </div>
</x-layout>