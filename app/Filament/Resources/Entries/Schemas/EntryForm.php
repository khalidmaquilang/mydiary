<?php

namespace App\Filament\Resources\Entries\Schemas;

use App\Features\Entry\Enums\EntryMoodEnum;
use App\Models\Entry;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(Entry::getForm());
    }
}
