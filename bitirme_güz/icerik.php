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
            bakiyekaydet=function(){
                var gp=document.getElementById("para").value;
                gp=gp.trim();
                if(gp==''){
                    //alert('para miktarı giriniz');return false;
					gp=0;
                }
                var ar=document.getElementById("arama").value;
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("bky").innerHTML = this.responseText;
                    }
                };
                var prg = "bkykaydet.php?arama="+ar+"&para="+gp;
                xmlhttp.open("GET",prg,true);
                xmlhttp.send();
            }
            gununyemeginigetir=function(g,a,y){
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("gununyemegi").innerHTML = this.responseText;
                    }
                };
                var prg = "gununyemegi.php?g="+g+"&a="+a+"&y="+y;
                xmlhttp.open("GET",prg,true);
                xmlhttp.send();
            }
        </script>
    </head>
    <?php
    include_once "baglanti.php";
    $utip=$_POST['utype'];
    $numara=$_POST['arama'];
    $sql="SELECT * FROM users WHERE numara='$numara'";
    $veriseti = $baglan->query($sql);
    $satir = $veriseti->fetch(PDO::FETCH_ASSOC);
    $kayitsayisi = $veriseti->rowCount();
    if ($kayitsayisi <1){
        die('girdiğiniz numara yanlış');
    }
    $ad=$satir['ad'];$soyad=$satir['soyad'];$bolum=$satir['bolum'];$bakiye=$satir['bakiye'];
    ?>
    <body>
    <form name="f1" id="f1" action="" method="post">
        <input type="hidden" name="arama" id="arama" value="<?php echo $numara; ?>">
        <input type="hidden" name="utype" id="utype" value="<?php echo $utip; ?>">
        <input type="hidden" name="ad" value="<?php echo $ad; ?>">
        <input type="hidden" name="soyad" value="<?php echo $soyad; ?>">
        <div class="container-fluid header1">
            <div class="row mt-10 mb-10">
                <div class="col-md-1 pl-40 pr-40"><img src="img/logo.png" class="img-responsive" alt=""></div>
                <div class="col-md-8 baslik2 mt-10">Kampüs Kart Çevrimiçi Bakiye Yükleme Sistemi</div>
                <div class="col-md-1 pl-40 pr-40"><img src="img/cigerizm_logo.png" class="img-responsive" alt=""></div>
                <div class="col-md-1 mt-10"> <?php echo trim($ad).' '.trim($soyad); ?></div>
                <div class="col-md-1">  <a href="index.php" name="" id="" class="btn btn-warning pl-30 pr-30">Çıkış</a></div>
            </div>
        </div>
        <div class="container mt-70">
            <div class="row"  style="display: flex">
                <div class="col-md-5 card1 p30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 baslik2 mt-20">
                                <?php echo trim($ad).' '.trim($soyad); ?>
                            </div>
                            <div class="col-md-12 baslik2 mt-20">
                                <?php
                                if($utip=='1') echo "Öğrenci"; else  echo "Personel";
                                ?>
                            </div>
                            <div class="col-md-12 baslik2 mt-20"> <?php echo trim($numara); ?> </div>
                            <div class="col-md-12 baslik2 mt-20"> <?php echo trim($bolum); ?></div>
                        </div>
                        <div class="col-md-6 pt-45"><img src="img/cigerizm_logo.png" class="img-responsive  pl-30 pr-30" alt=""></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5  card1 p30">
                    <div class="row">
                        <div class="col-md-12" id="bky">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-70">
            <div class="saribas2"> GÜNÜN YEMEĞİ </div>
            <div class="row mt-30">
                <div class="col-md-9" id="gununyemegi"> <!-- gununyemegi GÜNÜN YEMEĞİ bölümü başlangıcı -->
                        <script>
						   	var d=new Date();
							gununyemeginigetir(d.getDate(),d.getMonth()+1,d.getFullYear());
						</script>
                </div> <!-- gununyemegi GÜNÜN YEMEĞİ bölümü sonu -->
                <div class="col-md-3">
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="datetimepicker12"></div>
                                </div>
                            </div>
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
        <script>
            $(document).ready(function () {
                setInterval(function(){
                    var tarih=new Date();
                    var yil=tarih.getFullYear();
                    var ay=tarih.getMonth();
                    var gun=tarih.getDay();
                    var saat=tarih.getHours();
                    var dakika=tarih.getMinutes();
                    var saniye=tarih.getSeconds();
                    //document.write(gun+"/"+ay+"/"+yil+"<br>);
                    $(".saat").html(saat+":"+dakika+":"+saniye);
                    $(".tarih").html(gun+"/"+ay+"/"+yil);
                },1000);
            })
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script>
            $( document ).ready(function() {
                $('#datetimepicker12').datetimepicker({
                    inline: true
                }).on('dp.change',function(event){
					var d=new Date(event.date.format('lll'));
                    gununyemeginigetir(d.getDate(),d.getMonth()+1,d.getFullYear());
                });
            });
        </script>
    </form>
    </body>
    </html>
<?php ob_end_flush();?>