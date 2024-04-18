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
        'youtube_url',
        'active',
        'view',
        'created_at',
        'updated_at'
    ];

    public static function uploadShowVideoFile($videoId, $file)
{
    // Logique de téléchargement de la vidéo et obtention du chemin
    $path = $file->store('videos', 'public');

    return $path;
}

}
