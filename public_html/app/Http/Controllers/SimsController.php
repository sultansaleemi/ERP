<?php

namespace App\Http\Controllers;

use App\DataTables\SimsDataTable;
use App\Http\Requests\CreateSimsRequest;
use App\Http\Requests\UpdateSimsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\SimsRepository;
use Illuminate\Http\Request;
use Flash;

class SimsController extends AppBaseController
{
  /** @var SimsRepository $simsRepository*/
  private $simsRepository;

  public function __construct(SimsRepository $simsRepo)
  {
    $this->simsRepository = $simsRepo;
  }

  /**
   * Display a listing of the Sims.
   */
  public function index(SimsDataTable $simsDataTable)
  {

    if (!auth()->user()->hasPermissionTo('sim_view')) {
      abort(403, 'Unauthorized action.');
    }
    return $simsDataTable->render('sims.index');
  }


  /**
   * Show the form for creating a new Sims.
   */
  public function create()
  {
    return view('sims.create');
  }

  /**
   * Store a newly created Sims in storage.
   */
  public function store(CreateSimsRequest $request)
  {
    $input = $request->all();

    $sims = $this->simsRepository->create($input);

    return response()->json(['message' => 'Sim added successfully.']);

  }

  /**
   * Display the specified Sims.
   */
  public function show($id)
  {
    $sims = $this->simsRepository->find($id);

    if (empty($sims)) {
      Flash::error('Sims not found');

      return redirect(route('sims.index'));
    }

    return view('sims.show')->with('sims', $sims);
  }

  /**
   * Show the form for editing the specified Sims.
   */
  public function edit($id)
  {
    $sims = $this->simsRepository->find($id);

    if (empty($sims)) {
      Flash::error('Sims not found');

      return redirect(route('sims.index'));
    }

    return view('sims.edit')->with('sims', $sims);
  }

  /**
   * Update the specified Sims in storage.
   */
  public function update($id, UpdateSimsRequest $request)
  {
    $sims = $this->simsRepository->find($id);

    if (empty($sims)) {
      return response()->json(['errors' => ['error' => 'Sim not found!']], 422);

    }

    $sims = $this->simsRepository->update($request->all(), $id);

    return response()->json(['message' => 'Sim updated successfully.']);

  }

  /**
   * Remove the specified Sims from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $sims = $this->simsRepository->find($id);

    if (empty($sims)) {
      return response()->json(['errors' => ['error' => 'Sim not found!']], 422);

    }

    $this->simsRepository->delete($id);

    return response()->json(['message' => 'Sim deleted successfully.']);

  }
}
