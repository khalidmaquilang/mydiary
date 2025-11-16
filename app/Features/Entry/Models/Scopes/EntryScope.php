<?php

namespace App\Features\Entry\Models\Scopes;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EntryScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $panel = Filament::getId();
        if ($panel === 'admin') {
            return;
        }

        $user_id = auth()->id();
        if ($user_id === null) {
            return;
        }

        $builder->where('user_id', $user_id);
    }
}
