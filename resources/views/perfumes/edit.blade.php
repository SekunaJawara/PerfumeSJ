<x-layout>
    <x-card class="!p-10  max-w-lg mx-auto mt-24">
    
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edita este perfume
            </h2>
            <p class="mb-4">Edita {{$perfume->Name}} si lo ves necesario</p>
        </header>
    
        <form method="POST" action="/perfumes/{{$perfume->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="Brand"
                    class="inline-block text-lg mb-2"
                    >Marca</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="Brand"
                    placeholder="Example: Dior"
                    value="{{$perfume->Brand}}"
                />
    
                @error('Brand')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="Name" class="inline-block text-lg mb-2"
                    >Nombre del perfume</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="Name"
                    placeholder="Example: Dior Sauvage"
                    value="{{$perfume->Name}}"
                />
                @error('Name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
    
    
            <div class="mb-6">
                <label
                    for="price"
                    class="inline-block text-lg mb-2"
                >
                    Precio
                </label>
                <input
                    type="number"
                    min="0"
                    step="0.1"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="price"
                    value="{{$perfume->price}}"
                />
                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="notas_principales" class="inline-block text-lg mb-2">
                    Notas Principales
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="notas_principales"
                    placeholder="Example: Bergamota, Pimienta, Lavanda, etc"
                    value="{{$perfume->notas_principales}}"
                />
                @error('notas_principales')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Imagen
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />
                <img class="w-48 mr-6 mb-6" 
                src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
                alt="imagen del perfume" />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label
                    for="Description"
                    class="inline-block text-lg mb-2"
                >
                    Descripcion
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="Description"
                    rows="10"
                    placeholder="Exemple:Una fragancia fresca y audaz, con notas etc"
                >{{$perfume->Description}}</textarea>
                @error('Description')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Edita
                </button>
    
                <a href="/" class="text-black ml-4"> Atras </a>
            </div>
        </form>
    </div>
    </x-card>
    </x-layout>