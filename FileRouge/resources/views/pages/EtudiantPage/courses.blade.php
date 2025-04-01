@extends('layout.main')
@section('title', 'cours')
@section('content')
<main>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Hero section -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Explorez nos cours en ligne</h1>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">Développez vos compétences avec notre sélection de cours de qualité dans différents domaines.</p>
        </div>

        <!-- Search and filter section -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:space-x-6 space-y-4 md:space-y-0">
                <!-- Search bar -->
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher des cours..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <div class="absolute left-3 top-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Category filter -->
                <div class="w-full md:w-48">
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none bg-white">
                        <option value="">Catégorie</option>
                        <option value="marketing">Marketing</option>
                        <option value="design">Design</option>
                        <option value="dev">Développement</option>
                        <option value="business">Business</option>
                        <option value="personal">Développement personnel</option>
                    </select>
                </div>

                <!-- Subcategory filter -->
                <div class="w-full md:w-48">
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent appearance-none bg-white">
                        <option value="">Sous-catégorie</option>
                        <option value="web-marketing">Web Marketing</option>
                        <option value="social-media">Social Media</option>
                        <option value="seo">SEO</option>
                        <option value="email-marketing">Email Marketing</option>
                        <option value="content-marketing">Content Marketing</option>
                    </select>
                </div>

                <!-- Filter button -->
                <button class="bg-primary hover:bg-purple-800 text-white px-6 py-2 rounded-lg font-medium">
                    Filtrer
                </button>
            </div>
        </div>

        <!-- Course grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Course card 1 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Marketing Strategy" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium">Bestseller</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-blue-500 font-medium">Marketing</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.9 (128)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Stratégies avancées de marketing d'influence</h3>
                    <p class="text-gray-600 mb-4">
                        Maîtrisez les techniques les plus efficaces pour créer des campagnes d'influence à fort impact et mesurer précisément vos résultats.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">299€</span>
                        <span class="text-gray-500 text-sm">12 modules • 6h de contenu</span>
                    </div>

                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 2 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Web Development" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-green-500 font-medium">Développement</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.8 (95)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Développement Full Stack JavaScript</h3>
                    <p class="text-gray-600 mb-4">
                        Devenez développeur full stack en maîtrisant JavaScript, React, Node.js et MongoDB pour créer des applications web modernes.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">349€</span>
                        <span class="text-gray-500 text-sm">18 modules • 10h de contenu</span>
                    </div>
                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 3 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Business Strategy" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium">Bestseller</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-orange-500 font-medium">Business</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">5.0 (210)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Lancer et développer sa startup</h3>
                    <p class="text-gray-600 mb-4">
                        De l'idée au financement, tous les outils pour créer une startup viable, attirer des investisseurs et développer son entreprise.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">399€</span>
                        <span class="text-gray-500 text-sm">15 modules • 8h de contenu</span>
                    </div>
                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 4 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Personal Development" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-purple-500 font-medium">Développement personnel</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.7 (83)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Productivité et gestion du temps</h3>
                    <p class="text-gray-600 mb-4">
                        Optimisez votre emploi du temps, éliminez les distractions et développez des habitudes de travail efficaces.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">199€</span>
                        <span class="text-gray-500 text-sm">8 modules • 4h de contenu</span>
                    </div>
                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 5 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Design" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-red-500 font-medium">Design</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.8 (156)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">UI/UX Design : de débutant à expert</h3>
                    <p class="text-gray-600 mb-4">
                        Apprenez à créer des interfaces utilisateur intuitives et des expériences utilisateur engageantes pour apps et sites web.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">329€</span>
                        <span class="text-gray-500 text-sm">14 modules • 7h de contenu</span>
                    </div>

                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 6 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Social Media" class="w-full h-full object-cover">
                    <div class="absolute top-4 left-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-medium">Bestseller</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-blue-500 font-medium">Marketing</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.9 (176)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Social Media Marketing : stratégie complète</h3>
                    <p class="text-gray-600 mb-4">
                        Élaborez une stratégie social media performante et boostez votre présence sur Instagram, TikTok, LinkedIn et Facebook.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">279€</span>
                        <span class="text-gray-500 text-sm">10 modules • 5h de contenu</span>
                    </div>
                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

            <!-- Course card 7 -->
            <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-transform hover:scale-105">
                <div class="h-48 bg-gray-200 relative">
                    <img src="https://images.unsplash.com/photo-1543269664-76bc3997d9ea?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Data Science" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-green-500 font-medium">Développement</span>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-gray-700 ml-1">4.7 (123)</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Introduction à la Data Science avec Python</h3>
                    <p class="text-gray-600 mb-4">
                        Apprenez Python et les bibliothèques essentielles comme Pandas, NumPy et Matplotlib pour l'analyse de données.
                    </p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-purple-600 font-bold text-lg">349€</span>
                        <span class="text-gray-500 text-sm">16 modules • 9h de contenu</span>
                    </div>
                    <button class="w-full py-3 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        Inscrivez-vous
                    </button>
                </div>
            </div>

        </div>
    </div>
</main>
@endSection
{{-- 
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const profileButton = document.querySelector('.flex.items-center.space-x-2');
    const dropdownMenu = document.querySelector('.absolute.right-0.mt-2.w-48');
    
    if (profileButton && dropdownMenu) {
        profileButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
    }
});
</script> --}}