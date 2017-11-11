(function($){
  $(function(){

    $('.button-collapse').sideNav();
 

	  $('.dropdown-button').dropdown({

	      hover: true, // Activate on hover
	      gutter: 0, // Spacing from edge
	      belowOrigin: true, // Displays dropdown below the button
	      alignment: 'right' // Displays dropdown with edge aligned to the left of button
	    }
	  );

	  $('.download-button').dropdown({

	      hover: true, // Activate on hover
	      gutter: 0, // Spacing from edge
	      belowOrigin: true, // Displays dropdown below the button
	      alignment: 'right' // Displays dropdown with edge aligned to the left of button
	    }
	  );

	  $('.modal-trigger').leanModal();

	  $('select').material_select();

	  $('.tooltipped').tooltip({delay: 10});
	  

	$('.deleteitem').click(function(){
		if(confirm("Are you sure you want to delete this item?")){
			var row = $('#dataTable').DataTable().row( $(this).parents('tr') );
    		row.remove().draw();


			$.ajax({
				url: 'inc/App.php?actions=delete',
				type: 'POST',
				dataType: 'html',
				data: {table: $(this).data('table'),id: $(this).data('id')},
			})
			.done(function() {
		 		Materialize.toast('The item has been deleted', 4000) // 4000 is the duration of the toast
				//firework.launch('The item has been deleted', 'success');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

		}
		
	});


   $(window).on('beforeunload', function(){
	         $("#preloader").show();
     });
	$( window ).unload(function() {
	         $("#preloader").show();
	});






  }); // end of document ready
})(jQuery); // end of jQuery name space