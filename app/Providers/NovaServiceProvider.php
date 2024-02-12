<?php

namespace App\Providers;

use App\Models\Article;
use App\Nova\Dashboards\Main;
use App\Observers\ArticleObserver;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Laravel\Nova\Observable;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        $this->registerObservers();
    }

    protected function routes(): void
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    protected function dashboards(): array
    {
        return [
            new Main,
        ];
    }

    protected function registerObservers(): void
    {
        Observable::make(Article::class, ArticleObserver::class);
    }
}
