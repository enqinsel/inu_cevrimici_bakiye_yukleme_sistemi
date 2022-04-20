<?php
include_once "baglanti.php";
$numara=$_GET['arama'];
$sql="SELECT * FROM users WHERE numara='$numara'";
$veriseti = $baglan->query($sql);
$satir = $veriseti->fetch(PDO::FETCH_ASSOC);
$kayitsayisi = $veriseti->rowCount();
if ($kayitsayisi <1){
    echo "<strong>$numara</strong> geçersiz numara";
} else {
	$utip  = $satir['utip'];
	$utip=$satir['utip'];$ad=$satir['ad'];$soyad=$satir['soyad'];$bolum=$satir['bolum'];
	$para = $baglan->query("SELECT * FROM ucret WHERE utip=$utip")->fetch(PDO::FETCH_ASSOC)['ucret'];
	$bakiye=$satir['bakiye'];
	if($bakiye<$para){
		echo "($ad $soyad) Bakiye ($bakiye) yetersiz... ".($para-$bakiye)." TL eksik.";
	} else {
		$bakiye-=$para;  // yeni miktarı, önceki bakiyesine ekleyelim
		$baglan->exec("update users set bakiye=$bakiye where numara=$numara"); //yeni bakiye tabloya kaydedildi.	
		echo "<center>($ad $soyad) Bakiyeden $para ₺ kesildi; kalan bakiye:$bakiye</center>";
	}
}
?>

