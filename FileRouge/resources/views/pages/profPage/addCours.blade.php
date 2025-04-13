@extends('pages.profPage.main')
@section('content')

<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8">
        <h1 class="text-3xl font-bold text-center text-indigo-600 mb-8">Ajouter Cours</h1>
  
        <form action="{{route('addCours')}}"  method="POST" class="space-y-10" enctype="multipart/form-data">
            @csrf
          <!-- Informations générales -->
          <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
              <span class="text-indigo-600">ℹ️</span> Informations générales
            </h2>
            <div class="space-y-4">
              <div>
                <label class="block text-gray-600 font-medium">Titre</label>
                <input type="text" name="titre" placeholder="Titre du cours" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300" />
              </div>
              <div>
                <label class="block text-gray-600 font-medium">Description</label>
                <textarea name="Description" placeholder="Description du cours" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300 h-28"></textarea>
              </div>
            </div>
          </div>
  
          <!-- Média du cours -->
          <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
              <span class="text-indigo-600">🎬</span> Média du cours
            </h2>
            <label class="block text-gray-600 font-medium mb-2">Image du Cours</label>
            <label for="courseImage" class="w-full border-2 border-dashed border-gray-300 p-8 rounded-xl text-center text-gray-500 cursor-pointer hover:border-indigo-400 hover:bg-gray-50 transition-all duration-200 flex flex-col items-center justify-center">
              <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
              </svg>
              <p class="font-medium">Glissez-déposez une image ou cliquez pour parcourir</p>
              <small class="block mt-2 text-gray-400">Format conseillé : JPG, PNG (max. 5MB)</small>
              <input name="image" id="courseImage" type="file" class="hidden" accept="image/*" />
            </label>
          </div>
  
          <!-- Catégorisation -->
          <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
              <span class="text-indigo-600">🏷️</span> Catégorisation
            </h2>
            <div class="space-y-4">
              <div>
                <label class="block text-gray-600 font-medium">Catégorie</label>
                <select name="id_categrie" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    <option>-- Sélectionner une catégorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                    @endforeach
                  
                </select>
              </div>
              <div>
                <label class="block text-gray-600 font-medium">Tags</label>
                <input type="text" placeholder="Entrez des tags" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300" />
              </div>
            </div>
          </div>
  
          <!-- Chapitre -->
          <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
              <span class="text-indigo-600">📚</span> Chapitre
            </h2>
            <div class="bg-gray-100 p-6 rounded-xl space-y-4">
              <p class="text-indigo-600 font-bold">Chapitre 1</p>
              <div>
                <label class="block text-gray-600 font-medium mb-2">Titre de chapitre</label>
                <input type="text" name="titreChapitre" placeholder="Titre du chapitre" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300 transition duration-200" />
              </div>
              <label for="chapterVideo" class="w-full border-2 border-dashed border-gray-300 p-6 rounded-xl text-center text-gray-500 cursor-pointer hover:border-indigo-400 hover:bg-gray-50 transition-all duration-200 flex flex-col items-center justify-center">
                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                <p class="font-medium">📹 Sélectionnez une vidéo</p>
                <small class="block mt-2 text-gray-400">Format conseillé : MP4, WebM (max. 100MB)</small>
                <input name="pathVedio" id="chapterVideo" type="file" class="hidden" accept="video/*" />
              </label>
            </div>
            <button type="button" class="mt-4 text-indigo-600 font-medium flex items-center gap-1 hover:text-indigo-800 transition duration-200">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
              </svg>
              Ajouter un Chapitre
            </button>
          </div>
  
          <!-- Bouton d'enregistrement -->
          <div class="text-center">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">
              📤 Enregistrer le Cours
            </button>
          </div>
        </form>
      </div>
</div>


@endsection
   
  
