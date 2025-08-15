@extends('packages/theme::frontend.master')

@section('content')
<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div class="container mx-auto px-4 text-center space-y-6">
            <x-badge class="bg-jobarn-primary text-white">Our Blog</x-badge>
            <h1 class="text-4xl lg:text-5xl font-bold">ICT Insights & Industry News</h1>
            <p class="text-xl max-w-3xl mx-auto">
                Stay updated with the latest trends, tips, and insights from the world of information and communication
                technology.
            </p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-8 bg-gray-50 border-b">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="relative w-full max-w-md">
                    <i data-lucide="search" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4"></i>
                    <x-input
                        id="blog-search"
                        placeholder="Search blog posts..."
                        class="pl-10"
                    />
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="mb-8">
                <p class="text-gray-600" id="post-count">
                    {{-- {{ $posts->total() }} blog post{{ $posts->total() !== 1 ? 's' : '' }} found --}}
                </p>
            </div>

            @if($posts->isEmpty())
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No blog posts found matching your search.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <x-card class="group hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="relative h-48 overflow-hidden">
                                <img
                                    src="{{ $post['featured_image'] ?? '/placeholder.svg' }}"
                                    alt="{{ $post['title'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                >
                            </div>
                            <x-card.content class="p-6 space-y-4">
                                <div class="flex items-center space-x-4 text-sm text-gray-500">
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="calendar" class="h-4 w-4"></i>
                                    <span>{{ $post['published_at']->format('F j, Y') }}</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <i data-lucide="user" class="h-4 w-4"></i>
                                        <span>{{ $post['author'] }}</span>
                                    </div>
                                </div>

                                <h3 class="text-xl font-semibold text-gray-900 line-clamp-2 group-hover:text-jobarn-primary transition-colors">
                                    {{ $post['title'] }}
                                </h3>

                                <p class="text-gray-600 line-clamp-3">{{ $post['excerpt'] }}</p>

                                {{-- <div class="flex flex-wrap gap-2">
                                    @foreach($post->tags->take(3) as $tag)
                                        <x-badge variant="secondary" class="text-xs">
                                            {{ $tag->name }}
                                        </x-badge>
                                    @endforeach
                                </div> --}}

                                <x-button as="a" href="/" class="w-full bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                                    Read More
                                    <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                                </x-button>
                            </x-card.content>
                        </x-card>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{-- {{  }} --}}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div class="container mx-auto px-4 text-center space-y-8">
            <h2 class="text-3xl lg:text-4xl font-bold">Stay Connected with JOBARN</h2>
            <p class="text-xl max-w-2xl mx-auto">
                Get the latest ICT insights, industry news, and technology tips delivered straight to your inbox.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                    Subscribe to Newsletter
                </x-button>
                <x-button
                    as="a"
                    href="/"
                    size="lg"
                    variant="outline"
                    class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                >
                    Contact Our Experts
                </x-button>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('blog-search');

    // Debounce search function
    const debounce = (func, delay) => {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), delay);
        };
    };

    // Handle search
    const handleSearch = debounce(function(e) {
        const searchTerm = e.target.value;
        window.location.href = "/?search=" + encodeURIComponent(searchTerm);
    }, 500);

    searchInput.addEventListener('input', handleSearch);

    // Initialize Lucide icons
    if (window.lucide) {
        lucide.createIcons();
    }
});
</script>
@endpush
@endsection
