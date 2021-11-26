<template>
<div class="">
		<template v-if="false">
		<div class="row" v-if="viewno==1">
		<div class="col-md-5">
			<div class="grop-name-style txt-bk mor-grpnamesyl">Team Daddy Bob </div>
			<group-teams :groupno="6"></group-teams>
		</div>
		<div class="col-md-2">
			<div class="virscss">Vs</div>
		</div>
		<div class="col-md-5">
			<div class="grop-name-style txt-bk mor-grpnamesyl">Team Maureen Forbah</div>
			<div><group-teams :groupno="3"></group-teams></div>
		</div>
		</div>
	</template>
<template>
	<div class="teamcss">
		<div class="row justify-content-center" style="margin-left: 12px;">
			<div class="w-20 tx-center fl-left vot-box-master slide-in">
				<h2><div class="">Team Daddy <br/> Bob </div></h2>
				<div>
					<img class="vo-gro-img" :src="prefixinurl('images/logo.png')">
				</div>
				<!-- <div><button class="button-select" @click="selectteam('teama')"><span>Select Group</span></button></div> -->
				<div><button class="button-select" @click="selectteam('1')"><span>Select Group</span></button></div>

			</div>
			<div class="w-20 tx-center fl-left vot-box-master slide-in">
				<h2><div class="">Team Maureen <br/>Forbah</div></h2>
				<div><img  class="vo-gro-img" :src="prefixinurl('images/logo.png')"></div>
				<!-- <div><button class="button-select"  @click="selectteam('teamb')"><span>Select Group</span></button></div> -->
				<div><button class="button-select"  @click="selectteam('2')"><span>Select Group</span></button></div> 

			</div>
		</div><br>

		<!-- <div>
			<div class="col" style="border-radius: 50%;width: 143px;height: 143px;margin-left: 6rem;overflow: hidden;z-index: -1;">
				<img :src="prefixinurl('assets/images/teamdb/kbwanda1.jpeg')"  class="vootuserimg">
			</div>
			<div class="vootusertext"><span><p class="vootusername">kbwanda</p></span></div>
			<button type="submit" class="btn btn-warning btn-sm vootuserbutton"><p class="vootbtn">Voot now</p></button>
		</div> -->

		<div class="col-md-12" v-if="viewno==1">
			<div class="">
				<new-group-teams :groupno="3"></new-group-teams>
				<new-group-teams :groupno="2"></new-group-teams>
			</div>
		</div>
		<div class="col-md-12" v-if="viewno==1">
			<div class="">
				<new-group-teams :groupno="1"></new-group-teams>
				<new-group-teams :groupno="4"></new-group-teams>
			</div>
		</div>
 	</div>
 	</template>
	 <div class=" text-center" v-if="viewno==1">
	 <div class="row">
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
	<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639062065" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638875433" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638876159" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
	<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638881643" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638880459" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639056832"  frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638878907"  frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638875980"  frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639054584"  frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639047008" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638876097" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638882497" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/638878605" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639929737" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>	
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639356026" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>	
	</div>
	<div class="col-md-6 col-sm-3 embed-responsive embed-responsive-16by9 personvideo">
		<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/639602771" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>	
	</div>
	</div>	
	</div>
	
	<button id="payunit-pay" style="display:none">Pay with payunit</button>
	<StripeVueCard v-if="viewno==2"></StripeVueCard>
	<payment-selecter></payment-selecter>
</div>
</template>
<script>
import PaymentSelecter from '../payment/PaymentSelecter'
import Constants from '../util/Constants'
import NewGroupTeams from './NewGroupTeams'
import { mapGetters } from 'vuex';
import { PayUnit } from "payunitjs";
import StripeVueCard from '../payment/StripeVueCard'
export default {
	mixins:[Constants],
	components:{NewGroupTeams,StripeVueCard,PaymentSelecter},
	data(){
		return{
			selectgroupflag:0
		}
	},
	mounted(){
			PayUnit(
				{
					apiUsername: "payunit_fJZ37WTd8",
					apiPassword: "312f93cb-f7c4-4c2f-aea1-2864eed6b75a",
					x_api_key: "6febfc023cafd57bbb6fb0551539bb7231a6f0cb",
					mode: "live",
				},
				{
					return_url: this.prefixinurl("voting/payment/confirm"),
					notify_url: this.prefixinurl("voting/payment/confirm"),
					description: "Payment for Vote",
					purchaseRef: "1",
					total_amount: "150",
					name: "Sound From Heaven",
					currency: "XAF",
				}
			);	
			console.log("Stage1")
			axios.get('voting/count')
            .then(response =>this.processCount(response.data))

	},
	computed:{
		...mapGetters([
		      'flag','viewno'
		    ]),
	},
	methods:{
		processCount(data){
			this.$store.commit('assignvotecounts',data)
		},
		selectgroup(){
			this.selectgroupflag = 1;
			console.log(this.selectgroupflag)
		},
		selectgroup2(){
			this.selectgroupflag = 2;
			console.log(this.selectgroupflag)
		},
		selectteam(team){
			console.log("Hello", team)
			this.$store.commit('assignteam',team)
		},
		
	},
}
</script>