<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penerima</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background-color: #e8f5e9;
            font-family: 'Segoe UI', sans-serif;
        }

        h1 {
            color: #2e7d32;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            animation: fadeInDown 1s ease-in-out;
        }

        .card {
            animation: fadeInUp 1s ease-in-out;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
        }

        .card-body p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .btn-secondary {
            background-color: #a5d6a7;
            border: none;
            color: #1b5e20;
        }

        .btn-secondary:hover {
            background-color: #81c784;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1><i class="fa-solid fa-user me-2"></i>Detail Penerima Bantuan</h1>
        <div class="card">
            <div class="card-body">
                <p><strong><i class="fa-solid fa-hashtag me-2 text-success"></i>ID:</strong> {{ $beneficiary->id }}</p>
                <p><strong><i class="fa-solid fa-user me-2 text-success"></i>Nama:</strong> {{ $beneficiary->nama_lengkap }}</p>
                <p><strong><i class="fa-solid fa-id-card me-2 text-success"></i>NIK:</strong> {{ $beneficiary->nik }}</p>
                <p><strong><i class="fa-solid fa-map-marker-alt me-2 text-success"></i>Alamat:</strong> {{ $beneficiary->alamat }}</p>
                <p><strong><i class="fa-solid fa-phone me-2 text-success"></i>No Telepon:</strong> {{ $beneficiary->no_telepon ?? '-' }}</p>
                <p><strong><i class="fa-solid fa-venus-mars me-2 text-success"></i>Jenis Kelamin:</strong> {{ $beneficiary->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                <p><strong><i class="fa-solid fa-cake-candles me-2 text-success"></i>Tanggal Lahir:</strong> {{ $beneficiary->tanggal_lahir }}</p>
                <p><strong><i class="fa-solid fa-wallet me-2 text-success"></i>Status Ekonomi:</strong> {{ ucfirst($beneficiary->status_ekonomi) }}</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('beneficiaries.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
