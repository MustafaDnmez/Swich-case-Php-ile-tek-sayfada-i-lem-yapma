<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vize sınavı</title>
</head>
<style >
 .tek {
    background:yellow;
    color:red;
 }
 .cift {
    background:red;
    color:yellow;

 }
    </style>
<body>
    
<?php 
/*Bu projede tek sayfa üç işlem yapılmıştır . 1. kullanıcı işle sayısını girecek . 2. swich ile işlem sayısının değerine göre form ekrana çıkacak.
3.formda girilen bilgiler tabloda yazılacaktır.
proje class funticion for dögüsü ile yapılmıştır. 
Projeyi başlamak için başlangıç kısmını tamamladıktan sonra  sayfanın altındaki adım 1 den takip ederek yapınız.
*/


//Başlangiç kısmı
require "hesap.php";   //hesap.php sayfamızı bu dosyaya dahil ettik.

//swich için bir değişken oluşturduk . Değişkenin tarayıcının adres çubuğuna yazdırılacak ve ordan değerleri çekilecek.Çekilen değere göre swichin içindeki case ler çalışacaktır.
if (empty($_GET["sayfa"])){ 
    $sayfa="";
}
else{
    $sayfa=$_GET["sayfa"];
 } 

// bu if else koşulu adres çubuğundan sayfa değişkenini bulamadığı halde  değerini boş bırakacak. Eğer bulduysa içine değerini yazdıracak.
// bu koşulsuz kodlarımız çalışacak sadece ilk sayfa açıldığı zaman değeri atanmamış değişken hatası almamak için yapıldı.



switch ($sayfa) {

   case "form": //ADIM 2 sayfa değişkeninin değer form olduğu zaman alttaki kodlar çalışacak.
    $sayi=$_POST["sayi"]; // 2.1 form1 den gelen sayinin  değerini  post metodu ile alarak $sayi değişkenimize atadık.
?>
    <!-- 2.2 form oluşturma .   -->
    <form name="form2" action="<?php echo "?sayfa=listele&sayi=".$sayi?>" method="post"> 
     <!-- action kısmında 2 değişken bulunmakta.1.değişken listele bölümüne geçiş yapmak için . 2.değişken ise 1.formdan aldığımız sayinin değeri.  -->
    


<?php 
   // Adım2.3 for döngüsü oluşturma . 
   // gelen sayıya göre formlar oluşturulacak. Dikkat ederseniz burada for döngüsü formın içine yazıldı birden fazla form oluşturmayacak mıydık?
   // Aslında hayır biz sadece bir form içinde  birden fazla input(girdiler )  oluşturacağız bu inputlarında isimlerin sonuna sayi vererek kaçıncı girdi olduğunu belirticeğiz.
   //yani aşağıdaki form her döndüğünde üçer input üretecek . bu üç inputun isimlerinin sonunda aynı rakamlar olacak.böylelikle kaçıncı döngüden üretilen input olduğunu anlayacağız.
    for ($i=1;$i<=$sayi;$i++){
?>  
        <fieldset><!-- bu etiket form içindeki elemanları çerçevelendirecek.  -->
            <legend><?php echo $i.".Form"?></legend> <!-- çerçevenin başlığı . -->
            <div>
            <label for="sayi1">Sayı1</label>
            <input type="text" name="<?php echo "sayi1_".$i?>"> <!-- ilk döngüde  name="sayi1_1" olacak   -->
             <!-- biliyorsunuz inputun değerlerini yazdırmak için onları isimlerine ihtiyacımız vardı  -->
             <!-- birden fazla input olduğu için  inputların sonunda for döngüsünde oluşturduğumuz değişkenin değeri olacak-->            
             </div>
            <div>
            <label for="sayi2">Sayı2</label>
            <input type="text" name=<?php echo "sayi2_".$i?>><!-- ilk döngüde  name="sayi2_1" olacak   -->
            </div>
            <div>
            <label> işlem</label>
            <select name="<?php echo "islem".$i?>"><!-- ilk döngüde  name="islem_1" olacak   -->
            <option value="">Seçiniz</option>
            <option value="+">topla</option>
            <option value="-">çıkar</option>
            <option value="*">çarp</option>
            <option value="/">böl</option>
            </select>
            </div>
    
         

        </fieldset>
<?php
}//  2.3  döngünün kapanışı . sonradanda butonumuzu aşağına ekleyip formumuzu kapatacağız
?>
     <input type="submit" value="Gönder">
     </form>
   
<!-- Adım 2de  önce form1 den gelen sayiyi aldık.Ardından bir form oluşturduk. formun içinde for döngüsü kullanarak grup şeklinde  üçer input   oluşturduk.
Her grub elemanlarının  isimleri aynı biçimde fakat  son değeri ait olduğu grubun sayısı olacaktır.
  --->


<?php
break;// case ekle komutunun kapanışıdır.
 case "listele":
    //Adım 3 form2 den gelen verileri tabloda yazdırma.
        ?>
 <!-- 3.1 Bir tablo oluşturma. gelen verilerin sayısına göre sütünlerimizi oluşturduk. -->
<table  width="100%" border="1" cellpadding="0" cellspacing="0">
<tr>    
    
    <th>iŞLEM SAYI</th>
    <th>SAYI1</th>
    <th>SAYI2</th>
    <th>İŞLEM TİPİ</th>
    <th>SONUÇ</th>
</tr>


<?php 
//3.1 from2den gelen formların sayisini aldık.
$sayfa_sayi=$_GET["sayi"];

//3.2 sayfanın başına çağırdığımız hesap sınıfını hesap değişkenin içine atadık.
$hesap= new hesap();
    
//3.3 Hesapla diye bir fonkisyon oluşturuldu . içindede if koşulları ile işlemler yapılacak.
// Burada fonkisyonun içinde fonkisyon çağırılacak yukarıda tanımladığımız hesap sınıfın içindeki fonkisyonlar çalıştırıldı.
// $sayi1 ,$sayi2, $islem değişkenleride altta tanımlandı .
function hesapla(){
    global $islem,$hesap,$sayi1,$sayi2; // dıştan gelen değişkenleri fonkisyon içinde tanımladık.
    if ($islem=="+"){
        return $hesap->topla($sayi1,$sayi2) ; // hesap classının içindeki fonkisyonlar çağırıldı.
    }
    elseif ($islem=="-"){
        return $hesap->cikar($sayi1,$sayi2);
    }
    elseif ($islem=="*"){
        return $hesap->carp($sayi1,$sayi2);
    }
    elseif ($islem=="/"){
        return $hesap->bol($sayi1,$sayi2);
    }
} // fonkisyonun bitişi

//3.4 for döngüsü . form2 den gönderilen tüm bilgileri son rakamlarına göre for döngüsü ile yazdıracağız.
for ($x=3;$x>0;$x--){  // üstten gelen sayfa sayısına göre döngümüz tekrarlanacak.
   
    $sayi1=$_POST["sayi1_".$x]; // Biz üstte form oluştururken her inputun sonuna bir rakam vermiştik oda sayi1_1 yani 1.formun sayi1'i anlamına geliyor-
    $sayi2=$_POST["sayi2_".$x];
    $islem=$_POST["islem".$x];// tüm inputlar aslında aynı biçimde sadece son rakamları farklı idi bizde son rakamlara göre aynı form içindeki inputları yazdırdık.
       
?>
   


        <tr>
            <th class="<?= (($x+1)%2 == 0) ? "tek" :"cift"?>"><?php echo $x; ?></th> <!-- class lardan sadece damla tahtası gibi yapmak için yapılmıştır özel koşul yok.-->
            <th class="<?= (($x+2)%2 == 0) ? "tek" :"cift"?>"><?php echo $sayi1 ;?></th>    
            <th class="<?= (($x+3)%2== 0) ? "tek" :"cift"?>" > <?php echo $sayi2 ; ?></th>  
            <th class="<?= (($x+4)%2== 0) ? "tek" :"cift"?>" ><?php echo $islem ; ?></th>
            <th class="<?= (($x+5)%2== 0) ? "tek" :"cift"?>"><?php echo hesapla(); ?></th> <!--islem fonkisyonu burada çağırıldı  echo diye yazdırdım çünkü fonkisyon sadece bilgileri dönüştürecek-->
        </tr>
 
<?php
} //3.5 döngünün kapanışı
?>
    </table> <!-- Tabloyuda kapattım -->

<?php
// şimdi adım üçte from 2 den gelen verileri alıp tabloya yazdırdık . işlemleri classın içindeki fonkisyonları çağırarak yaptık.
/* yukarıdaki tüm kodlarda '<?php echo ? ' komutunu kullanarak yazdım daha kolay anlaşılsın diye . isterseniz <?=  ?> komutu ile yazdırabilirsiniz 
buda yukarıdaki echo nun kısaltmasıdır.  */
break; //3.6 listele komutunun bitişi.
default:


    /* Adım 1  önce bir swich oluşturuldu. içinde form ile listele case vardır. eğer swichin içindeki değer bu iki casein değerleri ile eşleşirse.
    eşleşen casin içindeki komutlar çalışacak.
    eğer  değişkenin değeri yukarıdaki case lerin herhangi biri ile eşleşmediği sürece  bu Default'ın içindeki komutlar çalışacak.  */
?>
<!-- Adım 1.1 Ekrana aşağıda oluşturduğumuz form gelecek ve bu formdan kullanıcıların işlem sayısı girmesini istenilecek. -->
<form name="form1 "action="?sayfa=form" method="post"> <!-- action kısmında  adres tarayıcının adres çubuğuna yazılacak . Sayfa değişkenimizin değeri form olacak.   -->
<!--içindeki değerlerde post metodu ile gönderilecek. -->
<div>
    <label for="sayi">İşlem sayisi</label>
    <input type="text" name="sayi">
    <input type="submit" value="gönder">
</div>
</form>
<?php
}

?>



</body>
</html>