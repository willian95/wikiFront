<div class="modal fade bd-example-modal-lg institution-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="btn-cerrar">
              <button type="button" class="modalClose btn text-right" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
        <div class="content-modal_register main-modal container ">
            <div class="content-titulo mb-3">
                <p class="titulo">Institution Registration - Welcome!</p>
            </div>
            <div>

                <form>
                    <div class="row">
                        <div class="col-md-12 p50">
                            <div class="info-regrister   info-regrister--inst mb-4">
                               <p>Designated
                               Institution User</p>
                           </div>

                           <div class="form-group">
                               <label for="">Name</label>
                            <input type="text" class="form-control" placeholder="Name" v-model="admin_institution_name">
                        </div>
                        <div class="form-group">
                            <label for="">Last name</label>
                            <input type="text" class="form-control" placeholder="Last name " v-model="admin_institution_lastname">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" placeholder="Email" v-model="admin_institution_email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone number</label>
                            <input type="text" class="form-control" placeholder="Phone number" v-model="admin_institution_phone" @keypress="isNumber($event)">
                        </div>

                    </div>
                    <div class="col-md-12 p50">
                        <div class="info-regrister   info-regrister--inst">
                         
                            <p>Institution Info</p>
                        </div>
                        <div class="check-inst mb-3">

                            <label>
                                <input type="radio" class="option-input radio" value="school" v-model="institution_type" />
                                School
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" value="university" v-model="institution_type"/>
                                University
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" value="organization" v-model="institution_type"/>
                                Organization
                            </label>
                        </div>


                        <div class="form-group">
                        <label for="" >Institution name</label>         
                        <input type="text" class="form-control" placeholder="Name" v-model="institution_name">
                        </div>
                        <div class="form-group">
                            <label for="">Institution website</label>
                            <input type="text" class="form-control" placeholder="Url" v-model="institution_website">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="Password" v-model="admin_institution_password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" v-model="admin_institution_password_confirmation">
                        </div>
                    </div>

                    <div class="col-md-12 text-center mt-2 mb-4">
                        <!--bnt--->
                        <button type="button" class="btn btn-custom" @click="institutionRegister()" :disabled="admin_institution_name == '' || admin_institution_lastname == '' || admin_institution_email == '' || admin_institution_phone == '' || admin_institution_password == '' || admin_institution_password_confirmation == '' || institution_name == '' || institution_website == '' || institution_type == ''">Register</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
</div>