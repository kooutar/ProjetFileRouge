@extends('layout.main')
@section('title', 'Accueil')
@section('content')
<section class="bg-white py-12 md:py-20 overflow-hidden relative p-2">
    <div class="container mx-auto px-4">
        <div class="flex flex-col-reverse md:flex-row items-center">
            <!-- Left Side Content -->
            <div class="md:w-1/2 mt-8 md:mt-0 px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">Apprenez à votre rythme, où que vous soyez.</h1>
                <p class="mt-4 text-gray-600 md:pr-12">Découvrez des cours interactifs, conçus par des experts, pour développer vos compétences et atteindre vos objectifs. Rejoignez notre communauté d’apprenants dès aujourd’hui !</p>
                <button class="mt-6 bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-8 rounded-full transition duration-300">
                   Savoir plus
                </button>
            </div>
            
            <!-- Right Side Images -->
            <div class="md:w-1/2 relative">
                <div class="grid grid-cols-2 gap-4 relative">
                    <!-- Image 1 -->
                    <div class="bg-teal-400 rounded-lg overflow-hidden relative">
                        <img src="{{ asset('images/images.jpeg') }}" alt="Influencer" class="w-full h-48 object-cover">
                        <div class="absolute top-0 left-0 p-2">
                            <div class="flex items-center">
                                <div class="bg-teal-400 h-3 w-3"></div>
                                <div class="bg-teal-400 h-3 w-3 ml-1"></div>
                                <div class="bg-teal-400 h-3 w-3 ml-1"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image 2 -->
                    <div class="bg-purple-100 rounded-lg overflow-hidden relative">
                        <img src="{{ asset('images/images.1jpeg.avif') }}"alt="Influencer" class="w-full h-48 object-cover">
                        <div class="absolute bottom-2 right-2 bg-white py-1 px-3 rounded-full flex items-center">
                            <span class="text-xs font-medium text-purple-600">ATX44</span>
                            <span class="text-xs text-gray-500 ml-1">Popular Influencer</span>
                        </div>
                    </div>
                    
                    <!-- Image 3 -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden relative">
                        <img src="{{ asset('images/images.2jpeg.avif') }}" alt="Influencer" class="w-full h-48 object-cover">
                        <div class="absolute bottom-2 left-2 bg-white py-1 px-3 rounded-full flex items-center">
                            <span class="text-xs font-medium text-purple-600">79.99%</span>
                            <span class="text-xs text-gray-500 ml-1">Satisfaction</span>
                        </div>
                    </div>
                    
                    <!-- Image 4 -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden relative">
                        <img src="{{ asset('images/images.3jpeg.avif') }}" alt="Influencer" class="w-full h-48 object-cover">
                        <div class="absolute top-2 right-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Background Elements -->
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-gray-100 rounded-full opacity-50"></div>
                <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-purple-100 rounded-full opacity-50"></div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-12 px-4 md:px-8 border-t border-gray-100">
    <div class="max-w-6xl mx-auto">
        <p class="text-green-500 font-medium mb-2">Nos formations</p>
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Cours populaires</h2>
        <p class="text-gray-600 max-w-2xl mb-10">
            Découvrez nos formations les plus appréciées pour développer vos compétences et maîtriser les stratégies de marketing d'influence qui fonctionnent.
        </p>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Cours 1 -->
            @forEach($top3Cours as $course)
            <div   class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
              <div class="h-48 bg-gray-200 relative">
                  <img src="{{ asset('storage/'.$course->image)}}" alt="Marketing Strategy" class="w-full h-full object-cover">    
              </div>
              <div class="p-6">
                  <div class="flex justify-between items-center mb-3">
                      <span class="text-blue-500 font-medium">{{$course->nom_categorie}}</span>
                      <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          </svg>
                          <span class="text-gray-700 ml-1">4.9 (128)</span>
                      </div>
                  </div>
                  <h3 class="text-xl font-semibold text-gray-800 mb-3">{{$course->titre}}</h3>
                  <p class="text-gray-600 mb-4 truncate">
                    {{$course->Description}}
                  </p>
                  <div class="flex justify-between items-center mb-4">
                      <span class="text-purple-600 font-bold text-lg">{{$course->prix}}€</span>
                      <span class="text-gray-500 text-sm">{{$course->chapitres->count()}} Chapitres</span>
                  </div>

                  <a href="{{ route('detailleCoures',$course->id)}}" class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                      </svg>
                      Inscrivez-vous
                  </a >
              </div>
          </div>
            @endforeach

            <!-- Cours 2 -->
            
        </div>

        
    </div>
</section>

<section class="bg-white py-12 px-4 md:px-8 border-t border-gray-100">
    <div class="max-w-6xl mx-auto">
      <p class="text-green-500 font-medium mb-2">Avis clients</p>
      <h2 class="text-4xl font-bold text-gray-800 mb-4">Ce que nos clients pensent de nos services</h2>
      <p class="text-gray-600 max-w-2xl mb-10">
        Découvrez les évaluations et commentaires laissés par nos clients satisfaits. Nous sommes fiers de maintenir une note moyenne de 4.8/5.
      </p>
  
      <!-- Score global -->
      <div class="bg-gray-50 p-6 rounded-xl shadow-sm border border-gray-100 mb-10">
        <div class="flex flex-col md:flex-row items-center justify-between">
          <div class="text-center md:text-left mb-6 md:mb-0">
            <h3 class="text-2xl font-bold text-gray-800 mb-2">Note globale</h3>
            <div class="flex items-center justify-center md:justify-start">
              <span class="text-5xl font-bold text-gray-800 mr-3">4.8</span>
              <div>
                <div class="flex text-yellow-400 mb-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <p class="text-sm text-gray-600">Basé sur 128 avis</p>
              </div>
            </div>
          </div>
          
          <!-- Distribution des notes -->
          <div class="w-full md:w-2/3 lg:w-1/2">
            <div class="space-y-2">
              <div class="flex items-center">
                <span class="text-sm text-gray-600 w-6">5</span>
                <div class="flex items-center ml-2 mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 85%"></div>
                </div>
                <span class="text-sm text-gray-600 ml-4 w-10">85%</span>
              </div>
              
              <div class="flex items-center">
                <span class="text-sm text-gray-600 w-6">4</span>
                <div class="flex items-center ml-2 mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 10%"></div>
                </div>
                <span class="text-sm text-gray-600 ml-4 w-10">10%</span>
              </div>
              
              <div class="flex items-center">
                <span class="text-sm text-gray-600 w-6">3</span>
                <div class="flex items-center ml-2 mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 3%"></div>
                </div>
                <span class="text-sm text-gray-600 ml-4 w-10">3%</span>
              </div>
              
              <div class="flex items-center">
                <span class="text-sm text-gray-600 w-6">2</span>
                <div class="flex items-center ml-2 mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 1%"></div>
                </div>
                <span class="text-sm text-gray-600 ml-4 w-10">1%</span>
              </div>
              
              <div class="flex items-center">
                <span class="text-sm text-gray-600 w-6">1</span>
                <div class="flex items-center ml-2 mr-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                  <div class="bg-yellow-400 h-2.5 rounded-full" style="width: 1%"></div>
                </div>
                <span class="text-sm text-gray-600 ml-4 w-10">1%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Liste des avis -->
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Avis 1 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="flex justify-between items-start mb-4">
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
              <div>
                <h4 class="text-lg font-semibold text-gray-800">Julie Martin</h4>
                <p class="text-gray-600 text-sm">Il y a 2 jours</p>
              </div>
            </div>
            <div class="flex text-yellow-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </div>
          </div>
          <h5 class="font-medium text-gray-800 mb-2">Une stratégie qui a transformé notre marque</h5>
          <p class="text-gray-700">
            L'équipe a vraiment compris nos besoins et a créé une stratégie sur mesure qui a dépassé nos attentes. La collaboration a été fluide et les résultats sont impressionnants. Je recommande vivement leurs services!
          </p>
          <div class="mt-4 text-sm">
            <span class="text-purple-600 font-medium">Service: </span>
            <span class="text-gray-600">Marketing d'influence</span>
          </div>
        </div>
  
        <!-- Avis 2 -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="flex justify-between items-start mb-4">
            <div class="flex items-center">
              <div class="w-12 h-12 rounded-full bg-gray-200 mr-4"></div>
              <div>
                <h4 class="text-lg font-semibold text-gray-800">Marc Dupont</h4>
                <p class="text-gray-600 text-sm">Il y a 1 semaine</p>
              </div>
            </div>
            <div class="flex text-yellow-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </div>
          </div>
          <h5 class="font-medium text-gray-800 mb-2">Des résultats concrets et mesurables</h5>
          <p class="text-gray-700">
            Ce qui m'a le plus impressionné, c'est la transparence dans le suivi des résultats. Chaque aspect de la campagne était mesuré et les ajustements effectués rapidement. Notre audience a doublé en 3 mois!
          </p>
          <div class="mt-4 text-sm">
            <span class="text-purple-600 font-medium">Service: </span>
            <span class="text-gray-600">Analyse média et stratégie de contenu</span>
          </div>
        </div>
      </div>
      </div>
</section>


<section class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <!-- YouTube Stats -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-red-100 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">7M+</h3>
                <p class="text-gray-600">Subscribers</p>
            </div>
            
            <!-- Instagram Stats -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-pink-100 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">2.4M+</h3>
                <p class="text-gray-600">Followers</p>
            </div>
            
            <!-- TikTok Stats -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-gray-100 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">3M+</h3>
                <p class="text-gray-600">Followers</p>
            </div>
            
            <!-- Twitter Stats -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-blue-100 p-4 rounded-full mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-800">5.5M+</h3>
                <p class="text-gray-600">Followers</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-12 px-4 md:px-8">
    <div class=" flex-col gap-2 mx-auto md:flex">
      <!-- Header Section -->
      <div class="mb-10 px-4">
        <p class="text-green-500 font-medium mb-2">Nos services </p>
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Our influencer marketing services</h2>
        <p class="text-gray-600 max-w-2xl">
          Mattis etiam curae mesti lacus eq curabitur. Per maecenas hendrerit nulla amet dictumst pretium parturient. Nuam nam consectetur erat tellus a maecenas fusco bibendum.
        </p>
        <button class="mt-6 bg-purple-600 text-white px-6 py-2 rounded-full font-medium">All Services</button>
      </div>
  
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
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Cours en ligne certifiés</h3>
          <p class="text-gray-600">
            Accédez à une large sélection de cours certifiés, dispensés par des professionnels du domaine. Apprenez à votre rythme avec des contenus clairs, structurés et toujours à jour.
          </p>
        </div>
  
        <!-- Marketing Ads -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.6 2.7c-.3-.2-.7-.2-1 0L16 5.9V4c0-.6-.4-1-1-1H3C2.4 3 2 3.4 2 4v12c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-1.9l4.6 3.2c.2.1.4.2.6.2.2 0 .3 0 .5-.1.3-.2.5-.5.5-.9V3.6c0-.4-.2-.7-.6-.9zM14 15H4V5h10v10zm6-1.9l-4-2.8V9.7l4-2.8v6.2z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3"> Formateurs expérimentés</h3>
          <p class="text-gray-600">
            Bénéficiez de l’expertise de nos formateurs passionnés. Chaque cours est conçu pour être pratique, interactif et directement applicable à votre vie professionnelle.
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
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Accès 24/7 sur tous les appareils</h3>
          <p class="text-gray-600">
            Apprenez où vous voulez, quand vous voulez. Notre plateforme est accessible sur ordinateur, tablette et mobile pour un apprentissage flexible et fluide.
          </p>
        </div>
  
        <!-- Product Branding -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
          <div class="text-blue-400 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="currentColor">
              <path d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.42l9 9c.36.36.86.58 1.41.58s1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41s-.23-1.06-.59-1.42zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Suivi personnalisé de votre progression</h3>
          <p class="text-gray-600">
            Suivez vos progrès en temps réel, obtenez des recommandations de cours, et atteignez vos objectifs grâce à des outils de suivi intelligents.
          </p>
        </div>
      </div>
    </div>
</section>

  @endSection