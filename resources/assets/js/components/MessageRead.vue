<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Read Encrypted Message</div>

                    <div class="card-body">

                        <div class="form-group">
                          <input type="password" placeholder="Enter passphrase" class="form-control" v-model="password">
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" placeholder="Enter Message" v-model="msg.content"></textarea>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-sm btn-primary" v-on:click="decrypt()">Decrypt Message</button>
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
            password: '',
            msg : this.message
          }
        },
        props: ['message'],
        created(){

        },
        methods: {
          decrypt: function(){
            var that = this;
            axios.post('/api/decrypt-message/'+this.message.id,{password:this.password}).then(data =>{
              that.message.content = data.data.message;
            }).catch(err => {
              console.log(err);
            })
          }
        }
    }
</script>
