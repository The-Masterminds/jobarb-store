@extends('packages/theme::frontend.master')

@section('content')

    @php
        $values = [
            [
                'icon' => 'award',
                'title' => "Excellence",
                'description' => "We strive for the highest standards in everything we do, delivering superior quality and performance.",
            ],
            [
                'icon' => 'heart',
                'title' => "Integrity",
                'description' => "We conduct business with honesty, transparency, and ethical practices in all our relationships.",
            ],
            [
                'icon'=> 'lightbulb',
                'title'=> "Innovation",
                'description'=> "We embrace cutting-edge technologies and creative solutions to meet evolving business needs.",
            ],
            [
                'icon'=> 'users',
                'title'=> "Partnership",
                'description'=> "We build lasting relationships with clients, treating their success as our own achievement.",
            ],
            [
                'icon'=> 'Shield',
                'title'=> "Reliability",
                'description'=> "We provide dependable solutions and consistent support that businesses can count on.",
            ],
            [
                'icon'=> 'Clock',
                'title'=> "Responsiveness",
                'description'=> "We respond quickly to client needs with efficient service and timely project delivery.",
            ],
        ];

        $timeline = [
            [
                'year' => "2024",
                'title' => "Company Founded",
                'description' => "JOBARN GENERAL TRADING COMPANY LTD was established with a vision to transform Tanzania's ICT landscape.",
            ],
            // ... other timeline items
        ];
    @endphp

    <div class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <x-badge class="bg-jobarn-primary text-white">About JOBARN</x-badge>
                        <h1 class="text-4xl lg:text-5xl font-bold leading-tight">Pioneering ICT Excellence in Tanzania</h1>
                        <p class="text-xl text-white/90">
                            Since 2024, we've been committed to empowering businesses across Tanzania with innovative technology
                            solutions that drive growth and success.
                        </p>
                    </div>
                    <div class="relative">
                        <img
                            src="{{ asset('placeholder.svg') }}?height=400&width=500"
                            alt="JOBARN Office"
                            class="rounded-2xl shadow-2xl w-full h-auto"
                            style="height: 400px; width: 500px; object-fit: cover;"
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- Company Introduction -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Who We Are</h2>
                        <p class="text-lg text-gray-600">
                            JOBARN GENERAL TRADING COMPANY LTD is a dynamic ICT company based in Dar es Salaam, Tanzania. We
                            specialize in providing comprehensive technology solutions that help businesses thrive in the digital
                            age.
                        </p>
                        <p class="text-gray-600">
                            Our expertise spans across ICT equipment sales, network infrastructure setup, cybersecurity solutions,
                            software development, and technical support.
                        </p>
                    </div>
                    <div class="relative">
                        <img
                            src="{{ asset('placeholder.svg') }}?height=400&width=500"
                            alt="ICT Solutions"
                            class="rounded-2xl shadow-lg w-full h-auto"
                            style="height: 400px; width: 500px; object-fit: cover;"
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- Mission and Vision -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <x-card class="border-0 shadow-lg">
                        <x-card.content class="p-8 space-y-6">
                            <div class="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center">
                                <i data-lucide="target" class="h-8 w-8 text-jobarn-primary"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                            <p class="text-gray-600 text-lg">
                                To empower businesses across Tanzania with innovative, reliable, and scalable ICT solutions.
                            </p>
                        </x-card.content>
                    </x-card>

                    <x-card class="border-0 shadow-lg">
                        <x-card.content class="p-8 space-y-6">
                            <div class="h-16 w-16 bg-jobarn-accent2/10 rounded-full flex items-center justify-center">
                                <i data-lucide="eye" class="h-8 w-8 text-jobarn-accent2"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Our Vision</h3>
                            <p class="text-gray-600 text-lg">
                                To be Tanzania's leading ICT solutions provider, recognized for excellence and innovation.
                            </p>
                        </x-card.content>
                    </x-card>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent1 text-white">Our Values</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">What Drives Us Forward</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Our core values guide every decision we make and every solution we deliver.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($values as $value)
                        <x-card class="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                            <x-card.content class="p-6 space-y-4 text-center">
                                <div class="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-jobarn-primary group-hover:text-white transition-colors">
                                    <i data-lucide="{{ $value['icon'] }}" class="h-8 w-8 text-jobarn-primary group-hover:text-white"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">{{ $value['title'] }}</h3>
                                <p class="text-gray-600">{{ $value['description'] }}</p>
                            </x-card.content>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Company Timeline -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent2 text-white">Our Journey</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Building Excellence Since 2024</h2>
                </div>
                <div class="max-w-4xl mx-auto">
                    <div class="space-y-8">
                        @foreach($timeline as $index => $item)
                            <div class="flex items-start space-x-6">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 bg-jobarn-primary rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold">{{ $index + 1 }}</span>
                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <x-card class="border-0 shadow-md">
                                        <x-card.content class="p-6">
                                            <div class="flex items-center space-x-4 mb-3">
                                                <x-badge class="bg-jobarn-accent1 text-white">{{ $item['year'] }}</x-badge>
                                                <h3 class="text-xl font-semibold text-gray-900">{{ $item['title'] }}</h3>
                                            </div>
                                            <p class="text-gray-600">{{ $item['description'] }}</p>
                                        </x-card.content>
                                    </x-card>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Future Outlook -->
        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
            <div class="container mx-auto px-4 text-center space-y-8">
                <x-badge class="bg-white text-jobarn-primary">Looking Ahead</x-badge>
                <h2 class="text-3xl lg:text-4xl font-bold">Shaping Tanzania's Digital Future</h2>
                <p class="text-xl max-w-3xl mx-auto">
                    As we continue to grow, our commitment remains unwavering: to be the catalyst that transforms businesses
                    across Tanzania through innovative technology solutions.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                    <div class="text-center space-y-2">
                        <div class="text-3xl font-bold">100+</div>
                        <div class="text-white/80">Projects Delivered</div>
                    </div>
                    <div class="text-center space-y-2">
                        <div class="text-3xl font-bold">50+</div>
                        <div class="text-white/80">Happy Clients</div>
                    </div>
                    <div class="text-center space-y-2">
                        <div class="text-3xl font-bold">24/7</div>
                        <div class="text-white/80">Support Available</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
