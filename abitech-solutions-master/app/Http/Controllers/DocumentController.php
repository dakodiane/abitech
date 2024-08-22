<?php
namespace App\Http\Controllers;
use App\Http\Requests\ListRequest;
use App\Http\Requests\SearchdocumentRequest;
use App\Http\Requests\StoredocumentRequest;
use App\Http\Requests\UpdatedocumentRequest;
use App\Models\Document;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\NoReturn;

class DocumentController extends Controller

{

    const DOCUMENTS_FILES_DIRECTORY = "document";



    /**

     * Display a listing of the resource.

     */


    public function index()
    {
        $documents = Document::where('active', 1)->get(); 
    
    
        return view('landing-page/documents/view', ['documents' => $documents]);
    }
    
    public function list(ListRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $documents = Document::query()
            ->latest()
            ->where('name', 'like', '%' . ($request->query('search') ?? '') . '%')
            ->paginate(
                perPage: env('PAGINATOR_PER_PAGE'),
                page: $request['page'] ?? 1
            );
        return view('documents/index', compact('documents'));
    }


    function view(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $document = Document::query()->findOrFail($id);
        $document['visited'] = $document['visited'] + 1;
        $document->save();
        return view('landing-page/documents/view', compact('document'));

    }


    function details(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $document = Document::query()->findOrFail($id);
        return view('documents/view', compact('document'));

    }



    public function search(SearchDocumentRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {
        $documents=  document::query()
            ->where('name', 'like', '%'.($request->query('search') ?? '').'%')
        

            ->where('active', true)

            ->paginate(

                perPage: env('PAGINATOR_PER_PAGE'),

                page: $request['page'] ?? 1

            );


        return view('landing-page/documents/search', compact('documents'));

    }



    /**

     * Show the form for creating a new resource.

     */

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {
        $document = null;
        return view('documents/edit', compact( 'document'));

    }



    /**

     * Store a newly created resource in storage.

     */

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'document' => 'required|mimes:doc,docx,pdf,xls,xlsx|max:2048',
         ]);
 
         $fileName = time().'.'.$request->document->extension();  
         $request->document->move(public_path('uploads'), $fileName);
 
         Document::create([
             'name' => $request->name,
             'document' => $fileName,
         ]);
 
         return back()
             ->with('success', 'You have successfully uploaded the file.')
             ->with('document', $fileName);
     }





    public function toggleStatus(string $id): RedirectResponse

    {

        $document = document::query()->findOrFail($id);

        $document->active = !$document->active;

        $document->save();

        if($document->active)

            connectify('success', 'Succès', 'Catégorie activée avec succès');

        else

            connectify('success', 'Succès', 'Catégorie désactivée avec succès');

        return back()->with('success', 'Category activated successfully.');

    }



    /**

     * Show the form for editing the specified resource.

     */

    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application

    {

        $document = document::query()->findOrFail($id);


        return view('documents/edit', compact('document'));

    }



    /**

     * Update the specified resource in storage.

     */

 
     public function update(Request $request, Document $document)
     {
         $request->validate([
             'name' => 'required|string|max:255',
            
             'document' => 'nullable|file|mimes:doc,docx,pdf,xls,xlsx|max:2048',   
         ]);
     
         $photoPath = null;
     
         if ($request->file('document')) {
             if ($document->document) {
                 Storage::disk('public')->delete($document->document);
             }
             $photoPath = $request->file('document')->store('uploads', 'public');
         }
     
         $document->name = $request->input('name');
        
         $document->document = $photoPath ?? $document->document;
     
         $document->save();
     
         return redirect(route('documents'))->with('success', 'Document mise à jour avec succès.');
     }
     
     
     

}

