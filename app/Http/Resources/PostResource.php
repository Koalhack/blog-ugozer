<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'image_id' => $this->image_id,
            'image_name' => $this->image?->name,
            'image_path' => $this->image?->path,
            'category_id' => $this->category_id,
            'category_name' => $this->category?->name,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
        ];
    }
}
