<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerima Bantuan</title>
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
            margin-bottom: 30px;
            text-align: center;
            animation: fadeInDown 0.8s ease;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.07);
            animation: fadeInUp 0.8s ease;
        }

        label {
            font-weight: 600;
            color: #2e7d32;
        }

        .form-control:focus {
            border-color: #81c784;
            box-shadow: 0 0 0 0.2rem rgba(129, 199, 132, 0.25);
        }

        .form-control:hover {
            border-color: #66bb6a;
        }

        .btn-primary {
            background-color: #4caf50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #388e3c;
        }

        .btn-secondary {
            background-color: #a5d6a7;
            color: #1b5e20;
            border: none;
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
        <h1><i class="fa-solid fa-pen-to-square me-2"></i>Edit Penerima Bantuan</h1>
        <form action="{{ route('beneficiaries.update', $beneficiary) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label"><i class="fa fa-user me-1"></i> Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ $beneficiary->nama_lengkap }}" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label"><i class="fa fa-id-card me-1"></i> NIK</label>
                <input type="text" name="nik" class="form-control" value="{{ $beneficiary->nik }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label"><i class="fa fa-map-marker-alt me-1"></i> Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $beneficiary->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label"><i class="fa fa-phone me-1"></i> No Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="{{ $beneficiary->no_telepon }}">
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label"><i class="fa fa-venus-mars me-1"></i> Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="L" {{ $beneficiary->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $beneficiary->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label"><i class="fa fa-calendar-alt me-1"></i> Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $beneficiary->tanggal_lahir }}" required>
            </div>

            <div class="mb-3">
                <label for="status_ekonomi" class="form-label"><i class="fa fa-wallet me-1"></i> Status Ekonomi</label>
                <select name="status_ekonomi" class="form-control" required>
                    <option value="miskin" {{ $beneficiary->status_ekonomi == 'miskin' ? 'selected' : '' }}>Miskin</option>
                    <option value="menengah" {{ $beneficiary->status_ekonomi == 'menengah' ? 'selected' : '' }}>Menengah</option>
                    <option value="mampu" {{ $beneficiary->status_ekonomi == 'mampu' ? 'selected' : '' }}>Mampu</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('beneficiaries.index') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
