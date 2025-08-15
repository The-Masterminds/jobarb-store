@extends('layouts.app')

@section('content')
<div class="min-h-screen">
    <!-- Back Navigation -->
    <section class="py-8 bg-gray-50 border-b">
        <div class="container mx-auto px-4">
            <x-button variant="ghost" class="mb-4" link="{{ route('blog.index') }}">
                <i data-lucide="arrow-left" class="h-4 w-4 mr-2"></i>
                Back to Blog
            </x-button>
        </div>
    </section>

    <!-- Blog Post Content -->
    <article class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Post Header -->
                <header class="space-y-6 mb-12">
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <x-badge class="bg-jobarn-primary text-white">
                                {{ $tag->name }}
                            </x-badge>
                        @endforeach
                    </div>

                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight">{{ $post->title }}</h1>

                    <div class="flex flex-wrap items-center gap-6 text-gray-600">
                        <div class="flex items-center space-x-2">
                            <i data-lucide="user" class="h-4 w-4"></i>
                            <span>{{ $post->author }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i data-lucide="calendar" class="h-4 w-4"></i>
                            <span>{{ $post->published_at->format('F j, Y') }}</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i data-lucide="clock" class="h-4 w-4"></i>
                            <span>{{ $readingTime }} min read</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <x-button size="sm" variant="outline" onclick="sharePost()">
                            <i data-lucide="share-2" class="h-4 w-4 mr-2"></i>
                            Share
                        </x-button>
                    </div>
                </header>

                <!-- Featured Image -->
                <div class="relative h-64 lg:h-96 mb-12 rounded-2xl overflow-hidden">
                    <img
                        src="{{ $post->featured_image ?? '/placeholder.svg' }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>

                <!-- Post Content -->
                <div class="prose prose-lg max-w-none">
                    {!! $post->content !!}
                </div>

                <!-- Post Footer -->
                <footer class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="text-gray-600 font-medium">Tags:</span>
                        @foreach($post->tags as $tag)
                            <x-badge variant="secondary">
                                {{ $tag->name }}
                            </x-badge>
                        @endforeach
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
                        <x-button as="a" href="{{ route('blog.index') }}" variant="outline">
                            <i data-lucide="arrow-left" class="h-4 w-4 mr-2"></i>
                            Back to Blog
                        </x-button>

                        <x-button as="a" href="{{ route('contact') }}" class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                            Get in Touch
                        </x-button>
                    </div>
                </footer>
            </div>
        </div>
    </article>

    <!-- Related Posts CTA -->
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <h2 class="text-3xl font-bold text-gray-900">Explore More ICT Insights</h2>
                <p class="text-lg text-gray-600">
                    Discover more articles about technology trends, best practices, and industry insights.
                </p>
                <x-button as="a" href="{{ route('blog.index') }}" size="lg" class="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                    View All Posts
                </x-button>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div class="container mx-auto px-4 text-center space-y-8">
            <h2 class="text-3xl lg:text-4xl font-bold">Need Expert ICT Solutions?</h2>
            <p class="text-xl max-w-2xl mx-auto">
                Let our experienced team help you implement the technology solutions discussed in this article.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <x-button size="lg" class="bg-white text-jobarn-primary hover:bg-gray-100">
                    Contact Our Experts
                </x-button>
                <x-button
                    as="a"
                    href="{{ route('services') }}"
                    size="lg"
                    variant="outline"
                    class="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
                >
                    View Our Services
                </x-button>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
function sharePost() {
    if (navigator.share) {
        navigator.share({
            title: "{{ $post->title }}",
            text: "Check out this blog post from JOBARN",
            url: window.location.href
        }).catch(err => {
            console.log('Error sharing:', err);
        });
    } else {
        // Fallback for browsers that don't support Web Share API
        const shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent("{{ $post->title }}")}&url=${encodeURIComponent(window.location.href)}`;
        window.open(shareUrl, '_blank');
    }
}

// Initialize Lucide icons
if (window.lucide) {
    lucide.createIcons();
}
</script>
@endpush
@endsection
