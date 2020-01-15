<template>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar Session</p>

            <form @submit.prevent = "login">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" v-model="email" placeholder="Correo">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" v-model="password" placeholder="Contrasena">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Recordar Contrasena
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <p class="mb-1">
                <a href="forgot-password.html">Recordar Password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</template>

<script>
import Axios from 'axios'

export default {
    data() {
        return {
            email: "",
            password: ""
        }        
    },
    methods: {
        login: function(){
            axios.post("/login", {email: this.email, password: this.password})
                .then(res => {
                    console.log(res.data)
                })
                .catch(e => {

                })

            // console.log(this.email)
        }
    }
}
</script>
