function validarCampos(){
	var erro = 0;
	var data = new Date();
	var mes = data.getMonth();
	mes+=1;
	var dia = data.getDate();
	var ano = data.getFullYear();
    if (mes<10){
		mes = '0'+ mes;
	}
	if (dia<10){
		var hoje = ano + '-' + mes + '-0' + dia;
	}else {var hoje = ano + '-' + mes + '-' + dia;}
 
 	$('#erro1').remove();
 	$('#erro2').remove();
	$('#erro3').remove();
	$('#erro4').remove();
	$('#erro5').remove();
	$('#erro6').remove();
	$('#erro7').remove();
	$('#erro8').remove();
	$('#erro9').remove();
	$('#NomeEvento').removeClass('is-invalid');
	$('#LocalEvento').removeClass('is-invalid');
	$('#DataDisparo').removeClass('is-invalid');
	$('#DataEventoI').removeClass('is-invalid');
	$('#DataEventoF').removeClass('is-invalid');
	$('#CodigoFilial').removeClass('is-invalid');
	$('#MesesQ').removeClass('is-invalid');
	$('#MesesAq').removeClass('is-invalid');
	$('#CelularesAdicionais').removeClass('is-invalid');


 	if (frm.NomeEvento.value.trim() == ""){
 		$('#erro1').remove();
 		$('#NomeEvento').after('<div id="erro1" class="invalid-feedback">Campo obrigatório.</div>');
 		$('#NomeEvento').addClass('is-invalid');
 		frm.NomeEvento.focus();
 		erro=1;
 	}
	
	if (frm.LocalEvento.value.trim() == ""){
 		$('#erro2').remove();
 		$('#LocalEvento').after('<div id="erro2" class="invalid-feedback">Campo obrigatório.</div>');
 		$('#LocalEvento').addClass('is-invalid');
 		frm.LocalEvento.focus();
 		erro=1;
 	}

	if (frm.DataDisparo.value == "" || frm.DataDisparo.value > frm.DataEventoI.value || frm.DataDisparo.value < hoje){
		$('#erro3').remove();
		$('#DataDisparo').after('<div id="erro3" class="invalid-feedback">Campo obrigatório. Deve ser maior que o dia de hoje e menor que a data do evento.</div>');
		$('#DataDisparo').addClass('is-invalid');
		frm.DataDisparo.focus();
		erro=1;
	}

	if (frm.DataEventoI.value == ""){
		$('#erro4').remove();
		$('#DataEventoI').after('<div id="erro4" class="invalid-feedback">Campo obrigatório. Deve ser maior que a data de disparo e menor que a data final do evento.</div>');
		$('#DataEventoI').addClass('is-invalid');
		frm.DataEventoI.focus();
		erro=1;

	}

	if (frm.DataEventoI.value == "" || frm.DataEventoI.value > frm.DataEventoF.value ){
		$('#erro5').remove();
		$('#DataEventoF').after('<div id="erro5" class="invalid-feedback">Campo obrigatório. Deve ser maior que a data inicial do evento.</div>');
		$('#DataEventoF').addClass('is-invalid');
		frm.DataEventoF.focus();
		erro=1;
	}

	if (frm.CodigoFilial.value.trim() == ""){
		$('#erro6').remove();
 		$('#CodigoFilial').after('<div id="erro6" class="invalid-feedback">Campo obrigatório.</div>');
 		$('#CodigoFilial').addClass('is-invalid');
 		frm.CodigoFilial.focus();
 		erro=1;
 	}

 	if (frm.CodigoFilial.value != ""){
 		var codigo = frm.CodigoFilial.value;
		for(i = 0; i < codigo.length; i++){
			if (codigo[i]>=0 && codigo[i]<=9 || codigo[i]==","){
			}else {
				erro=2;
			 }
		}
	}

	if (erro==2){
		$('#erro6').remove();
 		$('#CodigoFilial').after('<div id="erro6" class="invalid-feedback">Deve ser preenchido apenas com números. Caso haja mais de uma filial, separe-as apenas com vírgula</div>');
 		$('#CodigoFilial').addClass('is-invalid');
		frm.CodigoFilial.focus();
	}

 	if (frm.MesesQ.value == "" || frm.MesesQ.value > 24 || frm.MesesQ.value < 1 ){
 		$('#erro7').remove();
 		$('#MesesQ').after('<div id="erro7" class="invalid-feedback">Campos obrigatórios. Máximo 24 meses.</div>');
 		$('#MesesQ').addClass('is-invalid');
 		frm.MesesQ.focus();
 	}

 	if (frm.MesesAq.value == "" || frm.MesesAq.value > 24 || frm.MesesAq.value < 1){
 		$('#erro8').remove();
 		$('#MesesAq').after('<div id="erro8" class="invalid-feedback">Campos obrigatórios. Máximo 24 meses.</div>');
 		$('#MesesAq').addClass('is-invalid');
 		frm.MesesAq.focus();
 	}

 	if (frm.CelularesAdicionais.value != ""){
 		var celulares = frm.CelularesAdicionais.value;
		for(i = 0; i < celulares.length; i++){
			if (celulares[i]>=0 && celulares[i]<=9 || celulares[i]==","){
			}else {
				erro=3;
			 }
		}
	}

	if (erro==3){
		$('#erro9').remove();
 		$('#CelularesAdicionais').after('<div id="erro9" class="invalid-feedback">Deve ser preenchido apenas com numeros, incluindo o DDD. Caso haja mais de um celular, separe-os apenas com vírgula.</div>');
		$('#CelularesAdicionais').addClass('is-invalid');
		frm.CelularesAdicionais.focus();
	}

	frm.CelularesAdicionais.value = frm.CelularesAdicionais.value.trim();

	if (erro==0){
		frm.submit();
	}
}