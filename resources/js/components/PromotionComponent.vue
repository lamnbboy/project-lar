<template>
	<div class="input-group" style="margin-bottom: 20px;">
		<input type="text" style="width: 350px;" id="promotion" name="promotion" v-model="prom_code" placeholder="Nhập mã giảm giá">
		<span style="margin-left: 20px;">
			<button class="btn btn-primary" v-on:click="receivePromotion" id="btn-discount">Nhận giảm giá</button>
		</span>
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

            		document.getElementById("btn-discount").disabled = true;

            		this.$emit('discountWasUpdated', response.data.discount[0].cash_discount)
				}else{
					alert("Sai mã giảm giá");
					document.getElementById('discount_conttent').innerHTML = '';
				}
            });


		}
	},
}

</script>