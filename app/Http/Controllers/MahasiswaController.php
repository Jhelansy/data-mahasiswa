<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    public function index(): View
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create(): View
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:255|unique:mahasiswas,nim',
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswas,email',
            'no_hp' => 'nullable|string|max:20',
    ]);

        Mahasiswa::create($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(
        Request $request,
        Mahasiswa $mahasiswa
    ): RedirectResponse {
        $validated = $request->validate([
            'nim' => 'required|string|max:255|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mahasiswas,email,' . $mahasiswa->id,
            'no_hp' => 'nullable|string|max:20',
        ]);

        $mahasiswa->update($validated);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

     public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}