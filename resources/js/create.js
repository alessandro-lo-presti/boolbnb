// require('./bootstrap');

var create = new Vue({
el: '#create',
data() {
  return {
    rooms: 0,
    beds: 0,
    bathrooms: 0,
    mq: 40
  }
},
methods: {
  addRoom: function () {
    this.rooms++;
  },
  removeRoom: function () {
    this.rooms--;
  },
  addBed: function () {
    this.beds++;
  },
  removeBed: function () {
    this.beds--;
  },
  addBathroom: function () {
    this.bathrooms++;
  },
  removeBathroom: function () {
    this.bathrooms--;
  },
  addMq: function () {
    this.mq += 5;
  },
  removeMq: function () {
    this.mq -=5;
  }
}
});
