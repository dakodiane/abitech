<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSent extends Model
{
    protected $fillable = ['id', 'message', 'subject'];

    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
