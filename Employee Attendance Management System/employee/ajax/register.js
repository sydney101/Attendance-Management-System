
	$("#register").submit(function(e){
		e.preventDefault();
		$.post(document.location.url, $(this).serialize, function(data){			
			$("#infor").html(data);
		});
	});
