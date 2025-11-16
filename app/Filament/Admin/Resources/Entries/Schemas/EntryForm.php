<?php

namespace App\Filament\Admin\Resources\Entries\Schemas;

use App\Features\Entry\Enums\EntryMoodEnum;
use App\Models\Entry;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(Entry::getForm());
    }
}
