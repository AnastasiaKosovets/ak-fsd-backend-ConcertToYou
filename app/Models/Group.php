<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    // user_id');
    //         $table->foreign('user_id')->references('id')->on('roles');
    //         $table->string('groupName');
    //         $table->string('description');
    //         $table->integer('musicsNumber');

    protected $fillable = [
        'user_id',
        'groupName',
        'groupName',
        'description',
        'musicsNumber'
    ];
    protected $casts = [
        'date' => 'datetime'
    ];

    protected $table = 'groups';
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

