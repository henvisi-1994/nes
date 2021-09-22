<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    const UPDATED_AT = null;  // table does not have an 'updated_at' column

    protected $fillable = ['message', 'isread', 'user_id_to', 'user_id_from'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
