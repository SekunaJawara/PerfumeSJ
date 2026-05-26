<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Perfumes SJ | Perfumes Sekuna Jawara</title>
</head>

<body class="font-sans flex flex-col min-h-screen bg-gradient-to-b from-gray-50 to-white">
    <!-- Premium Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-gray-100">
        <!-- Top Bar -->
        <div class="border-b border-gray-100">
            <div class="w-full px-0 py-4">
                <div class="grid grid-cols-3 items-center gap-4 px-12">


                    <!-- Left: Search Bar -->
                    <div class="flex items-center justify-start">
                        <form action="{{ route('perfumes.all') }}" method="GET" class="w-full max-w-md">
                            <div class="relative">
                                <input type="text" name="search" placeholder="Buscar fragancias..." class=" pl-12 pr-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-full 
                                           focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white 
                                           transition-all duration-300 placeholder-gray-400" />
                                <button type="submit"
                                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                    <i class="fa-solid fa-search text-base"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Center: Logo -->
                    <div class="flex items-center justify-center">
                        <a href="/" class="group">
                            <img class="h-12 md:h-14 w- transition-all duration-300 group-hover:scale-105"
                                src="{{ asset('images/logo_nebula.png') }}" alt="Perfumes SJ Logo" />
                        </a>
                    </div>


                    <!-- Right: Account Icon -->
                    <div class="flex items-center justify-end ml-20 gap-12">

                          
                        @auth
                        {{--
                        <div class="ml-10">
                            <div x-data="{open:false}" class="relative inline-block">
                            <button @click="open = !open">
                                <i class="fa-solid fa-user text-gray-600 group-hover:text-gray-900 text-sm"></i>
                                </button>
                            <div
                                x-show="open"
                                @click.outside="open = false"
                                class="absolute mt-2 left-1/2 -translate-x-1/2"
                                
                            >
                                    @include('components.account')
                                </div>
                            </div>
                        </div>
                             --}}

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button class="text-black hover:text-red-700 transition-colors">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </button>
                        </form>

                        <a href="/cart"
                                class="flex items-center justify-center w-11 h-11 ">
                                <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        @endauth
                        @guest
                        <a href="/login"
                                class="flex items-center justify-center w-11 h-11 rounded-full bg-gray-100 hover:bg-gray-200 transition-all duration-300 group">
                                <i class="fa-solid fa-user  text-gray-600 group-hover:text-gray-900 text-sm"></i>
                        </a>
                        @endguest
                    </div> 
                    </div>
                </div>
            </div>

        <!-- Bottom Bar - Main Navigation -->
        <div class="bg-gradient-to-r from-gray-50 via-white to-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <nav class="flex items-center justify-center space-x-12 py-3">
                    <!-- Main Navigation Links -->
                    <a href="/"
                        class="relative text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors duration-300 tracking-wide uppercase group">
                        <span>Inicio</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('perfumes.all') }}"
                        class="relative text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors duration-300 tracking-wide uppercase group">
                        <span>Colección</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#"
                        class="relative text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors duration-300 tracking-wide uppercase group">
                        <span>Nosotros</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <!-- Divider -->
                    <span class="hidden lg:block w-px h-4 bg-gray-300"></span>

                    <!-- Category Links -->
                    <a href="#"
                        class="hidden lg:block relative text-xs font-semibold text-gray-600 hover:text-gray-900 transition-colors duration-300 tracking-widest uppercase group">
                        <span>Florales</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#"
                        class="hidden lg:block relative text-xs font-semibold text-gray-600 hover:text-gray-900 transition-colors duration-300 tracking-widest uppercase group">
                        <span>Amaderadas</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#"
                        class="hidden lg:block relative text-xs font-semibold text-gray-600 hover:text-gray-900 transition-colors duration-300 tracking-widest uppercase group">
                        <span>Cítricas</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#"
                        class="hidden lg:block relative text-xs font-semibold text-gray-600 hover:text-gray-900 transition-colors duration-300 tracking-widest uppercase group">
                        <span>Orientales</span>
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </nav>
            </div>
        </div>
    </header>


    <main class="flex-grow">
        {{ $slot }}
    </main>
    <footer class="flex flex-col space-y-10 justify-center m-10">

        <nav class="flex justify-center flex-wrap gap-6 text-gray-500 font-medium">
            <a class="hover:text-gray-900" href="#">Home</a>
            <a class="hover:text-gray-900" href="#">About</a>
            <a class="hover:text-gray-900" href="#">Services</a>
            <a class="hover:text-gray-900" href="#">Media</a>
            <a class="hover:text-gray-900" href="#">Gallery</a>
            <a class="hover:text-gray-900" href="#">Contact</a>
        </nav>

        <div class="flex justify-center space-x-5">
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/facebook-new.png" />
            </a>
            <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/linkedin-2.png" />
            </a>
            <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/instagram-new.png" />
            </a>
            <a href="https://messenger.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/facebook-messenger--v2.png" />
            </a>
            <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
                <img src="https://img.icons8.com/fluent/30/000000/twitter.png" />
            </a>
        </div>
        <p class="text-center text-gray-700 font-medium">&copy; 2022 Company Ltd. All rights reservered.</p>
    </footer>
    <x-flash-message />
</body>

</html>