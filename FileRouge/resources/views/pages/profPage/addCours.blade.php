@extends('pages.AdminPage.main')
@section('content')

<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
    <div class="p-4 md:p-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Ajouter un nouveau cours</h1>
        </div>

        <!-- Course Form -->
        <div class="bg-white rounded-xl shadow p-6">
            <form action="{{ route('prof.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Basic Information -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Informations de base</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du cours</label>
                            <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <select id="category" name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="level" class="block text-sm font-medium text-gray-700 mb-1">Niveau</label>
                            <select id="level" name="level" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                                <option value="beginner">Débutant</option>
                                <option value="intermediate">Intermédiaire</option>
                                <option value="advanced">Avancé</option>
                            </select>
                        </div>
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">Durée (en heures)</label>
                            <input type="number" id="duration" name="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Description</h2>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description détaillée</label>
                        <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required></textarea>
                    </div>
                </div>

                <!-- Course Content -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Contenu du cours</h2>
                    <div id="sections-container">
                        <!-- Sections will be added dynamically -->
                    </div>
                    <button type="button" id="add-section" class="mt-4 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                        + Ajouter une section
                    </button>
                </div>

                <!-- Media -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Médias</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">Image de couverture</label>
                            <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="preview_video" class="block text-sm font-medium text-gray-700 mb-1">Vidéo de présentation</label>
                            <input type="file" id="preview_video" name="preview_video" accept="video/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Tarification</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (€)</label>
                            <input type="number" id="price" name="price" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent" required>
                        </div>
                        <div>
                            <label for="discount_price" class="block text-sm font-medium text-gray-700 mb-1">Prix promotionnel (€)</label>
                            <input type="number" id="discount_price" name="discount_price" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-purple focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-custom-purple text-white rounded-lg hover:bg-opacity-90">
                        Créer le cours
                    </button>
                </div>
            </form>
        </div>
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
   
  
