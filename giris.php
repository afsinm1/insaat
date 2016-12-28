<?php require("lib/contact.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>İnşaat Projelerinde Maliyet Hesabı ve Teklif Sistemi - LOGIN </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Muhammed EVIZ">
    <meta name="author" content="Mehmet AFSIN">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
 
    <script src="js/jquery-1.12.0.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>

    <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
    <?php 
    $secret = '6LfsVw0UAAAAAPz6l7cF_6MTIrkLLZr8C86raDKx';
    require_once('lib/src/recaptchalib.php'); 
    require_once __DIR__ . '/lib/src/autoload.php';
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
	$resp = $recaptcha->verify(@$_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
	if ($resp->isSuccess()) {
	    // verified!
	} else {
	    $errors = $resp->getErrorCodes();
	}


///////////////GOOGLE OLAMADAN///////////////////////

	if (isset($_POST['username'])&&isset($_POST['passw'])){
		$username = $_POST['username'];
		$passw = $_POST['passw'];
		$firma = @$_POST['comp'];
		
			$sql = "SELECT name,surname,yetki FROM kullanici WHERE mail='{$username}' AND passw = '{$passw}' LIMIT 1";
			$sorgu = mysql_query($sql);
			$sayisi=mysql_num_rows($sorgu); //eger deger donerse var oldugunu anlariz ve sayisi gelir.
			$bilgi=mysql_fetch_assoc($sorgu); //ilk satiri bize getirmesini soyledik.
					
			if ($sayisi == 1) {
					$_SESSION['izin'] = true;
					$_SESSION['yetki']=$bilgi['yetki'];
					$_SESSION['name'] = $bilgi['name'];
					$_SESSION['surname'] = $bilgi['surname'];
					$onay = "GIRIS BASARILI";
					yonlendir("index.php");
			}else{
				$mesaj="Kullanici Bulunamadi...";
			}

		
	}

///////GOOGLE DOGRULAMALI GIRIS //

	/*if (isset($_POST['g-recaptcha-response'])&&isset($_POST['username'])&&isset($_POST['passw'])){
		$username = $_POST['username'];
		$passw = $_POST['passw'];
		$firma = @$_POST['comp'];
		if (($_POST['g-recaptcha-response']==true)){
			$sql = "SELECT name,surname,yetki FROM kullanici WHERE mail='{$username}' AND passw = '{$passw}' LIMIT 1";
			$sorgu = mysql_query($sql);
			$sayisi=mysql_num_rows($sorgu); //eger deger donerse var oldugunu anlariz ve sayisi gelir.
			$bilgi=mysql_fetch_assoc($sorgu); //ilk satiri bize getirmesini soyledik.
					
			if ($sayisi == 1) {
					$_SESSION['izin'] = true;
					$_SESSION['yetki']=$bilgi['yetki'];
					$_SESSION['name'] = $bilgi['name'];
					$_SESSION['surname'] = $bilgi['surname'];
					$onay = "GIRIS BASARILI";
					yonlendir("index.php");
			}else{
				$mesaj="Kullanici Bulunamadi...";
			}

		}else{
			$hata = "Giris Dogrulanamadi.!";
		}
	}
	*/
///////

    ?>
<head>
<body>

    <?php mesaj(@$hata,@$onay,@$mesaj); ?>
	<div class="container">
		 <div class="projeBaslik">
            <h3>İnşaat Projelerinde Maliyet Hesabı ve Teklif Sistemi - Login </h3>
        </div>
         <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
         <div class="col-md-3 col-sm-3 col-xs-12 no-padding"></div>
         	 <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
                <div class="primaVera">
                    <h4>Login</h4>
                    <form action="giris.php" method="POST">
                        <div><span>Username/Mail</span><input class="anim" type="email" name="username" ><div class="clearfix"></div></div>
                        <div><span>Password</span><input class="anim" type="password" name="passw" ><div class="clearfix"></div></div>
                        <div><span>Firma</span><input class="anim" type="text" name="comp"><div class="clearfix"></div></div>
                        <div style="padding-left:25%"><div class="g-recaptcha" data-sitekey="6LfsVw0UAAAAAKUFHVt1gDKel75GAKKo39nni4Bo"></div><div class="clearfix"></div></div>


                        <button class="anim" type="submit">Giris Yap</button>
                        <button class="anim" type="submit">Sifremi unuttum</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
         </div>
         
	</div>
</body>
</html>