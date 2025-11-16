<?php

namespace App\Features\Entry\Enums;

use App\Features\Shared\Enums\Traits\EnumArrayTrait;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum EntryMoodEnum: string implements HasLabel, HasColor
{
    use EnumArrayTrait;

    case Amazing = 'amazing';
    case Happy = 'happy';
    case Excited = 'excited';
    case Grateful = 'grateful';
    case Peaceful = 'peaceful';
    case Good = 'good';
    case Okay = 'okay';
    case Anxious = 'anxious';
    case Sad = 'sad';
    case Angry = 'angry';

    public function getLabel(): string
    {
        return match ($this) {
            self::Amazing => '😄 Amazing - Life is wonderful!',
            self::Happy => '😊 Happy - Feeling good today',
            self::Excited => '🤩 Excited - Can\'t contain my energy!',
            self::Grateful => '🙏 Grateful - Thankful for everything',
            self::Peaceful => '😌 Peaceful - Calm and centered',
            self::Good => '🙂 Good - Things are going well',
            self::Okay => '😐 Okay - Just another day',
            self::Anxious => '😰 Anxious - Feeling a bit worried',
            self::Sad => '😢 Sad - Going through a tough time',
            self::Angry => '😠 Angry - Something\'s bothering me',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Amazing, self::Happy, self::Excited, self::Grateful => 'success',
            self::Peaceful, self::Good => 'info',
            self::Okay => 'gray',
            self::Anxious, self::Sad => 'warning',
            self::Angry => 'danger',
        };
    }
}
