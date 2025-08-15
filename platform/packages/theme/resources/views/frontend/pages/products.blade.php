@extends('packages/theme::frontend.master')

@section('content')
    <div class="min-h-screen">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
            <div class="container mx-auto px-4 text-center space-y-6">
                <x-badge class="bg-jobarn-primary text-white">Our Products</x-badge>
                <h1 class="text-4xl lg:text-5xl font-bold">Premium ICT Equipment & Solutions</h1>
                <p class="text-xl max-w-3xl mx-auto">
                    Discover our comprehensive range of high-quality technology products from leading global brands,
                    carefully
                    selected to meet your business needs.
                </p>
            </div>
        </section>

        <!-- Search and Filter -->
        <section class="py-8 bg-gray-50 border-b">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                    <div class="relative flex-1 max-w-md">
                        <i data-lucide="search"
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4"></i>
                        <x-input id="search-input" placeholder="Search products..." class="pl-10" />
                    </div>
                    <div class="flex items-center space-x-2">
                        <i data-lucide="filter" class="h-4 w-4 text-gray-600"></i>
                        <select id="category-select"
                            class="flex h-10 w-[200px] items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                            @foreach ([['id' => 'all', 'name' => 'Select category'], ['id' => 'laptops', 'name' => 'Laptops & Desktops'], ['id' => 'networking', 'name' => 'Networking Equipment'], ['id' => 'cctv', 'name' => 'CCTV & Surveillance'], ['id' => 'audio', 'name' => 'Audio Equipment'], ['id' => 'interactive', 'name' => 'Interactive Displays'], ['id' => 'printers', 'name' => 'Printers & Projectors'], ['id' => 'accessories', 'name' => 'Computer Accessories'], ['id' => 'drones', 'name' => 'Drones & Cameras']] as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Categories -->
        <section class="py-8 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap gap-2 justify-center" id="category-buttons">
                    @foreach ([['id' => 'all', 'name' => 'All Products'], ['id' => 'laptops', 'name' => 'Laptops & Desktops'], ['id' => 'networking', 'name' => 'Networking Equipment'], ['id' => 'cctv', 'name' => 'CCTV & Surveillance'], ['id' => 'audio', 'name' => 'Audio Equipment'], ['id' => 'interactive', 'name' => 'Interactive Displays'], ['id' => 'printers', 'name' => 'Printers & Projectors'], ['id' => 'accessories', 'name' => 'Computer Accessories'], ['id' => 'drones', 'name' => 'Drones & Cameras']] as $category)
                        <button type="button" data-category="{{ $category['id'] }}"
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background border border-input hover:bg-accent hover:text-accent-foreground h-9 px-3 py-1 {{ $category['id'] === 'all' ? 'bg-jobarn-primary hover:bg-jobarn-primary/90 text-white' : '' }}">
                            {{ $category['name'] }}
                        </button>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="py-16 lg:py-24">
            <div class="container mx-auto px-4">
                <div class="mb-8">
                    <p class="text-gray-600" id="product-count">Loading products...</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="products-grid">
                    <!-- Products will be loaded here via JavaScript -->
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Loading products...</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
            <div class="container mx-auto px-4 text-center space-y-8">
                <h2 class="text-3xl lg:text-4xl font-bold">Need Help Choosing the Right Products?</h2>
                <p class="text-xl max-w-2xl mx-auto">
                    Our expert team is here to help you select the perfect ICT solutions for your business needs.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                        Contact Our Experts
                    </x-button>
                    <x-button size="lg" variant="outline"
                        class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent">
                        Download Catalog
                    </x-button>
                </div>
            </div>
        </section>
    </div>

    <!-- Product Modal Template (hidden) -->
    <template id="product-modal-template">
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-product-title"></h3>
                                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <i data-lucide="x" class="h-6 w-6" id="close-modal"></i>
                                    </button>
                                </div>
                                <div class="mt-2" id="modal-product-content">
                                    <!-- Content will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-button class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white ml-3">
                            Request Quote
                        </x-button>
                        <x-button variant="outline" class="mt-3 sm:mt-0">
                            View Full Details
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const searchInput = document.getElementById('search-input');
            const categorySelect = document.getElementById('category-select');
            const categoryButtons = document.getElementById('category-buttons');
            const productsGrid = document.getElementById('products-grid');
            const productCount = document.getElementById('product-count');

            // Current filter state
            let currentCategory = 'all';
            let currentSearch = '';
            let isLoading = false;


            // Fetch products function
            async function fetchProducts() {
                isLoading = true;
                productsGrid.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Loading products...</p>
                </div>
            `;
                // ?category=${encodeURIComponent(currentCategory)}&search=${encodeURIComponent(currentSearch)}
                try {
                    const response = await fetch(`{{ route('public.ajax.products') }}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    const data = await response.json();

                    console.log('Fetched products:', data.data.data);


                    if (!data.error && data.data.data.length > 0) {
                        renderProducts(data.data.data);
                    } else {
                        productsGrid.innerHTML = `
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500 text-lg">No products found matching your criteria.</p>
                        </div>
                    `;
                    }

                    productCount.textContent = `Showing ${data.data.length} products`;
                } catch (error) {
                    console.error(error);
                    productsGrid.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">Failed to load products. Please try again.</p>
                        <button class="mt-4 px-4 py-2 bg-jobarn-primary text-white rounded hover:bg-jobarn-primary/90" onclick="fetchProducts()">
                            Retry
                        </button>
                    </div>
                `;
                } finally {
                    isLoading = false;
                }
            }

            // Render products function
            function renderProducts(products) {
                productsGrid.innerHTML = '';

                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.className =
                        'group hover:shadow-xl transition-all duration-300 overflow-hidden rounded-lg border';
                                        productCard.innerHTML = `
                        <div class="flex flex-col h-full">
                            <div class="relative h-48 overflow-hidden">
                                <img src="/storage/${product.image || 'placeholder.svg'}" alt="${product.name}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                ${product.product_collections && product.product_collections.length > 0 ? `
                                    <x-badge class="absolute top-2 left-2 bg-jobarn-primary text-white text-xs">
                                        ${product.product_collections.map(c => c.name).join(', ')}
                                    </x-badge>
                                ` : ''}
                                <x-badge class="absolute top-2 right-2 bg-gray-900/80 text-white text-xs">
                                    ${product.product_type?.label || ''}
                                </x-badge>
                            </div>
                            <div class="flex-1 flex flex-col p-6 space-y-4">
                                <h3 class="text-lg font-semibold text-gray-900 line-clamp-2">${product.name}</h3>
                                <div class="text-gray-600 text-sm line-clamp-2">${product.description}</div>
                                <div class="space-y-2">
                                    <p class="text-sm font-medium text-gray-700">Key Features:</p>
                                    <div class="flex flex-wrap gap-1">
                                        ${(product.description || '').replace(/<[^>]+>/g, '').split('\n').slice(0, 2).map(feature => `
                                            <x-badge variant="secondary" class="text-xs">${feature.trim()}</x-badge>
                                        `).join('')}
                                    </div>
                                </div>
                                <div class="mt-auto flex flex-col gap-2">
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-bold text-jobarn-primary">Tsh ${product.front_sale_price.toLocaleString()}</span>
                                        <span class="text-xs text-gray-500">${product.stock_status?.label || ''}</span>
                                    </div>
                                    <div class="flex gap-2 pt-2">
                                        <x-button class="flex-1 bg-jobarn-primary hover:bg-jobarn-primary/90 text-white view-details" data-slug="${product.slugable?.key}">
                                            View Details
                                        </x-button>
                                        <x-button variant="outline" class="border-jobarn-primary text-jobarn-primary hover:bg-jobarn-primary hover:text-white request-quote" data-product-id="${product.id}">
                                            Quote
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>

                `;

                    productsGrid.appendChild(productCard);
                });

                // Add event listeners to the new buttons
                document.querySelectorAll('.view-details').forEach(button => {
                    button.addEventListener('click', () => {
                        window.location.href = `/product/${button.dataset.slug}`;
                    });
                });

                document.querySelectorAll('.request-quote').forEach(button => {
                    button.addEventListener('click', () => {
                        openQuoteModal(button.dataset.productId);
                    });
                });

                // Refresh Lucide icons for new elements
                if (window.lucide) {
                    lucide.createIcons();
                }
            }

            // Open quote modal function
            function openQuoteModal(productId) {
                // Implement your quote modal logic here
                console.log('Request quote for product:', productId);
                alert('Quote request functionality would open here for product: ' + productId);
            }

            // Event listeners
            searchInput.addEventListener('input', (e) => {
                currentSearch = e.target.value;
                fetchProducts();
            });

            categorySelect.addEventListener('change', (e) => {
                currentCategory = e.target.value;
                updateActiveCategoryButton();
                fetchProducts();
            });

            categoryButtons.addEventListener('click', (e) => {
                const button = e.target.closest('button[data-category]');
                if (button) {
                    currentCategory = button.dataset.category;
                    categorySelect.value = currentCategory;
                    updateActiveCategoryButton();
                    fetchProducts();
                }
            });

            // Update active category button
            function updateActiveCategoryButton() {
                document.querySelectorAll('#category-buttons button').forEach(button => {
                    if (button.dataset.category === currentCategory) {
                        button.classList.add('bg-jobarn-primary', 'hover:bg-jobarn-primary/90',
                            'text-white');
                        button.classList.remove('border-input', 'hover:bg-accent',
                            'hover:text-accent-foreground');
                    } else {
                        button.classList.remove('bg-jobarn-primary', 'hover:bg-jobarn-primary/90',
                            'text-white');
                        button.classList.add('border-input', 'hover:bg-accent',
                            'hover:text-accent-foreground');
                    }
                });
            }

            // Initial load
            fetchProducts();
        });
    </script>
@endpush
