var search = new Vue(
  {
    el: '#advanced-search',
    data: {
      apartments: [],
      searchInput: '',
      suggests: []
    },
    methods: {
      search(){
        axios
        .get('http://127.0.0.1:8000/api/search?title=' + this.searchInput)
        .then((result) => {
            this.apartments = result.data.response;
          }
        );
      },
      autocomplete() {
        axios
          .get('http://127.0.0.1:8000/api/autocomplete?title=' + this.searchInput)
          .then((result) => {
            this.suggests = result.data.response;
          });
      }
    }
  });
