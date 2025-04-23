@extends('layout.main')
@section('title', 'cours')
@section('content')

<div class="max-w-5xl mx-auto p-6 bg-white rounded-2xl shadow-md mt-10">
    <!-- Titre -->
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-2xl font-semibold text-gray-800">🎓 Profil Étudiant</h1>
      <a href="{{ route('logout') }}" class="text-red-500 hover:text-red-700 text-sm">Se déconnecter</a>
    </div>
  
    <!-- Infos Étudiant -->
    <div class="flex flex-col md:flex-row gap-6 items-center md:items-start mb-10">
      <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-indigo-200 shadow-md">
        <img src="{{ Auth::user()->avatar ?? asset('images/default-avatar.png') }}" alt="Avatar" class="w-full h-full object-cover">
      </div>
      <div class="flex-1">
        <h2 class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
        <p class="text-gray-600 text-sm">{{ Auth::user()->email }}</p>
        <span class="inline-block mt-2 px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-xs font-medium">Étudiant</span>
      </div>
    </div>
  
    <!-- Cours suivis -->
    <div>
      <h3 class="text-xl font-semibold text-gray-800 mb-4">📚 Mes Cours</h3>
      @if($etudiant->isEmpty())
      <p class="text-gray-500">Aucun cours suivi pour le moment.</p>
      @else 
      <p class="text-gray-500">Vous suivez {{ $etudiant->count() }} Cours.</p>
      @foreach($etudiant as $coursItem)
      <div class="bg-gray-50 p-4 rounded-xl shadow-sm mb-4">
        <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-indigo-700">{{ $coursItem->titre }} </h4>
        <span class="text-sm text-gray-500"> {{ $coursItem->progress }} %</span>
        </div>
        <p class="text-sm text-gray-600 mt-1"> {{ $coursItem->description }} </p>
       <p></p>
        <!-- Barre de progress -->
        <div class="w-full h-3 bg-gray-200 rounded-full mt-3">
        <div class="h-3 bg-indigo-500 rounded-full" style="width: {{ $coursItem->progress }}%"></div>
        </div>
        <p>{{$coursItem->id_user}}</p>
        <div class="flex justify-centre mt-4">
      @if ($coursItem->progress == 100)
            <a href="/certificat/{{$coursItem->id_user}}/{{$coursItem->titre}}" class="p-4 bg-indigo-400 rounded-3xl text-white hover:bg-indigo-700">telecharger certificat</a>
        @else
            <button class="p-4 bg-indigo-400 rounded-3xl text-white hover:bg-indigo-700">voir cours</button> 
        @endif
      </div>
      </div>
      @endforeach
      @endif
     
    </div>
  </div>
@endSection