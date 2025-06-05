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

<div class="bg-gray-100" >
  <span>

  </span>
  <div class="mt-0 flex flex-col items items-center justify-center">
    <h1 class="text-[28px] font-bold text-center mt-8">EXPLORA POR NOTAS</h1>
    <p class="text-center">Filtra por las notas olfativas que más te gustan</p>
    <img src="/storage/icons/drag-mouse.svg" alt="Mueve el ratón" class="w-12 h-12">
  </div>
  <div class="mt-5 p-5">
  @include('partials._carousel')
</div>
</div>

<a href="{{ url('perfumes/comparar/1,2') }}">
  Comparar perfums
</a>


</x-layout>