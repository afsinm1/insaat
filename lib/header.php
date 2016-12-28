<?php require("lib/contact.php"); ?>
<?php 
	
////////Maliyet Grubu sorgusu////
	$sorgu_cumlesi="SELECT * FROM `pozlar` 
	INNER JOIN poztipi ON pozlar.PozTipi = poztipi.PozTipL
	INNER JOIN parabirim ON pozlar.ParaBirim = parabirim.PBirimKisaAd
	LIMIT 10";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $sepetler[$satir['PozID']]=$satir;
	}
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
////////Teklif Tablo sorgusu////
	$sorgu_cumlesi="SELECT *
					FROM teklifler";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $teklifs[$satir['TeklifID']]=$satir;
	}
/////// sorgu sonu//
	
///////Kitaplik sorgusu//

	$sorgu_cumlesi="SELECT *
					FROM bfiyatkitap";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $kitapliklar[$satir['KitapID']]=$satir;
	}
//////////
///////parabirim sorgusu//

	$sorgu_cumlesi="SELECT *
					FROM parabirim";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $paralar[$satir['ID']]=$satir;
	}
//////////
//////Olcubirim sorgusu//

	$sorgu_cumlesi="SELECT *
					FROM olcubirim";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $olculer[$satir['ID']]=$satir;
	}
//////////
//////Poztipi sorgusu//

	$sorgu_cumlesi="SELECT *
					FROM poztipi";
	$sorgu = mysql_query($sorgu_cumlesi);
	while($satir=mysql_fetch_array($sorgu)) {
	    $pozlar[$satir['ID']]=$satir;
	}
//////////

	/*
	if(isset($_POST['sender'])){
		$PNO=$_POST['PozNo'];
		$sql="SELECT * FROM maliyettemp 
	 	  WHERE PozID='{$PNO}' LIMIT 1";
		$sorgu = mysql_query($sql);
		$sayisi=mysql_num_rows($sorgu);
			if($sayisi == 1){
					$sqlupdate="UPDATE maliyettemp SET MaliyetGrup = $_POST['MaliyetGrup'] WHERE pid='{$PNO}'";
					$sonuc=mysql_query($sqlupdate);
					$sayisi=mysql_affected_rows($sonuc);
						if($sayisi==1) {
						echo "Kayıt Başarılı";
						}else {
						echo "Sistemde bir problem yaşandı. Yöneticiyle görüşünüz";
						}
				}else{
					$sqlinsert="INSERT INTO  VALUES ('$urunid')";
					$sonuc=mysql_query($sqlinsert);
					$sayisi=mysql_affected_rows($sonuc);
						if($sayisi==1) {
						echo "Kayıt Başarılı";
						}else {
						echo "Sistemde bir problem yaşandı. Yöneticiyle görüşünüz";
						}
				}
		
		$MaliyetGrup = $_POST['MaliyetGrup'];
		echo $_POST['PozID'];
		echo $_POST['PozNo'];
		echo $_POST['PozBirim'];
		echo $_POST['Birim'];
		echo $_POST['PozAciklama'];

	}
*/
	

/////// MKK AGAC ICIN VERI ///////
	$sql = "SELECT * FROM mkk";
	$sorgu = mysql_query($sql);
	while($sonuc = mysql_fetch_array($sorgu)){
	    $array[$sonuc['ID']]=$sonuc;
	    $max = max($array[$sonuc['ID']]['MKKCode'],@$max);
	    $last = $sonuc['ID'];
	}
	define("last", $last);
/////////////
				
				
?>