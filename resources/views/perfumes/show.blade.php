<x-layout>
@include('partials._search')

<a href="index.html" class="inline-block text-black ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="!p-10">
        <div class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6" 
            src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
            alt="imagen del perfume" />
            <h3 class="text-2xl mb-2">{{ $perfume->Name }}</h3>
            <div class="text-xl font-bold mb-4">{{ $perfume->Brand }}</div>
            <x-notas-principales :notas_principalesCsv="$perfume->notas_principales"/>
            <div class="text-lg my-4">
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">Descripción del perfume</h3>
                <div class="text-lg space-y-6">
                    <p>{{ $perfume->Description }}</p>
                    <a href="mailto:test@test.com" class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-euro-sign"></i> {{ $perfume->price }}
                    </a>
                    <a href="https://test.com" target="_blank" class="block bg-black text-white py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i> Visit Website
                    </a>
                </div>
            </div>
        </div>
    </x-card>
    
</x-layout>