<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Creature;

class CreatureController extends Controller
{
    public function show($id)
    {
        $creature = Creature::join('tags', 'creatures.tag_id', '=', 'tags.id')
                    ->join('categories', 'creatures.category_id', '=', 'categories.id')
                    ->join('votings', 'creatures.voting_id', '=', 'votings.id')
                    ->select('creatures.*', 'tags.tag_name', 'votings.*')
                    ->where('creatures.id', $id)
                    ->get();

        return $creature;
    }

    public function update(Request $request, $id)
    {
        $creature = Creature::find($id);
        $creature->detail = $request->detail;
        $creature->save();
        return redirect('api/creature/' . $id);
    }

    public function destroy($id)
    {
        $creature = Creature::find($id);
        $creature->delete();
        $user = Auth::id();
        return redirect('api/post/' . $user);
    }
}
