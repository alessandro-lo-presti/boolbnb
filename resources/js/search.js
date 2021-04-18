var search = new Vue(
  {
    el: '#search',
    data: {
      apartments: [],
      searchInput: ''
    },
    methods: {
      search(){
        axios
        .get('http://127.0.0.1:8000/api/search?title=' + this.searchInput)
        .then((result) => {
            this.apartments = result.data.response;
          }
        );
      }
    }
  });
