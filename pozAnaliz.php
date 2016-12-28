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

//$mesaj = "HATA MESAJI";
?>

</head>
<body>
            
                <table>
                    <tr>
                        <th><?php echo $_GET["pozId"];?></th>
                        <th>No</th>
                        <th>Tanim</th>
                        <th>Model</th>
                        <th>Firma</th>
                        <th>Maliyet Grup</th>
                        <th>Tip</th>
                        <th>Birim</th>
                        <th>Birim Fiyat</th>
                        <th>Doviz</th>
                        <!-- <th>Ref</th> -->
                        <th>Tarih</th>
                        <th>MKK Kodu</th>


                    </tr>
                        <!-- TABLO DOLDURMA BASLANGIC -->
                    <?php  foreach ($sepetler as $sepe) : ?>
                        <tr ondblclick="pozDetay('P2')">
                            <td onclick="pozSec('PSEC')">SEC</td>
                            <td><?php echo $sepe['PozNo'] ?></td>
                            <td><?php echo $sepe['PozTanim'] ?></td>
                            <td><?php echo $sepe['PozModel'] ?></td>
                            <td><?php echo $sepe['PozFirma'] ?></td>
                            <td><?php echo $sepe['MaliyetGrup'] ?></td>
                            <td><?php echo $sepe['PozTip'] ?></td>
                            <td><?php echo $sepe['OlcuBirim'] ?></td>
                            <td><?php echo $sepe['BirimFiyat'] ?></td>
                            <td><?php echo $sepe['ParaBirim'] ?></td>
                            <!-- <td><?php echo $sepe['PozRef'] ?></td> -->
                            <td><?php echo $sepe['BfTarih'] ?></td>
                            <td><?php echo $sepe['MkkCode'] ?></td>


                        </tr>
                        <?php endforeach; ?>
                            <!-- TABLO DOLDURMA BITIS -->
                </table>
           

</body>
</html>