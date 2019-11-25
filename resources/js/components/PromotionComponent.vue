<template>
	<div class="form-group">
		<label for="promotion">Mã giảm giá</label>
		<input required type="text" class="form-control col-sm-8" id="promotion" name="promotion" v-model="prom_code">
		<button class="form-coltrol" v-on:click="receivePromotion">Nhận giảm giá</button>
	</div>
</template>

<script>
export default{
	data(){
		return {
			prom_code : '',
			discount_content : '',
		}
	},
	created(){

	},
	methods: {
		receivePromotion(){

			axios.get('/api/get-promotion' + '/' + this.prom_code).then(response => {
				if(response.data.discount.length != 0){
					// console.log(response.data.discount);
            		this.discount_content = response.data.discount[0].content;

            		alert("Bạn sẽ được áp dụng mã giảm giá này");
            		document.getElementById('discount_conttent').innerHTML = this.discount_content;

            		this.$emit('discountWasUpdated', response.data.discount[0].cash_discount)
				}else{
					alert("Sai mã giảm giá");
					document.getElementById('discount_conttent').innerHTML = '';
				}
            });
		}
	}
}

</script>