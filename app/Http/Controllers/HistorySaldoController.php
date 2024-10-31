<?php

namespace App\Http\Controllers;

use App\Models\HistorySaldo;
use Illuminate\Http\Request;

class HistorySaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HistorySaldo::latest()->paginate(10);
        return view('history.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            HistorySaldo::create($request->validate(
                [
                    'nominal' => 'required|numeric',
                    'keterangan' => 'string',
                    'tipe_transaksi' => 'required',
                    'tipe' => 'required'
                ]
            ));
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Gagal menambahkan histori saldo' . $th->getMessage());
        }

        return redirect('/histories')->with('status', 'Berhasil menambahkan histori saldo');
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorySaldo $historySaldo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HistorySaldo $historySaldo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HistorySaldo $historySaldo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HistorySaldo $historySaldo)
    {
        //
    }
}
