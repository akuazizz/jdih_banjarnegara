<?php
header("Content-Type: application/json");

// Konfigurasi Basis Data
$servername = "localhost";
$username = "jdih.banjarnegarakab.go.id-v2";
$password = "75exjnwBFXx65XMj";
$dbname = "jdih.banjarnegarakab.go.id-v2";
$port = "3306";

// Koneksi ke Basis Data
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Query SQL
$sql = "SELECT 
            id, tipe_dokumen, jenis, singkatan_jenis, content,no_peraturan, no_panggil, 
            tgl_ditetap, tgl_diundang, tahun_diundang, tajuk_entri_utama, 
            tmp_terbit, penerbit, sumber, isbn, bahasa, bid_hukum, 
            no_induk_buku, file_url, `status`, `file`, data_url
        FROM 
            inventarisasi_hukum

        ORDER BY 
            id DESC";

$result = $conn->query($sql);

// Hasil JSON
$varjson = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $varjson[] = [
            "idData" => $row["id"], // ID dokumen
            "tipeDokumen" => $row["tipe_dokumen"], // Tipe dokumen
            "jenis" => $row["jenis"], // Jenis dokumen
            "singkatanJenis" => $row["singkatan_jenis"], // Singkatan jenis
            "noPeraturan" => $row["no_peraturan"], // Nomor peraturan
            "noPanggil" => $row["no_panggil"], // Nomor panggil
            "tanggalDitetapkan" => $row["tgl_ditetap"], // Tanggal ditetapkan
            "tanggalDiundangkan" => $row["tgl_diundang"], // Tanggal diundangkan
            "tahunDiundangkan" => $row["tahun_diundang"], // Tahun diundangkan
            "judul" => $row["content"], // Judul dokumen
            "tempatTerbit" => $row["tmp_terbit"], // Tempat terbit
            "penerbit" => $row["penerbit"], // Penerbit
            "sumber" => $row["sumber"], // Sumber dokumen
            "isbn" => $row["isbn"], // ISBN (jika ada)
            "bahasa" => $row["bahasa"], // Bahasa dokumen
            "bidangHukum" => $row["bid_hukum"], // Bidang hukum
            "nomorIndukBuku" => $row["no_induk_buku"], // Nomor induk buku
            "status" => $row["status"], // Status dokumen
            "fileDownload" => $row["file"], // Nama file
            "urlDownload" => 'https://jdih.banjarnegarakab.go.id/download.php?id=' . $row["id"] . '&filename=' . urlencode($row["file_url"]), // URL download
            "operasi" => "4", // Atribut tetap
            "display" => "1" // Atribut tetap
        ];
    }
    echo json_encode($varjson);
} else {
    echo json_encode(["message" => "No results found."]);
}

$conn->close();
?>
