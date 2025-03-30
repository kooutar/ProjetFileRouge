
@extends('layout.main')
@section('title', 'About Us')
@section('content')



<section class="relative h-[600px] overflow-hidden">
    <!-- Image d'arrière-plan -->
    <img src="{{ asset('images/images.3jpeg.avif') }}" alt="Background" class="absolute top-0 left-0 w-full h-full object-cover z-0">
    
    <!-- Contenu hero avec positionnement spécifique -->
    <div class="container mx-auto px-4 relative z-10 flex flex-col justify-end h-full pb-4">
        <div class="flex items-end">
            <h1 class="text-5xl md:text-6xl font-bold">
                <span class="text-white">Who We</span>
            </h1>
        </div>
    </div>
</section>
<!-- Section "Are?" positionnée hors de l'image -->
<div class="container mx-auto px-4 mb-16">
    <h1 class="text-5xl md:text-6xl font-bold text-custompurple">Are?</h1>
</div>
<!-- Section Marketing d'Influence -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <img src="{{ asset('images/images.4jpeg.avif') }}" alt="Équipe d'influenceurs" class="rounded-lg shadow-md">
                <div class="mt-4 bg-white rounded-full px-4 py-2 inline-block shadow">
                    <span class="text-purple-600 font-bold">27M+</span>
                    <span class="text-gray-600 text-sm">TOTAL ABONNÉS</span>
                </div>
            </div>
            
            <div class="w-full md:w-1/2">
                <div class="text-sm font-medium text-purple-600 mb-2">POURQUOI NOUS?</div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">
                    Get ahead of the game with influencer marketing
                </h2>
                <p class="text-gray-600 mb-8">
                    Boostez votre engagement grâce à notre réseau privilégié d'influenceurs. Mazima tempora consequi vendiamur in porem sectus.officina teer. Tempora ridiculisa vel part futura impreratve.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="bg-purple-500 rounded-full p-1 mr-3 mt-1">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Campagnes sur-mesure</h3>
                            <p class="text-gray-600 text-sm">Adaptées à vos objectifs</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-purple-500 rounded-full p-1 mr-3 mt-1">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Micro-influenceurs ciblés</h3>
                            <p class="text-gray-600 text-sm">Pour un engagement optimal</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-purple-500 rounded-full p-1 mr-3 mt-1">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Analytics en temps réel</h3>
                            <p class="text-gray-600 text-sm">Suivez vos performances</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="bg-purple-500 rounded-full p-1 mr-3 mt-1">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Marketing viral</h3>
                            <p class="text-gray-600 text-sm">Pour maximiser l'impact</p>
                        </div>
                    </div>
                </div>
                
                <button class="mt-8 bg-purple-600 hover:bg-purple-700 text-white font-medium py-2 px-6 rounded-full transition duration-300">
                    À propos de nous
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Section "Our Influencer" -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-indigo-300 mb-12">Our Influncer</h2>
        
        <!-- Grille d'influenceurs - à développer selon besoins -->
        <!-- Services Grid -->
      <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Content Ideas -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9 3v2H6v14h12V5h-3V3h5v18H4V3h5z"/>
              <path d="M11 3h2v8h-2z"/>
              <path d="M13.8 9l-2.9 3-1.8-1.5L7.5 12l3.4 3 4.1-4.5z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Content Ideas</h3>
          <p class="text-gray-600">
            In pharetra ultrices mus eros senectus non laoreet metus. Feugiat senectus consequat sit malesuada integer turpis.
          </p>
        </div>
  
        <!-- Marketing Ads -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.6 2.7c-.3-.2-.7-.2-1 0L16 5.9V4c0-.6-.4-1-1-1H3C2.4 3 2 3.4 2 4v12c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-1.9l4.6 3.2c.2.1.4.2.6.2.2 0 .3 0 .5-.1.3-.2.5-.5.5-.9V3.6c0-.4-.2-.7-.6-.9zM14 15H4V5h10v10zm6-1.9l-4-2.8V9.7l4-2.8v6.2z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Marketing Ads</h3>
          <p class="text-gray-600">
            In pharetra ultrices mus eros senectus non laoreet metus. Feugiat senectus consequat sit malesuada integer turpis.
          </p>
        </div>
  
        <!-- Media Analytic -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M5 19h14V5H5v14zm2-2V9h2v8H7zm4 0v-5h2v5h-2zm4 0v-3h2v3h-2z"/>
              <path fill="none" d="M0 0h24v24H0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Media Analytic</h3>
          <p class="text-gray-600">
            In pharetra ultrices mus eros senectus non laoreet metus. Feugiat senectus consequat sit malesuada integer turpis.
          </p>
        </div>
  
        <!-- Product Branding -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Product Branding</h3>
          <p class="text-gray-600">
            In pharetra ultrices mus eros senectus non laoreet metus. Feugiat senectus consequat sit malesuada integer turpis.
          </p>
        </div>
      </div>
    </div>
</section>

@endSection
