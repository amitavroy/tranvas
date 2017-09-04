<template>
  <div class="clock wrapper">
    <div class="month-year">
      {{ yearMonthString }}
    </div>

    <div class="date-time">
      {{ dateTimeString }}
    </div>
  </div>
</template>

<script>
  import moment from 'moment';

  export default {
    data () {
      return {
        yearMonthString: '',
        dateTimeString: ''
      }
    },

    created () {
      this.dateTimeString = moment().format('ddd hh:mm:ss A');
      this.yearMonthString = moment().format('MMMM YYYY');

      setInterval(() => {
        this.dateTimeString = moment().format('ddd hh:mm:ss A');
      }, 1000)
    }
  }
</script>

<style>
  .month-year {
    margin-right: 20px;
  }
  .date-time, .month-year {
    float: left;
  }
</style>