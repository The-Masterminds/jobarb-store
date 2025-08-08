"use client"

import type React from "react"

import { useState } from "react"
import { Dialog, DialogContent, DialogHeader, DialogTitle } from "@/components/ui/dialog"
import { Button } from "@/components/ui/button"
import { Input } from "@/components/ui/input"
import { Label } from "@/components/ui/label"
import { Textarea } from "@/components/ui/textarea"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Send, CheckCircle, X } from "lucide-react"
import { apiService } from "@/lib/api"
  
interface QuoteRequestModalProps {
  isOpen: boolean
  onClose: () => void
  productName?: string
  productSku?: string
}

export default function QuoteRequestModal({ isOpen, onClose, productName, productSku }: QuoteRequestModalProps) {
  const [formData, setFormData] = useState({
    fullName: "",
    phoneNumber: "",
    email: "",
    company: "",
    service: "",
    message: productName
      ? `I would like to request a quote for ${productName}${productSku ? ` (SKU: ${productSku})` : ""}.`
      : "",
  })
  const [isSubmitting, setIsSubmitting] = useState(false)
  const [isSubmitted, setIsSubmitted] = useState(false)

  const services = [
    "ICT Equipment Sales",
    "Network Infrastructure",
    "CCTV Installation",
    "Server Installation",
    "Technical Support",
    "Software Development",
    "Cybersecurity Solutions",
    "General Inquiry",
  ]

  const handleInputChange = (field: string, value: string) => {
    setFormData((prev) => ({ ...prev, [field]: value }))
  }

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault()
    setIsSubmitting(true)

    try {
      // TODO: This will be replaced with real API call
      await apiService.submitContact({
        name: formData.fullName,
        email: formData.email,
        phone: formData.phoneNumber,
        company: formData.company,
        subject: productName ? `Quote Request - ${productName}` : "Quote Request",
        service: formData.service,
        message: formData.message,
      })

      setIsSubmitted(true)

      // Reset form and close modal after 2 seconds
      setTimeout(() => {
        setIsSubmitted(false)
        setFormData({
          fullName: "",
          phoneNumber: "",
          email: "",
          company: "",
          service: "",
          message: productName
            ? `I would like to request a quote for ${productName}${productSku ? ` (SKU: ${productSku})` : ""}.`
            : "",
        })
        onClose()
      }, 2000)
    } catch (error) {
      console.error("Error submitting quote request:", error)
    } finally {
      setIsSubmitting(false)
    }
  }

  const handleClose = () => {
    if (!isSubmitting) {
      onClose()
      // Reset form when closing
      setTimeout(() => {
        setIsSubmitted(false)
        setFormData({
          fullName: "",
          phoneNumber: "",
          email: "",
          company: "",
          service: "",
          message: productName
            ? `I would like to request a quote for ${productName}${productSku ? ` (SKU: ${productSku})` : ""}.`
            : "",
        })
      }, 300)
    }
  }

  return (
    <Dialog open={isOpen} onOpenChange={handleClose}>
      <DialogContent className="sm:max-w-md max-h-[90vh] overflow-y-auto">
        <DialogHeader>
          <DialogTitle className="flex items-center justify-between">
            <span className="text-jobarn-primary">Request Quote</span>
            <Button variant="ghost" size="icon" onClick={handleClose} disabled={isSubmitting}>
              <X className="h-4 w-4" />
            </Button>
          </DialogTitle>
        </DialogHeader>

        {isSubmitted ? (
          <div className="text-center space-y-4 py-8">
            <CheckCircle className="h-16 w-16 text-green-500 mx-auto" />
            <h3 className="text-xl font-semibold text-green-800">Quote Request Sent!</h3>
            <p className="text-green-700">We'll get back to you within 24 hours with a detailed quote.</p>
          </div>
        ) : (
          <form onSubmit={handleSubmit} className="space-y-4">
            <div className="space-y-2">
              <Label htmlFor="fullName">Full Name *</Label>
              <Input
                id="fullName"
                value={formData.fullName}
                onChange={(e) => handleInputChange("fullName", e.target.value)}
                placeholder="Your full name"
                required
              />
            </div>

            <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div className="space-y-2">
                <Label htmlFor="phoneNumber">Phone Number *</Label>
                <Input
                  id="phoneNumber"
                  value={formData.phoneNumber}
                  onChange={(e) => handleInputChange("phoneNumber", e.target.value)}
                  placeholder="+255 xxx xxx xxx"
                  required
                />
              </div>
              <div className="space-y-2">
                <Label htmlFor="email">Email Address *</Label>
                <Input
                  id="email"
                  type="email"
                  value={formData.email}
                  onChange={(e) => handleInputChange("email", e.target.value)}
                  placeholder="your.email@example.com"
                  required
                />
              </div>
            </div>

            <div className="space-y-2">
              <Label htmlFor="company">Company Name</Label>
              <Input
                id="company"
                value={formData.company}
                onChange={(e) => handleInputChange("company", e.target.value)}
                placeholder="Your company name (optional)"
              />
            </div>

            <div className="space-y-2">
              <Label htmlFor="service">Service Category</Label>
              <Select value={formData.service} onValueChange={(value) => handleInputChange("service", value)}>
                <SelectTrigger>
                  <SelectValue placeholder="Select a service category" />
                </SelectTrigger>
                <SelectContent>
                  {services.map((service) => (
                    <SelectItem key={service} value={service}>
                      {service}
                    </SelectItem>
                  ))}
                </SelectContent>
              </Select>
            </div>

            <div className="space-y-2">
              <Label htmlFor="message">Message *</Label>
              <Textarea
                id="message"
                value={formData.message}
                onChange={(e) => handleInputChange("message", e.target.value)}
                placeholder="Please describe your requirements..."
                rows={4}
                required
              />
            </div>

            <Button
              type="submit"
              disabled={isSubmitting}
              className="w-full bg-jobarn-primary hover:bg-jobarn-primary/90 text-white"
            >
              {isSubmitting ? (
                "Sending Request..."
              ) : (
                <>
                  Send Quote Request
                  <Send className="ml-2 h-4 w-4" />
                </>
              )}
            </Button>
          </form>
        )}
      </DialogContent>
    </Dialog>
  )
}
