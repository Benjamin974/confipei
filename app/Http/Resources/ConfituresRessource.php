<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfituresRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $id_producteur = new ProducteursRessource($this->producteur);
        $id_photo = new PhotosResource($this->photo);
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'prix' => $this->prix,
            'id_producteur' => $id_producteur,
            'id_photo' => $id_photo,
            'recompense' => $this->recompense,
            'fruit' => $this->fruit

        ];
    }
}
