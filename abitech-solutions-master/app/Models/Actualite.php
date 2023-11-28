<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Actualite extends Model

{

    use HasFactory;



    protected $fillable = [

        'nom',

        'description',

        'photo1',

        'photo2',

        'photo3',

        'photo4',

        'photo5',
        'active',

    ];
}
