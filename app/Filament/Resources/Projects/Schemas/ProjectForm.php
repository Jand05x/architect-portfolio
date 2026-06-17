<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('category'),
                TextInput::make('location'),
                TextInput::make('year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(2030),

                Textarea::make('description')
                    ->rows(5)
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->default(true),

                SpatieMediaLibraryFileUpload::make('cover')
                    ->image()
                    ->required()
                    ->collection('cover')
                    ->disk('public')
                    ->maxSize(5120),

                SpatieMediaLibraryFileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->collection('gallery')
                    ->disk('public')
                    ->maxSize(5120)
                    ->maxFiles(20),
            ]);
    }
}
