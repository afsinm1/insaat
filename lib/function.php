<?php
function mesaj($hata=0,$onay=0,$mesaj=0){
    if (empty($hata)==false) {
        echo "<div class=\"alert red\">{$hata}</div>";        
    }elseif (empty($onay)==false) {
        echo "<div class=\"alert blue\">{$onay}</div>";
    }elseif (empty($mesaj)==false) {
        echo "<div class=\"alert\">{$mesaj}</div>";
    }
    
}
function yonlendir($url=""){/*yonlendirme icin kullandik.*/
    header("Location: {$url}");
}

function varm($parentID,$array){
     
     for ($i=1; $i < last ; $i++) { 
        if ($i==1) {
            echo '<ul>';
        }
        if (@$array[$i]['MKKParentCode']==$parentID) {
            // echo $array[$i]['MKKParentCode']."BU COCUK ".$array[$i]['MKKCode']." ".$parentID." nin COCUGUDUR.</br>_|";
            //bunun cocugu varmi diye bak varmi($array[$i]['pno'],$array);
            echo "<li class=\"acilirList\"><a href=\"#\"><div class=\"listSimge anim\">+</div>".$array[$i]['MKKCode']." MKK / ".$array[$i]['MKKParentCode']." Parent./".$array[$i]['MKKTanim']."</a>";
            //echo "<li class=\"acilirList\"><a href=\"#\"><div class=\"listSimge anim\">+</div>".$array[$i]['MKKTanim']."</a>";
            varm($array[$i]['MKKCode'],$array); 
            echo '</li>';         
        }else{
            //echo "{ ".$array[$i]['pno']." - ".$parentID." }";
        }
        if ($i==last-1) {
            echo '</ul>';
        }
     }
 return 0;
}

?>