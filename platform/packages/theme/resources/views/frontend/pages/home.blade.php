@extends('packages/theme::frontend.master')

@section('content')

    <div class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative min-h-[80vh] flex items-center justify-center bg-black/">
            <!-- Background Video -->
            <video class="absolute inset-0 w-full h-full object-cover"
                src="https://videocdn.cdnpk.net/videos/d44a36d9-3ffb-5518-936a-805524175757/horizontal/previews/watermarked/large.mp4"
                autoplay loop muted playsinline></video>
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
                        <x-button as="a" href="/services" size="lg"
                            class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white home-services">
                            Explore Services
                            <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                        </x-button>
                        <x-button as="a" href="/contact" size="lg" variant="outline"
                            class="border-white text-white hover:bg-white hover:text-jobarn-accent1 bg-transparent hero-request-quote">
                            Request a Quote
                        </x-button>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">

                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent2 text-white">About JOBARN</x-badge>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <div class="space-y-4">
                            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Your Trusted ICT Partner in Tanzania
                            </h2>
                            <p class="text-gray-600">
                                Founded in 2024, <span class="text-lg t"> JOBARN GENERAL TRADING COMPANY LTD</span> has quickly established itself as a
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
                        <x-button class="bg-jobarn-primary hover:bg-jobarn-primary/90 home-about-button">
                            Learn More About Us
                        </x-button>
                    </div>
                    <div class="relative">
                        <img src="{{ asset('vendor/core/packages/theme/frontend/images/about-us-1.png') }}" alt="JOBARN About"
                            class="rounded-2xl shadow-lg w-full h-auto"
                            style="height: 512px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Services -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent1 text-white">Our Services</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Comprehensive ICT Solutions</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        From sales to support, we provide end-to-end technology services tailored to your business needs.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($services as $service)
                        <x-card
                            class="group hover:shadow-lg transition-all duration-300 border-0 shadow-md relative overflow-hidden">
                            <x-card.content class="p-6 space-y-4 relative z-10">
                                <div
                                    class="h-12 w-12 bg-jobarn-primary/10 rounded-lg flex items-center justify-center group-hover:bg-jobarn-primary group-hover:text-white transition-colors">
                                    <i data-lucide="{{ $service['icon'] }}"
                                        class="h-6 w-6 text-jobarn-primary group-hover:text-white"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900">{{ $service['title'] }}</h3>
                                <p class="text-gray-600">{{ $service['description'] }}</p>
                            </x-card.content>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- <ct Highlights -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent2 text-white">Our Products</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Premium ICT Equipment</h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Discover our comprehensive range of high-quality technology products from leading global brands.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <x-card class="group hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $product['image'] ? asset($product['image']) : asset('placeholder.svg') }}"
                                    alt="{{ $product['title'] }}"
                                    class="object-cover w-full h-full group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <x-card.content class="p-6 space-y-3">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $product['title'] }}</h3>
                                <p class="text-gray-600">{{ $product['description'] }}</p>
                                <x-button as="a" href="/products" variant="outline"
                                    class="w-full border-jobarn-primary home-products text-jobarn-primary hover:bg-jobarn-primary hover:text-white bg-transparent">
                                    View Products
                                </x-button>
                            </x-card.content>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent1 text-white">Why Choose JOBARN</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Excellence in Every Solution</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($whyChooseUs as $item)
                        <div class="text-center space-y-4">
                            <div
                                class="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto">
                                <i data-lucide="{{ $item['icon'] }}" class="h-8 w-8 text-jobarn-primary"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900">{{ $item['title'] }}</h3>
                            <p class="text-gray-600">{{ $item['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-16 lg:py-24 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent2 text-white">Testimonials</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">What Our Clients Say</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials as $testimonial)
                        <x-card class="relative">
                            <x-card.content class="p-6 space-y-4">
                                <i data-lucide="quote" class="h-8 w-8 text-jobarn-primary/20"></i>
                                <p class="text-gray-600 italic">"{{ $testimonial['content'] }}"</p>
                                <div class="flex items-center space-x-1">
                                    @for ($i = 0; $i < $testimonial['rating']; $i++)
                                        <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    @endfor
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $testimonial['name'] }}</p>
                                    <p class="text-sm text-gray-500">{{ $testimonial['company'] }}</p>
                                </div>
                            </x-card.content>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Partners -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="text-center space-y-4 mb-12">
                    <x-badge class="bg-jobarn-accent1 text-white">Our Partners</x-badge>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Trusted Technology Partners</h2>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8 items-center">
                    @foreach ($partners as $partner)
                        <div class="text-center">
                            <div class="h-16 w-full bg-gray-100 rounded-lg flex items-center justify-center">
                                <img src="{{ asset('vendor/core/packages/theme/frontend/images/partners/' . strtolower($partner) . '.png') }}"
                                     alt="{{ $partner }} Logo"
                                     class="h-12 object-contain mx-auto" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
            <div class="container mx-auto px-4 text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold">Let's Power Your Business with Technology</h2>
                <p class="text-xl max-w-2xl mx-auto">
                    Ready to transform your business with innovative ICT solutions? Get in touch with our experts today.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button as="a" href="/contact-us" size="lg"
                        class="bg-white text-jobarn-primary get-started-cta hover:bg-gray-100">
                        Get Started Today
                    </x-button>
                    <x-button as="a" href="/services" size="lg" variant="outline"
                        class="border-white text-white hover:bg-white hover:text-jobarn-primary services-cta bg-transparent">
                        View All Services
                    </x-button>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script>
        document.querySelectorAll('.hero-request-quote').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/contact-us`;
            });

        });

        document.querySelectorAll('.home-services').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/services`;
            });
        });

        document.querySelectorAll('.home-about-button').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/about-us`;
            });
        });

        document.querySelectorAll('.get-started-cta').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/contact-us`;
            });
        });

        document.querySelectorAll('.services-cta').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/services`;
            });
        });

        document.querySelectorAll('.home-products').forEach(button => {
            button.addEventListener('click', () => {
                window.location.href = `/products`;
            });
        });

        
    </script>
@endpush
