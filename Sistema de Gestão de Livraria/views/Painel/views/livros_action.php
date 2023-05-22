<?php
    require '../../config.php';
    require '../../verificar.php';
    require '../../admin1.php';

        if(isset($_POST["submit"])){
            $titulo = filter_input(INPUT_POST, 'titulo');
            $editora = filter_input(INPUT_POST, 'editora');
            $edicao = filter_input(INPUT_POST, 'edicao');
            $classe = filter_input(INPUT_POST, 'classe');
            $data_lancamento = filter_input(INPUT_POST, 'data_lancamento');
            $cadastrador = filter_input(INPUT_POST, 'cadastrador');
            $cod_categoria = filter_input(INPUT_POST, 'cod_categoria');
            $disponibilidade = filter_input(INPUT_POST, 'disponibilidade');
            $preco = filter_input(INPUT_POST, 'preco');
            if($preco === '' || $preco == 0){
                $preco = 0;
            }
            
            $sql = $pdo->prepare("SELECT *FROM livros WHERE titulo = :titulo AND editora = :editora AND edicao = :edicao AND classe = :classe");
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':editora', $editora);
            $sql->bindValue(':edicao', $edicao);
            $sql->bindValue(':classe', $classe);
            $sql->execute();

            if($sql->rowCount() === 0){

                if(!($_FILES["livro"] && $_FILES["img_livro"])){
                    echo "<script>alert('Erro! Prencha todos os campos.')</script>";
                    echo "<script>window.open('livros.php', '_self')</script>";
                    exit();
                }else{
                    $NameL = $_FILES["img_livro"]["name"];
                    $Size = $_FILES["img_livro"]["size"];
                    $tName = $_FILES["img_livro"]["tmp_name"];
                    $validateCapaExtension = ['jpg', 'png', 'jpeg'];
                    $capaExtension = explode('.', $NameL);
                    $capaExtension = strtolower(end($capaExtension));
                    $newCapaName = uniqid();
                    $newCapaName .= '.' . $capaExtension;
                    move_uploaded_file($tName, 'capas_upload/'.$newCapaName);
                
                    if (!in_array($capaExtension, $validateCapaExtension)){
                        echo "<script>alert('Erro ao carregar a capa do livro!')</script>";
                        echo "<script>window.open('livros.php', '_self')</script>";
                        exit();
                    }
                    $fileName = $_FILES["livro"]["name"];
                    $fileSize = $_FILES["livro"]["size"];
                    $tmpName = $_FILES["livro"]["tmp_name"];
                    $validateLivroExtension = ['pdf'];
                    $livroExtension = explode('.', $fileName);
                    $livroExtension = strtolower(end($livroExtension));
                    if (!in_array($livroExtension, $validateLivroExtension)){
                        echo "<script>alert('Formato inválido!')</script>";
                        echo "<script>window.open('livros.php', '_self')</script>";
                        exit();
                    }
                    elseif($fileSize > 15728640 || $fileSize == 0){
                        echo "<script>alert('Tamanho máximo suportado: 15MB')</script>";
                        echo "<script>window.open('livros.php', '_self')</script>";
                        exit(); 
                    }
                    else{
                        if($titulo && $editora && $edicao && $classe && $data_lancamento && $cadastrador && $cod_categoria && $newCapaName && $disponibilidade){
                        $newLivroName = uniqid();
                        $newLivroName .= '.' . $livroExtension;
                        move_uploaded_file($tmpName, 'livros_upload/'.$newLivroName);
                        $sql = $pdo->prepare("INSERT INTO livros (livro, titulo, editora, edicao, classe, data_lancamento, cadastrador, cod_categoria, img_livro, disponibilidade, preco) VALUES ('$newLivroName', '$titulo', '$editora', '$edicao', '$classe', '$data_lancamento', '$cadastrador', '$cod_categoria', '$newCapaName', '$disponibilidade', '$preco')");
                        $sql->execute();
                        echo "<script>alert('Novo Livro cadastrado com sucesso!')</script>";
                        echo "<script>window.open('livros.php', '_self')</script>";
                        exit();}else{
                            echo'error';
                        }
                    }
                }
            }else{
                echo "<script>alert('Este livro já existe!')</script>";
                echo "<script>window.open('livros.php', '_self')</script>";
            }
        }else{
        echo "<script>alert('Falha!')</script>";
        echo "<script>window.open('livros.php', '_self')</script>";
        exit();
    }
    ?>