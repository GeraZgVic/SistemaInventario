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
                        <a href="#"
                            class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md text-center">Iniciar
                            Sesión</a>
                        <a href="#"
                            class="font-semibold px-3 py-2 hover:bg-black text-gray-800 hover:text-white rounded-md text-center">Registrarse</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="flex items-center justify-center py-10 text-white bg-white sm:py-16 md:py-24 lg:py-32">
            <div class="relative max-w-3xl px-10 text-center text-white auto lg:px-0">
                <div class="flex flex-col w-full md:flex-row">
        
                    <!-- Top Text -->
                    <div class="flex md:justify-between justify-center">
                        <h1 class="relative flex flex-col text-4xl md:text-6xl font-extrabold text-center md:text-left text-black">
                           ArSite
                            <span>Sistema de</span>
                            <span>Inventario</span>
                        </h1>
                    </div>
                    <!-- Right Image -->
                    <div class="relative top-0 right-0 h-64 mt-12 md:-mt-16 md:absolute md:h-96">
                        <img src="https://cdn.devdojo.com/images/december2020/designs3d.png" class="object-cover mt-3 mr-5 h-80 lg:h-96">
                    </div>
                </div>
        
                <!-- Separator -->
                <div class="my-16 border-b border-gray-300 lg:my-24"></div>
        
                <!-- Bottom Text -->
                <h2 class="text-left text-gray-500 xl:text-xl">
                    ¡Bienvenido a nuestro avanzado sistema de gestión de inventario de Arsite Integradores! Sumérgete en una experiencia única diseñada para simplificar la gestión de tu inventario de networking. Descubre cómo nuestra plataforma puede optimizar tus operaciones, brindándote las herramientas necesarias para potenciar tus conexiones y llevar tu negocio al siguiente nivel.
                </h2>
            </div>
        </section>
        
    </main>
    @livewireScripts

</body>

</html>
