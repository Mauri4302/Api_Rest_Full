<?php

namespace App\Http\Controllers;

use App\Filters\CustomerFilter;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // ahora el metodo va a recibir una request y dependiendo de lo que venga va a filtrar
    public function index(Request $request)
    {
        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);
        $includeInvoices = $request->query('includeInvoices');
        // TRAEMOS TODA LA DATA
        // $customers = Customer::all();
        // AHORA LA VAMOS A PAGINAR PARA QUE NO SE HAGA MUY PESADO
        // $customers = Customer::paginate();
        // hacemos el filtro aca en la consulta where
        $customers = Customer::where($queryItems);
        if ($includeInvoices) {
            $customers = $customers->with('invoices');
        }
        // AHORA NECESITAMOS DEVOLVER UNA COLECCION
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
