<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa - Lany Punya</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

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

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nim">NIM</label><br>
            <input type="text" id="nim" name="nim"
                   value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <br>

        <div>
            <label for="nama">Nama Lengkap</label><br>
            <input type="text" id="nama" name="nama"
                   value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <br>

        <div>
            <label for="jurusan">Jurusan</label><br>
            <input type="text" id="jurusan" name="jurusan"
                   value="{{ old('jurusan', $mahasiswa->jurusan) }}" required>
        </div>

        <br>

        <div>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email"
                   value="{{ old('email', $mahasiswa->email) }}" required>
        </div>

        <br>

        <div>
            <label for="no_hp">Nomor HP</label><br>
            <input type="text" id="no_hp" name="no_hp"
                   value="{{ old('no_hp', $mahasiswa->no_hp) }}">
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>
</body>
</html>