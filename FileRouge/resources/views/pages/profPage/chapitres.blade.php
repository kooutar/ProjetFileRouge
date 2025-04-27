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
                    <button  onclick="toggleEditModal({{ $chapitre->id }})" class="px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                        Modifier
                    </button>

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

@foreach($chapitres as $chapitre)
<div id="modalEditChapitre-{{ $chapitre->id }}" class="fixed inset-0 bg-black bg-opacity-40 hidden flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-xl w-full max-w-lg relative">
        <h2 class="text-xl font-bold mb-4 text-indigo-700">Éditer le chapitre</h2>
        <form action="{{ route('chapitres.update', $chapitre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-medium mb-1">Titre du chapitre</label>
                <input type="text" name="titrechapitre" value="{{ $chapitre->titrechapitre }}" class="w-full p-2 border rounded-xl" />
            </div>
            <div class="mb-4">
                <label class="block font-medium mb-1">Vidéo</label>
                <input type="file" name="pathVedio" accept="video/*" class="w-full p-2 border rounded-xl" />
               
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" onclick="toggleEditModal({{ $chapitre->id }})" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<script>
    function toggleEditModal(id) {
        const modal = document.getElementById('modalEditChapitre-' + id);
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('hidden');
        }
    }
</script>

@endsection
