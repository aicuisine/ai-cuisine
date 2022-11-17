<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DialogSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id'
    ];

    public function dialogRequests()
    {
        return $this->hasMany(DialogRequest::class);
    }
}
