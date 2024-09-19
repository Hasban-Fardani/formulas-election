<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('start_time', '<=', now())->where('end_time', '>=', now());
    }

    public function scopeIsActive()
    {
        return $this->start_time <= now() && $this->end_time >= now();
    }

    public function scopeHasCandidate()
    {
        return $this->candidates()->count() > 0;
    }
}
