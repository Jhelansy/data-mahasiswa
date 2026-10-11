<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Mahasiswa</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
    <h1>Data Mahasiswa</h1>
    @if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif
    <p>Selamat datang di aplikasi Data Mahasiswa By Jhelansy.</p>

    <h2>Daftar Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>
<br><br>

    <p>Total mahasiswa: {{ $mahasiswa->count() }}</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Tools</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $index => $mhs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama }}</td>
                    <td>{{ $mhs->jurusan }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->no_hp }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a>

                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>