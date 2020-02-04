<?php /** @noinspection PhpUnused */

namespace App\Http\Controllers;

use App\Http\Requests\Sale\StoreOrUpdateRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SaleController extends Controller
{
    /**
     * SaleController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');

    }

    /**
     * @param StoreOrUpdateRequest $request
     * @return SaleResource
     */
    public function store(StoreOrUpdateRequest $request): SaleResource
    {
        $attributes = $request->validated();
        $sale = Sale::create($attributes);
        return new SaleResource($sale);

    }

    /**
     * @param Sale $sale
     * @param StoreOrUpdateRequest $request
     * @return SaleResource
     */
    public function update(Sale $sale, StoreOrUpdateRequest $request): SaleResource
    {
        $attributes = $request->validated();
        $sale->update($attributes);
        return new SaleResource($sale);

    }

    /**
     * @param Sale $sale
     * @return SaleResource
     */
    public function show(Sale $sale): SaleResource
    {
        return new SaleResource($sale);
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Sale::query();
        if ($name = $request->get('name')) {
            $query->where('name', 'ILIKE', "%{$name}%");
        }
        $sale = $query->paginate();
        return SaleResource::collection($sale);

    }

    /**
     * @param Sale $sale
     * @return string
     * @throws Exception
     */
    public function delete(Sale $sale)
    {
        $sale->delete();


    }

}
