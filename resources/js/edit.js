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
    vueMq: 'hidden'
  }
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
    if (this.rooms > 0) {
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
    if (this.beds > 0) {
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
    if (this.bathrooms > 0) {
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
    if (this.mq > 0) {
      this.mq -= 5;
    }
  }
}
});
