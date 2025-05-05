@extends('layout.main')
@section('title', 'cours')
@section('content')
<main>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Explorez nos cours en ligne</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">Développez vos compétences avec notre sélection de cours de qualité dans différents domaines.</p>
        </div>
      <form method="GET" action="{{ route('courses.index') }}">

        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:space-x-6 space-y-4 md:space-y-0">
                <!-- Search bar -->
                <div class="flex-1">
                    <div class="relative">
                        <input id="search-input" type="text" placeholder="Rechercher des cours..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <div class="absolute left-3 top-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
 
               <!-- Category filter -->
                    <div class="w-full md:w-48">
                        <select id="category-select" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="">Choisir une catégorie</option>
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Subcategory filter -->
                    <div class="w-full md:w-48">
                        <select id="subcategory-select" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="">Choisir une sous-catégorie</option>
                        </select>
                    </div>

                <!-- Filter button -->
                <button class="bg-primary hover:bg-purple-800 text-white px-6 py-2 rounded-lg font-medium">
                    Filtrer
                </button>
            </div>
        </div>
      </form>
        <!-- Search and filter section -->
        

        <!-- Course grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Course card 1 -->
            @foreach ($courses as $course)
            <div  data-id="{{$course->categorie->id}}" class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
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
        </div>
    </div>
</main>



<!-- Script -->
<script>
    const categorySelect = document.getElementById('category-select');
    const subcategorySelect = document.getElementById('subcategory-select');
    const searchInput = document.getElementById('search-input');
    const cards = document.querySelectorAll('[data-id]');
    
    function filterCards() {
        const categoryId = categorySelect.value;
        const subcategoryId = subcategorySelect.value;
        const searchQuery = searchInput.value.toLowerCase();
    
        cards.forEach(card => {
            const cardCat = card.getAttribute('data-id');
            const cardSub = card.getAttribute('data-subid');
            const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
            const description = card.querySelector('p')?.textContent.toLowerCase() || '';
    
            const matchCategory = categoryId === '' || cardCat === categoryId;
            const matchSubcategory = subcategoryId === '' || cardSub === subcategoryId;
            const matchSearch = title.includes(searchQuery) || description.includes(searchQuery);
    
            if (matchCategory && matchSubcategory && matchSearch) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Filtrage sur changement de catégorie
    categorySelect.addEventListener('change', function () {
        const categoryId = this.value;
        subcategorySelect.innerHTML = '<option value="">Chargement...</option>';
    
        if (categoryId) {
            fetch(`/subcategories/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    subcategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';
                    data.forEach(subcat => {
                        const option = document.createElement('option');
                        option.value = subcat.id;
                        option.textContent = subcat.categorie;
                        subcategorySelect.appendChild(option);
                    });
                    filterCards(); // mettre à jour après le chargement
                });
        } else {
            subcategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';
            filterCards();
        }
    });
    
    // Filtrage sur changement de sous-catégorie
    subcategorySelect.addEventListener('change', filterCards);
    
    // Filtrage sur saisie dans la barre de recherche
    searchInput.addEventListener('input', filterCards);
    </script>
    

@endSection
