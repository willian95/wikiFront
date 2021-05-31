<div class="modal fade stepFormModal" data-backdrop="static" data-keyboard="false" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form id="regForm">
                    <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab" v-if="stepForm == 1">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back {{ \Auth::user()->name }}! <span>Step 1/2</span></p>
                            <div class="info-regrister mt-4">
                         
                                <p>The institution: {{ \Auth::user()->institution->name }} was
                                    approved! Thanks for your time, please fill out the following info and your are good to go!
                                </p>
                            </div>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select contenido-select-step">
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control" v-model="selectedCountry" @change="fetchStates()">
                                    <option value="" selected>Country </option>
                                    <option :value="country.id" v-for="country in countries" v-cloak>@{{ country.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control" v-model="selectedState">
                                    <option selected value="">City</option>
                                    <option :value="state.id" v-for="state in states" v-cloak>@{{ state.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control" v-model="lowest_age">
                                    <option selected value="">Lowest Age </option>
                                    <option v-for="age in 100" :value="age" v-cloak>@{{ age }}</option>
                                </select>
                            </div>
                            
                         
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control" v-model="highest_age">
                                    <option selected value="">Highest Age</option>
                                    <option v-for="age in 100" :value="age" v-cloak>@{{ age }}</option>
                                </select>
                            </div>

                            <div class="form-group" v-if="institution_type == 'school' || institution_type == 'university'">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control" v-model="gender_institution_type">
                                    <option selected value="">Type </option>
                                    <option value="mixed">Mixed</option>
                                    <option value="boys">Boys</option>
                                    <option value="girls">Girls</option>
                                </select>
                            </div>
                        </div>

                        <div style="overflow:auto;" class="mt-4 text-center">
                            <div >
                                <button class="btn btn-custom" type="button"
                                    @click="next('institution')">Continue</button>
                            </div>
                        </div>

                        <!-----------------------selct--------------------------------->
                    </div>
                    <!----------------STEP 2-------------------->
                    <div class="tab" v-if="stepForm == 2">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back {{ \Auth::user()->name }}! <span>Step 2/2</span></p>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select contenido-select-2" style="padding: 0 35px;">
                            <div class="form-group" v-if="institution_type == 'school' || institution_type == 'university'">
                                <label for="">Are you part of a network of institutions?</label>
                                <select class="form-control mb-3" v-model="part_of_network_institution">
                                    <option value="true">Yes </option>
                                    <option value="false">No</option>
                                </select>
                                <input type="text" class="form-control " v-if="part_of_network_institution == 'true'" placeholder="Which one?" v-model="which_network">
                            </div>

                            <div class="form-group">
                                <label for="type-of-Institution">Type of Institution?</label>
                                <select id="type-of-Institution" class="form-control" v-model="institution_public_or_private">
                                    <option value="private">Private </option>
                                    <option value="public">Public</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="institution_type == 'school' || institution_type == 'university'">
                                <label for=""># of students enrolled:</label>
                                <select id="" class="form-control" v-model="students_enrolled">
                                    <option value="0-100">0 - 100</option>
                                    <option value="100-500">100- 500</option>
                                    <option value="500-1000">500 - 1000</option>
                                    <option value="1500-2000">1500 - 2000</option>
                                    <option value="2000-more">2000 - more than 2000</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="institution_type == 'school' || institution_type == 'university'">
                                <label for=""># of faculty members:</label>
                                <select id="" class="form-control" v-model="faculty_members">
                                    <option value="0-50">0-50</option>
                                    <option value="50-100">50-100</option>
                                    <option value="100-250">100-250</option>
                                    <option value="250-more">250-more than 250</option>
                                </select>
                            </div>

                        </div>
                        <!-----------------------selct--------------------------------->
                        <div style="overflow:auto;">
                            <div class="text-center mt-4">
                                <button class="btn btn-custom" type="button"
                                    @click="previous('institution')">Previous</button>
                                <button class="btn btn-custom" type="button"
                                    @click="institutionFirstUpdate()">Finish</button>
                            </div>
                        </div>

                    </div>
                    
                </form>
            </div>

        </div>
    </div>
</div>