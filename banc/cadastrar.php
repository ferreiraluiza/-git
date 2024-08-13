<?php

$severname = 'localhost';
$username = 'root';
$password = '1234';
$dbname = "db_anna";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("a conexão falhou segue o erro:" . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS user(
    id INT(6) UNSIGNED AUTTO_INCREMENT PRIMARY KEY,
    login VARCHAR(30) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPADATE CURRENT_TIMESTAMP
    )";
    $conn ->query($sql);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $sql = "INSERT INTO users (login, senha) VALUES ('$login', '$senha');
        $conn->query($sql);
         echo "cadastro realizado com sucesso! redirecionando para a página de logn...."
    } else{
        ?>
        <form action=''<?php echo htmlspecialchars     ($_SERVER["PHP_SELF"]); ?>"method="post">
<label for="login">Login</label><br>
<input type="text" name="login"><br>
<label for="senha">Senha</label><br>
<input type="password" name="senha"><br>
<input type="submit" value="cadastrar">
        </form>
        <?php
    }

