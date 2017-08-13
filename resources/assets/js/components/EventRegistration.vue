<template>
  <div class="EventRegistration__wrapper">
    <button class="btn" v-bind:class="mode" v-on:click="handleRegistration">{{text}}</button>
  </div>
</template>

<script>
  import {registrationUrl} from './../config'

  export default {
    props: ['text', 'mode', 'eventId'],

    methods: {
      handleRegistration () {
        let postData = {
          eventId: this.eventId
        }
        axios.post(registrationUrl, postData)
          .then(response => {
            console.log('response', response)
          })
      }
    }
  }
</script>