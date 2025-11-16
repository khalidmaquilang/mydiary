@php use App\Filament\Pages\Support; @endphp

<x-filament-widgets::widget>
    <x-filament::section class="p-0 overflow-hidden">
        <div class="bg-gradient-to-br from-pink-50 via-purple-50 to-indigo-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-900 p-6 rounded-lg border border-gray-200 dark:border-gray-700">
            <!-- Header with Icon -->
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-pink-500 to-purple-600 rounded-full shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Support Our App
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Help us keep improving and maintaining this diary app
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="mb-6">
                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed mb-4">
                    Your support means the world to us! Every donation helps us continue developing new features, 
                    maintaining the app, and providing you with the best diary experience possible.
                </p>
                
                <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mb-4">
                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Secure payments • Multiple payment options</span>
                </div>
            </div>

            <!-- Call to Action Button -->
            <div class="flex items-center justify-between">
                <a 
                    href="{{ Support::getUrl() }}" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-800"
                >
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span>Make a Donation</span>
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                
                <div class="text-right">
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        PayPal • QR Code
                    </div>
                    <div class="text-xs text-gray-400 dark:text-gray-500">
                        Starting from $1
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
