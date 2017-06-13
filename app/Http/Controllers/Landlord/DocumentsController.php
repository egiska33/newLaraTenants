<?php

namespace App\Http\Controllers\Landlord;

use App\Document;
use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller {

    public function index($id)
    {

        $documents = Document::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.documents.index', compact('documents', 'house'));
    }

    public function all(){
        $user = Auth::user();
        if ($user->isLandlord()){
            $house = House::where('landlord_id', $user->id)->pluck('id');
            $documents = Document::whereIn('house_id', $house)->get();

            return view('landlord.documents.all', compact('documents'));
        }
    }

    public function show($id, $document_id){
        $document = Document::findOrFail($document_id);
        $house = House::findOrFail($id);
        return view('landlord.documents.show', compact('document', 'house'));
    }
}
