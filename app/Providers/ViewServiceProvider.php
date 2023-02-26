<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\User;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {

            $theme_css_url = 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css'; // ノーマルのCSS

            if (auth()->check()) {

                $user = auth()->user();
                $theme = $user->theme;

                if ($theme === User::THEME_DARK) { // ダークモードの場合

                    $theme_css_url = 'https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.2/dist/css/bootstrap-night.min.css'; // Bootstrap-Night の CDN

                }
            }

            $view->with('theme_css_url', $theme_css_url);
        });
    }
}
