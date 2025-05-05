@extends('pages.profPage.main')
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
                        <div class="text-xl md:text-2xl font-bold text-gray-800">{{$nombreEtudiants}}</div>
                        
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <div class="w-12 h-12 rounded-lg bg-custom-purple-10 text-custom-purple flex items-center justify-center mb-4 text-xl">
                            📚
                        </div>
                        <div class="text-xs md:text-sm text-gray-500 uppercase tracking-wider mb-1">COURS ACTIFS</div>
                        <div class="text-xl md:text-2xl font-bold text-gray-800">{{$totalCoursAccepted}}</div>
                    </div>

                   

                  
                </div>

                <!-- Charts Row -->
                

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
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">ui/UX</span></td>
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

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 mb-6 md:mb-8">
                    
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
                               })
           
                 </script>
                @endSection
   