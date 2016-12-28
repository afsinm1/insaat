<?php require("lib/header.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>İnşaat Projelerinde Maliyet Hesabı ve Teklif Sistemi</title>
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
<?php 
//yetki_kontrol();

////////Maliyet Grubu sorgusu////
        $sorgu_cumlesi="SELECT *
                        FROM pozlar
                        INNER JOIN poztipi ON pozlar.PozTipi = poztipi.PozTipL
                        INNER JOIN olcubirim ON pozlar.OlcuBirim = olcubirim.BirimKisaAd
                        INNER JOIN analiz ON pozlar.PozID = analiz.MainPozID
                        ";
        $sorgu = mysql_query($sorgu_cumlesi);
        while($satir=mysql_fetch_array($sorgu)) {
            $pozanaliz[$satir['PozID']]=$satir;
        }
    /////// sorgu sonu//

//$mesaj = "HATA MESAJI";
?>
</head>
<body>
	<h4>10 CM HAFİF GAZBETON TEÇHİZATSIZ HARÇLI BLOKLARA DUVAR YAPILMASI(TUTKAL İLE)</h4>
                <form>
                    <table>
                        <tr>
                            <th><?php echo $_GET["pozMainId"];?></th>
                            <th>Poz No</th>
                            <th>MKK</th>
                            <th>Tanim</th>
                            <th>Tipi</th>
                            <th>Döviz</th>
                            <th>Birim</th>
                            <th>Birim Fiyat</th>
                            <th>Tarih</th>
                            <th>Miktar</th>
                            <th>Maliyet</th>
                            <th>Sıra No</th>
                        </tr>       

                             <!-- TABLO DOLDURMA BASLANGIC -->
                    <?php  foreach ($pozanaliz as $analiz) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $analiz['PozNo'] ?></td>
                            <td><?php echo $analiz['MkkCode'] ?></td>
                            <td><?php echo $analiz['PozTanim'] ?></td>
                            <td><?php echo $analiz['PozTip'] ?></td>
                            <td><?php echo $analiz['ParaBirim'] ?></td>
                            <td><?php echo $analiz['BirimKisaAd'] ?></td>
                            <td><?php echo $analiz['BirimFiyat'] ?></td>
                            <td><?php echo date("d-m-Y",strtotime($analiz['BfTarih'])) ?></td>
                            <td><?php echo $analiz['SubPozMiktar'] ?></td>
                            
                            <td><?php echo $analiz['BirimFiyat']*$analiz['SubPozMiktar'];?></td>
                            <td><?php echo $analiz['PozSNo'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                            <!-- TABLO DOLDURMA BITIS -->
                    </table>
                        <input class="duzenlemGonderBtn anim" type="submit" value="Degisiklikleri Kaydet">
                </form>
                    <div class="fiyatAnalizForm">
                        <button class="anim" type="submit">Seçili Pozu Sil</button>
                        <button class="anim" type="submit">Yeni Poz Ekle</button>
                        <button class="anim" type="submit">Açıklama Ekle</button>
                        <button class="anim" type="submit">Seçili Pozun Detayı</button>
                        <span>Analiz fiyatı: 18.30 TL</span>
                    </div>
           

</body>
</html>