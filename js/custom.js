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
		var deger=$(".radiom:checked").val();
		if($('.radiom').is(':checked')){
			$(this).parent().nextAll().children("input").prop('disabled', false);
			$(this).parent().prevAll().children("input").prop('disabled', false);
			$(this).parent().nextAll().children("select").prop('disabled', false);
			$(this).parent().prevAll().children("select").prop('disabled', false);
			$(this).parent().nextAll().children("select").css("background","#fff");
			$(this).parent().prevAll().children("select").css("background","#fff");
			$(this).parent().parent().nextAll().children().children(".diger").prop('disabled', true);
			$(this).parent().parent().prevAll().children().children(".diger").prop('disabled', true);
			$(this).parent().parent().nextAll().children().children("select").css("background","#eee");
			$(this).parent().parent().prevAll().children().children("select").css("background","#eee");
		}
	});
	
});

