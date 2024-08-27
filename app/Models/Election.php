<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('start_time', '<=', now())->where('end_time', '>=', now());
    }
}
