"use client"

import { useState, useEffect } from "react"
import { useParams } from "next/navigation"
import Image from "next/image"
import Link from "next/link"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Separator } from "@/components/ui/separator"
import { ArrowLeft, Package, Tag, Building2, Hash, Quote } from "lucide-react"
import { apiService } from "@/lib/api"
import { Loading } from "@/components/ui/loading"
import { ErrorMessage } from "@/components/ui/error-message"
import QuoteRequestModal from "@/components/quote-request-modal"

interface ProductDetail {
  id: number
  name: string
  slug: string
  description: string
  image: string
  category: string
  brand: string
  sku: string
  price_range: string
  status: string
  specifications: Array<{
    label: string
    value: string
  }>
  features: string[]
  related_products: number[]
  created_at: string
  updated_at: string
}

export default function ProductDetailPage() {
  const params = useParams()
  const slug = params.slug as string

  const [product, setProduct] = useState<ProductDetail | null>(null)
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)
  const [isQuoteModalOpen, setIsQuoteModalOpen] = useState(false)

  const fetchProduct = async () => {
    try {
      setLoading(true)
      setError(null)
      // TODO: This will be replaced with real API call
      const response = await apiService.getProductDetail(slug)
      setProduct(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load product details")
      console.error("Error fetching product details:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    if (slug) {
      fetchProduct()
    }
  }, [slug])

  if (loading) {
    return (
      <div className="min-h-screen">
        {/* Back Navigation */}
        <section className="py-8 bg-gray-50 border-b">
          <div className="container mx-auto px-4">
            <Button asChild variant="ghost">
              <Link href="/products">
                <ArrowLeft className="h-4 w-4 mr-2" />
                Back to Products
              </Link>
            </Button>
          </div>
        </section>

        {/* Loading State */}
        <section className="py-16 lg:py-24">
          <div className="container mx-auto px-4">
            <div className="flex justify-center">
              <Loading size="lg" text="Loading product details..." />
            </div>
          </div>
        </section>
      </div>
    )
  }

  if (error || !product) {
    return (
      <div className="min-h-screen">
        {/* Back Navigation */}
        <section className="py-8 bg-gray-50 border-b">
          <div className="container mx-auto px-4">
            <Button asChild variant="ghost">
              <Link href="/products">
                <ArrowLeft className="h-4 w-4 mr-2" />
                Back to Products
              </Link>
            </Button>
          </div>
        </section>

        {/* Error State */}
        <section className="py-16 lg:py-24">
          <div className="container mx-auto px-4">
            <ErrorMessage message={error || "Product not found"} onRetry={fetchProduct} />
          </div>
        </section>
      </div>
    )
  }

  return (
    <>
      <div className="min-h-screen">
        {/* Back Navigation */}
        <section className="py-8 bg-gray-50 border-b">
          <div className="container mx-auto px-4">
            <Button asChild variant="ghost" className="mb-4">
              <Link href="/products">
                <ArrowLeft className="h-4 w-4 mr-2" />
                Back to Products
              </Link>
            </Button>
          </div>
        </section>

        {/* Product Details */}
        <section className="py-16 lg:py-24">
          <div className="container mx-auto px-4">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
              {/* Product Image */}
              <div className="space-y-4">
                <div className="relative aspect-square rounded-2xl overflow-hidden bg-gray-100">
                  <Image
                    src={product.image || "/placeholder.svg"}
                    alt={product.name}
                    fill
                    className="object-cover"
                    priority
                  />
                </div>
              </div>

              {/* Product Information */}
              <div className="space-y-8">
                {/* Header */}
                <div className="space-y-4">
                  <div className="flex flex-wrap items-center gap-3">
                    <Badge className="bg-jobarn-primary text-white">{product.brand}</Badge>
                    <Badge variant="secondary" className="bg-jobarn-accent2/10 text-jobarn-accent2">
                      {product.category}
                    </Badge>
                  </div>

                  <h1 className="text-3xl lg:text-4xl font-bold text-gray-900">{product.name}</h1>

                  <div className="flex flex-wrap items-center gap-6 text-gray-600">
                    <div className="flex items-center space-x-2">
                      <Hash className="h-4 w-4" />
                      <span className="font-medium">SKU: {product.sku}</span>
                    </div>
                    <div className="flex items-center space-x-2">
                      <Package className="h-4 w-4" />
                      <span>{product.category}</span>
                    </div>
                    <div className="flex items-center space-x-2">
                      <Building2 className="h-4 w-4" />
                      <span>{product.brand}</span>
                    </div>
                  </div>
                </div>

                {/* Description */}
                <div className="space-y-4">
                  <h2 className="text-xl font-semibold text-gray-900">Product Description</h2>
                  <p className="text-gray-600 leading-relaxed">{product.description}</p>
                </div>

                {/* Key Features */}
                <div className="space-y-4">
                  <h2 className="text-xl font-semibold text-gray-900">Key Features</h2>
                  <div className="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    {product.features.slice(0, 6).map((feature, index) => (
                      <div key={index} className="flex items-start space-x-2">
                        <div className="h-2 w-2 bg-jobarn-primary rounded-full mt-2 flex-shrink-0"></div>
                        <span className="text-gray-600 text-sm">{feature}</span>
                      </div>
                    ))}
                  </div>
                  {product.features.length > 6 && (
                    <p className="text-sm text-gray-500">+{product.features.length - 6} more features</p>
                  )}
                </div>

                {/* Price and CTA */}
                <div className="space-y-6">
                  <Separator />
                  <div className="space-y-4">
                    <div className="flex items-center space-x-2">
                      <Tag className="h-5 w-5 text-jobarn-primary" />
                      <span className="text-lg font-semibold text-gray-900">Pricing: {product.price_range}</span>
                    </div>
                    <Button
                      onClick={() => setIsQuoteModalOpen(true)}
                      size="lg"
                      className="w-full sm:w-auto bg-jobarn-primary hover:bg-jobarn-primary/90 text-white"
                    >
                      <Quote className="h-4 w-4 mr-2" />
                      Request Quote
                    </Button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Technical Specifications */}
        <section className="py-16 lg:py-24 bg-gray-50">
          <div className="container mx-auto px-4">
            <div className="max-w-4xl mx-auto">
              <div className="text-center space-y-4 mb-12">
                <h2 className="text-3xl font-bold text-gray-900">Technical Specifications</h2>
                <p className="text-lg text-gray-600">Detailed technical information and specifications</p>
              </div>

              <Card className="border-0 shadow-lg">
                <CardContent className="p-8">
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {product.specifications.map((spec, index) => (
                      <div
                        key={index}
                        className="flex justify-between items-center py-3 border-b border-gray-100 last:border-b-0"
                      >
                        <span className="font-medium text-gray-900">{spec.label}</span>
                        <span className="text-gray-600 text-right">{spec.value}</span>
                      </div>
                    ))}
                  </div>
                </CardContent>
              </Card>
            </div>
          </div>
        </section>

        {/* CTA Section */}
        <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
          <div className="container mx-auto px-4 text-center space-y-8">
            <h2 className="text-3xl lg:text-4xl font-bold">Ready to Get Started?</h2>
            <p className="text-xl max-w-2xl mx-auto">
              Contact our experts to discuss your requirements and get a customized quote for {product.name}.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Button
                onClick={() => setIsQuoteModalOpen(true)}
                size="lg"
                className="bg-white text-jobarn-primary hover:bg-gray-100"
              >
                Request Quote
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

      {/* Quote Request Modal */}
      <QuoteRequestModal
        isOpen={isQuoteModalOpen}
        onClose={() => setIsQuoteModalOpen(false)}
        productName={product.name}
        productSku={product.sku}
      />
    </>
  )
}
