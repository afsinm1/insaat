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

        @$teklifBirim=$_POST['sec3'];
        @$teklifId=$_POST['sec1'];
        @$teklifAdi=$_POST['sec2'];

        @$teklifAdiEkle=$_POST['sec5'];
        @$teklifBirimEkle=$_POST['sec4'];

        if (isset($_GET['onay'])){
            $onay=$_GET['onay'];
        }
          
            if(isset($_POST['btnKaydet'])){
                if(isset($secili)){
                    $sorgu_cumlesi="UPDATE teklifler SET TeklifAdi = '$teklifAdi', ParaBirim = '$teklifBirim' WHERE TeklifID = $teklifId;";
                    $sorgu = mysql_query($sorgu_cumlesi);
                    if($sorgu){
                        $mesaj=urldecode("Başarıyla kaydedildi");
                        yonlendir("teklif_duzenle.php?onay={$mesaj}");
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
                    $sorgu_cumlesi="DELETE FROM teklifler WHERE TeklifID=$teklifId;";
                    $sorgu = mysql_query($sorgu_cumlesi);
                    if($sorgu){
                        $mesaj=urldecode("Silme işlemi başarıyla gerçekleştirildi");
                        yonlendir("teklif_duzenle.php?onay={$mesaj}");
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
                if(empty($teklifAdiEkle)){
                    $hata="Ekleme işlemini gerçekleştirebilmek için lütfen ilgili alanları boş bırakmayınız.";
                }
                else{
                    $sorgu_cumlesi="INSERT INTO teklifler(TeklifAdi,ParaBirim) VALUES (\"$teklifAdiEkle\", \"$teklifBirimEkle\");";
                    $sorgu = mysql_query($sorgu_cumlesi);
                   if($sorgu){
                    $mesaj=urldecode("Ekleme işlemi başarıyla gerçekleştirildi");
                    yonlendir("teklif_duzenle.php?onay={$mesaj}");
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
                        <th>Teklif Adı</th>
                        <th>Birim</th>
                    </tr>
                   
                    <?php foreach ($teklifs as $teklif_d) : ?>
                        <tr>
                        <td>
                            <input class="radiom" type="radio" name="sec" value="<?php echo $teklif_d['TeklifID'] ?>"></td>
                            <td style="width:100px"><input class="diger" type="text" name="sec1" value="<?php echo $teklif_d['TeklifID'] ?>" readonly></td>
                            <td><input class="diger" type="text" name="sec2" value="<?php echo $teklif_d['TeklifAdi'] ?>" disabled></td>
                            <td>
                                <select  name="sec3" class="diger" disabled>
                                <?php foreach ($paralar as $para) : ?>
                                    <option value="<?=$para['PBirimKisaAd'];?>"<?php if($teklif_d['ParaBirim']==$para['PBirimKisaAd']){echo "selected";}?> ><?php echo $para['PBirimKisaAd'];?></option>
                                <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        
                        <tr>
                            <td></td>
                            <td style="width:100px"><strong>Ekle</strong></td>
                            <td><input type="text" name="sec5" placeholder="Teklif adı"></td>
                            <td><select name="sec4" class="ekleme">
                                <?php foreach ($paralar as $para_du) : ?>
                                    <option value="<?=$para_du['PBirimKisaAd']?>"><?php echo $para_du['PBirimKisaAd'];?></option>
                                <?php endforeach;?>
                                </select><button class="anim" name="ekle" value="3">Ekle</button></td>
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
