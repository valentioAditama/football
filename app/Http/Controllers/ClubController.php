<?php

namespace App\Http\Controllers;

use App\Models\classement;
use App\Models\club;
use App\Http\Requests\StoreclubRequest;
use App\Http\Requests\UpdateclubRequest;

class ClubController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = club::paginate(15);
    return view('club', compact('data'));
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
  public function store(StoreclubRequest $request)
  {
    try {
      $data = club::create($request->all());
      classement::create([
        'id_club' => $data->id
      ]);

      return redirect()->back()->with(['success' => 'Successfully']);
    } catch (\Error $error) {
      return redirect()->back()->with(['success' => $error->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(club $club)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(club $club)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateclubRequest $request, club $club)
  {
    try {
      $club->update($request->all());
      return redirect()->back()->with(['success' => 'Successfully']);
    } catch (\Error $error) {
      return redirect()->back()->with(['success' => $error->getMessage()]);
    }

  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(club $club)
  {
    try {
      $club->delete();
      return redirect()->back()->with(['success' => 'Successfully']);
    } catch (\Error $error) {
      return redirect()->back()->with(['error' => $error->getMessage()]);
    }
  }
}
