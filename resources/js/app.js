require('./bootstrap');

// Vue.component(
//     'example-component',
//     require('./components/ExampleComponent.vue').default
// );

// sezione home Emanuele
var app = new Vue({
    el: '#home',
    data: {
        esempio: ['ciao', 'sono', 'emanuele'],
        message: 'prova funzionamento'
        
    }
})
