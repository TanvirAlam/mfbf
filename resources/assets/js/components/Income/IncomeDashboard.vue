<template>
    <article class="tile is-child box">
        <div class="level-left">
            <img src="/img/income_new.png" alt="User Image">
            <label class="label">Income</label>
        </div>
        <div class="income-amount income income-color">
            <span class="icon">
                <icon class="fa fa-plus"></icon>
            </span>
            {{ formatAmount(incomeAmount) }}
        </div>
        <div class="is-pulled-right">
            <a class="button is-success is-small" @click="isViewIncomeModalActive = true">
                <span class="icon is-small">
                    <icon class="fa fa-th-list"></icon>
                </span>
                <span>View</span>
            </a>
            <a class="button is-success is-small" @click="isInsertIncomeModalActive = true">
                <span class="icon is-">
                    <icon class="fa fa-plus"></icon>
                </span>
                <span>Add</span>
            </a>
        </div>
        <b-modal :active.sync="isInsertIncomeModalActive" :width="640" scroll="keep">
            <IncomeAddFormModal></IncomeAddFormModal>
        </b-modal>
        <b-modal :active.sync="isViewIncomeModalActive" :width="640" scroll="keep">
            <IncomeListModal></IncomeListModal>
        </b-modal>
    </article>
</template>
<script>
    import IncomeAddFormModal from './IncomeAddFormModal'
    import IncomeListModal from './IncomeListModal'

    export default {
      components: {
        IncomeAddFormModal,
        IncomeListModal
      },
      data() {
        return {
          isInsertIncomeModalActive: false,
          isViewIncomeModalActive: false,
          incomeAmount: 30000000,
        }
      },
      methods: {
        formatAmount(value) {
          let val = (value/1).toFixed(2).replace('.', ',')
          return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
      }
    }
</script>
<style>
    .label {
        padding: 5px 0px 0px 5px;
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 green);
    }
    .income {
        font-size: x-large;
    }
    .income-color {
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 green);
    }
    .income-amount::after {
        content:"DKK";
    }
</style>
