

<!--Página que será responsável por apagar usuários do banco de dados-->
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale 1.0">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <link rel="stylesheet" href="estilo/estilo.css">
        <title>Tela de Login</title>
    </head>

    <body>

        <!--Criação do menu de navegação-->
        <main>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Atualizar.php">Atualizar cadastro</a></li>
                <li class="apagar-cadastro">Apagar cadastro</li>
                <li><a href="Pesquisar.php">Pesquisar dados cadastrais</a></li>
            </ul>
       </main>

        <section>
            <!--Seção que ira conter o forms-->
            <?php

                /*Variaveis globais que irão receber os valores do forms. As 
                variáveis irão receber como padrão o valor nulo.*/
                $usuario = $_POST['usuario']?? null;

                $senha = $_POST['senha']?? null;
            
            ?>
            
            <!--Imagem do forms-->
            <img src="imagens/perfil.png" alt="imagem de perfil" class="imagem-perfil">
            <form action="<?php $_SERVER = ['PHP_SELF']?>" method="post">

                <!--Label do usuário-->
                <label for="usuario"> informe o usuário</label>
                <input type="text" name="usuario" id="idusuario" class="input-usuario" required autocomplete="off"><br>
                
                <!--Input do usuario-->
                <label for="senha" class="label-senha">Informe a senha</label>
                <input type="number" name="senha" id="idsenha" class="input-senha" required autocomplete="off"><br>

                <!--Input do usuário-->
                <input type="submit" value="Apagar" class="botao-entrar">
            </form>

            <?php

                /*Antes de chamar os metodos, o programa ira verificar se as variáveis foram inicializadas.*/
                if(isset($usuario) && isset($senha)){

                    /*Se a variável for inicializada com valores nulos, o metodo die ira interromper a chamada do metodo. */
                    if($usuario == null && $senha == null){

                        die("Não é possivel continuar sem preenchimento dos campos");
                    }

                    /*Se as variáveis forem inicializadas e não nulas o programa ira chamar os metodos para a exclusão dos usuários. */

                    include 'BancoDeDados.php';

                    $banco = new BancoDeDados();

                    $banco->apagar($usuario, $senha);
                }
            
            ?>

        </section>
    </body>
</html>