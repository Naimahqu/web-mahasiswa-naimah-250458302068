<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .container { width: 1200px; margin: 0 auto; }
        .form-inputs { display: flex; gap: 20px; }
        .form-inputs input { width: 250px; }
        .action-buttons { display: flex; justify-content: center; gap: 8px; }
        body { min-width: 1200px; overflow-x: auto; }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-600 to-purple-800 min-h-screen py-8">
    <div class="container">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white mb-2">Data Mahasiswa/Mahasiswi</h1>
            <p class="text-purple-200 text-lg">Tahun Akademik 2025/2026</p>
        </div>

        <!-- Notifikasi -->
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah -->
        <div class="bg-white rounded-2xl shadow-xl mb-8 overflow-hidden">
            <div class="bg-purple-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <i class="fas fa-plus-circle mr-3"></i> Tambah Data Mahasiswa Baru
                </h2>
            </div>
            <div class="p-6">
                <form action="{{ route('mahasiswa.store') }}" method="POST" class="form-inputs">
                    @csrf
                    <div>
                        <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') }}"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Alamat Email" value="{{ old('email') }}"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="telepon" placeholder="Nomor Telepon" value="{{ old('telepon') }}"
                            class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        @error('telepon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="w-48 bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i> Tambah Mahasiswa
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-purple-600 px-6 py-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <i class="fas fa-list mr-3"></i> Daftar Mahasiswa/Mahasiswi
                </h2>
                <span class="bg-white text-purple-600 px-4 py-2 rounded-full font-semibold text-sm">
                    {{ count($mahasiswas) }} mahasiswa
                </span>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-purple-600 text-white">
                                <th class="px-6 py-4 text-left">ID</th>
                                <th class="px-6 py-4 text-left">Nama Lengkap</th>
                                <th class="px-6 py-4 text-left">Email</th>
                                <th class="px-6 py-4 text-left">Telepon</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($mahasiswas as $mhs)
                                <tr class="hover:bg-purple-50 transition-colors duration-300">
                                    <td class="px-6 py-4 font-semibold text-gray-800">{{ $mhs->id }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $mhs->nama }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $mhs->email }}</td>
                                    <td class="px-6 py-4 text-gray-700">{{ $mhs->telepon }}</td>
                                    <td class="px-6 py-4">
                                        <div class="action-buttons">
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">
                                                    <i class="fas fa-trash mr-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($mahasiswas->isEmpty())
                        <p class="text-center text-gray-500 mt-4">Belum ada data mahasiswa.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
