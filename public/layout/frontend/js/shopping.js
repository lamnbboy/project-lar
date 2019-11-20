$(document).ready(function(){
	$(".btn_buy_prod").click(function(){
		var id_prod = $(this).parents('.product_buttons').find('.id_product').val();
		var url_add_cart = $(this).parents('.product_buttons').find('.url_add_cart').val();
		// alert(url_add_cart);

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.post( url_add_cart, { quantity: 1, id: id_prod, })
			.done(function( data ) {
			    Swal.fire(
	            'Add to cart',
	            'Continute shoping',
	            'success'
	        	);
		});

		var count = $('#count-cart').html();
        $('#count-cart').html( parseInt(count) + 1 );
	});
});