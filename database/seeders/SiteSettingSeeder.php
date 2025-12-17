<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // --- GENERAL ---
            [
                'group' => 'general',
                'key' => 'site_name',
                'label' => 'Application Name',
                'value' => 'Laraflox Enterprise',
                'type' => 'text',
                'is_system' => true,
                'sync_env' => true,
                'env_key' => 'APP_NAME',
            ],
            [
                'group' => 'general',
                'key' => 'site_description',
                'label' => 'Site Description',
                'value' => 'Leading provider of enterprise solutions and modern web applications.',
                'type' => 'textarea',
                'is_system' => true,
            ],
            [
                'group' => 'general',
                'key' => 'site_logo',
                'label' => 'Main Logo',
                'value' => null, // Path file akan disimpan di sini
                'type' => 'file',
                'description' => 'Recommended size: 200x50px (PNG/SVG)',
                'is_system' => true,
            ],
            [
                'group' => 'general',
                'key' => 'site_favicon',
                'label' => 'Favicon',
                'value' => null,
                'type' => 'file',
                'description' => 'Recommended size: 32x32px (ICO/PNG)',
                'is_system' => true,
            ],
            [
                'group' => 'general',
                'key' => 'copyright_text',
                'label' => 'Footer Copyright',
                'value' => '© 2025 Laraflox Inc. All rights reserved.',
                'type' => 'text',
                'is_system' => true,
            ],

            // --- CONTACT & ADDRESS ---
            [
                'group' => 'contact',
                'key' => 'contact_email',
                'label' => 'Support Email',
                'value' => 'support@laraflox.com',
                'type' => 'email',
                'is_system' => true,
                'sync_env' => true,
                'env_key' => 'MAIL_FROM_ADDRESS',
            ],
            [
                'group' => 'contact',
                'key' => 'contact_phone',
                'label' => 'Phone Number',
                'value' => '+62 812 3456 7890',
                'type' => 'text',
                'is_system' => true,
            ],
            [
                'group' => 'contact',
                'key' => 'contact_address',
                'label' => 'Office Address',
                'value' => 'Jl. Sudirman No. 123, Jakarta Selatan, Indonesia',
                'type' => 'textarea',
                'is_system' => true,
            ],
            [
                'group' => 'contact',
                'key' => 'google_maps_embed',
                'label' => 'Google Maps Embed URL',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Paste the iframe src URL here.',
                'is_system' => true,
            ],

            // --- SOCIAL MEDIA ---
            [
                'group' => 'social',
                'key' => 'social_facebook',
                'label' => 'Facebook URL',
                'value' => 'https://facebook.com/laraflox',
                'type' => 'url',
                'is_system' => false,
            ],
            [
                'group' => 'social',
                'key' => 'social_twitter',
                'label' => 'Twitter/X URL',
                'value' => 'https://x.com/laraflox',
                'type' => 'url',
                'is_system' => false,
            ],
            [
                'group' => 'social',
                'key' => 'social_instagram',
                'label' => 'Instagram URL',
                'value' => 'https://instagram.com/laraflox',
                'type' => 'url',
                'is_system' => false,
            ],
            [
                'group' => 'social',
                'key' => 'social_linkedin',
                'label' => 'LinkedIn URL',
                'value' => 'https://linkedin.com/company/laraflox',
                'type' => 'url',
                'is_system' => false,
            ],

            // --- SEO DEFAULT ---
            [
                'group' => 'seo',
                'key' => 'meta_keywords_default',
                'label' => 'Default Meta Keywords',
                'value' => 'laravel, enterprise, web application, saas',
                'type' => 'textarea',
                'is_system' => true,
            ],
            [
                'group' => 'seo',
                'key' => 'google_analytics_id',
                'label' => 'Google Analytics ID (G-xxxxx)',
                'value' => '',
                'type' => 'text',
                'is_system' => true,
            ],

             // --- APPEARANCE / SYSTEM ---
            [
                'group' => 'system',
                'key' => 'enable_registration',
                'label' => 'Enable User Registration',
                'value' => '1',
                'type' => 'boolean',
                'is_system' => true,
            ],
            [
                'group' => 'system',
                'key' => 'maintenance_mode',
                'label' => 'Maintenance Mode Message',
                'value' => 'We are currently upgrading our system. Please check back later.',
                'type' => 'textarea',
                'is_system' => true,
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
