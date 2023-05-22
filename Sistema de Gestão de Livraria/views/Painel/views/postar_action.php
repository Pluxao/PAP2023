<?php
    require '../../config.php';
    require '../../verificar.php';
    require '../../admin1.php';
   
    if(isset($_POST["submit"])) {
    $titulo_post = filter_input(INPUT_POST, 'titulo_post');
    $post = filter_input(INPUT_POST, 'post');
    $postador = filter_input(INPUT_POST, 'postador');

    if(!isset($_FILES["img_post"])){
        echo "<script>alert('Imagem não encontrada!')</script>";
    }else{
        $NameL = $_FILES["img_post"]["name"];
                $Size = $_FILES["img_post"]["size"];
                $tName = $_FILES["img_post"]["tmp_name"];
                $validatePostExtension = ['jpg', 'png', 'jpeg'];
                $postExtension = explode('.', $NameL);
                $postExtension = strtolower(end($postExtension));
        }
        if (!in_array($postExtension, $validatePostExtension)) {
            echo "<script>alert('Campo vazio ou Formato inválido!')</script>";
            echo "<script>window.open('postagens.php', '_self')</script>";
            exit();
        }
        elseif($Size > 1000000){
            echo "<script>alert('Tamanho de imagem superior ao esperado!')</script>";
        }
        else{
            $newPostName = uniqid();
            $newPostName .= '.' . $postExtension;
            move_uploaded_file($tName, 'post_upload/'.$newPostName);
            $sql = $pdo->prepare("INSERT INTO posts (img_post, titulo_post, post, postador) VALUES ('$newPostName', '$titulo_post', '$post', '$postador')");
            $sql->execute();
            echo "<script>alert('Novo Post publicado!')</script>";
            echo "<script>window.open('postagens.php', '_self')</script>";
            exit();
        }
    }
?>
