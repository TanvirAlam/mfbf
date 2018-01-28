<template>
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-8 topbox">

            <div class="level-left topbox">
                <figure class="image is-32x32">
                    <img src="img/avatar1.png" alt="User Image" class="img-circle">
                </figure>
                <a class="level-item">
                    <span class="icon is-small"><i class="fa fa-cogs"></i></span>
                </a>
                <a class="level-item" @click="logout">
                    <span class="icon is-small"><i class="fa fa-sign-out"></i></span>
                </a>
            </div>

            <div class="tile">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="level-left">
                            <figure class="image is-32x32">
                                <img src="img/income_new.png" alt="User Image">
                            </figure>
                            <h4 class="title income-color">Income</h4>
                        </div>
                        <div class="amount income income-color">
                            <span class="icon is-medium">
                                <i class="fa fa-plus-circle"></i>
                            </span>
                            30,000
                        </div>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="level-left">
                            <figure class="image is-32x32">
                                <img src="img/expense.png" alt="User Image" class="expense-color">
                            </figure>
                            <h4 class="title expense-color">Expense</h4>
                        </div>
                        <div class="amount expense expense-color">
                            <span class="icon is-medium">
                                    <i class="fa fa-minus-circle"></i>
                            </span>
                            30,000
                        </div>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="level-left">
                            <figure class="image is-32x32">
                                <img src="img/safebox.png" alt="User Image">
                            </figure>
                            <h4 class="title savings-color">Savings</h4>
                        </div>
                        <div class="amount savings savings-color">
                            <span class="icon is-medium">
                                    <i class="fa fa-plus-circle"></i>
                            </span>
                            30,000
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">

                    <table class="table">
                        <thead>
                        <tr>
                            <th><abbr title="Position">Pos</abbr></th>
                            <th>Team</th>
                            <th><abbr title="Played">Jan</abbr></th>
                            <th><abbr title="Won">Feb</abbr></th>
                            <th><abbr title="Drawn">Mar</abbr></th>
                            <th><abbr title="Lost">Apr</abbr></th>
                            <th><abbr title="Goals for">May</abbr></th>
                            <th><abbr title="Goals against">Jun</abbr></th>
                            <th><abbr title="Goal difference">Jul</abbr></th>
                            <th><abbr title="Points">Aug</abbr></th>
                            <th><abbr title="Points">Sep</abbr></th>
                            <th><abbr title="Points">Oct</abbr></th>
                            <th><abbr title="Points">Nov</abbr></th>
                            <th><abbr title="Points">Dec</abbr></th>
                            <th>Spending</th>
                            <th>Budget</th>
                            <th>Balance</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th><abbr title="Played">Jan</abbr></th>
                            <th><abbr title="Won">Feb</abbr></th>
                            <th><abbr title="Drawn">Mar</abbr></th>
                            <th><abbr title="Lost">Apr</abbr></th>
                            <th><abbr title="Goals for">May</abbr></th>
                            <th><abbr title="Goals against">Jun</abbr></th>
                            <th><abbr title="Goal difference">Jul</abbr></th>
                            <th><abbr title="Points">Aug</abbr></th>
                            <th><abbr title="Points">Sep</abbr></th>
                            <th><abbr title="Points">Oct</abbr></th>
                            <th><abbr title="Points">Nov</abbr></th>
                            <th><abbr title="Points">Dec</abbr></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/income_new.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="House Rent">House Rent</a></td>
                                <td colspan="12">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData6" :options="options" height=15></chart>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/rent.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="House Rent">House Rent</a></td>
                                <td colspan="12">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData1" :options="options" height=15></chart>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/construction.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="Utilities">Utilities</a></td>
                                <td colspan="12">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData2" :options="options" height=15></chart>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/fast-food.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="House Rent">Food & Drinks</a></td>
                                <td colspan="12">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData3" :options="options" height=15></chart>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/ferris-wheel.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="Entertainment">Entertainment</a></td>
                                <td colspan="12">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData4" :options="options" height=15></chart>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <figure class="image is-32x32">
                                        <img src="img/safebox.png" alt="User Image">
                                    </figure>
                                </th>
                                <td><a href="#" title="Savings">Savings</a></td>
                                <td colspan="12">
                                    <div id="wrapper" style="position: relative; height: 50vh">
                                    <chart v-bind="chart" :type="'line'" :data="seriesData5" :options="options" height=15></chart>
                                    </div>
                                </td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>30000</td>
                                <td>
                                    <p>
                                    <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/edit.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/expense.png" alt="User Image" class="expense-color">
                                            </figure>
                                        </span>
                                        <span class="icon is-medium">
                                            <figure class="image is-24x24">
                                                <img src="img/income.png" alt="User Image" class="income-color">
                                            </figure>
                                        </span>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </article>
            </div>
            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <chart :type="'pie'" :data="pieData" :options="option_pie"></chart>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <chart :type="'horizontalBar'" :data="seriesDataLine" :options="option_line"></chart>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <chart :type="'line'" :data="seriesData2" :options="options_line"></chart>
                    </article>
                </div>
                <div class="tile is-parent">

                        <timeline>
                            <timeline-item :label="true">
                              <span class="tag is-danger">10 Feb. 2014</span>
                            </timeline-item>
                            <timeline-item>
                                <span class="fa fa-money tag is-info"></span>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Pay Henrik 40 kr.</h3>
                                </div>
                            </timeline-item>
                            <timeline-item :label="true">
                                <span class="tag is-danger">10 Feb. 2014</span>
                            </timeline-item>
                            <timeline-item>
                                <span class="fa fa-money tag is-info"></span>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Pay Henrik 40 kr.</h3>
                                </div>
                            </timeline-item>
                            <timeline-item :label="true">
                                <span class="tag is-danger">10 Feb. 2014</span>
                            </timeline-item>
                            <timeline-item>
                                <span class="fa fa-money tag is-info"></span>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Pay Henrik 40 kr.</h3>
                                </div>
                            </timeline-item>
                            <timeline-item>
                                <span class="fa fa-clock-o tag is-white"></span>
                            </timeline-item>
                        </timeline>

                </div>
            </div>
        </div>

        <!--<div class="timeline-footer">
            <a class="button is-primary is-small">Read more</a>
            <a class="button is-danger is-small">Delete</a>
        </div>-->
        <div class="tile is-parent">
            <article class="tile is-child box">
                <timeline>
                    <timeline-item :label="true">
                      <span class="tag is-danger">
                        31st Nov. 2017
                      </span>
                    </timeline-item>
                    <timeline-item>
                        <span class="fa fa-money tag is-info"></span>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                            <h3 class="timeline-header">Salary received 18,000.00</h3>
                        </div>
                    </timeline-item>
                    <timeline-item>
                        <span class="fa fa-money tag is-info"></span>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                            <h3 class="timeline-header">Salary received 18,000.00</h3>
                        </div>
                    </timeline-item>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <timeline-item>
                        <span class="fa fa-comments tag is-danger"></span>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                            <div class="timeline-body">
                                Take me to your leader!
                                Switzerland is small and neutral!
                                We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                                <a class="button is-info is-small">View comment</a>
                            </div>
                        </div>
                    </timeline-item>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <timeline-item :label="true">
                  <span class="tag is-primary">
                    3 Jan. 2014
                  </span>
                    </timeline-item>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <timeline-item>
                        <span class="fa fa-camera  tag is-danger"></span>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                            <div class="timeline-body">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                            </div>
                        </div>
                    </timeline-item>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <timeline-item>
                        <span class="fa fa-video-camera tag is-success"></span>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                            <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3>

                            <div class="timeline-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" frameborder="0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="timeline-footer">
                                <a href="#" class="button is-success is-small">See comments</a>
                            </div>
                        </div>
                    </timeline-item>
                    <!-- END timeline item -->
                    <timeline-item>
                        <span class="fa fa-clock-o tag is-white"></span>
                    </timeline-item>
                </timeline>
            </article>
        </div>
    </div>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex'
  import Chart from 'vue-bulma-chartjs'
  import { Timeline, TimelineItem } from '../components/timeline'

  /*scales: {
    xAxes: [{
      display: false
    }],
      yAxes: [{
      display: false
    }],
  }*/

  export default {
    name: 'dashboard',
    props: {
      show: Boolean,
      height: ''
    },
    components: {
      Chart,
      Timeline,
      TimelineItem
    },
    data () {
      return {
        labels: ['House rent', 'Utilities', 'Water', 'Entertainment', 'Savings'],
        data: [20, 40, 5, 35, 98],

        options: {
          segmentShowStroke: false,
          scaleShowLabels: false,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false
            }],
            yAxes: [{
              display: false
            }],
          },
          maintainAspectRatio:false
        },
        option_pie: {
          segmentShowStroke: false,
        },
        option_line: {
          segmentShowStroke: false,
          legend: {
            display: false
          },
        },
        chart: {
          styles: {
            position: 'relative'
          }
        },

        backgroundColor: [
          '#ff33cc',
          '#1fc8db',
          '#fce473',
          '#42afe3',
          '#ed6c63',
          '#97cd76'
        ],

        labels_2: ['J', 'F', 'M', 'A', 'M', 'A', 'S', 'O', 'N', 'D'],
        data_2: [1, 9, 3, 4, 5, 6, 7, 8, 2, 3].map(e => (Math.sin(e) * 25) + 25),

        labels_line: ['Income', 'House Rent', 'Utilities', 'Food & Drinks', 'Entertainment', 'Savings'],
        data_7: [
          [76, 45, 34, 23, 45, 78, 23, 78, 78, 43, 34, 89]
        ],
        labels_3: ['J', 'F', 'M', 'A', 'M', 'A', 'S', 'O', 'N', 'D'],
        data_2: [
          [45, 66, 33, 11, 3, 44, 55, 66, 87, 56, 56, 23]
        ],
        data_3: [
          [56, 34, 23, 12, 56, 67, 77, 23, 12, 56, 67, 77]
        ],
        data_4: [
          [12, 78, 34, 23, 67, 34, 23, 23, 12, 56, 67, 77]
        ],
        data_5: [
          [45, 34, 23, 12, 34, 78, 56, 23, 12, 56, 67, 77]
        ],
        data_6: [
          [54, 23, 54, 56, 44, 78, 67, 34, 23, 45, 78, 89]
        ],

        series: ['Balance forecast']
      }
    },

    computed: {
      pieData () {
        return {
          labels: this.labels,
          datasets: [{
            data: this.data,
            backgroundColor: this.backgroundColor
          }]
        }
      },
      /*waveData () {
        return {
          labels: this.labels_2,
          datasets: [{
            label: 'My Radar',
            data: this.data_2,
            backgroundColor: this.backgroundColor[0]
          }]
        }
      },*/

      seriesData1 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_3[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[1],
            backgroundColor: this.backgroundColor[1].replace(/1\)$/, '.4)'),
          }
        })
        return data
      },
      seriesData2 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_4[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[2],
            backgroundColor: this.backgroundColor[2].replace(/1\)$/, '1.4)'),
          }
        })
        return data
      },
      seriesDataLine () {
        let data = {
          labels: this.labels_line
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_5[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[i],
            backgroundColor: this.backgroundColor[i].replace(/1\)$/, '7.4)'),
          }
        })
        return data
      },
      seriesData3 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_5[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[3],
            backgroundColor: this.backgroundColor[3].replace(/1\)$/, '7.4)'),
          }
        })
        return data
      },
      seriesData4 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_6[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[4],
            backgroundColor: this.backgroundColor[4].replace(/1\)$/, '7.4)'),
          }
        })
        return data
      },
      seriesData5 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_7[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[5],
            backgroundColor: this.backgroundColor[5].replace(/1\)$/, '7.4)'),
          }
        })
        return data
      },
      seriesData6 () {
        let data = {
          labels: this.labels_3
        }
        data.datasets = this.series.map((e, i) => {
          return {
            data: this.data_2[i],
            label: this.series[i],
            pointBackgroundColor: this.backgroundColor[0],
            backgroundColor: this.backgroundColor[0].replace(/1\)$/, '7.4)'),
          }
        })
        return data
      }
    },

    created () {
     /* setInterval(() => {
        // https://vuejs.org/guide/list.html#Mutation-Methods
        this.data_2.unshift(this.data_2.pop())
      }, 377)*/
    },
    methods: {
      logout () {
        this.$store.dispatch('logout').then(() => {
          this.$router.push({
            name: 'auth.login'
          })
        })
      },
    },
  }

</script>

<style lang="scss">
    @import '~bulma/sass/utilities/variables';
    @import '~bulma/sass/utilities/mixins';

    .topbox {
        padding: 0px 10px;
    }

    .Table
    {
        display: table;
        width: 100%;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
    }

    img {
        width: 30px;
        height: 25px;
        padding-right: 2px;
    }
    .content h4 {
        margin-bottom: 0;
    }
    .income {
        font-size: xx-large;
    }
    .expense {
        font-size: xx-large;
    }
    .savings {
        font-size: xx-large;
    }
    .income-color {
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 green);
    }
    .expense-color {
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 red);
    }
    .savings-color {
        -webkit-filter: opacity(.5) drop-shadow(0 0 0 blue);
    }
    .amount::after {
        content:"DKK";
    }
    .time{
        font-size: 14px;
        font-weight: bold;
    }
    .timeline {
        list-style-type: none !important;
    }
</style>
