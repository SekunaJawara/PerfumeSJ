@props(['notas_principalesCsv'])

@php
    $notas_principales = explode(',', $notas_principalesCsv)
@endphp
<ul class="flex">
    @foreach($notas_principales as $nota_principal)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/?nota={{$nota_principal}}">{{$nota_principal}}</a>
    </li>
    @endforeach
</ul>