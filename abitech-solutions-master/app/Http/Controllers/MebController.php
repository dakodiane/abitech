<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\StoreShowVideoRequest;
use App\Http\Requests\UpdateMebRequest;
use App\Http\Requests\UpdateShowVideoRequest;
use App\Models\Category;
use App\Models\Formation;
use App\Models\Meb;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class MebController extends Controller
{

    const VIDEOS_FILES_DIRECTORY = "videos";

    /**
     * Display a listing of the resource.
     */
    public function list(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $videos = Meb::query()
            ->latest()
            ->where('name', 'like', '%' . ($request->query('search') ?? '') . '%')
            ->paginate(
                perPage: env('PAGINATOR_PER_PAGE'),
                page: $request['page'] ?? 1
            );
        return view('mebs/index', compact('videos'));
    }

    public function search(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $videos = Meb::query()
            ->latest()
            ->where('name', 'like', '%' . ($request->query('search') ?? '') . '%')
            ->where('active', true)
            ->paginate(
                perPage: env('PAGINATOR_PER_PAGE'),
                page: $request['page'] ?? 1
            );
        return view('landing-page/mebs/search', compact('videos'));
    }


    public function store(StoreShowVideoRequest $request): RedirectResponse
    {
        $video = new Meb();
        $video->id = Str::uuid();
        $video->fill($request->except('id', 'video'));

        // Récupérer l'ID de la vidéo YouTube en utilisant l'API YouTube Data v3
        $youtubeVideoId = $this->getYoutubeVideoId($request->input('youtube_url'));
        $video->youtube_url = $youtubeVideoId;

        $video->save();
        connectify('success', 'Video', 'Vidéo ajoutée avec succès');
        return back()->with('success', 'Video created successfully.');
    }

    private function getYoutubeVideoId($youtubeUrl)
    {
        // Extraire l'ID de la vidéo YouTube à partir de l'URL en utilisant l'API YouTube Data v3

        // Obtenir la partie "v" de l'URL (ID de la vidéo)
        parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $params);

        return $params['v'] ?? null;
    }

    /**
     * Display the specified resource.
     */
    public function show(Meb $meb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meb $meb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMebRequest $request): RedirectResponse
    {
        $video = Meb::query()->findOrFail($request->input('id'));
        $video->fill($request->except('id', 'video'));
        if ($request->file('video') !== null) {
            $video['video'] = self::uploadShowVideoFile($video['id'], $request->file('video'));
        }
        $video->save();
        connectify('success', 'Video', 'Vidéo modifiée avec succès');
        return back()->with('success', 'Video updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meb $meb)
    {
        //
    }

    public static function uploadShowVideoFile(string $uid, $file, ?string $name = null): string
    {
        return $file->storeAs(
            self::VIDEOS_FILES_DIRECTORY . "/" . $uid,
            $uid . "." . ($name ?? 'video') . '.' . $file->getClientOriginalExtension(),
            ['disk' => 'default']
        );
    }

    public function toggleStatus(string $id): RedirectResponse
    {
        $category = Meb::query()->findOrFail($id);
        $category->active = !$category->active;
        $category->save();
        if ($category->active)
            connectify('success', 'Succès', 'Vidéo activée avec succès');
        else
            connectify('success', 'Succès', 'Vidéo désactivée avec succès');
        return back()->with('success', 'Category activated successfully.');
    }
}
