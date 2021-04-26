var edit = new Vue({
el: '#edit',
data() {
  return {
    rooms: 0,
    beds: 0,
    bathrooms: 0,
    mq: 40,
    phpRooms: 'active',
    vueRooms: 'hidden',
    phpBeds: 'active',
    vueBeds: 'hidden',
    phpBathrooms: 'active',
    vueBathrooms: 'hidden',
    phpMq: 'active',
    vueMq: 'hidden',
    apiKey: 'GNSLhVGN7KNDGb9SFVEjknBWIKpB1HjX',
    applicationName: 'BoolBnb',
    applicationVersion: '1.0',
    form: document.getElementById('form')
  }
},
mounted() {

  tt.setProductInfo(this.applicationName, this.applicationVersion);

  form.addEventListener('submit', event => {
    event.preventDefault();

    let address = document.getElementById('inputAddress').value;
    let city = document.getElementById('inputCity').value;

    tt.services.fuzzySearch({
      key: this.apiKey,
      query: address + " " + city
    })
    .then(function(response) {
      let coords = response.results[0].position;
      document.getElementById('longitude').value = coords.lng;
      document.getElementById('latitude').value = coords.lat;
      form.submit();
    });

  });

},
methods: {
  addRoom: function () {
    this.phpRooms = 'hidden';
    this.vueRooms = 'active';
    this.rooms++;
  },
  removeRoom: function () {
    this.phpRooms = 'hidden';
    this.vueRooms = 'active';
    if (this.rooms > 1) {
      this.rooms--;
    }
  },
  addBed: function () {
    this.phpBeds = 'hidden';
    this.vueBeds = 'active';
    this.beds++;
  },
  removeBed: function () {
    this.phpBeds = 'hidden';
    this.vueBeds = 'active';
    if (this.beds > 1) {
      this.beds--;
    }
  },
  addBathroom: function () {
    this.phpBathrooms = 'hidden';
    this.vueBathrooms = 'active';
    this.bathrooms++;
  },
  removeBathroom: function () {
    this.phpBathrooms = 'hidden';
    this.vueBathrooms = 'active';
    if (this.bathrooms > 1) {
      this.bathrooms--;
    }
  },
  addMq: function () {
    this.phpMq = 'hidden';
    this.vueMq = 'active';
    this.mq += 5;
  },
  removeMq: function () {
    this.phpMq = 'hidden';
    this.vueMq = 'active';
    if (this.mq > 1) {
      this.mq -= 5;
    }
  }
}
});
