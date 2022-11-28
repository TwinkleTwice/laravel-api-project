<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductPageResource extends JsonResource
{
    public function toArray($request)
    {
        $category = $this->categories->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => Str::limit($this->description),
            'price' => $this->price,
            'category' => new ProductCategoryResource($category),
        ];
    }
}
