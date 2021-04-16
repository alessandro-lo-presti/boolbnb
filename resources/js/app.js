require('./bootstrap');

// Vue.component(
//     'example-component',
//     require('./components/ExampleComponent.vue').default
// );

// sezione home Emanuele
var app = new Vue({
    el: '#home',
    data: {
        destinations: [

            {
                cover: 'https://a0.muscache.com/im/pictures/e8d3d6de-40b1-4341-89f2-afb2a1a4f71f.jpg?im_q=medq&im_w=240',
                city: 'Milano',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/90dcb9c8-2e6a-4ce3-9acb-86d90d335314.jpg?im_q=medq&im_w=240',
                city: 'Bologna',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/3849e3f1-d275-43fb-8957-4c90f26e14db.jpg?im_q=medq&im_w=240',
                city: 'Napoli',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/0445ba36-5684-4cca-9cb1-418a0ffdcd2f.jpg?im_q=medq&im_w=240',
                city: 'Palermo',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/ce6c498b-b069-401d-84c8-412bb4a4601e.jpg?im_q=medq&im_w=240',
                city: 'Verona',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/7d80bee1-a510-4950-a1a0-07a4fb25ec2e.jpg?im_q=medq&im_w=240',
                city: 'Catania',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/847cfb7f-788d-42dc-9148-f375348dde76.jpg?im_q=medq&im_w=240',
                city: 'Venezia',
                description: 'ciao2'
            },
            {
                cover: 'https://a0.muscache.com/im/pictures/82293cc1-ba0b-4167-85a6-ed133d478c20.jpg?im_q=medq&im_w=240',
                city: 'Roma',
                description: 'ciao2'
            }

        ],
        
        
    },
    methods: {

    }
})
