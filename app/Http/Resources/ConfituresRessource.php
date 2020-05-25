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
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'prix' => $this->prix,
            'id_producteur' => $id_producteur,
            'recompense' => $this->recompense,
            'fruit' => $this->fruit

        ];
    }
}
