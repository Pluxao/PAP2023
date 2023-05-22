<?php
    require '../../config.php';
    require '../../verificar1.php';
   require '../../user1.php';
   
    if(isset($_POST["submit"])) {
    $id = filter_input(INPUT_POST, 'id');
    if(!isset($_FILES["imagem_perfil"])){
        echo "<script>alert('Imagem não encontrada!')</script>";
    }else{
        $fileName = $_FILES["imagem_perfil"]["name"];
        $fileSize = $_FILES["imagem_perfil"]["size"];
        $tmpName = $_FILES["imagem_perfil"]["tmp_name"];
        $validateImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validateImageExtension)) {
            echo "<script>alert('Formato inválido!')</script>";
            echo "<script>window.open('umeuperfil.php', '_self')</script>";
            exit();
        }
        elseif($fileSize > 1000000){
            echo "<script>alert('Tamanho de imagem superior ao esperado!')</script>";
            echo "<script>window.open('umeuperfil.php', '_self')</script>";
        }
        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'img_upload/'.$newImageName);
            $sql = $pdo->prepare("UPDATE usuarios SET imagem_perfil = '$newImageName' WHERE id = '$id'");
            $sql->execute();
            echo "<script>alert('A sua foto foi carregada!')</script>";
            echo "<script>window.open('umeuperfil.php', '_self')</script>";
            exit();
        }
    }
}?>
