<template>
<div class="">
	<div class=" votinggroup">
		<div class="row d-flex justify-content-center">
			<div class="headdi-gup1" >Group {{ groupno }}</div>	
		</div>
	</div><br><br>
	<div class="votetable" >
		<div class="row">
			<div class="col-md-6" v-for="(item) in groupmember">
				<div class="row justify-content-center">
					<div style="padding-bottom: 17px;margin-left: -94px;">
						<div class="col" style="border-radius: 50%;width: 143px;height: 143px;margin-left: 6rem;overflow: hidden;z-index: -1;">
							<img :src="getimageurl(item)"  class="voteuserimg">
						</div>
						<div class="voteusertext"><span><p class="voteusername text-white">{{ item.name }}</p></span></div>
						<div class="vote_count text-white"><span>Total Votes: {{ getvotes(item) }}</span></div>
						<div v-if="!item.voted"><button type="submit" class="btn btn-warning btn-sm voteuserbutton" @click="vote(item)"><p class="votebtn">Vote now</p></button></div>
					</div>

					<!-- <img :src="imageurl(item)" class="col-md-3 memberimg" > 

					<div class="col-md-3 mt_10">{{ item.name }}</div> -->


					<!-- <div class="col-4 col-md-6" v-if="!item.voted">
						<button class="button_vote" @click="vote(item)"><span>Vote</span></button>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-6" v-for="(item) in votingmembers">
		{{item}}
	</div> -->
</div>
</template>
<script>
import { mapGetters } from 'vuex';
import Constants from '../util/Constants'

export default {
	mixins:[Constants],
	props:['groupno','users'],
	data(){
		return {
            
			votingmembers:[],
			users:[],
        }
	},
	
	mounted(){
		this.votingmember();
		
	},
	computed:{
		 groupmember(){
			 console.log("team", this.users)
		 	let teamcontestents = this.users.filter(block=>block.team_id==this.selectedteam)
		 	console.log("team", teamcontestents)
			 if(typeof teamcontestents!=='undefined')
		 		return teamcontestents.filter(block=>block.group_id==this.groupno)
			
		 	return teamcontestents;
		 },
		...mapGetters([
		      'selectedteam','votecounts'
		    ]),
	},
	methods:{
		
		// allmembers(){
		// 	let param = {group:this.groupno}
		// 	axios.post('user/list', param)
        //     .then(response=>this.processuserResponse(response.data))
        //     .catch(error=>console.log(error));
		// },
		// processuserResponse(data){
        //     this.groupmembers =data;
        // },
		getvotes(item){
			let found = this.votecounts.find(block=>block.contestentid==item.id)
			if(typeof found!=='undefined'){
				return found.total
			}
			return 0;
		},
		getimageurl(item){
			if(item != null){
				if(item.image != null){
					let image = item.image;
					let url = image.externalurl+'/'+ image.path+'/'+ image.name;
					return url;
				}
			}
		},
		vote(item){
			this.$modal.show("selecter")
			this.$store.commit('assigncontestentobject',item)
			let param = {contestentid:item.id}
			axios.post('voting/vote',param)
		},
		
	}
}
</script>