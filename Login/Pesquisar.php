


<!DOCTYPE html>
<!--Página que ira conter o formulário para pesquisa de usuários-->
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale 1.0">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <link rel="stylesheet" href="estilo/estilo.css">
        <title>Tela de login</title>
    </head>

    <body>

        <!--Menu de navegação-->
        <main>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="Atualizar.php">Atualizar cadastro</a></li>
                <li><a href="Apagar.php">Apagar cadastro</a></li>
                <li class="pesquisar-cadastro">Pesquisar dados cadastrais</li>
            </ul>
        </main>
        <section>
            <!--Seção que ira conter o formulário-->
            <?php

                /*Variável que ira conter o valor passado pelo usuário através do formulário*/
                $id = $_POST['id']?? null;
            
            ?>
            
            <!--Imagem do perfil-->
            <img src="imagens/perfil.png" alt="imagem de perfil" class="imagem-perfil">

            <!--Criação do formulário-->
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                
                <!--Label do id-->
                <label for="id" class="label-senha">Informe o id do usuário</label>

                <!--Input do id-->
                <input type="number" name="id" id="idid" class="input-senha" required autocomplete="off"><br>

                <!--Criação do botão de pesquisa-->
                <input type="submit" value="Pesquisar" class="botao-entrar">
            </form>
        </section>

        <section>
                <?php

                    /*Parte da chamada de metodos */
                    /*Antes da chamada de metodos, o sistema irá verificar se a variável foi inicializada */
                    if(isset($id)){

                        /*Se a variável tiver nulo, o sistema ira interromper a chamada de metodos */
                        if($id == null){

                            die("Não é possivel pesquisar um campo nulo");
                        }

                        /*Caso a variável não seja nula e esteja inicializada o programa ira chamar o metodo de consulta e pesquisa. */
                        include 'BancoDeDados.php';

                        $banco = new BancoDeDados();

                        $banco->pesquisar($id);

                        
                    }
        
              ?>
            </section>
    </body>
</html>