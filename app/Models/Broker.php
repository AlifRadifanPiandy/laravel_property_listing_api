<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'zip_code',
        'phone_number',
        'logo_path',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'broker_id', 'id');
    }
}
