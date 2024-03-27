


<!DOCTYPE html>
<!--Página que ira ter o objetivo de atualizar ou mudar os valores do cadastro do usuário.-->
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale 1.0">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <link rel="stylesheet" href="estilo/estilo.css">
        <title>Tela de login</title>
    </head>


    <body>

        <!--Criação do menu de navegação-->
        <main>

            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li class="atualizar-cadastro">Atualizar cadastro</li>
                <li><a href="Apagar.php">Apagar cadastro</a></li>
                <li><a href="Pesquisar.php">Pesquisar dados cadastrais</a></li>
            </ul>
        </main>

        <section>

            <!--Seção que ira conter o forms -->
            <?php

                /*Variáveis que irão receber o valor passado pelo usuário através do forms. As variáveis irão receber valores nulos como padrão.*/
                $usuario_antigo = $_POST['usuario_antigo']?? null;

                $senha_antiga = $_POST['senha_antiga']?? null;

                $usuario_novo = $_POST['usuario_novo']?? null;

                $senha_nova = $_POST['senha_nova']?? null;
            
            ?>

            <!--Imagem do perfil no forms-->
            <img src="imagens/perfil.png" alt="Imagem de perfil" class="imagem-perfil">

            <!--Criação do formulário-->
            <form action="<?php $_SERVER = ['PHP_SELF']?>" method="post">               

                <!--Label do usuário antigo-->
                <label for="usuario_antigo">Usuario atual</label>

                <!--Input do usuário antigo-->
                <input type="text" name="usuario_antigo" id="idusuario_antigo" class="input-usuario" required autocomplete="off"><br>

                <!--Label da senha antiga-->
                <label for="senha_antiga" class="label-senha">Senha atual</label>

                <!--Input da senha antiga-->
                <input type="number" name="senha_antiga" id="idsenha_antiga" class="input-senha" required autocomplete="off"><br>
                
                <!--Label do usuário novo-->
                <label for="usuario_novo" class="label-novo_usuario">Novo usuario</label>

                <!--Input do usuario novo-->
                <input type="text" name="usuario_novo" id="idusuario_novo" class="input-usuario" required autocomplete="off"><br>

                <!--Label da nova senha-->
                <label for="senha_nova" class="label-senha"> Nova senha</label>

                <!--Input da senha nova-->
                <input type="number" name="senha_nova" id="idnova_senha" class="input-senha" required autocomplete="off"></br>
                
                <!--Criação do botão de atualizae-->
                <input type="submit" value="Atualizar" class="botao-entrar" >
            </form>

                <?php
                    
                    /*Antes da chamada do metodo, o programa ira verificar se as variáveois foram inicializadas */
                    if(isset($usuario_antigo) && isset($senha_antiga) && isset($usuario_novo) && isset($senha_nova)){
                        
                        /*SE as variáveis tiverem campos nulos o prgrama ira chamar o metodo die que ira interromper a chamada dos metodos */
                        if($usuario_antigo == null && $senha_antiga == null && $usuario_novo == null && $senha_nova == null){

                            echo die("Não é possivel alterar compos nulos");
                        }

                        /*Caso as variáveis forem inicializadas o programa ira chamar os metodos de atualização de cadastro */
                        include 'BancoDeDados.php';

                        $banco = new BancoDeDados();

                        $banco->atualizarCadastro($usuario_antigo, $senha_antiga, $usuario_novo, $senha_nova);



                    }


                
                ?>
        </section>

           

    </body>
</html>