<?php

namespace App\Http\Controllers\Landlord;

use App\Document;
use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentsController extends Controller {

    public function index($id)
    {

        $documents = Document::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.documents.index', compact('documents', 'house'));
    }
}
