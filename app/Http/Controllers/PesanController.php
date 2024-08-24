<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Fetch all available packages
        $pakets = Paket::all();
        // Fetch all orders and extract the dates with jam
        $pesans = Pesan::all();
        $orderedDates = $pesans->map(function ($pesan) {
            return ['tanggal' => $pesan->tanggal, 'jam' => $pesan->jam];
        })->toArray();

        $bayar = Pesan::where('user_id', Auth::id())->where('payment_status', 'pending')->first();

        // Pass the data to the view
        return view('pesan.index', compact('pakets', 'orderedDates', 'bayar'));
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
            // Check if the selected date and time is already booked
            $existingBooking = Pesan::where('tanggal', $request->order_date)
                                    ->where('jam', $request->jam)
                                    ->first();
            if ($existingBooking) {
                return back()->withErrors(['order_date' => 'Tanggal dan jam yang dipilih sudah dipesan.']);
            }

            // Create a new booking record
            Pesan::create([
                'user_id' => Auth::id(),
                'name' => $request->nama,
                'phone' => $request->phone,
                'tipe' => $request->tipe,
                'paket' => $request->nama, // Assuming 'nama' is the package name
                'harga' => $request->harga,
                'tanggal' => $request->order_date,
                'jam' => $request->jam,
                'catatan' => $request->catatan,
                'payment_status' => 'pending',
            ]);

            // Redirect back with a success message
            return redirect()->route('riwayat')->with('success', 'Pesanan Anda telah berhasil dibuat!');
        }


    /**
     * Display the specified resource.
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesan $pesan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesan $pesan)
    {
        //
    }

        public function uploadBuktiPembayaran(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        $pesan = Pesan::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

    if ($request->hasFile('bukti_pembayaran')) {
            // Delete the old file if it exists
            if ($pesan->bukti_pembayaran) {
                Storage::delete($pesan->bukti_pembayaran);
            }

            // Store the new file

            $image = $request->file('bukti_pembayaran');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/bukti_pembayaran'), $imageName);

            // Update the record with the new file path
            $pesan->payment_status = 'success';
            $pesan->bukti_pembayaran = $imageName;
            $pesan->save();
        }

        return redirect()->route('riwayat')->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    public function pesanan()
    {
        $pesans = Pesan::where('payment_status', 'success')->get();
        return view('admin.pesanan', compact('pesans'));
    }
}
