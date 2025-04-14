@extends('layout.main')
@section('title', 'cours')
@section('content')
<section class="bg-white rounded-xl shadow-md overflow-hidden mt-6 mx-auto max-w-6xl p-6">
    <div class="flex flex-col lg:flex-col gap-6">
      <div class="lg:w-full">
        <img src="{{ asset('storage/'.$cours->image)}}" alt="Image cours" class="rounded-xl w-full object-cover">
      </div>
      <div class="lg:w-full space-y-4">
        <span class="bg-purple-200 text-purple-700 text-sm font-semibold px-3 py-1 rounded-full w-max">Bestseller</span>
        <h2 class="text-2xl font-bold text-gray-800">{{$cours->titre}}</h2>
        <div class="flex items-center gap-2 text-yellow-500">
          ⭐⭐⭐⭐✩ <span class="text-gray-600 text-sm">(4.7 - 328 avis)</span>
        </div>
        <p class="text-sm text-gray-600">👨‍🏫 Prof. {{$cours->nom_professeur}} — Experte en développement Python</p>
        <p class="text-gray-700 leading-relaxed text-sm">
        {{$cours->Description}}
        </p>
  
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-4">
          <div class="bg-gray-100 p-4 rounded-xl text-center">
            <p class="text-indigo-600 font-semibold">📚</p>
            <p class="text-sm text-gray-600">Chapitres</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-xl text-center">
            <p class="text-indigo-600 font-semibold">🎥</p>
            <p class="text-sm text-gray-600">Vidéos</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-xl text-center">
            <p class="text-indigo-600 font-semibold">📁</p>
            <p class="text-sm text-gray-600">Ressources</p>
          </div>
          <div class="bg-gray-100 p-4 rounded-xl text-center">
            <p class="text-indigo-600 font-semibold">🎓</p>
            <p class="text-sm text-gray-600">Certificat inclus</p>
          </div>
        </div>
  
        <div class="flex flex-wrap gap-4 mt-6">
          @if($cours->prix == 0)
          @if (session('estInscrit') == true)
          <form action="/inscrireCours/{{$cours->id}}" method="POST">
            @csrf
            <button onclick="" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-medium">S'inscrire gratutement</button>
            
          </form> 
          @else
              <p class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-medium">deja inscrit</p> 
          @endif

           
          <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-xl font-medium">Ajouter aux favoris</button>
          @else
          <button onclick="document.getElementById('paypalModal').classList.remove('hidden')" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-medium">S'inscrire au cours</button>
          <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-xl font-medium">Ajouter au panier</button>
          @endif
         
         
        </div>
      </div>
    </div>
  </section>



  <section class="mt-10 bg-white p-6 rounded-xl shadow-md max-w-6xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Contenu du cours</h3>
    <div class="text-sm text-gray-500 mb-2">
      8 chapitres · 42 vidéos · Durée totale : 35h
      <a href="#" class="text-indigo-600 hover:underline float-right">Tout développer</a>
    </div>
  
    <!-- Chapitre 1 -->
    <details open class="mb-4">
      <summary class="cursor-pointer bg-gray-100 p-4 rounded-md font-medium text-gray-800 flex items-center justify-between">
        <span>Chapitre 1 : Introduction à Python et configuration</span>
        <span class="text-sm text-gray-500">4 vidéos • 2h30min</span>
      </summary>
      <div class="mt-3 space-y-3 px-4">
        <div class="flex items-start justify-between bg-gray-50 p-3 rounded-md border">
          <span class="text-gray-700">1.1 Présentation de Python et son écosystème</span>
          <button class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full hover:bg-indigo-200">Commencer</button>
        </div>
        <div class="flex items-start justify-between bg-gray-50 p-3 rounded-md border">
          <span class="text-gray-700">1.2 Installation de Python et configuration de l’environnement</span>
          <button class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full hover:bg-indigo-200">Commencer</button>
        </div>
        <div class="flex items-start justify-between bg-gray-50 p-3 rounded-md border">
          <span class="text-gray-700">1.3 Utilisation des éditeurs et IDE pour Python</span>
          <button class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full hover:bg-indigo-200">Commencer</button>
        </div>
        <div class="flex items-start justify-between bg-gray-50 p-3 rounded-md border">
          <span class="text-gray-700">1.4 Votre premier programme Python</span>
          <button class="bg-indigo-100 text-indigo-600 text-xs px-3 py-1 rounded-full hover:bg-indigo-200">Commencer</button>
        </div>
      </div>
    </details>
  
    <!-- Autres chapitres (collapsed) -->
    <details class="mb-2">
      <summary class="cursor-pointer bg-gray-100 p-4 rounded-md font-medium text-gray-800 flex items-center justify-between">
        <span>Chapitre 2 : Variables, types de données et opérateurs</span>
        <span class="text-sm text-gray-500">6 vidéos • 4h15min</span>
      </summary>
    </details>
  
    <details class="mb-2">
      <summary class="cursor-pointer bg-gray-100 p-4 rounded-md font-medium text-gray-800 flex items-center justify-between">
        <span>Chapitre 3 : Structures de contrôle</span>
        <span class="text-sm text-gray-500">5 vidéos • 3h45min</span>
      </summary>
    </details>
  
    <details class="mb-2">
      <summary class="cursor-pointer bg-gray-100 p-4 rounded-md font-medium text-gray-800 flex items-center justify-between">
        <span>Chapitre 4 : Fonctions et modules</span>
        <span class="text-sm text-gray-500">5 vidéos • 4h</span>
      </summary>
    </details>
  
    <div class="mt-4 text-center">
      <a href="#" class="text-indigo-600 hover:underline text-sm font-medium">Voir les 4 autres chapitres ↓</a>
    </div>
  </section>

  
  <section class="mt-10 bg-white p-6 rounded-xl shadow-md max-w-6xl mx-auto">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Forum de discussion</h3>
  
    <!-- Input pour poser une question -->
    <div class="mb-6">
      <textarea
        rows="3"
        placeholder="Posez votre question ou partagez vos impressions..."
        class="w-full p-4 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-700"
      ></textarea>
      <div class="flex justify-end mt-2">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700">Publier</button>
      </div>
    </div>
  
    <!-- Message 1 -->
    <div class="mb-6 border-t pt-4">
      <div class="flex gap-3 items-start">
        <img src="https://i.pravatar.cc/40?img=3" alt="avatar" class="w-10 h-10 rounded-full" />
        <div class="flex-1">
          <div class="text-sm font-semibold text-gray-800">Lucas Martin</div>
          <div class="text-xs text-gray-500 mb-2">Il y a 2 jours</div>
          <p class="text-gray-700 text-sm">
            Bonjour, j’ai un problème avec l’installation de Python sur Windows 11. J’obtiens une erreur lors de l’exécution
            du script mentionné dans la vidéo 1.2. Quelqu’un pourrait-il m’aider ?
          </p>
          <div class="mt-2 text-sm text-gray-500 flex items-center gap-2">
            <button class="hover:underline text-indigo-600">Répondre</button> ·
            <span class="text-xs">12 👍</span>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Réponse 1 -->
    <div class="mb-6 ml-12">
      <div class="flex gap-3 items-start">
        <img src="https://i.pravatar.cc/40?img=6" alt="avatar" class="w-9 h-9 rounded-full" />
        <div class="flex-1">
          <div class="text-sm font-semibold text-indigo-600">Prof. Marie Laurent <span class="text-xs bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full ml-2">Formateur</span></div>
          <div class="text-xs text-gray-500 mb-2">Il y a 1 jour</div>
          <p class="text-gray-700 text-sm">
            Bonjour Lucas, pourriez-vous partager le message d’erreur exact ? Et vérifiez aussi les droits d'administrateur pendant l'installation.
          </p>
        </div>
      </div>
    </div>
  
    <!-- Message 2 -->
    <div class="mb-6 border-t pt-4">
      <div class="flex gap-3 items-start">
        <img src="https://i.pravatar.cc/40?img=8" alt="avatar" class="w-10 h-10 rounded-full" />
        <div class="flex-1">
          <div class="text-sm font-semibold text-gray-800">Emma Leclerc</div>
          <div class="text-xs text-gray-500 mb-2">Il y a 5 jours</div>
          <p class="text-gray-700 text-sm">
            J’ai beaucoup aimé la vidéo sur les boucles, c’est bien bien expliqué ! Est-ce qu’il y aura une suite pour les compréhensions de liste ?
          </p>
          <div class="mt-2 text-sm text-gray-500 flex items-center gap-2">
            <button class="hover:underline text-indigo-600">Répondre</button> ·
            <span class="text-xs">18 👍</span>
          </div>
        </div>
      </div>
    </div>
  
    <div class="text-center mt-6">
      <a href="#" class="text-indigo-600 hover:underline text-sm font-medium">Afficher plus de discussions</a>
    </div>
  </section>

  
  <section class="mt-10 bg-white p-6 rounded-xl shadow-md max-w-6xl mx-auto mb-10">
    <h3 class="text-xl font-semibold text-gray-800 mb-4">Évaluations et avis</h3>
  
    <!-- Note globale -->
    <div class="flex items-center gap-6">
      <div class="text-center">
        <div class="text-4xl font-bold text-yellow-500">4.7</div>
        <div class="text-sm text-gray-600">328 avis</div>
      </div>
  
      <!-- Barre de notation -->
      <div class="flex-1 space-y-1">
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600 w-10">5 étoiles</span>
          <div class="w-full h-2 bg-gray-200 rounded-full">
            <div class="h-2 bg-yellow-400 rounded-full" style="width: 80%;"></div>
          </div>
          <span class="text-xs text-gray-500 w-6">80%</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600 w-10">4 étoiles</span>
          <div class="w-full h-2 bg-gray-200 rounded-full">
            <div class="h-2 bg-yellow-400 rounded-full" style="width: 15%;"></div>
          </div>
          <span class="text-xs text-gray-500 w-6">15%</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600 w-10">3 étoiles</span>
          <div class="w-full h-2 bg-gray-200 rounded-full">
            <div class="h-2 bg-yellow-400 rounded-full" style="width: 3%;"></div>
          </div>
          <span class="text-xs text-gray-500 w-6">3%</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600 w-10">2 étoiles</span>
          <div class="w-full h-2 bg-gray-200 rounded-full">
            <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%;"></div>
          </div>
          <span class="text-xs text-gray-500 w-6">1%</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="text-sm text-gray-600 w-10">1 étoile</span>
          <div class="w-full h-2 bg-gray-200 rounded-full">
            <div class="h-2 bg-yellow-400 rounded-full" style="width: 1%;"></div>
          </div>
          <span class="text-xs text-gray-500 w-6">1%</span>
        </div>
      </div>
    </div>
  
    <!-- Avis étudiants -->
    <div class="mt-8">
      <h4 class="text-lg font-semibold text-gray-700 mb-4">Avis des étudiants</h4>
  
      <!-- Avis 1 -->
      <div class="mb-6">
        <div class="flex gap-3 items-start">
          <img src="https://i.pravatar.cc/40?img=14" class="w-10 h-10 rounded-full" />
          <div>
            <div class="font-semibold text-gray-800">Thomas Bernard</div>
            <div class="flex items-center gap-1 text-yellow-400 text-sm">
              ★★★★★
            </div>
            <p class="text-sm text-gray-700 mt-1">
              Un cours exceptionnel ! Les explications sont claires et les exemples pratiques m'ont permis de rapidement mettre en application les concepts.
            </p>
            <div class="text-xs text-gray-500 mt-1">Il y a 2 semaines</div>
          </div>
        </div>
      </div>
  
      <!-- Avis 2 -->
      <div class="mb-4">
        <div class="flex gap-3 items-start">
          <img src="https://i.pravatar.cc/40?img=12" class="w-10 h-10 rounded-full" />
          <div>
            <div class="font-semibold text-gray-800">Julie Moreau</div>
            <div class="flex items-center gap-1 text-yellow-400 text-sm">
              ★★★★☆
            </div>
            <p class="text-sm text-gray-700 mt-1">
              J’ai apprécié la structure du cours et la qualité des exercices proposés. Néanmoins, j’aurais aimé plus d’approfondissements.
            </p>
            <div class="text-xs text-gray-500 mt-1">Il y a 3 semaines</div>
          </div>
        </div>
      </div>
    </div>
  </section>




  
<!-- Modale PayPal -->
<div id="paypalModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg relative max-h-[90vh] overflow-y-auto">
    
    <!-- Fermer -->
    <button onclick="document.getElementById('paypalModal').classList.add('hidden')" 
            class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

    <h2 class="text-lg font-bold text-gray-800 mb-4">Paiement sécurisé avec PayPal</h2>

    <!-- Conteneur bouton PayPal -->
    <div class="max-w-1/2 my-5 mx-auto text-center">
      <div id="paypal-button-container"></div>
    </div>

  </div>
</div>



  
@endSection
@section('scripts')
<script>
  paypal.Buttons({
    style: {
      layout: 'vertical',   // 'horizontal' ou 'vertical'
      color: 'gold',        // 'gold', 'blue', 'silver', 'white', 'black'
      shape: 'rect',        // 'rect' ou 'pill'
      label: 'checkout'     // 'paypal', 'checkout', 'buynow', etc.
    },
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '10.00'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        alert('Transaction completed by ' + details.payer.name.given_name);
      });
    }
  }).render('#paypal-button-container');
</script>
    
@endSection