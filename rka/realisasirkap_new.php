<?php session_start();

$_SESSION["jabatanx"] = "Jr. Librarian ODR";
 ?>
<html>
 <head>
  <title>Laporan Realisasi rkap Divisi OPT Bagian TIK</title>
  
 </head>
 <body>

<br />
			<form id="form1" name="form1" method="GET">
			<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td >Tahun : <input  name="txtcheck" type="text" id="txtckeck" style="width:100px"/><input name="cari" type="submit" class="lheadline" value="Cari" /></td>
				
			</tr>
			
			</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              
              <tr>
                <td><div align="center">
                  <?php
        // Deklarasi variable untuk koneksi ke database.
        $host     = "126.2.0.142";        // Server database
        $username = "app";             // Username database
        $password = "12345678";       // Password database
        $database = "db_dashtik";     			// Nama database

        // Koneksi ke database.
        $conn = new mysqli($host, $username, $password, $database);

        

//$Tahun    = "'" . $_GET["txtcheck"] . "'"; // harus dibuat isian untuk memasukan tahun

$Tahun=date("Y-m");
if (isset($_GET["txtcheck"])){
$Tahun=$_GET["txtcheck"];
}
//Define nomor rekening GL yang akan dipergunakan 
$JmlRek   = 0;
$NoRek    = array();
$NamaRek  = array();
//if ($Tahun='2010' && $Tahun='2011' && $Tahun='2012') {
if (($Tahun == '2007' ) ||($Tahun == '2008' ) ||($Tahun == '2009' ) ||($Tahun == '2010' ) || ( $Tahun == '2011') || ($Tahun == '2012' )) {
$queryx = " SELECT DISTINCT no_rek, nama_gl FROM par_rek ORDER BY no_rek ASC ";
} else {
$queryx = " SELECT DISTINCT no_rek, nama_gl FROM par_rek WHERE no_rek !='521-030-00-0405' and no_rek!='521-030-00-0402' ORDER BY no_rek ASC ";
}
$query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
$n=0;
foreach($result as $row)
{
 $n++;
 $NoRek[$n]  = $row['no_rek'];
 $NamaRek[$n]= $row['nama_gl'];
}
$JmlRek = $n;



//Define Nilai Usulan rkap Sesuai Tahun Yang Di Cari 
$Usulrkap = array();

for ($i = 1; $i <= $JmlRek; $i++)
{
$queryx = " SELECT usulan_rkap " . 
          " FROM form_rkap " .
          " WHERE tahun = '$Tahun' and no_rek = '$NoRek[$i]' ";
$query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
if ($result){
foreach($result as $row)
 {
  $Usulrkap[$i] = $row['usulan_rkap'];
 }
}else {
	$Usulrkap[$i] =0;
}
}
//var_dump($Usulrkap);

//Define Realisasi Triwulan I Tahun Yang Di Cari 
$Triwulan1    = Array();
$TotTriwulan1 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE (tanggal like '$Tahun-01%' ". 
          "        or tanggal like '$Tahun-02%' " .
          "        or tanggal like '$Tahun-03%') " .
          "       and no_reks = '$NoRek[$i]' " ; 
 $Triwulan1[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Triwulan1[$NoRek[$i]] = $Triwulan1[$NoRek[$i]] + $row['jumlah'];
 }
 $TotTriwulan1 = $TotTriwulan1 + $Triwulan1[$NoRek[$i]];
}



//Define Realisasi Triwulan II Tahun Yang Di Cari 
$Triwulan2    = Array();
$TotTriwulan2 =  0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE (tanggal like '$Tahun-04%' ". 
          "        or tanggal like '$Tahun-05%' " .
          "        or tanggal like '$Tahun-06%') " .
          "       and no_reks = '$NoRek[$i]' " ; 
 $Triwulan2[$NoRek[$i]] = 0;
  $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Triwulan2[$NoRek[$i]] = $Triwulan2[$NoRek[$i]] + $row['jumlah'];
 }
 $TotTriwulan2 = $TotTriwulan2 + $Triwulan2[$NoRek[$i]];
}



//Define Realisasi Triwulan III Tahun Yang Di Cari 
$Triwulan3    = Array();
$TotTriwulan3 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE (tanggal like '$Tahun-07%' ". 
          "        or tanggal like '$Tahun-08%' " .
          "        or tanggal like '$Tahun-09%') " .
          "       and no_reks = '$NoRek[$i]' " ; 
 $Triwulan3[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Triwulan3[$NoRek[$i]] = $Triwulan3[$NoRek[$i]] + $row['jumlah'];
 }
 $TotTriwulan3 = $TotTriwulan3 + $Triwulan3[$NoRek[$i]];
}



//Define Realisasi Triwulan IV Tahun Yang Di Cari 
$Triwulan4    = Array();
$TotTriwulan4 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE (tanggal like '$Tahun-10%' ". 
          "        or tanggal like '$Tahun-11%' " .
          "        or tanggal like '$Tahun-12%') " .
          "       and no_reks = '$NoRek[$i]' " ; 
 $Triwulan4[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Triwulan4[$NoRek[$i]] = $Triwulan4[$NoRek[$i]] + $row['jumlah'];
 }
 $TotTriwulan4 = $TotTriwulan4 + $Triwulan4[$NoRek[$i]];
}

//Define Realisasi Bulan I Tahun Yang Di Cari 
$Bulan1    = Array();
$TotBulan1 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-01%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan1[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan1[$NoRek[$i]] = $Bulan1[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan1 = $TotBulan1 + $Bulan1[$NoRek[$i]];
}

//Define Realisasi Bulan II Tahun Yang Di Cari 
$Bulan2    = Array();
$TotBulan2 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-02%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan2[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan2[$NoRek[$i]] = $Bulan2[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan2 = $TotBulan2 + $Bulan2[$NoRek[$i]];
}

//Define Realisasi Bulan III Tahun Yang Di Cari 
$Bulan3    = Array();
$TotBulan3 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-03%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan3[$NoRek[$i]] = 0;
  $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan3[$NoRek[$i]] = $Bulan3[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan3 = $TotBulan3 + $Bulan3[$NoRek[$i]];
}

//Define Realisasi Bulan IV Tahun Yang Di Cari 
$Bulan4    = Array();
$TotBulan4 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-04%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan4[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan4[$NoRek[$i]] = $Bulan4[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan4 = $TotBulan4 + $Bulan4[$NoRek[$i]];
}

//Define Realisasi Bulan V Tahun Yang Di Cari 
$Bulan5    = Array();
$TotBulan5 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-05%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan5[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan5[$NoRek[$i]] = $Bulan5[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan5 = $TotBulan5 + $Bulan5[$NoRek[$i]];
}

//Define Realisasi Bulan VI Tahun Yang Di Cari 
$Bulan6    = Array();
$TotBulan6 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-06%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan6[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan6[$NoRek[$i]] = $Bulan6[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan6 = $TotBulan6 + $Bulan6[$NoRek[$i]];
}

//Define Realisasi Bulan VII Tahun Yang Di Cari 
$Bulan7    = Array();
$TotBulan7 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-07%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan7[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan7[$NoRek[$i]] = $Bulan7[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan7 = $TotBulan7 + $Bulan7[$NoRek[$i]];
}

//Define Realisasi Bulan VIII Tahun Yang Di Cari 
$Bulan8    = Array();
$TotBulan8 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-08%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan8[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan8[$NoRek[$i]] = $Bulan8[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan8 = $TotBulan8 + $Bulan8[$NoRek[$i]];
}

//Define Realisasi Bulan IX Tahun Yang Di Cari 
$Bulan9    = Array();
$TotBulan9 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-09%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan9[$NoRek[$i]] = 0;
  $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan9[$NoRek[$i]] = $Bulan9[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan9 = $TotBulan9 + $Bulan9[$NoRek[$i]];
}

//Define Realisasi Bulan X Tahun Yang Di Cari 
$Bulan10    = Array();
$TotBulan10 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-10%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan10[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan10[$NoRek[$i]] = $Bulan10[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan10 = $TotBulan10 + $Bulan10[$NoRek[$i]];
}

//Define Realisasi Bulan XI Tahun Yang Di Cari 
$Bulan11    = Array();
$TotBulan11 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-11%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan11[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $Bulan11[$NoRek[$i]] = $Bulan11[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan11 = $TotBulan11 + $Bulan11[$NoRek[$i]];
 echo $TotBulan11;
}

//Define Realisasi Bulan XII Tahun Yang Di Cari 
$Bulan12    = Array();
$TotBulan12 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-12%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $Bulan12[$NoRek[$i]] = 0;
  $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row) 
 {
  $Bulan12[$NoRek[$i]] = $Bulan12[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan12 = $TotBulan12 + $Bulan12[$NoRek[$i]];
}


$realisasi    = Array();
$TotRealiSasi = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $queryx = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '%$Tahun%' AND no_reks = '$NoRek[$i]' " ; 
 $realisasi[$NoRek[$i]] = 0;
 $query = $conn->query($queryx) or die('Error, #1 query failed');
$result = $query->fetch_all(MYSQLI_ASSOC);
foreach($result as $row)
 {
  $realisasi[$NoRek[$i]] = $realisasi[$NoRek[$i]] + $row['jumlah'];
 }
 $TotRealiSasi = $TotRealiSasi + $realisasi[$NoRek[$i]];
}



//Define Realisasi rkap Tahun Yang Di Cari
$Realisasirkap = array();
for ($i = 1; $i <= $JmlRek; $i++)
{
 $Realisasirkap[$NoRek[$i]] = $Bulan1[$NoRek[$i]] + $Bulan2[$NoRek[$i]] + $Bulan3[$NoRek[$i]] + $Bulan4[$NoRek[$i]] + $Bulan5[$NoRek[$i]] + $Bulan6[$NoRek[$i]] + $Bulan7[$NoRek[$i]] + $Bulan8[$NoRek[$i]] + $Bulan9[$NoRek[$i]] + $Bulan10[$NoRek[$i]] + $Bulan11[$NoRek[$i]] + $Bulan12[$NoRek[$i]];
} 


// Tampilkan Tabel Header 
echo "<tr><table>";
echo "<td nowrap fixwidth=\"100\" align=\"center\" bgcolor=\"#FAFBFC0\">";
echo "&nbsp;";
echo $Tahun;
echo "</td>";
echo "</tr></table>";
echo "<tr><table>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#E6E6FA\">"; echo "&nbsp;";
echo " Nomor Rek ";
echo "</td>";
echo "<td nowrap width=\"200\" align=\"center\" bgcolor=\"#E6A6FA\">"; echo "&nbsp;";
echo " Nama Rekening GL  ";
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FAFAFA0\">";
echo "&nbsp;";
echo "Usulan rkap $Tahun";
echo "</td>";
}
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#00FF00\">"; echo "&nbsp;";
echo "Realisasi $Tahun";
echo "</td>";
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
echo "<td nowrap width=\"75\" align=\"center\" bgcolor=\"#1E90FF\">"; echo "&nbsp;";
echo "% Realisasi";
echo "</td>";
}
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Januari";
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Pebruari";
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Maret";
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "April";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Mei";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Juni";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Juli";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Agustus";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "September";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Oktober";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Nopember";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Desember";
echo "</td>";

echo "</tr></table>";


// Tampilkan Isi Data
for ($i = 1; $i <= $JmlRek; $i++)
{
echo "<tr><table>";
echo "<td nowrap width=\"150\" align=\"center\" bgcolor=\"#E6E6FA\">"; echo "&nbsp;";
echo $NoRek[$i];
echo "</td>";
echo "<td nowrap width=\"200\" align=\"left\" bgcolor=\"#E6A6FA\">"; echo "&nbsp;";
echo $NamaRek[$i];
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FAFAFA0\">";
echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Usulrkap[$i]);
echo "</td>";
}
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#00FF00\">"; echo "&nbsp;";
echo "Rp &nbsp;&nbsp;"; echo number_format($Realisasirkap[$NoRek[$i]]);
echo "</td>";
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
// Jika Tidak Ada Usulan rkap maka Persentase = 0.00% 
if ($Usulrkap[$i] ==  0) 
{
 echo "<td nowrap width=\"75\" align=\"center\" bgcolor=\"#1E90FF\">"; echo "&nbsp;";
 echo "0.00%";
 echo "</td>";
} else 
{
 echo "<td nowrap width=\"75\" align=\"center\" bgcolor=\"#1E90FF\">"; echo "&nbsp;";
 echo round($Realisasirkap[$NoRek[$i]]/$Usulrkap[$i]*100,2); echo  "%";
 echo "</td>";
}
}
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan1[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan2[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan3[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan4[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan5[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan6[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan7[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan8[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan9[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan10[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan11[$NoRek[$i]]);
echo "</td>";
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan12[$NoRek[$i]]);
echo "</td>";
echo "</tr></table>";
}


// Tampilkan Tabel Header TOTAL 
echo "<tr><table>";

echo "<td nowrap width=\"150\" align=\"center\" >"; echo "&nbsp;";
echo "  ";
echo "</td>";
echo "<td nowrap width=\"200\" align=\"center\" bgcolor=\"#E6A6FA\">"; echo "&nbsp;";
echo " T O T  A L   ";
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
echo "<td nowrap width=\"150\" align=\"center\" >";
echo "&nbsp;";
echo "";
echo "</td>";
}
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#00FF00\">"; echo "&nbsp;";
echo "Rp &nbsp;&nbsp;"; echo number_format($TotRealiSasi);
echo "</td>";
if ($_SESSION["jabatanx"]=="Wakabag" OR $_SESSION["jabatanx"]=="Jr. Librarian ODR" OR $_SESSION["jabatanx"]=="Pgs. Kabag"){
echo "<td nowrap width=\"75\" align=\"right\"  >"; echo "&nbsp;";
echo "";
echo "</td>";
}
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan1);
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan2);
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan3);
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan4); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan5); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan6); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan7); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan8); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan9); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan10); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan11); 
echo "</td>";
echo "<td nowrap width=\"150\" align=\"right\" bgcolor=\"#FFFF00\">"; echo "&nbsp;";
echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan12); 
echo "</td>";
echo "</tr></table>";

?>
                </div></td>
              </tr>
            </table>
<!--<table>
<tr><td>
<a href="realisasirkap_topdf.php?Tahun=<?=$Tahun?>&jabatan=<?=$_SESSION['jabatanx']?>">Print To PDF</a></td></tr>
</table>
-->
			</form>	
 </body>
</html>

