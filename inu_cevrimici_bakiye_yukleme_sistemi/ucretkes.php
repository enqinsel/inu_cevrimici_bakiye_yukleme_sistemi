<!-- bu atıl kaldı ... -->
<?php ob_start();if(!isset($_SESSION)){session_start();} ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>İNÜ Kampüs Kart</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="stil.css" rel="stylesheet">
        <link href="default.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
        <script>
            ucretkes=function(x){
                var ar=document.getElementById("arama").value;
                var gp=document.getElementById("para").value;
				gp=gp.trim();
				if(gp=='') gp=0; //alert(ar+" -- "+gp);
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bky").innerHTML = this.responseText;
                    }
                };
                var prg = "ucretkeskaydet.php?arama="+ar+"&para="+gp;
                xmlhttp.open("GET",prg,true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
    <form name="f1" id="f1" action="" method="post">
        <div class="container-fluid header1">
            <div class="row mt-10 mb-10">
                <div class="col-md-1 pl-40 pr-40"><img src="img/logo.png" class="img-responsive" alt=""></div>
                <div class="col-md-8 baslik2 mt-10">Kampüs Kart Çevrimiçi Bakiye Yükleme Sistemi</div>
                <div class="col-md-1 pl-40 pr-40"><img src="img/cigerizm_logo.png" class="img-responsive" alt=""></div>
                <div class="col-md-1 mt-10"> İNÖNÜ ÜNİVERSİTESİ</div>
                <div class="col-md-1">  <a href="index.html" name="" id="" class="btn btn-warning pl-30 pr-30">Çıkış</a></div>
            </div>
        </div>
        <div class="container mt-70">
            <div class="row"  style="display: flex">
                <div class="col-md-5  card1 p30">
                    <div class="row">
                        <div class="col-md-12">
						    <script>
							   <?php
								include_once "baglanti.php";
								$tarih=Date('Y-m-d');
								$numara=$_POST['arama'];
								$numara=trim($numara);
								$ad='';$soyad='';$bolum='';$bakiye='....';$utip='';$ad='';$soyad='';$bolum='';$bakiye='....';$para=0;
								if($numara!=''){
									$sql="SELECT * FROM users WHERE numara='$numara'";
									$veriseti = $baglan->query($sql);
									$satir = $veriseti->fetch(PDO::FETCH_ASSOC);
									$kayitsayisi = $veriseti->rowCount(); 
									if ($kayitsayisi<1){
										$utip='';$ad='';$soyad='';$bolum='';$bakiye='....';$para=0;
									}else{
									   $utip=$satir['utip'];$ad=$satir['ad'];$soyad=$satir['soyad'];$bolum=$satir['bolum'];$bakiye=$satir['bakiye'];
									}
								}
								?>							 
							</script>
							<div class="col-md-5 mt-5"><strong>NUMARA :</strong></div>
							<div class="col-md-7 tl">
								<input name="para" id="arama" value="<?php echo $numara; ?>" type="text" 
																		class="form-control " placeholder="numara girin" required>
							</div>    
							<div class="col-md-5 mt-5"><strong>TUTAR (TL) :</strong></div>
							<div class="col-md-7 tl">
								<input name="para" id="para" value="" type="text" class="form-control " placeholder="değer gir" required>
								<div class="lab"><img src="img/tl.jpg" alt=""></div>
							</div>
							<div class="col-md-5 mt-5"></div>
							<div class="col-md-7 mt-20 text-right">
								<a href="#" onclick="ucretkes(1)" class="btn btn-warning pl-30 pr-30">
									Ücret Kes
								</a>
							</div>							
							<span  id="bky">
							   <script> ucretkes(0); </script>
							</span>
							<div class="col-md-12 mt-30  baslik3 text-center" Style="font-size:8pt;"> Yeni numara ve 0 lira girerek başka birinin bakiyesini kontrol edebilirsiniz.</div>							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
                src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
                crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    </form>
    </body>
    </html>
<?php ob_end_flush();?>