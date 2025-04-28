@extends('pages.AdminPage.main')
@section('content')

<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
    <div class="p-4 md:p-8">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Gestion des Cours</h1>
            <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                <img src="/api/placeholder/40/40" class="w-8 h-8 rounded-full mr-2" alt="Avatar">
                <span class="text-gray-700">Admin</span>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">

            <!-- Total cours -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-purple-100 text-purple-600 mb-4 text-xl">
                    📚
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Total cours</p>
                <p class="text-2xl font-bold text-gray-800">{{ $courses->count()}} total</p>
                <p class="text-xs text-green-500 mt-2">↑ 70% depuis le mois dernier</p>
            </div>

            <!-- En attente -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-purple-100 text-purple-600 mb-4 text-xl">
                    ⏳
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">En attente</p>
                <p class="text-2xl font-bold text-gray-800">{{$pendingCount}} en attente</p>
                <p class="text-xs text-red-500 mt-2">↑ 30% depuis le mois dernier</p>
            </div>

            <!-- Taux d’approbation -->
            <div class="bg-white rounded-xl shadow p-6">
                <div class="w-12 h-12 flex items-center justify-center rounded-lg bg-purple-100 text-purple-600 mb-4 text-xl">
                    ✅
                </div>
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Taux d'approbation</p>
                <p class="text-2xl font-bold text-gray-800">5%</p>
                <p class="text-xs text-green-500 mt-2">↑ 0% depuis le mois dernier</p>
            </div>
        </div>

        <!-- Filtres -->
        <div class="bg-white rounded-xl shadow p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex flex-col sm:flex-row gap-3">

                    <!-- Recherche -->
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Rechercher..."
                               class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg w-full sm:w-64">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Statut -->
                    <select name="status" class="border border-gray-300 rounded-lg px-4 py-2">
                        <option value="all">Tous les statuts</option>
                        <option value="pending" @selected(request('status')=='pending')>En attente</option>
                        <option value="accepted" @selected(request('status')=='accepted')>Approuvé</option>
                        <option value="rejected" @selected(request('status')=='rejected')>Refusé</option>
                    </select>

                    <!-- Catégorie -->
                    <select name="category" class="border border-gray-300 rounded-lg px-4 py-2">
                        <option value="all">Toutes les catégories</option>
                        {{-- @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(request('category')==$cat->id)>
                                {{ $cat->name }}
                            </option>
                        @endforeach --}}
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <a href=""
                       class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Exporter CSV
                    </a>
                    <a href=""
                       class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                        Nouveau Cours
                    </a>
                </div>
            </div>
        </div>

        <!-- Tableau -->
        <div class="bg-white rounded-xl shadow overflow-hidden mb-8">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cours</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Professeur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Soumis le</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Chapitres</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                    <tr x-data="{ open:false }" class="group">
                        <!-- Titre -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                           {{ $course->titre }}
                        </td>
                        <!-- Catégorie -->
                       
                        <!-- Professeur -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          {{  $course->professeur->name }}
                        </td>
                        <!-- Date -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           {{  $course->created_at->translatedFormat('d F Y') }}
                        </td>
                        <!-- Statut -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $colors = [
                                    'pending'=>'bg-yellow-100 text-yellow-800',
                                    'accepted'=>'bg-green-100 text-green-800',
                                    'rejected'=>'bg-red-100 text-red-800',
                                ];
                            @endphp
                            <span
                                class="px-2 py-1 inline-flex text-xs font-semibold rounded-full ">
                              {{ ucfirst($course->status) }}
                            </span>
                        </td>
                        <!-- Chapitres -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button @click="open=!open"
                                    class="text-purple-600 hover:underline text-xs focus:outline-none">
                               {{ $course->chapitres->count() }} Chapitres
                            </button>
                        </td>
                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-2">
                                <form method="POST" action="{{route('accepter.cours', $course->id)}}">
                                    @csrf
                                    <button
                                        class="px-3 py-1 bg-green-500 text-white rounded-lg text-xs hover:bg-green-600">
                                        Accepter
                                    </button>
                                </form>
                                <form method="POST" action="{{route('refuser.cours', $course->id)}}">
                                    @csrf
                                    <button
                                        class="px-3 py-1 bg-red-500 text-white rounded-lg text-xs hover:bg-red-600">
                                        Refuser
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <!-- Ligne chapitres -->
                    <tr x-show="open" x-cloak>
                        <td colspan="7" class="bg-gray-50 px-8 py-4">
                            <ul class="space-y-2">
                                {{-- @foreach ($course->chapters as $chapter)
                                    <li class="flex items-center">
                                        <span class="mr-2">📄</span>
                                        <span>{{ $chapter->position }}. {{ $chapter->title }}</span>
                                    </li>
                                @endforeach --}}
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="bg-white rounded-xl shadow p-4">
            {{ $courses->links('vendor.pagination.tailwind') }}
        </div> --}}
    </div>
</div>




@endSection