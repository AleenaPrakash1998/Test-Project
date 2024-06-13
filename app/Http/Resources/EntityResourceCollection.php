<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntityResourceCollection extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'entity_id' => $this->entity_id,
            'name' => $this->name,
            'api_key' => $this->api_key,
            'reference_key' => $this->reference_key,
            'theme' => new ThemeResourceCollection($this->theme),
        ];
    }
}
