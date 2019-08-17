<?php
// define('VR',3.14);
// echo(VR*2);
$b=null; // alas
$r=null; // miring
$br=null; // b/r
$sj=null; // sudut juring
$t=null; // panjang tabung
if(isset($_POST['slr'])){
	$slr = $_POST['slr'];
  $r=145/2; // konstant 72.5
  $t=304;
  // =IF(AND(C11>=0,C11<=C13),C13-C11,IF(AND(C11>C13,C11<2*C13),C11-C13,C13))
  // C11=$slr, C13=$r, C12=$b, C14=$br, C16=$t, E19= $ls ,F19=$vs,
  // $br=C12/C13
  // $sj=DEGREES(ACOS($br))*2
  if($slr >= 0 && $slr <= $r){
    $b=$r-$slr;
    }
  elseif($slr > $r && $slr < (2*$r)){
    $b=$slr-$r;
    }
  else{
    $b=$r;
    }
  $br=$b/$r;
  $sj=rad2deg(acos($br))*2;
  // (22/7)/360*2*(DEGREES(ACOS(C12/C13)))*(C13^2)
  $lj= (22/7)/360*($sj*($r*$r)); // E18
  // =E18*$C$16
  $vj = $lj*$t;
  // F18/1000 => liter juring
  $ltj= $vj/1000;
  /* luas sgt = 
     2*( (1/2)*C12*C13* (SIN(RADIANS(DEGREES(ACOS(C12/C13))))) )
  */
  $ls = 2*(0.5*$b*$r*(sin(deg2rad(rad2deg(acos($br)))))); // E19
  // v sgt = E19*$C$16
  $vs=$ls*$t;
  // l sgt = F19/1000
  $lsg=$vs/1000;
  // luas temberang : E18-E19
  $lt= $lj-$ls; // E20
  // volum temberang : E20*$C$16
  $vt=$lt*$t; // F20
  // liter temberang : F20/1000
  $ltt=$vt/1000;
  // luas lingkar : (22/7)*(C13^2)
  $ll = (22/7)*($r*$r); // E21
  //volum lingkaran = E21*$C$16
  $vl = $ll*$t; // F21
  // liter lingkaran = F21/1000
  $ltl = $vl/1000; // G21
  // ls > r   ==> L.Lingkaran - L.Temberang  = E21-E20
  $x1= $ll-$lt;
  // ls = r   ==> 1/2 L.Lingkaran = E21/2
  $x2=$ll/2;
  // luas daerah ukur = IF(C11=2*C13,E21,IF(AND(C11<2*C13,C11>C13),E21-E20,IF(C11=C13,E21/2,IF(AND(C11<C13,C11>0),E20,E21))))
  if($slr==(2*$r)){
    $x3=$ll;
	}
  elseif(($slr<(2*$r)) && ($slr > $r)){
    $x3=$ll-$lt;
	} 
  elseif($slr == $r){
    $x3=$ll/2;
	}
  elseif($slr < $r && $slr > 0){
    $x3=$lt;
    }
  else{
    $x3=$ll; // E28
	}
  // volum daerah ukur : E28*$C$16
  $x4=$x3*$t; // F28
  // liter daerah ukur : F28/1000	
  $x5=$x4/1000;	
  }
?>


<form action="" method="post">
<table width="350" border="0" cellpadding="0" cellspacing="0" class="bottom-link">
<tr>
  <td class="friendsList">&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center">&nbsp;</td>
</tr>
<tr>
  <td class="friendsList">&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center">&nbsp;</td>
</tr>
<tr>
  <td width="102" class="friendsList">&nbsp;</td>
  <td width="11">&nbsp;</td>
  <td width="237" align="center"><span class="friendsList">PERHITUNGAN TANGKI MINGGUAN </span></td>
</tr>
<tr>
  <td class="friendsList">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="friendsList">&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="friendsList">Stick Tangki </td>
  <td><div align="center" class="friendsList">:</div></td><td><div align="left">
    <input type="text" name="slr" size="12" value="<? echo $slr ?>" />
    <span class="friendsList">Cm</span></div></td></tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td colspan="3">

        <div align="center">
          <input name="submit" type="submit" class="orangebutton" value="Calculate" />
        </div>
    </td>
</tr>
<tr>
  <td colspan="3">&nbsp;</td>
</tr>
<tr>
  <td colspan="3" class="saveFeaturedBut" style="font-size:12px"><?
/*
echo "Alas : "."$b <br>";
echo "Miring : "."$r <br>";
echo "b/r : "."$br <br>";
echo "Sudut Juring : "."$sj <br>";
echo "Panjang tabung : "."$t <br>";
echo "Luas Juring : "."$lj<br>";
echo "Volume Juring : "."$vj<br>";
echo "Liter Juring : "."$ltj<br>";
echo "Luas sgt : "."$ls<br>";
echo "Volume sgt : "."$vs<br>";
echo "Liter sgt : "."$lsg<br>";
echo "Luas Temberang : "."$lt<br>";
echo "Volume Temberang : "."$vt<br>";
echo "Liter Temberang : "."$ltt<br>";
echo "Luas lingkar : "."$ll<br>";
echo "volum lingkar : "."$vl<br>";
echo "liter lingkar : "."$ltl<br>";
echo "ls > r   ==> L.Lingkaran - L.Temberang : "."$x1<br>";
echo "ls = r   ==> 1/2 L.Lingkaran : "."$x2<br>";
echo "luas daerah ukur : "."$x3<br>";
echo "volum daerah ukur : "."$x4<br>";
*/
echo "volume solar : "."<u>$x5 </u></&nbsp>"; echo "liter";
?></td>
</tr>
</table>
</form>
<script language='javascript'>
<?php
  if($slr > 150){
?>
alert('Loe Kira Gw Gembrot!!!!');
<?php
  }
?>
</script>