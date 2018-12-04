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
});

// Redicionando o usuario
$(document).on('click', '#r', function(){
    window.location.href = 'perguntas.php';
});

$(document).on('click', '.campo', function(){
    var tipo = $(this).attr('val');
    console.log(tipo)
    switch (parseInt(tipo)) {
        case 1:
            var curta = prompt('Digite a pergunta?');
            InserePergunta(curta, data.id_formulario);
            break;
        case 2:
            var longa = prompt('Digite a pergunta?')
            InserePergunta(longa, data.id_formulario);
            break;
        case 3:
            var alternativa = prompt('Digite a pergunta?')
            InserePergunta(alternativa, data.id_formulario);
            var n_alternativa = prompt('Quantas alternativas deseja?')
            for (let i = 0; i < parseInt(n_alternativa); i++) {
                var ds_alternativa = prompt('Descreva a alternativa!')
                InsereAlternativa(ds_alternativa)                
            }
            break;
        case 4:
            var escolha = prompt('Digite a pergunta?')
            InserePergunta(escolha, data.id_formulario);
            var n_escolha = prompt('Quantas escolhas deseja?')
            for (let i = 0; i < parseInt(n_escolha); i++) {
                var ds_escolha = prompt('Descreva a escolha!')
                InsereAlternativa(ds_escolha)                
            }
            break;
    }
})

// FALTA INSERIR ID_FORMULARIO
function InserePergunta(pergunta, id_formulario) {
    console.log(pergunta, id_formulario)
    // $.ajax({
        // type: "POST",
        // url: "back_end/ajax.php",
        // data: {
            // "pergunta":pergunta,
            // "id_formulario":id_formulario
        // },
        // success:(res)=>{
            // Chamar aqui o ID_PERGUNTA
            // console.log(res);
        // }
    // });
}

// Falta inserir ID_PERGUNTA
function InsereAlternativa(alternativa) {
    // console.log('entrei na função')
    $.ajax({
        type: "POST",
        url: "back_end/ajax.php",
        data: {
            "alternativa":alternativa
        },
        success:(res)=>{
            console.log(res);
        }
    });
}


// Falta inserir as perguntas no na tela para o usuario
// Falta retornar o CD_PERGUNTA para inserir na alternativa
//  