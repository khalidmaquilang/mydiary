<?php

namespace App\Filament\Admin\Resources\Entries;

use App\Features\Entry\Models\Scopes\EntryScope;
use App\Filament\Admin\Resources\Entries\Pages\CreateEntry;
use App\Filament\Admin\Resources\Entries\Pages\EditEntry;
use App\Filament\Admin\Resources\Entries\Pages\ListEntries;
use App\Filament\Admin\Resources\Entries\Pages\ViewEntry;
use App\Filament\Admin\Resources\Entries\Schemas\EntryForm;
use App\Filament\Admin\Resources\Entries\Tables\EntriesTable;
use App\Filament\Resources\Entries\Schemas\EntryInfolist;
use App\Models\Entry;
use BackedEnum;
use CodeWithDennis\FilamentLucideIcons\Enums\LucideIcon;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntryResource extends Resource
{
    protected static ?string $model = Entry::class;

    protected static string|BackedEnum|null $navigationIcon = LucideIcon::BookHeart;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return EntryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EntryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EntriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEntries::route('/'),
            'create' => CreateEntry::route('/create'),
            'edit' => EditEntry::route('/{record}/edit'),
            'view' => ViewEntry::route('/{record}'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
