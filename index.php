<?php

//if(!empty($_POST['usuario']) && !empty($_POST['senha'])) {

$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
$usuario = 'root';
$senha = '';

    try { //tentar realizar uma conexão
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = "select * from tb_usuarios where ";
        $query .= " email = :usuario ";
        $query .= " AND senha = :senha ";

        $stmt = $conexao->prepare($query);

        $stmt->bindValue(':usuario', $_POST['usuario']);
        $stmt->bindValue(':senha', $_POST['senha']);

        $stmt->execute();

        $usuario = $stmt->fetch();

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';


        /* $query = '
            select * from tb_usuarios
        ';

        //$stmt = $conexao->query($query); //statement -> retorna o metodo $query

        foreach($conexao->query($query) as $chave => $valor) {
            print_r($valor);
            echo '<hr>'; 
        } //percorre todo o array substituindo o comando acima e os abaixo.
        
        //$lista_usuario = $stmt->fetchAll(PDO::FETCH_ASSOC); //retorna apenas os indices associativos da tabela // fetch_num retorna os indices numericos // fetch_both retorna ambos // fetch_obj nao retorna o array e sim o objeto

        //$lista = $stmt->fetch(PDO::FETCH_OBJ); //o método 'FETCH'retorna apenas um dado

        //echo '<pre>';
        //print_r($lista_usuario);
        //echo '</pre>';

        /*foreach($lista_usuario as $key => $value){
            echo $value['nome'];
            echo '<hr>';
        } */

        //echo $lista[0]['nome']; //recuperando o dado dentro do primeiro array de índice 0 e do segundo array de índice nome

    } catch(PDOException $e) { //e se houver um erro, iremos capturar o erro e tomar uma ação
        echo 'Erro: '.$e->getCode().' Mensagem: '.$e->getMessage();
        // registrar erro

    }
//}

?>

<html>
        <head>
            <meta charset="urf-8">
            <title>Login</title>
        </head>

        <body>
            <form method="POST" action="index.php">
                <input type="text" placeholder="usuário" name="usuario"/>
                <br>
                <input type="password" placeholder="senha" name="senha">
                <br>

                <button type="submit">Entrar</button>
            </form>
        </body>
    </html>