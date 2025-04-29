@extends('pages.AdminPage.main')
@section('content')

        <!-- Main Content -->
        <div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">

            <div class="p-4 md:p-8">
                <!-- Header -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 md:mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Tableau de bord</h1>
                    <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                        <img src="/api/placeholder/40/40" alt="Avatar" class="w-8 h-8 rounded-full mr-2">
                        <span class="text-gray-700">Admin</span>
                    </div>
                </div>

                <!-- Stat Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            👥
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">TOTAL DES ÉTUDIANTS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">4,835</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 12.5% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            📚
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">COURS ACTIFS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">128</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 8.2% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            💰
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">REVENU MENSUEL</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">38,450 €</div>
                        <div class="text-xs md:text-sm text-green-500 mt-2 flex items-center">
                            ↑ 15.3% depuis le mois dernier
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            🎓
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">TAUX D'ACHÈVEMENT</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">68.7%</div>
                        <div class="text-xs md:text-sm text-red-500 mt-2 flex items-center">
                            ↓ 2.1% depuis le mois dernier
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                    <div class="bg-white rounded-xl shadow p-4 md:p-6 lg:col-span-2">
                        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
                            <h2 class="text-lg font-semibold text-gray-800 mb-3 md:mb-0">Inscriptions mensuelles</h2>
                            <div class="flex bg-gray-100 rounded-lg text-xs md:text-sm">
                               
                                <button class="px-3 py-1 rounded-lg custom-purple text-white">Mois</button>
                               
                            </div>
                        </div>
                        

                        <canvas id="chartInscription" width="600" height="400"></canvas>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-6">Répartition des cours</h2>
                        <canvas id="myChart" width="400" height="200"></canvas>

                    @foreach($parCategorie as $index => $item)
                        <div class="flex items-center">
                         
                            <input type="hidden" class="pourcentage-{{$item->categorie->categorie}}" value="{{ $item->pourcentage }}">
                        </div>
                    @endforeach

                     
                </div>
                </div>

                <!-- Table -->
                <div class="bg-white rounded-xl shadow p-4 md:p-6 mb-6 md:mb-8 overflow-x-auto">
                    <h2 class="text-lg font-semibold text-gray-800 mb-6">Cours les plus populaires</h2>
                    
                    <table class="w-full min-w-full">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 pr-2">Cours</th>
                                <th class="pb-3 px-2">Catégorie</th>
                                <th class="pb-3 px-2">Étudiants</th>
                                <th class="pb-3 px-2">Évaluation</th>
                                <th class="pb-3 pl-2">Progression</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($top3Cours as $cours)
                            <tr class="border-b">
                                <td class="py-4 pr-2">{{$cours->titre}}</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Développement</span></td>
                                <td class="py-4 px-2">1,245</td>
                                <td class="py-4 px-2">4.8/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

                <!-- Last Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-6">Sessions utilisateurs</h2>
                        
                        <div class="h-32 md:h-64 flex items-end space-x-2">
                            <div class="h-4/5 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-3/5 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-5/6 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-2/3 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-3/4 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-3/5 custom-purple rounded-t w-full opacity-80"></div>
                            <div class="h-4/5 custom-purple rounded-t w-full opacity-80"></div>
                        </div>
                        
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>Lun</span>
                            <span>Mar</span>
                            <span>Mer</span>
                            <span>Jeu</span>
                            <span>Ven</span>
                            <span>Sam</span>
                            <span>Dim</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-6">Plateformes d'accès</h2>
                        
                        <!-- Simple pie chart with custom colors -->
                        <div class="relative mx-auto w-32 md:w-48 h-32 md:h-48 rounded-full bg-gray-200 mb-6">
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 100% 0, 100% 70%, 50% 70%); background-color: #5932EA;"></div>
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 50% 70%, 100% 70%, 100% 100%, 0 100%, 0 70%, 50% 70%); background-color: #7B61FF;"></div>
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 0 70%, 0 0, 50% 0); background-color: #9E8CFC;"></div>
                            <div class="absolute inset-2 rounded-full bg-white"></div>
                        </div>
                        
                        <div class="grid grid-cols-3 gap-2 text-xs md:text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #5932EA;"></div>
                                <span>Mobile (45%)</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #7B61FF;"></div>
                                <span>Desktop (40%)</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #9E8CFC;"></div>
                                <span>Tablette (15%)</span>
                            </div>
                        </div>
                    </div>
                </div>

                @endSection
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        let inputs = document.querySelectorAll('[class^="pourcentage-"]');
                        
                        let labels = [];
                        let data = [];
                                    const backgroundColors = [
                                    'rgba(255, 99, 132, 0.5)',   // Rouge
                                    'rgba(54, 162, 235, 0.5)',   // Bleu
                                    'rgba(255, 206, 86, 0.5)',   // Jaune
                                    'rgba(75, 192, 192, 0.5)',   // Vert clair
                                    'rgba(153, 102, 255, 0.5)',  // Violet
                                    'rgba(255, 159, 64, 0.5)'    // Orange
                                ];

                                const borderColors = [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ];

                        inputs.forEach(input => {
                            // Récupère la classe complète (ex: "pourcentage-tech")
                            let className = input.className;
                            // Récupère la partie après "pourcentage-"
                            let categorie = className.replace('pourcentage-', '');
                            labels.push(categorie);
                            data.push(parseFloat(input.value)); // transforme en nombre
                        });
                    
                        // Initialise le graphique
                        const ctxpie = document.getElementById('myChart').getContext('2d');
                    
                        new Chart(ctxpie, {
                            type: 'pie',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Pourcentage par Catégorie',
                                    data: data,
                                    backgroundColor: backgroundColors.slice(0, data.length),
                                     borderColor: borderColors.slice(0, data.length),      // bordure
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: 100
                                    }
                                }
                            }
                        });

  // *****************************

                 
  const ctxbare = document.getElementById('chartInscription').getContext('2d');
        const chart = new Chart(ctxbare, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Inscriptions',
                    data: @json($data),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 0
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

                        
                    });
                  
        </script>
                    