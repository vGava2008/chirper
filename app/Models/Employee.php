<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'phone_number'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
