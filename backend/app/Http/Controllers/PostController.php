<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DictionaryCreatureDiscription;
use App\Models\Creature;
use App\Models\Tag;

class PostController extends Controller
{
    public function show($id) {
        $creatures = Creature::join('tags', 'creatures.tag_id', '=', 'tags.id')
                        ->join('votings', 'creatures.voting_id', '=', 'votings.id')
                        ->select('creatures.id', 'creatures.image_path', 'tags.tag_name', 'creatures.found_place', 'votings.*', 'creatures.bookmark')
                        ->where('user_id', $id)
                        ->get();
        
        return $creatures;
    }

    public function store(Request $request) {
        $creature = new Creature;
        $discription = new DictionaryCreatureDiscription;
        
        if(!$request->input('unknown_name')) {
            $fined_tag = Tag::where('tag_name', $request->input('tag_name'))->get();
            if(isset($fined_tag)) {
                $tag = new Tag;
                $tag->tag_name = $request->tag_name;
                $tag->save();

                $creature->tag_id = $tag->id;
            } else {
                $creature->tag_id = $fined_tag->id;
            }
        }
        $creature->category_id = $request->category_id;
        $creature->found_place = $request->found_place;
        $creature->detail = $request->detail;
        $creature->user_id = Auth::id();
        $creature->save();

        $discription->dictionary_id = $request->dictionary_id;
        $discription->creature_id = $creature->id;
        $discription->save();

        return redirect('api/post/' . $creature->user_id);
    }
}
