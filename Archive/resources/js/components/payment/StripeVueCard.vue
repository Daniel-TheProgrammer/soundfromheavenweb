<template>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-2">
  </div>
  <form class="col-md-8">
    <div class="col-md-12 mt_50">
      <div class="row">
        <div class="col-md-4 text-center">
          <label>Name</label>
        </div>
        <div class="col-md-8">
          <input class=" cardstyle my-input">
        </div>
      </div>
    </div>
    <div class="col-md-12 mt_50">
      <div class="row">
      <div class="col-md-4 text-center">
        <label>Card</label>
      </div>
      <div class="col-md-8">
        <!-- Using the same "my-input" class on the -->
        <!-- regular input above and on this container. -->
        <div class="my-input cardstyle" id="card-element"></div>
        </div>
        
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 text-center ">
          <button class="btn btn-dark mt_50  paybutton mb_50 " @click="back()"> Back </button>
        </div>
        <div class="col-md-6 text-center cardstylemobilescreen">
          <button type="button" class="paybutton btn btn-primary mt_50 " @click="confirmpayment()">Pay</button>
        </div>
      </div>
    </div>
  </form>

    

  </div>
</div>
</template>
<script>
import { mapGetters } from 'vuex';
import Constants from '../util/Constants'
export default {
      mixins:[Constants],
      data(){
            return {
                  spk:"pk_live_51JVLPWF9VlPUGbcMMdAhRLJceHH9N0cwE6maPISXlA1LF7c1n2OGNW9TUu4g1UXghEzBiEmyzigzuSilCxR07lOU00IOc8RtbB",
                  stripe:undefined,
                  card:undefined,
                  msg: 'Pay For Vote',
                  payAmount:"150",
                  lockSubmit:false,
                  elements:null,
                  cardElement:null,
                  paymentIntent:null
            }
      },
      computed:{
        ...mapGetters([
          'intent',
        ]),
      },
      methods:{
            back(){
                  this.$store.commit('assignviewno',1)
            },
            confirmpayment(){
              let self = this
              let localelements = this.elements
              this.stripe.confirmCardPayment(self.intent, {
                  payment_method: {
                    card: self.cardElement,
                    billing_details: {
                      name: 'Sound From Heaven',
                    },
                  },
                })
              .then(function(result) {
                console.log(result);
                if (result.error) {
                // Inform the customer that there was an error.
                alert(result.error.message)
                console.log(result.error.message);
              } else {
                // Handle next step based on PaymentIntent's status.
                console.log("PaymentIntent ID: " + result.paymentIntent.id);
                console.log("PaymentIntent status: " + result.paymentIntent.status);
                var route=self.prefixinurl('voting/payment/confirm/stripe')

                let dt= {
                        amount:281.91, //stripe uses an int [with shifted decimal place] so we must convert our payment amount
                        currency:"XAF",
                        description:"Make your Vote Count",
                        token:result.paymentIntent.id
                    }
                    axios.post(route,dt)
                    .then(response => {
                      if(response.status==200){

                          alert("Your vote has been marked")
                          self.lockSubmit=false
                      }
                      else{
                        alert("Error in recording the vote. Please contact the admin with paymentid")
                          throw new Error("failed")
                      }
                  })
              }
                // Handle result.error or result.paymentIntent
              });

            },
            
      },
      mounted(){
            var self=this;
                self.stripe= Stripe(self.spk);
                let options = {
                  'client_secret': this.intent,
                  // Fully customizable with appearance API.
                  //appearance: {/*...*/},
                };

                this.elements = this.stripe.elements({'clientSecret': this.intent});


                this.cardElement = this.elements.create('card');
                console.log("Created")
                this.cardElement.mount('#card-element');
                
      }
}
</script>