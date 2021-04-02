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
 
 	if (frm.NomeEvento.value == ""){
 		alert("O campo 'Nome do evento' é obrigatório.");
 		frm.NomeEvento.focus();
 		erro=1;
 	}
	
	if (frm.LocalEvento.value == ""){
 		alert("O campo 'Local do evento' é obrigatório.");
 		frm.LocalEvento.focus();
 		erro=1;
 	}

	if (frm.DataDisparo.value > frm.DataEventoI.value || frm.DataEventoI.value > frm.DataEventoF.value || frm.DataDisparo.value < hoje){
		alert("Datas inválidas. A data do disparo do SMS deve ser maior do que o dia de hoje e menor do que a data do evento.");
		frm.DataDisparo.focus();
		erro=1;
	}

	if (frm.CodigoFilial.value == ""){
 		alert("O campo 'Código da filial' é obrigatório.");
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
		alert("O campo 'Código da filial' deve ser preenchido apenas com números e caso haja mais de uma filial, separá-las apenas com vírgula.\nEx.: 123,4321,321");
		frm.CodigoFilial.focus();
	}

 	if (frm.MesesQ.value == "" || frm.MesesQ.value > 24 || frm.MesesQ.value < 1){
 		alert("O campo 'Meses quitados' é obrigatório. Sendo o mínimo 1 e o máximo 24. ");
 		frm.MesesQ.focus();
 		erro=1;
 	}

 	if (frm.MesesAq.value == "" || frm.MesesAq.value > 24 || frm.MesesAq.value < 1){
 		alert("O campo 'Meses a quitar' é obrigatório. Sendo o mínimo 1 e o máximo 24.");
 		frm.MesesAq.focus();
 		erro=1;
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
		alert("O campo 'Celulares adicionais' deve ser preenchido com DDD e apenas com números, caso haja mais de um celular separe-os apenas com vírgula.\nEx.: 11912345678,21912345678,12912345678");
		frm.CelularesAdicionais.focus();
	}

	if (erro==0){
		frm.submit();
	}
}