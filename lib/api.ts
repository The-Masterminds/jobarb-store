import axios from "axios"

// API base URL
const API_BASE_URL = "https://jobarn.co.tz/api"

// Create axios instance
const api = axios.create({
  baseURL: API_BASE_URL,
  timeout: 10000,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
})

// Mock data for development
const MOCK_DATA = {
  // Footer/Contact Info
  settings: {
    company_name: "JOBARN GENERAL TRADING COMPANY LTD",
    tagline:
      "Empowering businesses with innovative ICT solutions. Reliable, scalable, and future-ready technology services.",
    address: "Survey Complex, Ground Floor, Near Milimani City, Dar es Salaam",
    phone_primary: "0784 847946",
    phone_secondary: "0745 912000",
    email_primary: "info@jobarn.co.tz",
    email_support: "support@jobarn.co.tz",
    social_media: {
      facebook: "https://facebook.com/jobarn",
      twitter: "https://twitter.com/jobarn",
      linkedin: "https://linkedin.com/company/jobarn",
      instagram: "https://instagram.com/jobarn",
    },
    business_hours: {
      weekdays: "Monday - Friday: 8:00 AM - 6:00 PM",
      saturday: "Saturday: 9:00 AM - 2:00 PM",
      sunday: "Sunday: Closed",
    },
  },

  // Services
  services: [
    {
      id: 1,
      title: "ICT Equipment Sales",
      slug: "ict-equipment-sales",
      description:
        "Comprehensive range of premium ICT equipment from leading global brands including laptops, desktops, servers, and accessories.",
      icon: "ShoppingCart",
      features: [
        "Laptops & Desktops from Lenovo, Dell, HP",
        "Servers & Storage Solutions",
        "Computer Accessories & Peripherals",
        "Competitive Pricing & Warranties",
      ],
      brands: ["Lenovo", "Dell", "HP", "Apple", "Microsoft"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
    {
      id: 2,
      title: "Networking Equipment Setup",
      slug: "networking-equipment-setup",
      description:
        "Professional network infrastructure design, installation, and configuration to ensure reliable and secure connectivity for your business.",
      icon: "Network",
      features: [
        "Network Design & Planning",
        "Router & Switch Configuration",
        "Wireless Network Setup",
        "Network Security Implementation",
      ],
      brands: ["CISCO", "TP-Link", "Ubiquiti", "HPE"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
    {
      id: 3,
      title: "CCTV Installation & Security",
      slug: "cctv-installation-security",
      description:
        "Complete surveillance solutions including CCTV installation, monitoring systems, and cybersecurity services to protect your business.",
      icon: "Shield",
      features: [
        "IP Camera Installation",
        "Video Management Systems",
        "Access Control Systems",
        "Cybersecurity Solutions",
      ],
      brands: ["Hikvision", "Dahua", "SOPHOS", "Kaspersky"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
    {
      id: 4,
      title: "Server Installation & Storage",
      slug: "server-installation-storage",
      description:
        "Enterprise-grade server solutions and storage systems designed to handle your business-critical applications and data.",
      icon: "Server",
      features: [
        "Server Hardware Installation",
        "Storage Area Network (SAN)",
        "Backup & Recovery Solutions",
        "Virtualization Services",
      ],
      brands: ["HPE", "Dell", "Lenovo", "Microsoft"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
    {
      id: 5,
      title: "Technical Support & Maintenance",
      slug: "technical-support-maintenance",
      description:
        "24/7 technical support and proactive maintenance services to ensure your ICT infrastructure operates at peak performance.",
      icon: "Headphones",
      features: ["24/7 Help Desk Support", "Preventive Maintenance", "Remote Monitoring", "On-site Technical Support"],
      brands: ["Multi-vendor Support"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
    {
      id: 6,
      title: "Software Development & Licensing",
      slug: "software-development-licensing",
      description:
        "Custom software development services and software licensing solutions to meet your specific business requirements.",
      icon: "Code",
      features: [
        "Custom Software Development",
        "Software Licensing & Compliance",
        "System Integration",
        "Application Maintenance",
      ],
      brands: ["Microsoft", "Adobe", "Autodesk", "Custom Solutions"],
      image: "/placeholder.svg?height=300&width=400",
      status: "active",
    },
  ],

  // Products
  products: [
    {
      id: 1,
      title: "Lenovo ThinkPad X1 Carbon",
      slug: "lenovo-thinkpad-x1-carbon",
      category: "laptops",
      description: "Ultra-lightweight business laptop with enterprise-grade security and performance.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "Lenovo",
      features: ["Intel Core i7", "16GB RAM", "512GB SSD", "14-inch Display"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-15T10:00:00Z",
    },
    {
      id: 2,
      title: "CISCO Catalyst 9300 Switch",
      slug: "cisco-catalyst-9300-switch",
      category: "networking",
      description: "High-performance enterprise network switch with advanced security features.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "CISCO",
      features: ["48 Ports", "PoE+", "Stackable", "Layer 3 Switching"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-14T10:00:00Z",
    },
    {
      id: 3,
      title: "Hikvision IP Camera DS-2CD2143G0-I",
      slug: "hikvision-ip-camera-ds-2cd2143g0-i",
      category: "cctv",
      description: "4MP outdoor network camera with excellent night vision capabilities.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "Hikvision",
      features: ["4MP Resolution", "Night Vision", "Weatherproof", "Motion Detection"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-13T10:00:00Z",
    },
    {
      id: 4,
      title: "Sony WH-1000XM4 Headphones",
      slug: "sony-wh-1000xm4-headphones",
      category: "audio",
      description: "Industry-leading noise canceling wireless headphones for professionals.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "Sony",
      features: ["Noise Canceling", "30hr Battery", "Touch Controls", "Hi-Res Audio"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-12T10:00:00Z",
    },
    {
      id: 5,
      title: "Microsoft Surface Hub 2S",
      slug: "microsoft-surface-hub-2s",
      category: "interactive",
      description: "All-in-one digital whiteboard designed for team collaboration.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "Microsoft",
      features: ["85-inch Display", "4K Resolution", "Touch & Pen", "Windows 10"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-11T10:00:00Z",
    },
    {
      id: 6,
      title: "HP LaserJet Pro M404dn",
      slug: "hp-laserjet-pro-m404dn",
      category: "printers",
      description: "Fast, secure, and reliable monochrome laser printer for offices.",
      image: "/placeholder.svg?height=250&width=350",
      brand: "HP",
      features: ["38 ppm", "Duplex Printing", "Network Ready", "Security Features"],
      price_range: "Contact for pricing",
      status: "active",
      created_at: "2024-01-10T10:00:00Z",
    },
  ],
  productDetail: {
    id: 1,
    name: "Ubiquiti UniFi Switch 24",
    slug: "ubiquiti-unifi-switch-24",
    description:
      "24-Port Managed Gigabit Switch with SFP. The UniFi Switch 24 is a fully managed, 24-port Gigabit switch that delivers robust performance and intelligent switching for growing networks. With its sleek design and advanced features, it's perfect for small to medium-sized businesses looking to expand their network infrastructure.",
    image: "/placeholder.svg?height=400&width=500&text=Ubiquiti+UniFi+Switch+24",
    category: "Networking",
    brand: "Ubiquiti",
    sku: "UBNT-SW24",
    price_range: "Contact for pricing",
    status: "active",
    specifications: [
      { label: "Ports", value: "24 Gigabit RJ45" },
      { label: "Power Consumption", value: "25W" },
      { label: "Rackmountable", value: "Yes" },
      { label: "Switching Capacity", value: "52 Gbps" },
      { label: "Max Power Consumption", value: "25W" },
      { label: "Dimensions", value: "442 x 285 x 43.7 mm" },
      { label: "Weight", value: "3.4 kg" },
      { label: "Operating Temperature", value: "-5 to 40° C" },
      { label: "Operating Humidity", value: "5 to 95% RH" },
      { label: "Certifications", value: "CE, FCC, IC" },
    ],
    features: [
      "24 Gigabit RJ45 ports",
      "2 SFP ports for fiber connectivity",
      "Layer 2 switching protocols",
      "VLAN support",
      "Link aggregation",
      "Spanning tree protocol",
      "Quality of Service (QoS)",
      "SNMP monitoring",
      "Web-based management interface",
      "UniFi Controller integration",
    ],
    related_products: [2, 3, 9], // IDs of related products
    created_at: "2024-01-15T10:00:00Z",
    updated_at: "2024-01-20T15:30:00Z",
  },

  // Blog Posts
  blogs: [
    {
      id: 1,
      title: "The Future of ICT in Tanzania: Trends and Opportunities",
      slug: "future-of-ict-in-tanzania-trends-opportunities",
      excerpt:
        "Explore the emerging trends in Tanzania's ICT sector and discover the opportunities that lie ahead for businesses ready to embrace digital transformation.",
      content: `
        <h2>Introduction</h2>
        <p>Tanzania's ICT sector is experiencing unprecedented growth, driven by increasing internet penetration, mobile technology adoption, and government initiatives to promote digital transformation. As we look toward the future, several key trends are shaping the landscape of information and communication technology in the country.</p>
        
        <h2>Key Trends Shaping Tanzania's ICT Future</h2>
        
        <h3>1. Mobile-First Digital Solutions</h3>
        <p>With mobile phone penetration exceeding 80% in Tanzania, businesses are increasingly adopting mobile-first strategies. From mobile banking to e-commerce platforms, the mobile revolution is transforming how Tanzanians interact with technology.</p>
        
        <h3>2. Cloud Computing Adoption</h3>
        <p>More organizations are migrating to cloud-based solutions to reduce infrastructure costs and improve scalability. This trend is particularly evident in the banking, healthcare, and education sectors.</p>
        
        <h3>3. Cybersecurity Awareness</h3>
        <p>As digital adoption increases, so does the need for robust cybersecurity measures. Organizations are investing heavily in security solutions to protect their digital assets and customer data.</p>
        
        <h2>Opportunities for Businesses</h2>
        <p>The evolving ICT landscape presents numerous opportunities for businesses willing to invest in technology. From improved operational efficiency to new revenue streams, the potential for growth is substantial.</p>
        
        <h2>Conclusion</h2>
        <p>Tanzania's ICT future is bright, with technology playing an increasingly important role in driving economic growth and social development. Businesses that embrace these trends today will be well-positioned for success tomorrow.</p>
      `,
      featured_image: "/placeholder.svg?height=400&width=600",
      author: "JOBARN Team",
      published_at: "2024-01-20T10:00:00Z",
      status: "published",
      tags: ["ICT", "Tanzania", "Digital Transformation", "Technology Trends"],
    },
    {
      id: 2,
      title: "Cybersecurity Best Practices for Small Businesses",
      slug: "cybersecurity-best-practices-small-businesses",
      excerpt:
        "Learn essential cybersecurity practices that every small business should implement to protect against cyber threats and data breaches.",
      content: `
        <h2>Why Cybersecurity Matters for Small Businesses</h2>
        <p>Small businesses are increasingly becoming targets for cybercriminals. With limited resources and often inadequate security measures, they present attractive opportunities for attackers. However, implementing basic cybersecurity practices can significantly reduce your risk.</p>
        
        <h2>Essential Security Measures</h2>
        
        <h3>1. Strong Password Policies</h3>
        <p>Implement strong password requirements and consider using password managers to generate and store complex passwords securely.</p>
        
        <h3>2. Regular Software Updates</h3>
        <p>Keep all software, including operating systems and applications, up to date with the latest security patches.</p>
        
        <h3>3. Employee Training</h3>
        <p>Educate your employees about common cyber threats such as phishing emails and social engineering attacks.</p>
        
        <h3>4. Data Backup</h3>
        <p>Regularly backup your important data and test your backup systems to ensure they work when needed.</p>
        
        <h3>5. Network Security</h3>
        <p>Secure your network with firewalls, secure Wi-Fi configurations, and network monitoring tools.</p>
        
        <h2>Working with Security Professionals</h2>
        <p>Consider partnering with cybersecurity professionals who can assess your current security posture and recommend appropriate solutions for your business needs.</p>
      `,
      featured_image: "/placeholder.svg?height=400&width=600",
      author: "JOBARN Security Team",
      published_at: "2024-01-18T10:00:00Z",
      status: "published",
      tags: ["Cybersecurity", "Small Business", "Data Protection", "Security"],
    },
    {
      id: 3,
      title: "Choosing the Right Network Infrastructure for Your Business",
      slug: "choosing-right-network-infrastructure-business",
      excerpt:
        "A comprehensive guide to selecting and implementing the right network infrastructure that will support your business growth and operational needs.",
      content: `
        <h2>Understanding Your Network Needs</h2>
        <p>Before investing in network infrastructure, it's crucial to understand your business requirements, current usage patterns, and future growth plans.</p>
        
        <h2>Key Components of Business Networks</h2>
        
        <h3>1. Switches and Routers</h3>
        <p>The backbone of your network, these devices manage data traffic and provide connectivity between different network segments.</p>
        
        <h3>2. Wireless Access Points</h3>
        <p>Modern businesses require reliable Wi-Fi coverage throughout their premises to support mobile devices and flexible working arrangements.</p>
        
        <h3>3. Security Appliances</h3>
        <p>Firewalls and intrusion detection systems protect your network from external threats and unauthorized access.</p>
        
        <h3>4. Network Monitoring Tools</h3>
        <p>These tools help you monitor network performance, identify bottlenecks, and troubleshoot issues proactively.</p>
        
        <h2>Planning for Scalability</h2>
        <p>Your network infrastructure should be designed to accommodate future growth without requiring complete overhauls.</p>
        
        <h2>Professional Installation and Support</h2>
        <p>Working with experienced network professionals ensures proper installation, configuration, and ongoing support for your network infrastructure.</p>
      `,
      featured_image: "/placeholder.svg?height=400&width=600",
      author: "JOBARN Network Team",
      published_at: "2024-01-15T10:00:00Z",
      status: "published",
      tags: ["Networking", "Infrastructure", "Business Technology", "IT Planning"],
    },
  ],
}

// API Functions with mock responses
export const apiService = {
  // Settings/Footer Info
  async getSettings() {
    // TODO: Replace with real API call
    // return api.get('/settings')

    // Mock response
    await new Promise((resolve) => setTimeout(resolve, 500)) // Simulate network delay
    return {
      data: {
        success: true,
        data: MOCK_DATA.settings,
      },
    }
  },

  // Services
  async getServices() {
    // TODO: Replace with real API call
    // return api.get('/services')

    await new Promise((resolve) => setTimeout(resolve, 800))
    return {
      data: {
        success: true,
        data: MOCK_DATA.services,
      },
    }
  },

  async getService(slug: string) {
    // TODO: Replace with real API call
    // return api.get(`/services/${slug}`)

    await new Promise((resolve) => setTimeout(resolve, 600))
    const service = MOCK_DATA.services.find((s) => s.slug === slug)
    if (!service) {
      throw new Error("Service not found")
    }
    return {
      data: {
        success: true,
        data: service,
      },
    }
  },

  // Products
  async getProducts(params?: { category?: string; search?: string; page?: number; limit?: number }) {
    // TODO: Replace with real API call
    // return api.get('/products', { params })

    await new Promise((resolve) => setTimeout(resolve, 700))
    let filteredProducts = [...MOCK_DATA.products]

    if (params?.category && params.category !== "all") {
      filteredProducts = filteredProducts.filter((p) => p.category === params.category)
    }

    if (params?.search) {
      const searchTerm = params.search.toLowerCase()
      filteredProducts = filteredProducts.filter(
        (p) =>
          p.title.toLowerCase().includes(searchTerm) ||
          p.description.toLowerCase().includes(searchTerm) ||
          p.brand.toLowerCase().includes(searchTerm),
      )
    }

    return {
      data: {
        success: true,
        data: filteredProducts,
        meta: {
          total: filteredProducts.length,
          page: params?.page || 1,
          limit: params?.limit || 12,
        },
      },
    }
  },

  async getProduct(slug: string) {
    // TODO: Replace with real API call
    // return api.get(`/products/${slug}`)

    await new Promise((resolve) => setTimeout(resolve, 600))
    const product = MOCK_DATA.products.find((p) => p.slug === slug)
    if (!product) {
      throw new Error("Product not found")
    }
    return {
      data: {
        success: true,
        data: product,
      },
    }
  },

  async getProductDetail(slug: string) {
    // TODO: Replace with real API call
    // return api.get(`/products/${slug}`)

    await new Promise((resolve) => setTimeout(resolve, 800))

    // For demo purposes, return the mock product for any slug
    // In real implementation, this would fetch the specific product by slug
    return {
      data: {
        success: true,
        data: MOCK_DATA.productDetail,
      },
    }
  },

  // Blog
  async getBlogs(params?: { page?: number; limit?: number; search?: string }) {
    // TODO: Replace with real API call
    // return api.get('/blogs', { params })

    await new Promise((resolve) => setTimeout(resolve, 600))
    let filteredBlogs = [...MOCK_DATA.blogs]

    if (params?.search) {
      const searchTerm = params.search.toLowerCase()
      filteredBlogs = filteredBlogs.filter(
        (b) => b.title.toLowerCase().includes(searchTerm) || b.excerpt.toLowerCase().includes(searchTerm),
      )
    }

    return {
      data: {
        success: true,
        data: filteredBlogs,
        meta: {
          total: filteredBlogs.length,
          page: params?.page || 1,
          limit: params?.limit || 10,
        },
      },
    }
  },

  async getBlog(slug: string) {
    // TODO: Replace with real API call
    // return api.get(`/blogs/${slug}`)

    await new Promise((resolve) => setTimeout(resolve, 600))
    const blog = MOCK_DATA.blogs.find((b) => b.slug === slug)
    if (!blog) {
      throw new Error("Blog post not found")
    }
    return {
      data: {
        success: true,
        data: blog,
      },
    }
  },

  // Contact
  async submitContact(data: {
    name: string
    email: string
    phone?: string
    company?: string
    subject: string
    service?: string
    message: string
  }) {
    // TODO: Replace with real API call
    // return api.post('/contact', data)

    await new Promise((resolve) => setTimeout(resolve, 1500))
    console.log("Contact form submitted:", data)
    return {
      data: {
        success: true,
        message: "Your message has been sent successfully. We will get back to you within 24 hours.",
      },
    }
  },
}

export default api
