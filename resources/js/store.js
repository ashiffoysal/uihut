import axios from 'axios';
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

const store = new Vuex.Store({

	state: {
		token: localStorage.getItem('access_token') || null,
		homebanner:{},
		categores:{},
		explores:{},
		clientsays:{},
		price:{},
	},

	// getter area start

	getters: {
		logedIn: (state) => {
			return state.token != null;
		},
		getBanner:(state) =>{
			return state.homebanner;
		},
		getCategores:(state) =>{
			return state.categores;
		},
		getExplores:(state)=>{
			return state.explores;
		},
		getClientSay:(state)=>{
			return state.clientsays;
		},
		getPrice:(state)=>{
			return state.price;
		}
	},

	// action area start
	actions: {

		// Login adn retrive Token
		retriveToken(context, data) {
			return new Promise((resolve, reject) => {
				axios.post("/login", data
				).then((res) => {
					const token = res.data.access_token;
					localStorage.setItem('access_token', token);
					context.commit('RETIVE_TOKEN', token)
					resolve(res);
				})
					.catch((error) => {
						reject(error);
					});
			})

		},

		// Logout adn destroy Token
		destroyToken(context) {
			if (context.getters.logedIn) {
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('access_token');
				return new Promise((resolve, reject) => {
					axios.post("/logout"
					).then((res) => {
						localStorage.removeItem('access_token');
						context.commit('DESTROY_TOKEN');
						resolve(res);
					})
						.catch((error) => {
							localStorage.removeItem('access_token');
							context.commit('DESTROY_TOKEN');
							reject(error);
						});
				})
			}
		},

		// Get Home Banner Data
		retriveHomeBanner(context) {
			axios.get("/banner"
			).then((res) => {
				context.commit('RETRIVE_HOME_BANNER',res.data.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		},

		// Get main category
		retriveCategory(context){
			axios.get("/categores"
			).then((res) => {
				context.commit('RETRIVE_CATEGORY',res.data.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		},

		// get Explore data
		retriveExplore(context){
			axios.get("/explores"
			).then((res) => {
				context.commit('RETRIVE_EXPLORES',res.data.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		},

		// get client say
		retriveClientSay(context){
			axios.get("/clientsay"
			).then((res) => {
				context.commit('RETRIVE_CLIENT_SAY',res.data.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		},

		// Retrive Price
		retrivePrice(context){
			axios.get("/show/pricing"
			).then((res) => {
				context.commit('RETRIVE_PRICE',res.data.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		}
	},

	// mutations area start
	mutations: {
		RETIVE_TOKEN(state, data) {
			return state.token = data
		},
		DESTROY_TOKEN(state) {
			return state.token = null;
		},
		RETRIVE_HOME_BANNER(state,data){
			return state.homebanner = data;
		},
		RETRIVE_CATEGORY(state,data){
			return state.categores = data;
		},
		RETRIVE_EXPLORES(state,data){
			return state.explores = data;
		},
		RETRIVE_CLIENT_SAY(state,data){
			return state.clientsays = data;
		},
		RETRIVE_PRICE(state,data){
			return state.price = data;
		}
	},
});

export default store;