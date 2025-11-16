<?php

namespace App\Features\Entry\Models\Traits;

use App\Features\Entry\Enums\EntryMoodEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

trait EntryFormSchemaTrait
{
    public static function getForm(): array
    {
        return [
            Section::make('📝 Entry Details')
                ->columnSpanFull()
                ->description('Create your diary entry with a meaningful title, date, and mood')
                ->icon('heroicon-o-document-text')
                ->schema([
                    // Title and Date Row
                    Grid::make([
                        'default' => 1,
                        'md' => 3,
                    ])
                        ->schema([
                            DatePicker::make('entry_date')
                                ->label('When did this happen?')
                                ->default(now())
                                ->required()
                                ->native(false)
                                ->displayFormat('M j, Y')
                                ->helperText('Capture the moment ⏰')
                                ->prefixIcon('heroicon-m-calendar-days')
                                ->columnSpan([
                                    'default' => 1,
                                    'md' => 1,
                                ]),

                            Group::make([
                                TextInput::make('title')
                                    ->label('What\'s on your mind?')
                                    ->placeholder('Give your entry a catchy title...')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (?string $state, Set $set): mixed => $set('slug', Str::slug($state ?? '')))
                                    ->helperText('This will be the headline of your memory 📖')
                                    ->prefixIcon('heroicon-m-pencil-square')
                                    ->extraAttributes([
                                        'class' => 'font-medium',
                                    ]),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(),
                            ])
                                ->columns(2)
                                ->columnSpanFull()
                        ]),

                    // Mood Selection
                    Grid::make(1)
                        ->schema([
                            Select::make('mood')
                                ->label('How are you feeling right now?')
                                ->options(EntryMoodEnum::class)
                                ->placeholder('Choose the emotion that best describes you...')
                                ->helperText('Track your emotional journey - this helps you understand patterns over time 💭')
                                ->prefixIcon('heroicon-m-heart')
                                ->searchable()
                                ->allowHtml()
                                ->native(false)
                                ->extraAttributes([
                                    'class' => 'mood-selector',
                                ]),
                        ]),
                ])
                ->collapsible()
                ->persistCollapsed()
                ->compact()
                ->extraAttributes([
                    'class' => 'bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-950 dark:to-primary-900 border border-primary-200 dark:border-primary-800',
                ]),

            Section::make('✍️ Your Story')
                ->description('Pour your heart out - write about your day, thoughts, dreams, and experiences')
                ->icon('heroicon-o-book-open')
                ->schema([
                    // Writing Tip
                    TextEntry::make('writing_tip')
                        ->label('')
                        ->state('💡 **Writing Tip**: Don\'t worry about perfect grammar or structure. This is your personal space to express yourself freely. Let your thoughts flow naturally!')
                        ->extraAttributes([
                            'class' => 'bg-blue-50 dark:bg-blue-950 border border-blue-200 dark:border-blue-800 rounded-lg p-4 mb-4',
                        ]),

                    // Rich Editor for Content
                    RichEditor::make('content')
                        ->label('Your Entry')
                        ->placeholder('Dear diary, today was...')
                        ->json()
                        ->required()
                        ->columnSpanFull()
                        ->helperText('Use the formatting tools to make your entry more expressive. Add links, quotes, lists, and more! ✨')
                        ->extraAttributes([
                            'class' => 'prose-style-entry',
                            'style' => 'min-height: 24rem;',
                        ])
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                            ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                            ['undo', 'redo'],
                        ]),
                ])
                ->collapsible()
                ->persistCollapsed()
                ->compact(false)
                ->columnSpanFull()
                ->extraAttributes([
                    'class' => 'mt-6',
                ]),
        ];
    }
}