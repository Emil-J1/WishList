<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wish extends Model
{
    use HasFactory;

    public function wishList():BelongsTo {
        return $this->belongsTo(WishList::class);
    }

    protected $guarded = [];
}


