

<!DOCTYPE html>

    <!--Página que ira conter os forms para cadastro-->
    <html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale 1.0">
        <link rel="shotcuts icon" href="imagens/logo.jpg">
        <link rel="stylesheet" href="estilo/estilo.css">
        <title>Tela de login</title>
    </head>

    <body>

        <section>

            <!--Seção que irá conter os formulários-->
            <?php
            
                /*Variáveis globais que irão armazenar os valores dos usuários passados através dos formulários. As variáveis terão como valor padrão nulo. */
                $usuario = $_POST['usuario']??null;

                $senha = $_POST['senha']?? null;

                $id = null;
            ?>

            <!--Imagem do formulário-->
            <img src="imagens/perfil.png" alt="imagem de perfil" class="imagem-perfil">

            <!--Criação do formulário-->
            <form action="<?php $_SERVER=['PHP_SELF']?>" method="post">

                <!--Label do usuário-->
                <label for="usuario" class="label-usuario"><strong>nome de usuário</strong></label>

                <!--Input do usuário-->
                <input type="text" name="usuario" id="idusuario" class="input-usuario" autocomplete="off" required><br>
                
                <!--Label da senha-->
                <label for="senha" class="label-senha"><strong>crie uma senha:</strong></label>

                <!--Input da senha-->
                <input type="number" name="senha" id="idsenha" class="input-senha" autocomplete="off" required><br>
                
                <!--Criação do botão de cadastro-->
                <input type="submit" value="Criar login" class="botao-entrar">

                <!--Link para voltar a página de login-->
                <p><a href="index.php" class="link-voltar">Voltar ao login</a></p>
            </form>

        </section>

            <?php   

                /*Nessa parte, vamos chamar os metodos de cadastro no banco de dados.*/

                /*Antes de chamar os metodos o sistema ira verificar se as variáveis foram inicializadas.  */
               if(isset($usuario) && isset($senha)){

                    /*Caso os valores sejam nulos, o sistema ira interromper a chamada de metodos*/
                    if($usuario == null && $senha == null){

                        echo die("campos nulos: por favor preencha os campos");
                    }

                    /*Caso contrário o sistema ira chamar os metodos para cadastro de usuários no banco de dados. */
                    include 'BancoDeDados.php';

                    $banco =  new BancoDeDados();

                    $banco->inserir($id, $usuario, $senha);

               }
            
            
            ?>

    </body>
</html>