<?php

namespace App\Filament\Pages;

use CodeWithDennis\FilamentLucideIcons\Enums\LucideIcon;
use Filament\Pages\Page;
use BackedEnum;

class Support extends Page
{
    protected static string|BackedEnum|null $navigationIcon = LucideIcon::Heart;

    protected string $view = 'filament.pages.support';
}
