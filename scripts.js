// Mascara diferencia cpf de cnpj
document.getElementById("useId").addEventListener("input", function (event) {
    if (event.inputType === 'deleteContentBackward') return;
    let value = this.value.replace(/\D/g, '');
    if (value.length <= 11) {
        // Aplica a máscara para CPF
        this.value = this.value.replace(/^(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1-$2').slice(0, 14);
    } else {
        // Aplica a máscara para CNPJ
        this.value = this.value.replace(/^(\d{2})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1/$2').replace(/(\d{4})(\d{2})$/, '$1-$2').slice(0, 18);
    }
});
// Máscara celular 
document.getElementById("celular").addEventListener('input', function (event) {
    if (event.inputType === 'deleteContentBackward') return;
    this.value = this.value.replace(/\D/g, '').replace(/^(\d{2})(\d)/, '($1) $2 ').replace(/(\d{4})(\d)/, '$1-$2').slice(0, 16);
});
// Máscara Data de Nascimento (dd/mm/aaaa) 
document.getElementById("datadenascimento").addEventListener("input", function (event) {
    if (event.inputType === 'deleteContentBackward') return;
    this.value = this.value.replace(/\D/g, '').replace(/^(\d{2})(\d)/, '$1/$2').replace(/(\d{2})(\d)/, '$1/$2').slice(0, 10);
});
// * identificar cep
// identificar bandeira do cartao
document.getElementById("numeroCartao").addEventListener("input", function () {
    let numeroCartao = this.value.replace(/\D/g, '');
    let bandeira = '';
    let imgbandeira = bandeira;
    if (/^4/.test(numeroCartao)) {
        bandeira = 'Visa';
    } else if (/^5[1-5]/.test(numeroCartao)) {
        bandeira = 'MasterCard';
    } else if (/^3[47]/.test(numeroCartao)) {
        bandeira = 'American Express';
    } else if (/^6(?:011|5[0-9]{2})/.test(numeroCartao)) {
        bandeira = 'Discover';
    }
    if (bandeira !== '') {
        $('.bandeira-cartao').html("<img src='https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + imgbandeira + ".png'>");
    }
});
// * 
var tgdeveloper = {
    getCardFlag: function (cardnumber) {
        // Remove caracteres não numéricos do número do cartão
        var cardnumber = cardnumber.replace(/[^0-9]+/g, '');
        // Padrões para identificar bandeiras de cartão
        var cards = {
            visa: /^4[0-9]{12}(?:[0-9]{3})/,
            mastercard: /^5[1-5][0-9]{14}/,
            diners: /^3(?:0[0-5]|[68][0-9])[0-9]{11}/,
            amex: /^3[47][0-9]{13}/,
            discover: /^6(?:011|5[0-9]{2})[0-9]{12}/,
            hipercard: /^(606282\d{10}(\d{3})?)|(3841\d{15})/,
            elo: /^((((636368)|(438935)|(504175)|(451416)|(636297))\d{0,10})|((5067)|(4576)|(4011))\d{0,12})/,
            jcb: /^(?:2131|1800|35\d{3})\d{11}/,
            aura: /^(5078\d{2})(\d{2})(\d{11})$/
        };
        // Verifica cada padrão para determinar a bandeira do cartão
        for (var flag in cards) {
            if (cards[flag].test(cardnumber)) {
                return flag;
            }
        }
        // Retorna false se não encontrar nenhuma correspondência
        return false;
    }
};

// Mascara email
function applyEmailMask(email) {
    if (/^\S+@\S+\.\S+$/.test(email)) {
        // E-mail genérico
        return email;
    } else if (/^[\w.-]+@gmail\.com$/.test(email)) {
        // Gmail
        return email.replace(/^(.+)@(.+)$/, '$1@gmail.com');
    } else if (/^[\w.-]+@outlook\.com$/.test(email)) {
        // Outlook.com
        return email.replace(/^(.+)@(.+)$/, '$1@outlook.com');
    } else if (/^[\w.-]+@yahoo\.com$/.test(email)) {
        // Yahoo Mail
        return email.replace(/^(.+)@(.+)$/, '$1@yahoo.com');
    } else if (/^[\w.-]+@hotmail\.com$/.test(email)) {
        // Hotmail.com
        return email.replace(/^(.+)@(.+)$/, '$1@hotmail.com');
    } else if (/^[\w.-]+@uol\.com\.br$/.test(email)) {
        // UOL Mail
        return email.replace(/^(.+)@(.+)$/, '$1@uol.com.br');
    } else if (/^[\w.-]+@terra\.com\.br$/.test(email)) {
        // Terra Mail
        return email.replace(/^(.+)@(.+)$/, '$1@terra.com.br');
    } else if (/^[\w.-]+@bol\.com\.br$/.test(email)) {
        // Bol Mail
        return email.replace(/^(.+)@(.+)$/, '$1@bol.com.br');
    } else if (/^[\w.-]+@ig\.com\.br$/.test(email)) {
        // IG Mail
        return email.replace(/^(.+)@(.+)$/, '$1@ig.com.br');
    } else if (/^[\w.-]+@globo\.com$/.test(email)) {
        // Globo Mail
        return email.replace(/^(.+)@(.+)$/, '$1@globo.com');
    } else if (/^[\w.-]+@r7\.com$/.test(email)) {
        // R7 Mail
        return email.replace(/^(.+)@(.+)$/, '$1@r7.com');
    } else if (/^[\w.-]+@[a-z]+\.gov\.br$/.test(email)) {
        // E-mails do Governo
        return email;
    } else if (/^[\w.-]+@[a-z]+\.[a-z]+\.br$/.test(email)) {
        // E-mails de Instituições de Ensino
        return email;
    } else if (/^[\w.-]+@[a-z]+saude\.[a-z]+\.br$/.test(email)) {
        // E-mails de Saúde
        return email;
    } else if (/^[\w.-]+@([a-z]+\.)?(banco|bancos)\.[a-z]+\.br$/.test(email)) {
        // E-mails de Banco
        return email;
    } else {
        // Tipo de e-mail não reconhecido
        return email;
    }
}

// Exemplo de uso:
var inputEmail = "exemplo@gmail.com";
var maskedEmail = applyEmailMask(inputEmail);