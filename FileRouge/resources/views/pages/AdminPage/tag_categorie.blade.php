@extends('pages.AdminPage.main')
@section('content')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">

            <div class="p-4 md:p-8">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Gestion des Tags et Catégories</h1>
                    <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                        <img src="/api/placeholder/40/40" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <span class="text-gray-700">Admin</span>
                    </div>
                </div>

                <!-- Stats Summary -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            📊
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">TOTAL DES CATÉGORIES</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">42</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 12.5% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            🏷️
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">TOTAL DES TAGS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">156</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 8.7% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            🔄
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">DERNIÈRE MISE À JOUR</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">Aujourd'hui</div>
                        <div class="text-xs md:text-sm text-gray-500 mt-2 flex items-center">
                            à 14:32
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="mb-6">
                    <div class="flex border-b border-gray-200">
                        <button id="categoriesTab" class="py-2 px-4 border-b-2 border-custom-purple text-custom-purple font-medium">
                            Catégories
                        </button>
                        <button id="tagsTab" class="py-2 px-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium">
                            Tags
                        </button>
                    </div>
                </div>
                @if (session('success'))
                <div class="bg-green-200 p-4">
                    
                        <p>{{session('success')}}</p> 


                </div>
                @endif
                <!-- Categories Section -->
                <div id="categoriesSection">
                    <!-- Category Form -->
                    <div class="bg-white rounded-xl shadow p-4 md:p-6 mb-6">
                        <h2 class="text-lg font-semibold mb-4">Ajouter une nouvelle catégorie</h2>
                        <form class="space-y-4" action="{{route('ajoutCatecegorie')}}" method="post">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
                                    <input type="text" id="categoryName" name="categorie" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                                </div>
                                <div>
                                    <label for="parentCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie parente (optionnel)</label>
                                    <select id="parentCategory36" name="parent_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                                        <option >Aucune - Catégorie principale</option>
                                        @foreach($categories as $categorie) 
                                        <option  value="{{ $categorie->id }}">{{$categorie->categorie}}</option>
                                        @endforeach
                                       
                                        
                                    </select>
                                </div>
                            </div>
                            {{-- <div>
                                <label for="categoryDescription" class="block text-sm font-medium text-gray-700 mb-1">Description (optionnel)</label>
                                <textarea id="categoryDescription" name="categoryDescription" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent"></textarea>
                            </div> --}}
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 custom-purple text-white rounded-lg hover:bg-opacity-90">
                                    Ajouter la catégorie
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Table -->
                    <div class="bg-white rounded-xl shadow overflow-hidden mb-6">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Liste des catégories</h2>
                            <div class="relative">
                                <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-64">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                        <table class="w-full min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Sous-catégorie
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre de cours
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Row 1 -->
                                @foreach($categories as $categorie) 
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"> {{$categorie->categorie}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                            Développement
                                        </span>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        42
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button onclick="editModal({{$categorie->id}}, '{{$categorie->categorie}}' , {{$categorie->parent_id}})" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-xs">
                                                Modifier
                                            </button>
                                            <form action="{{ route('deleteCategorie', $categorie->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs">
                                                    Supprimer
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- Row 2 -->
                                
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tags Section (Hidden by default) -->
                <div id="tagsSection" class="hidden">
                    <!-- Tag Form -->
                    <div class="bg-white rounded-xl shadow p-4 md:p-6 mb-6">
                        <h2 class="text-lg font-semibold mb-4">Ajouter un nouveau tag</h2>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="tagName" class="block text-sm font-medium text-gray-700 mb-1">Nom du tag</label>
                                    <input type="text" id="tagName" name="tagName" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                                </div>
                                <div>
                                    <label for="associatedCategory" class="block text-sm font-medium text-gray-700 mb-1">Catégorie associée (optionnel)</label>
                                    <select id="associatedCategory" name="associatedCategory" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                                        <option value="">Aucune catégorie spécifique</option>
                                        <option value="1">Développement Web</option>
                                        <option value="2">Design UX/UI</option>
                                        <option value="3">Marketing Digital</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 custom-purple text-white rounded-lg hover:bg-opacity-90">
                                    Ajouter le tag
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Tags Table -->
                    <div class="bg-white rounded-xl shadow overflow-hidden mb-6">
                        <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                            <h2 class="text-lg font-semibold">Liste des tags</h2>
                            <div class="relative">
                                <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-64">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                        <table class="w-full min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom du tag
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Catégorie associée
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre de cours
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
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
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">JavaScript</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                            Développement Web
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        24
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        jane@microsoft.com
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-xs">
                                                Modifier
                                            </button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs">
                                                Supprimer
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Row 2 -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Figma</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                            Design UX/UI
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        18
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        floyd@yahoo.com
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Actif
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button  class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-xs">
                                                Modifier
                                            </button>
                                            <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs">
                                                Supprimer
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
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
                                Affichage de <span class="font-medium">1</span> à <span class="font-medium">10</span> sur <span class="font-medium">42</span> résultats
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
   {{-- modal ici --}}


<!-- Overlay + Modal -->
<div id="modaleedit" class="fixed inset-0 bg-black bg-opacity-50 hidden   z-50">
    <div class="flex items-center justify-center min-h-screen">
        <div id="" class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 md:p-8 relative">
        
            <!-- Bouton de fermeture -->
            <button onclick="closeEditModal()" class="absolute top-3 right-3 text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
            
            <form id="editCategorieForm" method="post">
                @csrf
                @method('PUT')
    
                <h1 class="text-purple-600 text-center text-2xl font-bold mb-6">Modifier Categorie</h1>
                
                <div class="mt-4">
                    <label class="block text-gray-700 mb-2">Categorie</label>
                    <div class="flex items-start">
                        <input id="categorieName" type="text" name="categorie" class="w-full px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                </div>
    
                <div class="mt-4">
                    <select id="categorieParentName" name="parent_id" class="w-full px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 bg-white appearance-none">
                        @foreach($categories as $categorie) 
                            <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white w-full px-6 py-3 rounded-full mt-6 transition-colors duration-300">
                        Modifier categorie
                    </button>
                </div>
            </form>
        </div>
    </div>
   
</div>



        
       <script src="{{ asset('js/switchingTagCategorie.js')}}"></script>

       <script src="{{ asset('js/editCategorie.js')}}"></script>
       

@endSection