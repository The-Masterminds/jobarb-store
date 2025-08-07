@extends('packages/theme::frontend.master')

@section('content')

    @php
        $processSteps = [
            [
                'step' => '01',
                'title' => 'Consultation',
                'description' => 'We analyze your business needs and current infrastructure to understand your requirements.',
            ],
            [
                'step' => '02',
                'title' => 'Planning',
                'description' => 'Our experts design a customized solution that aligns with your goals and budget.',
            ],
            [
                'step' => '03',
                'title' => 'Implementation',
                'description' => 'Professional installation and configuration with minimal disruption to your operations.',
            ],
            [
                'step' => '04',
                'title' => 'Support',
                'description' => 'Ongoing maintenance and support to ensure optimal performance and reliability.',
            ],
        ];

        // Icon mapping
        $iconMap = [
            'shopping-cart' => 'shopping-cart',
            'network' => 'network',
            'shield' => 'shield',
            'code' => 'code',
            'headphones' => 'headphones',
            'server' => 'server',
        ];
    @endphp

    <div class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <x-badge class="bg-jobarn-primary text-white">Our Services</x-badge>
                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">
                            Comprehensive ICT Services for Your Business
                        </h1>
                        <p class="text-xl text-white/90">
                            From equipment sales to technical support, we provide end-to-end ICT solutions that drive your business
                            forward.
                        </p>
                        <x-button as="a" href="/contact" size="lg" class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                            Get Started Today
                            <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                        </x-button>
                    </div>
                    <div class="relative">
                        <img
                            src="{{ asset('vendor/core/packages/theme/frontend/images/items.png') }}"
                            alt="ICT Services"
                            class="w-full h-auto"
                            style="width: 650px; object-fit: cover;"
                        >
                    </div>
                </div>
            </div>
        </section>


        <!-- Services Grid -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent1 text-white">What We Offer</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Complete ICT Solutions Under One Roof</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Our comprehensive range of services covers every aspect of your ICT needs, from initial consultation to
                        ongoing support.
                    </p>
                </div>

                <div class="space-y-16">
                    @foreach($services as $index => $service)
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center {{ $index % 2 === 1 ? 'lg:grid-flow-col-dense' : '' }}">
                            <div class="{{ $index % 2 === 1 ? 'lg:col-start-2' : '' }} space-y-6">
                                <div class="flex items-center space-x-4">
                                    <div class="h-12 w-12 bg-jobarn-primary/10 rounded-lg flex items-center justify-center">
                                        <i data-lucide="{{ $iconMap[$service['icon'] ?? 'shopping-cart'] }}" class="h-6 w-6 text-jobarn-primary"></i>
                                    </div>
                                    <h3 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $service['title'] }}</h3>
                                </div>
                                <p class="text-lg text-gray-600">{{ $service['description'] }}</p>

                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900">Key Features:</h4>
                                    <ul class="space-y-2">
                                        @foreach($service['features'] as $feature)
                                            <li class="flex items-start space-x-2">
                                                <i data-lucide="check-circle" class="h-5 w-5 text-jobarn-primary mt-0.5 flex-shrink-0"></i>
                                                <span class="text-gray-600">{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="space-y-3">
                                    <h4 class="font-semibold text-gray-900">Trusted Brands:</h4>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($service['brands'] as $brand)
                                            <x-badge variant="secondary" class="bg-jobarn-accent2/10 text-jobarn-accent2">
                                                {{ $brand }}
                                            </x-badge>
                                        @endforeach
                                    </div>
                                </div>

                                <x-button as="a" href="/contact" class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                                    Learn More
                                </x-button>
                            </div>

                            <div class="{{ $index % 2 === 1 ? 'lg:col-start-1' : '' }} relative h-full min-h-[300px]">
                                <img
                                    src="{{ asset($service['image'] ?? 'placeholder.svg') }}"
                                    alt="{{ $service['title'] }}"
                                    class="absolute inset-0 w-full h-full object-cover rounded-2xl shadow-lg"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent2 text-white">Our Process</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">How We Deliver Excellence</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Our proven methodology ensures successful project delivery and client satisfaction.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($processSteps as $index => $step)
                        <x-card class="relative border-0 shadow-lg">
                            <x-card.content class="p-6 text-center space-y-4">
                                <div class="h-16 w-16 bg-jobarn-primary rounded-full flex items-center justify-center mx-auto">
                                    <span class="text-white font-bold text-xl">{{ $step['step'] }}</span>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">{{ $step['title'] }}</h3>
                                <p class="text-gray-600">{{ $step['description'] }}</p>
                            </x-card.content>
                            @if($index < count($processSteps) - 1)
                                <div class="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                                    <i data-lucide="arrow-right" class="h-6 w-6 text-jobarn-primary"></i>
                                </div>
                            @endif
                        </x-card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
            <div class="container mx-auto px-4 text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold">Ready to Transform Your Business?</h2>
                <p class="text-xl max-w-2xl mx-auto">
                    Let our expert team help you implement the perfect ICT solution for your business needs.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button as="a" href="/contact" size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                        Get Free Consultation
                    </x-button>
                    <x-button
                        as="a"
                        href="/products"
                        size="lg"
                        variant="outline"
                        class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                    >
                        View Our Products
                    </x-button>
                </div>
            </div>
        </section>
    </div>

@endsection
