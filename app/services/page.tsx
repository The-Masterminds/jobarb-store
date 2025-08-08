"use client"

import { useEffect, useState } from "react"
import Image from "next/image"
import Link from "next/link"
import { Badge } from "@/components/ui/badge"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { ShoppingCart, Network, Shield, Code, Headphones, Server, CheckCircle, ArrowRight } from "lucide-react"
import { apiService } from "@/lib/api"
import { Loading } from "@/components/ui/loading"
import { ErrorMessage } from "@/components/ui/error-message"

// Icon mapping
const iconMap = {
  ShoppingCart,
  Network,
  Shield,
  Code,
  Headphones,
  Server,
}

interface Service {
  id: number
  title: string
  slug: string
  description: string
  icon: keyof typeof iconMap
  features: string[]
  brands: string[]
  image: string
  status: string
}

export default function ServicesPage() {
  const [services, setServices] = useState<Service[]>([])
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)

  const fetchServices = async () => {
    try {
      setLoading(true)
      setError(null)
      // TODO: This will be replaced with real API call
      const response = await apiService.getServices()
      setServices(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load services")
      console.error("Error fetching services:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    fetchServices()
  }, [])

  const processSteps = [
    {
      step: "01",
      title: "Consultation",
      description: "We analyze your business needs and current infrastructure to understand your requirements.",
    },
    {
      step: "02",
      title: "Planning",
      description: "Our experts design a customized solution that aligns with your goals and budget.",
    },
    {
      step: "03",
      title: "Implementation",
      description: "Professional installation and configuration with minimal disruption to your operations.",
    },
    {
      step: "04",
      title: "Support",
      description: "Ongoing maintenance and support to ensure optimal performance and reliability.",
    },
  ]

  if (loading) {
    return (
      <div className="min-h-screen">
        {/* Hero Section */}
        <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
          <div className="container mx-auto px-4">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div className="space-y-6">
                <Badge className="bg-jobarn-primary text-white">Our Services</Badge>
                <h1 className="text-4xl lg:text-5xl font-bold leading-tight">
                  Comprehensive ICT Services for Your Business
                </h1>
                <p className="text-xl text-white/90">
                  From equipment sales to technical support, we provide end-to-end ICT solutions that drive your
                  business forward.
                </p>
              </div>
              <div className="relative">
                <Image
                  src="/placeholder.svg?height=400&width=500"
                  alt="ICT Services"
                  width={500}
                  height={400}
                  className="rounded-2xl shadow-2xl"
                />
              </div>
            </div>
          </div>
        </section>

        {/* Loading State */}
        <section className="py-16 lg:py-24">
          <div className="container mx-auto px-4">
            <div className="flex justify-center">
              <Loading size="lg" text="Loading services..." />
            </div>
          </div>
        </section>
      </div>
    )
  }

  if (error) {
    return (
      <div className="min-h-screen">
        {/* Hero Section */}
        <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
          <div className="container mx-auto px-4">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
              <div className="space-y-6">
                <Badge className="bg-jobarn-primary text-white">Our Services</Badge>
                <h1 className="text-4xl lg:text-5xl font-bold leading-tight">
                  Comprehensive ICT Services for Your Business
                </h1>
                <p className="text-xl text-white/90">
                  From equipment sales to technical support, we provide end-to-end ICT solutions that drive your
                  business forward.
                </p>
              </div>
              <div className="relative">
                <Image
                  src="/placeholder.svg?height=400&width=500"
                  alt="ICT Services"
                  width={500}
                  height={400}
                  className="rounded-2xl shadow-2xl"
                />
              </div>
            </div>
          </div>
        </section>

        {/* Error State */}
        <section className="py-16 lg:py-24">
          <div className="container mx-auto px-4">
            <ErrorMessage message={error} onRetry={fetchServices} />
          </div>
        </section>
      </div>
    )
  }

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <Badge className="bg-jobarn-primary text-white">Our Services</Badge>
              <h1 className="text-4xl lg:text-5xl font-bold leading-tight">
                Comprehensive ICT Services for Your Business
              </h1>
              <p className="text-xl text-white/90">
                From equipment sales to technical support, we provide end-to-end ICT solutions that drive your business
                forward.
              </p>
              <Button asChild size="lg" className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                <Link href="/contact">
                  Get Started Today
                  <ArrowRight className="ml-2 h-4 w-4" />
                </Link>
              </Button>
            </div>
            <div className="relative">
              <Image
                src="/placeholder.svg?height=400&width=500"
                alt="ICT Services"
                width={500}
                height={400}
                className="rounded-2xl shadow-2xl"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Services Grid */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">What We Offer</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Complete ICT Solutions Under One Roof</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Our comprehensive range of services covers every aspect of your ICT needs, from initial consultation to
              ongoing support.
            </p>
          </div>

          <div className="space-y-16">
            {services.map((service, index) => {
              const IconComponent = iconMap[service.icon] || ShoppingCart
              return (
                <div
                  key={service.id}
                  className={`grid grid-cols-1 lg:grid-cols-2 gap-12 items-center ${index % 2 === 1 ? "lg:grid-flow-col-dense" : ""}`}
                >
                  <div className={`space-y-6 ${index % 2 === 1 ? "lg:col-start-2" : ""}`}>
                    <div className="flex items-center space-x-4">
                      <div className="h-12 w-12 bg-jobarn-primary/10 rounded-lg flex items-center justify-center">
                        <IconComponent className="h-6 w-6 text-jobarn-primary" />
                      </div>
                      <h3 className="text-2xl lg:text-3xl font-bold text-gray-900">{service.title}</h3>
                    </div>
                    <p className="text-lg text-gray-600">{service.description}</p>

                    <div className="space-y-3">
                      <h4 className="font-semibold text-gray-900">Key Features:</h4>
                      <ul className="space-y-2">
                        {service.features.map((feature, featureIndex) => (
                          <li key={featureIndex} className="flex items-start space-x-2">
                            <CheckCircle className="h-5 w-5 text-jobarn-primary mt-0.5 flex-shrink-0" />
                            <span className="text-gray-600">{feature}</span>
                          </li>
                        ))}
                      </ul>
                    </div>

                    <div className="space-y-3">
                      <h4 className="font-semibold text-gray-900">Trusted Brands:</h4>
                      <div className="flex flex-wrap gap-2">
                        {service.brands.map((brand, brandIndex) => (
                          <Badge
                            key={brandIndex}
                            variant="secondary"
                            className="bg-jobarn-accent2/10 text-jobarn-accent2"
                          >
                            {brand}
                          </Badge>
                        ))}
                      </div>
                    </div>

                    <Button asChild className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                      <Link href="/contact">Learn More</Link>
                    </Button>
                  </div>

                  <div className={`relative ${index % 2 === 1 ? "lg:col-start-1" : ""}`}>
                    <Image
                      src={service.image || "/placeholder.svg"}
                      alt={service.title}
                      width={400}
                      height={300}
                      className="rounded-2xl shadow-lg w-full"
                    />
                  </div>
                </div>
              )
            })}
          </div>
        </div>
      </section>

      {/* Process Section */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent2 text-white">Our Process</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">How We Deliver Excellence</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Our proven methodology ensures successful project delivery and client satisfaction.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {processSteps.map((step, index) => (
              <Card key={index} className="relative border-0 shadow-lg">
                <CardContent className="p-6 text-center space-y-4">
                  <div className="h-16 w-16 bg-jobarn-primary rounded-full flex items-center justify-center mx-auto">
                    <span className="text-white font-bold text-xl">{step.step}</span>
                  </div>
                  <h3 className="text-xl font-semibold text-gray-900">{step.title}</h3>
                  <p className="text-gray-600">{step.description}</p>
                </CardContent>
                {index < processSteps.length - 1 && (
                  <div className="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                    <ArrowRight className="h-6 w-6 text-jobarn-primary" />
                  </div>
                )}
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <h2 className="text-3xl lg:text-4xl font-bold">Ready to Transform Your Business?</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Let our expert team help you implement the perfect ICT solution for your business needs.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button asChild size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              <Link href="/contact">Get Free Consultation</Link>
            </Button>
            <Button
              asChild
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              <Link href="/products">View Our Products</Link>
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
