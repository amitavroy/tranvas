import moment from 'moment';
import twemoji from 'twemoji';

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
    return this.tweet.text;
  }
}

export default Tweet;