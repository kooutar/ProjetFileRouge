@extends('pages.profPage.main')
@section('content')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">

            <div class="p-4 md:p-8">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Gestion de Mes Cours</h1>
                    <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                        <img src="/api/placeholder/40/40" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <span class="text-gray-700"></span>
                    </div>
                </div>

                <!-- Stats Summary -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            📚
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">TOTAL DE MES COURS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">{{$cours->count()}}</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 40% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            👨‍🎓
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">NOMBRE D'ÉTUDIANTS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">{{$nombreEtudiants}}</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 60% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            ⭐
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">ÉVALUATION MOYENNE</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">5/5</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 30% depuis le mois dernier
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow p-4 md:p-6 mb-6 md:mb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="relative">
                                <input id="search-input" type="text" placeholder="Rechercher un cours..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full sm:w-64">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>Tous les statuts</option>
                                <option>Publié</option>
                                <option>en attente</option>
                                <option>refusé</option>
                            </select>
                            
                            <select id="category-select" class="border border-gray-300 rounded-lg px-4 py-2">
                                   <option value="">Toutes les catégories</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            
                            <a href="{{ route('addCours')}}" class="px-4 py-2 custom-purple text-white rounded-lg hover:bg-opacity-90">
                                Nouveau Cours
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-xl shadow overflow-hidden mb-6 md:mb-8">
                    <table class="w-full min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cours
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catégorie
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Étudiants
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date de création
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Statut
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    chapitres
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cours as $course)
                            <tr data-id="{{ $course->categorie->categorie}}">
                                <td  class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded object-cover" src="{{ asset('storage/'.$course->image)}}" alt="Couverture du cours">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{$course->titre}}</div>
        
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-custom-purple-10 text-custom-purple">
                                        {{ $course->categorie->categorie}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{-- {{ $course->etudiants_count }} --}}
                                    0
                                    <div class="text-xs text-gray-500 mt-1">
                                        {{-- {{ $course->completed_count }} terminés --}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($course->created_at)->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($course->status == 'accepted')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Publié
                                    </span>
                                    @elseif($course->status == 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        en attente
                                    </span>
                                    @elseif($course->status == 'rejected')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Rejeté
                                    </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                      <a href="/chapitres/{{$course->id}}">{{$course->chapitres->count()}} chapitres</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="toggleEditModal({{$course->id}})" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-xs">
                                            Éditer
                                        </button>
                                        
                                            <button onclick="toggleCommentModal({{$course->id}})"  id="btnAjouterChapitre" class="px-3 py-1 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 text-xs">
                                                add chapitre
                                            </button>
                                                
                                        
                                        <button onclick="confirmerSuppression({{$course->id}})" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 text-xs">
                                            Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- moadel pour editer cours  --}}


 @foreach ($cours as $course)
<div id="modalEditCourse-{{$course->id}}" class="fixed inset-0 bg-black bg-opacity-40 hidden flex justify-center items-center z-50 ">
    <div class="bg-white p-6 rounded-xl w-full max-w-lg relative">
        <h2 class="text-xl font-bold mb-4 text-indigo-700">Éditer le cours</h2>
        <form id="editForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-medium mb-1">Titre du cours</label>
                <input type="text" name="titre" value="{{ $course->titre }}" class="w-full p-2 border rounded-xl" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Catégorie</label>
                <select name="id_categrie" class="w-full p-2 border rounded-xl">
                    <option value="{{ $course->categorie->id}}">{{$course->categorie->categorie}}</option>
                    @foreach ($categories as $categorie)
                     @if($categorie->categorie != $course->categorie->categorie)
                        <option >
                            {{ $categorie->categorie }}
                        </option>
                        @endif
 @endforeach
    </select>
               
               
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Description</label>
                <textarea name="Description"  class="w-full p-2 border rounded-xl " id="" cols="" rows="">{{$course->Description}}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Prix</label>
                <input type="number" name="prix"  class="w-full p-2 border rounded-xl " value="{{$course->prix}}">
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Image</label>
                <div class="flex items-center">
                   
                    <img src="{{ asset('storage/'.$course->image)}}" alt="Couverture du cours" class="w-32 h-32 object-cover rounded-lg mb-2">
                    <input type="file" name="image" accept="image/*" class="w-full p-2 border rounded-xl" />
                </div>
              
            </div>
          
            <div class="mt-6 flex justify-end gap-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Enregistrer</button>
                <button type="button"  onclick="toggleEditModal({{$course->id}})" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
               
            </div>
        </form>
    </div>
</div>
@endforeach
   @foreach ($cours as $course)
                   <!-- Modal pour ajouter un chapitre -->
                   <div id="modalChapitre-{{$course->id}}" class="fixed inset-0 bg-black bg-opacity-40 hidden  flex justify-center items-center z-50">
                    <div class="bg-white p-6 rounded-xl w-full max-w-lg relative">
                    <h2 class="text-xl font-bold mb-4 text-indigo-700">Ajouter un chapitre</h2>
                    <form action="{{route('store.chapitre')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input type="text" value="{{$course->id}}" name="id_cours" class="" />
                            <div class="mb-4">
                                <label class="block font-medium mb-1">Titre du chapitre</label>
                                <input type="text" id="titreChapitreInput"  name="titrechapitre" class="w-full p-2 border rounded-xl" />
                            </div>
                        
                            <div>
                                <label class="block font-medium mb-1">Vidéo</label>
                                <input type="file" id="videoChapitreInput" name="pathVedio" accept="video/*" />
                            </div>
                        
                            <div class="mt-6 flex justify-end gap-4">
                                <button id="annulerChapitre" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                                <button type="submit" id="ajouterChapitre" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Ajouter</button>
                            </div>
                    </form>
                    </div>
                </div>
                
                
                
            <div id="deleteModal" class="fixed inset-0 bg-gray-800 bg-opacity-75  hidden flex items-center justify-center z-50">
            <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Confirmer la suppression</h3>
                <p class="text-gray-700 mb-6">Êtes-vous sûr de vouloir supprimer ce cours ? Cette action est irréversible.</p>
                <div class="flex justify-end gap-3">
                    <button onclick="fermerModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Annuler
                    </button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
@endforeach
                
                <!-- Pagination -->
                {{ $cours->links() }}
                
            </div>
        </div>


  

        <!-- Modal de confirmation de suppression -->
      

        <script>
            function confirmerSuppression(id) {
                document.getElementById('deleteForm').action = `/supprimer-cours/${id}`;
                document.getElementById('deleteModal').classList.remove('hidden');
            }
            
            function fermerModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }
            
            // Fermer le modal si l'utilisateur clique en dehors
            window.addEventListener('click', function(event) {
                if (event.target === document.getElementById('deleteModal')) {
                    fermerModal();
                }
            });

            // ************************************
            
  const ajouterChapitre = document.getElementById("ajouterChapitre");
  const annulerChapitre = document.getElementById("annulerChapitre");
  const chapitresContainer = document.getElementById("chapitresContainer");


  function toggleCommentModal(id) {
            const secmodal = document.getElementById('modalChapitre-'+id);
            if (secmodal.classList.contains('hidden')) {
                secmodal.classList.remove('hidden');
            } else {
                secmodal.classList.add('hidden');
            }
        }
        function toggleEditModal(id) {
        document.getElementById('editForm').action = `/updateCours/${id}`;
        const modal = document.getElementById('modalEditCourse-' + id);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
   // *************
 
   
document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('category-select');
    const searchInput = document.getElementById('search-input');
    const rows = document.querySelectorAll('tr[data-id]');

    function filterCourses() {
        const selectedCategory = categorySelect.value.trim();
        const searchQuery = searchInput.value.toLowerCase().trim();

        rows.forEach(row => {
            const rowCategory = row.getAttribute('data-id').trim();
            const rowText = row.textContent.toLowerCase();

            const matchesCategory = (selectedCategory === "" || rowCategory === selectedCategory);
            const matchesSearch = rowText.includes(searchQuery);

            if (matchesCategory && matchesSearch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    categorySelect.addEventListener('change', filterCourses);
    searchInput.addEventListener('input', filterCourses);
});





        </script>
@endSection