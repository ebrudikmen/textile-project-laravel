<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreOrUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Exception;

class CustomerController extends Controller
{
    /**
     * CustomerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param StoreOrUpdateRequest $request
     * @return CustomerResource
     */
    public function store(StoreOrUpdateRequest $request): CustomerResource
    {
        $attributes = $request->validated();
        $customer = Customer::create($attributes);
        return new CustomerResource($customer);
    }

    /**
     * @param Customer $customer
     * @param StoreOrUpdateRequest $request
     * @return CustomerResource
     */
    public function update(Customer $customer, StoreOrUpdateRequest $request)
    {
        $attributes = $request->validated();
        $customer->update($attributes);
        return new CustomerResource($customer);
    }

    /**
     * @param Customer $customer
     * @return CustomerResource
     */
    public function show(Customer $customer): CustomerResource
    {
        return new CustomerResource($customer);
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = Customer::query();
        if ($name = $request->get('name')) {
            $query->where('name', 'ILIKE', "%{$name}%");
        }
        $customers = $query->paginate();
        return CustomerResource::collection($customers);

    }

    /**
     * @param Customer $customer
     * @return string
     * @throws Exception
     */
    public function delete(Customer $customer)
    {
        $customer->delete();


    }


}
