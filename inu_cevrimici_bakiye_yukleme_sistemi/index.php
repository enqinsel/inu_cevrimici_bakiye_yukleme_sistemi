<?php ob_start();if(!isset($_SESSION)){session_start();} ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>İNÜ Kampüs Kart</title>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="stil.css" rel="stylesheet"/>
    <link href="default.css" rel="stylesheet"/>
    <script>
        function phdegistir(x){
            if(x==1)
                document.getElementById('arama').placeholder="Öğrenci No";
            else
                document.getElementById('arama').placeholder="TC Kimlik No";
        }
        function fgonder(){
            var x=document.f1.utype.value;
            var aranan="Öğrenci No";
            if(x==2) aranan="Kimlik No";
            if (document.getElementById('arama').value.trim()==''){
                alert(aranan+' boş bırakılamaz');
                return false;
            } else {
                document.getElementById('f1').action="icerik.php";
                document.getElementById('f1').submit();
                return true;
            }
        }
        function ucretkes(){
            var x=document.f1.utype.value;
            var aranan="Öğrenci No";
            if(x==2) aranan="Kimlik No";
			ar=document.getElementById('arama').value.trim();
            if (ar==''){
                alert(aranan+' boş bırakılamaz');
                return false;
            } else {
				xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("odeme").innerHTML = this.responseText;
                    }
                };
                var prg = "ucretkeselim.php?arama="+ar;
                xmlhttp.open("GET",prg,true);
                xmlhttp.send();	
            }			
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <form name="f1" id="f1" action="" method="post">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12 text-center mt-50"><img width="150" src="img/logo.png" alt=""></div>
                    <div class="col-lg-12 text-center baslik1 mt-40"><span class="saribas">INÜ</span> Kampüs Kart Çevrimiçi Bakiye Yükleme Sistemi</div>
                    <div class="row">
                        <!--<div class="col-lg-1"></div>-->
                        <div class="col-lg-10 mt-20"><hr/></div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" value="1" checked class="form-check-input" name="utype" value="checkedValue" onClick="phdegistir(this.value)">Öğrenci No
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" value="2" class="form-check-input" name="utype" value="checkedValue" onClick="phdegistir(this.value)">TC Kimlik No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="arama" id="arama" aria-describedby="helpId" placeholder="Öğrenci No" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mt-20 text-center">
                            <input type="button" onclick="fgonder()" name="gonder" id="gonder" class="btn btn-warning pl-30 pr-30" value="GİRİŞ">
                            <input type="button" onclick="ucretkes()" name="gonder" id="gonder" class="btn btn-warning pl-30 pr-30" value="Yemek Ye">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1" id="odeme" style="width: auto; background-color: white; margin-top: 1cm;"></div>
                        <div class="col-lg-10 mt-20"><hr/></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 egik mt-70"> "Benim Üniversitem, Benim Geleceğim"</div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 sagkutu">
                <div class="kutu "> İnönü Üniversitesinin değerli mensupları;<br/><br/>
                    <br/>
                    Kiosklarda sıra beklemeden yemek kartınıza para yükleme işlemini internet üzerinden kolayca yapabilirsiniz.
                    <br/><br/>
                    Para yükleme işleminin yapılabilmesi için; Banka/kredi kartınızın internet alışverişine açık olması gerekmektedir.
                    <br/><br/>
                    Kartınıza toplamda en fazla 200 TL yükleyebilirsiniz.
                </div>
            </div>
        </div>
</div>
</form>
</body>
</html>
<?php ob_end_flush();?>