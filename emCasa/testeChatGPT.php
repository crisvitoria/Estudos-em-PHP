<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Médias</title>
</head>
<body>
    <h1>Calculadora de Médias</h1>

    <?php
    // Função para calcular a média aritmética
    function calcularMediaAritmetica($notas) {
        return array_sum($notas) / count($notas);
    }

    // Função para calcular a média harmônica
    function calcularMediaHarmonica($notas) {
        $somaInversos = array_sum(array_map(function ($nota) {
            return 1 / $nota;
        }, $notas));
        return count($notas) / $somaInversos;
    }

    // Função para calcular a média ponderada
    function calcularMediaPonderada($notas, $pesos) {
        $somaProdutos = 0;
        for ($i = 0; $i < count($notas); $i++) {
            $somaProdutos += $notas[$i] * $pesos[$i];
        }
        $somaPesos = array_sum($pesos);
        return $somaProdutos / $somaPesos;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Receber as notas do formulário
        $nota1 = floatval($_POST["nota1"]);
        $nota2 = floatval($_POST["nota2"]);
        $nota3 = floatval($_POST["nota3"]);

        // Receber o tipo de média selecionado
        $tipoMedia = intval($_POST["tipo_media"]);

        // Inicializar variáveis para guardar os resultados
        $media = 0;

        if ($tipoMedia == 1) {
            $media = calcularMediaAritmetica([$nota1, $nota2, $nota3]);
        } elseif ($tipoMedia == 2) {
            $media = calcularMediaHarmonica([$nota1, $nota2, $nota3]);
        } elseif ($tipoMedia == 3) {
            // Solicitar o peso da terceira nota
            $peso = floatval($_POST["peso"]);
            $media = calcularMediaPonderada([$nota1, $nota2, $nota3], [1, 1, $peso]);
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nota1">Nota 1: </label>
        <input type="number" name="nota1" step="0.01" required><br>

        <label for="nota2">Nota 2: </label>
        <input type="number" name="nota2" step="0.01" required><br>

        <label for="nota3">Nota 3: </label>
        <input type="number" name="nota3" step="0.01" required><br>

        <label for="tipo_media">Escolha o tipo de média: </label>
        <select name="tipo_media">
            <option value="1">Média Aritmética</option>
            <option value="2">Média Harmônica</option>
            <option value="3">Média Ponderada</option>
        </select><br>

        <div id="pesoField" style="display: none;">
            <label for="peso">Peso da Nota 3: </label>
            <input type="number" name="peso" step="0.01"><br>
        </div>

        <script>
            document.querySelector("select[name='tipo_media']").addEventListener("change", function() {
                var pesoField = document.getElementById("pesoField");
                if (this.value == '3') {
                    pesoField.style.display = "block";
                } else {
                    pesoField.style.display = "none";
                }
            });
        </script>

        <input type="submit" value="Calcular Média">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>O resultado da média é: $media</h2>";
    }
    ?>
</body>
</html>