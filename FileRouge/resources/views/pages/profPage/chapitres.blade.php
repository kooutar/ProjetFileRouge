@extends('pages.profPage.main')
@section('content')
<div class="flex-1 md:ml-64 overflow-y-auto custom-scrollbar">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($chapitres as $chapitre)
        <div class=" rounded-lg shadow-md overflow-hidden">
            <div class="p-4">
                <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $chapitre->titrechapitre }}</h5>
                
                <div class="aspect-w-16 aspect-h-9 mb-4">
                    <video controls class="w-full h-48 object-cover rounded" data-chapitre-id="{{ $chapitre->id }}">
                        <source src="{{ asset('storage/'.$chapitre->pathVedio) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la vidéo.
                    </video>
                </div>

                <div class="flex justify-between">
                    <a href="" class="px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                        Modifier
                    </a>

                    <form action="{{ route('chapitres.destroy', $chapitre->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce chapitre ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
