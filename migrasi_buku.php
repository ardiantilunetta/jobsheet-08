<?php
require __DIR__ . '/includes/koneksi.php';

$data = json_decode(
    file_get_contents('C:\Kuliah\Semester 3\Pemrograman Web\PemogramanWeb2026\kode-praktikum\jobsheet-06\data\buku.json'),
    true
);

$stmt = $pdo->prepare(
    "INSERT INTO buku (judul, pengarang, tahun, stok, kategori)
     VALUES (:judul, :pengarang, :tahun, :stok, :kategori)"
);

foreach ($data as $buku) {
    $stmt->execute([
        'judul' => $buku['judul'],
        'pengarang' => $buku['pengarang'],
        'tahun' => $buku['tahun'],
        'stok' => $buku['stok'],
        'kategori' => $buku['kategori']
    ]);
}

echo "Migrasi berhasil. Data buku sudah masuk ke database.";