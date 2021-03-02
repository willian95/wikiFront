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
                        <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'state'">
                    <label >States</label>
                    <select  class="form-control" v-model="state" @change="onChangeState()">
                        <option :value="state.id" v-for="state in states">@{{ state.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'cvResume'">
                    <label >CVResume</label>
                    <input type="text" class="form-control" placeholder="https://www.linkedIn.com/cv/resume" v-model="cvResume">
                </div>

                <div class="form-group" v-if="modalField == 'portfolio'">
                    <label >Portfolio</label>
                    <input type="text" class="form-control" placeholder="https://www.myportafolio" v-model="portfolio">
                </div>

                <div class="form-group" v-if="modalField == 'institution'">
                    <label for="">Institutions:</label>
                    <select id="" class="form-control" v-model="institution" @change="onChangeInstitution()">
                        <option :value="institution.id" v-for="institution in institutions">@{{ institution.name }}</option>
                    </select>
                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
            </div>
        </div>
    </div>
</div>