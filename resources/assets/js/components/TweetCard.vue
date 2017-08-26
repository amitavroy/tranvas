<template>
  <section class="tweets">
    <div class="tweet" v-for="tweet in tweets">
      <div class="tweet__meta_data clearfix">
        <div class="link">
          <a v-bind:href="tweet.tweetLink" target="_blank">
            <span class="glyphicon glyphicon-play"></span>
          </a>
        </div>
        <div class="tweet__user_data">
          {{ tweet.authorName }} <span class="tweet__user_data__screen_name">{{ tweet.authorScreenName }}</span>
        </div>
        <div class="tweet__time">
          <relative-date :moment="tweet.date"></relative-date>
        </div>
      </div>
      <div class="tweet__body_content" v-html="tweet.html"></div>
      <div v-if="tweet.hasTweetMedia" :style="{ 'background-image': 'url(' + tweet.hasTweetMedia + ')' }" class="tweet__media">
      </div>
      <div v-if="tweet.hasQuote" class="quote">
        <small>In reply to</small>
        <div class="quote__meta_data clearfix">
          <div class="tweet__user_data">
            {{ tweet.quoteMedia.userName }} <span class="tweet__user_data__screen_name">{{ tweet.quoteMedia.userScreenName }}</span>
          </div>
        </div>
        <div class="tweet__body_content" v-html="tweet.quoteMedia.text"></div>
      </div>
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
    .tweet__media {
      text-align: center;
      width: 99%;
      height: 200px;
      background-size: contain;
      background-repeat: no-repeat;
    }
    .quote {
      border-top: solid 1px #e6ecf0;
      margin-top: 13px;
      padding: 2px 2px 3px 18px;
    }
    .tweet__meta_data {
      .tweet__screen_name, .tweet__time {
        float: left;
      }
      .link {
        float: right;
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
