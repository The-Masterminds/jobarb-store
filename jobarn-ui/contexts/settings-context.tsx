"use client"

import type React from "react"
import { createContext, useContext, useEffect, useState } from "react"
import { apiService } from "@/lib/api"

interface Settings {
  company_name: string
  tagline: string
  address: string
  phone_primary: string
  phone_secondary: string
  email_primary: string
  email_support: string
  social_media: {
    facebook: string
    twitter: string
    linkedin: string
    instagram: string
  }
  business_hours: {
    weekdays: string
    saturday: string
    sunday: string
  }
}

interface SettingsContextType {
  settings: Settings | null
  loading: boolean
  error: string | null
  refetchSettings: () => Promise<void>
}

const SettingsContext = createContext<SettingsContextType | undefined>(undefined)

export function SettingsProvider({ children }: { children: React.ReactNode }) {
  const [settings, setSettings] = useState<Settings | null>(null)
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState<string | null>(null)

  const fetchSettings = async () => {
    try {
      setLoading(true)
      setError(null)
      const response = await apiService.getSettings()
      setSettings(response.data.data)
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to load settings")
      console.error("Error fetching settings:", err)
    } finally {
      setLoading(false)
    }
  }

  useEffect(() => {
    fetchSettings()
  }, [])

  const refetchSettings = async () => {
    await fetchSettings()
  }

  return (
    <SettingsContext.Provider value={{ settings, loading, error, refetchSettings }}>
      {children}
    </SettingsContext.Provider>
  )
}

export function useSettings() {
  const context = useContext(SettingsContext)
  if (context === undefined) {
    throw new Error("useSettings must be used within a SettingsProvider")
  }
  return context
}
