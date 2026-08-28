<?php

// 1. ARRAY DE DADOS (Simulação de banco de dados)
$estoque = [
    ["id" => 1, "nome" => "Teclado Mecânico", "quantidade" => 15, "preco" => 250.00],
    ["id" => 2, "nome" => "Mouse Gamer",     "quantidade" => 8,  "preco" => 120.00],
    ["id" => 3, "nome" => "Monitor 24'",     "quantidade" => 4,  "preco" => 850.00],
    ["id" => 4, "nome" => "Headset USB",     "quantidade" => 12, "preco" => 200.00],
    ["id" => 5, "nome" => "Webcam Full HD",   "quantidade" => 3,  "preco" => 310.00]
];

// 2. FUNÇÕES

/**
 * Exibe a lista completa de produtos e alerta sobre estoque baixo.
 * Demonstra o uso da estrutura de repetição FOREACH.
 */
function listarEstoque(array $produtos): void {
    echo "=== LISTAGEM DE PRODUTOS ===\n";
    
    // Estrutura de repetição: Foreach percorrendo cada item do array
    foreach ($produtos as $produto) {
        $alerta = ($produto['quantidade'] < 5) ? " [ALERTA: ESTOQUE BAIXO!]" : "";
        
        echo "ID: {$produto['id']} | " .
             "Produto: {$produto['nome']} | " .
             "Qtd: {$produto['quantidade']} | " .
             "Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . 
             "{$alerta}\n";
    }
    echo "\n";
}

/**
 * Calcula o valor total financeiro investido no estoque.
 * Demonstra o uso da estrutura de repetição FOR.
 */
function calcularValorTotalEstoque(array $produtos): float {
    $totalGeral = 0;
    $totalProdutos = count($produtos);

    // Estrutura de repetição: For tradicional usando contador
    for ($i = 0; $i < $totalProdutos; $i++) {
        $subtotal = $produtos[$i]['quantidade'] * $produtos[$i]['preco'];
        $totalGeral += $subtotal;
    }

    return $totalGeral;
}

/**
 * Simula a baixa de itens no estoque até atingir o limite mínimo desejado.
 * Demonstra o uso da estrutura de repetição WHILE.
 */
function simularVendasAteLimite(array &$produtos, int $idProduto, int $limiteMinimo): void {
    echo "=== SIMULAÇÃO DE VENDAS (WHILE) ===\n";
    
    // Procura o produto pelo ID
    foreach ($produtos as &$produto) {
        if ($produto['id'] === $idProduto) {
            
            // Estrutura de repetição: While executa enquanto a quantidade for maior que o limite
            while ($produto['quantidade'] > $limiteMinimo) {
                echo "Venda realizada! Produto: {$produto['nome']} | Restantes: " . ($produto['quantidade'] - 1) . "\n";
                $produto['quantidade']--; // Decremento
            }
            
            echo "Simulação encerrada para {$produto['nome']}. Estoque atingiu o limite de {$limiteMinimo} unidade(s).\n\n";
            return;
        }
    }
}

// 3. EXECUÇÃO DO PROGRAMA

// Executa a função de listagem inicial
listarEstoque($estoque);

// Executa a função de cálculo e exibe o resultado
$valorTotal = calcularValorTotalEstoque($estoque);
echo "VALOR TOTAL EM ESTOQUE: R$ " . number_format($valorTotal, 2, ',', '.') . "\n\n";

// Executa a simulação de vendas reduzindo o estoque do Monitor (ID 3) até restar 1 unidade
simularVendasAteLimite($estoque, 3, 1);

// Relatório atualizado após as vendas
listarEstoque($estoque);

?>