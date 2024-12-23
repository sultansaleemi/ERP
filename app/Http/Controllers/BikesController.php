<?php

namespace App\Http\Controllers;

use App\DataTables\BikesDataTable;
use App\Http\Requests\CreateBikesRequest;
use App\Http\Requests\UpdateBikesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BikesRepository;
use Illuminate\Http\Request;
use Flash;

class BikesController extends AppBaseController
{
    /** @var BikesRepository $bikesRepository*/
    private $bikesRepository;

    public function __construct(BikesRepository $bikesRepo)
    {
        $this->bikesRepository = $bikesRepo;
    }

    /**
     * Display a listing of the Bikes.
     */
    public function index(BikesDataTable $bikesDataTable)
    {
    return $bikesDataTable->render('bikes.index');
    }


    /**
     * Show the form for creating a new Bikes.
     */
    public function create()
    {
        return view('bikes.create');
    }

    /**
     * Store a newly created Bikes in storage.
     */
    public function store(CreateBikesRequest $request)
    {
        $input = $request->all();

        $bikes = $this->bikesRepository->create($input);

        Flash::success('Bikes saved successfully.');

        return redirect(route('bikes.index'));
    }

    /**
     * Display the specified Bikes.
     */
    public function show($id)
    {
        $bikes = $this->bikesRepository->find($id);

        if (empty($bikes)) {
            Flash::error('Bikes not found');

            return redirect(route('bikes.index'));
        }

        return view('bikes.show')->with('bikes', $bikes);
    }

    /**
     * Show the form for editing the specified Bikes.
     */
    public function edit($id)
    {
        $bikes = $this->bikesRepository->find($id);

        if (empty($bikes)) {
            Flash::error('Bikes not found');

            return redirect(route('bikes.index'));
        }

        return view('bikes.edit')->with('bikes', $bikes);
    }

    /**
     * Update the specified Bikes in storage.
     */
    public function update($id, UpdateBikesRequest $request)
    {
        $bikes = $this->bikesRepository->find($id);

        if (empty($bikes)) {
            Flash::error('Bikes not found');

            return redirect(route('bikes.index'));
        }

        $bikes = $this->bikesRepository->update($request->all(), $id);

        Flash::success('Bikes updated successfully.');

        return redirect(route('bikes.index'));
    }

    /**
     * Remove the specified Bikes from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bikes = $this->bikesRepository->find($id);

        if (empty($bikes)) {
            Flash::error('Bikes not found');

            return redirect(route('bikes.index'));
        }

        $this->bikesRepository->delete($id);

        Flash::success('Bikes deleted successfully.');

        return redirect(route('bikes.index'));
    }
}
