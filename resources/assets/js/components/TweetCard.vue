<template>
  <section class="tweets">
    <div class="tweet" v-for="tweet in tweets">
      <div class="tweet__meta_data clearfix">
        <div class="tweet__user_data">
          {{ tweet.authorName }} <span class="tweet__user_data__screen_name">{{ tweet.authorScreenName }}</span>
        </div>
        <div class="tweet__time">
          <relative-date :moment="tweet.date"></relative-date>
        </div>
      </div>
      <div class="tweet__body_content" v-html="tweet.html"></div>
    </div>
  </section>
</template>

<script>
  import Tweet from '../services/Tweet'
  import RelativeDate from './RelativeDate'

  export default {
    components: {
      RelativeDate
    },

    props: ['initTweets'],

    created () {
      this.tweets = this.initTweets.map(tweetArray => new Tweet(tweetArray))
    },

    data () {
      return {
        tweets: []
      }
    }
  }
</script>

<style lang="scss">
  .tweet {
    background-color: white;
    border: solid 1px #e6ecf0;
    padding: 3px 2px 3px 10px;
    margin-bottom: 10px;
    .tweet__meta_data {
      .tweet__screen_name, .tweet__time {
        float: left;
      }
      .tweet__screen_name {
        padding-right: 15px;
      }
    }
    .tweet__user_data__screen_name {
      color: #558AE0;
    }
    .tweet__body_content {
      color: black;
    }
  }
</style>