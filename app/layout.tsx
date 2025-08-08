import type React from "react"
import type { Metadata } from "next"
import { Inter } from "next/font/google"
import "./globals.css"
import Navigation from "@/components/navigation"
import Footer from "@/components/footer"
import { SettingsProvider } from "@/contexts/settings-context"

const inter = Inter({ subsets: ["latin"] })

export const metadata: Metadata = {
  title: "JOBARN - ICT Solutions Tanzania | Computers, Networking, CCTV",
  description:
    "Leading ICT company in Tanzania providing computers, networking equipment, CCTV installation, software development, and technical support. Trusted by businesses across Dar es Salaam.",
  keywords:
    "ICT Tanzania, computers Dar es Salaam, networking equipment, CCTV installation, software development, technical support, Lenovo, Microsoft, CISCO",
}

export default function RootLayout({
  children,
}: {
  children: React.ReactNode
}) {
  return (
    <html lang="en">
      <body className={inter.className}>
        <SettingsProvider>
          <Navigation />
          <main>{children}</main>
          <Footer />
        </SettingsProvider>
      </body>
    </html>
  )
}
