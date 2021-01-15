<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Creature;
use App\Models\OldVoting;
use App\Http\Resources\CreatureResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CreatureController extends Controller
{
    public function show($id)
    {
        $creature = Creature::select('creatures.*', 'tags.tag_name', 'votings.opponent_tag_id', 'votings.opponent_num', 'votings.num', 'votings.expiration_date')
                    ->leftJoin('categories', 'creatures.category_id', '=', 'categories.id')
                    ->leftJoin('votings', 'creatures.voting_id', '=', 'votings.id')
                    ->leftJoin('tags', 'creatures.tag_id', '=', 'tags.id')
                    ->where('creatures.id', $id)
                    ->with('old_votings')
                    ->get();
        
        return CreatureResource::collection($creature);
    }

    // public function update(Request $request, $id)
    // {
    //     $creature = Creature::find($id);
    //     $creature->detail = $request->detail;
    //     $creature->save();
    //     return redirect('api/creature/' . $id);
    // }

    // public function destroy($id)
    // {
    //     $creature = Creature::find($id);
    //     $creature->delete();
    //     $user = Auth::id();
    //     return redirect('api/post/' . $user);
    // }
}
