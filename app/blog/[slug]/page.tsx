"use client"

import { useState, useEffect } from "react"
import Image from "next/image"
import Link from "next/link"
import { useParams } from "next/navigation"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Calendar, User, ArrowLeft, Share2, Clock } from "lucide-react"
import { apiService } from "@/lib/api"
import { Loading } from "@/components/ui/loading"
import { ErrorMessage } from "@/components/ui/error-message"

interface BlogPost {
  id: number
  title: string
  slug: string
  excerpt: string
  content: string
  featured_image: string
  author: string
  published_at: string
  status: string
  tags: string[]
}

export default function BlogDetailPage() {
  const params = useParams()
  const slug = params.slug as string

  const [post, setPost] = useState<BlogPost | null>(null)
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)

  const fetchPost = async () => {
    try {
      setLoading(true)
      setError(null)
      // TODO: This will be replaced with real API call
      const response = await apiService.getBlog(slug)
      setPost(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load blog post")
      console.error("Error fetching blog post:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    if (slug) {
      fetchPost()
    }
  }, [slug])

  const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    })
  }

  const estimateReadingTime = (content: string) => {
    const wordsPerMinute = 200
    const wordCount = content.replace(/<[^>]*>/g, "").split(/\s+/).length
    const readingTime = Math.ceil(wordCount / wordsPerMinute)
    return readingTime
  }

  if (loading) {
    return (
      <div className="min-h-screen">
        <div className="container mx-auto px-4 py-16">
          <div className="max-w-4xl mx-auto">
            <div className="flex justify-center">
              <Loading size="lg" text="Loading blog post..." />
            </div>
          </div>
        </div>
      </div>
    )
  }

  if (error || !post) {
    return (
      <div className="min-h-screen">
        <div className="container mx-auto px-4 py-16">
          <div className="max-w-4xl mx-auto">
            <ErrorMessage message={error || "Blog post not found"} onRetry={fetchPost} />
          </div>
        </div>
      </div>
    )
  }

  return (
    <div className="min-h-screen">
      {/* Back Navigation */}
      <section className="py-8 bg-gray-50 border-b">
        <div className="container mx-auto px-4">
          <Button asChild variant="ghost" className="mb-4">
            <Link href="/blog">
              <ArrowLeft className="h-4 w-4 mr-2" />
              Back to Blog
            </Link>
          </Button>
        </div>
      </section>

      {/* Blog Post Content */}
      <article className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            {/* Post Header */}
            <header className="space-y-6 mb-12">
              <div className="flex flex-wrap gap-2">
                {post.tags.map((tag, index) => (
                  <Badge key={index} className="bg-jobarn-primary text-white">
                    {tag}
                  </Badge>
                ))}
              </div>

              <h1 className="text-3xl lg:text-5xl font-bold text-gray-900 leading-tight">{post.title}</h1>

              <div className="flex flex-wrap items-center gap-6 text-gray-600">
                <div className="flex items-center space-x-2">
                  <User className="h-4 w-4" />
                  <span>{post.author}</span>
                </div>
                <div className="flex items-center space-x-2">
                  <Calendar className="h-4 w-4" />
                  <span>{formatDate(post.published_at)}</span>
                </div>
                <div className="flex items-center space-x-2">
                  <Clock className="h-4 w-4" />
                  <span>{estimateReadingTime(post.content)} min read</span>
                </div>
              </div>

              <div className="flex items-center space-x-4">
                <Button size="sm" variant="outline">
                  <Share2 className="h-4 w-4 mr-2" />
                  Share
                </Button>
              </div>
            </header>

            {/* Featured Image */}
            <div className="relative h-64 lg:h-96 mb-12 rounded-2xl overflow-hidden">
              <Image src={post.featured_image || "/placeholder.svg"} alt={post.title} fill className="object-cover" />
            </div>

            {/* Post Content */}
            <div className="prose prose-lg max-w-none">
              <div className="text-gray-700 leading-relaxed" dangerouslySetInnerHTML={{ __html: post.content }} />
            </div>

            {/* Post Footer */}
            <footer className="mt-12 pt-8 border-t border-gray-200">
              <div className="flex flex-wrap gap-2 mb-6">
                <span className="text-gray-600 font-medium">Tags:</span>
                {post.tags.map((tag, index) => (
                  <Badge key={index} variant="secondary">
                    {tag}
                  </Badge>
                ))}
              </div>

              <div className="flex flex-col sm:flex-row gap-4 justify-between items-center">
                <Button asChild variant="outline">
                  <Link href="/blog">
                    <ArrowLeft className="h-4 w-4 mr-2" />
                    Back to Blog
                  </Link>
                </Button>

                <Button asChild className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                  <Link href="/contact">Get in Touch</Link>
                </Button>
              </div>
            </footer>
          </div>
        </div>
      </article>

      {/* Related Posts CTA */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center space-y-8">
            <h2 className="text-3xl font-bold text-gray-900">Explore More ICT Insights</h2>
            <p className="text-lg text-gray-600">
              Discover more articles about technology trends, best practices, and industry insights.
            </p>
            <Button asChild size="lg" className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
              <Link href="/blog">View All Posts</Link>
            </Button>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <h2 className="text-3xl lg:text-4xl font-bold">Need Expert ICT Solutions?</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Let our experienced team help you implement the technology solutions discussed in this article.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              Contact Our Experts
            </Button>
            <Button
              asChild
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              <Link href="/services">View Our Services</Link>
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
