# 📋 Aplikasi CRUD Pendataan Bantuan Sosial

**Alfin Febriyanto - STI202202890**

Selamat datang di repository aplikasi **Pendataan Penerima Bantuan Sosial** menggunakan **Laravel 12**. Aplikasi ini dibuat sebagai proyek sederhana namun fungsional untuk melakukan CRUD (Create, Read, Update, Delete) data penerima bantuan dengan validasi dan tampilan responsif berbasis Bootstrap.

---

## 🗄️ Bagian 1: Rancangan Database

Aplikasi ini menggunakan satu tabel utama bernama `beneficiaries`, yang menyimpan data penerima bantuan.

### 📑 Struktur Tabel:
- `id`: Primary key, auto-increment.
- `nama_lengkap`: Nama lengkap penerima (string).
- `nik`: Nomor Induk Kependudukan, unik (16 karakter).
- `alamat`: Alamat lengkap (text).
- `no_telepon`: Nomor telepon (opsional, maksimal 15 karakter).
- `jenis_kelamin`: Enum: `'L'` (Laki-laki), `'P'` (Perempuan).
- `tanggal_lahir`: Tanggal lahir (date).
- `status_ekonomi`: Enum: `'miskin'`, `'menengah'`, `'mampu'`.
- `timestamps`: Kolom `created_at` dan `updated_at`.

### 🛠️ Kode Migrasi
```php
Schema::create('beneficiaries', function (Blueprint $table) {
    $table->id();
    $table->string('nama_lengkap');
    $table->string('nik', 16)->unique();
    $table->text('alamat');
    $table->string('no_telepon', 15)->nullable();
    $table->enum('jenis_kelamin', ['L', 'P']);
    $table->date('tanggal_lahir');
    $table->enum('status_ekonomi', ['miskin', 'menengah', 'mampu']);
    $table->timestamps();
});
