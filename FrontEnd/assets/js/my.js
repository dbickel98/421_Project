new Vue({
    el: '#app',
    data() {
        return {
            msg: 'Howdy!',
            ratings: '',
            caption: '',
            status: ''
        }
    },

    mounted() {        
    },
    methods: {
        submitReview () {
            console.log("working here")
            // axios
            //     .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => (this.message = response.data.chartName))
            
            axios
                .post('http://localhost:5500/api/review', {rating: this.ratings, caption: this.caption})
                .then(response => (
                    this.msg = response.data.status,
                    (this.msg == 'success') ? this.status = 'Received! Thanks.' : 'Ooops!'                                     
                    )                    
                )             
                // .then(() => ((this.msg == 'success')?this.status = 'Submitted! Thanks.':''))
                // .then(
                //     (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : '',
                //     console.log('then ...')
                // )
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})