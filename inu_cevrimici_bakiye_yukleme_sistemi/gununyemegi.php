<?php
//echo "<pre>";var_dump($_GET);echo "<pre>";die();
include_once 'baglanti.php';
//bugünün tarihin gün, ay ve yılını alalım:
$gun=$_GET['g']; $ay=$_GET['a']; $yil=$_GET['y']; $yemekvar=true;
//bugün yemek var mı?
$yemek1='';$yemek2='';$yemek3='';$yemek4='';
$sql="SELECT * FROM aylikmenu WHERE yil='$yil' and ay='$ay' and gun='$gun'";
$veriseti = $baglan->query($sql);
$gunlukmenu = $veriseti->fetch(PDO::FETCH_ASSOC);
$kayitsayisi = $veriseti->rowCount();
if ($kayitsayisi <1){
    $yemekvar=false; //bugün yemek yok demektir
} else {
    //bugün yemek var, o yemeklerin kodlarını alalım...
    $yemek1=$gunlukmenu['yemek1'];
    $yemek2=$gunlukmenu['yemek2'];
    $yemek3=$gunlukmenu['yemek3'];
    $yemek4=$gunlukmenu['yemek4'];
    //bugün yemek var, şimdi yemeklerin adlarını katalogdan öğrenelim alalım...
    $yemek = $baglan->query("SELECT * FROM y_katalog where y_id='$yemek1'")->fetch(PDO::FETCH_ASSOC);
    $yemek1=$yemek['ad']; $kalori1=$yemek['kalori']; $resim1=$yemek['resim'];
    $yemek = $baglan->query("SELECT * FROM y_katalog where y_id='$yemek2'")->fetch(PDO::FETCH_ASSOC);
    $yemek2=$yemek['ad']; $kalori2=$yemek['kalori']; $resim2=$yemek['resim'];
    $yemek = $baglan->query("SELECT * FROM y_katalog where y_id='$yemek3'")->fetch(PDO::FETCH_ASSOC);
    $yemek3=$yemek['ad']; $kalori3=$yemek['kalori']; $resim3=$yemek['resim'];
    $yemek = $baglan->query("SELECT * FROM y_katalog where y_id='$yemek4'")->fetch(PDO::FETCH_ASSOC);
    $yemek4=$yemek['ad']; $kalori4=$yemek['kalori']; $resim4=$yemek['resim'];
}
if(!$yemekvar) {
    echo "Tarih:$gun.$ay.$yil<br/>";
    echo "Bugün yemek yok maalesef!...";
}else{
    ?>
    <div class="col-md-3">
        <div class="col-md-12 cerceve1"> <img src="resimler/<?php echo $resim1; ?>" class="img-responsive" alt="1. yemek">  </div>
        <div class="col-md-12 baslik1 mt-10 text-center">
            <?php echo $yemek1; ?>
        </div>
        <div class="col-md-12 baslik2 mt-10 text-center">
            <?php echo $kalori1; ?>Cal
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-md-12 cerceve1">
            <img src="resimler/<?php echo $resim2; ?>" class="img-responsive" alt="2. yemek"> 
        </div>
        <div class="col-md-12 baslik1 mt-10 text-center">
            <?php echo $yemek2; ?>
        </div>
        <div class="col-md-12 baslik2 mt-10 text-center">
            <?php echo $kalori2; ?>Cal
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-md-12 cerceve1">
            <img src="resimler/<?php echo $resim3; ?>" class="img-responsive" alt="3. yemek"> 
        </div>
        <div class="col-md-12 baslik1 mt-10 text-center">
            <?php echo $yemek3; ?>
        </div>
        <div class="col-md-12 baslik2 mt-10 text-center">
            <?php echo $kalori3; ?>Cal
        </div>
    </div>
    <div class="col-md-3">
        <div class="col-md-12 cerceve1">
            <img src="resimler/<?php echo $resim4; ?>" class="img-responsive" alt="4. yemek"> 
        </div>
        <div class="col-md-12 baslik1 mt-10 text-center">
            <?php echo $yemek4; ?>
        </div>
        <div class="col-md-12 baslik2 mt-10 text-center">
            <?php echo $kalori4; ?>Cal
        </div>
    </div>
<?php } ?>
