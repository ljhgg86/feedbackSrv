import Vue from 'vue'
import Vuex from 'vuex'
import 'babel-polyfill'

Vue.use(Vuex)

const state = {
	userInfo:{}
};

const getters = {
};

const mutations = {
	//set user info
	setUserInfo(state,data){
		state.userInfo=data;
	},
};

const actions = {
};

export default new Vuex.Store({
  state,
  getters,
  mutations,
  actions,
})