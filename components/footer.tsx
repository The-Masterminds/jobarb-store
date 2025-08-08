"use client"

import Link from "next/link"
import { Phone, Mail, MapPin, Facebook, Twitter, Linkedin, Instagram } from "lucide-react"
import { useSettings } from "@/contexts/settings-context"
import { Loading } from "@/components/ui/loading"
import Image from "next/image"

export default function Footer() {
  const { settings, loading, error } = useSettings()

  if (loading) {
    return (
      <footer className="bg-gray-900 text-white">
        <div className="container mx-auto px-4 py-12">
          <div className="flex justify-center">
            <Loading size="md" text="Loading..." />
          </div>
        </div>
      </footer>
    )
  }

  if (error || !settings) {
    return (
      <footer className="bg-gray-900 text-white">
        <div className="container mx-auto px-4 py-12">
          <div className="text-center text-gray-400">
            <p>Unable to load footer information</p>
          </div>
        </div>
      </footer>
    )
  }

  return (
    <footer className="bg-gray-900 text-white">
      <div className="container mx-auto px-4 py-12">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {/* Company Info */}
          <div className="space-y-4">
            <div className="flex items-center space-x-2">
              <Image
                src="/logo/logo.png"
                alt="Jobarn Logo"
                className="h-8 w-auto"
                width={200}
                height={50}
              />
            </div>
            <p className="text-gray-300 text-sm">{settings.tagline}</p>
            <div className="flex space-x-4">
              <a
                href={settings.social_media.facebook}
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-jobarn-accent2 transition-colors"
              >
                <Facebook className="h-5 w-5" />
              </a>
              <a
                href={settings.social_media.twitter}
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-jobarn-accent2 transition-colors"
              >
                <Twitter className="h-5 w-5" />
              </a>
              <a
                href={settings.social_media.linkedin}
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-jobarn-accent2 transition-colors"
              >
                <Linkedin className="h-5 w-5" />
              </a>
              <a
                href={settings.social_media.instagram}
                target="_blank"
                rel="noopener noreferrer"
                className="text-gray-400 hover:text-jobarn-accent2 transition-colors"
              >
                <Instagram className="h-5 w-5" />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div className="space-y-4">
            <h3 className="font-semibold text-lg">Quick Links</h3>
            <ul className="space-y-2 text-sm">
              <li>
                <Link href="/about" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  About Us
                </Link>
              </li>
              <li>
                <Link href="/products" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  Products
                </Link>
              </li>
              <li>
                <Link href="/services" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  Services
                </Link>
              </li>
              <li>
                <Link href="/blog" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  Blog
                </Link>
              </li>
              <li>
                <Link href="/clients" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  Clients & Partners
                </Link>
              </li>
              <li>
                <Link href="/contact" className="text-gray-300 hover:text-jobarn-accent2 transition-colors">
                  Contact Us
                </Link>
              </li>
            </ul>
          </div>

          {/* Services */}
          <div className="space-y-4">
            <h3 className="font-semibold text-lg">Our Services</h3>
            <ul className="space-y-2 text-sm">
              <li className="text-gray-300">ICT Equipment Sales</li>
              <li className="text-gray-300">Network Infrastructure</li>
              <li className="text-gray-300">CCTV Installation</li>
              <li className="text-gray-300">Software Development</li>
              <li className="text-gray-300">Technical Support</li>
            </ul>
          </div>

          {/* Contact Info */}
          <div className="space-y-4">
            <h3 className="font-semibold text-lg">Contact Info</h3>
            <div className="space-y-3 text-sm">
              <div className="flex items-start space-x-2">
                <MapPin className="h-4 w-4 text-jobarn-primary mt-0.5 flex-shrink-0" />
                <span className="text-gray-300">{settings.address}</span>
              </div>
              <div className="flex items-center space-x-2">
                <Phone className="h-4 w-4 text-jobarn-primary flex-shrink-0" />
                <span className="text-gray-300">
                  {settings.phone_primary} / {settings.phone_secondary}
                </span>
              </div>
              <div className="flex items-center space-x-2">
                <Mail className="h-4 w-4 text-jobarn-primary flex-shrink-0" />
                <span className="text-gray-300">{settings.email_primary}</span>
              </div>
            </div>
          </div>
        </div>

        <div className="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
          <p>
            &copy; {new Date().getFullYear()} {settings.company_name}. All rights reserved.
          </p>
        </div>
      </div>
    </footer>
  )
}
