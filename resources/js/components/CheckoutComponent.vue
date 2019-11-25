<template>
	<div class="container" style="margin-top: 20px;">
		<table class="table table-bordered .table-responsive text-center">
			<tr class="active">
				<td width="11.111%">Ảnh mô tả</td>
				<td width="22.222%">Tên sản phẩm</td>
				<td width="22.222%">Số lượng</td>
				<td width="16.6665%">Đơn giá</td>
				<td width="16.6665%">Thành tiền</td>
			</tr>
			<tr v-for="cart in carts" v-bind:key="cart.id_prod">
				<td><img class="img-responsive" width="50px" height="50px" v-bind:src="'/storage/product-img/' + cart.description_image" /></td>
				<td>{{cart.name}}</td>
				<td>{{cart.quantity}}</td>
				<td>{{cart.price_order}}</td>
				<td>{{cart.money}}</td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: center; font-weight: bold; color: blue;">Tổng tiền</td>
				<td><span class="price">{{total_money}}</span></td>
			</tr>
			<tr>
				<td>Giảm giá</td>
				<td colspan="3" style="text-align: center; font-weight: bold; color: red;" ><span id="discount_conttent"></span></td>
				<td><span class="price" id="discount"> - {{discount}}</span></td>
			</tr>
			<tr>
				<td colspan="4" style="text-align: center; font-weight: bold; color: blue;">Tổng hóa đơn</td>
				<td><span class="price" id="total_order">{{getTotalMoney()}}</span></td>
			</tr>
		</table>
		<h3>Xác nhận mua hàng</h3>
		<div>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email" v-model="email_cus">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name" v-model="name_cus">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="text" class="form-control" id="phone" name="phone" v-model="phone_cus">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add" v-model="address_cus">
			</div>
			<promotion @discountWasUpdated="discountWasUpdated"></promotion>
			<div class="form-group text-right">
				<button @click="checkOut()" class="btn btn-default" style="cursor: pointer;">Thực hiện đơn hàng</button>
			</div>
		</div>
	</div>
</template>

<style>


</style>

<script>
	export default{
		data(){
			return {
				email_cus : '',
				name_cus : '',
				phone_cus : '',
				address_cus : '',
				discount : 0,
				carts: [],
				total_money: 0,
				total_order: 0,
			}
		},
		created(){
			this.viewCart();
		},
		methods: {
			viewCart(){
				axios.get('/api/get-cart-checkout').then(response => {
	            	var data = response.data;
	            	this.carts = data.product_in_cart;
	            	this.total_money = data.total_money;
	            	this.total_order = data.total_money - this.discount;
	            });
			},
			getTotalMoney(){
				return this.total_order;
			},

			checkOut(){
				axios.post('/api/post-checkout', {
	            	email_cus : this.email_cus,
	                name_cus : this.name_cus,
	                phone_cus : this.phone_cus,
	                address_cus : this.address_cus,
	                total_order : this.total_order,
	            })
	            .then(function (response) {
	            	document.getElementById('count-cart').innerHTML = '0';

	            	document.getElementById('email').value = '';
	            	document.getElementById('name').value = '';
	            	document.getElementById('phone').value = '';
	            	document.getElementById('add').value = '';
	            	document.getElementById('promotion').value = '';
	            	
	                var ok = Swal.fire(
			            response.data.message,
			            'Continute shoping',
			            'success'
		        	);

		        	if(ok)
		        		location.reload();
	            })
	            .catch(function (error) {
	                console.log(error);
	            });
			},

			discountWasUpdated: function(data){
				this.discount = data;
				this.total_order = this.total_order - data;
			}
		}
	}

</script>