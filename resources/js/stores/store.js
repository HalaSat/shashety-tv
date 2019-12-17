import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    locale: ''
  },
  mutations: {
    changeLocale(state, payload) {
      localStorage.setItem('locale', payload.locale)
      state.locale = payload.locale
    }
  },
  actions: {
    changeLocale(context, payload) {
      context.commit('changeLocale', payload)
    }
  }
})

export default store
