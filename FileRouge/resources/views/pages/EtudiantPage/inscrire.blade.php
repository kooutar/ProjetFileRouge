@extends('layout.main')
@section('title', 'Inscription  Etudiant')
@section('content')
<div class="bg-gray-50  flex items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Sign up</h1>
            <form>
                <div class="mb-6">
                    <label class="flex items-center mb-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Your Name</span>
                    </label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                </div>
                
                <div class="mb-6">
                    <label class="flex items-center mb-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Your Email</span>
                    </label>
                    <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                </div>
                
                <div class="mb-6">
                    <label class="flex items-center mb-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span>Password</span>
                    </label>
                    <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                </div>
                
                <div class="mb-6">
                    <label class="flex items-center mb-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <span>Repeat your password</span>
                    </label>
                    <input type="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                </div>
                
                <div class="mb-6">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-primary rounded focus:ring-primary" required>
                        <span class="ml-2">
                            I agree all statements in 
                            <a href="#" class="text-primary hover:underline">Terms of service</a>
                        </span>
                    </label>
                </div>
                <a href="{{ url('/auth/google') }}" class="btn-google">
                    <img src="{{ asset('images/google-logo.png') }}" alt="Google Logo" class="google-icon">
                    Se connecter avec Google
                </a>
                
                <button type="submit" class="w-full bg-primary hover:bg-purple-800 text-white font-bold py-3 px-4 rounded-md transition duration-300">
                    Register
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="#" class="text-primary hover:underline">I am already member</a>
            </div>
        </div>
        
        <!-- Image Section -->
        <div class="hidden md:block md:w-1/2 bg-purple-50 p-8">
            <div class="flex justify-center items-center h-full">
                <img src="{{asset('images/photo.jpg')}}" alt="Workspace illustration" class="max-w-full h-auto">
            </div>
        </div>
    </div>
</div>
@endSection