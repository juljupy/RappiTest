$(document).ready(function(){
	$( "#cube-form" ).submit(function( event ) {
		HoldOn.open({
            message:'Evaluando...'
        });
		$.ajax({
			type: "POST",
			url: '/evaluatematrix',
			data: $( "#cube-form" ).serialize(),
			success: function(res){
				var resp = res.data.results.join('<br>');
				$( "#result-panel" ).html(resp);
				HoldOn.close();
			},
			dataType: 'json'
		});
		event.preventDefault();
	});
});