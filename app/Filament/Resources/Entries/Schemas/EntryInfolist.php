<?php

namespace App\Filament\Resources\Entries\Schemas;

use App\Models\Entry;
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
            ->components([
                Grid::make()
                    ->columns(4)
                    ->columnSpanFull()
                    ->schema([
                        Grid::make()
                            ->columnSpan(3)
                            ->schema([
                                Section::make('✍️ Your Story')
                                    ->description('The memory captured in this entry - your thoughts, dreams, and experiences')
                                    ->icon('heroicon-o-book-open')
                                    ->schema([
                                        TextEntry::make('content')
                                            ->label('Your Entry')
                                            ->state(function (Entry $record): HtmlString {
                                                $content = RichContentRenderer::make($record->content)->toHtml();

                                                return new HtmlString(
                                                    '<div class="prose prose-lg prose-gray dark:prose-invert max-w-none prose-headings:text-primary-600 dark:prose-headings:text-primary-400 prose-p:leading-relaxed prose-blockquote:border-primary-200 dark:prose-blockquote:border-primary-800 prose-blockquote:bg-primary-50 dark:prose-blockquote:bg-primary-950 prose-blockquote:p-4 prose-blockquote:rounded-lg prose-style-entry">' .
                                                    $content .
                                                    '</div>'
                                                );
                                            })
                                            ->columnSpanFull()
                                            ->extraAttributes([
                                                'style' => 'min-height: 8rem;',
                                            ]),

                                        // Word count and reading time
                                        TextEntry::make('reading_stats')
                                            ->label('Reading Statistics')
                                            ->state(function (Entry $record): string {
                                                $content = strip_tags(RichContentRenderer::make($record->content)->toHtml());
                                                $wordCount = str_word_count($content);
                                                $readingTime = max(1, ceil($wordCount / 200)); // Average reading speed: 200 words/minute

                                                return "📊 {$wordCount} words • ⏱️ {$readingTime} min read";
                                            })
                                            ->color('gray')
                                            ->size(TextSize::Small)
                                            ->icon('heroicon-o-information-circle')
                                            ->columnSpanFull()
                                            ->helperText('Statistics about your entry ✨')
                                            ->extraAttributes([
                                                'class' => 'mt-4 pt-4 border-t border-gray-200 dark:border-gray-700',
                                            ]),
                                    ])
                                    ->collapsible()
                                    ->persistCollapsed()
                                    ->compact(false)
                                    ->columnSpanFull()
                                    ->extraAttributes([
                                        'class' => 'mt-6 entry-content-section',
                                    ]),
                            ]),
                        Grid::make()
                            ->schema([
                                // Entry Title Section
                                Section::make('📝 Entry Details')
                                    ->description('Your diary entry information')
                                    ->icon('heroicon-o-document-text')
                                    ->schema([
                                        TextEntry::make('title')
                                            ->label('Title')
                                            ->size(TextSize::Large)
                                            ->weight(FontWeight::Bold)
                                            ->color('primary')
                                            ->icon('heroicon-m-pencil-square')
                                            ->copyable()
                                            ->copyMessage('Title copied to clipboard! 📋')
                                            ->columnSpanFull()
                                            ->extraAttributes([
                                                'class' => 'font-medium',
                                            ]),
                                    ])
                                    ->columnSpanFull()
                                    ->compact()
                                    ->extraAttributes([
                                        'class' => 'bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-950 dark:to-primary-900 border border-primary-200 dark:border-primary-800',
                                    ]),
                                Section::make('📅 Timeline')
                                    ->description('When this memory was captured')
                                    ->icon('heroicon-o-calendar-days')
                                    ->schema([
                                        TextEntry::make('entry_date')
                                            ->label('Entry Date')
                                            ->dateTime('l, M j, Y \a\t g:i A')
                                            ->badge()
                                            ->color('primary')
                                            ->icon('heroicon-m-calendar-days')
                                            ->size(TextSize::Medium)
                                            ->weight(FontWeight::Medium)
                                            ->placeholder('Date not set')
                                            ->helperText('When this moment happened ⏰'),

                                        TextEntry::make('created_at')
                                            ->label('Written')
                                            ->since()
                                            ->dateTooltip()
                                            ->icon('heroicon-o-pencil')
                                            ->color('gray')
                                            ->size(TextSize::Small),

                                        TextEntry::make('updated_at')
                                            ->label('Last Modified')
                                            ->since()
                                            ->dateTooltip()
                                            ->icon('heroicon-o-arrow-path')
                                            ->color('gray')
                                            ->size(TextSize::Small)
                                            ->visible(fn (Entry $record): bool => $record->created_at->ne($record->updated_at)),
                                    ])
                                    ->compact()
                                    ->columnSpanFull(),

                                Section::make('💭 Emotional State')
                                    ->description('How you were feeling')
                                    ->icon('heroicon-o-heart')
                                    ->schema([
                                        TextEntry::make('mood')
                                            ->label('Mood')
                                            ->badge()
                                            ->size(TextSize::Large)
                                            ->weight(FontWeight::Medium)
                                            ->placeholder('🤔 No mood recorded')
                                            ->helperText('Your emotional state 💭')
                                            ->columnSpanFull(),
                                    ])
                                    ->compact()
                                    ->columnSpanFull()
                                    ->extraAttributes([
                                        'class' => 'text-center',
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
