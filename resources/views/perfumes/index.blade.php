<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@if (count($perfumes)==0)
<p>No hay perfumes</p>
@endif
    @foreach ($perfumes as $perfume)
        <x-perfume-card :perfume="$perfume"/>
    @endforeach


</div>

<div class="mt-6 p-4">
    {{$perfumes->links()}}
</div>
</x-layout>