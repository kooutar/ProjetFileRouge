@extends('pages.AdminPage.main')
@section('content')

<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl p-8">
        <h1 class="text-3xl font-bold text-center text-indigo-600 mb-8">Ajouter Cours</h1>
  
        <form class="space-y-10">
          <!-- Informations générales -->
          <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
              <span class="text-indigo-600">ℹ️</span> Informations générales
            </h2>
            <div class="space-y-4">
              <div>
                <label class="block text-gray-600 font-medium">Titre</label>
                <input type="text" placeholder="Titre du cours" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300" />
              </div>
              <div>
                <label class="block text-gray-600 font-medium">Description</label>
                <textarea placeholder="Description du cours" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300 h-28"></textarea>
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
              <input id="courseImage" type="file" class="hidden" accept="image/*" />
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
                <select class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300">
                  <option>-- Sélectionner une catégorie --</option>
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
                <input type="text" placeholder="Titre du chapitre" class="w-full p-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-300 transition duration-200" />
              </div>
              <label for="chapterVideo" class="w-full border-2 border-dashed border-gray-300 p-6 rounded-xl text-center text-gray-500 cursor-pointer hover:border-indigo-400 hover:bg-gray-50 transition-all duration-200 flex flex-col items-center justify-center">
                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                <p class="font-medium">📹 Sélectionnez une vidéo</p>
                <small class="block mt-2 text-gray-400">Format conseillé : MP4, WebM (max. 100MB)</small>
                <input id="chapterVideo" type="file" class="hidden" accept="video/*" />
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sectionsContainer = document.getElementById('sections-container');
        const addSectionButton = document.getElementById('add-section');
        let sectionCount = 0;

        addSectionButton.addEventListener('click', function() {
            sectionCount++;
            const sectionDiv = document.createElement('div');
            sectionDiv.className = 'mb-6 p-4 border border-gray-200 rounded-lg';
            sectionDiv.innerHTML = `
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-md font-semibold">Section ${sectionCount}</h3>
                    <button type="button" class="text-red-500 hover:text-red-700 remove-section">Supprimer</button>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Titre de la section</label>
                    <input type="text" name="sections[${sectionCount}][title]" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="sections[${sectionCount}][description]" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                </div>
                <div class="lessons-container">
                    <!-- Lessons will be added here -->
                </div>
                <button type="button" class="mt-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 add-lesson">
                    + Ajouter une leçon
                </button>
            `;

            sectionsContainer.appendChild(sectionDiv);

            // Add lesson functionality
            const addLessonButton = sectionDiv.querySelector('.add-lesson');
            const lessonsContainer = sectionDiv.querySelector('.lessons-container');
            let lessonCount = 0;

            addLessonButton.addEventListener('click', function() {
                lessonCount++;
                const lessonDiv = document.createElement('div');
                lessonDiv.className = 'mb-4 p-4 border border-gray-200 rounded-lg';
                lessonDiv.innerHTML = `
                    <div class="flex justify-between items-center mb-2">
                        <h4 class="text-sm font-semibold">Leçon ${lessonCount}</h4>
                        <button type="button" class="text-red-500 hover:text-red-700 remove-lesson">Supprimer</button>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre de la leçon</label>
                        <input type="text" name="sections[${sectionCount}][lessons][${lessonCount}][title]" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type de contenu</label>
                        <select name="sections[${sectionCount}][lessons][${lessonCount}][type]" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="video">Vidéo</option>
                            <option value="text">Texte</option>
                            <option value="quiz">Quiz</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Contenu</label>
                        <input type="file" name="sections[${sectionCount}][lessons][${lessonCount}][content]" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                `;

                lessonsContainer.appendChild(lessonDiv);

                // Remove lesson functionality
                const removeLessonButton = lessonDiv.querySelector('.remove-lesson');
                removeLessonButton.addEventListener('click', function() {
                    lessonDiv.remove();
                });
            });

            // Remove section functionality
            const removeSectionButton = sectionDiv.querySelector('.remove-section');
            removeSectionButton.addEventListener('click', function() {
                sectionDiv.remove();
            });
        });
    });
</script>

@endsection
   
  
