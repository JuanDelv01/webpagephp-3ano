<?php
require_once('database/conn.php');

$lista_tarefas = [];

$sql = $pdo->query("SELECT * FROM task ORDER BY id ASC");

if ($sql->rowCount() > 0) {
    $lista_tarefas = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Lista de Tarefas</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<link rel="stylesheet" href="src/css/style.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<div id="lista_tarefas">
    <h1>Minhas Tarefas</h1>

    <form action="acoes/criar.php" method="POST" class="formulario-tarefas">
        <input type="text" name="descricao" placeholder="Escreva sua tarefa aqui" required />
        <button type="submit" class="botao-formulario">
            <i class="fa-solid fa-plus"></i>
        </button>
    </form>

    <div id="tarefas">
        <?php foreach($lista_tarefas as $tarefa): ?>
            <div class="tarefa">
                <input
                    type="checkbox"
                    name="progresso"
                    class="progresso <?= $tarefa['completed'] ? 'concluida' : '' ?>"
                    data-tarefa-id="<?= $tarefa['id']?>"
                    <?= $tarefa['completed'] ? 'checked' : '' ?>
                />
                <p class="descricao-tarefa"><?= htmlspecialchars($tarefa['description']) ?></p>

                <div class="acoes-tarefa">
                    <a class="botao-acao botao-editar">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                    <a href="acoes/excluir.php?id=<?= $tarefa['id'] ?>" class="botao-acao botao-excluir">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>

                <form action="acoes/atualizar.php" method="POST" class="formulario-tarefas editar-tarefa oculto">
                    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>" />
                    <input
                        type="text"
                        name="descricao"
                        value="<?= htmlspecialchars($tarefa['description']) ?>"
                        placeholder="Edite sua tarefa aqui"
                    />
                    <button type="submit" class="botao-formulario confirmar-edicao">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script src="src/javascript/script.js"></script>
</body>
</html>
