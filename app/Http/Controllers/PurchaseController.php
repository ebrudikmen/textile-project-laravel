<?php

namespace App\Http\Controllers;

use App\Http\Requests\Purchase\StoreOrUpdateRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Exception;

class PurchaseController extends Controller
{
    /**
     * PurchaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param StoreOrUpdateRequest $request
     * @return PurchaseResource
     */
    public function store(StoreOrUpdateRequest $request): PurchaseResource
    {
        $attributes = $request->validated();
        $purchase = Purchase::create($attributes);
        return new PurchaseResource($purchase);

    }

    /**
     * @param Purchase $purchase
     * @param StoreOrUpdateRequest $request
     * @return PurchaseResource
     */
    public function update(Purchase $purchase, StoreOrUpdateRequest $request): PurchaseResource
    {
        $attributes = $request->validated();
        $purchase->update($attributes);
        return new PurchaseResource($purchase);
    }

    /**
     * @param Purchase $purchase
     * @return PurchaseResource
     */
    public function show(Purchase $purchase): PurchaseResource
    {
        return new PurchaseResource($purchase);
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Purchase::query();
        if ($name = $request->get('name')) {
            $query->where('name', 'ILIKE', "%{$name}%");
        }
        $purchase = $query->paginate();
        return PurchaseResource::collection($purchase);
    }

    /**
     * @param Purchase $purchase
     * @throws Exception
     */
    public function delete(Purchase $purchase)
    {
        $purchase->delete();

    }
}
