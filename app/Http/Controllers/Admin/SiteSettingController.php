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
            // Geral & Contactos
            'site_name', 'address', 'phone', 'email', 'linkedin', 'instagram', 'twitter', 'facebook', 'whatsapp',

            // NOTA: O conteúdo das páginas (Sobre, Home, Média, Legal) foi movido
            // para o menu "Páginas" (App\Http\Controllers\Admin\PageContentController).

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
