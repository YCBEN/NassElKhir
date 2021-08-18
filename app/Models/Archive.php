<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_event',
        'title',
        'description',
        'adress',
        'state',
        'accepted'
    ];
    
}
