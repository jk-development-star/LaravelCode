<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use App\Models\LanguageMenuText;
use App\Models\LanguageNotificationText;
use App\Models\LanguageWebsiteText;
use App\Models\LanguageAdminPanelText;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $language_menu_texts = LanguageMenuText::get();
        foreach($language_menu_texts as $language) {
            define($language->lang_key, $language->lang_value);
        }

        $language_website_texts = LanguageWebsiteText::get();
        foreach($language_website_texts as $language) {
            define($language->lang_key, $language->lang_value);
        }

        $language_notification_texts = LanguageNotificationText::get();
        foreach($language_notification_texts as $language) {
            define($language->lang_key, $language->lang_value);
        }

        $language_admin_panel_texts = LanguageAdminPanelText::get();
        foreach($language_admin_panel_texts as $language) {
            define($language->lang_key, $language->lang_value);
        }

        // $general_setting = GeneralSetting::where('id',1)->first();
        // $social_media_items = SocialMediaItem::orderby('social_order', 'asc')->get();
        // $page_home_items = PageHomeItem::where('id', 1)->first();

        // view()->share('g_setting', $general_setting);
        // view()->share('social_media_items', $social_media_items);
        // view()->share('page_home_items', $page_home_items);
    }
}
