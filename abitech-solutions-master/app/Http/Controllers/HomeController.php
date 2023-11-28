<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Formation;
use App\Models\Visit;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [
            'categories_count'=> Category::query()->count(),
            'categories_active_count'=> Category::query()->where('active', true)->count(),
            'categories_inactive_count'=> Category::query()->where('active', false)->count(),
            'formations_count'=> Formation::query()->count(),
            'formations_active_count'=> Formation::query()->where('active', true)->count(),
            'formations_inactive_count'=> Formation::query()->where('active', false)->count(),
            'visitors_count'=> Visit::query()->count(),
            'visitors_today_count'=> Visit::query()->where('created_at', '>', now()->subDay())->count(),
        ];
        $visitsHistory = Visit::query()->selectRaw('DATE(created_at) as date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->limit(7)
            ->get();
        //current week total visits
        $visitsHistoryTotal = Visit::query()->selectRaw('count(*) as total')
            ->where('created_at', '>', now()->subWeek())
            ->first();
        //old week total visits
        $visitsHistoryTotalOld = Visit::query()->selectRaw('count(*) as total')
            ->where('created_at', '>', now()->subWeeks(2))
            ->where('created_at', '<', now()->subWeek())
            ->first();
        $mostVisitedFormations = Formation::query()->select('name', 'visited' )
            ->where('active', true)
            ->orderBy('visited', 'desc')->limit(5)->get();
        return view('dashboard', compact('data', 'visitsHistory', 'visitsHistoryTotal', 'visitsHistoryTotalOld', 'mostVisitedFormations'));
    }
}
