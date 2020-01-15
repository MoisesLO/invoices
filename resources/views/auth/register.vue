<template>
    <div class="card">
        <div class="card-body register-card-body">
            <form @submit.prevent="registrar" method="post">

                <p class="login-box-msg">Datos de la empresa</p>

                <!-- Errores -->
<!--                <div class="alert alert-danger alert-dismissible" v-if="errores.length > 2">-->
<!--                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
<!--                    <h5><i class="icon fas fa-ban"></i> Error!</h5>-->
<!--                    {{errores}}-->
<!--                </div>-->

                <!-- Ruc -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="RUC" v-model="register.ruc">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- Razon Social-->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Razon Social" v-model="register.razon">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <p class="login-box-msg">Datos del Usuario</p>

                <!-- Email -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Email" v-model="register.email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!--Password-->
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contrasenia" v-model="register.password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" :disabled="isDisabled">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <a href="register.html" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</template>

<script>
    import axios from 'axios'
    import Swal from 'sweetalert2'

    export default {
        data() {
            return {
                errores: "",
                register: {
                    ruc: "",
                    razon: "",
                    email: "",
                    password: ""
                }
            }
        },
        methods: {
            registrar: function () {
                axios.post('/registrar',
                    {
                        ruc: this.register.ruc,
                        razon_social: this.register.razon,
                        email: this.register.email,
                        password: this.register.password
                        })
                    .then(res => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registro Correcto..!',
                            text: "Logeate por favor para continuar."

                        }).then((result) => {
                            if (result.value) {
                                window.location.href = "/login";
                            }
                        });
                        console.log(res.data)
                    })
                    .catch(e => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Algunos datos que ingresastes son incorrectos',
                        });
                        this.errores = e.response.data.message;
                        // console.log(e.response.data)
                        console.log(e.response.data)
                    });
            }
        },
        computed: {
            isDisabled: function () {
                let disabled = true;
                if (    this.register.ruc.length > 0 &&
                        this.register.razon.length > 0 &&
                        this.register.email.length > 0 &&
                        this.register.password.length > 0
                ) {
                    disabled = false;
                }
                return disabled;
            }
        }
    }
</script>
