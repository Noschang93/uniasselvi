// JavaScript Document
function diario_classe_previous(minhaData, dia)
{ 
  var ds = minhaData.split("/");
  var startDate = new Date(ds[2], ds[1]-1, ds[0]);
  var daysAhead = dia;
  startDate.setTime(startDate.getTime()-(daysAhead*24*60*60*1000));
  var futureDate = startDate.getDate()+"/"+(startDate.getMonth()+1)+"/"+startDate.getFullYear();
  futureDate = futureDate.replace(/^(\d{1}\/)/,"0$1").replace(/(\d{2}\/)(\d{1}\/)/,"$10$2");

  $.ajax({
    type: "POST",
    url: "diario_classe_atualiza.php",
    data: {
      data: futureDate,
      dia: dia,
      cod_turma: $('#cod_turma').val(),
      cod_disciplina: $('#cod_disciplina').val(),
      nome_turma: $('#nome_turma').val()
    },
    success: function(data) {
      $('#div_tabela_alunos').html(data);
    }
  });
}
function diario_classe_next(minhaData, dia)
{ 
  var ds = minhaData.split("/");
  var startDate = new Date(ds[2], ds[1]-1, ds[0]);
  var daysAhead = dia;
  startDate.setTime(startDate.getTime()+(daysAhead*24*60*60*1000));
  var pastDate = startDate.getDate()+"/"+(startDate.getMonth()+1)+"/"+startDate.getFullYear();
  pastDate = pastDate.replace(/^(\d{1}\/)/,"0$1").replace(/(\d{2}\/)(\d{1}\/)/,"$10$2");

  $.ajax({
    type: "POST",
    url: "diario_classe_atualiza.php",
    data: {
      data: pastDate,
      dia: dia,
      cod_turma: $('#cod_turma').val(),
      cod_disciplina: $('#cod_disciplina').val(),
      nome_turma: $('#nome_turma').val()
    },
    success: function(data) {
      $('#div_tabela_alunos').html(data);
    }
  });
}

