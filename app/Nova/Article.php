<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;


class Article extends Resource
{
    public static string $model = \App\Models\Article::class;

    public static $title = 'title';


    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->rules('required', 'max:255'),

            Trix::make('Content')
                ->rules('required'),

            DateTime::make('Created At', 'created_at')
                ->exceptOnForms(),

            BelongsTo::make('Category', 'category', Category::class)
                ->filterable()
                ->searchable(),

            BelongsTo::make('Author', 'author', User::class)
                ->exceptOnForms()
                ->filterable()
                ->searchable()
        ];
    }
}
