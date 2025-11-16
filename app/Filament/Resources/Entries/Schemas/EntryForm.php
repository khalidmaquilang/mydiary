<?php

namespace App\Filament\Resources\Entries\Schemas;

use App\Features\Entry\Enums\EntryMoodEnum;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EntryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('📝 Entry Details')
                    ->description('Create your diary entry with a meaningful title, date, and mood')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('title')
                                    ->label('What\'s on your mind?')
                                    ->placeholder('Give your entry a catchy title...')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (?string $state, Set $set): mixed => $set('slug', Str::slug($state ?? '')))
                                    ->helperText('This will be the headline of your memory')
                                    ->prefixIcon('heroicon-m-pencil-square')
                                    ->columnSpan(2),
                                
                                Hidden::make('slug')
                                    ->required()
                                    ->unique(),

                                DateTimePicker::make('entry_date')
                                    ->label('When did this happen?')
                                    ->default(now())
                                    ->required()
                                    ->seconds(false)
                                    ->native(false)
                                    ->displayFormat('M j, Y \a\t g:i A')
                                    ->helperText('Capture the moment')
                                    ->prefixIcon('heroicon-m-calendar-days')
                                    ->columnSpan(1),
                            ]),

                        Grid::make(1)
                            ->schema([
                                Select::make('mood')
                                    ->label('How are you feeling right now?')
                                    ->options(EntryMoodEnum::class)
                                    ->placeholder('Choose the emotion that best describes you...')
                                    ->helperText('Track your emotional journey - this helps you understand patterns over time')
                                    ->prefixIcon('heroicon-m-heart')
                                    ->searchable()
                                    ->allowHtml(),
                            ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed()
                    ->compact(),

                Section::make('✍️ Your Story')
                    ->description('Pour your heart out - write about your day, thoughts, dreams, and experiences')
                    ->icon('heroicon-o-book-open')
                    ->schema([
                        TextEntry::make('writing_tip')
                            ->label('')
                            ->state('💡 **Writing Tip**: Don\'t worry about perfect grammar or structure. This is your personal space to express yourself freely.')
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('')
                            ->placeholder('Dear diary, today was...')
                            ->json()
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Use the formatting tools to make your entry more expressive. Add links, quotes, lists, and more!')
                            ->extraAttributes([
                                'class' => 'prose-style-entry',
                                'style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'
                            ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed()
                    ->compact(false)
                    ->columnSpanFull(),
            ]);
    }
}
