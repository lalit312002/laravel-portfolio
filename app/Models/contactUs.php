<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    use HasFactory;

    public $table='contactUs';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'message',
    ];

}
