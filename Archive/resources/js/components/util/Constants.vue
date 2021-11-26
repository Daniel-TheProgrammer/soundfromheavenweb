<template>
	<button id="payunit-pay" ref="paybutton" v-if="false">Pay with payunit</button>
</template>
<script>
export default {
	data(){
		return {
			contestents:[
				{ name: "Ndoula Catherine", teamname: "teama", imagename:"noneuser.png",groupno:1,id:1,voted:false },
				{ name: "KB Wanda", teamname: "teama", imagename:"kbwanda.jpeg",groupno:1,id:2,voted:false },
				{ name: "Akey Shalom", teamname: "teama", imagename:"noneuser.png",groupno:1,id:3,voted:false },
				{ name: "Nsanchi Benji", teamname: "teama", imagename:"noneuser.png",groupno:1,id:4,voted:false },
				//{ name: "Edibe Lydia", teamname: "teama", imagename:"noneuser.png",groupno:2,id:5,voted:false },
				{ name: "Nuriel Mun", teamname: "teama", imagename:"noneuser.png",groupno:2,id:6 ,voted:false},
				{ name: "Nakonel", teamname: "teama", imagename:"nakonelelise.jpeg",groupno:2,id:7 ,voted:false},
				{ name: "Ruth Maya", teamname: "teama", imagename:"ruthmaya.jpeg",groupno:2,id:8,voted:false },
				{ name: "Zora Eda", teamname: "teama", imagename:"zoraeda.jpeg",groupno:3,id:9,voted:false },
				{ name: "Enochsings Ayuk", teamname: "teama", imagename:"noneuser.png",groupno:3,id:10,voted:false },
				{ name: "Arah Mimi", teamname: "teama", imagename:"arahmimi.jpeg",groupno:3,id:11,voted:false },
				{ name: "Ngwa Randy", teamname: "teama", imagename:"noneuser.png",groupno:3,id:12 ,voted:false},
				//{ name: "V Elizabeth", teamname: "teama", imagename:"noneuser.png",groupno:4,id:13 ,voted:false},
				//{ name: "Adeh Sera", teamname: "teama", imagename:"noneuser.png",groupno:4,id:14,voted:false },
				//{ name: "N Comfort", teamname: "teama", imagename:"noneuser.png",groupno:4,id:15,voted:false },
				{ name: "King G", teamname: "teama", imagename:"noneuser.png",groupno:4,id:16,voted:false },

				//{ name: "Mayjay", teamname: "teamb", imagename:"mayjay.jpeg",groupno:1,id:17,voted:false },
				{ name: "Kelly Ido", teamname: "teamb", imagename:"kellyido.jpeg",groupno:1,id:18,voted:false },
				//{ name: "NJ Paul", teamname: "teamb", imagename:"pic3.jpg",groupno:1,id:19,voted:false },
				//{ name: "Rolinde Voice", teamname: "teamb", imagename:"pic4.jpg",groupno:1,id:20,voted:false },
				//{ name: "Mr Phil ", teamname: "teamb", imagename:"pic5.jpg",groupno:2,id:21,voted:false },
				{ name: "A.J", teamname: "teamb", imagename:"ajalexandr.jpeg",groupno:2,id:22,voted:false },
				{ name: "Ruth Shuyeh", teamname: "teamb", imagename:"ruthshuneh.jpeg",groupno:2,id:23 ,voted:false},
				//{ name: "Joan Keys", teamname: "teamb", imagename:"pic8.jpg",groupno:2,id:24,voted:false },
				{ name: "Winny B", teamname: "teamb", imagename:"pic8.jpg",groupno:3,id:25,voted:false },
				{ name: "Salah Kimmie", teamname: "teamb", imagename:"pic8.jpg",groupno:3,id:26,voted:false },
				//{ name: "Jehovahsdaughter", teamname: "teamb", imagename:"pic8.jpg",groupno:3,id:27,voted:false },
				{ name: "Joshsings", teamname: "teamb", imagename:"Joshsings.jpeg",groupno:3,id:28,voted:false },
				{ name: "Aquila Bright", teamname: "teamb", imagename:"aquilabright.jpeg",groupno:4,id:29,voted:false },
				{ name: "M. Joseph", teamname: "teamb", imagename:"pic8.jpg",groupno:4,id:30,voted:false },
				{ name: "Efeti Betty", teamname: "teamb", imagename:"pic8.jpg",groupno:4,id:31,voted:false },
				{ name: "Ashley Mbeng", teamname: "teamb", imagename:"pic8.jpg",groupno:3,id:32,voted:false },
				{ name: "Chris Jude", teamname: "teamb", imagename:"pic8.jpg",groupno:3,id:33,voted:false },
				{ name: "Harley Ngwa", teamname: "teamb", imagename:"pic8.jpg",groupno:4,id:34,voted:false },

				{ name: "Harley Ngwa", teamname: "teamb", imagename:"pic8.jpg",groupno:5,id:35,voted:false },
				{ name: "Kelly Ido", teamname: "teamb", imagename:"kellyido.jpeg",groupno:5,id:36,voted:false },
				{ name: "Josh Sings", teamname: "teamb", imagename:"Joshsings.jpeg",groupno:5,id:37,voted:false },
				{ name: "K.B Wanda", teamname: "teamb", imagename:"kbwanda.jpeg",groupno:6,id:38,voted:false },
				{ name: "Nakonel Elise", teamname: "teama", imagename:"nakonelelise.jpeg",groupno:6,id:39,voted:false },
				{ name: "Zora Eda", teamname: "teamb", imagename:"zoraeda.jpeg",groupno:6,id:40,voted:false },
			],

		}
	},
	methods:{
		prefixinurl(url){
		    return window.axios.defaults.baseURL+"/"+url;
		},
		triggerpayment(){
			const elem = this.$refs.paybutton
            elem.click()
		},
		imageurl(item){
			return this.prefixinurl("assets/images/teamdb/"+item.imagename)
		},
	}
}
</script>