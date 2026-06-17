<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')
                    ->collection('cover')
                    ->label('Cover')
                    ->width(80)
                    ->height(60),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('location')
                    ->searchable(),
                TextColumn::make('year'),
                ToggleColumn::make('is_published'),
                TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
