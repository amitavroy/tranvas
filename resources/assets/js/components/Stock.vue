<template>
  <div class="stock__wrapper">
    <div class="card-title">
      <span class="icons"><i class="fa fa-line-chart"></i></span>
      Stock data
    </div>
    <table class="table table-striped table-hover">
      <tbody>
      <tr v-for="stock in stockData"  v-bind:class="getRowClass(stock.change)">
        <td>{{stock.name}}</td>
        <td class="price">{{stock.price}}</td>
        <td class="change">{{stock.change}}</td>
        <td class="percentage">{{stock.change_percentage}}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import {stockData} from './../config';
  import _ from 'lodash';

  export default {
    created () {
      this.getStockPrices();

      setInterval(() => {
        this.getStockPrices();
      }, 1000 * 60 * 3);
    },

    data () {
      return {
        stocks: ['LT', 'ONGC', 'SAIL'],
        stockData: []
      }
    },

    methods: {
      getStockPrices () {
        window.axios.post(stockData, this.stocks)
          .then(response => {
            var stockData = [];
            _.forEach(response.data, (stock, name) =>  {
              stockData.push(stock)
            })

            this.stockData = stockData;
          })
      },

      getRowClass (value) {
        return (value > 0) ? 'green' : 'red';
      }
    }
  }
</script>

<style lang="scss">
  tr.green {
    td.price, td.change, td.percentage {
      color: green;
    }
  }
  tr.red {
    td.price, td.change, td.percentage {
      color: red;
    }
  }
</style>