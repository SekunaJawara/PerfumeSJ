<x-layout>
  @include('partials._hero')
  {{--@include('partials._search')--}}


  <div>
    <h1 class="text-[28px] font-bold text-center mt-8">Últimos perfumes</h1>
    <p class="text-center">Los perfumes más recientes en nuestra tienda</p>
  </div>

  <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 mt-8">
    @if (count($perfumes) == 0)
      <p>No hay perfumes</p>
    @endif
    @foreach ($perfumes as $perfume)
      <x-perfume-card :perfume="$perfume" />
    @endforeach


  </div>
  <div class="flex justify-center mt-8 mb-8">
    <a href="{{ route('perfumes.all') }}"
      class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
      Ver todos
    </a>
  </div>

  <div class="bg-gray-100">
    <span>

    </span>
    <section class="w-full mx-auto py-10 bg-gray-100">


      <div class="w-full h-full flex flex-col items-center md:py-4 py-10">
        <!-- Col - 2 -->
        <div
          class="w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">
          <!--  -->
          <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="/storage/banners/banner2.jpg"
            alt="billboard image" />

          <div class="md:w-[50%] w-full bg-gray-100 md:p-4 p-0 rounded-md">
            <h2 class="text-3xl font-semibold text-gray-900">Lorem ipsum dolor sit amet consectetur</h2>
            <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda
              nam
              veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione
              eligendi
              sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus
              fuga
              nobis tempora possimus ullam! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat
              assumenda nam veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum
              ratione eligendi sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi
              sed repellat natus fuga nobis tempora possimus ullam!

              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam veritatis, magni
              doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi sed
              necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
              nobis tempora possimus ullam!

            </p>
          </div>

        </div>
        <!-- Col - 3 -->
        <div
          class="w-[90%] mx-auto flex md:flex-row flex-col flex-col-reverse lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-6">
          <!--  -->
          <div class="md:w-[50%] w-full bg-gray-100 md:p-4 p-0 rounded-md">
            <h2 class="text-3xl font-semibold text-gray-900">Lorem ipsum dolor sit amet consectetur</h2>

            <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda
              nam
              veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione
              eligendi
              sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus
              fuga
              nobis tempora possimus ullam! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat
              assumenda nam veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum
              ratione eligendi sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi
              sed repellat natus fuga nobis tempora possimus ullam!

              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam veritatis, magni
              doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi sed
              necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
              nobis tempora possimus ullam!

            </p>
          </div>
          <!--  -->
          <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="/storage/banners/banner3.jpg"
            alt="billboard image" />

        </div>
      </div>
    </section>

    <div class="mt-0 flex flex-col items items-center justify-center ">
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