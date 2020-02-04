<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreOrUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    /**
     * @param StoreOrUpdateRequest $request
     * @return ProductResource
     */
    public function store(StoreOrUpdateRequest $request): ProductResource
    {
        $attributes = $request->validated();
        $product = Product::create($attributes);
        return new ProductResource($product);

    }

    /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);

    }

    /**
     * @param Product $product
     * @param StoreOrUpdateRequest $request
     * @return ProductResource
     */
    public function update(Product $product, StoreOrUpdateRequest $request): ProductResource
    {
        $attributes = $request->validated();
        $product->update($attributes);
        return new ProductResource($product);
    }

    /**
     * @param Product $product
     * @return string
     * @throws Exception
     */
    public
    function delete(Product $product)
    {
        $product->delete();


    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     *
     */
    public function index(Request $request)
    {
        $query = Product::query();
        if ($name = $request->get('name')) {
            $query->where('name', 'ILIKE', "%{$name}%");
        }
        $product = $query->paginate();
        return ProductResource::collection($product);
    }


}
