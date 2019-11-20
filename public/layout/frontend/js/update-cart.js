$(document).ready(function(){
	$("#update-cart").click(function(){
		// var id_prod = $(this).parents('.product_buttons').find('.id_product').val();
		var url_update_cart = $(this).parents('#cart-function').find('.url_update_cart').val();
		// alert(url_add_cart);
		var id_prod_list = new Array();
		$("input[class='id-prod']").each(function() {
			var id = $(this).val();
		    id_prod_list.push(id);
		});

		// console.log(id_prod_list);

		var quantity_list = new Array();
		$("input[class*='quantity']").each(function() {
			var quantity = $(this).val();
		    quantity_list.push(quantity);
		});

		// console.log(quantity_list);

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		// console.log(url_update_cart);

		$.post( url_update_cart, { id_prod: id_prod_list, quantity: quantity_list, })
			.done(function( data ) {
			    location.reload();
			    // alert(data);
		});
	});
});