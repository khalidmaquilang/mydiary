<div class="bg-white dark:bg-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 shadow-sm p-6 max-w-md mx-auto">
    <!-- Header -->
    <div class="text-center mb-6">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full mb-4">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Support Our App</h3>
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $donationMessage }}</p>
    </div>

    <!-- Toggle Method -->
    <div class="mb-6">
        <div class="flex items-center justify-center space-x-2">
            <button 
                wire:click="toggleDonationMethod"
                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ !$showQrCode ? 'bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                </svg>
                PayPal Link
            </button>
            <button 
                wire:click="toggleDonationMethod"
                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ $showQrCode ? 'bg-blue-600 text-white hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600' : 'bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600' }}"
            >
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V6a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1zm12 0h2a1 1 0 001-1V6a1 1 0 00-1-1h-2a1 1 0 00-1 1v1a1 1 0 001 1zM5 20h2a1 1 0 001-1v-1a1 1 0 00-1-1H5a1 1 0 00-1 1v1a1 1 0 001 1z"></path>
                </svg>
                QR Code (Gcash, Maya, etc...)
            </button>
        </div>
    </div>

    <!-- PayPal Redirect Button -->
    @if(!$showQrCode)
        <!-- Donation Amount -->
        <div class="mb-6">
            <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Donation Amount ($)
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 dark:text-gray-400">$</span>
                </div>
                <input
                        type="number"
                        id="amount"
                        wire:model.live="amount"
                        min="1"
                        max="10000"
                        step="0.01"
                        class="block w-full pl-7 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-colors"
                        placeholder="5.00"
                />
            </div>
            @error('amount')
            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button 
                wire:click="redirectToPayPal"
                class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 dark:from-blue-500 dark:to-blue-600 dark:hover:from-blue-600 dark:hover:to-blue-700 text-white font-semibold rounded-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
                wire:loading.attr="disabled"
                wire:target="redirectToPayPal"
            >
                <svg wire:loading.remove wire:target="redirectToPayPal" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.3.3 0 0 0-.05-.013c-1.267 6.26-5.11 8.01-9.93 8.01h-2.19c-.524 0-.968.382-1.05.9L6.88 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81.85.97 1.213 2.115 1.074 3.507z"/>
                </svg>
                
                <svg wire:loading wire:target="redirectToPayPal" class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                
                <span wire:loading.remove wire:target="redirectToPayPal">
                    Donate via PayPal
                </span>
                <span wire:loading wire:target="redirectToPayPal">
                    Redirecting...
                </span>
            </button>
        </div>
    @endif

    <!-- QR Code Display -->
    @if($showQrCode)
        <div class="text-center mb-4">
            <div class="inline-block p-4 bg-white rounded-lg border border-gray-200 dark:border-gray-600">
                <img 
                    src="{{ $this->getQrCodeUrl() }}" 
                    alt="PayPal Donation QR Code" 
                    class="w-48 h-48 mx-auto"
                    wire:loading.class="opacity-50"
                />
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-3">
                Scan this QR code to pay using Instapay (Philippines)
            </p>
        </div>
    @endif

    <!-- Footer -->
    <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-700">
        <p class="text-xs text-gray-500 dark:text-gray-400">
            Secure payments powered by PayPal
        </p>
    </div>

    <!-- JavaScript for redirect handling -->
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('redirect', (event) => {
                window.open(event.url, '_blank');
            });
        });
    </script>
</div>
