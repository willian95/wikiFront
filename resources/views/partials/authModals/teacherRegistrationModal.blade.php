<!-- registro modal -->
<div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="btn-cerrar">
                <button type="button" class="modalClose btn text-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="content-modal_register main-modal container">
                <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
                <div v-if="step == 1">
                    <div class="content-titulo">
                        <p class="titulo">Educator Registration - Welcome!</p>
                        <div class="info-regrister">
                       
                        
                            <p> Before registering, remember that your email address must be valid and approved by your
                                Institution & the wikiPBL Admin
                            </p>
                        </div>
                    </div>
                    <div action="">
                        <div class="row">
                            <div class="col-md-12 p14">
                                <div class="form-group">
                                    <label for="inputinstitutioe"></label>
                                    <select id="inputinstitutio" class="form-control" v-model="selected_institution" :disabled="institution_not_registered">
                                        <option value="">Choose your institution </option>
                                        <option :value="institution" v-for="institution in institutions" v-cloak>@{{ institution.name }}</option>
                                    </select>

                                </div>
                                <div class="">
                                    <!---check--->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck" v-model="institution_not_registered" @click="checkInstitution()">
                                            <label class="form-check-label" for="gridCheck">
                                                My institution is not registered/listed
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 center-flex mt-13 mb-4">
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
                      
                            <p class="m-0 ml-2">@{{ selected_institution.name }} </p>

                        </div>
                    </div>
                    <div action="">
                        <div class="row">
                            <div class="col-md-12 pl-90">
                                <div class="row" v-if="institution_not_registered">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" >Institution name</label>
                                            <input type="text" class="form-control" placeholder="Institution name" v-model="institution_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Contact email</label>
                                            <input type="text" class="form-control" placeholder="Contact email" v-model="institution_contact_email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Webpage</label>
                                            <input type="text" class="form-control" placeholder="Webpage" v-model="institution_website">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" placeholder="Name" v-model="name">
                                            <small style="color:red" v-if="errors.hasOwnProperty('name')" v-cloak>@{{ errors['name'][0] }}</small>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="">Last name </label>
                                            <input type="text" class="form-control" placeholder="Last name " v-model="lastname">
                                            <small style="color:red" v-if="errors.hasOwnProperty('lastname')" v-cloak>@{{ errors['lastname'][0] }}</small>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Institutional Email</label>
                                            <input type="text" class="form-control" placeholder="Institutional Email" v-model="institution_email">
                                            <small style="color:red" v-if="errors.hasOwnProperty('institution_email')" v-cloak>@{{ errors['institution_email'][0] }}</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Personal Email</label>
                                            <input type="text" class="form-control" placeholder="Personal Email" v-model="email">
                                            <small style="color:red" v-if="errors.hasOwnProperty('email')" v-cloak>@{{ errors['email'][0] }}</small>
                                        </div>

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" class="form-control" placeholder="Password" v-model="password">
                                            <small style="color:red" v-if="errors.hasOwnProperty('password')" v-cloak>@{{ errors['password'][0] }}</small>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Repeat Password</label>
                                            <input type="password" class="form-control" placeholder="Repeat Password" v-model="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 center-flex mb-4 mt-4">
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