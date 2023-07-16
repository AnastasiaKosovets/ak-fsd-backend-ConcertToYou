<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'image',
        'title',
        'date',
        'groupName',
        'description'
    ];
    protected $casts = [
        'date' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
}
