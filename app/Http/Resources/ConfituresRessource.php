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
        $producteur = new ProducteursRessource($this->producteur);
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'id_producteur' => $producteur,
            'recompense' => $this->recompense->load('confiture'),
            'fruit' => $this->fruit->load('confiture')

        ];
    }
}
