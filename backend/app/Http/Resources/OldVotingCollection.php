<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OldVotingCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'old_votings' => $this->collection
            // 'tag1_id' => $this->tag1_id,
            // 'tag2_id' => $this->tag2_id,
            // 'tag1_num' => $this->tag1_num,
            // 'tag2_num' => $this->tag2_num,
        ];
    }
}
