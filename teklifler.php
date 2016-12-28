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
			////////Teklif sorgusu////
							$sorgu_cumlesi="SELECT TekItemID,TekPozNo,MkkCode,PozTanim,PozTip,MaliyetGrup,PBirimUzunAd,PBirimFiyat,BfTarih,TeklifBirimFiyat,PozFirma,OlcuBirim,TekPozMiktar,TekItemAciklama
									FROM teklifdetay
									INNER JOIN pozlar ON pozlar.PozID=teklifdetay.TekPozNo
									INNER JOIN poztipi ON pozlar.PozTipi = poztipi.PozTipL
									INNER JOIN parabirim ON pozlar.ParaBirim = parabirim.PBirimKisaAd";
							$sorgu = mysql_query($sorgu_cumlesi);
							while($satir=mysql_fetch_array($sorgu)) {
							    $teklifler[$satir['TekItemID']]=$satir;
							}
						/////// sorgu sonu//
//$mesaj = "HATA MESAJI";
?>
</head>
<body>
					<table>
                        <tr>
                            <th><?php echo $_GET["teklifId"];?></th>
                            <th>Poz No</th>
                            <th>MKK</th>
                            <th>Tanım</th>
                            <th>Tipi</th>
                            <th>Maliyet Grubu</th>
                            <th>Döviz</th>
                            <th>Kur</th>

                            <th>Birim</th>
                            <th>Birim Fiyat</th>
                            <th>Tarih</th>

                            <th>Miktar</th>
                            <th>Poz Grubu</th>
                            <th>Poz Maliyeti</th>
                            <th>Poz Açıklaması</th>
                        </tr>
                          <!-- TABLO DOLDURMA BASLANGIC -->
                    <?php  foreach ($teklifler as $teklif) : ?>
                        <tr>
                            <td></td>
                            <td><?php echo $teklif['TekPozNo'] ?></td>
                            <td><?php echo $teklif['MkkCode'] ?></td>
                            <td><?php echo $teklif['PozTanim'] ?></td>
                            <td><?php echo $teklif['PozTip'] ?></td>
                            <td><?php echo $teklif['MaliyetGrup'] ?></td>
                            <td><?php echo $teklif['PBirimUzunAd'] ?></td>
                            <td><?php echo $teklif['PBirimFiyat'] ?></td>

                            <td><?php echo $teklif['OlcuBirim'] ?></td>
                            <td><?php echo $teklif['TeklifBirimFiyat'] ?></td>
                            <td><?php echo date("d-m-Y",strtotime($analiz['BfTarih'])) ?></td>
                            
                            <td><?php echo $teklif['TekPozMiktar'] ?></td>
                            <td><?php echo $teklif['PozFirma'] ?></td>
                            
                            <td>MALIYET HESAPLA YAZ...</td>
                            <td><?php echo $teklif['TekItemAciklama'] ?></td>
                            
                        </tr>
                        <?php endforeach; ?>
                            <!-- TABLO DOLDURMA BITIS -->
                    </table>
</body>
</html>