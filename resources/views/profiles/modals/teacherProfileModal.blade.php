<div class="modal fade" id="teacherProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group" v-if="modalField == 'country'">
                    <label >Countries</label>
                    <select  class="form-control" v-model="country" @change="onChangeCountry()">
                        <option :value="country.id" v-for="country in countries" v-cloak>@{{ country.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'state'">
                    <label >States</label>
                    <select  class="form-control" v-model="state" @change="onChangeState()">
                        <option :value="state.id" v-for="state in states" v-cloak>@{{ state.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'cvResume'">
                    <label >CV Resume</label>
                    <input type="text" class="form-control" placeholder="https://www.mypersonalpage.com " v-model="cvResume">
                </div>

                <div class="form-group" v-if="modalField == 'portfolio'">
                    <label >Portfolio</label>
                    <input type="text" class="form-control" placeholder="https://www.myportafolio" v-model="portfolio">
                </div>

                <div class="form-group" v-if="modalField == 'institution'">
                    <label for="" v-if="!institution_not_registered">Institutions:</label>
                    <select id="" class="form-control" v-model="institution" @change="onChangeInstitution()" v-if="!institution_not_registered">
                        <option :value="institution.id" v-for="institution in institutions" v-cloak>@{{ institution.name }}</option>
                    </select>


                    <div class="row" v-if="institution_not_registered">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Institution name" v-model="admin_institution_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact email" v-model="admin_institution_email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Webpage" v-model="admin_institution_website">
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="">Institution email</label>
                        <input type="email" class="form-control" v-model="institution_email">
                    </div>

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
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" v-if="modalField == 'institution'" @click="institutionUpdate()">Update</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" v-else>Select</button>
            </div>
        </div>
    </div>
</div>