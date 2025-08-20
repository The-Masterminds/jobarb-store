@extends('packages/theme::frontend.master')

@section('content')

<div class="min-h-screen">

    <!-- Product Details -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                <!-- Product Image Gallery -->
                <div
                    x-data="{ mainImage: '/storage/{{ $product['images'][0] ?? '/placeholder.svg' }}' }"
                    class="space-y-4"
                >
                    <!-- Main Image -->
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-100">
                        <img :src="mainImage"
                             alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover transition duration-300" />
                    </div>

                    <!-- Thumbnail Carousel -->
                    <div class="flex space-x-3 overflow-x-auto">
                        @foreach($product['images'] as $img)
                            <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:border-jobarn-primary"
                                 @click="mainImage = '/storage/{{ $img }}'">
                                <img src="/storage/{{ $img }}"
                                     alt="Thumbnail {{ $loop->iteration }}"
                                     class="w-full h-full object-cover" />
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Information -->
                <div class="space-y-8">

                    <!-- Header -->
                    <div class="space-y-4">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $product['name'] }}</h1>

                        <div class="flex flex-wrap items-center gap-6 text-gray-600">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="hash" class="h-4 w-4"></i>
                                <span class="font-medium">SKU: {{ $product['sku'] }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="package" class="h-4 w-4"></i>
                                <span>{{ $product->product_type->label() }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="layers" class="h-4 w-4"></i>
                                <span>Stock: {{ $product->stock_status->label() }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900">Product Description</h2>
                        <div class="text-gray-600 leading-relaxed">
                            {!! $product['description'] !!}
                        </div>
                    </div>

                    <!-- Content / Extended Info -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900">More Information</h2>
                        <div class="prose max-w-none text-gray-600">
                            {!! $product['content'] !!}
                        </div>
                    </div>

                    <!-- Price and CTA -->
                    <div class="space-y-6">
                        <x-separator />
                        <div class="space-y-4">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="tag" class="h-5 w-5 text-jobarn-primary"></i>
                                <span class="text-lg font-semibold text-gray-900">
                                    Price: {{ $product['front_sale_price'] }} {{ config('app.currency', 'USD') }}
                                </span>
                            </div>
                            <x-button
                                size="lg"
                                class="w-full sm:w-auto bg-jobarn-primary hover:bg-jobarn-primary/90 text-white"
                                onclick="document.getElementById('quote-modal').classList.remove('hidden')"
                            >
                                <i data-lucide="quote" class="h-4 w-4 mr-2"></i>
                                Request Quote
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technical Specifications -->
    @if(!empty($product['length']) || !empty($product['wide']) || !empty($product['height']) || !empty($product['weight']))
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center space-y-4 mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Technical Specifications</h2>
                    <p class="text-lg text-gray-600">Detailed technical information and specifications</p>
                </div>

                <x-card class="border-0 shadow-lg">
                    <x-card.content class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @if($product['length'])
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="font-medium text-gray-900">Length</span>
                                    <span class="text-gray-600">{{ $product['length'] }} cm</span>
                                </div>
                            @endif
                            @if($product['wide'])
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="font-medium text-gray-900">Width</span>
                                    <span class="text-gray-600">{{ $product['wide'] }} cm</span>
                                </div>
                            @endif
                            @if($product['height'])
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="font-medium text-gray-900">Height</span>
                                    <span class="text-gray-600">{{ $product['height'] }} cm</span>
                                </div>
                            @endif
                            @if($product['weight'])
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="font-medium text-gray-900">Weight</span>
                                    <span class="text-gray-600">{{ $product['weight'] }} g</span>
                                </div>
                            @endif
                        </div>
                    </x-card.content>
                </x-card>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div class="container mx-auto px-4 text-center space-y-8">
            <h2 class="text-3xl lg:text-4xl font-bold">Ready to Get Started?</h2>
            <p class="text-xl max-w-2xl mx-auto">
                Contact our experts to discuss your requirements and get a customized quote for {{ $product['name'] }}.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button
                    size="lg"
                    class="bg-white text-jobarn-primary hover:bg-gray-100"
                    onclick="document.getElementById('quote-modal').classList.remove('hidden')"
                >
                    Request Quote
                </x-button>
                <x-button
                    size="lg"
                    variant="outline"
                    class="border-white text-white product-contact hover:bg-white hover:text-jobarn-primary bg-transparent"
                    link="/contact-us" onclick="event.preventDefault(); window.location.href='/contact-us';"
                >
                    Contact Our Experts
                </x-button>
            </div>
        </div>
    </section>
</div>

<!-- Quote Request Modal -->
<div id="quote-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Request Quote for {{ $product['name'] }}</h3>
                            <button
                                type="button"
                                class="text-gray-400 hover:text-gray-500 focus:outline-none"
                                onclick="document.getElementById('quote-modal').classList.add('hidden')"
                            >
                                <i data-lucide="x" class="h-6 w-6"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <form id="quote-form" novalidate>
                                {{ csrf_field() }}
                                <div class="space-y-4">
                                    <div>
                                        <x-label for="name">Full Name *</x-label>
                                        <x-input id="name" name="name" required />
                                        <div class="error" id="name-error"></div>
                                    </div>
                                    <div>
                                        <x-label for="email">Email *</x-label>
                                        <x-input id="email" type="email" name="email" required />
                                        <div class="error" id="email-error"></div>
                                    </div>
                                    <div>
                                        <x-label for="phone">Phone Number</x-label>
                                        <x-input id="phone" name="phone" required/>
                                    </div>
                                    <div>
                                        <x-label for="company">Company</x-label>
                                        <x-input id="company" name="company" />
                                    </div>
                                    <div>
                                        <x-label for="product">Product</x-label>
                                        <x-input id="product" readonly name="prodduct" value="{{$product->name}}" />
                                    </div>
                                    <div>
                                        <x-label for="content">Message</x-label>
                                        <x-textarea id="content" name="message" rows="3"></x-textarea>
                                    </div>
                                    <div class="flex items-center">
                                        <x-checkbox name="agree_terms_and_policy" id="agree_terms_and_policy" />
                                        <x-label for="agree_terms_and_policy" class="ml-2" required>I agree to the terms and policy</x-label>
                                        <div class="error" id="agree-error"></div>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <input type="hidden" name="product_name" value="{{ $product['name'] }}">
                                </div>
                                <div class="error" id="server-error"></div>
                            </form>
                            <div id="quote-success" class="hidden text-center py-12 px-4">
                                <div class="flex flex-col items-center space-y-4">
                                    <svg class="h-16 w-16 text-green-500 mb-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" class="text-green-200" fill="currentColor" fill-opacity="0.1"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4" />
                                    </svg>
                                    <h3 class="text-2xl font-bold text-green-700">Request Submitted!</h3>
                                    <p class="text-gray-700">Thank you for your interest. Our team will contact you soon regarding your quote request.</p>
                                    <x-button class="mt-4 bg-jobarn-primary text-white" onclick="closeQuoteModal()">Close</x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse" id="quote-modal-footer">
                <x-button
                    class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white ml-3"
                    onclick="submitQuoteForm()"
                >
                    Submit Request
                </x-button>
                <x-button
                    variant="outline"
                    class="mt-3 sm:mt-0"
                    onclick="document.getElementById('quote-modal').classList.add('hidden')"
                >
                    Cancel
                </x-button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    // Validate quote form and show errors
    function validateQuoteForm() {
        const form = document.getElementById('quote-form');
        const nameInput = form.elements.name;
        const emailInput = form.elements.email;
        const agreeInput = form.elements.agree_terms_and_policy;
        let valid = true;

        if (nameInput.value.trim() === '') {
            document.getElementById('name-error').textContent = 'Please enter your full name.';
            valid = false;
        } else {
            document.getElementById('name-error').textContent = '';
        }

        if (emailInput.value.trim() === '') {
            document.getElementById('email-error').textContent = 'Please enter your email address.';
            valid = false;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
            document.getElementById('email-error').textContent = 'Please enter a valid email address.';
            valid = false;
        } else {
            document.getElementById('email-error').textContent = '';
        }

        if (!agreeInput.checked) {
            document.getElementById('agree-error').textContent = 'Please agree to the terms and policy.';
            valid = false;
        } else {
            document.getElementById('agree-error').textContent = '';
        }

        return valid;
    }

    // Show loading on submit button
    function setLoading(isLoading) {
        const btn = document.querySelector('#quote-modal-footer .bg-jobarn-primary'); // scoped only to footer
        if (!btn) return; // if footer is hidden, skip

        if (isLoading) {
            btn.disabled = true;
            btn.innerHTML = `<svg class="animate-spin h-5 w-5 inline mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>Submitting...`;
        } else {
            btn.disabled = false;
            btn.innerHTML = `<i data-lucide="quote" class="h-4 w-4 mr-2"></i>Submit Request`;
        }
    }

    // Show success message and hide form
    function showQuoteSuccess() {
        document.getElementById('quote-form').classList.add('hidden');
        document.getElementById('quote-success').classList.remove('hidden');
        const footer = document.getElementById('quote-modal-footer');
        if (footer) footer.style.display = "none";
    }

    // Hide modal and reset success state and footer
    function closeQuoteModal() {
        document.getElementById('quote-modal').classList.add('hidden');
        document.getElementById('quote-success').classList.add('hidden');
        document.getElementById('quote-form').classList.remove('hidden');
        const footer = document.getElementById('quote-modal-footer');
        if (footer) footer.style.display = "";
    }

    // Submit quote form
    function submitQuoteForm() {
        const form = document.getElementById('quote-form');
        document.getElementById('server-error').textContent = '';
        if (validateQuoteForm()) {
            setLoading(true);
            const formData = new FormData(form);

            fetch('{{ route('public.contact.test') }}', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                },
                body: formData
            })
            .then(async response => {
                setLoading(false);
                if (response.ok) {
                    // Success
                    form.reset();
                    document.getElementById('server-error').textContent = '';
                    showQuoteSuccess();
                } else {
                    // Try to parse error
                    let data = await response.json().catch(() => ({}));
                    let msg = data.message || 'An error occurred. Please try again.';
                    document.getElementById('server-error').textContent = msg;
                }
            })
            .catch(() => {
                setLoading(false);
                document.getElementById('server-error').textContent = 'An error occurred. Please try again.';
            });
        }
    }
</script>
@endpush

