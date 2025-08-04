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

<header class="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60"
     x-data="{ isQuoteModalOpen: false }">
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
                <span>
                    {{ $settings['address'] ?? 'Survey Complex, Ground Floor, Near Milimani City, Dar es Salaam' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Main navigation -->
    <div class="container mx-auto px-4">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('logo/logo.png') }}" alt="Jobarn Logo" class="h-10 w-auto">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                @foreach($navigation as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="text-sm font-medium transition-colors hover:text-jobarn-primary {{ request()->url() === url($item['href']) ? 'text-jobarn-primary' : 'text-gray-700' }}"
                    >
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden md:flex items-center space-x-4">
                <x-button
                    @click="isQuoteModalOpen = true"
                    class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white px-4 py-2 rounded"
                >
                    Request Quote
                </x-button>
            </div>


            <!-- Mobile Navigation -->
            <div class="md:hidden">
                <x-sheet.root x-data="{ isOpen: false }">
                    <!-- Mobile Navigation Trigger -->
                    <x-sheet.trigger>
                        <x-button variant="ghost" size="icon">
                            <i data-lucide="menu" class="h-5 w-5"></i>
                        </x-button>
                    </x-sheet.trigger>

                    <!-- Mobile Navigation Content -->
                    <x-sheet.content side="right" class="w-[300px] sm:w-[400px]">
                        <nav class="flex flex-col space-y-4 mt-8">
                            @foreach($navigation as $item)
                                <a
                                    href="{{ $item['href'] }}"
                                    @click="isOpen = false"
                                    class="text-lg font-medium transition-colors hover:text-jobarn-primary {{ request()->url() === url($item['href']) ? 'text-jobarn-primary' : 'text-gray-700' }}"
                                >
                                    {{ $item['name'] }}
                                </a>
                            @endforeach
                            <x-button
                                @click="isOpen = false; isQuoteModalOpen = true"
                                class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white mt-4"
                            >
                                Request Quote
                            </x-button>
                        </nav>
                    </x-sheet.content>
                </x-sheet.root>
            </div>

        </div>
    </div>
</header>

<!-- Quote Request Modal -->
<x-quote-request-modal :isOpen="false" />
