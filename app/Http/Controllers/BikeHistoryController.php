<?php

namespace App\Http\Controllers;

use App\DataTables\BikeHistoryDataTable;
use App\Http\Requests\CreateBikeHistoryRequest;
use App\Http\Requests\UpdateBikeHistoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BikeHistoryRepository;
use Illuminate\Http\Request;
use Flash;

class BikeHistoryController extends AppBaseController
{
  /** @var BikeHistoryRepository $bikeHistoryRepository*/
  private $bikeHistoryRepository;

  public function __construct(BikeHistoryRepository $bikeHistoryRepo)
  {
    $this->bikeHistoryRepository = $bikeHistoryRepo;
  }

  /**
   * Display a listing of the BikeHistory.
   */
  public function index(BikeHistoryDataTable $bikeHistoryDataTable)
  {
    return $bikeHistoryDataTable->render('bike_histories.index');
  }


  /**
   * Show the form for creating a new BikeHistory.
   */
  public function create()
  {
    return view('bike_histories.create');
  }

  /**
   * Store a newly created BikeHistory in storage.
   */
  public function store(CreateBikeHistoryRequest $request)
  {
    $input = $request->all();

    $bikeHistory = $this->bikeHistoryRepository->create($input);

    Flash::success('Bike History saved successfully.');

    return redirect(route('bikeHistories.index'));
  }

  /**
   * Display the specified BikeHistory.
   */
  public function show($id)
  {
    $bikeHistory = $this->bikeHistoryRepository->find($id);

    if (empty($bikeHistory)) {
      Flash::error('Bike History not found');

      return redirect(route('bikeHistories.index'));
    }

    return view('bike_histories.show')->with('bikeHistory', $bikeHistory);
  }

  /**
   * Show the form for editing the specified BikeHistory.
   */
  public function edit($id)
  {
    $bikeHistory = $this->bikeHistoryRepository->find($id);

    if (empty($bikeHistory)) {
      Flash::error('Bike History not found');

      return redirect(route('bikeHistories.index'));
    }

    return view('bike_histories.edit')->with('bikeHistory', $bikeHistory);
  }

  /**
   * Update the specified BikeHistory in storage.
   */
  public function update($id, UpdateBikeHistoryRequest $request)
  {
    $bikeHistory = $this->bikeHistoryRepository->find($id);

    if (empty($bikeHistory)) {
      Flash::error('Bike History not found');

      return redirect(route('bikeHistories.index'));
    }

    $bikeHistory = $this->bikeHistoryRepository->update($request->all(), $id);

    Flash::success('Bike History updated successfully.');

    return redirect(route('bikeHistories.index'));
  }

  /**
   * Remove the specified BikeHistory from storage.
   *
   * @throws \Exception
   */
  public function destroy($id)
  {
    $bikeHistory = $this->bikeHistoryRepository->find($id);

    if (empty($bikeHistory)) {
      Flash::error('Bike History not found');

      return redirect(route('bikeHistories.index'));
    }

    $this->bikeHistoryRepository->delete($id);

    Flash::success('Bike History deleted successfully.');

    return redirect(route('bikeHistories.index'));
  }
}
