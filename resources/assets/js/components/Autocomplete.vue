<template>
    <div>
        <div class="field">
            <input type="text"
                   v-bind:name="name"
                   v-bind:placeholder="placeholder"
                   v-bind:groupName="groupName"
                   v-model="searchQuery"
                   v-on:keyup="autoComplete()"
                   class="input">
                <span class="is-pulled-right newCategorySave" v-if="results.length == 0 && this.searchQuery">
                    <a class="button is-success is-small" @click="saveCategory(this.searchQuery)">
                        <span class="icon is-small">
                            <icon class="fa fa-floppy-o"></icon>
                        </span>
                    </a>
                </span>
                <div v-if="results.length == 0 && this.searchQuery" class="block">
                  <span class="tag">
                      <i class="fa fa-exclamation-triangle"></i>
                      <p class="help is-danger">Please enter only {{ groupName }} categories</p>
                  </span>
                </div>
        </div>
        <div class="panel-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results" @click="select(result)">
                    {{ result.name }}
                    <button class="button is-success is-small is-pulled-right" :disabled="result.type" @click.prevent="deleteCategory(result.id, result)">
                        <span class="icon is-small">
                            <icon class="fa fa-trash"></icon>
                        </span>
                    </button>

                </li>
            </ul>
        </div>
    </div>
</template>
<script>
  import axios from 'axios'

  export default{

    data(){
      return {
        searchQuery: '',
        results: [],
        groupId: '',
        categoryId: ''
      }
    },

    props: [
      'placeholder',
      'name',
      'groupName'
    ],

    methods: {
      autoComplete(){
        this.results = [];
        if(this.searchQuery.length > 1){
          axios.get('/api/category/search', {
            params: {
              query: this.searchQuery,
              group_name: this.groupName
            }
          }).then(response => {
            this.results = response.data
          });
        }
      },

      select: function(result){
        this.searchQuery = result.name
        this.groupId = result.group_id
        this.categoryId = result.id
        this.$store.dispatch('selectedCategories', {
          groupId: result.group_id,
          categoryId: result.id
        })
      },

      saveCategory(){
        this.$store.dispatch('saveCategory', {
          query: this.searchQuery,
          groupName: this.groupName
        }).then(response => {
          this.autoComplete()
        })
      },

      deleteCategory(categoryId, result){
        this.$store.dispatch('deleteCategory', {
          categoryId
        })
        this.results.splice(result)
      }
    }
  }
</script>
<style scoped>

    .newCategorySave {
        margin-top: -32px;
        padding: 0px 5px;
    }

    .list-group {
        list-style: none;
        padding: 5px 0px 0px 0px;
        margin-left: 0px;
    }

    .list-group li:hover {
        color: #ffffff;
        background-color: #00A5E3;
    }

    .list-group-item {
        left: 100px;
        padding: 0px 0px 3px 5px;
    }
</style>
