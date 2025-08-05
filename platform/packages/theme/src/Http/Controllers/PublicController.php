<?php

namespace Botble\Theme\Http\Controllers;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Page\Models\Page;
use Botble\Page\Services\PageService;
use Botble\SeoHelper\Facades\SeoHelper;
use Botble\Slug\Facades\SlugHelper;
use Botble\Slug\Models\Slug;
use Botble\Theme\Events\RenderingHomePageEvent;
use Botble\Theme\Events\RenderingSingleEvent;
use Botble\Theme\Events\RenderingSiteMapEvent;
use Botble\Theme\Facades\SiteMapManager;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;
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

        return view('packages/theme::frontend.pages.home');
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
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
                'image' => "http://192.168.1.141:3000/placeholder.svg?height=300&width=400",
                'status' => "active",
            ],
        ];

        return view('packages/theme::frontend.pages.services', compact('services'));
    }

    public function getView(?string $key = null, string $prefix = '')
    {
        if (empty($key)) {
            return $this->getIndex();
        }

        $slug = SlugHelper::getSlug($key, $prefix);

        dd($key);

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
