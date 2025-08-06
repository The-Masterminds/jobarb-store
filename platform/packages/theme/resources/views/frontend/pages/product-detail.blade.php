@extends('packages/theme::frontend.master')


@section('content')
<div class="min-h-screen">
    <!-- Back Navigation -->
    <section class="py-8 bg-gray-50 border-b">
        <div class="container mx-auto px-4">
            <x-button variant="ghost" class="mb-4" link="/products">
                <i data-lucide="arrow-left" class="h-4 w-4 mr-2"></i>
                Back to Products
            </x-button>
        </div>
    </section>

    <!-- Product Details -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-100">
                        <img
                            src="{{ $product['image'] ?? '/placeholder.svg' }}"
                            alt="{{ $product['name'] }}"
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>

                <!-- Product Information -->
                <div class="space-y-8">
                    <!-- Header -->
                    <div class="space-y-4">
                        <div class="flex flex-wrap items-center gap-3">
                            <x-badge class="bg-jobarn-primary text-white">{{ $product['brand'] }}</x-badge>
                            <x-badge variant="secondary" class="bg-jobarn-accent2/10 text-jobarn-accent2">
                                {{ $product['category'] }}
                            </x-badge>
                        </div>

                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-900">{{ $product['name'] }}</h1>

                        <div class="flex flex-wrap items-center gap-6 text-gray-600">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="hash" class="h-4 w-4"></i>
                                <span class="font-medium">SKU: {{ $product['sku'] }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="package" class="h-4 w-4"></i>
                                <span>{{ $product['category'] }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="building-2" class="h-4 w-4"></i>
                                <span>{{ $product['brand'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900">Product Description</h2>
                        <p class="text-gray-600 leading-relaxed">{{ $product['description'] }}</p>
                    </div>

                    <!-- Key Features -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900">Key Features</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach(array_slice($product['features'], 0, 6) as $feature)
                                <div class="flex items-start space-x-2">
                                    <div class="h-2 w-2 bg-jobarn-primary rounded-full mt-2 flex-shrink-0"></div>
                                    <span class="text-gray-600 text-sm">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                        @if(count($product['features']) > 6)
                            <p class="text-sm text-gray-500">+{{ count($product['features']) - 6 }} more features</p>
                        @endif
                    </div>

                    <!-- Price and CTA -->
                    <div class="space-y-6">
                        <x-separator />
                        <div class="space-y-4">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="tag" class="h-5 w-5 text-jobarn-primary"></i>
                                <span class="text-lg font-semibold text-gray-900">Pricing: {{ $product['price_range'] }}</span>
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
                            @foreach($product['specifications'] as $spec)
                                <div class="flex justify-between items-center py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="font-medium text-gray-900">{{ $spec['label'] }}</span>
                                    <span class="text-gray-600 text-right">{{ $spec['value'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </x-card.content>
                </x-card>
            </div>
        </div>
    </section>

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
                    class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                    link="/contact"
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
                            <form id="quote-form">
                                <div class="space-y-4">
                                    <div>
                                        <x-label for="quote-name">Full Name *</x-label>
                                        <x-input id="quote-name" name="name" required />
                                    </div>
                                    <div>
                                        <x-label for="quote-email">Email *</x-label>
                                        <x-input id="quote-email" type="email" name="email" required />
                                    </div>
                                    <div>
                                        <x-label for="quote-phone">Phone Number</x-label>
                                        <x-input id="quote-phone" name="phone" />
                                    </div>
                                    <div>
                                        <x-label for="quote-company">Company</x-label>
                                        <x-input id="quote-company" name="company" />
                                    </div>
                                    <div>
                                        <x-label for="quote-message">Message</x-label>
                                        <x-textarea id="quote-message" name="message" rows="3"></x-textarea>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <input type="hidden" name="product_name" value="{{ $product['name'] }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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


    // Submit quote form
    function submitQuoteForm() {
        const form = document.getElementById('quote-form');
        const formData = new FormData(form);

        // You would typically send this to your backend
        fetch('/api/quote-request', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Your quote request has been submitted successfully!');
                document.getElementById('quote-modal').classList.add('hidden');
                form.reset();
            } else {
                alert('There was an error submitting your request. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error submitting your request. Please try again.');
        });
    }
</script>
@endpush


{{-- jQuery AJAX logic --}}
@push('scripts')
<script>
$(function() {
    // Categories
    const categories = [
        { id: "all", name: "All Products" },
        { id: "laptops", name: "Laptops & Desktops" },
        { id: "networking", name: "Networking Equipment" },
        { id: "cctv", name: "CCTV & Surveillance" },
        { id: "audio", name: "Audio Equipment" },
        { id: "interactive", name: "Interactive Displays" },
        { id: "printers", name: "Printers & Projectors" },
        { id: "accessories", name: "Computer Accessories" },
        { id: "drones", name: "Drones & Cameras" },
    ];

    let selectedCategory = "all";
    let searchTerm = "";

    // Render category buttons
    function renderCategoryButtons() {
        let html = '';
        categories.forEach(cat => {
            html += `<button class="btn btn-sm ${selectedCategory === cat.id ? 'bg-jobarn-primary text-white' : 'btn-outline'} mx-1 mb-2" data-id="${cat.id}">${cat.name}</button>`;
        });
        $('#category-buttons').html(html);
    }

    // Fetch products
    function fetchProducts() {
        $('#products-loading').show();
        $('#products-error').hide();
        $('#products-empty').hide();
        $('#products-grid').empty();
        $('#products-count').empty();

        $.ajax({
            url: '/api/products',
            data: {
                category: selectedCategory,
                search: searchTerm
            },
            success: function(res) {
                $('#products-loading').hide();
                let products = res.data || [];
                $('#products-count').text(`Showing ${products.length} products`);
                if (products.length === 0) {
                    $('#products-empty').show();
                    return;
                }
                let html = '';
                products.forEach(product => {
                    html += `
                    <div class="card group hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="relative h-48 overflow-hidden">
                            <img src="${product.image || '/placeholder.svg'}" alt="${product.title}" class="object-cover w-100 h-100" style="width:100%;height:100%;object-fit:cover;">
                            <span class="badge bg-jobarn-primary text-white absolute top-2 left-2">${product.brand}</span>
                        </div>
                        <div class="card-body p-6 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-900">${product.title}</h3>
                            <p class="text-gray-600 text-sm">${product.description}</p>
                            <div class="space-y-2">
                                <p class="text-sm font-medium text-gray-700">Key Features:</p>
                                <div class="flex flex-wrap gap-1">
                                    ${(product.features || []).slice(0,2).map(f => `<span class="badge badge-secondary text-xs">${f}</span>`).join('')}
                                    ${(product.features && product.features.length > 2) ? `<span class="badge badge-secondary text-xs">+${product.features.length-2} more</span>` : ''}
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="btn flex-1 bg-jobarn-primary text-white view-detail-btn" data-slug="${product.slug}">View Details</button>
                                <button class="btn btn-outline border-jobarn-primary text-jobarn-primary quote-btn" data-title="${product.title}">Quote</button>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#products-grid').html(html);
            },
            error: function(xhr) {
                $('#products-loading').hide();
                $('#products-error').show().text('Failed to load products. Please try again.');
            }
        });
    }

    // Fetch product detail
    function fetchProductDetail(slug) {
        $('#product-detail-content').html(`
            <div class="text-center py-12">
                <div class="spinner-border text-jobarn-primary" role="status"></div>
                <p class="mt-4 text-gray-500">Loading product details...</p>
            </div>
        `);
        $('#productDetailModal').modal('show');
        $.ajax({
            url: `/api/products/${slug}`,
            success: function(res) {
                let product = res.data;
                if (!product) {
                    $('#product-detail-content').html('<div class="text-center py-12 text-red-500">Product not found.</div>');
                    return;
                }
                $('#product-detail-content').html(`
                    <div class="min-h-screen">
                        <section class="py-8 bg-gray-50 border-b">
                            <div class="container mx-auto px-4">
                                <button class="btn btn-link text-jobarn-primary" data-dismiss="modal">
                                    <i class="bi bi-arrow-left mr-2"></i> Back to Products
                                </button>
                            </div>
                        </section>
                        <section class="py-16 lg:py-24">
                            <div class="container mx-auto px-4">
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="rounded-2xl overflow-hidden bg-gray-100" style="aspect-ratio:1/1;">
                                            <img src="${product.image || '/placeholder.svg'}" alt="${product.name}" class="object-cover w-100 h-100" style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 space-y-8">
                                        <div class="space-y-4">
                                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                                <span class="badge bg-jobarn-primary text-white">${product.brand}</span>
                                                <span class="badge bg-jobarn-accent2/10 text-jobarn-accent2">${product.category}</span>
                                            </div>
                                            <h1 class="text-3xl font-bold text-gray-900">${product.name}</h1>
                                            <div class="flex flex-wrap items-center gap-6 text-gray-600">
                                                <div class="flex items-center space-x-2">
                                                    <i class="bi bi-hash"></i>
                                                    <span class="font-medium">SKU: ${product.sku}</span>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <i class="bi bi-box"></i>
                                                    <span>${product.category}</span>
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <i class="bi bi-building"></i>
                                                    <span>${product.brand}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <h2 class="text-xl font-semibold text-gray-900">Product Description</h2>
                                            <p class="text-gray-600 leading-relaxed">${product.description}</p>
                                        </div>
                                        <div class="space-y-4">
                                            <h2 class="text-xl font-semibold text-gray-900">Key Features</h2>
                                            <div class="row">
                                                ${(product.features || []).slice(0,6).map(f => `<div class="col-6 mb-2"><span class="text-gray-600 text-sm">• ${f}</span></div>`).join('')}
                                            </div>
                                            ${(product.features && product.features.length > 6) ? `<p class="text-sm text-gray-500">+${product.features.length-6} more features</p>` : ''}
                                        </div>
                                        <div class="space-y-6">
                                            <hr/>
                                            <div class="space-y-4">
                                                <div class="flex items-center space-x-2">
                                                    <i class="bi bi-tag text-jobarn-primary"></i>
                                                    <span class="text-lg font-semibold text-gray-900">Pricing: ${product.price_range}</span>
                                                </div>
                                                <button class="btn btn-lg bg-jobarn-primary text-white quote-btn" data-title="${product.name}"><i class="bi bi-quote mr-2"></i>Request Quote</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="py-16 lg:py-24 bg-gray-50">
                            <div class="container mx-auto px-4">
                                <div class="max-w-4xl mx-auto">
                                    <div class="text-center space-y-4 mb-12">
                                        <h2 class="text-3xl font-bold text-gray-900">Technical Specifications</h2>
                                        <p class="text-lg text-gray-600">Detailed technical information and specifications</p>
                                    </div>
                                    <div class="card border-0 shadow-lg">
                                        <div class="card-body p-8">
                                            <div class="row">
                                                ${(product.specifications || []).map(spec => `
                                                    <div class="col-md-6 py-3 border-bottom">
                                                        <span class="font-medium text-gray-900">${spec.label}</span>
                                                        <span class="text-gray-600 float-right">${spec.value}</span>
                                                    </div>
                                                `).join('')}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
                            <div class="container mx-auto px-4 text-center space-y-8">
                                <h2 class="text-3xl lg:text-4xl font-bold">Ready to Get Started?</h2>
                                <p class="text-xl max-w-2xl mx-auto">
                                    Contact our experts to discuss your requirements and get a customized quote for ${product.name}.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    <button class="btn btn-lg bg-white text-jobarn-primary quote-btn" data-title="${product.name}">Request Quote</button>
                                    <a href="/contact" class="btn btn-lg border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent">Contact Our Experts</a>
                                </div>
                            </div>
                        </section>
                    </div>
                `);
            },
            error: function() {
                $('#product-detail-content').html('<div class="text-center py-12 text-red-500">Failed to load product details.</div>');
            }
        });
    }

    // Initial render
    renderCategoryButtons();
    fetchProducts();

    // Event handlers
    $('#category-select').on('change', function() {
        selectedCategory = $(this).val();
        renderCategoryButtons();
        fetchProducts();
    });

    $('#search-input').on('input', function() {
        searchTerm = $(this).val();
        fetchProducts();
    });

    $('#category-buttons').on('click', 'button', function() {
        selectedCategory = $(this).data('id');
        $('#category-select').val(selectedCategory);
        renderCategoryButtons();
        fetchProducts();
    });

    $('#products-grid').on('click', '.view-detail-btn', function() {
        const slug = $(this).data('slug');
        fetchProductDetail(slug);
    });

    // Modal close
    $(document).on('click', '[data-dismiss="modal"]', function() {
        $('#productDetailModal').modal('hide');
    });

    // (Optional) Quote button handler
    $(document).on('click', '.quote-btn', function() {
        alert('Quote request for: ' + $(this).data('title'));
        // You can open a quote modal here
    });
});
</script>
@endpush

