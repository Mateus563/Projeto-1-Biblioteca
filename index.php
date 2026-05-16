<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
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
        .link1{
            text-decoration: none;
            color: white;
            background-color: #2c3e50;
            padding: 10px 20px;
            border-radius: 8px;
            margin-right: 10px;
            font-weight: bold;
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
            height: 580px;
            background-color: #ffff;
            align-items: center;
        }
        .descricao {
            font-size: 22px;
            font-style: italic;
            text-align: center;
            margin: 30px 0;
            color: #2c3e50;
        }
        .secundaria {
            display: flex;
            justify-content: space-around;
            height: 213px;
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
        <h2 class="titulo">Sistema da Biblioteca</h2>

    </header>
    <section class="principal">
<h2 class="descricao">Entre páginas e pensamentos, a leitura se revela uma 
    poderosa fonte de inspiração. Ler livros é mais do que um hábito: é uma
     forma de crescer, refletir e encontrar significado em cada momento.</h2>
     </section>
     <section class="secundaria">
<a class="link1" href="livro.php">Cadastros de Livros</a>
    <br></br>
    <a class="link1" href="leitor.php">Cadstros de Leitores</a>
     </section>
    <footer class="rodape">

    </footer>
</body>
</html>

