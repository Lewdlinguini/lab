@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center text-gray-900 dark:text-gray-100">
                    <h1 class="font-bold text-3xl mb-4">{{ __("You're logged in!") }}</h1>
                    <p class="mb-8 text-lg">Enjoy exploring your book collection!</p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        <!-- Random Book Emojis -->
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📖</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📙</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📘</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📔</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📒</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📕</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📓</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📗</span>
                        </div>
                        <div class="flex justify-center items-center p-4 bg-gray-100 dark:bg-gray-700 rounded-lg transition-transform duration-200 transform hover:scale-110">
                            <span class="text-5xl">📚</span>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h2 class="font-bold text-2xl mb-4">📚 Your Book Collection 📚</h2>
                        <p class="text-lg">Feel free to explore and discover new titles!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
