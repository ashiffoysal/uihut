import axios from 'axios';
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

const store = new Vuex.Store({

	state: {
		token: localStorage.getItem('access_token') || null,
	},

	// getter area start

	getters: {
		logedIn: (state) => {
			return state.token != null;
		},
	},

	// action area start
	actions: {
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
		destroyToken(context){
			if(context.getters.logedIn){
				axios.defaults.headers.common['Authorization'] = 'Bearer ' +localStorage.getItem('access_token');
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
		}
	},

	// mutations area start
	mutations: {
		RETIVE_TOKEN(state, data) {
			return state.token = data
		},
		DESTROY_TOKEN(state){
			return state.token = null;
		}
	},




});

export default store;