require('./bootstrap');

// Vue.component(
//     'example-component',
//     require('./components/ExampleComponent.vue').default
// );

// sezione home Emanuele
var app = new Vue({
    el: '#home',
    data: {
        counter: 0,
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
        types: [
            {
                cover: "https://a0.muscache.com/im/pictures/7d82ca14-56e5-4465-8218-dcfa7d69b6ac.jpg?im_w=320",
                type: "case intere"
            },
            {
                cover: "https://a0.muscache.com/im/pictures/36f53e61-db8d-403c-9122-5b761c0e4264.jpg?im_w=320",
                type: "spazi unici"
            },
            {
                cover: "https://a0.muscache.com/im/pictures/7f254627-3922-4880-b8fa-545b8551117e.jpg?im_w=320",
                type: "fattorie e natura"
            },
            {
                cover: "https://a0.muscache.com/im/pictures/10a638e1-6aff-4313-8033-1275cec83987.jpg?im_w=320",
                type: "animali domestici ammessi"
            }
        ]
        
    },
    methods: {
        next(){
            console.log('prima' + this.counter);
            this.counter++;
            if (this.counter == this.types.length + 1) {
                this.counter = 0;
            }
            console.log('risultato' + this.counter);  
        },

        prev(){
            console.log('prima' + this.counter);
            this.counter--;
            if (this.counter < 0) {
                this.counter = this.types.length;
            }
            console.log('risultato' + this.counter);
            
        }

    }
})
