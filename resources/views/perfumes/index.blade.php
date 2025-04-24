<x-layout>
@include('partials._hero')
{{--@include('partials._search')--}}


<div>
    <h1 class="text-[28px] font-bold text-center mt-8">Últimos perfumes</h1>
    <p class="text-center">Los perfumes más recientes en nuestra tienda</p>
</div>

<div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 mt-8">
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
@include('partials._carousel')

</x-layout>