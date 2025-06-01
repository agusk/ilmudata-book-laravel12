<?php

namespace App\Models;
use MongoDB\Laravel\Eloquent\Model;

class Blog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'blogs';

    protected $fillable = ['title', 'content', 'comments'];

    protected $casts = [
        'comments' => 'array'
    ];
}