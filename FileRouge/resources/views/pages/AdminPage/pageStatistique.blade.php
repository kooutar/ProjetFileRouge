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
                                <button class="px-3 py-1 rounded-lg text-gray-600">Semaine</button>
                                <button class="px-3 py-1 rounded-lg custom-purple text-white">Mois</button>
                                <button class="px-3 py-1 rounded-lg text-gray-600">Année</button>
                            </div>
                        </div>
                        
                        <!-- Simple bar chart -->
                        <div class="h-32 md:h-64 flex items-end space-x-1">
                            <div class="h-3/5 custom-purple rounded-t w-full"></div>
                            <div class="h-4/5 custom-purple rounded-t w-full"></div>
                            <div class="h-2/3 custom-purple rounded-t w-full"></div>
                            <div class="h-4/5 custom-purple rounded-t w-full"></div>
                            <div class="h-3/4 custom-purple rounded-t w-full"></div>
                            <div class="h-full custom-purple rounded-t w-full"></div>
                            <div class="h-4/5 custom-purple rounded-t w-full"></div>
                            <div class="h-2/3 custom-purple rounded-t w-full"></div>
                            <div class="h-5/6 custom-purple rounded-t w-full"></div>
                            <div class="h-4/5 custom-purple rounded-t w-full"></div>
                            <div class="h-3/4 custom-purple rounded-t w-full"></div>
                            <div class="h-5/6 custom-purple rounded-t w-full"></div>
                        </div>
                        
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>Jan</span>
                            <span>Fév</span>
                            <span>Mar</span>
                            <span>Avr</span>
                            <span>Mai</span>
                            <span>Jui</span>
                            <span>Jul</span>
                            <span>Aoû</span>
                            <span>Sep</span>
                            <span>Oct</span>
                            <span>Nov</span>
                            <span>Déc</span>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow p-4 md:p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-6">Répartition des cours</h2>
                        
                        <!-- Simple pie chart representation -->
                        <div class="relative mx-auto w-32 md:w-48 h-32 md:h-48 rounded-full bg-gray-200 mb-6">
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 100% 0, 100% 50%); background-color: #5932EA;"></div>
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 100% 50%, 100% 100%, 50% 100%); background-color: #7B61FF;"></div>
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 50% 100%, 0 100%, 0 70%); background-color: #9E8CFC;"></div>
                            <div class="absolute inset-0 rounded-full" style="clip-path: polygon(50% 50%, 0 70%, 0 0, 50% 0); background-color: #C3B5FD;"></div>
                            <div class="absolute inset-2 rounded-full bg-white"></div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-2 text-xs md:text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #5932EA;"></div>
                                <span>Développement (55%)</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #7B61FF;"></div>
                                <span>Business (20%)</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #9E8CFC;"></div>
                                <span>Design (10%)</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded mr-2" style="background-color: #C3B5FD;"></div>
                                <span>Autres (15%)</span>
                            </div>
                        </div>
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
                            <tr class="border-b">
                                <td class="py-4 pr-2">Développement Web Complet</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Développement</span></td>
                                <td class="py-4 px-2">1,245</td>
                                <td class="py-4 px-2">4.8/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 85%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-4 pr-2">Marketing Digital Avancé</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Business</span></td>
                                <td class="py-4 px-2">968</td>
                                <td class="py-4 px-2">4.7/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 70%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-4 pr-2">Design UX/UI Moderne</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Design</span></td>
                                <td class="py-4 px-2">856</td>
                                <td class="py-4 px-2">4.9/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 90%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-4 pr-2">Intelligence Artificielle</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Développement</span></td>
                                <td class="py-4 px-2">732</td>
                                <td class="py-4 px-2">4.6/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 65%"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 pr-2">Comptabilité pour Débutants</td>
                                <td class="py-4 px-2"><span class="px-2 py-1 bg-custom-purple-10 text-custom-purple rounded-full text-xs">Business</span></td>
                                <td class="py-4 px-2">625</td>
                                <td class="py-4 px-2">4.5/5</td>
                                <td class="py-4 pl-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="custom-purple h-2 rounded-full" style="width: 60%"></div>
                                    </div>
                                </td>
                            </tr>
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
      