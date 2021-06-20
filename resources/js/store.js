import axios from 'axios';
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex);

const store = new Vuex.Store({

	state: {
		token: localStorage.getItem('access_token') || null,

		logo:{},

		homebanner: {},
		categores: {},
		explores: {},
		clientsays: {},
		price: {},
		category: '',
		subcategores: {},
		privacyPolicy: {},
		licencing: {},
		singleProduct: {},
		productCategores: {},
		productSubCategores: {},
		productReSubCategores: {},
		mainProducts: {},
		productlink: {},
		softwares: {},
		tagResubCategores: {},
	},

	// getter area start

	getters: {
		logedIn: (state) => {
			return state.token != null;
		},
		getBanner: (state) => {
			return state.homebanner;
		},
		getCategores: (state) => {
			return state.categores;
		},
		getExplores: (state) => {
			return state.explores;
		},
		getClientSay: (state) => {
			return state.clientsays;
		},
		getPrice: (state) => {
			return state.price;
		},
		getSubCategory: (state) => {
			return state.category;
		},
		getProduct: (state) => {
			return state.products;
		},
		getSubCategores: (state) => {
			return state.subcategores;
		},
		getPrivacyPolicy: (state) => {
			return state.privacyPolicy;
		},
		getLicencing: (state) => {
			return state.licencing;
		},

		getLogo:(state)=>{
			return state.logo;
		},

		getSingleProduct: (state) => {
			return state.singleProduct;
		},
		getProductCategores: (state) => {
			return state.productCategores;
		},
		getProductSubCategores: (state) => {
			return state.productSubCategores;
		},
		getProductReSubCategores: (state) => {
			return state.productReSubCategores;
		},
		getMainProducts: (state) => {
			return state.mainProducts;
		},
		nextPageLink:(state)=>{
			return state.productlink.next !=null;
		},
		getSoftwares: (state) =>{
			return state.softwares;
		},
		getTagResubCategores: (state) =>{
			return state.tagResubCategores;
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
				context.commit('RETRIVE_HOME_BANNER', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// Get main category
		retriveCategory(context) {
			axios.get("/categores"
			).then((res) => {
				context.commit('RETRIVE_CATEGORY', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// get Explore data
		retriveExplore(context) {
			axios.get("/explores"
			).then((res) => {
				context.commit('RETRIVE_EXPLORES', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// get client say
		retriveClientSay(context) {
			axios.get("/clientsay"
			).then((res) => {
				context.commit('RETRIVE_CLIENT_SAY', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// Retrive Price
		retrivePrice(context) {
			axios.get("/show/pricing"
			).then((res) => {
				context.commit('RETRIVE_PRICE', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// get category and subcategory orderby for menu
		getHeaderSubcat(context) {
			axios.get("/show/header/category"
			).then((res) => {
				context.commit('HEADER_SUB_CATEGORY', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// get Sub Category by Category ID
		retriveSubCategory(context, cat) {
			axios.get("/show/product/subcategory/" + cat
			).then((res) => {
				context.commit('PRODUCT_SUB_CATEGORY', res.data.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// retrive Privacy policy

		retrivePrivacypolicy(context) {
			axios.get("/privacypolicy"
			).then((res) => {
				context.commit('RETRIVE_PRIVACY_POLICY', res.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},
		// licencing
		retriveLicencing(context) {
			axios.get("/licence"
			).then((res) => {
				context.commit('RETRIVE_LICENCING', res.data);
			})
				.catch((error) => {
					console.log(error);
				});
		},

		// licencing
		retriveProductByID(context, data) {
			axios.get(`/product/${data}`
			).then((res) => {
				context.commit('RETRIVE_PRODUCT_BY_ID', res.data.data);
			})

			.catch((error) => {
				console.log(error);		
			});
		},

		retriveLogo(context){
			axios.get("/logo"
			).then((res) => {
				context.commit('RETRIVE_LOGO',res.data);
			})
			.catch((error) => {
				console.log(error);		
			});
		},

		// retrive categores
		retriveCategores(context) {
			axios
				.get("/get/product/categores")
				.then((res) => {
					context.commit('RETRIVE_PRODUCT_CATEGORES', res.data.data)
				})
				.catch((error) => {
					console.log(error);
				});
		},


		// retrive subcategores
		retriveSubCategores(context, data) {
			axios
				.get(`/get/product/subcategores/${data}`)
				.then((res) => {
					context.commit('RETRIVE_PRODUCT_SUBCATEGORES', res.data.data)
				})
				.catch((error) => {
					console.log(error);
				});
		},

		// retrive resubcategores
		retriveReSubCategores(context, payload) {
			axios
				.get(`/get/product/resubcategores/${payload.cat}/${payload.subcat}`)
				.then((res) => {
					context.commit('RETRIVE_PRODUCT_RESUBCATEGORES', res.data.data)
				})
				.catch((error) => {
					console.log(error);
				});
		},

		// retrive product
		retriveProduct(context, payload) {
			axios
				.get(`/get/product/${payload.cat}/${payload.subcat}`)
				.then((res) => {
					context.commit('RETRIVE_MAIN_PRODUCT', res.data.data)
				})
				.catch((error) => {
					console.log(error);
				});
		},

		// retrive filter product
		retriveFilterProduct(context, payload) {
			axios
				.get(`/get/filter/product/${payload.cat}/${payload.subcat}`, {
					params: payload.items
				})
				.then((res) => {
					context.commit('RETRIVE_FILTER_PRODUCT', res.data.data);
					context.commit('RETRIVE_PRODUCT_LINK', res.data.links);
				})
				.catch((error) => {
					console.log(error);
				});
		},


		// retrive software type
		retriveSoftware(context, payload) {
			axios
				.get("/get/software/type")
				.then((res) => {
					context.commit('RETRIVE_SOFTWARE_TYPE', res.data);
				})
				.catch((error) => {
					console.log(error);
				});
		},

		// retrive tag resub categores
		retriveTagResuCategores(context, payload) {
			axios
				.get("/get/resub/categores/tag",{
					params: payload
				})
				.then((res) => {
					context.commit('RETRIVE_TAG_RESUB_CATEGORY', res.data);
				})
				.catch((error) => {
					console.log(error);
				});
		},

		// store load more product
		storeLoadMoreProduct(context,data){
			context.commit('STORE_LOAD_MORE_PRODUCT', data);

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
		RETRIVE_HOME_BANNER(state, data) {
			return state.homebanner = data;
		},
		RETRIVE_CATEGORY(state, data) {
			return state.categores = data;
		},
		RETRIVE_EXPLORES(state, data) {
			return state.explores = data;
		},
		RETRIVE_CLIENT_SAY(state, data) {
			return state.clientsays = data;
		},
		RETRIVE_PRICE(state, data) {
			return state.price = data;
		},
		HEADER_SUB_CATEGORY(state, data) {
			return state.category = data;
		},
		RETRIVE_PRODUCT(state, data) {
			return state.products = data;
		},
		PRODUCT_SUB_CATEGORY(state, data) {
			return state.subcategores = data;
		},
		RETRIVE_PRIVACY_POLICY(state, data) {
			return state.privacyPolicy = data;
		},
		RETRIVE_LICENCING(state, data) {
			return state.licencing = data;
		},

		RETRIVE_LOGO(state,data){
			return state.logo = data;
		},
		RETRIVE_PRODUCT_BY_ID(state, data) {
			return state.singleProduct = data;
		},
		RETRIVE_PRODUCT_CATEGORES(state, data) {
			return state.productCategores = data;
		},
		RETRIVE_PRODUCT_SUBCATEGORES(state, data) {
			return state.productSubCategores = data;
		},
		RETRIVE_PRODUCT_RESUBCATEGORES(state, data) {
			return state.productReSubCategores = data;
		},
		RETRIVE_MAIN_PRODUCT(state, data) {
			state.mainProducts = [];
			return state.mainProducts = data;
		},
		RETRIVE_FILTER_PRODUCT(state, data) {
			state.mainProducts = [];
			return state.mainProducts = data;
		},
		STORE_LOAD_MORE_PRODUCT(state,data){
			return state.mainProducts.push(data[0]);
		},
		RETRIVE_PRODUCT_LINK(state,data){
			return state.productlink = data
		},
		RETRIVE_SOFTWARE_TYPE(state,data){
			return state.softwares = data
		},
		RETRIVE_TAG_RESUB_CATEGORY(state,data){
			return state.tagResubCategores = data
		}


	},
});

export default store;