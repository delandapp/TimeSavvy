<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class jadwal extends Model
{
    use HasFactory;

    public function user(): BelongsToMany
    {
            return $this->belongsToMany(user::class, 'jadwal_users', 'id_jadwal', 'id_user');
    }
}
