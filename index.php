<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Conferidor Lotofácil</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>🍀 Conferidor Lotofácil</h1>

    <p class="instrucao">
        Selecione 15 números para o seu jogo.
    </p>

    <form action="conferir.php" method="POST">

        <h2>🎯 Seu jogo</h2>

        <div class="cartela">

            <?php
            for ($numero = 1; $numero <= 25; $numero++) {

                $numeroFormatado = str_pad($numero, 2, '0', STR_PAD_LEFT);

                echo '
                <label class="numero">
                    <input
                        type="checkbox"
                        name="jogo[]"
                        value="' . $numero . '"
                    >
                    <span>' . $numeroFormatado . '</span>
                </label>
                ';
            }
            ?>

        </div>

        <p id="contador">
            Números selecionados: <strong>0</strong> / 15
        </p>


        <h2>🎲 Números sorteados</h2>

        <div class="cartela">

            <?php
            for ($numero = 1; $numero <= 25; $numero++) {

                $numeroFormatado = str_pad($numero, 2, '0', STR_PAD_LEFT);

                echo '
                <label class="numero sorteado">
                    <input
                        type="checkbox"
                        name="sorteados[]"
                        value="' . $numero . '"
                    >
                    <span>' . $numeroFormatado . '</span>
                </label>
                ';
            }
            ?>

        </div>

        <p>
            Selecione 15 números sorteados.
        </p>


        <button type="submit">
            🔎 CONFERIR JOGO
        </button>

    </form>

</div>


<script>

const jogo = document.querySelectorAll(
    'input[name="jogo[]"]'
);

const sorteados = document.querySelectorAll(
    'input[name="sorteados[]"]'
);

const contador = document.querySelector(
    '#contador strong'
);


jogo.forEach(function(input) {

    input.addEventListener('change', function() {

        let selecionados = document.querySelectorAll(
            'input[name="jogo[]"]:checked'
        );

        contador.textContent = selecionados.length;

        if (selecionados.length > 15) {

            input.checked = false;

            selecionados = document.querySelectorAll(
                'input[name="jogo[]"]:checked'
            );

            contador.textContent = selecionados.length;

            alert('Você pode selecionar somente 15 números.');

        }

    });

});


sorteados.forEach(function(input) {

    input.addEventListener('change', function() {

        const selecionados = document.querySelectorAll(
            'input[name="sorteados[]"]:checked'
        );

        if (selecionados.length > 15) {

            input.checked = false;

            alert('Você pode selecionar somente 15 números sorteados.');

        }

    });

});
<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "lotofacil";

$conexao = new mysqli(
    $servidor,
    $usuario,
    $senha,
    $banco
);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>
</script>

</body>
</html>