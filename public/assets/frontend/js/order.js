// jQuery.noConflict();
(function($) { 

	/*=========================================
	=            Order calculation            =
	=========================================*/
	
	var grand_total = $('#grand_total'); 
	var all_totals = $('.total');

	// Loop through product rows
	$('#products_container').find('.row').each(function(index, el) {
		
		var row = $(this);
		var total = row.find('.total');
		var	qty = row.find('input');
		var price = parseInt(row.find('.price').data('price'));

		// on change quantity input
		qty.on('change', function(e) {

			total.text(qty.val() * price);

			// To handle grand total
			var total_amount = 0;

			all_totals.each(function(index, el) {
				total_amount += parseInt($(this).text());
			});

			grand_total.text(total_amount);
		});

	}); // end row each

	/*=====  End of Order calculation  ======*/

	/*============================================================
	=            Ajax for get cutomer detail by phone            =
	============================================================*/

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	var phone = $('#phone');
	var is_fired = false;
	var is_filled = false;

	phone.on('keyup', function(e) {

		if (phone.val().length >= 8 && is_fired == false && is_filled == false) {

			is_fired = true;
			
			$.ajax({
				url: 'customer/get',
				type: 'POST',
				dataType: 'json',
				data: {phone: phone.val()},
			})
			.done(function(response) {

				if (response.status) {

					console.log("Customer found");

					$.each(response.customer, function(key, value) {
						$('#'+key).val(value);
					});

					// Prevent from filling form again
					is_filled = true;

					console.log("Customer form filled with data");

				}else{
					console.log('Customer not found');
				}

				// Get ready to fire again
				is_fired = true;

			});

		};

	}); // end phone keyup event
	
	/*=====  End of Ajax for get cutomer detail by phone  ======*/
	

})(jQuery);