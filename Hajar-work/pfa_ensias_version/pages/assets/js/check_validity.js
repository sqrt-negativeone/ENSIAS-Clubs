
$(document).ready(function(){      
	$('#id_selectMember').on('click',function () {

		var titre = $('#titre').val();
        var date = $('#date').val();
        var desc = $('#desc').val();

            if (titre != '' && date != '' && desc != '') {

            	//SET SELECTED FORM INPUT
            	$('#t_set').val(titre);
            	$('#d_set').val(date);
            	$('#de_set').val(desc);

            	var test = $('#t_set').val();

            	$('#selectMember').modal('show');
  
            }else if(titre == ''){
            	$('#titre').setCustomValidity('Veuillez renseigner ce champ.');
            }else if(date == ''){
            	$('#date').tooltip("show");
            }else if(desc == ''){
            	$('#desc').tooltip("show");
            }
		
	});  
            
});
// data-toggle="modal" data-target="#selectMember"