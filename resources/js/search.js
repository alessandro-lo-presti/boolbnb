var search = new Vue(
  {
    el: '#advanced-search',
    data: {
      apartments: [],
      searchInput: '',
      suggests: [],
      baseUrl: ''
      // baseUrl: '/marzo/progetto-boolbnb/public'
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
      }
    }
  });
