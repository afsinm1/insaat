<?php require("lib/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>İnşaat Projelerinde Maliyet Hesabı ve Teklif Sistemi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/jquery-1.12.0.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <?php
        @$secili=$_POST['sec'];

        @$kitapAdi=$_POST['sec3'];
        @$kitapId=$_POST['sec2'];
        @$kitapAdiEkle=$_POST['sec4'];
        if (isset($_GET['onay'])){
           
            $onay=$_GET['onay'];
         
        }
          
            if(isset($_POST['btnKaydet'])){
                if(isset($secili)){
                    $sorgu_cumlesi="UPDATE bfiyatkitap SET KitapAdi = '$kitapAdi' WHERE KitapID = $kitapId;";
                    $sorgu = mysql_query($sorgu_cumlesi);
                    if($sorgu){
                        $mesaj=urldecode("Başarıyla kaydedildi");
                        yonlendir("birim_fiyat_kitap_duzenle.php?onay={$mesaj}");
                    }
                    else{
                        $hata="Kayıt gerçekleştirilemedi";
                    }
                }
                else{
                    $hata="Kayıt veya silme işleminin gerçekleştirilebilmesi için lütfen düzenlemek istediğiniz veriyi seçiniz";
                }
            }
            else if(isset($_POST['btnSil'])){
                if(isset($secili)){
                    $sorgu_cumlesi="DELETE FROM bfiyatkitap WHERE KitapID=$kitapId;";
                    $sorgu = mysql_query($sorgu_cumlesi);
                    if($sorgu){
                        $mesaj=urldecode("Silme işlemi başarıyla gerçekleştirildi");
                        yonlendir("birim_fiyat_kitap_duzenle.php?onay={$mesaj}");
                    }
                    else{
                        $hata="Silme işlemi gerçekleştirilemedi";
                    }
                }
                else{
                    $hata="Kayıt veya silme işleminin gerçekleştirilebilmesi için lütfen düzenlemek istediğiniz veriyi seçiniz";
                }
            }
            else if(isset($_POST['ekle'])){
                if(empty($kitapAdiEkle)){
                    $hata="Ekleme işlemini gerçekleştirebilmek için lütfen kitap adını giriniz.";
                }
                else{
                    $sorgu_cumlesi="INSERT INTO bfiyatkitap(KitapAdi) VALUES (\"$kitapAdiEkle\");";
                    $sorgu = mysql_query($sorgu_cumlesi);
                   if($sorgu){
                    $mesaj=urldecode("Ekleme işlemi başarıyla gerçekleştirildi");
                    yonlendir("birim_fiyat_kitap_duzenle.php?onay={$mesaj}");
                    }
                    else{
                        $hata="Ekleme işlemi gerçekleştirilemedi";
                    }
                }
            }
    ?>
</head>
<body>
    <?php mesaj(@$hata,@$onay,@$mesaj); ?>
    <div class="col-md-12 col-sm-12">
        <div class="duzenle">
            <form action="" method="POST">
                <table>
                    <tr>
                        <th></th>
                        <th>No</th>
                        <th>Birim Fiyat Kitap Adı</th>
                    </tr>
                   
                    <?php foreach ($kitapliklar as $kitaplik_d) : ?>
                        <tr>
                            <td><input class="radiom" type="radio" name="sec" value="<?php echo $kitaplik_d['KitapID'] ?>"></td>
                            <td style="width:100px"><input class="diger" type="text" name="sec2" value="<?php echo $kitaplik_d['KitapID'] ?>" readonly></td>
                            <td><input class="diger" type="text" name="sec3" value="<?php echo $kitaplik_d['KitapAdi'] ?>" disabled></td>
                        </tr>
                    <?php endforeach;?>
                        <tr>
                            <td></td>
                            <td style="width:100px"><strong>Ekle</strong></td>
                            <td><input class="ekleme" type="text" name="sec4" placeholder="Kitap ekle"><button class="anim" name="ekle" value="3">Ekle</button></td>
                        </tr>

                </table>

                <div class="buttonlar">
                    <button name="btnSil" value="2" class="anim">Sil</button>
                    <a class="anim">Geri dön</a>
                    <button name="btnKaydet" value="1" class="anim">Kaydet</button>
                </div>

                
            </form>
        </div>
    </div>
</body>
</html>
