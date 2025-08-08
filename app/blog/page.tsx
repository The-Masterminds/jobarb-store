"use client"

import { useState, useEffect } from "react"
import Image from "next/image"
import Link from "next/link"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Search, Calendar, User, ArrowRight } from "lucide-react"
import { apiService } from "@/lib/api"
import { LoadingCard } from "@/components/ui/loading"
import { ErrorMessage } from "@/components/ui/error-message"

interface BlogPost {
  id: number
  title: string
  slug: string
  excerpt: string
  featured_image: string
  author: string
  published_at: string
  status: string
  tags: string[]
}

export default function BlogPage() {
  const [posts, setPosts] = useState<BlogPost[]>([])
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)
  const [searchTerm, setSearchTerm] = useState("")

  const fetchPosts = async () => {
    try {
      setLoading(true)
      setError(null)
      // TODO: This will be replaced with real API call
      const response = await apiService.getBlogs({
        search: searchTerm,
      })
      setPosts(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load blog posts")
      console.error("Error fetching blog posts:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    fetchPosts()
  }, [searchTerm])

  const handleSearch = (value: string) => {
    setSearchTerm(value)
  }

  const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    })
  }

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div className="container mx-auto px-4 text-center space-y-6">
          <Badge className="bg-jobarn-primary text-white">Our Blog</Badge>
          <h1 className="text-4xl lg:text-5xl font-bold">ICT Insights & Industry News</h1>
          <p className="text-xl max-w-3xl mx-auto">
            Stay updated with the latest trends, tips, and insights from the world of information and communication
            technology.
          </p>
        </div>
      </section>

      {/* Search Section */}
      <section className="py-8 bg-gray-50 border-b">
        <div className="container mx-auto px-4">
          <div className="flex justify-center">
            <div className="relative w-full max-w-md">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
              <Input
                placeholder="Search blog posts..."
                value={searchTerm}
                onChange={(e) => handleSearch(e.target.value)}
                className="pl-10"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Blog Posts Grid */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          {!loading && !error && (
            <div className="mb-8">
              <p className="text-gray-600">
                {posts.length} blog post{posts.length !== 1 ? "s" : ""} found
              </p>
            </div>
          )}

          {loading ? (
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {[...Array(6)].map((_, index) => (
                <LoadingCard key={index} />
              ))}
            </div>
          ) : error ? (
            <ErrorMessage message={error} onRetry={fetchPosts} />
          ) : posts.length === 0 ? (
            <div className="text-center py-12">
              <p className="text-gray-500 text-lg">No blog posts found matching your search.</p>
            </div>
          ) : (
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              {posts.map((post) => (
                <Card key={post.id} className="group hover:shadow-xl transition-all duration-300 overflow-hidden">
                  <div className="relative h-48 overflow-hidden">
                    <Image
                      src={post.featured_image || "/placeholder.svg"}
                      alt={post.title}
                      fill
                      className="object-cover group-hover:scale-105 transition-transform duration-300"
                    />
                  </div>
                  <CardContent className="p-6 space-y-4">
                    <div className="flex items-center space-x-4 text-sm text-gray-500">
                      <div className="flex items-center space-x-1">
                        <Calendar className="h-4 w-4" />
                        <span>{formatDate(post.published_at)}</span>
                      </div>
                      <div className="flex items-center space-x-1">
                        <User className="h-4 w-4" />
                        <span>{post.author}</span>
                      </div>
                    </div>

                    <h3 className="text-xl font-semibold text-gray-900 line-clamp-2 group-hover:text-jobarn-primary transition-colors">
                      {post.title}
                    </h3>

                    <p className="text-gray-600 line-clamp-3">{post.excerpt}</p>

                    <div className="flex flex-wrap gap-2">
                      {post.tags.slice(0, 3).map((tag, index) => (
                        <Badge key={index} variant="secondary" className="text-xs">
                          {tag}
                        </Badge>
                      ))}
                    </div>

                    <Button asChild className="w-full bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                      <Link href={`/blog/${post.slug}`}>
                        Read More
                        <ArrowRight className="ml-2 h-4 w-4" />
                      </Link>
                    </Button>
                  </CardContent>
                </Card>
              ))}
            </div>
          )}
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <h2 className="text-3xl lg:text-4xl font-bold">Stay Connected with JOBARN</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Get the latest ICT insights, industry news, and technology tips delivered straight to your inbox.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              Subscribe to Newsletter
            </Button>
            <Button
              asChild
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              <Link href="/contact">Contact Our Experts</Link>
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
