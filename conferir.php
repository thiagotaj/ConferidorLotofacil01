<?php

$jogo = $_POST['jogo'] ?? [];
$sorteados = $_POST['sorteados'] ?? [];

if (count($jogo) != 15 || count($sorteados) != 15) {
    die("Erro: informe 15 números no jogo e 15 números sorteados.");
}

// Converte para números inteiros
$jogo = array_map('intval', $jogo);
$sorteados = array_map('intval', $sorteados);

// Remove números repetidos
$jogo = array_unique($jogo);
$sorteados = array_unique($sorteados);

// Ordena
sort($jogo);
sort($sorteados);

// Verifica quantidade correta
if (count($jogo) != 15) {
    die("Erro: seu jogo possui números repetidos. Informe 15 números diferentes.");
}

if (count($sorteados) != 15) {
    die("Erro: os números sorteados possuem repetição.");
}

// Descobre os números acertados
$acertos = array_intersect($jogo, $sorteados);

// Organiza
sort($acertos);

$quantidadeAcertos = count($acertos);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado - Lotofácil</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>🍀 Resultado da Lotofácil</h1>

    <h2>Seu jogo</h2>

    <div class="resultado">

        <?php
        foreach ($jogo as $numero) {
            echo '<span>' . str_pad($numero, 2, '0', STR_PAD_LEFT) . '</span>';
        }
        ?>

    </div>


    <h2>Números sorteados</h2>

    <div class="resultado">

        <?php
        foreach ($sorteados as $numero) {
            echo '<span>' . str_pad($numero, 2, '0', STR_PAD_LEFT) . '</span>';
        }
        ?>

    </div>


    <h2>Números acertados</h2>

    <div class="acertos">

        <?php

        if ($quantidadeAcertos > 0) {

            foreach ($acertos as $numero) {

                echo '<span>' .
                     str_pad($numero, 2, '0', STR_PAD_LEFT) .
                     '</span>';

            }

        } else {

            echo "<p>Nenhum número acertado.</p>";

        }

        ?>

    </div>


    <div class="resultado-final">

        <h2>
            Você acertou
            <?php echo $quantidadeAcertos; ?>
            números!
        </h2>

        <?php

        if ($quantidadeAcertos == 15) {

            echo "<p>🏆 15 acertos!</p>";

        } elseif ($quantidadeAcertos == 14) {

            echo "<p>🎉 14 acertos!</p>";

        } elseif ($quantidadeAcertos == 13) {

            echo "<p>👏 13 acertos!</p>";

        } elseif ($quantidadeAcertos == 12) {

            echo "<p>👍 12 acertos!</p>";

        } elseif ($quantidadeAcertos == 11) {

            echo "<p>🍀 11 acertos!</p>";

        } else {

            echo "<p>Continue tentando!</p>";

        }

        ?>

    </div>


    <a href="index.php" class="voltar">
        ← Conferir outro jogo
    </a>

</div>

</body>
</html>