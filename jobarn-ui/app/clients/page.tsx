import { Button } from "@/components/ui/button"
import Image from "next/image"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"
import { Star, Quote, Building, Users, Award, Handshake } from "lucide-react"

export default function ClientsPage() {
  const clients = [
    {
      name: "DEFM",
      industry: "Defense & Military",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Comprehensive ICT infrastructure and security solutions",
    },
    {
      name: "SALAMI HOSPITAL",
      industry: "Healthcare",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Complete hospital management system and CCTV installation",
    },
    {
      name: "Simba Cargo",
      industry: "Logistics & Transportation",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Fleet management system and network infrastructure",
    },
    {
      name: "SWEETSHAPES",
      industry: "Food & Beverage",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Point of sale systems and inventory management",
    },
    {
      name: "Tanzania Railways",
      industry: "Transportation",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Communication systems and network infrastructure",
    },
    {
      name: "Dar es Salaam Port",
      industry: "Maritime & Logistics",
      logo: "/placeholder.svg?height=80&width=120",
      description: "Security systems and cargo management solutions",
    },
  ]

  const partners = [
    {
      name: "Microsoft",
      category: "Software & Cloud",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Official Microsoft Partner for software licensing and cloud solutions",
    },
    {
      name: "Lenovo",
      category: "Hardware",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Authorized Lenovo dealer for laptops, desktops, and servers",
    },
    {
      name: "CISCO",
      category: "Networking",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Certified CISCO partner for networking equipment and solutions",
    },
    {
      name: "TP-Link",
      category: "Networking",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Official TP-Link distributor for wireless and networking products",
    },
    {
      name: "HPE",
      category: "Enterprise Solutions",
      logo: "/placeholder.svg?height=60&width=120",
      description: "HPE partner for enterprise servers and storage solutions",
    },
    {
      name: "SOPHOS",
      category: "Cybersecurity",
      logo: "/placeholder.svg?height=60&width=120",
      description: "SOPHOS partner for advanced cybersecurity solutions",
    },
    {
      name: "Kaspersky",
      category: "Cybersecurity",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Kaspersky authorized reseller for antivirus and security products",
    },
    {
      name: "Apple",
      category: "Consumer Electronics",
      logo: "/placeholder.svg?height=60&width=120",
      description: "Apple authorized reseller for Mac computers and devices",
    },
  ]

  const testimonials = [
    {
      name: "Dr. Sarah Mwalimu",
      position: "Chief Medical Officer",
      company: "SALAMI HOSPITAL",
      content:
        "JOBARN transformed our hospital's IT infrastructure completely. Their CCTV installation and network setup exceeded our expectations. The team was professional, knowledgeable, and delivered on time. Our operations have become much more efficient.",
      rating: 5,
      image: "/placeholder.svg?height=80&width=80",
    },
    {
      name: "James Kikwete",
      position: "Operations Manager",
      company: "Simba Cargo",
      content:
        "Excellent service and support from JOBARN. They helped us implement a complete ICT solution that improved our logistics operations significantly. Their 24/7 support ensures our systems are always running smoothly.",
      rating: 5,
      image: "/placeholder.svg?height=80&width=80",
    },
    {
      name: "Amina Hassan",
      position: "IT Director",
      company: "SWEETSHAPES",
      content:
        "Professional, reliable, and knowledgeable. JOBARN is our go-to partner for all technology needs. They understand our business requirements and always provide solutions that work perfectly for us.",
      rating: 5,
      image: "/placeholder.svg?height=80&width=80",
    },
    {
      name: "Colonel Michael Mwanza",
      position: "IT Security Chief",
      company: "DEFM",
      content:
        "JOBARN's cybersecurity solutions have significantly enhanced our security posture. Their team's expertise in implementing enterprise-grade security systems is exceptional. Highly recommended for critical infrastructure projects.",
      rating: 5,
      image: "/placeholder.svg?height=80&width=80",
    },
  ]

  const stats = [
    {
      icon: Building,
      number: "50+",
      label: "Happy Clients",
      description: "Businesses trust us with their ICT needs",
    },
    {
      icon: Users,
      number: "100+",
      label: "Projects Completed",
      description: "Successful implementations across Tanzania",
    },
    {
      icon: Award,
      number: "8+",
      label: "Technology Partners",
      description: "Partnerships with leading global brands",
    },
    {
      icon: Handshake,
      number: "99%",
      label: "Client Satisfaction",
      description: "Exceptional service delivery record",
    },
  ]

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div className="container mx-auto px-4 text-center space-y-6">
          <Badge className="bg-jobarn-primary text-white">Our Network</Badge>
          <h1 className="text-4xl lg:text-5xl font-bold">Trusted by Leaders Across Tanzania</h1>
          <p className="text-xl max-w-3xl mx-auto">
            We're proud to work with leading organizations and technology partners to deliver exceptional ICT solutions
            that drive business success.
          </p>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-16 lg:py-24 bg-white">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {stats.map((stat, index) => (
              <div key={index} className="text-center space-y-4">
                <div className="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto">
                  <stat.icon className="h-8 w-8 text-jobarn-primary" />
                </div>
                <div className="space-y-2">
                  <div className="text-3xl lg:text-4xl font-bold text-jobarn-primary">{stat.number}</div>
                  <div className="text-xl font-semibold text-gray-900">{stat.label}</div>
                  <div className="text-gray-600">{stat.description}</div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Clients Section */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Our Clients</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Organizations We're Proud to Serve</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              From healthcare to defense, logistics to manufacturing, we serve diverse industries across Tanzania.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {clients.map((client, index) => (
              <Card key={index} className="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                <CardContent className="p-6 space-y-4 text-center">
                  <div className="h-20 flex items-center justify-center">
                    <Image
                      src={client.logo || "/placeholder.svg"}
                      alt={`${client.name} logo`}
                      width={120}
                      height={80}
                      className="max-h-16 w-auto object-contain"
                    />
                  </div>
                  <div className="space-y-2">
                    <h3 className="text-xl font-semibold text-gray-900">{client.name}</h3>
                    <Badge variant="secondary" className="bg-jobarn-accent2/10 text-jobarn-accent2">
                      {client.industry}
                    </Badge>
                  </div>
                  <p className="text-gray-600 text-sm">{client.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Technology Partners */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent2 text-white">Technology Partners</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Partnering with Global Leaders</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Our strategic partnerships with leading technology companies ensure we deliver cutting-edge solutions.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {partners.map((partner, index) => (
              <Card key={index} className="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                <CardContent className="p-6 space-y-4 text-center">
                  <div className="h-16 flex items-center justify-center">
                    <Image
                      src={partner.logo || "/placeholder.svg"}
                      alt={`${partner.name} logo`}
                      width={120}
                      height={60}
                      className="max-h-12 w-auto object-contain"
                    />
                  </div>
                  <div className="space-y-2">
                    <h3 className="text-lg font-semibold text-gray-900">{partner.name}</h3>
                    <Badge variant="secondary" className="bg-jobarn-primary/10 text-jobarn-primary text-xs">
                      {partner.category}
                    </Badge>
                  </div>
                  <p className="text-gray-600 text-sm">{partner.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Client Testimonials</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">What Our Clients Say About Us</h2>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
            {testimonials.map((testimonial, index) => (
              <Card key={index} className="border-0 shadow-lg">
                <CardContent className="p-8 space-y-6">
                  <Quote className="h-8 w-8 text-jobarn-primary/20" />
                  <p className="text-gray-600 italic text-lg leading-relaxed">"{testimonial.content}"</p>
                  <div className="flex items-center space-x-1 mb-4">
                    {[...Array(testimonial.rating)].map((_, i) => (
                      <Star key={i} className="h-5 w-5 fill-yellow-400 text-yellow-400" />
                    ))}
                  </div>
                  <div className="flex items-center space-x-4">
                    <Image
                      src={testimonial.image || "/placeholder.svg"}
                      alt={testimonial.name}
                      width={60}
                      height={60}
                      className="rounded-full object-cover"
                    />
                    <div>
                      <p className="font-semibold text-gray-900">{testimonial.name}</p>
                      <p className="text-sm text-gray-600">{testimonial.position}</p>
                      <p className="text-sm font-medium text-jobarn-primary">{testimonial.company}</p>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <h2 className="text-3xl lg:text-4xl font-bold">Join Our Growing Family of Satisfied Clients</h2>
          <p className="text-xl max-w-2xl mx-auto">
            Experience the same level of excellence and dedication that has made us the trusted ICT partner for leading
            organizations across Tanzania.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button size="lg" className="bg-white text-jobarn-primary hover:bg-gray-100">
              Become Our Client
            </Button>
            <Button
              size="lg"
              variant="outline"
              className="border-white text-white hover:bg-white hover:text-jobarn-primary bg-transparent"
            >
              Partner With Us
            </Button>
          </div>
        </div>
      </section>
    </div>
  )
}
