<script>
  export default {
    props: ['lat', 'long', 'zoomLevel'],

    created () {
      if (this.lat != null && this.long != null) {
        this.location.lat = parseFloat(this.lat);
        this.location.lng = parseFloat(this.long);
      }

      if (this.zoomLevel != null) {
        this.zoom = parseInt(this.zoomLevel);
      }
    },

    data () {
      return {
        zoom: 6,
        location: {
          lat: 22.538948,
          lng: 88.332537
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
        :zoom=this.zoom
        style="width: 100%; height: 300px">
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
