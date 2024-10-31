<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::latest()->paginate(10);
        return view('transaction.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nama' => 'required',
                'nominal' => 'required|numeric',
                'admin_bank' => 'required|numeric',
                'admin_agent' => 'required|numeric',
                'keterangan' => 'string',
                'tipe' => 'required',
                'status' => 'required',
                'tanggal' => 'required'
            ]);
            $data['user_id'] = Auth::user()->id;
            $transaction = Transaction::create($data);
            if ($transaction->tipe == 'Setor Tunai') {
                Saldo::where('id', 1)->increment('saldo', $transaction->nominal);
                Saldo::where('id', 1)->decrement('cash', $transaction->nominal);
            } else if ($transaction->tipe == 'Tarik Tunai' || $transaction->tipe == 'Tarik Tunai Nasabah') {
                Saldo::where('id', 1)->decrement('saldo', $transaction->nominal);
                Saldo::where('id', 1)->increment('cash', $transaction->nominal);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'Gagal menambahkan histori saldo' . $th->getMessage());
        }

        return redirect('/transactions')->with('status', 'Berhasil menambahkan histori saldo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
