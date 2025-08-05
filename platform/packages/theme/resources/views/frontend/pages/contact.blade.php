@extends('packages/theme::frontend.master')


@section('content')
    <div class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
            <div class="container mx-auto px-4 text-center space-y-6">
                <x-badge class="bg-jobarn-primary text-white">Contact Us</x-badge>
                <h1 class="text-4xl lg:text-5xl font-bold">Let's Discuss Your ICT Needs</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Ready to transform your business with innovative technology solutions? Get in touch with our expert team
                    today.
                </p>
            </div>
        </section>

        <!-- Contact Form and Info -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <h2 class="text-3xl font-bold text-gray-900">Send Us a Message</h2>
                            <p class="text-gray-600">Fill out the form below and we'll get back to you within 24 hours.</p>
                        </div>

                        @if(session('success'))
                            <x-card class="border-green-200 bg-green-50">
                                <x-card.content class="p-8 text-center space-y-4">
                                    <i data-lucide="check-circle" class="h-16 w-16 text-green-500 mx-auto"></i>
                                    <h3 class="text-2xl font-bold text-green-800">Message Sent Successfully!</h3>
                                    <p class="text-green-700">
                                        Thank you for contacting JOBARN. We'll get back to you within 24 hours.
                                    </p>
                                </x-card.content>
                            </x-card>
                        @else
                            <x-card class="border-0 shadow-lg">
                                <x-card.content class="p-8">
                                    <form class="space-y-6">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="space-y-2">
                                                <x-label for="name">Full Name *</x-label>
                                                <x-input id="name" name="name" placeholder="Your full name" required />
                                            </div>

                                            <div class="space-y-2">
                                                <x-label for="phone">Phone Number</x-label>
                                                <x-input id="phone" name="phone" placeholder="+255 xxx xxx xxx" />
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <x-label for="service">Service of Interest</x-label>
                                            <div class="space-y-2">
                                                <x-select
                                                    name="service"
                                                    :options="[
                                                        'ICT Equipment Sales',
                                                        'Network Infrastructure',
                                                        'CCTV Installation',
                                                        'Server Installation',
                                                        'Technical Support',
                                                        'Software Development',
                                                        'Cybersecurity Solutions',
                                                        'Other',
                                                    ]"
                                                    placeholder="Select a service"
                                                />
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div class="space-y-2">
                                                <x-label for="email">Email Address *</x-label>
                                                <x-input type="email" id="email" name="email" placeholder="your.email@example.com" required />
                                            </div>

                                            <div class="space-y-2">
                                                <x-label for="company">Company Name</x-label>
                                                <x-input id="company" name="company" placeholder="Your company name" />
                                            </div>
                                        </div>

                                        <div class="space-y-2">
                                            <x-label for="subject">Subject *</x-label>
                                            <x-input id="subject" name="subject" placeholder="Brief subject of your inquiry" required />
                                        </div>

                                        <div class="space-y-2">
                                            <x-label for="message">Message *</x-label>
                                            <x-textarea id="message" name="message" rows="5" placeholder="Please describe your requirements in detail..." required />
                                        </div>

                                        <x-button type="submit" class="w-full bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                                            Send Message
                                            <i data-lucide="send" class="ml-2 h-4 w-4"></i>
                                        </x-button>
                                    </form>
                                </x-card.content>
                            </x-card>
                        @endif
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div class="space-y-4">
                            <h2 class="text-3xl font-bold text-gray-900">Get in Touch</h2>
                            <p class="text-gray-600">
                                We're here to help you with all your ICT needs. Reach out to us through any of the following channels.
                            </p>
                        </div>

                        <div class="space-y-6">
                            @foreach([
                                [
                                    'icon' => 'map-pin',
                                    'title' => 'Our Location',
                                    'details' => [
                                        'Survey Complex, Ground Floor',
                                        'Near Milimani City',
                                        'Dar es Salaam, Tanzania'
                                    ]
                                ],
                                [
                                    'icon' => 'phone',
                                    'title' => 'Phone Numbers',
                                    'details' => ['0784 847946', '0745 912000']
                                ],
                                [
                                    'icon' => 'mail',
                                    'title' => 'Email Address',
                                    'details' => ['info@jobarn.co.tz', 'support@jobarn.co.tz']
                                ],
                                [
                                    'icon' => 'clock',
                                    'title' => 'Business Hours',
                                    'details' => [
                                        'Monday - Friday: 8:00 AM - 6:00 PM',
                                        'Saturday: 9:00 AM - 2:00 PM',
                                        'Sunday: Closed'
                                    ]
                                ]
                            ] as $info)
                                <x-card class="border-0 shadow-md">
                                    <x-card.content class="p-6">
                                        <div class="flex items-start space-x-4">
                                            <div class="h-12 w-12 bg-jobarn-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <i data-lucide="{{ $info['icon'] }}" class="h-6 w-6 text-jobarn-primary"></i>
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $info['title'] }}</h3>
                                                <div class="space-y-1">
                                                    @foreach($info['details'] as $detail)
                                                        <p class="text-gray-600">{{ $detail }}</p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </x-card.content>
                                </x-card>
                            @endforeach
                        </div>

                        <!-- Map Placeholder -->
                        <x-card class="border-0 shadow-md">
                            <x-card.content class="p-0">
                                <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <div class="text-center space-y-2">
                                        <i data-lucide="map-pin" class="h-8 w-8 text-gray-400 mx-auto"></i>
                                        <p class="text-gray-500">Interactive Map</p>
                                        <p class="text-sm text-gray-400">Survey Complex, Dar es Salaam</p>
                                    </div>
                                </div>
                            </x-card.content>
                        </x-card>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Banner -->
        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
            <div class="container mx-auto px-4 text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold">Partner with JOBARN for All Your ICT Needs</h2>
                <p class="text-xl max-w-2xl mx-auto">
                    From consultation to implementation and ongoing support, we're your trusted technology partner in Tanzania.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                        Schedule Consultation
                    </x-button>
                    <x-button
                        size="lg"
                        variant="outline"
                        class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                    >
                        Request Quote
                    </x-button>
                </div>
            </div>
        </section>
    </div>
@endsection

