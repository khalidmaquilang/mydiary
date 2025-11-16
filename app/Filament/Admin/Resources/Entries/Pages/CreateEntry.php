<?php

namespace App\Filament\Admin\Resources\Entries\Pages;

use App\Filament\Admin\Resources\Entries\EntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEntry extends CreateRecord
{
    protected static string $resource = EntryResource::class;
}
