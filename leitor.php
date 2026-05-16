<?php

class Leitor
{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;

    public function __construct($nome, $cpf, $telefone, $id = null)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this-> id = $id;
    }

    public function getId()       { return $this->id; }
    public function getNome()     { return $this->nome; }
    public function getCpf()      { return $this->cpf; }
    public function getTelefone() { return $this->telefone; }
}

$host = "localhost";
$porta = "5432";
$database = "php2404";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leitor = new Leitor($_POST['nome'], $_POST['cpf'], $_POST['telefone']);
    
    $sql = "INSERT INTO leitor(nome, cpf, telefone) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$leitor->getNome(), $leitor->getCpf(), $leitor->getTelefone()]);
}

$sqlListagem = "SELECT * FROM leitor";
$resultado = $conexao->query($sqlListagem);
$rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

$leitores = [];
foreach ($rows as $row) {
    $leitores[] = new Leitor($row['nome'], $row['cpf'], $row['telefone'], $row['id']);
}    


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Leitores</title>
        <style>
            body {
            margin: 0;
            padding: 0;
            }
            .cabecalho {
            background-color: rgb(95, 62, 117);
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 80px;
            }
            .titulo {
            font-size: 22px;
            font-style: italic;
            text-align: center;
            margin: 30px 0;
            color: #ffff;
            }
            .link1{
            text-decoration: none;
            color: white;
            background-color: #2c3e50;
            padding: 10px 20px;
            border-radius: 8px;
            margin-right: 10px;
            font-weight: bold;
            }
            .principal {
            display: flex;
            justify-content: space-around;
            height: 793px;
            background-color: #ffff;
            align-items: center;
            }
             .rodape {
            background-color: rgb(95, 62, 117);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
            }
        </style>
        <link href="styles.css" rel="stylesheet"/>
</head>
<body>
<header class="cabecalho"> 
    <h2 class="titulo">Cadastro de Leitores</h2>
    </header>
    <section class="principal">
        <form method="post">
        <label>Nome</label>
        <input type="text" name="nome">
        <br></br>
        <label>CPF</label>
        <input type="text" name="cpf">
        <br></br>
        <label>Telefone</label>
        <input type="text" name="telefone">
        <br></br>
        <button type="submit">Salvar</button>
        </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
            </tr>
        <?php foreach ($leitores as $leitor): ?>
        <tr>
        <td><?= $leitor->getId() ?></td>
        <td><?= $leitor->getNome() ?></td>
        <td><?= $leitor->getCpf() ?></td>
        <td><?= $leitor->getTelefone() ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
    </section>
    <footer class="rodape">
            <a class="link1" href="index.php">Voltar ao menu</a>
    </footer>
</body>
</html>
