<?php

namespace App\Http\Controllers;

use App\DataTables\RidersDataTable;
use App\Http\Requests\CreateRidersRequest;
use App\Http\Requests\UpdateRidersRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\JobStatus;
use App\Models\Riders;
use App\Repositories\RidersRepository;
use Illuminate\Http\Request;
use Flash;

class RidersController extends AppBaseController
{
  /** @var RidersRepository $ridersRepository*/
  private $ridersRepository;

  public function __construct(RidersRepository $ridersRepo)
  {
    $this->ridersRepository = $ridersRepo;
  }

  /**
   * Display a listing of the Riders.
   */
  public function index(RidersDataTable $ridersDataTable)
  {
    return $ridersDataTable->render('riders.index');
  }


  /**
   * Show the form for creating a new Riders.
   */
  public function create()
  {
    return view('riders.create');
  }

  /**
   * Store a newly created Riders in storage.
   */
  public function store(CreateRidersRequest $request)
  {
    $input = $request->all();

    $riders = $this->ridersRepository->create($input);

    Flash::success('Riders saved successfully.');

    return redirect(route('riders.index'));
  }

  /**
   * Display the specified Riders.
   */
  public function show($id)
  {
    $riders = $this->ridersRepository->find($id);
    // $rider_items = $rider->items;
    $result = $riders->toArray();
    $job_status = JobStatus::where('RID', $id)->orderByDesc('id')->get();

    return view('riders.show_fields', compact('result', 'riders', 'job_status'));

  }

  /**
   * Show the form for editing the specified Riders.
   */
  public function edit($id)
  {
    $riders = $this->ridersRepository->find($id);

    if (empty($riders)) {
      Flash::error('Riders not found');

      return redirect(route('riders.index'));
    }

    return view('riders.edit')->with('riders', $riders);
  }

  /**
   * Update the specified Riders in storage.
   */
  public function update($id, UpdateRidersRequest $request)
  {
    $riders = $this->ridersRepository->find($id);

    if (empty($riders)) {
      Flash::error('Riders not found');

      return redirect(route('riders.index'));
    }

    $riders = $this->ridersRepository->update($request->all(), $id);

    Flash::success('Riders updated successfully.');

    return redirect(route('riders.index'));
  }

  /**
   * Remove the specified Riders from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $riders = $this->ridersRepository->find($id);

    if (empty($riders)) {
      Flash::error('Riders not found');

      return redirect(route('riders.index'));
    }

    $this->ridersRepository->delete($id);

    Flash::success('Riders deleted successfully.');

    return redirect(route('riders.index'));
  }
}
