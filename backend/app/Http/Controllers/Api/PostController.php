<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\DictionaryCreatureDiscription;
use App\Models\Creature;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function show($id) {
        $creatures = Creature::select('creatures.id', 'creatures.image_path', 'tags.tag_name', 'creatures.found_place', 'votings.opponent_tag_id', 'votings.opponent_num', 'votings.num', 'votings.expiration_date', 'creatures.bookmark')
                        ->leftJoin('tags', 'creatures.tag_id', '=', 'tags.id')
                        ->leftJoin('votings', 'creatures.voting_id', '=', 'votings.id')
                        ->where('creatures.user_id', '=', $id)
                        ->get();
        
        return PostResource::collection($creatures);
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

        $path = $request->file('image')->store('public');
        $file_name = basename($path);
        $url = Storage::url($file_name);

        $creature->image_path = $url;
        $creature->category_id = (int) $request->category_id;
        $creature->found_place = $request->found_place;
        $creature->detail = $request->detail;
        $creature->user_id = Auth::id();
        $creature->save();

        $discription->dictionary_id = (int) $request->dictionary_id;
        $discription->creature_id = $creature->id;
        $discription->save();

        return redirect('api/post/' . $creature->user_id);
    }
}
