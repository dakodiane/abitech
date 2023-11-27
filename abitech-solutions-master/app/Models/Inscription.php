<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'prenom',
        'profession',
        'email',
        'telephone',
        'projet',
        'montant',
    ];
}
