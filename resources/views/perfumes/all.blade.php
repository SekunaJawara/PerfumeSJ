<x-layout>
    <div>
        <h1 class="text-[28px] font-bold text-center mt-8">Todos los perfumes</h1>
        <p class="text-center">Explora nuestra colección completa</p>
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