var cordsAddress = '';
var search = new Vue(
  {
    el: '#advanced-search',
    data: {
      apartments: [],
      searchInput: '',
      suggests: [],
      baseUrl: '',
      // baseUrl: '/marzo/progetto-boolbnb/public,'
      host: 'http://localhost:8000',
      // host: 'http://localhost:8080/marzo/progetto-boolbnb/public',
      rooms: 1,
      beds: 1,
      bathrooms: 1,
      mq: 40,
      radius: 20,
      arrayBounds: [],
      dropdownBox: 'hidden',
      dropdownAngle: 'down',
      WiFi: false,
      PostoAuto: false,
      Piscina: false,
      Portineria: false,
      Sauna: false,
      VistaMare: false,
      apiKey: 'GNSLhVGN7KNDGb9SFVEjknBWIKpB1HjX',
      inputAddress: ''
      // cordsAddress: ''
    },
    methods: {
      search(){
        axios
        .get('http://127.0.0.1:8000/api/search?title=' + this.searchInput)
        .then((result) => {
            this.apartments = result.data.response;
            this.searchInput = '';
          }
        );
      },
      autocomplete() {
        axios
          .get('http://127.0.0.1:8000/api/autocomplete?title=' + this.searchInput)
          .then((result) => {
            this.suggests = result.data.response
          });
      },
      changeSearchInput(suggest) {
        this.searchInput = suggest;
        this.search();
      },
      addRoom() {
        this.rooms++;
      },
      removeRoom() {
        if (this.rooms > 1) {
          this.rooms--;
        }
      },
      addBed() {
        this.beds++;
      },
      removeBed() {
        if (this.beds > 1) {
          this.beds--;
        }
      },
      addBathroom() {
        this.bathrooms++;
      },
      removeBathroom() {
        if (this.bathrooms > 1) {
          this.bathrooms--;
        }
      },
      addMq() {
        this.mq += 5;
      },
      removeMq() {
        if (this.mq > 5) {
          this.mq -= 5;
        }
      },
      addRadius() {
        this.radius += 5;
      },
      removeRadius() {
        if (this.radius > 5) {
          this.radius -= 5;
        }
      },
      dropdown() {
        if(this.dropdownBox == 'hidden')
        {
          this.dropdownBox = 'active';
          this.dropdownAngle = 'up';
        }
        else{
          this.dropdownBox = 'hidden';
          this.dropdownAngle = 'down';
        }
      },
      getCordsAddress(){
        tt.services.fuzzySearch({
          key: this.apiKey,
          query: this.inputAddress
        })
        .then(function(response) {
          cordsAddress =  response.results[0].position;
        });
      },
      addressFilter(){
        let distance = new tt.LngLat(cordsAddress.lng, cordsAddress.lat);
        this.arrayBounds = distance.toBounds(this.radius*1000).toArray();
      },
      checkBound(latitude, longitude) {
        let value = true;
        if (this.arrayBounds.length) {
          if (longitude <= this.arrayBounds[1][0] && longitude >= this.arrayBounds[0][0] && latitude<=this.arrayBounds[1][1] && latitude >= this.arrayBounds[0][1]) {
            value = true;
          }
          else {
            value = false;
          }
        }
        return value;
      }
    }
  });
