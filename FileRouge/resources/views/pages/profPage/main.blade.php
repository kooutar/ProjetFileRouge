<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administratif E-Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-purple {
            background-color: #5932EA;
        }
        .text-custom-purple {
            color: #5932EA;
        }
        .border-custom-purple {
            border-color: #5932EA;
        }
        .hover-custom-purple:hover {
            background-color: #5932EA;
            color: white;
        }
        .bg-custom-purple-10 {
            background-color: rgba(89, 50, 234, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #5932EA;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Sidebar - White Background -->
        <div class="bg-white border-r border-gray-200 w-full md:w-64 md:flex md:flex-col md:fixed md:inset-y-0 z-10">
            <div class="flex flex-col flex-grow overflow-y-auto custom-scrollbar">
                <div class="p-6">
                    <div class="flex items-center mb-8">
                        <div class="custom-purple w-10 h-10 flex items-center justify-center rounded-lg mr-3">
                            <span class="font-bold text-lg text-white">E</span>
                        </div>
                        <span class="text-xl font-bold text-custom-purple">EdLearn Pro</span>
                    </div>
                    
                    <nav class="space-y-2">
                        <a href="/dashboardProf" class="flex items-center px-4 py-3 rounded-lg custom-purple text-white">
                            <span class="mr-3">📊</span>
                            <span>Tableau de bord</span>
                        </a>
                        <a href="/mesCours" class="flex items-center px-4 py-3 rounded-lg text-gray-600 hover-custom-purple transition duration-150">
                            <span class="mr-3">📚</span>
                            <span>Cours</span>
                        </a>
                        {{-- <a href="#" class="flex items-center px-4 py-3 rounded-lg text-gray-600 hover-custom-purple transition duration-150">
                            <span class="mr-3">👥</span>
                            <span>Professeurs</span>
                        </a> --}}
                        
                       
                        <form action="{{ route('logout') }}" method="POST"   class="flex items-center px-4 py-3 rounded-lg text-gray-600 hover-custom-purple transition duration-150 ">
                            @csrf
                            <button >
                                <span class="mr-3">⚙️</span>
                                <span>Deconnexion</span>
                            </button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>

        


  @yield('content')


            </div>
        </div>
    </div>

    <!-- Mobile Menu Button (Shown only on mobile) -->
    <div class="md:hidden fixed bottom-4 right-4 z-20">
        <button id="mobileMenuBtn" class="w-12 h-12 rounded-full custom-purple text-white flex items-center justify-center shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <script src="{{ asset('js/gestionModal.js')}}"></script>
    <script src="{{ asset('js/burggerMenuDashboord.js')}}"></script>
</body>
</html>
