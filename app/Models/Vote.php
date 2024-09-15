<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        
        // ensure that user can only vote once in an election
        static::created(function ($vote) {
            if ($vote->user->hasVoted($vote->election)) {
                $vote->delete() && abort(403, 'Anda sudah memilih');
            }
        });
    }
}
