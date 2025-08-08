"use client"

import { useState, useEffect } from "react"
import Image from "next/image"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Input } from "@/components/ui/input"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Search, Filter } from "lucide-react"
import { apiService } from "@/lib/api"
import { LoadingCard } from "@/components/ui/loading"
import { ErrorMessage } from "@/components/ui/error-message"
import Link from "next/link"

interface Product {
  id: number
  title: string
  slug: string
  category: string
  description: string
  image: string
  brand: string
  features: string[]
  price_range: string
  status: string
  created_at: string
}

export default function ProductsPage() {
  const [products, setProducts] = useState<Product[]>([])
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)
  const [searchTerm, setSearchTerm] = useState("")
  const [selectedCategory, setSelectedCategory] = useState("all")

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
  ]

  const fetchProducts = async () => {
    try {
      setLoading(true)
      setError(null)
      // TODO: This will be replaced with real API call
      const response = await apiService.getProducts({
        category: selectedCategory,
        search: searchTerm,
      })
      setProducts(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load products")
      console.error("Error fetching products:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    fetchProducts()
  }, [selectedCategory, searchTerm])

  const handleSearch = (value: string) => {
    setSearchTerm(value)
  }

  const handleCategoryChange = (value: string) => {
    setSelectedCategory(value)
  }

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div className="container mx-auto px-4 text-center space-y-6">
          <Badge className="bg-jobarn-primary text-white">Our Products</Badge>
          <h1 className="text-4xl lg:text-5xl font-bold">Premium ICT Equipment & Solutions</h1>
          <p className="text-xl max-w-3xl mx-auto">
            Discover our comprehensive range of high-quality technology products from leading global brands, carefully
            selected to meet your business needs.
          </p>
        </div>
      </section>

      {/* Search and Filter */}
      <section className="py-8 bg-gray-50 border-b">
        <div className="container mx-auto px-4">
          <div className="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div className="relative flex-1 max-w-md">
              <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" />
              <Input
                placeholder="Search products..."
                value={searchTerm}
                onChange={(e) => handleSearch(e.target.value)}
                className="pl-10"
              />
            </div>
            <div className="flex items-center space-x-2">
              <Filter className="h-4 w-4 text-gray-600" />
              <Select value={selectedCategory} onValueChange={handleCategoryChange}>
                <SelectTrigger className="w-[200px]">
                  <SelectValue placeholder="Select category" />
                </SelectTrigger>
                <SelectContent>
                  {categories.map((category) => (
                    <SelectItem key={category.id} value={category.id}>
                      {category.name}
                    </SelectItem>
                  ))}
                </SelectContent>
              </Select>
            </div>
          </div>
        </div>
      </section>

      {/* Product Categories */}
      <section className="py-8 bg-white">
        <div className="container mx-auto px-4">
          <div className="flex flex-wrap gap-2 justify-center">
            {categories.map((category) => (
              <Button
                key={category.id}
                variant={selectedCategory === category.id ? "default" : "outline"}
                size="sm"
                onClick={() => handleCategoryChange(category.id)}
                className={selectedCategory === category.id ? "bg-jobarn-primary hover:bg-jobarn-primary/90" : ""}
              >
                {category.name}
              </Button>
            ))}
          </div>
        </div>
      </section>

      {/* Products Grid */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          {!loading && !error && (
            <div className="mb-8">
              <p className="text-gray-600">Showing {products.length} products</p>
            </div>
          )}

          {loading ? (
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
              {[...Array(8)].map((_, index) => (
                <LoadingCard key={index} />
              ))}
            </div>
          ) : error ? (
            <ErrorMessage message={error} onRetry={fetchProducts} />
          ) : products.length === 0 ? (
            <div className="text-center py-12">
              <p className="text-gray-500 text-lg">No products found matching your criteria.</p>
            </div>
          ) : (
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
              {products.map((product) => (
                <Card key={product.id} className="group hover:shadow-xl transition-all duration-300 overflow-hidden">
                  <div className="relative h-48 overflow-hidden">
                    <Image
                      src={product.image || "/placeholder.svg"}
                      alt={product.title}
                      fill
                      className="object-cover group-hover:scale-105 transition-transform duration-300"
                    />
                    <Badge className="absolute top-2 left-2 bg-jobarn-primary text-white">{product.brand}</Badge>
                  </div>
                  <CardContent className="p-6 space-y-4">
                    <h3 className="text-lg font-semibold text-gray-900 line-clamp-2">{product.title}</h3>
                    <p className="text-gray-600 text-sm line-clamp-2">{product.description}</p>
                    <div className="space-y-2">
                      <p className="text-sm font-medium text-gray-700">Key Features:</p>
                      <div className="flex flex-wrap gap-1">
                        {product.features.slice(0, 2).map((feature, index) => (
                          <Badge key={index} variant="secondary" className="text-xs">
                            {feature}
                          </Badge>
                        ))}
                        {product.features.length > 2 && (
                          <Badge variant="secondary" className="text-xs">
                            +{product.features.length - 2} more
                          </Badge>
                        )}
                      </div>
                    </div>
                    <div className="flex gap-2">
                      <Button asChild className="flex-1 bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                        <Link href={`/products/${product.slug}`}>View Details</Link>
                      </Button>
                      <Button
                        onClick={() => {
                          // You can add a quote modal here too if needed
                        }}
                        variant="outline"
                        className="border-jobarn-primary text-jobarn-primary hover:bg-jobarn-primary hover:text-white"
                      >
                        Quote
                      </Button>
                    </div>
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
          <h2 className="text-3xl lg:text-4xl font-bold">Need Help Choosing the Right Products?</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Our expert team is here to help you select the perfect ICT solutions for your business needs.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              Contact Our Experts
            </Button>
            <Button
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              Download Catalog
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
