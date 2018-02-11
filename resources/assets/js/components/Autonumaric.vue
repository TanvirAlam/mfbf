<template>
    <div>
        <div class="field">
            <vue-autonumeric
                    v-model="defaultValue"
                    :options="{
                        digitGroupSeparator: '.',
                        decimalCharacter: ',',
                        decimalCharacterAlternative: '.',
                        currencySymbol: '\u00a0DKK',
                        currencySymbolPlacement: 's',
                        roundingMethod: 'U',
                        minimumValue: '0'
                    }">
            </vue-autonumeric>
        </div>
    </div>
</template>
<script>
  import VueAutonumeric from 'vue-autonumeric/src/components/VueAutonumeric'

  export default{
    data() {
      return {
        defaultValue: 0.00,
      }
    },
    components: {
      VueAutonumeric
    }
  }
</script>
<style scoped>
    input {
        padding: .50em .5em;
        font-size: 100%;
        border: 1px solid #ccc;
        width: 100%;
        text-align: right;
    }
</style>