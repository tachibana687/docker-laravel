<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'image_path' => $this->image_path,
            'tag_name' => $this->tag_name,
            'found_place' => $this->found_place,
            'bookmark' => $this->bookmark,
            'hold_voting' => [
                'opponent_tag_id' => $this->opponent_tag_id,
                'opponent_num' => $this->opponent_num,
                'num' => $this->num,
                'expiration_date' => $this->expiration_date,
            ],
        ];
    }
}
