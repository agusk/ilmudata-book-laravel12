<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use app\Models\User;
class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'website'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
