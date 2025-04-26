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
                        <div class="text-xl md:text-2xl font-bold text-gray-800">50</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 40% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            👨‍🎓
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">NOMBRE D'ÉTUDIANTS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">50</div>
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
                                <input type="text" placeholder="Rechercher un cours..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full sm:w-64">
                                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>Tous les statuts</option>
                                <option>Publié</option>
                                <option>Brouillon</option>
                                <option>En révision</option>
                            </select>
                            
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>Toutes les catégories</option>
                                <option>Développement</option>
                                <option>Design</option>
                                <option>Business</option>
                                <option>Marketing</option>
                                <option>Autres</option>
                            </select>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                                Exporter Statistiques
                            </button>
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
                                    Évaluation
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($cours as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
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
                                        {{ $course->nom_categorie }}
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
                                    
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="flex items-center">
                                        {{-- <span class="mr-1">{{ number_format($course->evaluation_moyenne, 1) }}</span> --}}
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        {{-- <span class="text-xs text-gray-400 ml-1">({{ $course->evaluations_count }})</span> --}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="" class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-xs">
                                            Éditer
                                        </a>
                                        
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
@endforeach
                
                <!-- Pagination -->
                <div class="bg-white rounded-xl shadow p-4 flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 ">
                            Précédent
                        </a>
                        <a href="" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 ">
                            Suivant
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Affichage de <span class="font-medium"></span> à <span class="font-medium"></span> sur <span class="font-medium">500</span> résultats
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 ">
                                    <span class="sr-only">Précédent</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                
                                {{-- @foreach ($cours->getUrlRange(1, $cours->lastPage()) as $page => $url)
                                    @if ($page == $cours->currentPage()) --}}
                                        <a href="#" aria-current="page" class="z-10 bg-custom-purple border-custom-purple text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                            {{-- {{ $page }} --}}
                                        </a>
                                    {{-- @else --}}
                                        <a href="" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                            {{-- {{ $page }} --}}
                                        </a>
                                    {{-- @endif
                                @endforeach --}}
                                
                                <a href="" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 ">
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


  

        <!-- Modal de confirmation de suppression -->
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
            const modal = document.getElementById("modalChapitre");
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

//   annulerChapitre.addEventListener("click", () => {
//     modal.classList.add("hidden");
//   });

//   ajouterChapitre.addEventListener("click", () => {
//     const titre = document.getElementById("titreChapitreInput").value;
//     const fichier = document.getElementById("videoChapitreInput").files[0];

//     if (!titre || !fichier) {
//       alert("Veuillez remplir tous les champs du chapitre.");
//       return;
//     }

//     compteurChapitres++;

//     const chapitre = document.createElement("div");
//     chapitre.className = "p-4 border rounded-xl space-y-2 bg-gray-50";

//     chapitre.innerHTML = `
//       <div class="flex justify-between items-center">
//         <p class="text-indigo-600 font-bold">Chapitre ${compteurChapitres}</p>
//         <button type="button" class="supprimer-chapitre text-red-500 hover:text-red-700">
//           Supprimer
//         </button>
//       </div>

//       <input type="hidden" name="chapters[${compteurChapitres}][titrechapitre]" value="${titre}" />
//       <input type="hidden" name="chapters[${compteurChapitres}][pathVedio_temp]" value="${fichier.name}" />

//       <p><strong>Titre :</strong> ${titre}</p>
//       <p><strong>Vidéo sélectionnée :</strong> ${fichier.name}</p>

//       <input type="file" name="chapters[${compteurChapitres}][pathVedio]" class="hidden" />
//     `;

//     // Insérer le fichier dans l'input "file" caché
//     const inputFichier = chapitre.querySelector(`input[type="file"]`);
//     const dataTransfer = new DataTransfer();
//     dataTransfer.items.add(fichier);
//     inputFichier.files = dataTransfer.files;

//     // Bouton suppression
//     chapitre.querySelector('.supprimer-chapitre').addEventListener('click', () => {
//       chapitre.remove();
//     });

//     chapitresContainer.appendChild(chapitre);
//     modal.classList.add("hidden");
//   });
        </script>
@endSection