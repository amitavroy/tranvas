import moment from 'moment';
import twemoji from 'twemoji';
import * as linkify from 'linkifyjs';;
import linkifyHtml from 'linkifyjs/html';
import hashtag from 'linkifyjs/plugins/hashtag'; // optional
import mention from 'linkifyjs/plugins/mention';

hashtag(linkify);

class Tweet {

  constructor (tweetArray) {
    this.tweet = tweetArray;
  }

  get authorScreenName() {
    return '@' + this.tweet['user']['screen_name'];
  }

  get authorName() {
    return twemoji.parse(this.tweet['user']['name']);
  }

  get authorAvatar() {
    return this.tweet['user']['profile_image_url_https'];
  }

  get image() {
    return get(this.tweet, 'extended_entities.media[0].media_url_https', '');
  }

  get date() {
    return moment(this.tweet['created_at'], 'dd MMM DD HH:mm:ss ZZ YYYY');
  }

  get html() {
    var tweetText = this.tweet.text;

    if (this.tweet.extended_tweet) {
      tweetText =  this.tweet.extended_tweet.full_text;
    }

    tweetText = linkifyHtml(tweetText, {
      target: '_blank'
    });

    return tweetText;
  }

  get hasQuote() {
    if (this.tweet.extended_tweet)
      return true;
    else
      return false;
  }

  get quoteMedia() {
    this.tweet.quote = this.tweet.quoted_status;
    var quoteText = linkifyHtml(this.tweet.quoted_status.text, {
      target: '_blank'
    });

    return {
      text: quoteText,
      userName: this.tweet.quoted_status.user.name,
      userScreenName: "@" + this.tweet.quoted_status.user.screen_name
    }
  }
}

export default Tweet;
