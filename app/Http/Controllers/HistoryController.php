<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $pesans = Pesan::where('user_id', $userId)->orderBy('tanggal', 'desc')->get();

        return view('pesan.history', compact('pesans'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }

    public function bayar(String $id){
        $pesan = Pesan::find($id);

        return view('pesan.bayar', compact('pesan'));
    }

    public function accbayar(String $id){
        $pesan = Pesan::find($id);
        $pesan->payment_status = 'success';
        $pesan->save();

        return redirect()->route('daftar.pesanan');
    }

}
