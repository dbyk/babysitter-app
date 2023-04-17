<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPersonalityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'phlegmatic' => $this->phlegmatic,
            'melancholic' => $this->melancholic,
            'sanguine' => $this->sanguine,
            'choleric' => $this->choleric,
        ];
    }
}
