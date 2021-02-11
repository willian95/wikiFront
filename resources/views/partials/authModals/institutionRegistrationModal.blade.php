<div class="modal fade bd-example-modal-lg institution-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
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
                               <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="92px" height="92px" viewBox="0 0 92 92" xml:space="preserve"><path id="XMLID_1253_" d="M46 57.1c14.8 0 26.9-12.1 26.9-27C72.9 15.1 60.8 3 46 3S19.1 15.1 19.1 30c0 15 12.1 27.1 26.9 27.1zM46 11c10.4 0 18.9 8.5 18.9 19S56.4 49 46 49s-18.9-8.5-18.9-19S35.6 11 46 11zm12.5 48.7c-1.3-.4-2.8-.1-3.8.8L46 67.9l-8.7-7.4c-1.1-.9-2.5-1.2-3.8-.8C27.9 61.5 0 71.1 0 85c0 2.2 1.8 4 4 4h84c2.2 0 4-1.8 4-4 0-13.9-27.9-23.5-33.5-25.3zM10.1 81c4.4-4.7 15-9.9 23.8-12.9l9.5 8.1c1.5 1.3 3.7 1.3 5.2 0l9.5-8.1c8.8 3.1 19.4 8.3 23.8 12.9H10.1z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="user" dc:description="user" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Amit Jakhu</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
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
                    <div class="col-md-12 p50">
                        <div class="info-regrister   info-regrister--inst">
                            <img src="{{ url('assets/img/iconos/university.svg') }}" alt="">
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