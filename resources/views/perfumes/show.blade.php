<x-layout>


  <div class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-wrap -mx-4">
        <!-- Product Images -->
        <div class="w-full md:w-1/2 px-4 mb-8">

          <img src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
            class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
          <div class="flex gap-4 py-4 justify-center overflow-x-auto">
            <img src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
              alt="Thumbnail 1"
              class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
              onclick="changeImage(this.src)">
            <img src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
              alt="Thumbnail 2"
              class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
              onclick="changeImage(this.src)">
            <img src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
              alt="Thumbnail 3"
              class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
              onclick="changeImage(this.src)">
            <img src="{{$perfume->logo ? asset('storage/' . $perfume->logo) : asset('images/heroimg.png')}}"
              alt="Thumbnail 4"
              class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
              onclick="changeImage(this.src)">
          </div>
        </div>

        <!-- Product Details -->
        <div class="w-full md:w-1/2 px-4">
          <h2 class="text-3xl font-bold mb-2">{{ $perfume->Name }}</h2>
          <p class="text-gray-600 mb-4">{{$perfume->Brand}}</p>
          <div class="mb-4">
            <span class="text-2xl font-bold mr-2">{{$perfume->price}}€</span>
            <span class="text-gray-500 line-through">$399.99</span>
          </div>

          <p class="text-gray-700 mb-6">{{$perfume->Description}}.</p>



          <div class="flex space-x-4 mb-6">
            <button
              class="bg-indigo-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
              </svg>
              Add to Cart
            </button>
            <button
              class="bg-gray-200 flex gap-2 items-center  text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
              </svg>
              Wishlist
            </button>
          </div>

          <div class="mt-6">
            <div class="border-t border-gray-200">
              <!-- Rendimiento -->
              <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open"
                  class="w-full py-4 flex justify-between items-center text-left hover:bg-gray-50 transition-colors">
                  <h3 class="text-base font-normal text-gray-900">RENDIMIENTO</h3>
                  <svg :class="{'rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-collapse class="pb-4 text-gray-700">
                  <div class="space-y-2">
                    <p><strong>Longevidad:</strong> {{ $perfume->longevidad ?? 'No especificada' }}</p>
                    <p><strong>Sillage:</strong> {{ $perfume->sillage ?? 'No especificado' }}</p>
                  </div>
                </div>
              </div>

              <!-- Género -->
              <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open"
                  class="w-full py-4 flex justify-between items-center text-left hover:bg-gray-50 transition-colors">
                  <h3 class="text-base font-normal text-gray-900">GÉNERO</h3>
                  <svg :class="{'rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-collapse class="pb-4 text-gray-700">
                  <p class="capitalize">{{ $perfume->genero ?? 'No especificado' }}</p>
                </div>
              </div>

              <!-- Recomendación de Uso -->
              <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open"
                  class="w-full py-4 flex justify-between items-center text-left hover:bg-gray-50 transition-colors">
                  <h3 class="text-base font-normal text-gray-900">RECOMENDACIÓN DE USO</h3>
                  <svg :class="{'rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-collapse class="pb-4">
                  <div class="space-y-3">
                    <div class="flex items-center justify-between">
                      <span class="text-gray-700">Primavera</span>
                      <div class="flex items-center gap-2">
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                          <div class="bg-blue-600 h-2 rounded-full"
                            style="width: {{ $perfume->recomendacion_primavera ?? 50 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-10">{{ $perfume->recomendacion_primavera ?? 50 }}%</span>
                      </div>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-gray-700">Verano</span>
                      <div class="flex items-center gap-2">
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                          <div class="bg-yellow-500 h-2 rounded-full"
                            style="width: {{ $perfume->recomendacion_verano ?? 50 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-10">{{ $perfume->recomendacion_verano ?? 50 }}%</span>
                      </div>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-gray-700">Otoño</span>
                      <div class="flex items-center gap-2">
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                          <div class="bg-orange-500 h-2 rounded-full"
                            style="width: {{ $perfume->recomendacion_otono ?? 50 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-10">{{ $perfume->recomendacion_otono ?? 50 }}%</span>
                      </div>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-gray-700">Invierno</span>
                      <div class="flex items-center gap-2">
                        <div class="w-32 bg-gray-200 rounded-full h-2">
                          <div class="bg-indigo-600 h-2 rounded-full"
                            style="width: {{ $perfume->recomendacion_invierno ?? 50 }}%"></div>
                        </div>
                        <span class="text-sm text-gray-600 w-10">{{ $perfume->recomendacion_invierno ?? 50 }}%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Edad Recomendada -->
              <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open"
                  class="w-full py-4 flex justify-between items-center text-left hover:bg-gray-50 transition-colors">
                  <h3 class="text-base font-normal text-gray-900">EDAD RECOMENDADA</h3>
                  <svg :class="{'rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                  </svg>
                </button>
                <div x-show="open" x-collapse class="pb-4 text-gray-700">
                  <p>{{ $perfume->edad_recomendada ?? 'No especificada' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sección de Notas Olfativas -->
    <div class="container mx-auto px-4 py-12 bg-white">
      <div class="max-w-4xl mx-auto">
        <!-- Notas de Salida -->
        @if($perfume->notas_salida)
          <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Notas de Salida</h2>
            <div class="flex flex-wrap justify-center gap-4">
              @php
                $notasSalida = array_map('trim', explode(',', $perfume->notas_salida));
              @endphp
              @foreach($notasSalida as $nota)
                <div class="flex flex-col items-center">
                  <img
                    src="{{ file_exists(public_path('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg')) ? asset('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg') : asset('images/heroimg.png') }}"
                    alt="{{ $nota }}" class="w-[7.25rem] h-[7.25rem] object-cover rounded-lg mb-2" >
                  <span class="text-xs text-gray-600 text-center font-light">{{ $nota }}</span>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Notas de Corazón -->
        @if($perfume->notas_corazon)
          <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Corazón</h2>
            <div class="flex flex-wrap justify-center gap-4">
              @php
                $notasCorazon = array_map('trim', explode(',', $perfume->notas_corazon));
              @endphp
              @foreach($notasCorazon as $nota)
                <div class="flex flex-col items-center">
                  <img
                    src="{{ file_exists(public_path('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg')) ? asset('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg') : asset('images/heroimg.png') }}"
                    alt="{{ $nota }}" class="w-[7.25rem] h-[7.25rem] object-cover rounded-lg mb-2">
                  <span class="text-xs text-gray-600 text-center font-light">{{ $nota }}</span>
                </div>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Notas de Base -->
        @if($perfume->notas_base)
          <div class="mb-8">
            <h2 class="text-xl font-bold text-center mb-4">Base</h2>
            <div class="flex flex-wrap justify-center gap-4">
              @php
                $notasBase = array_map('trim', explode(',', $perfume->notas_base));
              @endphp
              @foreach($notasBase as $nota)
                <div class="flex flex-col items-center">
                  <img
                    src="{{ file_exists(public_path('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg')) ? asset('storage/notas/' . strtolower(str_replace(' ', '_', $nota)) . '.jpg') : asset('images/heroimg.png') }}"
                    alt="{{ $nota }}" class="w-[7.25rem] h-[7.25rem] object-cover rounded-lg mb-2">
                  <span class="text-xs text-gray-600 text-center font-light">{{ $nota }}</span>
                </div>
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>

    <!-- Sección de Perfumes Similares -->
    <div class="container mx-auto px-4 py-12 bg-gray-50">
      <h2 class="text-2xl font-bold text-center mb-8">Esta Fragancia me recuerda a:</h2>
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          @php
            // Obtener perfumes similares (excluyendo el actual)
            $similares = \App\Models\Perfume::where('id', '!=', $perfume->id)
              ->take(4)
              ->get();
          @endphp

          @foreach($similares as $similar)
            <a href="{{ route('perfumes.show', $similar->id) }}" class="group">
              <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                <div class="bg-gray-100 h-48 flex items-center justify-center p-4">
                  <img src="{{ $similar->logo ? asset('storage/' . $similar->logo) : asset('images/heroimg.png') }}"
                    alt="{{ $similar->Name }}"
                    class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-4 text-center">
                  <h3 class="font-semibold text-gray-900 mb-1">{{ $similar->Name }}</h3>
                  <p class="text-sm text-gray-600">{{ $similar->Brand }}</p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>




    <script>
      function changeImage(src) {
        document.getElementById('mainImage').src = src;
      }
    </script>
  </div>

</x-layout>