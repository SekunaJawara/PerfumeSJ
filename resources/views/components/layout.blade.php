<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
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

    <body class="flex flex-col min-h-screen">
        <nav class="grid grid-cols-3 items-center w-full px-4">
            <!-- Columna izquierda (vacía para permitir el centrado) -->
            <div></div>
        
            <!-- Imagen centrada automáticamente -->
            <div class="flex justify-center">
                <a href="/">
                    <img class="w-[20vw] sm:w-[20vw] md:w-[8.8vw]" src="{{ asset('images/logo_nebula.png') }}" alt="Logo" />
                </a>
            </div>
        
            <!-- Columna derecha (búsqueda y login alineados a la derecha) -->
            <div class="flex items-center space-x-4 justify-end">
                <form action="/" method="GET" class="flex items-center border border-gray-300 rounded-lg px-2 py-1 w-40 sm:w-56 md:w-64">
                    <button type="submit" class="text-gray-500 hover:text-gray-700">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    <input 
                        type="text" 
                        name="search" 
                        minlength="1"
                        placeholder="Buscar..." 
                        class="w-full bg-transparent focus:outline-none text-sm px-2"
                    />
                </form>
            
                <a href="/login" class="hover:text-laravel">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </nav>
        
        

        <nav class="bg-white dark:bg-white  w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto mb-3">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-white md:space-x-8 md:gap-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-white md:dark:bg-white dark:border-gray-700">
                    <li>
                    <a href="#" class="block py-2 px-3 text-black bg-blue-700 rounded-sm md:bg-transparent md:text-black md:p-0 md:dark:text-black" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded-sm hover:bg-white md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded-sm hover:bg-white md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded-sm hover:bg-white md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-black dark:hover:bg-gray-700 dark:hover:text-black md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>                
            </ul>
            </div>
            </div>
        </nav>
  
        
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
        <x-flash-message/>
    </body>
</html>