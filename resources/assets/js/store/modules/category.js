import axios from 'axios'

export default {
  state: {
    selectedCategoryInfo: {},
  },
  getters: {

  },
  mutations: {
    SELECTED_CATEGORY_INFO: (state, payload) => {
      state.selectedCategoryInfo = payload
    },
  },
  actions: {
    saveCategory(context, data) {
      return new Promise((resolve, reject) => {
        axios.post(`/api/category/store`, {
          name: data.query,
          group_name: data.groupName
        }).then(response => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    },

    deleteCategory: ({}, {categoryId}) => {
      axios.delete(`/api/category/${categoryId}/delete`)
    },

    selectedCategories({commit}, {groupId, categoryId}){
      commit('SELECTED_CATEGORY_INFO', { groupId, categoryId })
    }
  }
}
