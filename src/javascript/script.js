$(document).ready(function () {
    $('.botao-editar').on('click', function () {
        var tarefa = $(this).closest('.tarefa');
        tarefa.find('.progresso').addClass('oculto');
        tarefa.find('.descricao-tarefa').addClass('oculto');
        tarefa.find('.acoes-tarefa').addClass('oculto');
        tarefa.find('.editar-tarefa').removeClass('oculto');
    });

    $('.progresso').on('click', function () {
        if ($(this).is(':checked')) {
            $(this).addClass('concluida');
        } else {
            $(this).removeClass('concluida');
        }
    });

    $('.progresso').on('change', function () {
        const id = $(this).data('tarefa-id');
        const concluido = $(this).is(':checked') ? 'true' : 'false';

        $.ajax({
            url: 'acoes/atualizar-progresso.php',
            method: 'POST',
            data: { id: id, completed: concluido },
            dataType: 'json',
            success: function (response) {
                if (!response.success) {
                    alert('Erro ao atualizar tarefa.');
                }
            },
            error: function () {
                alert('Erro na requisição.');
            }
        });
    });
});
