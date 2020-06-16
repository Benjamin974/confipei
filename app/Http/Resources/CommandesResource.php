<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $id_user = new UsersResource($this->user);
        
        return [
            'id' => $this->id,
            'user' => $id_user,

        ];
    }
}
