<?php

namespace App\Filament\Admin\Resources\Entries\Schemas;

use App\Models\Entry;
use CodeWithDennis\FilamentLucideIcons\Enums\LucideIcon;
use Filament\Forms\Components\RichEditor\RichContentRenderer;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Schemas\Schema;
use Filament\Support\Enums\TextSize;
use Illuminate\Support\HtmlString;

class EntryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(Entry::getInfolist());
    }
}
