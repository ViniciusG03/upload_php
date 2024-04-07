<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf"])) {
    $arquivo_tmp = $_FILES["pdf"]["tmp_name"];
    $nome_arquivo = $_FILES["pdf"]["name"];
    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
    
    // Verifica se a extensão é PDF
    if ($extensao === "pdf") {
        // Move o arquivo para uma pasta no servidor
        $destino = "uploads/" . $nome_arquivo;
        move_uploaded_file($arquivo_tmp, $destino);
        
        // Cria um link para o arquivo PDF
        echo "<a href='$destino' target='_blank'>Link para o PDF</a>";
    } else {
        echo "Erro: Formato de arquivo não suportado.";
    }
} else {
    echo "Erro: Nenhum arquivo enviado.";
}
?>