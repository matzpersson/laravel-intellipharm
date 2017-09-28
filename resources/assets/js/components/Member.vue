<template>
  <div>

    <thechart :chartData="chartData" :options="{}" :height="100"/>

    <filter-bar></filter-bar>

    <vuetable ref="vuetable"
        api-url="/api/members/paginate"
        :fields="fields"
        pagination-path=""
        :css="css.table"
        :sort-order="sortOrder"
        :multi-sort="true"
        :append-params="moreParams"
        @vuetable:cell-clicked="onCellClicked"
        @vuetable:pagination-data="onPaginationData"
        >

    </vuetable>

    <div class="vuetable-pagination">
      <vuetable-pagination-info ref="paginationInfo"
        info-class="pagination-info"
      ></vuetable-pagination-info>

      <vuetable-pagination ref="pagination"
        :css="css.pagination"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>

    </div>

  </div>

</template>

<script>

    import Listview from '../utilities/Listview.js'
    import TheChart from '../utilities/Chart.js'
    import FilterBar from './MemberFilter'

    Vue.component('filter-bar', FilterBar)
    Vue.component('thechart', TheChart)

    export default {

        mixins: [Listview.mixins],
        components: { TheChart },
        data () {
            return {
                chartData: null,
                fields: [
                    {
                      name: 'id',
                      sortField: 'id',
                    },
                    {
                      name: 'firstname',
                      sortField: 'firstname',
                    },
                    {
                      name: 'surname',
                      sortField: 'firstname',
                    },
                    {
                      name: 'email',
                      sortField: 'email'
                    },
                    ,
                    {
                      name: 'gender',
                      sortField: 'gender',
                      callback: 'genderLabel'
                    },
                    {
                      name: 'joined_date',
                      sortField: 'email'
                    }
                ],
                sortOrder: [
                  { field: 'firstname', sortField: 'firstname', direction: 'asc'}
                ]
            }
        },
        created() {

            this.fillChartData()

        },
        methods: {

            genderLabel (value) {
                return value === 'Male'
                    ? '<span class="label label-success"><i class="glyphicon glyphicon-star"></i> Male</span>'
                    : '<span class="label label-danger"><i class="glyphicon glyphicon-heart"></i> Female</span>'
            },

            fillChartData () {

                axios.get("/api/signups").then( ({data}) => {

                    var labels = []
                    var columns = []
                    for (var idx in data) {
                        labels.push(data[idx]['label'])
                        columns.push(data[idx]['count'])
                    }

                    this.chartData = {
                      labels: labels,
                      datasets: [
                        {
                          label: 'Member Signups by Year',
                          backgroundColor: '#f87979',
                          data: columns
                        }
                      ]
                    }

                })
            },

            onCellClicked (data, field, event) {
                console.log('cellClicked: ', field.name)
            
            },
            closeModal() {

            }
        },
        events: {
            'filter-set' (filterText) {
              this.moreParams = {
                filter: filterText
              }
              Vue.nextTick( () => this.$refs.vuetable.refresh() )
            },
            'filter-reset' () {
              this.moreParams = {}
              Vue.nextTick( () => this.$refs.vuetable.refresh() )
            }
        }


    }
</script>

