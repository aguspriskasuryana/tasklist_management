<?php


include("../MPDF561/mpdf.php");
$mpdf=new mPDF();
session_start();

// Buffer the following html with PHP so we can store it to a variable later
include_once ('../pc/conf/connect_db.php');

//$Tahun    = "'" . $_GET["txtcheck"] . "'"; // harus dibuat isian untuk memasukan tahun
$Tahun=$_GET['Tahun'];

//Define nomor rekening GL yang akan dipergunakan 
$JmlRek   = 0;
$NoRek    = array();
$NamaRek  = array();
//if ($Tahun='2010' && $Tahun='2011' && $Tahun='2012') {
if (($Tahun == '2007' ) ||($Tahun == '2008' ) ||($Tahun == '2009' ) ||($Tahun == '2010' ) || ( $Tahun == '2011') || ($Tahun == '2012' )) {
$query = " SELECT DISTINCT no_rek, nama_gl FROM par_rek ORDER BY no_rek ASC ";
} else {
$query = " SELECT DISTINCT no_rek, nama_gl FROM par_rek WHERE no_rek !='521-030-00-0405' and no_rek!='521-030-00-0402' ORDER BY no_rek ASC ";
}
$result = mysql_query($query) or die('Error, #1 query failed');
$n=0;
while($row = mysql_fetch_array($result))
{
 $n++;
 $NoRek[$n]  = $row['no_rek'];
 $NamaRek[$n]= $row['nama_gl']; 
}
$JmlRek = $n;


//Define Nilai Usulan RKAP Sesuai Tahun Yang Di Cari 
$UsulRKAP = array();

for ($i = 1; $i <= $JmlRek; $i++)
{
$query = " SELECT usulan_RKAP FROM form_RKAP WHERE tahun = '$Tahun' and no_rek = '$NoRek[$i]' ";
 $result = mysql_query($query) or die('Error, #2 query failed');
 if($result){
 while($row = mysql_fetch_array($result)) 
 {
	$UsulRKAP[$i] = $row['usulan_RKAP'];
 } 
 }else {
	$UsulRKAP[$i] = 0;
 }
$TotUsul+=$UsulRKAP[$i];
}


//Define Realisasi Bulan I Tahun Yang Di Cari 
$Bulan1    = Array();
$TotBulan1 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-01%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #3 query failed');
 $Bulan1[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-02%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #4 query failed');
 $Bulan2[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-03%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #5 query failed');
 $Bulan3[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-04%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #6 query failed');
 $Bulan4[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-05%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #7 query failed');
 $Bulan5[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-06%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #8 query failed');
 $Bulan6[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-07%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #9 query failed');
 $Bulan7[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-08%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #10 query failed');
 $Bulan8[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-09%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #11 query failed');
 $Bulan9[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-10%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #12 query failed');
 $Bulan10[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
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
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-11%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #13 query failed');
 $Bulan11[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
 {
  $Bulan11[$NoRek[$i]] = $Bulan11[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan11 = $TotBulan11 + $Bulan11[$NoRek[$i]];
}

//Define Realisasi Bulan XII Tahun Yang Di Cari 
$Bulan12    = Array();
$TotBulan12 = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '$Tahun-12%' ". 
          "       and no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #14 query failed');
 $Bulan12[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
 {
  $Bulan12[$NoRek[$i]] = $Bulan12[$NoRek[$i]] + $row['jumlah'];
 }
 $TotBulan12 = $TotBulan12 + $Bulan12[$NoRek[$i]];
}


$realisasi    = Array();
$TotRealiSasi = 0;
for ($i = 1; $i <= $JmlRek; $i++)
{
 $query = " SELECT jumlah " .
          " FROM form_biaya " .
          " WHERE tanggal like '%$Tahun%' AND no_reks = '$NoRek[$i]' " ; 
 $result = mysql_query($query) or die('Error, #6 query failed');
 $realisasi[$NoRek[$i]] = 0;
 while($row = mysql_fetch_array($result)) 
 {
  $realisasi[$NoRek[$i]] = $realisasi[$NoRek[$i]] + $row['jumlah'];
 }
 $TotRealiSasi = $TotRealiSasi + $realisasi[$NoRek[$i]];
}

//Define Realisasi RKAP Tahun Yang Di Cari
$RealisasiRKAP = array();
for ($i = 1; $i <= $JmlRek; $i++)
{
 $RealisasiRKAP[$NoRek[$i]] = $Bulan1[$NoRek[$i]] + $Bulan2[$NoRek[$i]] + $Bulan3[$NoRek[$i]] + $Bulan4[$NoRek[$i]] + $Bulan5[$NoRek[$i]] + $Bulan6[$NoRek[$i]] + $Bulan7[$NoRek[$i]] + $Bulan8[$NoRek[$i]] + $Bulan9[$NoRek[$i]] + $Bulan10[$NoRek[$i]] + $Bulan11[$NoRek[$i]] + $Bulan12[$NoRek[$i]];
} 

ob_start();
?>
<p><h2>Laporan Realisasi RKAP Divisi TSI Bagian OSD - DRC TAHUN <?=$Tahun;?></h2></p>

<table align="center" width="100%" cellpadding="0" cellspacing="0" border="1">
<!-- header -->
<tr>
<td align="center">Nomor Rekening</td>
<td align="center">Nama Rekening GL</td>
<td align="center">Usulan</td>
<td align="center">Realisasi</td>
<td align="center">Realisasi (%)</td>
<td align="center">Januari</td>
<td align="center">Februari</td>
<td align="center">Maret</td>
<td align="center">April</td>
<td align="center">Mei</td>
<td align="center">Juni</td>
<td align="center">Juli</td>
<td align="center">Agustus</td>
<td align="center">September</td>
<td align="center">Oktober</td>
<td align="center">November</td>
<td align="center">Desember</td>
</tr>

<!-- Isi Table -->
<? for ($i = 1; $i <= $JmlRek; $i++)
{
?>
<tr>
<td align="Justify"><?=$NoRek[$i]?></td>
<td align="justify"><?=$NamaRek[$i]?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($UsulRKAP[$i]);?></td>
<td align="right"><? echo "Rp &nbsp;&nbsp;"; echo number_format($RealisasiRKAP[$NoRek[$i]]);?></td>
<?// Jika Tidak Ada Usulan RKAP maka Persentase = 0.00% 
if ($UsulRKAP[$i] ==  0) 
{
 echo "<td align='left'>"; echo "&nbsp;";
 echo "0.00%";
 echo "</td>";
} else 
{
 echo "<td align='right'>"; echo "&nbsp;";
 echo round($RealisasiRKAP[$NoRek[$i]]/$UsulRKAP[$i]*100,2); echo  "%";
 echo "</td>";
}?>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan1[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan2[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan3[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan4[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan5[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan6[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan7[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan8[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan9[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan10[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan11[$NoRek[$i]]);?></td>
<td align="right"><? echo "Rp&nbsp;&nbsp;"; echo number_format($Bulan12[$NoRek[$i]]);?></td>
</tr>
<? } ?>

<tr>
<td></td>
<td>TOTAL</td>
<td><? echo "Rp &nbsp;&nbsp;"; echo number_format($TotUsul);?></td>
<td align="right"><? echo "Rp &nbsp;&nbsp;"; echo number_format($TotRealiSasi);?></td>
<td><?  echo round($TotRealiSasi/$TotUsul*100,2); echo  "%";?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan1);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan2);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan3);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan4);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan5);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan6);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan7);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan8);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan9);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan10);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan11);?></td>
<td align="right"><? echo "Rp.&nbsp;&nbsp;"; echo number_format($TotBulan12);?></td>

</tr>
</table>

<?
	// Now collect the output buffer into a variable
$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$namafile=$Tahun."_RKAP_ODR.pdf";
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
//$mpdf->Output("Data/".$namafile,'F');
$mpdf->Output($namafile,'D');
exit;


?>
