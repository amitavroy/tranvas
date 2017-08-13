<template>
  <div class="EventRegistration__wrapper">
    <button class="btn" v-bind:class="mode" v-on:click="handleRegistration">{{text}}</button>
  </div>
</template>

<script>
  import {registrationUrl} from './../config'

  export default {
    props: ['text', 'mode'],

    methods: {
      handleRegistration () {
        axios.post(registrationUrl, {check: 1})
          .then(response => {
            console.log('response', response)
          })
      }
    }
  }
</script>