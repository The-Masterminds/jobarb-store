@extends('packages/theme::frontend.master')

@section('content')


<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div class="container mx-auto px-4 text-center space-y-6">
            <x-badge class="bg-jobarn-primary text-white">Our Network</x-badge>
            <h1 class="text-4xl lg:text-5xl font-bold">Trusted by Leaders Across Tanzania</h1>
            <p class="text-xl max-w-3xl mx-auto">
                We're proud to work with leading organizations and technology partners to deliver exceptional ICT solutions
                that drive business success.
            </p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 lg:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($stats as $stat)
                    <div class="text-center space-y-4">
                        <div class="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto">
                            <i data-lucide="{{ $stat['icon'] }}" class="h-8 w-8 text-jobarn-primary"></i>
                        </div>
                        <div class="space-y-2">
                            <div class="text-3xl lg:text-4xl font-bold text-jobarn-primary">{{ $stat['number'] }}</div>
                            <div class="text-xl font-semibold text-gray-900">{{ $stat['label'] }}</div>
                            <div class="text-gray-600">{{ $stat['description'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Clients Section -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-12">
                <x-badge class="bg-jobarn-accent1 text-white">Our Clients</x-badge>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Organizations We're Proud to Serve</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    From healthcare to defense, logistics to manufacturing, we serve diverse industries across Tanzania.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($clients as $client)
                    <x-card class="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                        <x-card.content class="p-6 space-y-4 text-center">
                            <div class="h-20 flex items-center justify-center">
                                <img
                                    src="{{ asset($client['logo'] ?? 'placeholder.svg') }}"
                                    alt="{{ $client['name'] }} logo"
                                    class="max-h-16 w-auto object-contain"
                                >
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $client['name'] }}</h3>
                                <x-badge variant="secondary" class="bg-jobarn-accent2/10 text-jobarn-accent2">
                                    {{ $client['industry'] }}
                                </x-badge>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $client['description'] }}</p>
                        </x-card.content>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Technology Partners -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-12">
                <x-badge class="bg-jobarn-accent2 text-white">Technology Partners</x-badge>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Partnering with Global Leaders</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Our strategic partnerships with leading technology companies ensure we deliver cutting-edge solutions.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($partners as $partner)
                    <x-card class="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                        <x-card.content class="p-6 space-y-4 text-center">
                            <div class="h-16 flex items-center justify-center">
                                <img
                                    src="{{ asset($partner['logo'] ?? 'placeholder.svg') }}"
                                    alt="{{ $partner['name'] }} logo"
                                    class="max-h-12 w-auto object-contain"
                                >
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $partner['name'] }}</h3>
                                <x-badge variant="secondary" class="bg-jobarn-primary/10 text-jobarn-primary text-xs">
                                    {{ $partner['category'] }}
                                </x-badge>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $partner['description'] }}</p>
                        </x-card.content>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center space-y-4 mb-12">
                <x-badge class="bg-jobarn-accent1 text-white">Client Testimonials</x-badge>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">What Our Clients Say About Us</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($testimonials as $testimonial)
                    <x-card class="border-0 shadow-lg">
                        <x-card.content class="p-8 space-y-6">
                            <i data-lucide="quote" class="h-8 w-8 text-jobarn-primary/20"></i>
                            <p class="text-gray-600 italic text-lg leading-relaxed">"{{ $testimonial['content'] }}"</p>
                            <div class="flex items-center space-x-1 mb-4">
                                @for($i = 0; $i < $testimonial['rating']; $i++)
                                    <i data-lucide="star" class="h-5 w-5 fill-yellow-400 text-yellow-400"></i>
                                @endfor
                            </div>
                            <div class="flex items-center space-x-4">
                                <img
                                    src="{{ asset($testimonial['image'] ?? 'placeholder.svg') }}"
                                    alt="{{ $testimonial['name'] }}"
                                    class="rounded-full object-cover w-15 h-15"
                                >
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $testimonial['name'] }}</p>
                                    <p class="text-sm text-gray-600">{{ $testimonial['position'] }}</p>
                                    <p class="text-sm font-medium text-jobarn-primary">{{ $testimonial['company'] }}</p>
                                </div>
                            </div>
                        </x-card.content>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div class="container mx-auto px-4 text-center space-y-8">
            <h2 class="text-3xl lg:text-4xl font-bold">Join Our Growing Family of Satisfied Clients</h2>
            <p class="text-xl max-w-2xl mx-auto">
                Experience the same level of excellence and dedication that has made us the trusted ICT partner for leading
                organizations across Tanzania.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                    Become Our Client
                </x-button>
                <x-button
                    size="lg"
                    variant="outline"
                    class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                >
                    Partner With Us
                </x-button>
            </div>
        </div>
    </section>
</div>


@endsection
