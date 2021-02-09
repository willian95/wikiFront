<div class="modal fade forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">


            <div class="modal-body">
                <div class="text-center">
                    <button type="button" class="modalClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="content-titulo mb-3">
                        <p class="titulo m-0">Forgot password!</p>
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
                        <input type="text" class="form-control" v-model="forgotPasswordEmail" placeholder="Email" autocomplete="off">
                        <small style="color:red" v-if="forgotPasswordErrors.hasOwnProperty('email')">@{{ forgotPasswordErrors['email'][0] }}</small>
                    </div>

                    <div class="text-lg-right mr-2">
                        <button class="btn btn-custom" @click="restorePassword()">Restore password</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
