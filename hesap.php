<?php 
class hesap {
        //Özellikler
        public $sayi1;
        public $sayi2;
      
        //Methodlar
        function topla($sayi1,$sayi2){
            return ($sayi1+$sayi2); //return bu işlemin sonucunu dönüştürecek EKRANA YAZDIRMAYACAK
        }
        function cikar($sayi1,$sayi2){
            return ($sayi1-$sayi2);
        }

        function carp($sayi1,$sayi2){
            return ($sayi1*$sayi2);
        }

        function bol($sayi1,$sayi2){
            return ($sayi1/$sayi2);
        }


}
?>