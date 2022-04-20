<?php
////////////////////////////////////////////////////bu atıl kaldı ...
include_once "baglanti.php";
extract($_GET);
$numara=$_GET['arama'];
$sql="SELECT * FROM users WHERE numara='$numara'";
$veriseti = $baglan->query($sql);
$satir = $veriseti->fetch(PDO::FETCH_ASSOC);
$kayitsayisi = $veriseti->rowCount();
if ($kayitsayisi <1){
    die('girdiğiniz numara yanlış');
}
$utip=$satir['utip'];$ad=$satir['ad'];$soyad=$satir['soyad'];$bolum=$satir['bolum'];
$bakiye=$satir['bakiye']-$para;  // yeni miktarı, önceki bakiyesine ekleyelim
$baglan->exec("update users set bakiye=$bakiye where numara=$arama"); //yeni bakiye tabloya kaydedildi.
$tarih=Date('Y-m-d')
?>
<div class="col-md-12">
    <div class="col-md-5 mt-25"><strong>BAKİYE (TL) :</strong></div>
    <div class="col-md-7 mt-20 "> <?php echo $bakiye; ?> </div>
    <div class="col-md-12 mt-30  baslik3 text-center" > <?php echo "$ad $soyad ($bolum)"; ?> </strong></div>
	<input type="hidden" name="utype" id="utype" value="<?php echo $utip; ?>">
</div>


