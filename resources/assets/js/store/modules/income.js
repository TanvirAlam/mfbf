import axios from 'axios'

export default {
  state: {

  },
  getters: {

  },
  mutations: {
    SELECTED_CATEGORY_INFO: (state, payload) => {
      state.selectedCategoryInfo = payload
    },
  },
  actions: {
    saveIncome(context, data) {
      console.log(data)
      return new Promise((resolve, reject) => {
        axios.post(`/api/income/store`, {
          category_id: data.categoryId,
          group_id: data.groupId,
          income_date: data.incomeDate,
          description: data.incomeDescription,
          occurrence: data.isSwitchedCustom,
          interval: data.incomeIntervel,
          amount_b_skat: data.incomeBeforeSkat,
          amount_a_skat: data.incomeAfterSkat,
        }).then(response => {
          resolve(response)
        }, error => {
          reject(error)
        })
      })
    }
  }
}
