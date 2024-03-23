<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Models\Drug;

class DrugController extends Controller
{
    public function index()
    {
        $drugs = Drug::get();

        return view('drug.obat', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDrugRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $obat)
    {
        return view('drug.detail-obat', ['drug' => $obat]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $obat)
    {
        return view('drug.edit-obat', ['drug' => $obat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDrugRequest $request, Drug $obat)
    {
        $obat->update($request->validated());

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug)
    {
        //
    }
}
