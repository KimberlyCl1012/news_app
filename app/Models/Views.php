<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Views extends Model
{
    use HasFactory;

    protected $table = "views";

    protected $fillable = [
        'id_user',
        'id_new',
        'pending'
    ];

}
