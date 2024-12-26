<?php

namespace App\Http\Controllers;

use App\DataTables\LeasingCompaniesDataTable;
use App\Http\Requests\CreateLeasingCompaniesRequest;
use App\Http\Requests\UpdateLeasingCompaniesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\LeasingCompaniesRepository;
use Illuminate\Http\Request;
use Flash;

class LeasingCompaniesController extends AppBaseController
{
    /** @var LeasingCompaniesRepository $leasingCompaniesRepository*/
    private $leasingCompaniesRepository;

    public function __construct(LeasingCompaniesRepository $leasingCompaniesRepo)
    {
        $this->leasingCompaniesRepository = $leasingCompaniesRepo;
    }

    /**
     * Display a listing of the LeasingCompanies.
     */
    public function index(LeasingCompaniesDataTable $leasingCompaniesDataTable)
    {
    return $leasingCompaniesDataTable->render('leasing_companies.index');
    }


    /**
     * Show the form for creating a new LeasingCompanies.
     */
    public function create()
    {
        return view('leasing_companies.create');
    }

    /**
     * Store a newly created LeasingCompanies in storage.
     */
    public function store(CreateLeasingCompaniesRequest $request)
    {
        $input = $request->all();

        $leasingCompanies = $this->leasingCompaniesRepository->create($input);

        Flash::success('Leasing Companies saved successfully.');

        return redirect(route('leasingCompanies.index'));
    }

    /**
     * Display the specified LeasingCompanies.
     */
    public function show($id)
    {
        $leasingCompanies = $this->leasingCompaniesRepository->find($id);

        if (empty($leasingCompanies)) {
            Flash::error('Leasing Companies not found');

            return redirect(route('leasingCompanies.index'));
        }

        return view('leasing_companies.show')->with('leasingCompanies', $leasingCompanies);
    }

    /**
     * Show the form for editing the specified LeasingCompanies.
     */
    public function edit($id)
    {
        $leasingCompanies = $this->leasingCompaniesRepository->find($id);

        if (empty($leasingCompanies)) {
            Flash::error('Leasing Companies not found');

            return redirect(route('leasingCompanies.index'));
        }

        return view('leasing_companies.edit')->with('leasingCompanies', $leasingCompanies);
    }

    /**
     * Update the specified LeasingCompanies in storage.
     */
    public function update($id, UpdateLeasingCompaniesRequest $request)
    {
        $leasingCompanies = $this->leasingCompaniesRepository->find($id);

        if (empty($leasingCompanies)) {
            Flash::error('Leasing Companies not found');

            return redirect(route('leasingCompanies.index'));
        }

        $leasingCompanies = $this->leasingCompaniesRepository->update($request->all(), $id);

        Flash::success('Leasing Companies updated successfully.');

        return redirect(route('leasingCompanies.index'));
    }

    /**
     * Remove the specified LeasingCompanies from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $leasingCompanies = $this->leasingCompaniesRepository->find($id);

        if (empty($leasingCompanies)) {
            Flash::error('Leasing Companies not found');

            return redirect(route('leasingCompanies.index'));
        }

        $this->leasingCompaniesRepository->delete($id);

        Flash::success('Leasing Companies deleted successfully.');

        return redirect(route('leasingCompanies.index'));
    }
}
