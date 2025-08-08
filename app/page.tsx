import Link from "next/link"
import Image from "next/image"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Badge } from "@/components/ui/badge"
import {
  ShoppingCart,
  Network,
  Shield,
  Code,
  Headphones,
  CheckCircle,
  Users,
  Award,
  Clock,
  ArrowRight,
  Star,
  Quote,
} from "lucide-react"

export default function HomePage() {
  
  const services = [
    {
      icon: ShoppingCart,
      title: "ICT Equipment Sales",
      description: "Premium laptops, desktops, and accessories from trusted brands",
      image: "/img/ict-equipments.jpg",
    },
    {
      icon: Network,
      title: "Network Infrastructure",
      description: "Complete networking solutions and server installations",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      icon: Shield,
      title: "CCTV & Security",
      description: "Advanced surveillance systems and cybersecurity solutions",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      icon: Code,
      title: "Software Development",
      description: "Custom software solutions and licensing services",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      icon: Headphones,
      title: "Technical Support",
      description: "24/7 maintenance and technical assistance",
      image: "/placeholder.svg?height=200&width=300",
    },
  ]

  const products = [
    {
      title: "Laptops & Desktops",
      description: "High-performance computers for business and personal use",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      title: "Networking Equipment",
      description: "Routers, switches, and UPS systems for reliable connectivity",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      title: "CCTV Systems",
      description: "Advanced surveillance cameras and monitoring solutions",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      title: "Audio Equipment",
      description: "Professional headphones, microphones, and sound systems",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      title: "Storage Solutions",
      description: "Reliable data storage and backup systems",
      image: "/placeholder.svg?height=200&width=300",
    },
    {
      title: "Interactive Displays",
      description: "Smart whiteboards and projectors for modern workspaces",
      image: "/placeholder.svg?height=200&width=300",
    },
  ]

  const whyChooseUs = [
    {
      icon: Award,
      title: "Certified Team",
      description: "Expert technicians with industry certifications",
    },
    
  ]

  const testimonials = [
    {
      name: "Dr. Sarah Mwalimu",
      company: "SALAMI HOSPITAL",
      content:
        "JOBARN transformed our hospital's IT infrastructure. Their CCTV installation and network setup exceeded our expectations.",
      rating: 5,
    },
    {
      name: "James Kikwete",
      company: "Simba Cargo",
      content:
        "Excellent service and support. Their team helped us implement a complete ICT solution that improved our operations significantly.",
      rating: 5,
    },
    {
      name: "Amina Hassan",
      company: "SWEETSHAPES",
      content: "Professional, reliable, and knowledgeable. JOBARN is our go-to partner for all technology needs.",
      rating: 5,
    },
  ]

  const partners = ["Microsoft", "Lenovo", "CISCO", "TP-Link", "HPE", "SOPHOS", "Kaspersky", "Apple"]

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative min-h-[80vh] flex items-center justify-center bg-black/">
        {/* Background Video */}
        <video
          className="absolute inset-0 w-full h-full object-cover"
          src="https://videocdn.cdnpk.net/videos/d44a36d9-3ffb-5518-936a-805524175757/horizontal/previews/watermarked/large.mp4"
          autoPlay
          loop
          muted
          playsInline
        />
        {/* Dark Overlay */}
        <div className="absolute inset-0 bg-black/50"></div>

        {/* Hero Content */}
        <div className="relative z-10 container mx-auto px-4 text-center">
          <div className="max-w-4xl mx-auto space-y-8">
            <div className="space-y-4">
              <Badge className="bg-jobarn-primary text-white">Established 2024</Badge>
              <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                Empowering Businesses with Innovative ICT Solutions
              </h1>
              <p className="text-xl lg:text-2xl text-white/90 font-medium">Reliable | Scalable | Future-Ready</p>
              <p className="text-lg text-white/80 max-w-2xl mx-auto">
                Transform your business with cutting-edge technology solutions, expert support, and trusted partnerships
                across Tanzania.
              </p>
            </div>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Button asChild size="lg" className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white">
                <Link href="/services">
                  Explore Services
                  <ArrowRight className="ml-2 h-4 w-4" />
                </Link>
              </Button>
              <Button
                asChild
                size="lg"
                variant="outline"
                className="border-white text-white hover:bg-white hover:text-jobarn-accent1 bg-transparent"
              >
                <Link href="/contact">Request a Quote</Link>
              </Button>
            </div>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <div className="space-y-4">
                <Badge className="bg-jobarn-accent2 text-white">About JOBARN</Badge>
                <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Your Trusted ICT Partner in Tanzania</h2>
                <p className="text-lg text-gray-600">
                  Founded in 2024, JOBARN GENERAL TRADING COMPANY LTD has quickly established itself as a leading
                  provider of ICT solutions in Tanzania. We specialize in delivering comprehensive technology services
                  that drive business growth and innovation.
                </p>
                <p className="text-gray-600">
                  From equipment sales to complex network installations, our certified team ensures your technology
                  infrastructure is reliable, secure, and future-ready.
                </p>
              </div>
              <Button asChild className="bg-jobarn-primary hover:bg-jobarn-primary/90">
                <Link href="/about">Learn More About Us</Link>
              </Button>
            </div>
            <div className="relative">
              <Image
                src="/img/comp-network.png?height=400&width=500"
                alt="JOBARN About"
                width={500}
                height={400}
                className="rounded-2xl shadow-lg"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Core Services */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Our Services</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Comprehensive ICT Solutions</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              From sales to support, we provide end-to-end technology services tailored to your business needs.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {services.map((service, index) => (
                <Card
                key={index}
                className="group hover:shadow-lg transition-all duration-300 border-0 shadow-md relative overflow-hidden"
                >
                <CardContent className="p-6 space-y-4 relative z-10">
                  <div className="h-12 w-12 bg-jobarn-primary/10 rounded-lg flex items-center justify-center group-hover:bg-jobarn-primary group-hover:text-white transition-colors">
                  <service.icon className="h-6 w-6 text-jobarn-primary group-hover:text-white" />
                  </div>
                  <h3 className="text-xl font-semibold text-gray-900">{service.title}</h3>
                  <p className="text-gray-600">{service.description}</p>
                </CardContent>
                </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Product Highlights */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent2 text-white">Our Products</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Premium ICT Equipment</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Discover our comprehensive range of high-quality technology products from leading global brands.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {products.map((product, index) => (
              <Card key={index} className="group hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div className="relative h-48 overflow-hidden">
                  <Image
                    src={product.image || "/placeholder.svg"}
                    alt={product.title}
                    fill
                    className="object-cover group-hover:scale-105 transition-transform duration-300"
                  />
                </div>
                <CardContent className="p-6 space-y-3">
                  <h3 className="text-xl font-semibold text-gray-900">{product.title}</h3>
                  <p className="text-gray-600">{product.description}</p>
                  <Button
                    asChild
                    variant="outline"
                    className="w-full border-jobarn-primary text-jobarn-primary hover:bg-jobarn-primary hover:text-white bg-transparent"
                  >
                    <Link href="/products">View Products</Link>
                  </Button>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Why Choose Us */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Why Choose JOBARN</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Excellence in Every Solution</h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {whyChooseUs.map((item, index) => (
              <div key={index} className="text-center space-y-4">
                <div className="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto">
                  <item.icon className="h-8 w-8 text-jobarn-primary" />
                </div>
                <h3 className="text-xl font-semibold text-gray-900">{item.title}</h3>
                <p className="text-gray-600">{item.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent2 text-white">Testimonials</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">What Our Clients Say</h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {testimonials.map((testimonial, index) => (
              <Card key={index} className="relative">
                <CardContent className="p-6 space-y-4">
                  <Quote className="h-8 w-8 text-jobarn-primary/20" />
                  <p className="text-gray-600 italic">"{testimonial.content}"</p>
                  <div className="flex items-center space-x-1">
                    {[...Array(testimonial.rating)].map((_, i) => (
                      <Star key={i} className="h-4 w-4 fill-yellow-400 text-yellow-400" />
                    ))}
                  </div>
                  <div>
                    <p className="font-semibold text-gray-900">{testimonial.name}</p>
                    <p className="text-sm text-gray-500">{testimonial.company}</p>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Partners */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Our Partners</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Trusted Technology Partners</h2>
          </div>
          <div className="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8 items-center">
            {partners.map((partner, index) => (
              <div key={index} className="text-center">
                <div className="h-16 w-full bg-gray-100 rounded-lg flex items-center justify-center">
                  <span className="text-gray-600 font-semibold text-sm">{partner}</span>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Banner */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <h2 className="text-3xl lg:text-4xl font-bold">Let's Power Your Business with Technology</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Ready to transform your business with innovative ICT solutions? Get in touch with our experts today.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button asChild size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              <Link href="/contact">Get Started Today</Link>
            </Button>
            <Button
              asChild
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              <Link href="/services">View All Services</Link>
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
