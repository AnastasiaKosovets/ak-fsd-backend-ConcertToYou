<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concert extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'image',
        'title',
        'date',
        'groupName',
        'description',
        'programm',
    ];
    protected $casts = [
        'date' => 'datetime'
    ];

    public $timestamps = false;
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
}
