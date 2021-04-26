// require('./bootstrap');

var create = new Vue({
el: '#create',
data() {
  return {
    rooms: 1,
    beds: 1,
    bathrooms: 1,
    mq: 40,
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
    this.rooms++;
  },
  removeRoom: function () {
    if (this.rooms > 1) {
      this.rooms--;
    }
  },
  addBed: function () {
    this.beds++;
  },
  removeBed: function () {
    if (this.beds > 1) {
      this.beds--;
    }
  },
  addBathroom: function () {
    this.bathrooms++;
  },
  removeBathroom: function () {
    if (this.bathrooms > 1) {
      this.bathrooms--;
    }
  },
  addMq: function () {
    this.mq += 5;
  },
  removeMq: function () {
    if (this.mq > 1) {
      this.mq -= 5;
    }
  }
}
});
