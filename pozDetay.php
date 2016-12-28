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
        
                    <div class="solIcerik">
                        <form>
                            <div class="w35flLeft">
                                <div>
                                    <i>Birim Fiyat Kitabı</i>
                                    <select name="birimFiyatKitabi">
                                        <option value="0">Kitaplık seçin</option>
                                        <?php  foreach ($kitapliklar as $kitap) : ?>
                                            <option value="<?php echo $kitap['KitapID'] ?>"><?php echo $kitap['KitapAdi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Poz No</i><input class="anim" type="text" name="pozNo" placeholder="Poz numarasını girin">
                                </div>
                                <div>
                                    <i>Mkk Kodu</i><input class="mkkKodu anim" type="text" name="mkkKodu" placeholder="Mkk kodu girin">
                                                   <button class="mkkKodu anim" type="submit">MKK Kodu Seç</button>
                                                   <button class="mkkKodu anim" type="submit">Mevcut Kodu Al</button>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Poz Tanımı</i><textarea class="anim" placeholder="Poz tanımını girin" rows="8"><?php echo $_GET['pozId'];?></textarea>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Poz Tipi</i>
                                    <select name="pozTipi">
                                        <option value="0">Poz tipini seçin</option>
                                       <!-- TABLO DOLDURMA BASLANGIC -->
                                        <?php  foreach ($pozlar as $poz) : ?>
                                            <option value="<?php echo $poz['ID'] ?>"><?php echo $poz['PozTip'] ?></option>
                                         <?php endforeach; ?>
                                         <!-- TABLO DOLDURMA BITIS -->
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Ölçü Birimi</i>
                                    <select name="olcuBirimi">
                                        <option value="0">Ölçü birimi seçin</option>
                                        <!-- TABLO DOLDURMA BASLANGIC -->
                                        <?php  foreach ($olculer as $olcu) : ?>
                                            <option value="<?php echo $olcu['ID'] ?>"><?php echo $olcu['BirimKisaAd'] ?></option>
                                         <?php endforeach; ?>
                                         <!-- TABLO DOLDURMA BITIS -->
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Para Birimi</i>
                                    <select name="paraBirimi">
                                        <option value="0">Para birimi seçin</option>
                                        <!-- TABLO DOLDURMA BASLANGIC -->
                                        <?php  foreach ($paralar as $para) : ?>
                                            <option value="<?php echo $para['ID'] ?>"><?php echo $para['PBirimKisaAd'] ?></option>
                                         <?php endforeach; ?>
                                         <!-- TABLO DOLDURMA BITIS -->
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="w35flLeft">
                                <div>
                                    <i>Açıklama</i><textarea class="anim" placeholder="İş açıklaması girin" rows="12"></textarea>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Firma</i><input class="anim" type="text" name="firmaNo" placeholder="Poz numarasını girin">
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Model</i><input class="anim" type="text" name="model" placeholder="Poz numarasını girin">
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <i>Açıklama</i><textarea class="anim" placeholder="İş açıklaması girin" rows="3"></textarea>
                                    <div class="clearfix"></div>
                                </div>
                                <div>
                                    <button class="anim" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i>Kaydı Sil</button>
                                    <button class="anim" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i>Kayıt Guncelle</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="w30flLeft">
                                <div>
                                    <i>Dosya Ekleri / Fotoğraflar</i>
                                    <div class="fotoEk"></div>
                                </div>
                            </div>
                        </form>
                    </div>
</body>
</html>