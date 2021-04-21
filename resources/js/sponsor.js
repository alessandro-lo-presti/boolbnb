var app = new Vue ({

  el: '#sponsor',
  data:{
    test: 'ciao',
    counter: 0,
    sponsors:[
      {
        title: 'bronze',
        duration: '1',
        amount: 2.99
      },
      {
        title: 'silver',
        duration: '3',
        amount: 5.99
      },
      {
        title: 'gold',
        duration: '6',
        amount: 9.99
      }
    ]
  },
  methods:{
    enter(index){
      console.log(index);
      if (this.test == 'ciao') {
        this.test = 'null'
      } else if (this.test == 'null'){
        this.test = 'ciao'
      }
    },
    leave(index){
      console.log(index);
      if (this.test == 'ciao') {
        this.test = 'null'
      } else if (this.test == 'null') {
        this.test = 'ciao'
      }
    }
  }

});