@extends('layout.main')
@section('title', 'Inscription  Professeur')
@section('content')
<main class="container mx-auto px-4 py-8 md:py-12">
    <div class="max-w-3xl mx-auto">
        <!-- En-tête du formulaire -->
        <div class="text-center mb-10">
            <p class="text-green-500 font-medium mb-2">Espace professeur</p>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Formulaire d'inscription</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Rejoignez notre communauté de professeurs et partagez votre expertise avec nos étudiants.
                Remplissez le formulaire ci-dessous pour commencer.
            </p>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
            <form action="#" method="POST">
                <!-- Informations personnelles -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                        Informations personnelles
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">Prénom*</label>
                            <input type="text" id="firstName" name="firstName" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Nom*</label>
                            <input type="text" id="lastName" name="lastName" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone*</label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance*</label>
                            <input type="date" id="birthdate" name="birthdate" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
                            <select id="gender" name="gender"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option value="">Sélectionner</option>
                                <option value="male">Homme</option>
                                <option value="female">Femme</option>
                                
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Qualifications et expérience -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                        Qualifications et expérience
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="highestDegree" class="block text-sm font-medium text-gray-700 mb-1">Diplôme le plus élevé*</label>
                            <select id="highestDegree" name="highestDegree" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                                <option value="">Sélectionner</option>
                                <option value="license">Licence</option>
                                <option value="master">Master</option>
                                <option value="doctorate">Doctorat</option>
                                <option value="other">Autre</option>
                            </select>
                        </div>
                        <div>
                            <label for="field" class="block text-sm font-medium text-gray-700 mb-1">Domaine d'études*</label>
                            <input type="text" id="field" name="field" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="university" class="block text-sm font-medium text-gray-700 mb-1">Université/École*</label>
                            <input type="text" id="university" name="university" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                        <div>
                            <label for="yearsExperience" class="block text-sm font-medium text-gray-700 mb-1">Années d'expérience*</label>
                            <input type="number" id="yearsExperience" name="yearsExperience" min="0" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        </div>
                    </div>

                  
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Courte biographie*</label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Parlez de votre expérience d'enseignement, vos méthodes pédagogiques, etc."></textarea>
                    </div>
                </div>

                <!-- Informations supplémentaires -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                        Informations supplémentaires
                    </h2>
                    <div class="mt-6">
                        <label for="resume" class="block text-sm font-medium text-gray-700 mb-1">CV (PDF)*</label>
                        <input type="file" id="resume" name="resume" accept=".pdf" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
                    
                    <div class="mt-6">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo de profil</label>
                        <input type="file" id="photo" name="photo" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
                </div>

                <!-- Conditions générales -->
                <div class="mb-8">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" required
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">J'accepte les conditions générales*</label>
                            <p class="text-gray-500">En soumettant ce formulaire, vous acceptez nos <a href="#" class="text-purple-600 hover:underline">conditions d'utilisation</a> et notre <a href="#" class="text-purple-600 hover:underline">politique de confidentialité</a>.</p>
                        </div>
                    </div>
                </div>

                <!-- Boutons de soumission -->
                <div class="flex flex-col sm:flex-row justify-end gap-4">
                    <button type="reset" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Réinitialiser
                    </button>
                    <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                        Soumettre la candidature
                    </button>
                </div>
            </form>
        </div>

        <!-- Informations supplémentaires -->
        <div class="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Informations importantes</h3>
            <ul class="list-disc list-inside text-blue-700 space-y-1">
                <li>Tous les champs marqués d'un astérisque (*) sont obligatoires.</li>
                <li>Votre candidature sera examinée par notre équipe pédagogique dans un délai de 7 jours ouvrables.</li>
                <li>Assurez-vous que votre CV est à jour et inclut toutes vos qualifications pertinentes.</li>
                <li>Pour toute question concernant le processus de recrutement, contactez-nous à <a href="mailto:recrutement@eduplateforme.fr" class="underline">recrutement@eduplateforme.fr</a>.</li>
            </ul>
        </div>
    </div>
</main>
@endSection