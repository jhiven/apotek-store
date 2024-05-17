<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use App\Models\Drug;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DrugController extends Controller
{
    /**
     * @return View|Factory
     */
    public function index(): View|Factory
    {
        $drugs = Drug::get();
        return Auth::user()->is_admin
            ? view('pages.admin.drug.index', compact('drugs'))
            : view('pages.user.drug.obat', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('pages.admin.drug.create-obat');
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(StoreDrugRequest $request): RedirectResponse
    {
        $drugId = DB::selectOne("SELECT nextval('drugs_id_seq') as val")->val;
        $image_url = $request->file('image')->storePubliclyAs('obat_cover', $drugId);
        Drug::insert([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'indikasi' => $request->indikasi,
            'jenis' => $request->jenis,
            'dosis' => $request->dosis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'image_url' => Storage::url($image_url),
        ]);

        return to_route('admin.obat.index');
    }

    /**
     * Display the specified resource.
     * @return View|Factory
     */
    public function show(Drug $obat): View|Factory
    {
        return Auth::user()->is_admin
            ? view('pages.admin.drug.detail-obat', ['drug' => $obat])
            : view('pages.user.drug.detail-obat', ['drug' => $obat]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return View|Factory
     */
    public function edit(Drug $obat): View|Factory
    {
        return view('pages.admin.drug.edit-obat', ['drug' => $obat]);
    }

    /**
     * Update the specified resource in storage.
     * @return void
     */
    public function update(UpdateDrugRequest $request, Drug $obat): RedirectResponse
    {
        if (isset($request->image)) {
            Storage::delete('obat_cover/' . $obat->id);
            $image_url = $request->file('image')->storePubliclyAs('obat_cover', $obat->id);
            $obat->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'indikasi' => $request->indikasi,
                'jenis' => $request->jenis,
                'dosis' => $request->dosis,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'image_url' => Storage::url($image_url),
            ]);
        } else {
            $obat->update($request->validated());
        }

        return to_route('admin.obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $obat)
    {
        Storage::delete('obat_cover/' . $obat->id);
        $obat->delete();

        return to_route('admin.obat.index');
    }
}
