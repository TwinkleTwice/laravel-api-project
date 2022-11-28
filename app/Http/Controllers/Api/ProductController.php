<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductPageResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function catalog($slug = null)
    {
        return ProductResource::collection(Product::query()
            ->when(
                isset($slug),
                fn ($q) => $q->whereHas('categories', fn($q) => $q->whereIn('category_id', [Category::query()->where('slug', $slug)->pluck('id')]))
            )
            ->paginate(20));
    }

    public function getProduct(Product $product)
    {
        return new ProductPageResource($product);
    }

    public function lowerPrice()
    {
        return ProductResource::collection(Product::query()
            ->where('price', '>', 0)
            ->orderBy('price', 'asc')
            ->take(10)
            ->get()
        );
    }

    public function higherPrice()
    {
        return ProductResource::collection(Product::query()
            ->where('price', '>', 0)
            ->orderBy('price', 'desc')
            ->take(10)
            ->get()
        );
    }
}
