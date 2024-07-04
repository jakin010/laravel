<?php

namespace App\Http\Resources;

use App\Models\Bewoner;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Bewoner $resource
 */
class GetBewonerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ['id' => $this->resource->id, 'name' => $this->resource->name, 'parceel' => ['id' => $this->resource->parceel->id, 'name' => $this->resource->parceel->name]];
    }
}
