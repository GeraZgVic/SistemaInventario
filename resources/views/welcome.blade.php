<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased ">

    <header class="z-30 w-full px-2 py-4 bg-white sm:px-4">
        <div class="flex items-center justify-between mx-auto max-w-7xl">
            <a href="/" title="ArSite Inicio" class="font-bold text-xl lg:text-2xl 2xl:text-3xl">
               <img class="w-full h-16 object-cover"
                    src="{{asset('img/logo-arsite.png')}}" 
                    alt="Logo Arsite">
            </a>
            <div class="flex items-center space-x-1">
                <div class="hidden space-x-1 md:inline-flex md:gap-x-4">
                    <a href="{{route('login')}}"
                        class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md">Iniciar
                        Sesión</a>
                    {{-- <a href="{{route('register')}}"
                        class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md">Registrarse</a> --}}
                </div>
                <div class="inline-flex md:hidden" x-data="{ open: false }">
                    <button class="flex-none px-2 btn-sm" @click="open = true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                            class="w-5 h-5">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>

                    </button>
                    <div class="absolute top-0 left-0 right-0 z-50 flex flex-col p-2 pb-4 m-2 space-y-3 bg-white rounded shadow"
                        x-show.transition="open" @click.away="open = false" x-cloak>
                        <button class="self-end flex-none px-2 ml-2 btn-icon" @click="open = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" aria-hidden="true">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                            <span class="sr-only">Close Menu</span>
                        </button>
                        <a href="{{route('login')}}"
                            class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md text-center">Iniciar
                            Sesión</a>
                        {{-- <a href="#"
                            class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md text-center">Registrarse</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="flex flex-col items-center justify-center py-10 text-gray-600 sm:py-16 md:py-24 lg:py-32">
            <div class="container mx-auto px-6 lg:px-8 text-center">
                <!-- Header Text and Image Section -->
                <div class="flex flex-col md:flex-row items-center md:justify-between">
                    <!-- Text Section -->
                    <div class="mb-8 md:mb-0 md:w-1/2">
                        <h1 class="text-7xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
                            <span class="block">ArSite</span>
                            <span class="block text-3xl md:text-4xl">Sistema de Inventario</span>
                        </h1>
                    </div>
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2 flex justify-center">
                        <img src="{{asset('img/welcome.svg')}}" alt="Imagen" class="object-cover max-w-full h-auto">
                    </div>
                </div>
    
                <!-- Separator -->
                <div class="my-12 border-b border-gray-700 lg:my-16"></div>
    
                <!-- Bottom Text -->
                <div class="text-gray-600 text-base md:text-lg lg:text-xl">
                    <p>
                        ¡Bienvenido a nuestro avanzado sistema de gestión de inventario de Arsite Integradores! Sumérgete en una experiencia única diseñada para simplificar la gestión de tu inventario de networking. Descubre cómo nuestra plataforma puede optimizar tus operaciones, brindándote las herramientas necesarias para potenciar tus conexiones y llevar tu negocio al siguiente nivel.
                    </p>
                </div>
            </div>
        </section>
    </main>
    
    @livewireScripts

</body>

</html>
