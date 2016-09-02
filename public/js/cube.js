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
				$( "#result-panel" ).html(res.data.res1);
				HoldOn.close();
			},
			dataType: 'json'
		});
		event.preventDefault();
	});
});