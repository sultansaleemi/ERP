<?php

namespace App\Http\Controllers;

use App\DataTables\GaragesDataTable;
use App\Http\Requests\CreateGaragesRequest;
use App\Http\Requests\UpdateGaragesRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\GaragesRepository;
use Illuminate\Http\Request;
use Flash;

class GaragesController extends AppBaseController
{
    /** @var GaragesRepository $garagesRepository*/
    private $garagesRepository;

    public function __construct(GaragesRepository $garagesRepo)
    {
        $this->garagesRepository = $garagesRepo;
    }

    /**
     * Display a listing of the Garages.
     */
    public function index(GaragesDataTable $garagesDataTable)
    {
    return $garagesDataTable->render('garages.index');
    }


    /**
     * Show the form for creating a new Garages.
     */
    public function create()
    {
        return view('garages.create');
    }

    /**
     * Store a newly created Garages in storage.
     */
    public function store(CreateGaragesRequest $request)
    {
        $input = $request->all();

        $garages = $this->garagesRepository->create($input);

        Flash::success('Garages saved successfully.');

        return redirect(route('garages.index'));
    }

    /**
     * Display the specified Garages.
     */
    public function show($id)
    {
        $garages = $this->garagesRepository->find($id);

        if (empty($garages)) {
            Flash::error('Garages not found');

            return redirect(route('garages.index'));
        }

        return view('garages.show')->with('garages', $garages);
    }

    /**
     * Show the form for editing the specified Garages.
     */
    public function edit($id)
    {
        $garages = $this->garagesRepository->find($id);

        if (empty($garages)) {
            Flash::error('Garages not found');

            return redirect(route('garages.index'));
        }

        return view('garages.edit')->with('garages', $garages);
    }

    /**
     * Update the specified Garages in storage.
     */
    public function update($id, UpdateGaragesRequest $request)
    {
        $garages = $this->garagesRepository->find($id);

        if (empty($garages)) {
            Flash::error('Garages not found');

            return redirect(route('garages.index'));
        }

        $garages = $this->garagesRepository->update($request->all(), $id);

        Flash::success('Garages updated successfully.');

        return redirect(route('garages.index'));
    }

    /**
     * Remove the specified Garages from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $garages = $this->garagesRepository->find($id);

        if (empty($garages)) {
            Flash::error('Garages not found');

            return redirect(route('garages.index'));
        }

        $this->garagesRepository->delete($id);

        Flash::success('Garages deleted successfully.');

        return redirect(route('garages.index'));
    }
}
