<div class="modal fade" id="institutionProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="form-group" v-if="modalField == 'whichNetwork'">
                    <label >PBL Network</label>
                    <input type="text" class="form-control" v-model="whichNetwork">
                </div>

                <div class="form-group" v-show="modalField == 'lowestAge'">
                    <label >Lowest Age</label>
                    <select  class="form-control" v-model="lowestAge">
                        <option v-for="age in 100" :value="age" v-cloak>@{{ age }}</option>
                    </select>
                </div>

                <div class="form-group" v-show="modalField == 'highestAge'">
                    <label >Highest Age</label>
                    <select  class="form-control" v-model="highestAge">
                        <option v-for="age in 100" :value="age" v-cloak>@{{ age }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'genderType'">
                    <label >Type</label>
                    <select  class="form-control" v-model="genderType">
                        <option value="mixed">Mixed</option>
                        <option value="boys">Boys</option>
                        <option value="girls">Girls</option>
                    </select>
                </div>

                <div class="form-group" v-if="modalField == 'privateOrPublicInstitution'">
                    <label >Type</label>
                    <select class="form-control" v-model="privateOrPublicInstitution">
                        <option value="private">Private </option>
                        <option value="public">Public</option>
                    </select>
                </div>

                

                <div class="form-group" v-if="modalField == 'studentsEnrolled'">
                    <label for=""># of students enrolled:</label>
                    <select id="" class="form-control" v-model="studentsEnrolled">
                        <option value="0-100">0 - 100</option>
                        <option value="100-500">100- 500</option>
                        <option value="500-1000">500 - 1000</option>
                        <option value="1500-2000">1500 - 2000</option>
                        <option value="2000-more">2000 - more than 2000</option>
                    </select>
                </div>
                <div class="form-group" v-if="modalField == 'facultyMembers'">
                    <label for=""># of faculty members:</label>
                    <select id="" class="form-control" v-model="facultyMembers">
                        <option value="0-50">0-50</option>
                        <option value="50-100">50-100</option>
                        <option value="100-250">100-250</option>
                        <option value="250-more">250-more than 250</option>
                    </select>
                </div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
            </div>
        </div>
    </div>
</div>