<template>
    <form action="">
        <div class="modal-card">
            <header class="modal-card-head is-small">
                <img src="/img/income_new.png" alt="User Image">
                <label class="label">Insert income</label>
            </header>
            <section class="modal-card-body">
                <div class="columns">
                    <div class="column">
                        <b-field label="Category">
                            <div class="control">
                                Autocomplete
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Collected at">
                            <div class="control">
                                <datepicker
                                        input-class="input"
                                        :minimumView="'month'"
                                        :maximumView="'year'"
                                        :initialView="'year'"
                                        :placeholder="'Select 1st of the month'">
                                </datepicker>
                            </div>
                        </b-field>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <b-field label="Description">
                            <div class="control">
                                <div class="control">
                                    <textarea class="textarea" placeholder="Description about your income"></textarea>
                                </div>
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Upload">
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
                                                        <select>
                                                            <option>Yearly</option>
                                                            <option>Monthly</option>
                                                            <option>Weekly</option>
                                                            <option>Daily</option>
                                                            <option>Hourly</option>
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
                                <auto-amount></auto-amount>
                            </div>
                        </b-field>
                    </div>
                    <div class="column">
                        <b-field label="Amount after SKAT">
                            <div class="control has-icons-left">
                                <auto-amount></auto-amount>
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
                    <a class="button is-success is-small">
                        <span class="icon is-small">
                          <icon class="fa fa-save"></icon>
                        </span>
                        <span>Save</span>
                    </a>
                </div>
            </footer>
        </div>
    </form>
</template>
<script>
  import Datepicker from 'vuejs-datepicker'

  export default {
    data() {
      return {
        isSwitchedCustom: 'Yes'
      }
    },
    components: {
      Datepicker
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
</style>
