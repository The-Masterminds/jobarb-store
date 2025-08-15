@props(['settings'])

@php
$settings = $settings ?? [];
    // Default values if settings are not provided
    $defaults = [
        'tagline' => 'Your trusted ICT solutions provider',
        'social_media' => [
            'facebook' => 'https://www.facebook.com/jobarnstore',
            'twitter' => 'https://twitter.com/jobarnstore',
            'instagram' => 'https://www.instagram.com/jobarnstore',
        ],
        'address' => 'Survey Complex, Ground Floor, Near Milimani City, Dar es Salaam',
        'phone_primary' => '+255 784 837 946',
        'phone_secondary' => '+255 745 912 000',
        'email_primary' => 'info@jobarn.co.tz',
        'company_name' => 'JOBARN',
    ];

    $settings = array_merge($defaults, (array) $settings);
@endphp

<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2">
                    <img
                        src="{{ asset('vendor/core/packages/theme/frontend/images/logo-white.png') }}"
                        alt="Jobarn Logo"
                        class="h-8 w-auto"
                        width="200"
                        height="50"
                    >
                </div>
                <p class="text-gray-300 text-sm">{{ $settings['tagline'] }}</p>
                <span></span>
                <p class="text-gray-300 text-sm">Empowering businesses with innovative ICT solutions. Reliable, scalable, and future-ready technology services.</p>
                <div class="flex space-x-4">
                    <a
                        href="{{ $settings['social_media']['facebook'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-jobarn-accent2 transition-colors"
                    >
                        <i data-lucide="facebook" class="h-5 w-5"></i>
                    </a>
                    <a
                        href="{{ $settings['social_media']['twitter'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-jobarn-accent2 transition-colors"
                    >
                        <i data-lucide="twitter" class="h-5 w-5"></i>
                    </a>
                    <a
                        href="{{ $settings['social_media']['instagram'] }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-400 hover:text-jobarn-accent2 transition-colors"
                    >
                        <i data-lucide="instagram" class="h-5 w-5"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Quick Links</h3>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="/about" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="/products" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="/services" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/clients" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            Clients & Partners
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Services -->
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Our Services</h3>
                <ul class="space-y-2 text-sm">
                    <li class="text-gray-300">ICT Equipment Sales</li>
                    <li class="text-gray-300">Network Infrastructure</li>
                    <li class="text-gray-300">CCTV Installation</li>
                    <li class="text-gray-300">Software Development</li>
                    <li class="text-gray-300">Technical Support</li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Contact Info</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex items-start space-x-2">
                        <i data-lucide="map-pin" class="h-4 w-4 text-jobarn-primary mt-0.5 flex-shrink-0"></i>
                        <span class="text-gray-300">{{ $settings['address'] }}</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i data-lucide="phone" class="h-4 w-4 text-jobarn-primary flex-shrink-0"></i>
                        <span class="text-gray-300">
                            {{ $settings['phone_primary'] }} / {{ $settings['phone_secondary'] }}
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i data-lucide="mail" class="h-4 w-4 text-jobarn-primary flex-shrink-0"></i>
                        <span class="text-gray-300">{{ $settings['email_primary'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
            <p>
                &copy; {{ date('Y') }} {{ $settings['company_name'] }}. All rights reserved.
            </p>
        </div>
    </div>
</footer>
