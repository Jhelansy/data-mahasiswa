<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - Lany Punya</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>

    @if ($errors->any())
        <div>
            <p>Mohon periksa kembali data yang kamu masukkan:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div>
            <label for="nim">NIM</label><br>
            <input type="text" id="nim" name="nim"
                   value="{{ old('nim') }}" required>
        </div>

        <br>

        <div>
            <label for="nama">Nama Lengkap</label><br>
            <input type="text" id="nama" name="nama"
                   value="{{ old('nama') }}" required>
        </div>

        <br>

        <div>
            <label for="jurusan">Jurusan</label><br>
            <input type="text" id="jurusan" name="jurusan"
                   value="{{ old('jurusan') }}" required>
        </div>

        <br>

        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"
                   value="{{ old('email') }}" required>
        </div>

        <br>

        <div>
            <label for="no_hp">Nomor HP</label><br>
            <input type="text" id="no_hp" name="no_hp"
                   value="{{ old('no_hp') }}">
        </div>

        <br>

        <button type="submit">Simpan Mahasiswa</button>
        <a href="{{ route('mahasiswa.index') }}">Kembali</a>
    </form>
</body>
</html>