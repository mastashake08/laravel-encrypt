<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Send Encrypted Message</div>

                    <div class="card-body">
                        <div class="form-group">
                          <input type="email" placeholder="Enter email address" class="form-control" v-model="message.email">
                        </div>
                        <div class="form-group">
                          <input type="password" placeholder="Enter passphrase" class="form-control" v-model="message.password">
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" placeholder="Enter Message" v-model="message.content"></textarea>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-sm btn-primary" v-on:click="send()">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
          return {
            message: {}
          }
        },
        methods: {
          send: function(){
            axios.post('/api/message',this.message).then(data =>{
              console.log(data);
              alert('Message Sent!');
            }).catch(err => {
              console.log(err);
            })
          }
        }
    }
</script>
