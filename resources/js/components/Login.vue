<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
            Login
            </div>
            <div class="card-body">
                <div class="col-md-6 offset-md-3">
                   <form v-on:submit.prevent="onSubmit">
                       <div class="alert alert-danger" role="alert" v-if="errors.length">
                        <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                        </div>

                        <div class="form-group">
                           <label for="email">Email</label>
                            <input name="email" type="text" placeholder="Enter the Email..." class="form-control" v-model="email"> 
                       </div>

                       <div class="form-group">
                           <label for="">Password</label>
                            <input name="password" type="password" placeholder="Enter the Password..." class="form-control" v-model="password"> 
                       </div>

                        <button class="btn btn-success">Login</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'register',
    props: ['app'],
    data() {
        return {
            email: '',
            password: '',
            errors: {},
        }
    },
    methods: {
        onSubmit() {

            if(!this.errors.length)
            {
                const data = {
                    email:this.email,
                    password:this.password
                }
                this.app.req.post('/auth/login',data)
                .then(response => {
                    this.app.user=response.data;
                    this.$router.push('/');
                }).catch(error => {
                this.errors=error.response.data.errors;
                });
            }
            
        }
    }
}
</script>