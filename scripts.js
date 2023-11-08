// diferenciar cpf de cnpj
// Mascara CPF
document.getElementById("useId").addEventListener("input", function (event) {
    if (event.inputType === 'deleteContentBackward') return;
    this.value = this.value.replace(/\D/g, '').replace(/^(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1-$2').slice(0, 14);
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
// identificar cep
// identificar bandeira do cartao
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