<?php

include 'Item.php';
include 'Inventario.php';
include 'Player.php';

function exibirStatus($player) {
    echo "<br> Status do " , $player->getNome() ,"<br>";
    echo "Nível: " , $player->getNivel() , "<br>";
    echo "Capacidade do inventário: " , $player->mostrarInventario() , "<br>";

    echo "Itens no inventário: <br>";
    foreach ($player->mostrarInventario() as $item) {
        echo "- " , $item , "<br>";
    }
}


// Criando jogadores
$player1 = new Player('Jogador 1');
$player2 = new Player('Jogador 2');

// Criando itens
$itemAtaque1 = new Ataque('Espada Longa');
$itemAtaque2 = new Ataque('Martelo');
$itemAtaque3 = new Ataque('Espada de Fogo');
$itemAtaque4 = new Ataque('Adaga');
$itemAtaque5 = new Ataque('Machado');
$itemDefesa1 = new Defesa('Escudo');
$itemDefesa2 = new Defesa('Armadura');
$itemDefesa3 = new Defesa('Capa Mágica');
$itemMagia1 = new Magia('Pocao de Vida');
$itemMagia2 = new Magia('Elixir Mágico');
$itemMagia3 = new Magia('Cristal de Magia');

// Exibindo o status inicial dos jogadores
exibirStatus($player1);
exibirStatus($player2);

// Jogador 1 coleta itens
echo "<br>Jogador 1 coleta os itens:<br>";
$player1->coletarItem($itemAtaque1);
$player1->coletarItem($itemDefesa1);
$player1->coletarItem($itemMagia1);
$player1->coletarItem($itemAtaque2);

// Exibindo status após coleta de itens
exibirStatus($player1);

// Jogador 2 coleta itens
echo "<br>Jogador 2 coleta os itens:<br>";
$player2->coletarItem($itemAtaque3);
$player2->coletarItem($itemDefesa2);
$player2->coletarItem($itemMagia2);

// Exibindo status do jogador 2 após coleta
exibirStatus($player2);

// Jogador 1 sobe de nível
echo "<br>Jogador 1 sobe para o nível " , ($player1->getNivel() + 1) , "<br>";
$player1->subirNivel();

// Exibindo status após subida de nível
exibirStatus($player1);

// Jogador 1 tenta coletar mais itens até a capacidade máxima
echo "<br>Jogador 1 tenta coletar mais itens até a capacidade máxima:<br>";
$player1->coletarItem($itemAtaque3);
$player1->coletarItem($itemDefesa3);
$player1->coletarItem($itemMagia3);

// Exibindo status após tentativa de coleta adicional
exibirStatus($player1);

// Troca de itens entre Jogador 1 e Jogador 2
echo "<br>Troca de itens entre Jogador 1 e Jogador 2:<br>";
$player1->soltarItem($itemDefesa1->getNome());
$player2->coletarItem($itemDefesa1);

$player2->soltarItem($itemMagia2->getNome());
$player1->coletarItem($itemMagia2);

// Exibindo status após troca de itens
echo "<br>Status após troca de itens:<br>";
exibirStatus($player1);
exibirStatus($player2);

// Jogador 1 tenta coletar um item com nome já existente
echo "<br>Jogador 1 tenta coletar um item já existente:<br>";
$player1->coletarItem($itemMagia1);

// Verificando se o item foi adicionado com sucesso
exibirStatus($player1);
?>
