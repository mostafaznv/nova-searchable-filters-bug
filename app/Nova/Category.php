<?php

namespace App\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;


class Category extends Resource
{
    public static string $model = \App\Models\Category::class;

    public static $title  = 'title';
    public static $search = [
        'title',
    ];


    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->rules('required', 'max:255'),

            HasMany::make('Articles', 'articles', Article::class)
        ];
    }
}
