function lerEstados(){

	var itens = "";
	var url = "estados.php";

	$.ajax({
		url: url,
		cache: false,
		dataType: "json",
		beforeSend: function(){
			$("h2").html("Pesquisando dados no servidor...");
		},
		error: function(){
			$("h2").html("<span style='color:red'>Não foi possível consultar os dados no servidor!</span>");
		},
		success: function(retorno){
			if(retorno[0].erro){
				$("h2").html(retorno[0].erro);
			}else{
				for(var i=0;i<retorno.length;i++){
					itens += "<tr>";
					itens += "<td>" + retorno[i].id + "</td>";
					itens += "<td>" + retorno[i].nome + "</td>";
					itens += "<td>" + retorno[i].sigla + "</td>";
					itens += "</tr>";
				}
				$("#resposta tbody").html(itens);
				$("h2").html("<span style='color:green'>Pesquisa concluida com sucesso.</span>");
			}
		}
	});
}