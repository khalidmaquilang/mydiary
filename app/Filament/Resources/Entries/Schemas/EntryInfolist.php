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
                Split::make([
                    Grid::make(1)
                        ->schema([
                            Section::make()
                                ->schema([
                                    TextEntry::make('title')
                                        ->label('')
                                        ->size(TextSize::Large)
                                        ->weight(FontWeight::Bold)
                                        ->color('primary')
                                        ->icon('heroicon-m-document-text')
                                        ->copyable()
                                        ->copyMessage('Title copied to clipboard')
                                        ->columnSpanFull(),
                                ])
                                ->compact()
                                ->headerActions([])
                                ->extraAttributes([
                                    'class' => 'entry-title-section',
                                ]),
                        ]),

                    Grid::make(2)
                        ->schema([
                            Section::make('📅 Timeline')
                                ->schema([
                                    TextEntry::make('entry_date')
                                        ->label('Entry Date')
                                        ->dateTime('l, M j, Y \a\t g:i A')
                                        ->badge()
                                        ->color('primary')
                                        ->icon('heroicon-o-calendar-days')
                                        ->size(TextSize::Medium)
                                        ->weight(FontWeight::Medium)
                                        ->placeholder('Date not set'),

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
                                ->icon('heroicon-o-clock')
                                ->compact(),

                            Section::make('💭 Emotional State')
                                ->schema([
                                    TextEntry::make('mood')
                                        ->label('Feeling')
                                        ->badge()
                                        ->size(TextSize::Large)
                                        ->badge()
                                        ->placeholder('🤔 No mood recorded')
                                        ->columnSpanFull(),
                                ])
                                ->icon('heroicon-o-heart')
                                ->compact(),
                        ]),
                ])
                ->from('lg'),

                Section::make('📖 Your Story')
                    ->description('The memory captured in this entry')
                    ->icon('heroicon-o-book-open')
                    ->schema([
                        TextEntry::make('content')
                            ->label('')
                            ->state(function (Entry $record): HtmlString {
                                $content = RichContentRenderer::make($record->content)->toHtml();
                                
                                return new HtmlString(
                                    '<div class="prose prose-lg prose-gray dark:prose-invert max-w-none prose-headings:text-primary-600 dark:prose-headings:text-primary-400 prose-p:leading-relaxed prose-blockquote:border-primary-200 dark:prose-blockquote:border-primary-800 prose-blockquote:bg-primary-50 dark:prose-blockquote:bg-primary-950 prose-blockquote:p-4 prose-blockquote:rounded-lg">' . 
                                    $content . 
                                    '</div>'
                                );
                            })
                            ->columnSpanFull(),

                        // Word count and reading time
                        TextEntry::make('content')
                            ->label('')
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
                            ->extraAttributes([
                                'class' => 'mt-4 pt-4 border-t border-gray-200 dark:border-gray-700',
                            ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed()
                    ->compact(false)
                    ->extraAttributes([
                        'class' => 'entry-content-section',
                    ]),
            ]);
    }
}
