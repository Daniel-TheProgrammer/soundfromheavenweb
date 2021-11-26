<template>
<modal name="selecter">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6 payment-container" style="background:yellow;color:black">
				<div class="w-100"><h5 class="gup_name_pop">{{ getteamname }}</h5></div>
				<div class="w-100"><img  class="vo-gro-img" :src="imageurl(contestentobject)" width="200" height="200"></div>
				<div class="w-100"><h5 class="group_text">Contestant: {{ contestentobject.name }}</h5></div>
			</div>
			
			<div class="col-md-6 payment-container" style="background:green">
				<h2>Payunit</h2>
				<button class="button-select" @click="payunit()"><span>Pay</span></button>
				<h2>Stripe</h2>
				<button class="button-select" @click="stripe()"><span>Pay</span></button>
			</div>
		</div>
	</div>



</modal>
</template>
<script>


import { mapGetters } from 'vuex';
import Constants from '../util/Constants'
export default {
	mixins:[Constants],
	computed:{
		...mapGetters([
		      'contestentobject',
		    ]),
		getteamname(){
			if(this.contestentobject!=null){
				if(this.contestentobject.teamname=='teama'){
					return "Team Daddy Bob"
				}
				return "Team Maureen Forbah"
			}
			return '';
		}
	},
	methods:{
		payunit(){
			this.$modal.hide("selecter")
			let param = {contestentid:this.contestentobject}
			window.location.href=this.prefixinurl('payment/payunit/payforvote?contestentid='+this.contestentobject.id)
			//document.getElementById('payunit-pay').click()
		},
		stripe(){
			axios.post('payment/stripe/createintent')
			.then(response=>this.processResponse(response.data))
			.catch(error=>console.log(error));
		},
		processResponse(data){
			this.$store.commit('assignintent',data)
			console.log(data)
			this.$modal.hide("selecter")
			this.$store.commit("assignviewno",2)
		},
	}
}
</script>