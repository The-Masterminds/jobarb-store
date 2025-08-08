"use client"

import { AlertCircle, RefreshCw } from "lucide-react"
import { Button } from "./button"

interface ErrorMessageProps {
  message: string
  onRetry?: () => void
}

export function ErrorMessage({ message, onRetry }: ErrorMessageProps) {
  return (
    <div className="flex flex-col items-center justify-center space-y-4 p-8 text-center">
      <AlertCircle className="h-12 w-12 text-red-500" />
      <div className="space-y-2">
        <h3 className="text-lg font-semibold text-gray-900">Something went wrong</h3>
        <p className="text-gray-600">{message}</p>
      </div>
      {onRetry && (
        <Button onClick={onRetry} variant="outline" className="mt-4 bg-transparent">
          <RefreshCw className="h-4 w-4 mr-2" />
          Try Again
        </Button>
      )}
    </div>
  )
}
