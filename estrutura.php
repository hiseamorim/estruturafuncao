<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verificação de Números</title>
    <link rel="stylesheet" href="estrutura.css">
</head>
<body>
    <h1>Insira os Números para Verificação</h1>
    <form action="process.php" method="post">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>

        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>

        <label for="num3">Número 3:</label>
        <input type="number" id="num3" name="num3" required><br><br>

        <label for="num4">Número 4:</label>
        <input type="number" id="num4" name="num4" required><br><br>

        <label for="num5">Número 5:</label>
        <input type="number" id="num5" name="num5" required><br><br>

        <input type="submit" value="Verificar Números">
    </form>

    <h1>Resultados da Verificação de Números</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numeros = [];
        $erros = false;

        // Verificar se todos os números foram fornecidos e são válidos
        for ($i = 1; $i <= 5; $i++) {
            $input_name = "num" . $i;
            if (isset($_POST[$input_name]) && is_numeric($_POST[$input_name])) {
                $numeros[] = $_POST[$input_name];
            } else {
                echo "<p>O número $i não é válido.</p>";
                $erros = true;
            }
        }

        if (!$erros) {
            // Função para verificar se o número é par ou ímpar
            function verificarParidade($numero) {
                if ($numero == 0) {
                    return "neutro";
                }
                return ($numero % 2 == 0) ? "par" : "ímpar";
            }

            // Função para verificar se o número é redondo (múltiplo de 10)
            function verificarRedondo($numero) {
                return ($numero % 10 == 0) ? "redondo" : "não redondo";
            }

            // Função para verificar se o número é positivo, negativo ou zero
            function verificarSinal($numero) {
                if ($numero > 0) {
                    return "positivo";
                } elseif ($numero < 0) {
                    return "negativo";
                } else {
                    return "neutro";
                }
            }

            // Função para obter a descrição completa do número
            function obterDescricao($numero) {
                $paridade = verificarParidade($numero);
                $redondo = verificarRedondo($numero);
                $sinal = verificarSinal($numero);

                if ($numero == 0) {
                    return "O número zero é neutro.";
                }

                return "O número $numero é $paridade, $sinal e $redondo.";
            }

            // Exibir os resultados para cada número
            foreach ($numeros as $numero) {
                echo "<p>" . obterDescricao($numero) . "</p>";
            }
        }
    }
    ?>
</body>
</html>




  