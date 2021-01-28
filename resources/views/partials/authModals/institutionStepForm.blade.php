<div class="modal fade stepFormModal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form id="regForm">

                    <!-- One "tab" for each step in the form: -->
                    <div class="tab" v-if="step == 1">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back {{ \Auth::user()->name }}! <span>Step 1/2</span></p>
                            <div class="info-regrister">
                                <img src="{{ url('assets/img/iconos/like.svg') }}" alt="">
                                <p>The institution: {{ \Auth::user()->institution->name }} was
                                    approved! Thanks for your time, please fill ' out the following info and your
                                    good
                                    to go!

                                </p>
                            </div>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select">
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Country </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Lowest Age </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Type </option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>City</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputinstitutioe"></label>
                                <select id="inputinstitutio" class="form-control">
                                    <option selected>Highest Age</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                        <!-----------------------selct--------------------------------->
                    </div>
                    <!----------------STEP 2-------------------->
                    <div class="tab" v-if="step == 2">
                        <div class="content-titulo">
                            <p class="titulo"> Welcome back John! <span>Step 2/2</span></p>
                        </div>
                        <!-----------------------selct--------------------------------->
                        <div class="contenido-select contenido-select-2">
                            <div class="form-group">
                                <label for="">Are you part of a network of institutions?</label>
                                <select id="" class="form-control">
                                    <option selected>Yes </option>
                                    <option>No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type-of-Institution">Type of Institution?</label>
                                <select id="type-of-Institution" class="form-control">
                                    <option selected>Private </option>
                                    <option>Public</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""># of students enrolled:</label>
                                <select id="" class="form-control">
                                    <option selected>Type </option>
                                    <option>0 - 100</option>
                                    <option>100- 500</option>
                                    <option>1000 - 15000</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""># of faculty members:</label>
                                <select id="" class="form-control">
                                    <option selected>City</option>
                                    <option>0-50</option>
                                    <option>50-100</option>
                                </select>
                            </div>

                        </div>
                        <!-----------------------selct--------------------------------->


                    </div>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button class="btn btn-custom" type="button"
                                @click="previous()">Previous</button>
                            <button class="btn btn-custom" type="button"
                                @click="next()">Continue</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>