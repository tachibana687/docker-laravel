<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\VisualDictionary;
use App\Models\Creature;
use App\Http\Resources\DictionaryResource;
use App\Http\Resources\CreatureListResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DictionaryController extends Controller
{
    public function index() {
        $user = Auth::id();
        $dictionaries = VisualDictionary::where('user_id', $user)->get();
        return DictionaryResource::collection($dictionaries);
    }

    public function show($id)
    {
        $creatures = Creature::select('creatures.id', 'creatures.image_path', 'tags.tag_name')
                    ->rightJoin('dictionary_creature_discriptions', 'creatures.id', '=', 'dictionary_creature_discriptions.creature_id')
                    ->leftJoin('tags', 'creatures.tag_id', '=', 'tags.id')
                    ->where('dictionary_id', $id)
                    ->get();

        return CreatureListResource::collection($creatures);
    }

    public function store(Request $request) {
        $user = Auth::id();
        $dictionary = new VisualDictionary;
        
        $dictionary->user_id = $user;
        $dictionary->dictionary_name = $request->dictionary_name;
        $dictionary->save();

        return redirect('api/dictionary');
    }

    // public function update(Request $request, $id) {
    //     $dictionary = VisualDictionary::find($id);
    //     $dictionary->dictionary_name = $request->dictionary_name;
    //     $dictionary->save();
    //     return redirect('api/dictionary');
    // }

    // public function destroy($id) {
    //     $dictionary = VisualDictionary::find($id);
    //     $dictionary->delete();
    //     return redirect('api/dictionary');
    // }
}
