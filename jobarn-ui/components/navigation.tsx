"use client"

import { useState } from "react"
import Link from "next/link"
import { usePathname } from "next/navigation"
import { Button } from "@/components/ui/button"
import { Sheet, SheetContent, SheetTrigger } from "@/components/ui/sheet"
import { Menu, Phone, Mail } from "lucide-react"
import { useSettings } from "@/contexts/settings-context"
import QuoteRequestModal from "./quote-request-modal"
import Image from "next/image"

const navigation = [
  { name: "Home", href: "/" },
  { name: "About", href: "/about" },
  { name: "Products", href: "/products" },
  { name: "Services", href: "/services" },
  { name: "Blog", href: "/blog" },
  { name: "Clients", href: "/clients" },
  { name: "Contact", href: "/contact" },
]

export default function Navigation() {
  const [isOpen, setIsOpen] = useState(false)
  const [isQuoteModalOpen, setIsQuoteModalOpen] = useState(false)
  const pathname = usePathname()
  const { settings } = useSettings()

  return (
    <>
      <header className="sticky top-0 z-50 w-full border-b bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60">
        {/* Top bar */}
        <div className="bg-jobarn-accent1 text-white py-2">
          <div className="container mx-auto px-4 flex justify-between items-center text-sm">
            <div className="flex items-center space-x-4">
              <div className="flex items-center space-x-1">
                <Phone className="h-3 w-3" />
                <span>
                  {settings ? `${settings.phone_primary} / ${settings.phone_secondary}` : "0784 847946 / 0745 912000"}
                </span>
              </div>
              <div className="flex items-center space-x-1">
                <Mail className="h-3 w-3" />
                <span>{settings ? settings.email_primary : "info@jobarn.co.tz"}</span>
              </div>
            </div>
            <div className="hidden md:block">
              <span>
                {settings ? settings.address : "Survey Complex, Ground Floor, Near Milimani City, Dar es Salaam"}
              </span>
            </div>
          </div>
        </div>

        {/* Main navigation */}
        <div className="container mx-auto px-4">
          <div className="flex h-16 items-center justify-between">
            <Link href="/" className="flex items-center space-x-2">
              <Image  
                src="logo/logo.png"
                alt="Jobarn Logo"
                className="h-10 w-auto"
                width={100}
                height={20}
              />
            </Link>

            {/* Desktop Navigation */}
            <nav className="hidden md:flex items-center space-x-8">
              {navigation.map((item) => (
                <Link
                  key={item.name}
                  href={item.href}
                  className={`text-sm font-medium transition-colors hover:text-jobarn-primary ${
                    pathname === item.href ? "text-jobarn-primary" : "text-gray-700"
                  }`}
                >
                  {item.name}
                </Link>
              ))}
            </nav>

            <div className="hidden md:flex items-center space-x-4">
              <Button
                onClick={() => setIsQuoteModalOpen(true)}
                className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white"
              >
                Request Quote
              </Button>
            </div>

            {/* Mobile Navigation */}
            <Sheet open={isOpen} onOpenChange={setIsOpen}>
              <SheetTrigger asChild className="md:hidden">
                <Button variant="ghost" size="icon">
                  <Menu className="h-5 w-5" />
                </Button>
              </SheetTrigger>
              <SheetContent side="right" className="w-[300px] sm:w-[400px]">
                <nav className="flex flex-col space-y-4 mt-8">
                  {navigation.map((item) => (
                    <Link
                      key={item.name}
                      href={item.href}
                      onClick={() => setIsOpen(false)}
                      className={`text-lg font-medium transition-colors hover:text-jobarn-primary ${
                        pathname === item.href ? "text-jobarn-primary" : "text-gray-700"
                      }`}
                    >
                      {item.name}
                    </Link>
                  ))}
                  <Button
                    onClick={() => {
                      setIsOpen(false)
                      setIsQuoteModalOpen(true)
                    }}
                    className="bg-jobarn-primary hover:bg-jobarn-primary/90 text-white mt-4"
                  >
                    Request Quote
                  </Button>
                </nav>
              </SheetContent>
            </Sheet>
          </div>
        </div>
      </header>

      {/* Quote Request Modal */}
      <QuoteRequestModal isOpen={isQuoteModalOpen} onClose={() => setIsQuoteModalOpen(false)} />
    </>
  )
}
