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

            <div class="tile is-horizontal">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="level-left">
                            <figure class="image is-32x32">
                                <img src="img/income.png" alt="User Image" class="income-color">
                            </figure>
                            <h4 class="title income-color">Income</h4>
                        </div>
                        <table class="table is-narrow">
                            <thead>
                            <tr>
                                <th class="level-right income-color">
                                    <a>
                                        <span class="icon is-small">
                                            <i class="fa fa-step-backward"></i>
                                        </span>
                                    </a>
                                    FEB-2017</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="amount income income-color">
                                        <span class="icon is-medium">
                                            <i class="fa fa-plus-circle"></i>
                                        </span>
                                        30,000 </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
                        <table class="table is-narrow">
                            <thead>
                            <tr>
                                <th class="level-right expense-color">
                                    <a>
                                        <span class="icon is-small">
                                            <i class="fa fa-step-backward"></i>
                                        </span>
                                    </a>
                                    FEB-2017</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="amount expense expense-color">
                                    <span class="icon is-medium">
                                            <i class="fa fa-minus-circle"></i>
                                    </span>
                                    30,000 </td>
                            </tr>
                            </tbody>
                        </table>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <div class="level-left">
                            <figure class="image is-32x32">
                                <img src="img/savings.png" alt="User Image" class="savings-color">
                            </figure>
                            <h4 class="title savings-color">Savings</h4>
                        </div>
                        <table class="table is-narrow">
                            <thead>
                            <tr>
                                <th class="level-right savings-color">
                                    <a>
                                        <span class="icon is-small">
                                            <i class="fa fa-step-backward"></i>
                                        </span>
                                    </a>
                                    FEB-2017</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="amount savings savings-color">
                                    <span class="icon is-medium">
                                            <i class="fa fa-plus-circle"></i>
                                    </span>
                                    30,000 </td>
                            </tr>
                            </tbody>
                        </table>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <!--<chart :type="'bar'" :data="seriesData" :options="options_3"></chart>-->
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <div class="Table is-mobile">
                        <div class="Row">
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-small">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <a href="#" title="House rent">House Rent</a>
                                </p>
                            </div>
                            <div class="Cell">
                                <chart v-bind="chart" :type="'line'" :data="seriesData1" :options="options" height="15"></chart>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/edit.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/expense.png" alt="User Image" class="expense-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/income.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="Row">
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-small">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <a href="#" title="Electricity">Electricity</a>
                                </p>
                            </div>
                            <div class="Cell">
                                <chart v-bind="chart" :type="'line'" :data="seriesData2" :options="options" height="15"></chart>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/edit.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/expense.png" alt="User Image" class="expense-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/income.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="Row">
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-small">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <a href="#" title="Water">Water</a>
                                </p>
                            </div>
                            <div class="Cell">
                                <chart v-bind="chart" :type="'line'" :data="seriesData3" :options="options" height="15"></chart>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/edit.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/expense.png" alt="User Image" class="expense-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/income.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="Row">
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-small">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <a href="#" title="Water">Entertainment</a>
                                </p>
                            </div>
                            <div class="Cell">
                                <chart v-bind="chart" :type="'line'" :data="seriesData4" :options="options" height="15"></chart>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/edit.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/expense.png" alt="User Image" class="expense-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/income.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="Row">
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-small">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </p>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <a href="#" title="Water">Savings</a>
                                </p>
                            </div>
                            <div class="Cell">
                                <chart v-bind="chart" :type="'line'" :data="seriesData5" :options="options" height="15"></chart>
                            </div>
                            <div class="Cell" style="vertical-align: middle;">
                                <p>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/edit.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/expense.png" alt="User Image" class="expense-color">
                                        </figure>
                                    </span>
                                    <span class="icon is-medium">
                                        <figure class="image is-32x32">
                                            <img src="img/income.png" alt="User Image" class="income-color">
                                        </figure>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pagination_mfbf">
                        <nav class="pagination is-centered is-small" role="navigation" aria-label="pagination">
                            <a class="pagination-previous">Previous</a>
                            <a class="pagination-next">Next page</a>
                            <ul class="pagination-list">
                                <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                                <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="level-right savings-color">
                        <a @click="openModalCard()">
                            <img src="img/csv.png" class="graph">
                        </a>
                        <a @click="openModalCard()">
                            <img src="img/bank.png" class="graph">
                        </a>
                        <a @click="openModalCard()">
                            <img src="img/add.png" class="graph">
                        </a>
                    </div>
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

                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <!--<chart :type="'line'" :data="seriesData" :options="options_3"></chart>-->
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <!--<chart :type="'bar'" :data="seriesData" :options="options_3"></chart>-->
                    </article>
                </div>
            </div>


        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <timeline>
                    <timeline-item :label="true">
                      <span class="tag is-danger">
                        10 Feb. 2014
                      </span>
                    </timeline-item>
                    <timeline-item>
                        <span class="fa fa-envelope tag is-info"></span>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                            <div class="timeline-body">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                                <a class="button is-primary is-small">Read more</a>
                                <a class="button is-danger is-small">Delete</a>
                            </div>
                        </div>
                    </timeline-item>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <timeline-item>
                        <span class="fa fa-user tag is-primary"></span>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
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
      show: Boolean
    },
    components: {
      Chart,
      Timeline,
      TimelineItem
    },
    data () {
      return {
        labels: ['Sleeping', 'Designing', 'Coding', 'Cycling'],
        data: [20, 40, 5, 35],

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
          }
        },
        option_pie: {
          segmentShowStroke: false,
        },
        chart: {
          styles: {
            position: 'relative'
          }
        },

        backgroundColor: [
          '#1fc8db',
          '#fce473',
          '#42afe3',
          '#ed6c63',
          '#97cd76'
        ],

        labels_2: ['J', 'F', 'M', 'A', 'M', 'A', 'S', 'O', 'N', 'D'],
        data_2: [1, 9, 3, 4, 5, 6, 7, 8, 2, 3].map(e => (Math.sin(e) * 25) + 25),

        labels_3: ['J', 'F', 'M', 'A', 'M', 'A', 'S', 'O', 'N', 'D'],
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
        data_7: [
          [76, 45, 34, 23, 45, 78, 23, 78, 78, 43, 34, 89]
        ],
        series: ['Product A']
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
            pointBackgroundColor: this.backgroundColor[0],
            backgroundColor: this.backgroundColor[0].replace(/1\)$/, '.4)'),
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
            pointBackgroundColor: this.backgroundColor[1],
            backgroundColor: this.backgroundColor[1].replace(/1\)$/, '1.4)'),
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
            pointBackgroundColor: this.backgroundColor[2],
            backgroundColor: this.backgroundColor[2].replace(/1\)$/, '7.4)'),
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
            pointBackgroundColor: this.backgroundColor[3],
            backgroundColor: this.backgroundColor[3].replace(/1\)$/, '7.4)'),
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
            pointBackgroundColor: this.backgroundColor[4],
            backgroundColor: this.backgroundColor[4].replace(/1\)$/, '7.4)'),
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
    .pagination_mfbf {
        font-size: 10px;
        margin-bottom: 20px;
    }
    .pagination-list, .timeline {
        list-style-type: none !important;
    }
</style>
