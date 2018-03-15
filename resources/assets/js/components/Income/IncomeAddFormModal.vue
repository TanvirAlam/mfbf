<template>
    <form @submit.prevent="validateIncome">
        <div class="modal-card">
            <header class="modal-card-head is-small">
                <img src="/img/income_new.png" alt="User Image">
                <label class="label">Insert income</label>
            </header>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column">
                        <b-field label="Income categories">
                            <div :class="{ 'control': true }">
                                <div class="control">
                                    <div class="is-primary">

                                        <v-select v-model="selected" :options="['foo','bar']"></v-select>
                                    </div>
                                </div>
                            </div>
                        </b-field>
                        <span v-show="errors.has('category')" class="help is-danger">{{ errors.first('category') }}</span>
                    </div>
                    <div class="column">
                        <b-field label="Income collected month">
                            <div class="control">
                                <datepicker
                                        name="incomeDate"
                                        input-class="input"
                                        :minimumView="'month'"
                                        :placeholder="'Select 1st of the month'"
                                        :value="getDate"
                                        v-model="incomeDate">
                                </datepicker>
                            </div>
                        </b-field>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <b-field label="Describe your income">
                            <div class="control">
                                <div class="control">
                                    <textarea class="textarea" placeholder="Description about your income" v-model="incomeDescription"></textarea>
                                </div>
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Upload your salary receipt">
                            <div class="file">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="resume" disabled>
                                    <span class="file-cta">
                                      <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                      </span>
                                      <span class="file-label">
                                        Upload a income receipt
                                      </span>
                                    </span>
                                </label>
                            </div>
                        </b-field>
                        <div class="columns">
                            <div class="column">
                                <b-field label="Occurrence">
                                    <div class="is-small">
                                        <div class="field">
                                            <b-switch v-model="isSwitchedCustom"
                                                      true-value="Yes"
                                                      false-value="No">
                                                {{ isSwitchedCustom }}
                                            </b-switch>
                                        </div>
                                    </div>
                                </b-field>
                            </div>
                            <div class="column">
                                <b-field label="Intervels">
                                    <div class="field">
                                        <div class="control">
                                            <div class="field">
                                                <div class="control">
                                                    <div class="select is-primary">
                                                        <select class="form-control c-select" v-model="incomeIntervel" name="incomeIntervel">
                                                            <option disabled value="">Please select one</option>
                                                            <option value="Y">Yearly</option>
                                                            <option value="M" selected="selected">Monthly</option>
                                                            <option value="W">Weekly</option>
                                                            <option value="D">Daily</option>
                                                            <option value="H">Hourly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </b-field>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <b-field label="Amount before SKAT">
                            <div class="control has-icons-left">
                                <vue-autonumeric
                                    v-model="incomeBeforeSkat"
                                    :options="{
                                        digitGroupSeparator: '.',
                                        decimalCharacter: ',',
                                        decimalCharacterAlternative: '.',
                                        currencySymbol: '\u00a0DKK',
                                        currencySymbolPlacement: 's',
                                        roundingMethod: 'U',
                                        minimumValue: '0'
                                    }"
                                    class="incomeAmount">
                                </vue-autonumeric>
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Amount after SKAT">
                            <div class="control has-icons-left">
                                <vue-autonumeric
                                        v-model="incomeAfterSkat"
                                        :options="{
                                        digitGroupSeparator: '.',
                                        decimalCharacter: ',',
                                        decimalCharacterAlternative: '.',
                                        currencySymbol: '\u00a0DKK',
                                        currencySymbolPlacement: 's',
                                        roundingMethod: 'U',
                                        minimumValue: '0'
                                    }"
                                        class="incomeAmount">
                                </vue-autonumeric>
                            </div>
                        </b-field>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <div class="field is-grouped is-pulled-right">
                    <a class="button is-danger is-small" @click="$parent.close()">
                        <span class="icon is-small">
                          <icon class="fa fa-close"></icon>
                        </span>
                        <span>Close</span>
                    </a>
                    <button type="submit" class="button is-success is-small">
                        <span class="icon is-small">
                          <icon class="fa fa-save"></icon>
                        </span>
                        <span>Save</span>
                    </button>
                </div>
            </footer>
        </div>
    </form>
</template>
<script>
  import { Validator } from 'vee-validate';
  import Datepicker from 'vuejs-datepicker'
  import VueAutonumeric from 'vue-autonumeric/src/components/VueAutonumeric'

  export default {
    props: [
      'groupId',
      'categoryId'
    ],
    data() {
      return {
        isSwitchedCustom: 'Yes',
        category: '',
        getDate: new Date(),
        incomeDate: '',
        incomeDescription: '',
        incomeIntervel: '',
        incomeBeforeSkat: 0.00,
        incomeAfterSkat: 0.00,
        selected: 'foo'
      }
    },
    components: {
      Datepicker,
      VueAutonumeric
    },
    methods: {
      saveIncome () {
        this.$store.dispatch('saveIncome', {
          categoryId: this.category,
          groupId: this.$store.state.category.selectedCategoryInfo.groupId,
          incomeDate: this.incomeDate,
          desc: this.incomeDescription,
          occurance: this.isSwitchedCustom,
          interval: this.incomeIntervel,
          amountBeforeSkat: this.incomeBeforeSkat,
          amountAfterSkat: this.incomeAfterSkat,
        })
      },
      validateIncome() {
        /*console.log(
          this.$store.state.category.selectedCategoryInfo.categoryId,
          this.$store.state.category.selectedCategoryInfo.groupId,
          this.incomeDate,
          this.incomeDescription,
          this.isSwitchedCustom,
          this.incomeIntervel,
          this.incomeBeforeSkat,
          this.incomeAfterSkat,
        )*/

        //this.saveIncome()
        this.$validator.validateAll().then((result) => {
          if (result) {
            console.log(result)
            console.log(this.category)
            return
          }
          console.log(result)
          console.log(this.category)
        })
      }
    },
    computed: {
      getCategoryId () {
        return this.$store.state.category.selectedCategoryInfo.categoryId
      },
      getGroupId () {
        return this.$store.state.category.selectedCategoryInfo.groupId
      }
    }
  }
</script>
<style scoped>
    .modal-card {
        width: auto;
    }
    input {
        padding: .75em .5em;
        font-size: 100%;
        border: 1px solid #ccc;
        width: 100%;
    }
    .label {
        padding: 5px 0px 0px 5px;
    }
    .tag {
        cursor: pointer;
    }

    .incomeAmount {
        padding: .50em .5em;
        font-size: 100%;
        border: 1px solid #ccc;
        width: 100%;
        text-align: right;
    }
</style>
