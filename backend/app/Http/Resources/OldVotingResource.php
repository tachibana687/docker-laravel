<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OldVotingResource extends JsonResource
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
            'tag1_id' => $this->tag1_id,
            'tag2_id' => $this->tag2_id,
            'tag1_num' => $this->tag1_num,
            'tag2_num' => $this->tag2_num,
        ];
    }
}
