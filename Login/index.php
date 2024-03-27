<!DOCTYPE html>

<!--O intuito do sistema é criar uma tela de login, onde o sistema ira verificar se as informações existem no banco de dados mysql e apresente uma mensagem informando ao usuário se ele entrou ou não no sistema. -->
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale 1.0">
        <link rel="stylesheet" href="estilo/estilo.css">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <title>Tela de login</title>
  </head>

    <body>

        <!--Criação do menu de navegação-->
        <main>

            <ul>
                <li class="inicio">Inicio</li>
                <li><a href="Atualizar.php">Atualizar cadastro</a></li>
                <li><a href="Apagar.php">Apagar cadastro</a></li>
                <li><a href="Pesquisar.php">Pesquisar dados cadastrais</a></li>
            </ul>
        </main>
        <section>
        <!--Seção que ira conter o formulário-->
        <?php

            /*Variáveis globais que irão pegar o valor passado pelo usuário, através do forms. As variáveis terão como valor padrão o valor nulo, pois, o php me obriga a inicializar essas variáveis.*/
            $usuario = $_POST['usuario']??null;
            $senha = $_POST['senha']??null;
        
        ?>

            <!--Logo da imagem do forms-->
            <img src="imagens/perfil.png" alt="imagem de perfil" class="imagem-perfil">

                <!--Criação do formulário para login-->
                <form action="<?php $_SERVER = ['PHP_SELF']?>" method="post">

                    <!--Label do usuário-->
                    <label for="usuario" class="label-usuario"><strong>Usuario:</strong></label>
                    
                    <!--Input do usuário-->
                    <input type="text" name="usuario" id="idusuario" autocomplete="off" required class="input-usuario"><br>

                    <!--Label da senha-->
                    <label for="senha" class="label-senha"><strong>Senha:</strong></label>

                    <!--Input da senha-->
                    <input type="number" name="senha" id="idsenha" autocomplete="off" required class="input-senha"> <br>

                    <!--Criação do botão-->
                    <input type="submit" value="Entrar" class="botao-entrar">
                </form>

                <!--Criação do link para página de cadastros de usuários-->
                <p><a href="cadastro.php">Não possui uma conta? crie uma</a></p>

                <?php
                    
                    /*Nessa parte, vamos trabalhar a chamada de metodos da classe banco de dados */

                    /*Antes da chamada, devemos verificar se os campos do forms foram preenchidos.*/
                    if(isset($usuario) && isset($senha)){

                            /*Se o forms estiver com os campos nulos, o programa chama o metodo die
                            e não executa os metodos */
                            if($usuario == null && $senha == null){

                                die("Não é possivel verificar campos nulos");
                            }
                            
                            /*Caso os campos do forms estejam preenchidos, o programa irá 
                            executar o metodo de verificar login */
                            include 'BancoDeDados.php';

                            $banco = new BancoDeDados();

                            $banco->verificarLogin($usuario, $senha);
                    }

                    
                
                ?>
        </section>

        
            
    </body>
</html>