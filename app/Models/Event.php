<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;



    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }

    protected $fillable=[
        'title',
        'description',
        'adress',
        'state',
        'image_path',
        'user_id', 
    ];
    protected $hidden=[
       
        'updated_at'
    ];
}
