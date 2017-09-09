<template>
  <div class="wrapper google-map">
    <div id="map"></div>
  </div>
</template>

<script>
  export default {
    props: ['lat', 'long'],

    created () {
      this.addGoogleScript();
    },

    methods: {
      addGoogleScript () {
        const googleMapScript = document.createElement('SCRIPT');
      },

      initMap() {
        var uluru = {lat: this.lat, lng: this.long};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: uluru
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    }
  }
</script>