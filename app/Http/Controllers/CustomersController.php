<?php

namespace App\Http\Controllers;

use App\DataTables\CustomersDataTable;
use App\Http\Requests\CreateCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;
use Flash;

class CustomersController extends AppBaseController
{
    /** @var CustomersRepository $customersRepository*/
    private $customersRepository;

    public function __construct(CustomersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
    }

    /**
     * Display a listing of the Customers.
     */
    public function index(CustomersDataTable $customersDataTable)
    {
    return $customersDataTable->render('customers.index');
    }


    /**
     * Show the form for creating a new Customers.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created Customers in storage.
     */
    public function store(CreateCustomersRequest $request)
    {
        $input = $request->all();

        $customers = $this->customersRepository->create($input);

        Flash::success('Customers saved successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified Customers.
     */
    public function show($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified Customers.
     */
    public function edit($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.edit')->with('customers', $customers);
    }

    /**
     * Update the specified Customers in storage.
     */
    public function update($id, UpdateCustomersRequest $request)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $customers = $this->customersRepository->update($request->all(), $id);

        Flash::success('Customers updated successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified Customers from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customers = $this->customersRepository->find($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $this->customersRepository->delete($id);

        Flash::success('Customers deleted successfully.');

        return redirect(route('customers.index'));
    }
}
