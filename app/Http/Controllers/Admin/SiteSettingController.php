<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $textFields = [
            // Geral
            'site_name', 'address', 'phone', 'email', 'linkedin', 'instagram', 'twitter', 'facebook', 'whatsapp',

            // Sobre Nós
            'about_hero_title', 'about_hero_p1', 'about_hero_p2',
            'about_cause_title', 'about_cause_p1', 'about_cause_p2', 'about_cause_quote',
            'about_offer_title', 'about_offer_text',
            'about_promise_title', 'about_promise_text',
            'about_beliefs_title', 'about_beliefs_text',
            'about_history_title', 'about_history_p1',
            'about_gallery_img1', 'about_gallery_img2', 'about_gallery_img3',

            // Home Interativos
            'home_slider_title', 'home_slider_subtitle',
            'home_slider_before_img', 'home_slider_after_img',
            'home_slider_concept_tag', 'home_slider_result_tag',
            'home_slider_metric1_val', 'home_slider_metric1_label',
            'home_slider_metric2_val', 'home_slider_metric2_label',
            'home_pillars_title', 'home_pillars_subtitle',
            'home_pillar1_title', 'home_pillar1_desc',
            'home_pillar2_title', 'home_pillar2_desc',
            'home_pillar3_title', 'home_pillar3_desc',
            'home_pillar4_title', 'home_pillar4_desc',

            // Mídia & Vídeos
            'showreel_video_url', 'culture_video_url', 'culture_video_title', 'culture_video_desc',

            // Páginas Legais
            'legal_privacy_policy', 'legal_cookies_policy',

            // SEO & Metadados
            'seo_meta_title_default', 'seo_meta_description_default', 'seo_meta_keywords_default', 'seo_og_image_default',
            'seo_google_analytics_id', 'seo_google_site_verification',
            'seo_home_title', 'seo_home_description', 'seo_home_keywords',
            'seo_about_title', 'seo_about_description', 'seo_about_keywords',
            'seo_services_title', 'seo_services_description',
            'seo_work_title', 'seo_work_description',
            'seo_clients_title', 'seo_clients_description',
            'seo_team_title', 'seo_team_description',
            'seo_insights_title', 'seo_insights_description',
            'seo_contact_title', 'seo_contact_description',
            'seo_oilandgas_title', 'seo_oilandgas_description',
        ];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                SiteSetting::set($field, $request->input($field));
            }
        }

        // Handle file uploads for images
        $fileFields = [
            'about_gallery_file1' => 'about_gallery_img1',
            'about_gallery_file2' => 'about_gallery_img2',
            'about_gallery_file3' => 'about_gallery_img3',
            'home_slider_before_file' => 'home_slider_before_img',
            'home_slider_after_file' => 'home_slider_after_img',
            'seo_og_image_file' => 'seo_og_image_default',
        ];

        foreach ($fileFields as $inputName => $settingKey) {
            if ($request->hasFile($inputName)) {
                $path = $request->file($inputName)->store('settings', 'public');
                SiteSetting::set($settingKey, Storage::url($path));
            }
        }

        $activeTab = $request->input('active_tab', 'general');

        return redirect()->route('admin.settings.index', ['tab' => $activeTab])
            ->with('success', 'Configurações e Metadados SEO atualizados com sucesso.');
    }
}
