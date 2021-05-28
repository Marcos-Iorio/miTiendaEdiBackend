<?php   
     $checkM = false;
     $checkP = false;

     if(isset($_POST["mail"])){
         if($_POST["mail"] == "1234@gmail.com"){
             $checkM = true;
         }else{
             $checkP = false;
         }
     }
     if(isset($_POST["pass"])){
         if($_POST["pass"] == "12345"){
             $checkP = true;
         }else{
             $checkM = false;
         }
     }
     if($checkM==true && $checkP==true){
        echo "Sesion iniciada";
     }else{
        echo "Datos incorrectos";
     }
  
?>