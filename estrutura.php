<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verificação de Números</title>
    <link rel="stylesheet" href="estrutura.css">
</head>
<body>
    <h1>Insira os Números para Verificação</h1>
    <form action="" method="post">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="numeros[]" required><br><br>

        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="numeros[]" required><br><br>

        <label for="num3">Número 3:</label>
        <input type="number" id="num3" name="numeros[]" required><br><br>

        <label for="num4">Número 4:</label>
        <input type="number" id="num4" name="numeros[]" required><br><br>

        <label for="num5">Número 5:</label>
        <input type="number" id="num5" name="numeros[]" required><br><br>

        <input type="submit" value="Verificar Números">
    </form>

    <h1>Resultados da Verificação de Números</h1>
    <?php
   // verifica se foi enviado
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // pega os valores
    $numeros = $_POST['numeros'];
        function verificarParidade($numero) {
            if ($numero == 0) {
                return "neutro";
            } elseif ($numero % 2 == 0) {
                return "par";
            } else {
                return "ímpar";
            }
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
    
    ?>
</body>
</html>




  