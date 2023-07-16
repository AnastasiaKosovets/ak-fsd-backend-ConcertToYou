<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'groupName',
        'genre',
        'description',
        'musicsNumber',

    ];
    
    protected $casts = [
        'date' => 'datetime'
    ];

    public $timestamps = false;
    
    protected $table = 'groups';
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

