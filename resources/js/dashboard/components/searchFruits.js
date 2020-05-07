 export default {
  data(){
   return {
    query: '',
    results: []
   }
  },
  methods: {
   autoComplete(){
    this.results = [];
    if(this.query.length > 2){
     axios.get('/api/fruits',{params: {query: this.query}}).then(response => {
      this.results = response.data;
     });
    }
   }
  }
 }