<?php
include_once($_SERVER['DOCUMENT_ROOT']."/bd/conexao.php");
session_start();
if (isset($_SESSION['tipo']) || isset($_SESSION['id_usuario'])){
    $iduser = $_SESSION['id_usuario'];
    $tipo = $_SESSION['tipo'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universo Estudantil</title>
    <link rel="icon" type="image/x-icon" href="/assets/img/logo.ico">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
    <div class="logo-container">
            <img src="/assets/img/logo.png" alt="Logo Universo Estudantil" class="logo">
            <h1>Universo Estudantil</h1>
        </div>
        <nav>
            <ul class="menu">
                <li><a href="#noticias">Notícias</a>
                    <ul class="submenu">
                        <li><a href="#ultimas">Últimas notícias</a></li>
                        <li><a href="#educacao">Educação</a></li>
                        <li><a href="#tecnologia">Tecnologia</a></li>
                        <li><a href="#ciencia">Ciência</a></li>
                    </ul>
                </li>
                <li><a href="#enem">ENEM</a>
                    <ul class="submenu">
                        <li><a href="#provas">Provas Anteriores</a></li>
                        <li><a href="#simulados">Simulados</a></li>
                        <li><a href="#dicas">Dicas de Estudo</a></li>
                        <li><a href="#calendario">Calendário</a></li>
                        <li><a href="#inscricoes">Inscrições</a></li>
                        <li><a href="#editais">Editais</a></li>
                    </ul>
                </li>
                <li><a href="#materias">Matérias</a>
                    <ul class="submenu">
                        <li><a href="#matematica">Matemática</a></li>
                        <li><a href="#linguagens">Linguagens</a></li>
                        <li><a href="#ciencias-natureza">Ciências da Natureza</a></li>
                        <li><a href="#ciencias-humanas">Ciências Humanas</a></li>
                        <li><a href="#redacao">Redação</a></li>
                    </ul>
                </li>
                <li><a href="#vocacional">Orientação Vocacional</a>
                    <ul class="submenu">
                        <li><a href="#testes">Testes Vocacionais</a></li>
                        <li><a href="#carreiras">Carreiras</a></li>
                        <li><a href="#depoimentos">Depoimentos de Profissionais</a></li>
                    </ul>
                </li>
                <li><a href="#blog">Blog</a>
                    <ul class="submenu">
                        <li><a href="#artigos">Artigos</a></li>
                        <li><a href="#entrevistas">Entrevistas</a></li>
                        <li><a href="#opiniao">Opinião</a></li>
                    </ul>
                </li>
                <li><a href="#contato">Contato</a>
                    <ul class="submenu">
                        <li><a href="#fale-conosco">Fale Conosco</a></li>
                        <li><a href="#faq">Perguntas Frequentes (FAQ)</a></li>
                    </ul>
                </li>
                <!-- Login e Logout no menu -->
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <li><a href="/controle/controle_usuario.php?case=logout">Deslogar</a></li>
                    <li><a href="usuario.php">Usuário</a></li>
                <?php else: ?>
                    <li><a href="login.html">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <h3>Posts:</h3>
    <div class="container-posts">
        <p>Criar um <a href="form_post.php?case=insert">Post</a></p>
        <?php
            $sql = "SELECT * FROM tb_post";
            $conexao = conectarDB();
            $result = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $idpost = $row['id_post'];
                echo "<div class='post'>";
                echo "<p>" . $row['legenda'] . "</p>";
                echo "<p>" . $row['data_postagem'] . "</p>";
                echo "<p>" . $row['filtro'] . "</p>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>
