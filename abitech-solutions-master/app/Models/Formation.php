<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        'name',
        'description',
        'category_id',
        'additional_information',
        'price',
        'image',
        'video',
        'document'
    ];



    //with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
