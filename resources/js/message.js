var app = new Vue({
    el: '#message',
    data: {
        ciao: 99
    },
    methods:{
        valore(){
            console.log(this.ciao);
            
            // location.href = "https://www.w3schools.com"
        }
    }

});