<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
    
    protected static function boot()
    {
        parent::boot();
        
        // ensure that user can only vote once in an election
        static::created(function (Vote $vote) {
            $vote->load('user', 'election');
            if ($vote->user->canVote($vote->election)) {
                $vote->delete() && abort(403, 'Anda sudah memilih');
            }
        });
    }
}
