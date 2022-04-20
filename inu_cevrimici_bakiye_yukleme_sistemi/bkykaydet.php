<?php
include_once "baglanti.php";
extract($_GET);

include_once "baglanti.php";
$numara=$_GET['arama'];
$sql="SELECT * FROM users WHERE numara='$numara'";
$veriseti = $baglan->query($sql);
$satir = $veriseti->fetch(PDO::FETCH_ASSOC);
$kayitsayisi = $veriseti->rowCount();
if ($kayitsayisi <1){
    die('girdiğiniz numara yanlış');
}
//$ad=$satir['ad'];$soyad=$satir['soyad'];$bolum=$satir['bolum'];
$bakiye=$satir['bakiye']+$para;  // yeni miktarı, önceki bakiyesine ekleyelim
$baglan->exec("update users set bakiye=$bakiye where numara=$arama"); //yeni bakiye tabloya kaydedildi.
$tarih=Date('Y-m-d')
?>
<div class="col-md-12">
    <div class="col-md-5 mt-5"><strong>TUTAR (TL) :</strong></div>
    <div class="col-md-7 tl">
        <input name="para" id="para" value="" type="text" class="form-control " placeholder="değer gir" required>
        <div class="lab"><img src="img/tl.jpg" alt=""></div>
    </div>
    <div class="col-md-5 mt-5"></div>
    <div class="col-md-7 mt-20 text-right">
        <a href="#" onclick="bakiyekaydet()" class="btn btn-warning pl-30 pr-30">
            Yükle
        </a>
    </div>
    <div class="col-md-5 mt-25"><strong>BAKİYE (TL) :</strong></div>
    <div class="col-md-7 mt-20 "> <?php echo $bakiye; ?> </div>
    <div class="col-md-12 mt-30  baslik3 text-center"><strong class="saat"></strong></div>
    <!--<div class="col-md-12 mt-20  baslik3 text-center"><strong class="tarih"></strong></div>-->
</div>

