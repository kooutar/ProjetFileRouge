@extends('pages.AdminPage.main')
@section('content')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">

            <div class="p-4 md:p-8">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Gestion des Professeurs</h1>
                    <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                        <img src="{{asset('images/ana.jpg')}}" class="w-8 h-8 rounded-full mr-2" alt="Avatar">
                        <span class="text-gray-700">Admin</span>
                    </div>
                </div>

            

              
                <!-- Table -->
                <div class="bg-white rounded-xl shadow overflow-hidden mb-6 md:mb-8">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Professeur
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Spécialité
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Résumé
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date d'inscription
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut
                                </th>
                                
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Row 1 -->
                            @foreach ($profs as $prof)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $prof->name }}</div>
                                            <div class="text-sm text-gray-500">{{$prof->telephone}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                       {{$prof->domaine}}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <button class="text-custom-purple hover:text-custom-purple-dark focus:outline-none" onclick="toggleResume('{{ asset('storage/' . $prof->path_cv) }}')">
                                            Voir CV
                                        </button>  
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($prof->created_at)->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                       {{ $prof->status}}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="/accepter-prof/{{$prof->id}}" class="px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600 text-xs">
                                            Accepter
                                        </a>
                                        <a href="/refuser-prof/{{$prof->id}}" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs">
                                            Refuser
                                        </a>
                                        {{-- <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                            Détails
                                        </button> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                           
                            <div id="cvModal" class="hidden fixed  items-center justify-center bg-gray-900 bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-lg p-5 max-w-2xl w-full">
                                    <div class="flex justify-between items-center">
                                        <h2 class="text-lg font-semibold">CV du Professeur</h2>
                                        <button onclick="closeModal()" class="text-gray-600 hover:text-red-500">&times;</button>
                                    </div>
                                    <iframe id="cvIframe" class="w-full h-96 mt-4" src="" frameborder="0"></iframe>
                                </div>
                            </div>
                            <!-- Row 2 -->
                            {{-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Lucas Martin</div>
                                            <div class="text-sm text-gray-500">lucas.martin@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                        Marketing Digital
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <button class="text-custom-purple hover:text-custom-purple-dark focus:outline-none" onclick="toggleResume('resume3')">
                                            Voir CV
                                        </button>
                                        <div id="resume3" class="hidden mt-2 bg-gray-50 p-3 rounded-lg border border-gray-200 text-xs">
                                            <p class="font-medium">Expérience: 10 ans</p>
                                            <p class="mb-1">• <strong>Directeur Marketing</strong>, E-commerce Plus (2021-présent)</p>
                                            <p class="mb-1">• <strong>Responsable SEO/SEM</strong>, Digital Agency (2018-2021)</p>
                                            <p class="mb-2">• <strong>Spécialiste Marketing</strong>, Brand Corp (2015-2018)</p>
                                            <p class="font-medium">Compétences:</p>
                                            <p>SEO, SEM, Analytics, Content Marketing, Email Marketing</p>
                                            <div class="mt-2 flex justify-end">
                                                <a href="#" class="text-custom-purple hover:underline">Télécharger CV complet</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    10 Mars 2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Accepté
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    4.7/5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                            Détails
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                            
                            <!-- Row 3 -->
                            {{-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Lucas Martin</div>
                                            <div class="text-sm text-gray-500">lucas.martin@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                        Marketing Digital
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <button class="text-custom-purple hover:text-custom-purple-dark focus:outline-none" onclick="toggleResume('resume3')">
                                            Voir CV
                                        </button>
                                        <div id="resume3" class="hidden mt-2 bg-gray-50 p-3 rounded-lg border border-gray-200 text-xs">
                                            <p class="font-medium">Expérience: 10 ans</p>
                                            <p class="mb-1">• <strong>Directeur Marketing</strong>, E-commerce Plus (2021-présent)</p>
                                            <p class="mb-1">• <strong>Responsable SEO/SEM</strong>, Digital Agency (2018-2021)</p>
                                            <p class="mb-2">• <strong>Spécialiste Marketing</strong>, Brand Corp (2015-2018)</p>
                                            <p class="font-medium">Compétences:</p>
                                            <p>SEO, SEM, Analytics, Content Marketing, Email Marketing</p>
                                            <div class="mt-2 flex justify-end">
                                                <a href="#" class="text-custom-purple hover:underline">Télécharger CV complet</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    10 Mars 2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Accepté
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    4.7/5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                            Détails
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                            
                            <!-- Row 4 -->
                            {{-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Lucas Martin</div>
                                            <div class="text-sm text-gray-500">lucas.martin@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                        Marketing Digital
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <button class="text-custom-purple hover:text-custom-purple-dark focus:outline-none" onclick="toggleResume('resume3')">
                                            Voir CV
                                        </button>
                                        <div id="resume3" class="hidden mt-2 bg-gray-50 p-3 rounded-lg border border-gray-200 text-xs">
                                            <p class="font-medium">Expérience: 10 ans</p>
                                            <p class="mb-1">• <strong>Directeur Marketing</strong>, E-commerce Plus (2021-présent)</p>
                                            <p class="mb-1">• <strong>Responsable SEO/SEM</strong>, Digital Agency (2018-2021)</p>
                                            <p class="mb-2">• <strong>Spécialiste Marketing</strong>, Brand Corp (2015-2018)</p>
                                            <p class="font-medium">Compétences:</p>
                                            <p>SEO, SEM, Analytics, Content Marketing, Email Marketing</p>
                                            <div class="mt-2 flex justify-end">
                                                <a href="#" class="text-custom-purple hover:underline">Télécharger CV complet</a>
                                            </div>
                                        </div>

                                        <div id="cvModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                            <div class="bg-white p-5 rounded-lg shadow-lg max-w-lg w-full">
                                                <h2 class="text-lg font-bold mb-3">Curriculum Vitae</h2>
                                                <p class="font-medium">Expérience: 8 ans</p>
                                                <p class="mb-1">• <strong>Développeur Senior</strong>, Techno Solutions (2020-présent)</p>
                                                <p class="mb-1">• <strong>Développeur Full Stack</strong>, Web Experts (2017-2020)</p>
                                                <p class="mb-2">• <strong>Développeur Junior</strong>, StartupXYZ (2015-2017)</p>
                                                <p class="font-medium">Compétences:</p>
                                                <p>JavaScript, React, Node.js, PHP, Laravel, AWS</p>
                                                <div class="mt-3 flex justify-between">
                                                    <a href="#" class="text-custom-purple hover:underline">Télécharger CV complet</a>
                                                    <button onclick="closeModal('cvModal')" class="px-3 py-1 bg-gray-300 rounded">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    10 Mars 2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Accepté
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    4.7/5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                            Détails
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                            
                            {{-- <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/api/placeholder/40/40" alt="Profile">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Lucas Martin</div>
                                            <div class="text-sm text-gray-500">lucas.martin@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                        Marketing Digital
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs">
                                        <button class="text-custom-purple hover:text-custom-purple-dark focus:outline-none" onclick="toggleResume('resume3')">
                                            Voir CV
                                        </button>
                                        <div id="resume3" class="hidden mt-2 bg-gray-50 p-3 rounded-lg border border-gray-200 text-xs">
                                            <p class="font-medium">Expérience: 10 ans</p>
                                            <p class="mb-1">• <strong>Directeur Marketing</strong>, E-commerce Plus (2021-présent)</p>
                                            <p class="mb-1">• <strong>Responsable SEO/SEM</strong>, Digital Agency (2018-2021)</p>
                                            <p class="mb-2">• <strong>Spécialiste Marketing</strong>, Brand Corp (2015-2018)</p>
                                            <p class="font-medium">Compétences:</p>
                                            <p>SEO, SEM, Analytics, Content Marketing, Email Marketing</p>
                                            <div class="mt-2 flex justify-end">
                                                <a href="#" class="text-custom-purple hover:underline">Télécharger CV complet</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    10 Mars 2025
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Accepté
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    4.7/5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                            Détails
                                        </button>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Précédent
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Suivant
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Affichage de <span class="font-medium">1</span> à <span class="font-medium">5</span> sur <span class="font-medium">23</span> résultats
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Précédent</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-custom-purple border-custom-purple text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                    ...
                                </span>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    5
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Suivant</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
     
@endSection
