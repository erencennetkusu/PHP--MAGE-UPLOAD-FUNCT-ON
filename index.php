<?php 

$img = "resim"; // form tarafında type 'file olan inputa verilen name degeri direk olarak yazılır .
$list = "img/productImg/";

 function upload($img, $list) {
    $input = $img;
    $klasor = $list;
    $target_dir = $klasor;
    $target_file = $target_dir . basename($_FILES[$input]['name']);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $filename = uniqid();
    $extension = pathinfo($_FILES[$input]['name'], PATHINFO_EXTENSION);
    $basename = $_FILES[$input]['name'];

    $yeniyol = $target_dir . $basename;

    // Geçerli dosya türlerini tanımlayalım (JPEG ve PNG)
    $allowed_extensions = array('jpg', 'jpeg', 'png',"JPG","PNG");

    // Dosya türünü kontrol edelim
    if (!in_array($extension, $allowed_extensions)) {
        // Geçersiz dosya türü
        return false;
    }

    move_uploaded_file($_FILES[$input]['tmp_name'], $yeniyol);

    return $basename;
}


upload($img,$list);

//işte kullanımı bu kadar basit  veritabanına img ismini basmak için bir degişken içine bile aktarılabilir örnek olarak

$resim = upload($img,$list);

// $resim degişkenini veritabanı ekleme işleminde sutun karşılaştırması olarak gönderdiginizde veritabanına random oluşturudugu name degerini basicaktır