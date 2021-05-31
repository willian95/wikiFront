<div class="modal fade forgotPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">


            <div class="modal-body">
                <div class="text-center">
                    <div class="btn-cerrar">
                    <button type="button" class="modalClose btn text-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
               
                    <div class="content-titulo mb-3">
                        <p class="titulo m-0">Forgot password!</p>
                    </div>
                    <div class="text-center d-flex align-content-center justify-content-center">
                        <div class="info-regrister">
                      
                            <!---<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium quos

                            </p>--->
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="form-group">
                       <label for="email">Email</label>
                        <input type="text" class="form-control" v-model="forgotPasswordEmail" placeholder="Email" autocomplete="off">
                        <small style="color:red" v-if="forgotPasswordErrors.hasOwnProperty('email')" v-cloak>@{{ forgotPasswordErrors['email'][0] }}</small>
                    </div>

                    <div class="text-center mr-2">
                        <button class="btn btn-custom" @click="restorePassword()">Restore password</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
