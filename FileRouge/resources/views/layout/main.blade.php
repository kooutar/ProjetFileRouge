<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
     <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#9333EA',
                        primaryDark: '#7B28D1',
                        custompurple: '#A1A5D3',//for about
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 ">
    <!-- Navigation -->
     
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-primary text-xl font-bold">LOGO</span>
                </div>
                
                <!-- Menu desktop -->
                <div class="hidden md:flex items-center justify-center flex-1">
                    <div class="flex space-x-8">
                        <a href="/" class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium">Home</a>
                        <a href="/about" class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium">About</a>
                        <a href="#" class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium">Services</a>
                        <a href="/courses" class="text-gray-700 hover:text-primary px-3 py-2 text-sm font-medium">Cours</a>
                    </div>
                </div>
                 @guest
                             <!-- Boutons d'authentification desktop -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="/inscriptionProf" class="text-primary border border-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition duration-200">S'inscrire comme prof</a>
                    <a href="/login" class="text-primary border border-primary px-4 py-2 rounded-lg hover:bg-primary hover:text-white transition duration-200">Login</a>
                    <a href="/inscriptionEtudiant" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primaryDark transition duration-200">S'inscrire</a> 
                </div>
                 
                 @endguest
               
                @auth
                    <p>hi</p>
                @endauth

                <!-- Bouton hamburger mobile -->
                <div class="flex md:hidden items-center">
                    <button id="mobile-menu-button" class="text-primary focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="text-gray-700 hover:text-primary block px-3 py-2 text-base font-medium">Home</a>
                <a href="/about" class="text-gray-700 hover:text-primary block px-3 py-2 text-base font-medium">About</a>
                <a href="#" class="text-gray-700 hover:text-primary block px-3 py-2 text-base font-medium">Services</a>
                <a href="/courses" class="text-gray-700 hover:text-primary block px-3 py-2 text-base font-medium">Cours</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex flex-col space-y-3 px-4">
                  
                    <a href="/login" class="text-primary border border-primary px-4 py-2 rounded text-center hover:bg-primary hover:text-white transition duration-200">Login</a>
                    <a href="/inscriptionEtudiant" class="bg-primary text-white px-4 py-2 rounded text-center hover:bg-primaryDark transition duration-200">S'inscrire</a>
                    <a href="/inscriptionProf" class="bg-primary text-white px-4 py-2 rounded text-center hover:bg-primaryDark transition duration-200">S'inscrire comme prof</a>
                   
                </div>
            </div>
        </div>
    </nav>


  @yield('content')

  <section class="bg-indigo-900 py-16 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold leading-tight">Win the hearts and minds of your audience with influencers</h2>
            
            <!-- This section can include CTA buttons or form -->
            <div class="mt-10">
                <button class="bg-primary hover:bg-purple-700 text-white font-medium py-3 px-8 rounded-full transition duration-300">
                    Get Started
                </button>
                <button class="ml-4 border-2 border-white hover:bg-white hover:text-indigo-900 text-white font-medium py-3 px-8 rounded-full transition duration-300">
                    Learn More
                </button>
            </div>
        </div>
    </div>
</section>
<footer class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <div class="flex items-center mb-4">
                    <img src="path/to/logo-white.png" alt="Influozy" class="h-8">
                    <span class="ml-2 text-xl font-bold">influozy</span>
                </div>
                <p class="text-gray-400 mb-6">
                    Influencer marketing platform connecting brands with the right influencers to reach their target audience effectively.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Case Studies</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Content Ideas</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Marketing Ads</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Media Analytics</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Product Branding</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Influencer Matching</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-400">123 Marketing Street, Digital City, 10010</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-400">info@influozy.com</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-400">+1 (555) 123-4567</span>
                    </li>
                </ul>
                
                <div class="mt-6">
                    <h4 class="text-sm font-semibold mb-3">Subscribe to our newsletter</h4>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-900">
                        <button type="submit" class="bg-primary hover:bg-purple-700 px-4 py-2 rounded-r-lg transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2025 Influozy. All rights reserved.</p>
                <div class="mt-4 md:mt-0">
                    <ul class="flex space-x-6">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Cookies Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
   // Mobile menu toggle with animation
   const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
});

// Mobile services dropdown toggle without animation
const mobileServicesButton = document.getElementById('mobile-services-button');
const mobileServicesDropdown = document.getElementById('mobile-services-dropdown');

mobileServicesButton.addEventListener('click', function() {
    mobileServicesDropdown.classList.toggle('hidden');
});

</script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Succès !',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
</body>
</html>