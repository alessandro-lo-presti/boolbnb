var app = new Vue ({

  el: '#sponsor',
  data:{
    test: 'null',
    counter: -1,
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
      this.counter = index;
      console.log(this.counter);
    },
    leave(index){
      this.counter = -1;
    }
  }

});