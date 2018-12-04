// Quando clicar chama uma função
$(document).on('click', '#criar', function(){
    // Definindo um objeto para conter os campos retirados do form.php
    var data = {};
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
})