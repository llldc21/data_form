// Definindo um objeto para conter os campos retirados do form.php
var data = {};

// Quando clicar chama uma função
$(document).on('click', '#criar', function(){
    // Pegando os campos preenchidos pelo usuario (esses dados são essenciais para o banco)
    data.nome = $('#nome_form').val();
    data.descricao = $('#desc_form').val();
    data.categoria = $('#categoria').val();
    data.abertura = $('#abertura').val();
    data.fechamento = $('#fechamento').val();
    // Pegando os dados do formulario e doo usuario que já existem (ou seja o usuario não digita isso, depende de cadastro no banco)
    data.id_formulario = $('#cd_form').val();
    data.id_usuario = $('#cd_usuario').val();

    //Exibindo os dados, é só ir no navegador e dar um F12, depois que clicar no botão vai aparecer os dados no console 
    console.log(data);  

    // Enviados os dados para a página ajax.php para enviar pro banco.
    $.ajax({
        type: "POST",
        url: "back_end/ajax.php",
        data: {
            "nome":data.nome,
            "descricao":data.descricao,
            "categoria":data.categoria,
            "abertura":data.abertura,
            "fechamento":data.fechamento,
            "id_usuario":data.id_usuario,
            "id_formulario":data.id_formulario
        },
        success:()=>{

        }
    });

    // Redicionando o usuario
    $(document).on('click', '#r', function(){
        window.location.href = 'perguntas.php?id='+data.id_formulario;
    });
});

// Pegando perguntas que o usuario cadastrar
var cd = 0;

// Define o codigo da pergunta
function set(id) {
    cd = id;
}

// Insere o codigo da pergunta
function get() {
    return cd;
}

// ID_FORMULARIO inserido no ajax.php
function InserePergunta(pergunta, tipo,id_form) { 
    $.ajax({
        type: "POST",
        url: "back_end/ajax.php",
        data: {
            "pergunta":pergunta,
            "tipo":tipo,
            "id_form":id_form
        },
        success:(res)=>{
            //Chamar aqui o ID_PERGUNTA
            set(res);
        }
    });
}



$(document).on('click', '.campo', function(){
    var tipo = $(this).attr('val');
    // Pegando o atributo passado pelo GET(o ID do formulario)
    var i = window.location.href;
    // Splitando apenas para pegar o ID do formulario
    var id = i.split('='); 
    // Definindo variavel que escreve no perguntas.php
    var campo = '';
    switch (parseInt(tipo)) {
        case 5:
            var curta = prompt('Digite a pergunta?');
            InserePergunta(curta, tipo,id[1]);
            // Escrevendo no banco
            campo = '<div class="row pps"><form method="post" action="../back_end/processa.php"><h5 class="h5 text-left">' + curta + '</h5><div class="row"><input type="text" name="campo[]" class="form-control perguntasc" placeholder="' + curta + '" disabled></div></div><br>';
            break;
        case 6:
            var longa = prompt('Digite a pergunta?')
            InserePergunta(longa, tipo,id[1]);
            campo = '<div class="row"><h5 class="h5 text-left">' + longa + '</h5><div class="row pps"><textarea class="form-control perguntasl" name="campo[]" placeholder="' + longa + '" disabled></textarea></div></div><br>';
            break;
        case 7:
            var alternativa = prompt('Digite a pergunta?')
            InserePergunta(alternativa, tipo,id[1]);
            campo = '<h5 class="h5 text-left">' + alternativa + '</h5>';
            var n_alternativa = prompt('Quantas alternativas deseja?')
            campo+='<div class="pps">'
            for (let i = 0; i < parseInt(n_alternativa); i++) {
                var ds_alternativa = prompt('Descreva a alternativa!')
                InsereAlternativa(ds_alternativa, get())     
                campo += '<div class="row ppz"><input type="radio" class="text-left" name="campo[]" disabled>' + ds_alternativa + '</div>';           
            }
            break;
        case 8:
            var escolha = prompt('Digite a pergunta?')
            InserePergunta(escolha, tipo,id[1]);
            campo = '<h5 class="h5 text-left">' + escolha + '</h5>';
            var n_escolha = prompt('Quantas escolhas deseja?')
            campo+='<div class="pps">'
            for (let i = 0; i < parseInt(n_escolha); i++) {
                var ds_escolha = prompt('Descreva a escolha!')
                InsereAlternativa(ds_escolha, get())
                campo += '<div class="row ppz"><input type="checkbox" class="text-center" name="campo[]" disabled>' + ds_escolha + '</div>'
            }
            break;
    }
    $('#conteudo').append(campo);

})

// Falta inserir ID_PERGUNTA
function InsereAlternativa(alternativa, id_formulario) {
    $.ajax({
        type: "POST",
        url: "back_end/ajax.php",
        data: {
            "alternativa":alternativa,
            "id_formulario":id_formulario
        },
        success:(res)=>{
            console.log(res);
        }
    });
} 