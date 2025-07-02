<?php
namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiaries = Beneficiary::all();
        return view('beneficiaries.index', compact('beneficiaries'));
    }

    public function create()
    {
        return view('beneficiaries.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'nik' => 'required|string|size:16|unique:beneficiaries,nik',
                'alamat' => 'required|string',
                'no_telepon' => 'nullable|string|max:15',
                'jenis_kelamin' => 'required|in:L,P',
                'tanggal_lahir' => 'required|date',
                'status_ekonomi' => 'required|in:miskin,menengah,mampu',
            ]);

            Beneficiary::create($validated);
            return redirect()->route('beneficiaries.index')->with('success', 'Data berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error storing beneficiary: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function show(Beneficiary $beneficiary)
    {
        return view('beneficiaries.show', compact('beneficiary'));
    }

    public function edit(Beneficiary $beneficiary)
    {
        return view('beneficiaries.edit', compact('beneficiary'));
    }

    public function update(Request $request, Beneficiary $beneficiary)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:beneficiaries,nik,' . $beneficiary->id,
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:15',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'status_ekonomi' => 'required|in:miskin,menengah,mampu',
        ]);

        $beneficiary->update($validated);
        return redirect()->route('beneficiaries.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Beneficiary $beneficiary)
    {
        $beneficiary->delete();
        return redirect()->route('beneficiaries.index')->with('success', 'Data berhasil dihapus.');
    }
}