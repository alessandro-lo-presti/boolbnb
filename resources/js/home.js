// require('./bootstrap');

// Vue.component(
//     'example-component',
//     require('./components/ExampleComponent.vue').default
// );

// sezione home Emanuele
var app = new Vue({
    el: '#home',
    data: {
        nextCounter: 1,
        searchInput: '',
        host: 'http://localhost:8000',
        // host: 'http://localhost:8080/marzo/progetto-boolbnb/public',
        baseUrl: '',
        // baseUrl: '/marzo/progetto-boolbnb/public',
        counter: 0,
        pippo: 0,
        apartments: [],
        sponsored: [],
        suggests: [],
        searchInput: '',
        experiences: [
            {
                cover: 'https://a0.muscache.com/im/pictures/a6b08861-feb8-4a01-a76d-b33d2867b441.jpg?im_w=480',
                title: 'esperienze online',
                type: 'attività interattive dal vivo gestite dagli host'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/ad109d56-2421-40cd-98e6-e114160dc85b.jpg?im_w=480',
                title: 'esperienze',
                type: 'Attività locali a cui partecipare ovunque ti trovi'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/b9adfc39-6e2a-4e5f-b6f3-681b306fae5c.jpg?im_w=480',
                title: 'avventure',
                type: 'gite di più giorni con vitto e alloggio'
            }
        ]

    },
    methods:{
        search() {
            axios
                .get('http://127.0.0.1:8000/api/homesearch?title=' + this.searchInput)
                .then((result) => {
                    this.apartments = result.data.response;
                    this.searchInput = '';
                }
                );
        },
        changeSearchInput(suggest) {
            this.searchInput = suggest;
            this.search();
        },
        autocomplete() {
            axios
                .get('http://127.0.0.1:8000/api/autocomplete?title=' + this.searchInput)
                .then((result) => {
                    this.suggests = result.data.response
                });
        },
    },
    
    mounted(){

      axios
      .get('http://127.0.0.1:8000/api/sponsored')
      .then((result)=> {
        this.sponsored = result.data.response;
      });

    }

})
