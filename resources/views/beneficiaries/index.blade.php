<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerima Bantuan Sosial</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #e8f5e9; 
            font-family: 'Segoe UI', sans-serif;
        }

        h1 {
            color: #2e7d32;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            animation: fadeInDown 1s ease-in-out;
        }

        .btn-primary {
            background-color: #66bb6a;
            border: none;
        }

        .btn-primary:hover {
            background-color: #57a05a;
        }

        .table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            animation: fadeInUp 1s ease;
        }

        .table th {
            background-color: #a5d6a7;
            color: #1b5e20;
        }

        .alert-success {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1><i class="fa-solid fa-people-group me-2"></i>Daftar Penerima Bantuan Sosial</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('beneficiaries.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Tambah Penerima
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered shadow-sm">
                <thead>
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Status Ekonomi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td class="text-center">{{ $beneficiary->id }}</td>
                            <td>{{ $beneficiary->nama_lengkap }}</td>
                            <td>{{ $beneficiary->nik }}</td>
                            <td>{{ $beneficiary->alamat }}</td>
                            <td class="text-center">{{ $beneficiary->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td class="text-center">{{ ucfirst($beneficiary->status_ekonomi) }}</td>
                            <td class="text-center">
                                <a href="{{ route('beneficiaries.show', $beneficiary) }}" class="btn btn-info btn-sm me-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('beneficiaries.edit', $beneficiary) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('beneficiaries.destroy', $beneficiary) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
