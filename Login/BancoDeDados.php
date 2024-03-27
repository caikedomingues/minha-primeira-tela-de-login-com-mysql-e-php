



<?php


    class BancoDeDados{


        private function conexao(){


            /*primeiro temos que colocar todos os códigos em um bloco try e catch */

            try{
                
                /*A variável con ira conter a instanciação e o link para conexao */
                /*O link deve conter o comando padrão 'mysql:host=endereço do servidor; a porta do
                mysql; dbname=nome do banco de dados', 'usuario', 'senha'. */

                $con = new PDO('mysql:host=127.0.0.1;port=3306;dbname=login','root','');

                /*Retorno da conexão*/
                return $con;

            }catch(PDOException $erro){

                /*Caso a conexao não funcione, o catch ira informar o usuário sobre o
                erro. */
                echo "<p> Não foi possivel se conectar ao banco de dados: $erro</p>";

            }
        }


        /*Metodo que ira inserir os dados no banco de dados */

        public function inserir( int $id = null, string $usuario = null , int $senha = null){

            /*Variável que ira conter a conexao com o banco de dados */
            $conexao = $this->conexao();
            /*Nesta parte ele ira acessar o banco de dados e executar uma consulta SQL para selecionar todas as colunas da tabela pessoas onde o nome de usuário (usuario) corresponde ao valor fornecido $usuario. Isso serve para ele varrer o banco de dados e procurar a informação passada pelo usuário */
            $comando = $conexao->query("SELECT * FROM pessoas WHERE usuario = '$usuario'");

            /*Esta linha busca a próxima linha do resultado da consulta e a armazena em $row como um array associativo. */
            /*Array associativo: array que possuem indices personalizados por exemplo: um array com indice "nome" que contem o valor 
            "joão" é um array associativo. */
            $row = $comando->fetch(PDO::FETCH_ASSOC);

           /* Esta linha obtém o número de linhas afetadas pela consulta, que neste caso corresponde ao número de registros encontrados.*/
            $quantidade = $comando->rowCount();

            /*Aqui o programa ira verificar se o a quantidade de registros encontradas é maior que 0, caso 
            tenha algum registro, o programa ira informar que o cadastro ja existe e que o usuário tera que 
            escolher outro nome */
            if($quantidade > 0){

                echo "<script>alert('Esse usuário ja existe, tente novamente')</script>";


            }else{

                /*Caso contrário, o programa ira cadastrar o novo usuário no sistema */
                echo "<script>alert('Dados Cadastrados')</script>";

                $comando = $conexao->prepare("INSERT INTO pessoas(usuario, senha) Values(:usuario, :senha)");

                $comando->bindParam(':usuario', $usuario);
    
                $comando->bindparam(':senha', $senha);
    
                $comando->execute();
            }
        }

        /*Essa função terá como objetivo, permitir ou impedir que o usuário entre no sistema*/
        public function verificarLogin(string $usuario, int $senha){

            /*Variável que ira chamar o metodo de conexão */
            $conexao = $this->conexao();

              /*Nesta parte ele ira acessar o banco de dados e executar uma consulta SQL para selecionar todas as colunas da tabela pessoas onde o nome de usuário (usuario) e a senha(senha) corresponde ao valor fornecido $usuario. Isso serve para ele varrer o banco de dados e procurar a informação passada pelo usuário */
            $comando = $conexao->query("SELECT * FROM pessoas WHERE usuario = '$usuario' AND senha = '$senha'") or die("Não foi possivel realizar a consulta");

            /*Esta linha busca a próxima linha do resultado da consulta e a armazena em $row como um array associativo. */
            /*Array associativo: array que possuem indices personalizados por exemplo: um array com indice "nome" que contem o valor 
            "joão" é um array associativo. */
            $row = $comando->fetch(PDO::FETCH_ASSOC);

            /* Esta linha obtém o número de linhas afetadas pela consulta, que neste caso corresponde ao número de registros encontrados.*/
            $quantidade = $comando->rowCount();

            /*Se a quantidade de registros for maior que 0, ou seja, se existir um registro, o sistema ira
            informar que o login do usuário foi efetuado com sucesso */
            if($quantidade > 0){

                echo "<script> alert('Usuário logado com sucesso')</script>";

            }else{

                /*Caso não haja um registro, o sistema informara que o login não foi efetuado */
                echo "<script>alert('usuário não encontrado')</script>";
            }



        }

       /*Função responsável por atualizar ou modificar o cadastro dos usuários */ 
        public function atualizarCadastro(string $usuario_antigo , int $senha_antiga , string $usuario_novo, int $senha_nova ){

            /*Variável que ira conter a conexão com banco de dados*/
            $conexao = $this->conexao();


             /*Nesta parte ele ira acessar o banco de dados e executar uma consulta SQL para selecionar todas as colunas da tabela pessoas onde o nome de usuário (usuario_anigo) e a senha(senha_antiga) corresponde ao valor fornecido $usuario. Isso serve para ele varrer o banco de dados e procurar a informação passada pelo usuário */
            $comando = $conexao->query("SELECT * FROM pessoas WHERE usuario = '$usuario_antigo' AND senha = '$senha_antiga' ") or die("Não foi possivel realizar a consulta");


             /*Esta linha busca a próxima linha do resultado da consulta e a armazena em $row como um array associativo. */
            /*Array associativo: array que possuem indices personalizados por exemplo: um array com indice "nome" que contem o valor 
            "joão" é um array associativo. */
            $row = $comando->fetch(PDO::FETCH_ASSOC);


            /* Esta linha obtém o número de linhas afetadas pela consulta, que neste caso corresponde ao número de registros encontrados.*/
            $quantidade = $comando->rowCount();


             /*Se a quantidade de registros for maior que 0, ou seja, se existir um registro, o sistema ira atualizar o cadastro do usuário */
            if($quantidade > 0){

                echo "<script> alert('Usuário encontrados. Dados atualizados') </script>";

                $comando = $conexao->query("UPDATE pessoas set usuario ='$usuario_novo' WHERE usuario = '$usuario_antigo'");

                $comando = $conexao->query("UPDATE pessoas set senha ='$senha_nova' WHERE senha = '$senha_antiga'");


            }else{

                /*Caso não haja nenhum registro, o sistema ira informar ao usuário que os dados não foram atualizados */
                echo "<script> alert('não foi possivel atualizar os dados. O usuario e a senha não foram encontrados')</script>";

            }  
        }


        /*Variável responsável por apagar usuários do banco de dados*/
        public function apagar(string $usuario, int $senha){

            /*Variável que irá se conectar ao banco de dados */
            $conexao = $this->conexao();

            /*Nesta parte ele ira acessar o banco de dados e executar uma consulta SQL para selecionar todas as colunas da tabela pessoas onde o nome de usuário (usuario) e a senha(senha) corresponde ao valor fornecido $usuario. Isso serve para ele varrer o banco de dados e procurar a informação passada pelo usuário */
            $comando = $conexao->query("SELECT * FROM pessoas WHERE usuario = '$usuario' AND senha='$senha'") or die("Não foi possivel realizar a consulta"); 


            /*Esta linha busca a próxima linha do resultado da consulta e a armazena em $row como um array associativo. */
            /*Array associativo: array que possuem indices personalizados por exemplo: um array com indice "nome" que contem o valor 
            "joão" é um array associativo. */
            $row = $comando->fetch(PDO::FETCH_ASSOC);

            /* Esta linha obtém o número de linhas afetadas pela consulta, que neste caso corresponde ao número de registros encontrados.*/
            $quantidade = $comando->rowCount();

            /* Se a quantidade de registros for maior que 0, ou seja, se existir um registro o sistema ira apagar ele do sistema.*/
            if($quantidade > 0){

                echo "<script> alert('Usuário apagado')</script>";

                $comando = $conexao->query("DELETE FROM pessoas WHERE usuario = '$usuario' AND senha = '$senha'");

            }else{

                /*Caso contrario, o sistema ira informar ao usuário que não existe um registro para ser excluido. */
                echo "<script> alert('não é possivel apagar um usuário inexistente')</script>"; 
            }

        }


        /*Metodo responsável por pesquisar as informações dos usuários no banco de dados */
        public function pesquisar(int $id){

            /*Variável que ira se conectar ao banco de dados */
            $conexao = $this->conexao();

            /*Consulta no banco de dados, para verificar a quantidade de registros */
            $comando = $conexao->query("SELECT * FROM pessoas WHERE id = '$id' ") or die("Não foi possivel realizar a consulta");

            /*busca as linhas encontradas pela consulta e armazena em um array associativo */
            $row = $comando->fetch(PDO::FETCH_ASSOC);
            
            /*Ira contar a quantidade de registros encontrados */
            $quantidade = $comando->rowCount();

            /*Se a quantidade de registros for maior que 0, o sistema dara um select e irá apresentar no fim da página o nome eo id de usuário.  */
            if($quantidade > 0){

                echo "<script> alert('usuario encontrado. verifique as informações no fim da página')</script>";

                $comando = $conexao->query("SELECT id, usuario FROM pessoas WHERE id = '$id'");

                foreach($comando as $dado){

                    echo "<p>id: ".$dado[0]."</p>";

                    echo "<p> usuario: ".$dado[1]."</p>";

                }

            }else{

                /*Caso contrário, o sistema ira informar ao usuário que não existe o registro */
                echo "<script>alert('não foi possivel encontrar o usuário')</script>";
            }
        }

    }


    



?>