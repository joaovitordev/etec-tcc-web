function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('cidade').value=("");
    document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('rua').value=(conteudo.logradouro);
    document.getElementById('bairro').value=(conteudo.bairro);
    document.getElementById('cidade').value=(conteudo.localidade);
    document.getElementById('uf').value=(conteudo.uf);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('rua').value="...";
        document.getElementById('bairro').value="...";
        document.getElementById('cidade').value="...";
        document.getElementById('uf').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
}
};

// Exemplo de JavaScript inicial para desativar envios de formulário, se houver campos inválidos.
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Pega todos os formulários que nós queremos aplicar estilos de validação Bootstrap personalizados.
      var forms = document.getElementsByClassName('needs-validation');
      // Faz um loop neles e evita o envio
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

// Método validador de CPF
function validaCPF(CPF){
  // Iniciando as variáveis  
  var soma = 0;
  var sobra = 0;
  
  // validação para caso o CPF seja preenchido com 11 zeros. 
  if (CPF == "00000000000"){
    return false;
  }

  // Validação do 10° digito do CPF.
  /* 
    Caso a sobra da soma dos 9 primeiros digitos de um CPF for igual a 10 ou a 11 a sobra receberá 0 e o CPF informado será invalidado.
  */
  for (i = 0; 1 <= 9; i++){
    
    soma = soma + parseInt(CPF.substring(i - 1, i)) * (11 - i);
  }
  sobra = (soma * 10) % 11;

  if ((sobra == 10) || (sobra == 11)){
    sobra = 0;
  }
  if (sobra != parseInt(CPF.substring(10, 11))){
    return false;
  }
  // Zerando a variável 'soma' para realizar o calculo do 11° digito do CPF.
  soma = 0;

  // Validação do 11° digito do CPF.
  /* 
    Caso a sobra da soma dos 10 digitos de um CPF for igual a 10 ou a 11 a sobra receberá 0 e o CPF informado será invalidado.
  */
  for (i = 1; i <= 10; i++){
    soma = soma + parseInt(CPF.substring(i - 1, i)) * (12 - i);
  }
  sobra = (soma * 10) % 11;

  if ((sobra == 10) || (sobra == 11)){
    sobra = 0;
  }
  if (sobra != parseInt(CPF.substring(10, 11))){
    return false;
  }

  // Caso o CPF seja válido a função irá retornar true, assim, validando o documento. 
  return true;
}

function telefone_validation(telefone){
	// CÓDIGO RETIRADO DO SITE: https://jsfiddle.net/83zopn51/1/
    //retira todos os caracteres menos os numeros
    telefone = telefone.replace(/\D/g,''); 			//Remove tudo o que não é dígito
    telefone = telefone.replace(/^(d{2})(d)/g,"($1) $2"); 	//Coloca parênteses em volta dos dois primeiros dígitos
    telefone = telefone.replace(/(d)(d{4})$/,"$1-$2");    	//Coloca hífen entre o quarto e o quinto dígitos
    
    //verifica se tem a qtde de numero correto
    if(!(telefone.length >= 10 && telefone.length <= 11)) return false;
    
    //Se tiver 11 caracteres, verificar se começa com 9 o celular
    if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;
      
    //verifica se não é nenhum numero digitado errado (propositalmente)
    for(var n = 0; n < 10; n++){
    	//um for de 0 a 9.
		//estou utilizando o metodo Array(q+1).join(n) onde "q" é a quantidade e n é o 	  
		//caractere a ser repetido
    	if(telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
    }  
	
	//DDDs validos
    var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
	21, 22, 24, 27, 28, 31, 32, 33, 34,
	35, 37, 38, 41, 42, 43, 44, 45, 46,
	47, 48, 49, 51, 53, 54, 55, 61, 62,
	64, 63, 65, 66, 67, 68, 69, 71, 73,
	74, 75, 77, 79, 81, 82, 83, 84, 85,
	86, 87, 88, 89, 91, 92, 93, 94, 95,
	96, 97, 98, 99];
    
	//verifica se o DDD é valido 
    if(codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
    
	// E por ultimo verificar se o numero é realmente válido. Até 2016 um celular pode 
	// ter 8 caracteres, após isso somente numeros de telefone e radios (ex. Nextel)
	// vão poder ter numeros de 8 digitos (fora o DDD), então esta função ficará inativa
	// até o fim de 2016, e se a ANATEL realmente cumprir o combinado, os numeros serão
	// validados corretamente após esse período.
	// NÃO ADICIONEI A VALIDAÇÂO DE QUAIS ESTADOS TEM NONO DIGITO, PQ DEPOIS DE 2016 ISSO NÃO FARÁ DIFERENÇA
	// Não se preocupe, o código irá ativar e desativar esta opção automaticamente.
	// Caso queira, em 2017, é só tirar o if.
	// if(new Date().getFullYear() < 2017) return true;
	// if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return false;

	//se passar por todas as validações acima, então está tudo certo
	return true; 
}
  
