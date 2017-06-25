<script>
  export default {
    data () {
      return {
        location: {
          lat: 19.065236,
          lng: 72.995742
        },
        markers: [{
          position: {lat: 10.0, lng: 10.0}
        }]
      }
    },

    methods: {
      setPlace (place) {
        this.location = {
          lat: place.geometry.location.lat(),
          lng: place.geometry.location.lng()
        }
      },

      markerDrag (position) {
        this.location = {
          lat: position.lat(),
          lng: position.lng()
        }
      }
    }
  }
</script>

<template>
  <div class="EventLocation__wrapper">
    <label for="location">Location</label>
    <div id="location">
      <gmap-autocomplete @place_changed="setPlace"></gmap-autocomplete>
      <gmap-map
        :center="location"
        :zoom="6"
        style="width: 500px; height: 300px">
        <gmap-marker
          :position="location"
          :clickable="true"
          :draggable="true"
          @click="center=location"
          @place_changed="setPlace"
          @position_changed="markerDrag($event)"
        ></gmap-marker>
      </gmap-map>
    </div>

    <input type="hidden" v-model="location.lat" name="lat">
    <input type="hidden" v-model="location.lng" name="lng">
  </div>
</template>

<style>

</style>