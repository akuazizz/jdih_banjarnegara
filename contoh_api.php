<?PHP
header("Content-Type: application/json");
$servername = "localhost";
$username = "jdihlomb_user";
$password = "HK6LZCXVE29T";
$dbname = "jdihlomb_website";
$port = "3306";
$varjson = array();
$row_array = (object)array();
$conn = new mysqli($servername.":".$port, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="select * from from produk_hukum p, kategori k WHERE p.idkat=k.idkat AND p.jenis='PH' ORDER BY p.idproduk DESC" ; //sesuaikan dengan tabel utama peraturan dan tabel relasi dari tabel utama jika ada
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
//$tahunterbit = explode("-",$row["tgl_penetapan"]);
$row_array->idData=$row["idproduk"]; //berisi id dokumen //sudah
$row_array->tahun_pengundangan=$row["tahun"]; //berisi tahun penetapan atau tahun terbit ex. 2019 //sudah
$row_array->tanggal_pengundangan=$row["tgl_penetapan"]; //berisi tahun bulan tanggal (YYYY-MM-DD) ex. 2019-04-22 //sudah
$row_array->jenis=$row["nama_kategori"]; //berisi jenis peraturan ex. Peraturan Daerah sudah
$row_array->noPeraturan=$row["nomor"]; //berisi no peraturan ex. 24 //sudah
$row_array->judul=$row["tentang"]; //sudah
$row_array->noPanggil=$row["-"]; //khusus untuk monografi/buku //belum
$row_array->singkatanJenis=$row["-"]; //berisi singkatan dari jenis ex. Perda //sudah
$row_array->tempatTerbit=$row["-"]; //berisi tempat terbit //sudah
$row_array->penerbit=$row["-"]; //untuk dokumen bertipe monografi //belum
$row_array->deskripsiFisik=$row["-"]; //khusus untuk monografi/buku //lewati
$row_array->sumber=$row["-"]; //Lembar daerah atau menyesuaikan //sudah
$row_array->subjek=$row["-"]; //Kata kunci dari dokumen hukum //belum
$row_array->isbn=$row["-"]; //khusus untuk monografi/buku //belum
$row_array->status=$row["status"]; //berisi status perundang undangan //sudah
$row_array->bahasa=$row["-"]; //indonesia atau inggris //sudah
$row_array->bidangHukum=$row["-"]; //pembidangan dokumen hukum //belum
$row_array->teuBadan=$row["-"]; //nama instansi terkait //lewati
$row_array->nomorIndukBuku=$row["-"]; //khusus untuk monografi/buku //belum
$row_array->fileDownload=$row["nama_file"]; //berisi nama file ex. peraturan.pdf, peraturan.docx //sudah
//$row_array->urlDownload=$row["url"]; //sesuaikan pointing ke lokasi direktori storage file download
$row_array->urlDownload='https://jdih.lomboktimurkab.go.id/download.php?id=159&filename='.$row['jdihproduk_file']; //berisi url dan nama file ex. domain.com/peraturan.pdf //sudah
//$row_array->urlDownload='http://jdih.instansi.go.id/ildis/www/storage/document/'.$file; //
$row_array->urlDetailPeraturan=$row["-"]; //berisi link peraturan // belum
$row_array->operasi="4"; //sudah
      $row_array->display="1"; //sudah
      array_push($varjson,json_decode(json_encode($row_array)));
    }
    echo json_encode($varjson);
} else {
    echo "0 results";
}
$conn->close();
?>