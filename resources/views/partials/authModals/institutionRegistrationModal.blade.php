<div class="modal fade bd-example-modal-lg institution-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
            <div class="content-modal_register main-modal container ">
                <div class="content-titulo mb-3">
                    <p class="titulo">Institution Registration - Welcome!</p>
                </div>
                <div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-regrister   info-regrister--inst mb-4">
                                    <img src="{{ url('assets/img/iconos/user.svg') }}" alt="">
                                    <p>Designated
                                        Institution User</p>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" v-model="admin_institution_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last name " v-model="admin_institution_lastname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="John@harvard.org" v-model="admin_institution_email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="1234567890" v-model="admin_institution_phone" @keypress="isNumber($event)">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="info-regrister   info-regrister--inst">
                                    <img src="{{ url('assets/img/iconos/university.svg') }}" alt="">
                                    <p>Institution Info</p>
                                </div>
                                <div class="check-inst">

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
                                    <input type="text" class="form-control" placeholder="Name" v-model="institution_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Url" v-model="institution_website">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" v-model="admin_institution_password">
                                </div>
                                <div class="form-group">
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