<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StagiaireResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'cin' => $this->cin,
            'filiere' => $this->filiere,
            'service' => $this->service,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
