@extends('pages.AdminPage.main')
@section('content')

<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
    <div class="p-4 md:p-8">

        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Gestion des Cours</h1>
            <div class="flex items-center bg-white py-2 px-4 rounded-full shadow">
                <img src="{{asset('images/ana.jpg')}}" class="w-8 h-8 rounded-full mr-2" alt="Avatar">
            <span class="text-gray-700">Admin</span>
            </div>
        </div>

        <!-- Statistiques -->
     

        <!-- Filtres -->
       

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