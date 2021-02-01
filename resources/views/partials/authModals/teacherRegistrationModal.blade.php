<!-- registro modal -->
<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="content-modal_register main-modal container">
                <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
                <div v-if="step == 1">
                    <div class="content-titulo">
                        <p class="titulo">Educator Registration - Welcome!</p>
                        <div class="info-regrister">
                            <img src="{{ url('assets/img/iconos/info.svg') }}" alt="">
                            <p> Before registering, remember that your email address must be valid and approved by your
                                Institution & the wikiPB Admin
                            </p>
                        </div>
                    </div>
                    <div action="">
                        <div class="row">
                            <div class="col-md-6 offset-2">
                                <div class="form-group">
                                    <label for="inputinstitutioe"></label>
                                    <select id="inputinstitutio" class="form-control" v-model="selected_institution">
                                        <option value="">Choose your institution </option>
                                        <option :value="institution" v-for="institution in institutions">@{{ institution.name }}</option>
                                    </select>
                                    
                                </div>
                                <div class="">
                                    <!---check--->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" v-model="institution_not_registered">
                                            <label class="form-check-label" for="gridCheck">
                                                My institution is not registered/listed
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 center-flex">
                                <!--bnt--->
                                <button type="button" class="btn btn-custom" @click="next()" :disabled="selected_institution == '' && institution_not_registered == false">Continue</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div v-if="step == 2">
                    <div class="content-titulo">
                        <p class="titulo">Educator Registration - Welcome!</p>
                        <div class="info-regrister info-regrister-2">
                            <img src="{{ url('assets/img/iconos/graduation-hat.svg') }}" alt="">
                            <p class="m-0 ml-2">@{{ selected_institution.name }} </p>

                        </div>
                    </div>
                    <div action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row" v-if="institution_not_registered">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Institution name" v-model="institution_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Contact email" v-model="institution_contact_email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Webpage" v-model="institution_website">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" v-model="name">
                                            <small style="color:red" v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last name " v-model="lastname">
                                            <small style="color:red" v-if="errors.hasOwnProperty('lastname')">@{{ errors['lastname'][0] }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Institutional Email" v-model="institution_email">
                                            <small style="color:red" v-if="errors.hasOwnProperty('institution_email')">@{{ errors['institution_email'][0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Personal Email" v-model="email">
                                            <small style="color:red" v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" v-model="password">
                                            <small style="color:red" v-if="errors.hasOwnProperty('password')">@{{ errors['password'][0] }}</small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Repeat Password" v-model="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 center-flex">
                                <!--bnt--->
                                <button type="button" class="btn btn-custom" :disabled="name == '' || lastname == '' || email == '' || institution_email == '' || password == '' || password_confirmation == ''" @click="teacherRegister()">Register</button>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>