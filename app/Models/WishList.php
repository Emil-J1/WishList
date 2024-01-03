<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Wish;


class WishList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function wishes():HasMany {

        return $this->hasMany(Wish::class);
    }

    public function user():BelongsTo {

        return $this->belongsTo(User::class);
    }
}




