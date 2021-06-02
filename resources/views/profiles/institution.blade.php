@extends("layouts.main")

@section("content")

    <div class="container" id="institutionProfile">

        <!----<div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>--->
        <div class="elipse loader-cover-custom" v-if="loading == true">
        <img src="{{ url('assets/img/logo.png') }}" alt="">
    </div>

        @include("profiles.modals.institutionProfileModal")
        @include("profiles.modals.addUserModal")

        <div class="main-profile">
            <div class="main-profile_content">
                <h1 class="text-center mt-4">Institution profile</h1>
            </div>

            <div class="row main-dates">
                <div class="col-md-4">
                    <p>Registered Educators:</p>
                    <span v-cloak>@{{ registeredEducatorsCount }}</span>

                </div>
                <div class="col-md-4">
                    <p>wikiPBL Pages (public):</p>
                    <span v-cloak>@{{ publicPBLCounts }}</span>
                </div>
                <div class="col-md-4">
                    <p> Private wikiPBL Pages:</p>
                    <span v-cloak>@{{ privatePBLCounts }}</span>
                </div>
            </div>

            <div class="main-profile_dates">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p v-cloak><strong> Name:</strong>@{{ institutionName }} </p>
                            <p v-cloak><strong>Member since:</strong> @{{ memberSince }}</p>
                            <p v-cloak><strong> Country:</strong> @{{ country }}</p>
                            <p v-cloak><strong>City:</strong> @{{ state }}</p>
                            <p v-cloak><strong>Lowest Age:</strong>@{{ lowestAge }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('lowestAge')"></i></p>
                            <p v-cloak><strong>Highest Age:</strong>@{{ highestAge }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('highestAge')"></i></p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> Type:</strong> @{{ genderType }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('genderType')"></i></p>
                            <p v-cloak><strong>Type:</strong>@{{ privateOrPublicInstitution }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('privateOrPublicInstitution')"></i></p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong>PBL Network:</strong> @{{ whichNetwork }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('whichNetwork')"></i></p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> # students enrolled:</strong>@{{ studentsEnrolled }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('studentsEnrolled')"></i></p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> # faculty members:</strong>@{{ facultyMembers }} <i class="fa fa-edit" data-toggle="modal" data-target="#institutionProfileModal" @click="setModalField('facultyMembers')"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if(\Auth::check())
                            <p class="text-right">
                                <button class="btn btn-danger nav-item" @click="showDeleteConfirmation()">
                                    <i class="fa fa-trash"></i>
                                    <span class="tooltip-nav">Delete account</span>
                                </button>
                            </p>
                        @endif
                        <div v-for="user in users">
                            <h3> Created by</h3>
                            <p v-cloak><strong> Name:</strong>@{{ user.name }} @{{ user.lastname }}</p>
                            <p v-cloak><strong> Email:</strong>@{{ user.email }}</p>

                        </div>
                        
                        <p>
                            <button class="btn btn-custom" v-if="users.length == 1" data-toggle="modal" data-target="#addUserModal">Add second user</button>
                        </p>

                        <button class="btn btn-custom" @click="update()">Update profile!</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push("script")

    <script>

        const institutionProfile = new Vue({
            el: '#institutionProfile',
            data() {
                return{

                    registeredEducatorsCount:0,
                    publicPBLCounts:0,
                    privatePBLCounts:0,
                    loading:false,
                    type:"{{ \Auth::user()->institution->type }}",
                    institutionName:"{{ \Auth::user()->institution->name }}",
                    memberSince:"{{ \Auth::user()->institution->created_at->format('m/d/Y') }}",
                    country:"{{ \Auth::user()->institution->country ? strip_tags(\Auth::user()->institution->country->name) : '' }}",
                    state:"{{ \Auth::user()->institution->state ? strip_tags(\Auth::user()->institution->state->name) : '' }}",
                    lowestAge:"{{ \Auth::user()->institution->lowest_age }}",
                    highestAge:"{{ \Auth::user()->institution->highest_age }}",
                    genderType:"{{ \Auth::user()->institution->gender_institution_type }}",
                    privateOrPublicInstitution:"{{ \Auth::user()->institution->institution_public_or_private }}",
                    studentsEnrolled:"{{ \Auth::user()->institution->students_enrolled }}",
                    facultyMembers:"{{ \Auth::user()->institution->faculty_members }}",
                    whichNetwork:"{{ strip_tags(\Auth::user()->institution->which_network) }}",
                    modalField:"",
                    userName:"",
                    userLastname:"",
                    userPassword:"",
                    userPasswordConfirmation:"",
                    userPhone:"",
                    userEmail:"",
                    users:[],
                    errors:[]

                }
            },
            methods:{

                getUsers(){

                    axios.get("{{ url('/institution/get-users') }}").then(res => {

                        this.users = res.data.users

                    })

                },
                getTeachers(){

                    axios.get("{{ url('/institution/get-teachers') }}").then(res => {
                        this.registeredEducatorsCount = res.data.teachers
                    })

                },
                setModalField(field){
                    this.modalField = field
                },
                addUser(){

                    this.loading = true

                    let formData = new FormData;
                    formData.append("admin_institution_name", this.userName)
                    formData.append("admin_institution_lastname", this.userLastname)
                    formData.append("admin_institution_email", this.userEmail)
                    formData.append("admin_institution_phone", this.userPhone)
                    formData.append("admin_institution_password", this.userPassword)
                    formData.append("admin_institution_password_confirmation", this.userPasswordConfirmation)

                    axios.post("{{ url('/institution/profile/add-user') }}", formData).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {



                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                                this.getUsers()

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                },
                update(){

                    this.loading = true

                    let formData = new FormData
                    formData.append("lowest_age", this.lowestAge)
                    formData.append("highest_age", this.highestAge) 
                    formData.append("gender_institution_type", this.genderType) 
                    formData.append("institution_public_or_private", this.privateOrPublicInstitution)
                    formData.append("students_enrolled", this.studentsEnrolled)
                    formData.append("faculty_members", this.facultyMembers)
                    formData.append("which_network", this.whichNetwork)

                    axios.post("{{ url('/institution/profile/update') }}", formData).then(res => {

                        this.loading = false

                        if(res.data.success == true){
                            swal({
                                text:res.data.msg,
                                icon:"success"
                            })
                        }else{
                            swal({
                                text:res.data.msg,
                                icon:"error"
                            })
                        }

                    }).catch(err => {

                        swal({
                            text: "Something went wrong",
                            icon: "error"
                        });


                        this.loading = false
             
                    })

                },
                isNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
                        evt.preventDefault();;
                    } else {
                        return true;
                    }
                },
                showDeleteConfirmation(){

                    swal({
                        icon: "warning",
                        title: "Are you sure?",
                        text: "You will delete your profile! ",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            this.loading = true

                            axios.post("{{ url('delete-profile') }}").then(res => {
                                this.loading = false
                                if (res.data.success == true) {
                                    swal({
                                        text: res.data.msg,
                                        icon: "success"
                                    }).then(() => {
                                        window.location.href = "{{ url('/') }}"
                                    })
                                } else {
                                    swal({
                                        text: res.data.msg,
                                        icon: "error"
                                    })
                                }
                            }).catch(err => {
                                this.loading = false
                                swal({
                                    text: "Something went wrong",
                                    icon: "error"
                                })
                            })

                        }
                    })

                }

            },
            mounted(){

                this.getUsers()
                this.getTeachers()

            }

        })

    </script>

@endpush
    
