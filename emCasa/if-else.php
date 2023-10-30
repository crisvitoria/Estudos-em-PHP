<?php 

$idade = 50;

if($idade < 10){
   echo "categoria infantil";
}elseif($idade >=10 && $idade < 18){
   echo "categoria juvenil";
}elseif($idade >=18 and $idade <40){
   echo "categoria adulta";
}else{
   echo "categoria master";
}


?>