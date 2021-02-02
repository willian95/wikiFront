<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">


            <div class="modal-body">
                <div class="text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="content-titulo mb-3">
                        <p class="titulo m-0">Login - Welcome!</p>
                    </div>
                    <div class="text-center d-flex align-content-center justify-content-center">
                        <div class="info-regrister">
                            <img src="{{ url('assets/img/iconos/login.svg') }}" alt="">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium quos

                            </p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group">
                        <!--- <label for="email">Email</label>-->
                        <input type="text" class="form-control" v-model="login_email" placeholder="Email"
                            autocomplete="off">
                        <small style="color:red"
                            v-if="errors.hasOwnProperty('login_email')">@{{ errors['login_email'][0] }}</small>
                    </div>

                    <div class="form-group">
                        <!--- <label for="email">Password</label>-->
                        <input type="password" class="form-control" v-model="login_password" placeholder="Password">
                        <small style="color:red"
                            v-if="errors.hasOwnProperty('login_password')">@{{ errors['login_password'][0] }}</small>
                    </div>

                    <div class="text-lg-right mr-2">
                        <button class="btn btn-custom" @click="login()">Login</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
