<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'creature_id' => $this->id,
            'tag_name' => $this->tag_name,
            'image_path' => $this->image_path,
            'tag_id' => $this->tag_id,
            'found_place' => $this->found_place,
            'detail' => $this->detail,
            'category_id' => $this->category_id,
            'bookmark' => $this->bookmark,
            'user_id' => $this->user_id,
            'hold_voting' => [
                'voting_id' => $this->voting_id,
                'opponent_tag_id' => $this->opponent_tag_id,
                'opponent_num' => $this->opponent_num,
                'num' => $this->num,
                'expiration_date' => $this->expiration_date,
            ],
            'old_votings' => OldVotingResource::collection($this->old_votings)
        ];
    }
}
