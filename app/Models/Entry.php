<?php

namespace App\Models;

use App\Features\Entry\Enums\EntryMoodEnum;
use App\Features\Entry\Models\Scopes\EntryScope;
use App\Features\Entry\Models\Traits\EntryFormSchemaTrait;
use App\Features\Entry\Models\Traits\EntryInfolistSchemaTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use EntryFormSchemaTrait;
    use EntryInfolistSchemaTrait;
    use HasFactory;
    use SoftDeletes;

    public static function booted(): void
    {
        static::addGlobalScope(new EntryScope());

        static::creating(function (Entry $entry) {
            $user = auth()->user();
            abort_if($user === null, 404);

            $entry->user_id = $user->id;
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'user_id' => 'integer',
            'content' => 'array',
            'entry_date' => 'datetime',
            'mood' => EntryMoodEnum::class
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
