$( document ).ready(function(){
	$(".BirimFiyatAgaciIcerik li a").click(function(){
		if($(this).parent().children("ul").hasClass("listAcKapa")){
			$(this).parent().children("ul").removeClass("listAcKapa");
			$(this).children(".listSimge").html("+");
		}
		else{
			$(this).parent().children("ul").addClass("listAcKapa");
			if($(this).parent().children("ul").hasClass("listAcKapa")){
				$(this).children(".listSimge").html("-");
			}
		}
	});


	$(".detaylar:eq(0)").addClass("altBirimGoster");
	$(".birimBtnList span:eq(0)").addClass("birimBtnListActive");
	$(".birimBtnList span").click(function(){
		thisIndex=$(this).index();
		if ($(this).hasClass("birimBtnListActive")){}
		else{
			$(this).addClass("birimBtnListActive");
			$(this).nextAll().removeClass("birimBtnListActive");
			$(this).prevAll().removeClass("birimBtnListActive");
		}
		if($(".detaylar:eq("+ thisIndex +")").hasClass("altBirimGoster")){}
		else{
			$(".detaylar:eq("+ thisIndex +")").addClass("altBirimGoster");
			$(".detaylar:eq("+ thisIndex +")").nextAll().removeClass("altBirimGoster");
			$(".detaylar:eq("+ thisIndex +")").prevAll().removeClass("altBirimGoster");
		}
		
	});
	
	//if (secDuz()=="on"){
		$(".pozunAnalizi td").dblclick(function(){
		parentIndex=$(this).parent().index();
		thisIndex=$(this).index();
		var textim=$(this).html();
		if (thisIndex!=0){
			$(this).parent().addClass("kontrolclassi");
			if($(this).hasClass("kontrolclassi")){}
			else{
				var namem=$(".pozunAnalizi tr:eq(0) th:eq("+ thisIndex +")").html();
				namem = namem.replace(/ /g,'');//boşlukları sildim.
				namem = namem.toLowerCase();//hepsini kucuk harf yaptım.
				var laNamem=namem;
				var latin = new Array("s","c","g","u","i","o"); 
				var turkce = new Array("ş","ç","ğ","ü","ı","ö");
				for (var i=0; i<=laNamem.length; i++){
					for (var j=0;j<7;j++){
						laNamem = laNamem.replace(turkce[j], latin[j]);
					} 
				} 
				$(this).addClass("kontrolclassi");
				$(this).css("padding","0px 0px 2px 0px");
				$(this).css("color","#fff");
				$(this).html("<input class='w100flLeft tablodaDuz' name='"+laNamem+"' type='text' value='"+textim+"' autofocus>");
				//focusCik(textim,laNamem);
			}
		}
		
	});
	//}
	
	// function focusCik(textim,laNamem) {
	// 	$(".pozunAnalizi td").focusout(function(){
	// 		$(this).html(textim);
	// 		$(this).css("color","#000");
	// 		$(this).css("padding","5px 10px");
	//         $(this).removeClass("kontrolclassi");
	//     });
	// }

	$( ".radiom" ).click(function(){
		var deger=$( ".radiom:checked" ).val();
		if(deger==='undefined'){
			$(".radiom").parent().nextAll().children("input").prop('disabled', false);
		}
		else{
			$(this).parent().nextAll().children("input").prop('disabled', false);
			$(this).parent().prevAll().children("input").prop('disabled', false);
		}
	});
	
});


function pozAnaliz(str) {
	window.alert(str);
    if (str == "") {
        document.getElementById("pozTable").innerHTML = "TABLO YOK";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pozTable").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET","pozAnaliz.php?pozId="+str,true);
        xmlhttp.send();
    }
}

function POZ(s){
	window.alert(s);
}

function pozAnalizDetay(str) {
	window.alert(str);
    if (str == "") {
        document.getElementById("pozunAnalizi").innerHTML = "Analiz YOK";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pozunAnalizi").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET","pozAnalizDetay.php?pozMainId="+str,true);
        xmlhttp.send();
    }
}

function teklifler(str) {
	window.alert(str);
    if (str == "") {
        document.getElementById("teklif").innerHTML = "Analiz YOK";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("teklif").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET","teklifler.php?teklifId="+str,true);
        xmlhttp.send();
    }
}


function pozDetay(str) {
	window.alert(str);
    if (str == "") {
        document.getElementById("pozDetaylari").innerHTML = "Poz YOK";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pozDetaylari").innerHTML = this.responseText;
            }
        };
        
        xmlhttp.open("GET","pozDetay.php?pozId="+str,true);
        xmlhttp.send();
    }
}

function pozSec(str){
	window.alert(str);
		
}
