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
	var hoje = ano + '-' + mes + '-' + dia;
 
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
 		alert("O campo 'Código da filial' é obrigatório e deve ser preenchido apenas com números. Caso haja mais de uma filial, separe-as com vírgulas.");
 		frm.CodigoFilial.focus();
 		erro=1;
 	}

 	if (frm.MesesQ.value == ""){
 		alert("Escolha uma das opções no campo 'Meses quitados'.");
 		erro=1;
 	}

 	if (frm.MesesAq.value == ""){
 		alert("Escolha uma das opções no campo 'Meses a quitar'.");
 		erro=1;
 	}

	if (erro==0){
		frm.submit();
	}
}