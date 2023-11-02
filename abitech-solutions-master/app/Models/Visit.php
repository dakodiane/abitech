<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;


    protected $fillable = [
        'ip',
        'agent',
        'meta_data',
    ];




    static function registerNewVisit(): void
    {

        $last_visit = Visit::query()->where('ip', request()->ip())->where('created_at', '>', now()->subMinutes(10))->first();
        if($last_visit) return;
        $visit = new Visit();
        $visit['ip'] = request()->ip();
        $visit['agent'] = request()->userAgent();
        $visit['meta_data'] = json_encode(request()->all());
        $visit->save();
    }
}
