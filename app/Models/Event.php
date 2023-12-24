<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'allow_registration' => 'boolean',
        'allow_registration_from_external_students' => 'boolean'
    ];

    public function venues(): HasMany
    {
        return $this->hasMany(Venue::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}
