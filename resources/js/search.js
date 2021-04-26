var search = new Vue(
  {
    el: '#advanced-search',
    data: {
      apartments: [],
      searchInput: '',
      suggests: [],
      baseUrl: '',
      // baseUrl: '/marzo/progetto-boolbnb/public,'
      rooms: 1,
      beds: 1,
      bathrooms: 1,
      mq: 40,
      radius: 20,
      dropdownBox: 'hidden',
      dropdownAngle: 'down'
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
        if (this.mq > 1) {
          this.mq -= 5;
        }
      },
      addRadius() {
        this.radius += 5;
      },
      removeRadius() {
        if (this.radius > 1) {
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
      }
    }
  });
