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

//echo last."-LAST"."</br>";
//echo $max."-MAX</br>";

//echo "</br></br>*******////************</br>";
//echo "<div class=\"BirimFiyatAgaci\">";
//echo "<div class=\"BirimFiyatAgaciIcerik\">";
/*

 echo '<ul>';  
foreach ($array as $key => $value) {

    if ($array[$key]['MKKParentCode'] == "MKK") {
        echo "<li class=\"acilirList\"><a href=\"#\"><div class=\"listSimge anim\">+</div>".$array[$key]['MKKCode']." MKK / ".$array[$key]['MKKParentCode']." Parent./".$array[$key]['MKKTanim']."</a>";
        
        //echo $value['ID']."BUNUN PARENTI YOK(".$value['MKKCode'].")</br>";
        //child kontrol et.varm($parentID,$array);
        varm($array[$key]['MKKCode'],$array);
        echo '</li>';
     }else{
        //parent var.
     }  
}
echo '</ul>'; 
echo "</div>";
echo "</div>";

*/
//$mesaj = "HATA MESAJI";
?>
</head>
<body>
    <?php mesaj(@$hata,@$onay,@$mesaj); ?>
    <div class="container">
        <div class="projeBaslik">
            <h3>İnşaat Projelerinde Maliyet Hesabı ve Teklif Sistemi</h3>
            <a href="">CIKIS</a>
        </div>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-12 no-padding">
        <div class="BirimFiyatAgaci">
            <h5>TÜM POZLAR</h5>
            <div class="BirimFiyatAgaciIcerik">
                <?php  //AGAC OLUSTURMA /
                     echo '<ul>';  
                    foreach ($array as $key => $value) {

                        if ($array[$key]['MKKParentCode'] == "MKK") {
                            //echo "<li class=\"acilirList\"><a href=\"#\"><div class=\"listSimge anim\">+</div>".$array[$key]['MKKCode']." MKK / ".$array[$key]['MKKParentCode']." Parent./".$array[$key]['MKKTanim']."</a>";
                            echo "<li class=\"acilirList\"><a href=\"#\" onclick=\"pozAnaliz('".$array[$key]['MKKCode']."')\"><div class=\"listSimge anim\">+</div>".$array[$key]['MKKTanim']."</a>";
                            
                            //echo $value['ID']."BUNUN PARENTI YOK(".$value['MKKCode'].")</br>";
                            //child kontrol et.varm($parentID,$array);
                            varm($array[$key]['MKKCode'],$array);
                            echo '</li>';
                         }else{
                            //parent var.
                         }  
                    }
                    echo '</ul>'; 
                    echo "</div>";
                    echo "</div>";
                    /// ///
                ?>
            </div>
        </div>
    </div>


    <div class="col-md-9 col-sm-9 col-xs-12 no-padding">
        <div class="BirimFiyatListesi">
           <div class="BirimFiyatTablo" id="pozTable">TABLO</div>
           <!--  <div class="BirimFiyatTablo">
               <table>
                   <tr>
                       <th></th>
                       <th>No</th>
                       <th>Tanim</th>
                       <th>Model</th>
                       <th>Firma</th>
                       <th>Maliyet Grup</th>
                       <th>Tip</th>
                       <th>Birim</th>
                       <th>Birim Fiyat</th>
                       <th>Doviz</th>
                       <th>Ref</th>
                       <th>Tarih</th>
                       <th>MKK Kodu</th>
           
           
                   </tr>
                       TABLO DOLDURMA BASLANGIC
                   <?php  foreach ($sepetler as $sepe) : ?>
                       <tr>
                           <td></td>
                           <td><?php echo $sepe['PozNo'] ?></td>
                           <td><?php echo $sepe['PozTanim'] ?></td>
                           <td><?php echo $sepe['PozModel'] ?></td>
                           <td><?php echo $sepe['PozFirma'] ?></td>
                           <td><?php echo $sepe['MaliyetGrup'] ?></td>
                           <td><?php echo $sepe['PozTip'] ?></td>
                           <td><?php echo $sepe['OlcuBirim'] ?></td>
                           <td><?php echo $sepe['BirimFiyat'] ?></td>
                           <td><?php echo $sepe['ParaBirim'] ?></td>
                           <td><?php echo $sepe['PozRef'] ?></td>
                           <td><?php echo $sepe['BfTarih'] ?></td>
                           <td><?php echo $sepe['MkkCode'] ?></td>
           
           
                       </tr>
                       <?php endforeach; ?>
                           TABLO DOLDURMA BITIS
               </table>
           </div> -->
            <div class="tableButton">
                <button type="submit">Pozu Analize Ekle</button>
                <button type="submit">Pozu Analiz Et</button>
                <button type="submit">Pozu Kopyala</button>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
        <div class="birimTabMenu">
            <div class="birimBtnList">
                <span href="#">Poz Detayları</span>
                <span onclick="pozAnalizDetay('P00')">Pozun Analizi</span>
                <span onclick="teklifler('P0')">Teklif</span>
                <span href="#">Ayarlar</span>
            </div>
            <div class="detaylar">
                <div class="pozDetaylari" id="pozDetaylari">
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
                                            <i>Poz Tanımı</i><textarea class="anim" placeholder="Poz tanımını girin" rows="8"></textarea>
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
                                            <button class="anim" type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i>Yeni Kayıt</button>
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
                </div>
            </div>

            <div class="detaylar">
                <div class="pozunAnalizi" id="pozunAnalizi"> ANALIZ...


                                <!-- 
                                    
                                    <h4>10 CM HAFİF GAZBETON TEÇHİZATSIZ HARÇLI BLOKLARA DUVAR YAPILMASI(TUTKAL İLE)</h4>
                                <form>
                                    <table>
                                        <tr>
                                            <th></th>
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
                                
                                             TABLO DOLDURMA BASLANGIC
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
                                            TABLO DOLDURMA BITIS
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
                                 -->
                </div>
            </div>
            <div class="detaylar">
                <div class="teklifVer">
                    <div class="teklifFiltreForm">
                        <form>
                            <i>Teklif Seçiniz</i>
                            <select name="teklifSecenek" class="anim">
                                <option value="0">Teklif Seçiniz</option>
                                <?php  foreach ($teklifs as $tek) : ?>
                                    <option value="<?php echo $tek['TeklifID'] ?>"><?php echo $tek['TeklifAdi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="anim" type="submit">Teklifleri Düzenle</button>
                            <button class="anim" type="submit">Pozları Primaveraya Aktar</button>

                            <i>Rapor Tipi</i>
                            <select name="teklifSecenek" class="anim">
                                <option value="0">Kitaplık seçin</option>
                                <?php  foreach ($kitapliklar as $kitap) : ?>
                                    <option value="<?php echo $kitap['KitapID'] ?>"><?php echo $kitap['KitapAdi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="anim" type="submit">Rapor Hazırla</button>
                        </form>
                    </div>
                <span id="teklif">TEKLIF TABLO
                    <!-- <table>
                        <tr>
                            <th></th>
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
                          TABLO DOLDURMA BASLANGIC
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
                            TABLO DOLDURMA BITIS
                    </table> -->
                </span>
                </div>
            </div>
            <div class="detaylar">
                <div class="ayarlar">
                    <div class="col-md-6 sol-sm-6 col-xs-12">
                        <form>
                            <div><input type="checkbox" name="MKKpozGoster"><i>Poz listesinde alt MKK pozlarını göster</i></div>
                            <div><input type="checkbox" name="analizPozuSilmeIzin"><i>Analizlerde kullanılan pozların silinmesine izin ver</i></div>
                            <div><input type="checkbox" name="pozListesiDuzenlemeIzin"><i>Poz listesi üzerinde düzenleme yapılmasına izin ver</i></div>
                            <div><input type="checkbox" name="tumPozlariGoster"><i>Tüm teklif pozlarını göster</i></div>
                            <div><input type="checkbox" name="MKKBaslikGoster"><i>Poz listesi ve teklif listesinde MKK başlıklarını göster</i></div>
                            <div>
                                <span>Teklif Seçiniz</span>
                                <select name="teklifSecenek" class="anim">
                                    <option value="0">Kitaplık seçin</option>
                                    <option value="1">Ortalama</option>
                                    <option value="2">Bayındırlık Bakanlığı</option>
                                    <option value="3">Bayındırlık Bakanlığı</option>
                                    <option value="4">Bayındırlık Bakanlığı</option>
                                </select>
                            </div>
                            <div class="buttonListAyar col-md-6 col-sm-6 col-xs-6">
                                <button class="anim" type="submit">Seçili Kitabın Analizlerini Hesapla</button>
                                <button class="anim" type="submit">Integrity Check</button>
                                <button class="anim" type="submit">Repair Database</button>
                            </div>
                            <div class="buttonListAyar col-md-6 col-sm-6 col-xs-6">
                                <button class="anim" type="submit">Para Birimlerini Düzenle</button>
                                <button class="anim" type="submit">Ölçü Birimlerini Düzenle</button>
                                <button class="anim" type="submit">Birim Fiyat Kitaolarını Düzenle</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
                        <div class="primaVera">
                            <h4>Primavera Bağlantısı</h4>
                            <form>
                                <div><span>Username</span><input class="anim" type="text" name="usernamePrimeVera"><div class="clearfix"></div></div>
                                <div><span>Password</span><input class="anim" type="password" name="passwPrimeVera"><div class="clearfix"></div></div>
                                <div><span>DSN</span><input class="anim" type="text" name="dsnPrimeVera"><div class="clearfix"></div></div>
                                <button class="anim" type="submit">Primaveraya Bağlan</button>
                                <div class="clearfix"></div>
                                <div><span>Projects</span><input class="anim" type="text" name="projectsPrimeVera"><div class="clearfix"></div></div>
                                <div><span>Teklif</span><input class="anim" type="text" name="teklifPrimeVera"><div class="clearfix"></div></div>
                                <button class="anim" type="submit">Proje ve Teklifi Eşleştir</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>