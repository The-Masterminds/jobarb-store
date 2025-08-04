@extends('packages/theme::frontend.master')

@section('content')
    @props([
        'videoSrc' =>
            'https://videocdn.cdnpk.net/videos/d44a36d9-3ffb-5518-936a-805524175757/horizontal/previews/watermarked/large.mp4',
    ])

    <div class="min-h-screen">

        {{-- Hero Section  --}}
        <section class="relative min-h-[80vh] flex items-center justify-center">
            <!-- Background Video -->
            <video class="absolute inset-0 w-full h-full object-cover" src="{{ $videoSrc }}" autoplay loop muted
                playsinline></video>

            <!-- Dark Overlay -->
            <div class="absolute inset-0 bg-black/50"></div>

            <!-- Hero Content -->
            <div class="relative z-10 container mx-auto px-4 text-center">
                <div class="max-w-4xl mx-auto space-y-8">
                    <div class="space-y-4">
                        <x-badge class="bg-jobarn-primary text-white">Established 2024</x-badge>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                            Empowering Businesses with Innovative ICT Solutions
                        </h1>
                        <p class="text-xl lg:text-2xl text-white/90 font-medium">Reliable | Scalable | Future-Ready</p>
                        <p class="text-lg text-white/80 max-w-2xl mx-auto">
                            Transform your business with cutting-edge technology solutions, expert support, and trusted
                            partnerships
                            across Tanzania.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <x-button variant="default" size="lg" href="/services"
                            class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                            Explore Services
                            <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                        </x-button>

                        <x-button variant="outline" size="lg" href="/contact"
                            class="border-white text-white hover:bg-white hover:text-jobarn-accent1 bg-transparent">
                            Request a Quote
                        </x-button>
                    </div>
                </div>
            </div>
        </section>

        {{-- About Section --}}
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    {{-- Text Section --}}
                    <div class="space-y-6">
                        <div class="space-y-4">
                            <span
                                class="inline-block bg-jobarn-accent2 text-white text-xs font-semibold tracking-wider uppercase px-3 py-1 rounded">
                                About JOBARN
                            </span>

                            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">
                                Your Trusted ICT Partner in Tanzania
                            </h2>

                            <p class="text-lg text-gray-600">
                                Founded in 2024, JOBARN GENERAL TRADING COMPANY LTD has quickly established itself as a
                                leading
                                provider of ICT solutions in Tanzania. We specialize in delivering comprehensive technology
                                services
                                that drive business growth and innovation.
                            </p>

                            <p class="text-gray-600">
                                From equipment sales to complex network installations, our certified team ensures your
                                technology
                                infrastructure is reliable, secure, and future-ready.
                            </p>
                        </div>

                        <x-button href="/about" class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                            Learn More About Us
                        </x-button>
                    </div>

                    {{-- Image Section --}}
                    <div class="relative">
                        <img src="{{ asset('img/comp-network.png') }}" alt="JOBARN About" width="500" height="400"
                            class="rounded-2xl shadow-lg">
                    </div>

                </div>
            </div>
        </section>


    </div>
@endsection
