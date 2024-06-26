<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'price' => $this->price,
            'duration' => $this->duration,
            'rate' => $this->rate,
            'resolution' => $this->resolution,
            'date' => $this->date,
            'author' => $this->author,
            'lang' => $this->lang,
            'category' => $this->category->name,
            'sub_category' => $this->subcategory->name,
        ];

    }
}
