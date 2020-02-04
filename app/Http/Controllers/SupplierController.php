<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\StoreOrUpdateRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param StoreOrUpdateRequest $request
     * @return SupplierResource
     */
    public function store(StoreOrUpdateRequest $request): SupplierResource
    {
        $attributes = $request->validated();
        $supplier = Supplier::create($attributes);
        return new SupplierResource($supplier);
    }

    /**
     * @param Supplier $supplier
     * @return SupplierResource
     */
    public function show(Supplier $supplier): SupplierResource
    {
        return new SupplierResource($supplier);

    }

    /**
     * @param Supplier $supplier
     * @param StoreOrUpdateRequest $request
     * @return SupplierResource
     */
    public function update(Supplier $supplier, StoreOrUpdateRequest $request): SupplierResource
    {

        $attributes = $request->validated();
        $supplier->update($attributes);
        return new SupplierResource($supplier);
    }

    /**
     * @param Supplier $supplier
     * @return string
     * @throws Exception
     */
    public function delete(Supplier $supplier)
    {
        $supplier->delete();
        return $this->apiOk();
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $query = Supplier::query();
        if ($name = $request->get('name')) {
            $query->where('name', 'ILIKE', "{%$name%}");
        }

        $supplier = $query->paginate();
        return SupplierResource::collection($supplier);
    }
}
