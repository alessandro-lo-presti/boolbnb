// require('./bootstrap');

var create = new Vue({
el: '#create',
data() {
  return {
    rooms: 1,
    beds: 1,
    bathrooms: 1,
    mq: 40
  }
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
