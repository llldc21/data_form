// Sumindo com os botões
$(document).ready(function () {
    $('#novo').hide();
    $('#fin').hide();
});

// Usuario atualiza o formulario
var data = {};
$(document).on('click', '#criar', function () {
    //var dados = $('#meu').serialize();
    nome_form = $('#nome_form').val();
    desc_form = $('#desc_form').val();
    data_abertura = $('#data_abertura').val();
    categoria = $('#categoria').val();
    data_fechamento = $('#data_fechamento').val();
    cd_usuario = $('#cd_usuario').val();
    cd_form = $('#cd_form').val();

    console.log(data);

    $.ajax({
        type: "POST",
        url: '../back_end/ajax.php',
        data: {
            "nome_form":nome_form,
            "desc_form":desc_form,
            "data_abertura":data_abertura,
            "categoria":categoria,
            "data_fechamento":data_fechamento,
            "cd_usuario":cd_usuario,
            "cd_form":cd_form
        },
        success: function (back) {
            alert(back)
        }
    });

    $(this).hide();
    $('#novo').show();
    $('#fin').show();
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

function GravaPergunta(pergunta, id_tipo_pergunta, id_formulario) {
    $.ajax({
        type: "POST",
        url: '../back_end/ajax.php',
        data: {
            pergunta,
            id_tipo_pergunta,
            id_formulario
        },
        success: function (back) {
            set(back);
            //console.log(get());
        }
    });
}

var curta = '';
var longa = '';
var m_escolha = '';
var c_selecao = '';

$(document).on('click', '.campo', function () {
    var campo = "";
    var tipo = $(this).attr('val');

    switch (parseInt(tipo)) {
        case 1:
            curta = prompt('Qual é a pergunta?');
            if (curta.length <= 2) {
                alert(`Pergunta muito curta...`);
            } else {
                alert(`Pergunta salva!`);
                campo = '<form method="post" action="../back_end/processa.php"><h5 class="h5 text-left">' + curta + '</h5><input type="text" name="campo[]" class="form-control perguntasc" placeholder="' + curta + '" disabled><br>';
                GravaPergunta(curta, tipo, data.cd_form);
                setTimeout(function () {
                    GravaAlternativa(tipo, get());
                }, 3000);
            }
            break;
        case 2:
            longa = prompt('Qual é a pergunta?');
            if (longa.length <= 2) {
                alert(`Pergunta muito curta...`);
            } else {
                alert(`Pergunta salva!`);
                campo = '<h5 class="h5 text-left">' + longa + '</h5><textarea class="form-control perguntasl" name="campo[]" placeholder="' + longa + '" disabled></textarea><br>';
                GravaPergunta(longa, tipo, data.cd_form);
                setTimeout(function () {
                    GravaAlternativa(tipo, get());
                }, 3000);
            }
            break;
        case 3:
            m_escolha = prompt("Qual é a pergunta?");
            if (m_escolha.length <= 2) {
                alert(`Pergunta obrigatoria`);
            } else {
                alert(`Pergunta salva!`);
                campo = '<h5 class="h5 text-center">' + m_escolha + '</h5>';
                GravaPergunta(m_escolha, tipo, data.cd_form);
            }
            var qtd_me = parseInt(prompt('Quantas escolhas deseja?'));
            for (let i = 1; i <= qtd_me; i++) {
                var alternativa_me = prompt(`Digite a escolha ${i}:`);
                campo += '<input type="radio" class="text-center" name="campo[]" disabled>' + alternativa_me[i] + '<br>';
                GravaAlternativa(alternativa_me, get());
            }
            break;

        case 4:
            c_selecao = prompt("Qual é a pergunta?");
            if (c_selecao.length <= 2) {
                alert(`Pergunta obrigatoria`);
            } else {
                alert(`Pergunta salva!`);
                campo = '<h5 class="h5 text-center">' + c_selecao + '</h5>';
                GravaPergunta(c_selecao, tipo, data.cd_form);
            }
            var qtd_cx = parseInt(prompt('Quantas alternativas deseja?'));
            for (let i = 1; i <= qtd_cx; i++) {
                var alternativa_cx = prompt(`Digite a alternativa ${i}:`);
                campo += '<input type="checkbox" class="text-center" name="campo[]" disabled>' + alternativa_cx[i] + '<br>';
                GravaAlternativa(alternativa_cx, get());
            }
            break;
        default:
            break;
    };
    $('#conteudo').append(campo);
});

function GravaAlternativa(alternativa, id_pergunta) {
    $.ajax({
        type: "POST",
        url: '../back_end/ajax.php',
        data: {
            "alternativa": alternativa,
            "id_pergunta": id_pergunta
        },
        success: function (back) {
            //alert(back);
        }
    });
}