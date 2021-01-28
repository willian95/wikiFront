<div class="modal fade login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" v-model="login_email">
                    <small style="color:red" v-if="errors.hasOwnProperty('login_email')">@{{ errors['login_email'][0] }}</small>
                </div>

                <div class="form-group">
                    <label for="email">Password</label>
                    <input type="password" class="form-control" v-model="login_password">
                    <small style="color:red" v-if="errors.hasOwnProperty('login_password')">@{{ errors['login_password'][0] }}</small>
                </div>

                <button class="btn btn-success" @click="login()">Login</button>

            </div>
        </div>
    </div>
</div>