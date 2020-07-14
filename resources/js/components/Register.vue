<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
            Register
            </div>
            <div class="card-body">
                <div class="col-md-6 offset-md-3">
                   <form v-on:submit.prevent="onSubmit">
                       <div class="alert alert-danger" role="alert" v-if="errors.length">
                        <li v-for="(error,index) in errors" :key="index">{{error}}</li>
                        </div>
                       <div class="form-group">
                           <label for="name">Name</label>
                            <input name="name" type="text" placeholder="Enter the name..." class="form-control" v-model="name"> 
                       </div>

                        <div class="form-group">
                           <label for="email">Email</label>
                            <input name="email" type="text" placeholder="Enter the Email..." class="form-control" v-model="email"> 
                       </div>

                       <div class="form-group">
                           <label for="">Password</label>
                            <input name="password" type="password" placeholder="Enter the Password..." class="form-control" v-model="password"> 
                       </div>

                        <div class="form-group">
                           <label for="">Confirm Password</label>
                            <input name="passwordAgain" type="password" placeholder="Password Again..." class="form-control" v-model="passwordAgain"> 
                       </div>

                        <button class="btn btn-success">Register</button>
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
            name: '',
            email: '',
            password: '',
            passwordAgain: '',
            errors: [],
        }
    },
    methods: {
        onSubmit() {

            if(!this.name) {
                this.errors.push('this name is required')
            }
            if(!this.email) {
                this.errors.push('this email is required')
            }
            if(!this.password) {
                this.errors.push('this password is required')
            }
            if(!this.passwordAgain) {
                this.errors.push('this password is required')
            }
            if(this.password !== this.passwordAgain) {
                this.errors.push('password not match')
            }
            if(!this.errors.length)
            {
                const data = {
                    name:this.name,
                    email:this.email,
                    password:this.password
                }
                this.app.req.post('auth/register',data)
                .then(response => {
                    this.app.user=response.data;
                    this.$router.push('/');
                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }
        }
    }
}
</script>