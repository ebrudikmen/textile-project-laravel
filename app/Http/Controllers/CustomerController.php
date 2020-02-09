<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreOrUpdateRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Cache;
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
        Cache::forget('customers');
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
        Cache::forget('customers');
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
//        if (Cache::has('customers')) {
//            $customers = Cache::get('customers');
//        } else {
//            $customers = Customer::where('name', 'ILIKE', '%a%')
//                ->where('surname', 'ILIKE', '%b%')
//                ->paginate();
//
//            Cache::put('customers', $customers, 1 * 60 * 60);
//        }

        $customers = Cache::remember('customers', 1 * 60 * 60, function () {
            return Customer::where('name', 'ILIKE', '%a%')
                ->where('surname', 'ILIKE', '%b%')
                ->paginate();
        });

//        $customer = Customer::where('name', 'ILIKE', '%a%')
//            ->where('surname', 'ILIKE', '%b%')
//            ->paginate();
//
       return $customers;
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
