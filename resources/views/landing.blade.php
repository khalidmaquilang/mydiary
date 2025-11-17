<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title>My Diary - Your Personal Digital Journal & Mood Tracker</title>
    <meta name="title" content="My Diary - Your Personal Digital Journal & Mood Tracker">
    <meta name="description" content="Create your personal digital diary with My Diary. Track your moods, capture thoughts and memories in a secure, beautiful journal. Start writing today - completely private and free.">
    <meta name="keywords" content="digital diary, personal journal, mood tracker, private diary, online journal, daily thoughts, memories, secure diary app">
    <meta name="author" content="My Diary">
    <meta name="robots" content="index, follow">
    <meta name="google-adsense-account" content="ca-pub-7977996735911488">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="My Diary - Your Personal Digital Journal & Mood Tracker">
    <meta property="og:description" content="Create your personal digital diary with My Diary. Track your moods, capture thoughts and memories in a secure, beautiful journal. Start writing today - completely private and free.">
    <meta property="og:image" content="{{ url('/') }}/favicon.ico">
    <meta property="og:image:alt" content="My Diary - Digital Journal Application">
    <meta property="og:site_name" content="My Diary">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="My Diary - Your Personal Digital Journal & Mood Tracker">
    <meta property="twitter:description" content="Create your personal digital diary with My Diary. Track your moods, capture thoughts and memories in a secure, beautiful journal. Start writing today - completely private and free.">
    <meta property="twitter:image" content="{{ url('/') }}/favicon.ico">
    <meta property="twitter:image:alt" content="My Diary - Digital Journal Application">
    
    <!-- Additional SEO Tags -->
    <meta name="theme-color" content="#d97706">
    <meta name="msapplication-TileColor" content="#d97706">
    <meta name="format-detection" content="telephone=no">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-amber-50 to-orange-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-amber-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img src="/mydiary.png" alt="My Diary Logo" class="h-16" />
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/app/login" class="text-amber-700 hover:text-amber-800 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Sign In
                    </a>
                    <a href="/app/register" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <main>
        <div class="relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16 text-center">
                <h2 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    Your Personal
                    <span class="text-amber-600">Digital Journal</span>
                </h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto mb-10 leading-relaxed">
                    Capture your thoughts, memories, and experiences in a beautiful, secure digital diary. 
                    Track your moods, reflect on your day, and preserve your life's journey.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/app/register" class="bg-amber-600 hover:bg-amber-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors shadow-lg">
                        Start Writing Today
                    </a>
                    <a href="/app/login" class="bg-white hover:bg-gray-50 text-amber-700 border border-amber-600 px-8 py-4 rounded-lg text-lg font-semibold transition-colors shadow-lg">
                        Sign In
                    </a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Why Choose My Diary?
                    </h3>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        A simple, secure, and beautiful way to document your life
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="text-center p-6">
                        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">✍️</span>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Rich Text Entries</h4>
                        <p class="text-gray-600">
                            Write your thoughts with rich formatting, add structure to your entries, and make them truly yours.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="text-center p-6">
                        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">😊</span>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Mood Tracking</h4>
                        <p class="text-gray-600">
                            Track your daily moods and emotions to better understand patterns in your mental well-being.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="text-center p-6">
                        <div class="bg-amber-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🔒</span>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-3">Private & Secure</h4>
                        <p class="text-gray-600">
                            Your entries are completely private and secure. Only you can access your personal diary.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-amber-600 to-orange-600 py-16">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Start Your Journey?
                </h3>
                <p class="text-xl text-amber-100 mb-8">
                    Join thousands of people who are already documenting their lives with My Diary
                </p>
                <a href="/app/register" class="bg-white hover:bg-gray-100 text-amber-700 px-8 py-4 rounded-lg text-lg font-semibold transition-colors shadow-lg inline-block">
                    Create Your Account
                </a>
            </div>
        </div>
    </main>

    <!-- Support Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                    Love My Diary? Support Our Development!
                </h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Help us keep improving and maintaining this app. Your support allows us to add new features and keep the service free for everyone.
                </p>
            </div>
            
            <!-- Donation Component -->
            <div class="flex justify-center">
                @livewire('donation-support', ['paypalUsername' => 'eskie143'])
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-400">Your personal space for thoughts, memories, and reflections.</p>
                <div class="mt-4 text-sm text-gray-500">
                    &copy; {{ date('Y') }} My Diary. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</body>
</html>