/**
 * efeito alert
 */
$(function () {
    // pegar elemente com corpo da mensagem
    var corpo_alert = $("#alert-message");
 
    // verificar se o elemente esta presente na pagina
    if (corpo_alert.length)
        // gerar efeito para o elemento encontrado na pagina
        corpo_alert.fadeOut().fadeIn().fadeOut().fadeIn();
});


/**
 * plugin mascara
 */
$(function (){
    // mascara para telefone: (xx)xxxx-xxxxx
    $("input#telefonecelular, input#telefonefixo").mask("(99) 9999-9999?9");
    
    // mascara para CPF: 000.000.000-00
    $("input#cpf").mask("999.999.999-99");
    
    // mascara para Titulo 000000000000
    $("input#idTituloEleitor").mask("999999999999");
    
    // mascara para CNH 00000000000
    $("input#idCNH").mask("99999999999");
    
    // mascara para Categoria CNH aa
    $("input#idCNHCategoria").mask("aa");
    
    // mascara para Titulo 000000000000
    $("input#idTituloZona, input#idTituloSecao").mask("999");
    
    // mascara para Titulo 000.000.000
    $("input#idRG").mask("?9.?9?99.999");
    
    // mascara para CEP 00.000-000
    $("input#enderecocep").mask("99.999-999");
    
    // mascara para captcha com 12 caracteres apenas alfabéticos: xxxxxxxxxxxx
    $("input#inputCaptcha").mask("aaaaa");
});