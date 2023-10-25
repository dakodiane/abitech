<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowVideo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'show_videos';
    protected $fillable = [
        'id',
        'name',
        'description',
        'video',
        'active',
        'view',
        'created_at',
        'updated_at'
    ];
}
