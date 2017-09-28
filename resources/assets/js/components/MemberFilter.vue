<template>
    <div class="filter-bar" style='background-color: #eeeeee; border-radius: 6px;'>
        <form class="form-inline">
            <div class="form-group">
              <label>Search for:</label>
                <input style="width: 400px" type="text" v-model="filterText" class="form-control" @keyup="doFilter" placeholder="Firstname, Surname, or email">
            </div>
        </form>
    </div>
</template>

<script>
  export default {
    data () {
      return {
        filterText: ''
      }
    },
    methods: {
      doFilter () {
        this.$events.fire('filter-set', this.filterText)
      },
      resetFilter () {
        this.filterText = ''
        this.$events.fire('filter-reset')
      }
    }
  }
</script>
<style>
.filter-bar {
  padding: 10px;
}
</style>
