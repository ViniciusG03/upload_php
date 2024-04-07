<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
        $arquivo_tmp = $_FILES["imagem"]["tmp_name"];
        $nome_arquivo = $_FILES["imagem"]["name"];
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

        //Aqui eu verifico se a extensão é uma imagem válida
        if (in_array($extensao, array("jpg", "png", "bmp"))) {
            //Move o arquivo para uma pasta no servidor
            $destino = "uploads/" . $nome_arquivo;
            move_uploaded_file($arquivo_tmp, $destino);

            //Exibe a imagem utilizando a tag <img>
            echo "<img src='$destino' alt='Imagem carregadda'>";
        
        } else {
            echo "Erro: Formato de arquivo não suportado";
        }       
    } else {
        echo "Erro: Nenhum arquivo enviado.";
    }

?>