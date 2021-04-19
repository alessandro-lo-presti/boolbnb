var cards = new vue({
    el: '#charts',
    data: {
        apartments: [],
        searchInput: ''
      },
      methods: {
        search(){
          axios
          .get('http://127.0.0.1:8000/api/search?search=' + this.searchInput)
          .then((result) => {
              this.apartments = result.data.response;
              console.log(this.apartments);
            }
          );
        }
      }
    });

