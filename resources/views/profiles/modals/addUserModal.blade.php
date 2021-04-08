<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control" v-model="userName">
                                <small style="color:red" v-if="errors.hasOwnProperty('admin_institution_name')" v-cloak>@{{ errors['admin_institution_name'][0] }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Lastname</label>
                                <input type="text" class="form-control" v-model="userLastname">
                                <small style="color:red" v-if="errors.hasOwnProperty('admin_institution_lastname')" v-cloak>@{{ errors['admin_institution_lastname'][0] }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Phone</label>
                                <input type="tel" class="form-control" v-model="userPhone" @keypress="isNumber($event)">
                                <small style="color:red" v-if="errors.hasOwnProperty('admin_institution_phone')" v-cloak>@{{ errors['admin_institution_phone'][0] }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Email</label>
                                <input type="email" class="form-control" v-model="userEmail">
                                <small style="color:red" v-if="errors.hasOwnProperty('admin_institution_email')" v-cloak>@{{ errors['admin_institution_email'][0] }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control" v-model="userPassword">
                                <small style="color:red" v-if="errors.hasOwnProperty('admin_institution_password')" v-cloak>@{{ errors['admin_institution_password'][0] }}</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Password confirmation</label>
                                <input type="password" class="form-control" v-model="userPasswordConfirmation">
                            </div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modalClose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="addUser()">Register</button>
            </div>
        </div>
    </div>
</div>