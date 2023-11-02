<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, HasUuids;

 protected $table = 'contacts';
    protected $fillable =[
        'id',
        'name',
        'email',
        'object',
        'message',
        'created_at',
        'updated_at'
    ];
}
