<?php

class Livro
{
    private $id;
    private $titulo;
    private $autor;
    private $genero;
    private $anopublicacao;

    public function __construct($titulo, $autor, $genero, $anopublicacao, $id = null)
    {
        $this->titulo        = $titulo;
        $this->autor         = $autor;
        $this->genero        = $genero;
        $this->anopublicacao = $anopublicacao;
        $this->id            = $id;
    }

    public function getId()             {return $this->id; }
    public function getTitulo()         {return $this->titulo; }
    public function getAutor()          {return $this->autor; }
    public function getGenero()         {return $this->genero; }
    public function getAnopublicacao()  {return $this->anopublicacao; }
}

$host = "localhost";
$porta = "5432";
$database = "php2404";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $livro = new Livro($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['anopublicacao']);

    $sql = "INSERT INTO livro(titulo, autor, genero, anopublicacao) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$livro->getTitulo(), $livro->getAutor(), $livro->getGenero(), $livro->getAnopublicacao()]);
}

$sqlListagem = "SELECT * FROM livro";
$resultado = $conexao->query($sqlListagem);
$rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

$livros = [];
foreach ($rows as $row) {
    $livros[] = new Livro($row['titulo'], $row['autor'], $row['genero'], $row['anopublicacao'], $row['id']);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
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
        .principal {
            display: flex;
            justify-content: space-around;
            height: 793px;
            background-color: #ffff;
            align-items: center;
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
                .rodape {
            background-color: rgb(95, 62, 117);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
        }
    </style>
</head>
<body>
    <header class="cabecalho">
    <h2 class="titulo">Cadastro de Livros</h2>
    </header>
    <section class="principal">
    <form method="post">
    <label>Título</label>
    <input type="text" name="titulo">
    <br></br>
    <label>Autor</label>
    <input type="text" name="autor">
    <br></br>
    <label>Gênero</label>
    <input type="text" name="genero">
    <br></br>
    <label>Ano de publicação</label>
    <input type="DATE" name="anopublicacao">
    <br></br>
    <button type="submit">Salvar</button>
    </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Genêro</th>
                <th>Data</th>
            </tr>
     <?php foreach ($livros as $livro): ?>
     <tr>
        <td><?= $livro->getId() ?></td>
        <td><?= $livro->getTitulo() ?></td>
        <td><?= $livro->getAutor() ?></td>
        <td><?= $livro->getGenero() ?></td>
        <td><?= $livro->getAnopublicacao() ?></td>
        </tr>
        <?php endforeach; ?>
         </table>
</section>
    <footer class="rodape">
        <a class="link1" href="index.php">Voltar ao menu</a>
    </footer>
</body>
</html>
