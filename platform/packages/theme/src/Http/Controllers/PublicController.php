<?php

namespace Botble\Theme\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Facades\EmailHandler;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Contact\Forms\Fronts\ContactForm;
use Botble\Contact\Events\SentContactEvent;
use Botble\Page\Models\Page;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Botble\Theme\Events\RenderingSingleEvent;
use Botble\Theme\Events\RenderingSiteMapEvent;
use Botble\Theme\Facades\SiteMapManager;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PublicController extends BaseController
{
    public function getIndex()
    {
        // Theme::addBodyAttributes(['id' => 'page-home']);
        // if (defined('PAGE_MODULE_SCREEN_NAME') && BaseHelper::getHomepageId()) {
        //     $data = (new PageService())->handleFrontRoutes(null);

        //     event(new RenderingSingleEvent(new Slug()));

        //     if ($data) {
        //         return Theme::scope($data['view'], $data['data'], $data['default_view'])->render();
        //     }
        // }

        // SeoHelper::setTitle(Theme::getSiteTitle());

        // event(RenderingHomePageEvent::class);

        // return Theme::scope('index')->render();
        // return "page";

        $services = [
            [
                'icon' => 'shopping-cart',
                'title' => 'ICT Equipment Sales',
                'description' => 'Premium laptops, desktops, and accessories from trusted brands',
                'image' => '/img/ict-equipments.jpg',
            ],
            [
                'icon' => 'network',
                'title' => 'Network Infrastructure',
                'description' => 'Complete networking solutions and server installations',
                'image' => '/placeholder.svg?height=200&width=300',
            ],
            [
                'icon' => 'shield',
                'title' => 'CCTV & Security',
                'description' => 'Advanced surveillance systems and cybersecurity solutions',
                'image' => '/placeholder.svg?height=200&width=300',
            ],
            [
                'icon' => 'code',
                'title' => 'Software Development',
                'description' => 'Custom software solutions and licensing services',
                'image' => '/placeholder.svg?height=200&width=300',
            ],
            [
                'icon' => 'headset',
                'title' => 'Technical Support',
                'description' => '24/7 maintenance and technical assistance',
                'image' => '/placeholder.svg?height=200&width=300',
            ],
        ];

        $products = [
            [
                'title' => 'Laptops & Desktops',
                'description' => 'High-performance computers for business and personal use',
                'image' => 'vendor/core/packages/theme/frontend/images/products/laptops-and-desktops.png',
            ],
            [
                'title' => 'Networking Equipment',
                'description' => 'Routers, switches, and UPS systems for reliable connectivity',
                'image' => 'vendor/core/packages/theme/frontend/images/products/router-and-switches.png',
            ],
            [
                'title' => 'CCTV Systems',
                'description' => 'Advanced surveillance cameras and monitoring solutions',
                'image' => 'vendor/core/packages/theme/frontend/images/products/cameras.png',
            ],
            [
                'title' => 'Audio Equipment',
                'description' => 'Professional headphones, microphones, and sound systems',
                'image' => 'vendor/core/packages/theme/frontend/images/products/audio.png',
            ],
            [
                'title' => 'Storage Solutions',
                'description' => 'Reliable data storage and backup systems',
                'image' => 'vendor/core/packages/theme/frontend/images/products/storage.png',
            ],
            [
                'title' => 'Interactive Displays',
                'description' => 'Smart whiteboards and projectors for modern workspaces',
                'image' => 'vendor/core/packages/theme/frontend/images/products/advanced-interactive-display.png',
            ],
        ];

        $whyChooseUs = [
            [
                'icon' => 'award',
                'title' => 'Certified Team',
                'description' => 'Expert technicians with industry certifications',
            ],
            [
                'icon' => 'users',
                'title' => 'Trusted Brands',
                'description' => 'Authorized partners with leading technology companies',
            ],
            [
                'icon' => 'clock',
                'title' => '24/7 Support',
                'description' => 'Round-the-clock technical assistance and maintenance',
            ],
            [
                'icon' => 'check-circle',
                'title' => 'Quality Assurance',
                'description' => 'Rigorous testing and quality control processes',
            ],
        ];

        $testimonials = [
            [
                'name' => 'Mr. Paul Mgata',
                'company' => 'Starlink Gulf Limited',
                'content' => 'Thanks to JOBARN, their expertise and dedication have enabled us to streamline operations and enhance patient care.',
                'rating' => 4.5,
            ],
            [
                'name' => 'Neema Changamike',
                'company' => 'Wetcu Limited',
                'content' =>
                'Excellent service and support. Their team helped us implement a complete ICT solution that improved our operations significantly.',
                'rating' => 5,
            ],
            [
                'name' => 'Respichius D. Mitti',
                'company' => 'EDI Global',
                'content' =>
                'Professional, reliable, and knowledgeable. JOBARN is our go-to partner for all technology needs.',
                'rating' => 5,
            ],
        ];

        $partners = ['Microsoft', 'Lenovo', 'CISCO', 'TP-Link', 'Dell', 'SOPHOS', 'Kaspersky', 'Apple'];

        return view('packages/theme::frontend.pages.home', compact(
            'services',
            'products',
            'whyChooseUs',
            'testimonials',
            'partners'
        ));
    }

    public function getAbout()
    {
        return view('packages/theme::frontend.pages.about');
    }

    public function getServices()
    {
        $services = [
            [
                'id' => 1,
                'title' => "ICT Equipment Sales",
                'slug' => "ict-equipment-sales",
                'description' => "Comprehensive range of premium ICT equipment from leading global brands including laptops, desktops, servers, and accessories.",
                'icon' => "shopping-cart",
                'features' => [
                    "Laptops & Desktops from Lenovo, Dell, HP",
                    "Servers & Storage Solutions",
                    "Computer Accessories & Peripherals",
                    "Competitive Pricing & Warranties",
                ],
                'brands' => ["Lenovo", "Dell", "HP", "Apple", "Microsoft"],
                'image' => "vendor/core/packages/theme/frontend/images/services/computer-components.png",
                'status' => "active",
            ],
            [
                'id' => 2,
                'title' => "Networking Equipment Setup",
                'slug' => "networking-equipment-setup",
                'description' => "Professional network infrastructure design, installation, and configuration to ensure reliable and secure connectivity for your business.",
                'icon' => "network",
                'features' => [
                    "Network Design & Planning",
                    "Router & Switch Configuration",
                    "Wireless Network Setup",
                    "Network Security Implementation",
                ],
                'brands' => ["CISCO", "TP-Link", "Ubiquiti", "HPE"],
                'image' => "vendor/core/packages/theme/frontend/images/services/networking.jpg",
                'status' => "active",
            ],
            [
                'id' => 3,
                'title' => "CCTV Installation & Security",
                'slug' => "cctv-installation-security",
                'description' => "Complete surveillance solutions including CCTV installation, monitoring systems, and cybersecurity services to protect your business.",
                'icon' => "shield",
                'features' => [
                    "IP Camera Installation",
                    "Video Management Systems",
                    "Access Control Systems",
                    "Cybersecurity Solutions",
                ],
                'brands' => ["Hikvision", "Dahua", "SOPHOS", "Kaspersky"],
                'image' => "vendor/core/packages/theme/frontend/images/services/cctv.jpg",
                'status' => "active",
            ],
            [
                'id' => 4,
                'title' => "Server Installation & Storage",
                'slug' => "server-installation-storage",
                'description' => "Enterprise-grade server solutions and storage systems designed to handle your business-critical applications and data.",
                'icon' => "server",
                'features' => [
                    "Server Hardware Installation",
                    "Storage Area Network (SAN)",
                    "Backup & Recovery Solutions",
                    "Virtualization Services",
                ],
                'brands' => ["HPE", "Dell", "Lenovo", "Microsoft"],
                'image' => "vendor/core/packages/theme/frontend/images/services/server.jpg",
                'status' => "active",
            ],
            [
                'id' => 5,
                'title' => "Technical Support & Maintenance",
                'slug' => "technical-support-maintenance",
                'description' => "24/7 technical support and proactive maintenance services to ensure your ICT infrastructure operates at peak performance.",
                'icon' => "headphones",
                'features' => [
                    "24/7 Help Desk Support",
                    "Preventive Maintenance",
                    "Remote Monitoring",
                    "On-site Technical Support"
                ],
                'brands' => ["Multi-vendor Support"],
                'image' => "vendor/core/packages/theme/frontend/images/services/maintanance.jpg",
                'status' => "active",
            ],
            [
                'id' => 6,
                'title' => "Software Development & Licensing",
                'slug' => "software-development-licensing",
                'description' => "Custom software development services and software licensing solutions to meet your specific business requirements.",
                'icon' => "code",
                'features' => [
                    "Custom Software Development",
                    "Software Licensing & Compliance",
                    "System Integration",
                    "Application Maintenance",
                ],
                'brands' => ["Microsoft", "Adobe", "Autodesk", "Custom Solutions"],
                'image' => "/vendor/core/packages/theme/frontend/images/services/software.jpg",
                'status' => "active",
            ],
        ];

        return view('packages/theme::frontend.pages.services', compact('services'));
    }

    public function getClients()
    {
        $clients = [
            [
                'name' => "Derm Group",
                'industry' => "Engineering Solutions",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/derm-group.png",
                'description' => "Comprehensive ICT infrastructure and security solutions",
            ],
            [
                'name' => "SAKAMU HOSPITAL",
                'industry' => "Healthcare",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/sakamu.png",
                'description' => "Complete hospital management system and CCTV installation",
            ],
            [
                'name' => "EDI Global",
                'industry' => "MERL Services",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/edi-global.svg",
                'description' => "Complete hospital management system and CCTV installation",
            ],
            [
                'name' => "Imagine Worldwide Tanzania",
                'industry' => "Kids Come First",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/imagine-worldwide.png",
                'description' => "Providing Children with the opportunity for success",
            ],
            [
                'name' => "Simba Cargo",
                'industry' => "Cargo Transportation",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/simba-cargo.png",
                'description' => "A Clearing & Logistic Company, From China and Dubai to Tanzania",
            ],
            [
                'name' => "Magic Builders International",
                'industry' => "Building Material ",
                'logo' => "/vendor/core/packages/theme/frontend/images/clients/magic-builders.png",
                'description' => "Building materials supplier in Dar es Salaam",
            ]
        ];

        $partners = [
            [
                'name' => "Microsoft",
                'category' => "Software & Cloud",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/microsoft.png",
                'description' => "Official Microsoft Partner for software licensing and cloud solutions",
            ],
            [
                'name' => "Lenovo",
                'category' => "Hardware",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/lenovo.png",
                'description' => "Authorized Lenovo dealer for laptops, desktops, and servers",
            ],
            [
                'name' => "CISCO",
                'category' => "Networking",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/cisco.png",
                'description' => "Certified CISCO partner for networking equipment and solutions",
            ],
            [
                'name' => "TP-Link",
                'category' => "Networking",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/tp-link.png",
                'description' => "Official TP-Link distributor for wireless and networking products",
            ],
            [
                'name' => "HPE",
                'category' => "Enterprise Solutions",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/hpe.png",
                'description' => "HPE partner for enterprise servers and storage solutions",
            ],
            [
                'name' => "SOPHOS",
                'category' => "Cybersecurity",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/sophos.png",
                'description' => "SOPHOS partner for advanced cybersecurity solutions",
            ],
            [
                'name' => "Kaspersky",
                'category' => "Cybersecurity",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/kaspersky.png",
                'description' => "Kaspersky authorized reseller for antivirus and security products",
            ],
            [
                'name' => "Apple",
                'category' => "Consumer Electronics",
                'logo' => "/vendor/core/packages/theme/frontend/images/partners/apple.png",
                'description' => "Apple authorized reseller for Mac computers and devices",
            ],
        ];

        $stats = [
            [
                'icon' => 'Building',
                'number' => "200+",
                'label' => "Happy Clients",
                'description' => "Businesses trust us with their ICT needs",
            ],
            [
                'icon' => 'Users',
                'number' => "50+",
                'label' => "Projects Completed",
                'description' => "Successful implementations across Tanzania",
            ],
            [
                'icon' => 'Award',
                'number' => "10+",
                'label' => "Technology Partners",
                'description' => "Partnerships with leading global brands",
            ],
            [
                'icon' => 'Handshake',
                'number' => "99%",
                'label' => "Client Satisfaction",
                'description' => "Exceptional service delivery record",
            ],
        ];

        return view('packages/theme::frontend.pages.clients', compact('clients', 'partners', 'stats'));
    }


    public function requestQuote(Request $request)
    {

        dd($request);



        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required | regex:/^\+?[0-9\s\-\(\)]+$/',
            'message' => 'required | string | max:1000',
        ]);





        $slug = Slug::where('reference_id', $request->input('product_id'))->first();

        Log::debug(json_encode($slug));

        $wholeMessageContent =
            "\nMessage" . $request->input('message') . "\n" .
            "Product Enquired: " . $request->input('product_name') . "\n" .
            "Product Link: " . route('public.product.detail', $slug->key) . "\n" ;



        $request->merge(['content' => $wholeMessageContent]);

        $blacklistDomains = setting('blacklist_email_domains');

        if ($blacklistDomains) {
            $emailDomain = Str::after(strtolower($request->input('email')), '@');

            $blacklistDomains = collect(json_decode($blacklistDomains, true))->pluck('value')->all();

            if (in_array($emailDomain, $blacklistDomains)) {
                return $this
                    ->httpResponse()
                    ->setError()
                    ->setMessage(__('Your email is in blacklist. Please use another email address.'));
            }
        }


        $blacklistWords = trim(setting('blacklist_keywords', ''));

        if ($blacklistWords) {
            $content = strtolower($request->input('message'));

            $badWords = collect(json_decode($blacklistWords, true))
                ->filter(function ($item) use ($content) {
                    $matches = [];
                    $pattern = '/\b' . preg_quote($item['value'], '/') . '\b/iu';

                    return preg_match($pattern, $content, $matches, PREG_UNMATCHED_AS_NULL);
                })
                ->pluck('value')
                ->all();

            if (! empty($badWords)) {
                return $this
                    ->httpResponse()
                    ->setError()
                    ->setMessage(__('Your message contains blacklist words: ":words".', ['words' => implode(', ', $badWords)]));
            }
        }


        $receiverEmails = null;

        if ($receiverEmailsSetting = setting('receiver_emails', '')) {
            $receiverEmails = trim($receiverEmailsSetting);
        }

        if ($receiverEmails) {
            $receiverEmails = collect(json_decode($receiverEmails, true))
                ->pluck('value')
                ->all();
        }

        if (is_array($receiverEmails)) {
            $receiverEmails = array_filter($receiverEmails);

            if (count($receiverEmails) === 1) {
                $receiverEmails = Arr::first($receiverEmails);
            }
        }


        try {
            $form = ContactForm::create();

            $form->saving(function (ContactForm $form) use ($receiverEmails): void {
                $data = $form->getRequestData();

                /**
                 * @var Contact $contact
                 */
                $contact = $form->getModel();

                $contact->fill($data)->save();

                event(new SentContactEvent($contact));

                $args = [];

                if ($contact->name && $contact->email) {
                    $args = ['replyTo' => [$contact->name => $contact->email]];
                }

                $emailHandler = EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                    ->setVariableValues([
                        'contact_name' => $contact->name,
                        'contact_subject' => $contact->subject,
                        'contact_email' => $contact->email,
                        'contact_phone' => $contact->phone,
                        'contact_address' => $contact->address,
                        'contact_content' => $contact->content,
                        'contact_custom_fields' => $data['custom_fields'] ?? [],
                    ]);

                $emailHandler->sendUsingTemplate('notice', $receiverEmails ?: null, $args);

                $args = ['replyTo' => is_array($receiverEmails) ? Arr::first($receiverEmails) : $receiverEmails];

                $emailHandler->sendUsingTemplate('sender-confirmation', $contact->email, $args);
            }, true);

            return $this
                ->httpResponse()
                ->setMessage(__('Send message successfully!'));
        } catch (\Exception $exception) {
            throw $exception;
        } catch (\Exception $exception) {
            BaseHelper::logError($exception);

            return $this
                ->httpResponse()
                ->setError()
                ->setMessage(__("Can't send message on this time, please try again later!"));
        }
    }


    public function getView(?string $key = null, string $prefix = '')
    {
        if (empty($key)) {
            return $this->getIndex();
        }

        $slug = SlugHelper::getSlug($key, $prefix);

        abort_unless($slug, 404);

        if (
            defined('PAGE_MODULE_SCREEN_NAME') &&
            $slug->reference_type === Page::class &&
            BaseHelper::isHomepage($slug->reference_id)
        ) {
            return redirect()->to(BaseHelper::getHomepageUrl());
        }

        $result = apply_filters(BASE_FILTER_PUBLIC_SINGLE_DATA, $slug);


        $extension = SlugHelper::getPublicSingleEndingURL();

        if ($extension) {
            $key = Str::replaceLast($extension, '', $key);
        }

        if ($result instanceof BaseHttpResponse) {
            return $result;
        }

        if (isset($result['slug']) && $result['slug'] !== $key) {
            $prefix = SlugHelper::getPrefix(Arr::first($result['data'])::class);

            return redirect()->route('public.single', empty($prefix) ? $result['slug'] : "$prefix/{$result['slug']}");
        }

        event(new RenderingSingleEvent($slug));

        if (! empty($result) && is_array($result)) {
            if (isset($result['view'])) {
                Theme::addBodyAttributes(['id' => Str::slug(Str::snake(Str::afterLast($slug->reference_type, '\\'))) . '-' . $slug->reference_id]);

                return Theme::scope($result['view'], $result['data'], Arr::get($result, 'default_view'))->render();
            }

            return $result;
        }

        abort(404);
    }

    public function getContact()
    {
        $googleMapsApiKey = env('GOOGLE_MAPS_API_KEY');

        return view('packages/theme::frontend.pages.contact', compact('googleMapsApiKey'));
    }

    public function getBlog(Request $request)
    {
        //TODO:: Add search
        // if($request->has('search')) {
            // $searchTerm = $request->input('q', $request->input('search'));

            // $posts = app('Botble\Blog\Http\Controllers\API\PostController')->getSearch($request->merge(['q' => $searchTerm]), new PostInterface);

        // }else {
            $posts = app('Botble\Blog\Http\Controllers\API\PostController')->index($request);
        // }

        return view('packages/theme::frontend.pages.blog.index', compact('posts'));
    }

    public function getBlogDetail(string $slug)
    {
        $post = app('Botble\Blog\Http\Controllers\API\PostController')->findBySlug($slug);
        // Calculate reading time (optional)
        $readingTime = ceil(str_word_count(strip_tags($post['content'])) / 300  );

        return view('packages/theme::frontend.pages.blog.show', compact('post', 'readingTime'));
    }

    public function getProductsFrontEnd(Request $request)
    {
        $query = collect([
            [
                'id' => 1,
                'title' => "Lenovo ThinkPad X1 Carbon",
                'slug' => "lenovo-thinkpad-x1-carbon",
                'category' => "laptops",
                'description' => "Ultra-lightweight business laptop with enterprise-grade security and performance.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "Lenovo",
                'features' => ["Intel Core i7", "16GB RAM", "512GB SSD", "14-inch Display"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-15T10:00:00Z",
            ],
            [
                'id' => 2,
                'title' => "CISCO Catalyst 9300 Switch",
                'slug' => "cisco-catalyst-9300-switch",
                'category' => "networking",
                'description' => "High-performance enterprise network switch with advanced security features.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "CISCO",
                'features' => ["48 Ports", "PoE+", "Stackable", "Layer 3 Switching"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-14T10:00:00Z",
            ],
            [
                'id' => 3,
                'title' => "Hikvision IP Camera DS-2CD2143G0-I",
                'slug' => "hikvision-ip-camera-ds-2cd2143g0-i",
                'category' => "cctv",
                'description' => "4MP outdoor network camera with excellent night vision capabilities.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "Hikvision",
                'features' => ["4MP Resolution", "Night Vision", "Weatherproof", "Motion Detection"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-13T10:00:00Z",
            ],
            [
                'id' => 4,
                'title' => "Sony WH-1000XM4 Headphones",
                'slug' => "sony-wh-1000xm4-headphones",
                'category' => "audio",
                'description' => "Industry-leading noise canceling wireless headphones for professionals.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "Sony",
                'features' => ["Noise Canceling", "30hr Battery", "Touch Controls", "Hi-Res Audio"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-12T10:00:00Z",
            ],
            [
                'id' => 5,
                'title' => "Microsoft Surface Hub 2S",
                'slug' => "microsoft-surface-hub-2s",
                'category' => "interactive",
                'description' => "All-in-one digital whiteboard designed for team collaboration.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "Microsoft",
                'features' => ["85-inch Display", "4K Resolution", "Touch & Pen", "Windows 10"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-11T10:00:00Z",
            ],
            [
                'id' => 6,
                'title' => "HP LaserJet Pro M404dn",
                'slug' => "hp-laserjet-pro-m404dn",
                'category' => "printers",
                'description' => "Fast, secure, and reliable monochrome laser printer for offices.",
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=250&width=350",
                'brand' => "HP",
                'features' => ["38 ppm", "Duplex Printing", "Network Ready", "Security Features"],
                'price_range' => "Contact for pricing",
                'status' => "active",
                'created_at' => "2024-01-10T10:00:00Z",
            ],


        ]);

        $categories = [
            ['id' => 'all', 'name' => 'Select category'],
            ['id' => 'laptops', 'name' => 'Laptops & Desktops'],
            ['id' => 'networking', 'name' => 'Networking Equipment'],
            ['id' => 'cctv', 'name' => 'CCTV & Surveillance'],
            ['id' => 'audio', 'name' => 'Audio Equipment'],
            ['id' => 'interactive', 'name' => 'Interactive Displays'],
            ['id' => 'printers', 'name' => 'Printers & Projectors'],
            ['id' => 'accessories', 'name' => 'Computer Accessories'],
            ['id' => 'drones', 'name' => 'Drones & Cameras']
        ];

        $products = $query->sortByDesc('created_at')->values()->all();

        Log::info('Fetching products :: ' . json_encode($request->method()));

        if ($request->method() === 'GET' && $request->header('X-Custom-Fetch-Request') === 'true') {
            // Search filter
            $query = $query->filter(function ($item) use ($request) {
                return stripos($item['title'], $request->search) !== false ||
                    stripos($item['description'], $request->search) !== false;
            });

            // Category filter
            $query = $query->filter(function ($item) use ($request) {
                return $item['category'] === $request->category;
            });

            try {
                // $products = $query->paginate(12);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                $products = collect();
            }

            return response()->json([
                'success' => true,
                'data' => $products
            ]);
        }

        try {
            // $products = $query->paginate(12);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $products = collect();
        }

        return view('packages/theme::frontend.pages.products', compact('products', 'categories'));
    }

    public function getProductDetail(string $slug)
    {
        $slug = SlugHelper::getSlug($slug, 'products');

        $product = apply_filters(BASE_FILTER_PUBLIC_SINGLE_DATA, $slug);
        $product = $product['data']['product'];

        return view('packages/theme::frontend.pages.product-detail', compact('product'));
    }

    public function getSiteMap()
    {
        return $this->getSiteMapIndex();
    }

    public function getSiteMapIndex(?string $key = null, string $extension = 'xml')
    {
        if ($key == 'sitemap') {
            $key = null;
        }

        if (! SiteMapManager::init($key, $extension)->isCached()) {
            event(new RenderingSiteMapEvent($key));
        }

        // show your site map (options: 'xml' (default), 'xml-mobile', 'html', 'txt', 'ror-rss', 'ror-rdf', 'google-news')
        return SiteMapManager::render($key ? $extension : 'sitemapindex');
    }

    public function getViewWithPrefix(string $prefix, ?string $slug = null)
    {
        return $this->getView($slug, $prefix);
    }
}
