import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export const store = new Vuex.Store({
	  state: {
		  selectedteam:'1',
		  flag:false,
		  viewno:1,
		  intent:null,
		  contestentobject:0,
		  votecounts:[]
	  },
	  mutations: {
	  	assignteam(state, u){
			state.selectedteam = u;
		},
		assignflag(state, u){
			state.flag = u;
		},
		assignviewno(state,u){
			state.viewno=u;
		},
		assignintent(state,u){
			state.intent=u;
		},
		assigncontestentobject(state,u){
			state.contestentobject=u;
		},
		assignvotecounts(state,u){
			state.votecounts=u;
		},
		
	  },
	  actions:{
	  	
		
	  },
	  getters: {
	  		selectedteam:state=>{
				return state.selectedteam;
			},
			flag:state=>{
				return state.flag;
			},
			viewno:state=>{
				return state.viewno
			},
			intent:state=>{
				return state.intent
			},
			contestentobject:state=>{
				return state.contestentobject
			},
			votecounts:state=>{
				return state.votecounts
			},
  	   }
});


