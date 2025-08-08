import Image from "next/image"
import { Badge } from "@/components/ui/badge"
import { Card, CardContent } from "@/components/ui/card"
import { Target, Eye, Heart, Users, Award, Lightbulb, Shield, Clock } from "lucide-react"

export default function AboutPage() {
  const values = [
    {
      icon: Award,
      title: "Excellence",
      description:
        "We strive for the highest standards in everything we do, delivering superior quality and performance.",
    },
    {
      icon: Heart,
      title: "Integrity",
      description: "We conduct business with honesty, transparency, and ethical practices in all our relationships.",
    },
    {
      icon: Lightbulb,
      title: "Innovation",
      description: "We embrace cutting-edge technologies and creative solutions to meet evolving business needs.",
    },
    {
      icon: Users,
      title: "Partnership",
      description: "We build lasting relationships with clients, treating their success as our own achievement.",
    },
    {
      icon: Shield,
      title: "Reliability",
      description: "We provide dependable solutions and consistent support that businesses can count on.",
    },
    {
      icon: Clock,
      title: "Responsiveness",
      description: "We respond quickly to client needs with efficient service and timely project delivery.",
    },
  ]

  const timeline = [
    {
      year: "2024",
      title: "Company Founded",
      description:
        "JOBARN GENERAL TRADING COMPANY LTD was established with a vision to transform Tanzania's ICT landscape.",
    },
    {
      year: "2024",
      title: "First Major Partnerships",
      description: "Secured partnerships with leading technology brands including Microsoft, Lenovo, and CISCO.",
    },
    {
      year: "2024",
      title: "Service Expansion",
      description: "Expanded services to include comprehensive ICT solutions from sales to technical support.",
    },
    {
      year: "2024",
      title: "Growing Client Base",
      description: "Successfully served major clients including DEFM, SALAMI HOSPITAL, and Simba Cargo.",
    },
  ]

  return (
    <div className="min-h-screen">
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-jobarn-accent1 to-jobarn-accent2 text-white py-20 lg:py-32">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <Badge className="bg-jobarn-primary text-white">About JOBARN</Badge>
              <h1 className="text-4xl lg:text-5xl font-bold leading-tight">Pioneering ICT Excellence in Tanzania</h1>
              <p className="text-xl text-white/90">
                Since 2024, we've been committed to empowering businesses across Tanzania with innovative technology
                solutions that drive growth and success.
              </p>
            </div>
            <div className="relative">
              <Image
                src="/placeholder.svg?height=400&width=500"
                alt="JOBARN Office"
                width={500}
                height={400}
                className="rounded-2xl shadow-2xl"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Company Introduction */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6">
              <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Who We Are</h2>
              <p className="text-lg text-gray-600">
                JOBARN GENERAL TRADING COMPANY LTD is a dynamic ICT company based in Dar es Salaam, Tanzania. We
                specialize in providing comprehensive technology solutions that help businesses thrive in the digital
                age.
              </p>
              <p className="text-gray-600">
                Our expertise spans across ICT equipment sales, network infrastructure setup, cybersecurity solutions,
                software development, and technical support. We work with leading global brands to ensure our clients
                receive only the best technology solutions.
              </p>
              <p className="text-gray-600">
                What sets us apart is our commitment to understanding each client's unique needs and delivering tailored
                solutions that not only meet current requirements but also scale for future growth.
              </p>
            </div>
            <div className="relative">
              <Image
                src="/placeholder.svg?height=400&width=500"
                alt="ICT Solutions"
                width={500}
                height={400}
                className="rounded-2xl shadow-lg"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Mission and Vision */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <Card className="border-0 shadow-lg">
              <CardContent className="p-8 space-y-6">
                <div className="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center">
                  <Target className="h-8 w-8 text-jobarn-primary" />
                </div>
                <h3 className="text-2xl font-bold text-gray-900">Our Mission</h3>
                <p className="text-gray-600 text-lg">
                  To empower businesses across Tanzania with innovative, reliable, and scalable ICT solutions that drive
                  digital transformation and sustainable growth.
                </p>
              </CardContent>
            </Card>

            <Card className="border-0 shadow-lg">
              <CardContent className="p-8 space-y-6">
                <div className="h-16 w-16 bg-jobarn-accent2/10 rounded-full flex items-center justify-center">
                  <Eye className="h-8 w-8 text-jobarn-accent2" />
                </div>
                <h3 className="text-2xl font-bold text-gray-900">Our Vision</h3>
                <p className="text-gray-600 text-lg">
                  To be Tanzania's leading ICT solutions provider, recognized for excellence, innovation, and our
                  commitment to transforming businesses through technology.
                </p>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      {/* Core Values */}
      <section className="py-16 lg:py-24">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent1 text-white">Our Values</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">What Drives Us Forward</h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Our core values guide every decision we make and every solution we deliver.
            </p>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {values.map((value, index) => (
              <Card key={index} className="group hover:shadow-lg transition-all duration-300 border-0 shadow-md">
                <CardContent className="p-6 space-y-4 text-center">
                  <div className="h-16 w-16 bg-jobarn-primary/10 rounded-full flex items-center justify-center mx-auto group-hover:bg-jobarn-primary group-hover:text-white transition-colors">
                    <value.icon className="h-8 w-8 text-jobarn-primary group-hover:text-white" />
                  </div>
                  <h3 className="text-xl font-semibold text-gray-900">{value.title}</h3>
                  <p className="text-gray-600">{value.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Company Timeline */}
      <section className="py-16 lg:py-24 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center space-y-4 mb-12">
            <Badge className="bg-jobarn-accent2 text-white">Our Journey</Badge>
            <h2 className="text-3xl lg:text-4xl font-bold text-gray-900">Building Excellence Since 2024</h2>
          </div>
          <div className="max-w-4xl mx-auto">
            <div className="space-y-8">
              {timeline.map((item, index) => (
                <div key={index} className="flex items-start space-x-6">
                  <div className="flex-shrink-0">
                    <div className="h-12 w-12 bg-jobarn-primary rounded-full flex items-center justify-center">
                      <span className="text-white font-bold">{index + 1}</span>
                    </div>
                  </div>
                  <div className="flex-grow">
                    <Card className="border-0 shadow-md">
                      <CardContent className="p-6">
                        <div className="flex items-center space-x-4 mb-3">
                          <Badge className="bg-jobarn-accent1 text-white">{item.year}</Badge>
                          <h3 className="text-xl font-semibold text-gray-900">{item.title}</h3>
                        </div>
                        <p className="text-gray-600">{item.description}</p>
                      </CardContent>
                    </Card>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* Future Outlook */}
      <section className="py-16 lg:py-24 bg-gradient-to-r from-jobarn-primary to-jobarn-accent2 text-white">
        <div className="container mx-auto px-4 text-center space-y-8">
          <Badge className="bg-white text-jobarn-primary">Looking Ahead</Badge>
          <h2 className="text-3xl lg:text-4xl font-bold">Shaping Tanzania's Digital Future</h2>
          <p className="text-xl max-w-3xl mx-auto">
            As we continue to grow, our commitment remains unwavering: to be the catalyst that transforms businesses
            across Tanzania through innovative technology solutions. We're not just keeping pace with the digital
            revolution – we're leading it.
          </p>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div className="text-center space-y-2">
              <div className="text-3xl font-bold">100+</div>
              <div className="text-white/80">Projects Delivered</div>
            </div>
            <div className="text-center space-y-2">
              <div className="text-3xl font-bold">50+</div>
              <div className="text-white/80">Happy Clients</div>
            </div>
            <div className="text-center space-y-2">
              <div className="text-3xl font-bold">24/7</div>
              <div className="text-white/80">Support Available</div>
            </div>
          </div>
        </div>
      </section>
    </div>
  )
}
