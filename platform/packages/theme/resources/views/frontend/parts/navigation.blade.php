@props(['settings' => null])

@php
    $navigation = [
        ['name' => 'Home', 'href' => '/'],
        ['name' => 'About', 'href' => '/about'],
        ['name' => 'Products', 'href' => '/products'],
        ['name' => 'Services', 'href' => '/services'],
        ['name' => 'Blog', 'href' => '/blog'],
        ['name' => 'Clients', 'href' => '/clients'],
        ['name' => 'Contact', 'href' => '/contact'],
    ];

    $currentPath = request()->path() === '/' ? '/' : '/' . request()->path();
@endphp

<header class="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60">
    <!-- Top bar -->
    <div class="bg-jobarn-accent1 text-white py-2">
        <div class="container mx-auto px-4 flex justify-between items-center text-sm">
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-1">
                    <i data-lucide="phone" class="h-3 w-3"></i>
                    <span>
                        {{ $settings['phone_primary'] ?? '0784 847946' }} / {{ $settings['phone_secondary'] ?? '0745 912000' }}
                    </span>
                </div>
                <div class="flex items-center space-x-1">
                    <i data-lucide="mail" class="h-3 w-3"></i>
                    <span>{{ $settings['email_primary'] ?? 'info@jobarn.co.tz' }}</span>
                </div>
            </div>
            <div class="hidden md:block">
                <span>{{ $settings['address'] ?? 'Survey Complex, Ground Floor, Near Milimani City, Dar es Salaam' }}</span>
            </div>
        </div>
    </div>

    <!-- Main navigation -->
    <div class="container mx-auto px-4">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo/logo.png') }}" alt="Jobarn Logo" class="h-10 w-auto">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                @foreach($navigation as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="@if($currentPath === $item['href']) text-jobarn-primary @else text-gray-700 @endif text-sm font-medium transition-colors hover:text-jobarn-primary"
                    >
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden md:flex items-center space-x-4">
                <button
                    @click="$dispatch('open-quote-modal')"
                    class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white px-4 py-2 rounded"
                >
                    Request Quote
                </button>
            </div>

            <!-- Mobile Navigation -->
            <x-sheet side="right" class="w-[300px] sm:w-[400px]">
                <x-slot name="trigger">
                    <button class="md:hidden">
                        <i data-lucide="menu" class="h-5 w-5"></i>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <nav class="flex flex-col space-y-4 mt-8">
                        @foreach($navigation as $item)
                            <a
                                href="{{ $item['href'] }}"
                                @click="open = false"
                                class="@if($currentPath === $item['href']) text-jobarn-primary @else text-gray-700 @endif text-lg font-medium transition-colors hover:text-jobarn-primary"
                            >
                                {{ $item['name'] }}
                            </a>
                        @endforeach
                        <button
                            @click="open = false; $dispatch('open-quote-modal')"
                            class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white px-4 py-2 rounded mt-4"
                        >
                            Request Quote
                        </button>
                    </nav>
                </x-slot>
            </x-sheet>
        </div>
    </div>
</header>
