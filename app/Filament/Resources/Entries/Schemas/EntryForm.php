<?php

namespace App\Filament\Resources\Entries\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn (string $state, Set $set): mixed => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique()
                    ->alphaDash(),
                RichEditor::make('content')
                    ->json()
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
