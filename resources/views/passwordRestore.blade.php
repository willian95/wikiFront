@extends('layouts.main')

@section('content')

    <div class="container" id="restore-dev">
        <!---<div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>--->
        <div class="elipse loader-cover-custom" v-if="loading == true">
        <img src="{{ url('assets/img/logo.png') }}" alt="">
    </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form-group">
                    <label for="">New password</label>
                    <input type="password" class="form-control" v-model="password">
                    <small style="color: red;" v-if="errors.hasOwnProperty('password')" v-cloak>@{{ errors['password'][0] }}</small>
                </div>
                <div class="form-group">
                    <label for="">Repeat password</label>
                    <input type="password" class="form-control" v-model="passwordConfirmation">
                </div>
                <p class="text-center">
                    <button class="btn btn-custom" @click="restore()">Restore</button>
                </p>
            </div>
        </div>
    </div>


@endsection

@push("script")

    <script>
        const devArea = new Vue({
            el: '#restore-dev',
            data() {
                return {
                    password:"",
                    passwordConfirmation:"",
                    errors:[],
                    loading:false
                }
            },
            methods: {

                restore(){
                    this.errors = []
                    this.loading = true
                    axios.post("{{ url('/password/change') }}", {password: this.password, password_confirmation: this.passwordConfirmation, recoveryHash: '{{ $user->recovery_hash }}'}).then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(() => {
                                window.location.href="{{ url('/') }}"
                            })
                            

                        }else{
                            this.loading = false
                            swal({
                                text:res.data.msg,
                                icon:"error"
                            })

                        }

                    })
                    .catch(err => {

                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                },


            }

        })
    </script>


@endpush