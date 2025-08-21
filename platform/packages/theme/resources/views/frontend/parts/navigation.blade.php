@php
    $navigation = [
        ['name' => 'Home', 'href' => '/'],
        ['name' => 'About', 'href' => route('public.about')],
        ['name' => 'Products', 'href' => '/products'],
        ['name' => 'Services', 'href' => route('public.services')],
        ['name' => 'Blog', 'href' => '/blog'],
        ['name' => 'Clients', 'href' => route('public.clients')],
        ['name' => 'Contact', 'href' => route('public.contact')],
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
                    <a href="tel:{{ $settings['phone_primary'] ?? '+255 784 837 946' }}" class="text-white hover:underline">
                        <span>
                            {{ $settings['phone_primary'] ?? '+255 784 837 946' }}
                        </span>
                    </a> <span class="md:inline">|</span>
                    <i data-lucide="message-circle" class="h-3 w-3"></i>
                    <a href="https://wa.me/{{ $settings['phone_primary'] ?? '+255745912000' }}" target="_blank" rel="noopener noreferrer" class="text-white hover:underline">
                        <span>
                            {{ $settings['phone_primary'] ?? '+255 745 912 000' }}
                        </span>
                    </a>
                </div>
                <div class="flex items-center space-x-1">
                    <i data-lucide="mail" class="h-3 w-3"></i>
                    <a href="mailto:{{ $settings['email_primary'] ?? 'info@jobarn.co.tz' }}"><span>{{ $settings['email_primary'] ?? 'info@jobarn.co.tz' }}</span></a>
                </div>
            </div>
            <div class="hidden md:block">
                <span>
                    {{ $settings['address'] ?? 'Survey Complex, Ground Floor, Near Mlimani City, Dar es Salaam' }}
                </span>
            </div>
        </div>
    </div>

    <!-- Main navigation -->
    <div class="container mx-auto px-4">
        <div class="flex h-16 items-center justify-between">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('vendor/core/packages/theme/frontend/images/logo.png') }}" alt="Jobarn Logo" class="h-10 w-auto">
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
                    onclick="event.preventDefault(); window.location.href='{{ route('public.contact') }}';"
                    class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white px-4 py-2 rounded"
                >
                    Request Quote
                </x-button>
            </div>


            <!-- Mobile Navigation -->
            <div class="md:hidden" x-data="{ isOpen: false }">
                <!-- Mobile Navigation Trigger -->
                <x-button variant="ghost" size="icon" @click="isOpen = true">
                    <i data-lucide="menu" class="h-5 w-5"></i>
                </x-button>

                <!-- Overlay -->
                <div
                    x-show="isOpen"
                    x-transition.opacity
                    class="fixed inset-0 bg-black/40 z-40"
                    @click="isOpen = false"
                    x-cloak
                ></div>

                <!-- Mobile Navigation Drawer -->
                <div
                    x-show="isOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                    class="fixed top-0 right-0 z-50 w-[300px] sm:w-[400px] h-full bg-white shadow-lg flex flex-col"
                    x-cloak
                >
                    <div class="flex items-center justify-between p-4 border-b">
                        <span class="font-bold text-lg">Menu</span>
                        <button @click="isOpen = false" class="text-gray-500 hover:text-jobarn-primary">
                            <i data-lucide="x" class="h-6 w-6"></i>
                        </button>
                    </div>
                    <nav class="flex flex-col space-y-4 mt-8 px-6 bg-white">
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
                            onclick="event.preventDefault(); window.location.href='{{ route('public.contact') }}';"
                            class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white mt-4" style="margin-bottom: 8px;"
                        >
                            Request Quote
                        </x-button>
                    </nav>
                </div>
            </div>


        </div>
    </div>
</header>

<!-- Quote Request Modal -->
{{-- <x-quote-request-modal :isOpen="false" /> --}}
