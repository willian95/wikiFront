<div id="auth">

    @php

        $showModal = false;
        if(\Auth::check()){
            if(\Auth::user()->role_id == 3){

                $isProfileComplete = App\Institution::where("id", \Auth::user()->institution_id)->first()->is_profile_complete;
    
                if($isProfileComplete == 0){
                    $showModal = true;
                }
    
            }
        }

    @endphp

    <div class="loader-cover-custom" v-if="loading == true">
        <div class="loader-custom"></div>
    </div>
    <header class="header-shadow">
        <nav class='navbar navbar-expand-md navbar-fixed-js container'>
            <div class='flex-custom'>
                <div class="nav">
                    <ul>
                        <li class="menu" id="dropMenu">
                            <div class="drop-box">
                                <a class="drop-text" href="#"><i class="hamburger-menu fa fa-bars"
                                        aria-hidden="true"></i>
                                </a>
                            </div>
                            <ul id="ul" class="nav-fixed">
                                <li>
                                    <p class="menu-titulo">MENÚ</p>
                                </li>
                                <li class="nav-box_li">
                                    <div class="blue-box"></div>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Institutions &
                                            Organizations
                                        </div>
                                        <div class="dropdown-menu down-header" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ url('/school/all') }}">Schools</a>
                                            <a class="dropdown-item" href="{{ url('/university/all') }}">Universities</a>
                                            <a class="dropdown-item" href="{{ url('/organization/all') }}">Organizations</a>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-box_li"><a href="{{ url('/subjects/all') }}">
                                        <div class="blue-box"></div>Subjects
                                    </a></li>
                                <li class="nav-box_li"><a href="{{ url('/teacher/all') }}">
                                        <div class="blue-box"></div>Educators
                                    </a></li>
                                <li class="nav-box_li"><a href="#">
                                        <div class="blue-box"></div>About wikiPBL
                                    </a></li>
                                <li class="nav-box_li"><a href="#">
                                        <div class="blue-box"></div>FAQ'S
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <a class='brand ' href='{{ url('/front-test') }}'>
                    <img alt='redes' src="{{ url('assets/img/logo.svg') }}">
                </a>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg'
                    data-toggle='offcanvas' type='button'>
                    <span class='hamburger-box'>
                        <span class='hamburger-inner'></span>
                    </span>
                </button>
                @if(\Auth::check() && \Auth::user()->id)

                <div class='offcanvas-collapse fil' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <!-- Iconos temlate option-->
                                    <div class="header-icons">
                                        
                                        
                                        <li class="nav-item  flex-main mr-0">
                                        
                                            <img alt='icon' class="login_icon" src="{{ url('assets/img/iconos/add-file.svg') }}">
                                            <a class='nav-link  ' href="{{ url('/project/choose-template') }}">New wikiPBL</a>
                                        </li>
                                        

                                          
                                    </div>
                                    <!-- Iconos temlate option-->
                                    <li class='nav-item  flex-main'>
                                        <img alt='icon' class="teacher-icon "
                                            src="{{ url('assets/img/iconos/user-teacher.png') }}">
                                        <a @if(\Auth::user()->role_id == 2) href="{{ url('/teacher/profile') }}" @else href="{{ url('/institution/profile') }}" @endif class='nav-link'>{{ \Auth::user()->name }}
                                            {{ substr(\Auth::user()->lastname, 0, 1) }}.</a>
                                    </li>
                                    <li class="nav-item   flex-main">
                                        <a href="{{ url('logout') }}">
                                            <img alt='icon' class="login_icon " src="{{ url('assets/img/iconos/logout.svg') }}">
                                        </a>
                                    </li>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                @else
                <div class='offcanvas-collapse fil' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".login">
                                        <a class='nav-link '>Sign In</a>
                                    </li>
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal"
                                        @click="resetRegistrationForm()">
                                        <a class='nav-link  '>Register</a>
                                    </li>
                                    <li class='nav-item w-nav' data-toggle="modal" data-target=".institution-modal">
                                        <a class='nav-link'>Institution Registration</a>
                                    </li>
                                </div>
                            </div>

                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </header>


    <!-- registro modal -->
    @include("partials.authModals.teacherRegistrationModal")


    <!-- institution-modal modal -->
    @include("partials.authModals.institutionRegistrationModal")


    @if(\Auth::check() && \Auth::user()->role_id == 3)
    <!------------------------------MODAL ESTEP DE instituto DEPUES DE REGISTRO------------------------------------------->
    @include("partials.authModals.institutionStepForm")
    @endif


    <!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->

    <!-- Modal -->
    @include("partials.authModals.messageModal")

    <!-- Login -->
    @include("partials.authModals.loginModal")

    <!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->


</div>

@push("script")

<script>
    const app = new Vue({
        el: '#auth',
        data() {
            return {
                institutions: [],
                selected_institution: "",
                institution_not_registered: false,
                name: "",
                lastname: "",
                email: "",
                institution_email: "",
                password: "",
                password_confirmation: "",
                step: 1,
                errors: [],
                loading: false,
                admin_institution_name: "",
                admin_institution_lastname: "",
                admin_institution_email: "",
                admin_institution_phone: "",
                admin_institution_password: "",
                admin_institution_password_confirmation: "",
                institution_name: "",
                institution_website: "",
                institution_email: "",
                institution_type: "",
                user: null,
                login_email: "",
                login_password: "",
                showInstitutionStepForm: "{{ $showModal }}",
                stepForm: 1,
                countries: [],
                selectedCountry: "",
                states: [],
                selectedState: "",
                gender_institution_type: "",
                lowest_age: "",
                highest_age: "",
                part_of_network_institution: 'true',
                institution_public_or_private: "public",
                students_enrolled: "0-100",
                faculty_members: "0-50",
                which_network: ""

            }
        },
        methods: {

            next(form = "teacher") {

                if (form == "institution") {
                    if (this.validateNextStepInstitution()) {
                        this.stepForm++
                    }

                } else {
                    this.step++
                }

            },
            previous(form = "teacher") {

                if (form == "institution") {
                    if (this.stepForm - 1 > 0) {
                        this.stepForm--
                    }
                } else {
                    if (this.step - 1 > 0) {
                        this.step--
                    }
                }
            },
            fetchCountries() {

                axios.get("{{ url('/countries/fetch') }}").then(res => {

                    this.countries = res.data.countries

                })

            },
            fetchStates() {

                axios.get("{{ url('/states/fetch/') }}" + "/" + this.selectedCountry).then(res => {

                    this.states = res.data.states

                })

            },
            fetchAllInstitutions() {

                axios.get("{{ url('/institutions/fetchAll') }}").then(res => {

                    this.institutions = res.data.institutions;

                })

            },
            resetRegistrationForm() {

                this.step = 1;
                this.selected_institution = ""
                this.name = ""
                this.lastname = ""
                this.email = ""
                this.institution_email = ""
                this.password = ""
                this.password_confirmation = ""
                this.user = null
                this.institution_not_registered = false
                this.institution_name = ""
                this.institution_contact_email = ""
                this.institution_website = ""

            },
            resetInstitutionRegistrationForm() {

                this.admin_institution_name = ""
                this.admin_institution_lastname = ""
                this.admin_institution_email = ""
                this.admin_institution_phone = ""
                this.admin_institution_password = ""
                this.admin_institution_password_confirmation = ""
                this.institution_name = ""
                this.institution_website = ""
                this.institution_type = ""

            },
            login() {

                this.loading = true

                axios.post("{{ url('/login') }}", {
                    "login_email": this.login_email,
                    "login_password": this.login_password
                }).then(res => {

                    this.loading = false
                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        }).then(res => {

                            window.location.reload()

                        })

                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })

                    }

                }).catch(err => {

                    swal({
                        text: "Check some fields, please",
                        icon: "error"
                    });

                    this.loading = false
                    this.errors = err.response.data.errors
                })
            },
            saveProject(){
                alert("hey")
            },
            teacherRegister() {

                if (this.validateTeacherRegister()) {

                    let form = new FormData
                    form.append("name", this.name)
                    form.append("email", this.email)
                    form.append("lastname", this.lastname)
                    form.append("institution_email", this.institution_email)
                    form.append("password", this.password)
                    form.append("password_confirmation", this.password_confirmation)
                    form.append("institution_id", this.selected_institution.id)
                    form.append("institution_not_registered", this.institution_not_registered)
                    form.append("institution_name", this.institution_name)
                    form.append("institution_contact_email", this.institution_contact_email)
                    form.append("institution_website", this.institution_website)

                    this.loading = true

                    axios.post("{{ url('/register') }}", form).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            this.resetRegistrationForm()
                            this.user = res.data.user

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {


                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                                $('#mensaje').modal('show')

                            })


                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        swal({
                            text: "Check some fields, please",
                            icon: "error"
                        });


                        this.loading = false
                        this.errors = err.response.data.errors
                    })
                }

            },
            institutionRegister() {

                if (this.validateInstitutionRegister()) {

                    this.loading = true

                    let formData = new FormData;
                    formData.append("admin_institution_name", this.admin_institution_name)
                    formData.append("admin_institution_lastname", this.admin_institution_lastname)
                    formData.append("admin_institution_email", this.admin_institution_email)
                    formData.append("admin_institution_phone", this.admin_institution_phone)
                    formData.append("admin_institution_password", this.admin_institution_password)
                    formData.append("admin_institution_password_confirmation", this
                        .admin_institution_password_confirmation)
                    formData.append("institution_name", this.institution_name)
                    formData.append("institution_website", this.institution_website)
                    formData.append("institution_type", this.institution_type)

                    axios.post("{{ url('/institution-register') }}", formData).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            this.resetInstitutionRegistrationForm()
                            this.user = res.data.user

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {



                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                                $('#mensaje').modal('show')

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        swal({
                            text: "Check some fields, please",
                            icon: "error"
                        });


                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                }

            },
            validateTeacherRegister() {


                if (!this.institution_not_registered) {
                    if (this.institution_email.toLowerCase().indexOf(this.selected_institution.website
                            .toLowerCase()) < 0) {

                        swal({
                            text: "Institution website and your institution email doesn't match",
                            icon: "warning"
                        })

                        return false

                    }

                }

                if (this.institution_not_registered) {

                    if (this.institution_name == "") {
                        swal({
                            text: "Institution name is required",
                            icon: "warning"
                        })

                        return false
                    } else if (this.institution_contact_email == "") {
                        swal({
                            text: "Institution contact email is required",
                            icon: "warning"
                        })

                        return false
                    } else if (this.institution_website == "") {
                        swal({
                            text: "Institution websote is required",
                            icon: "warning"
                        })

                        return false
                    }

                }


                if (this.name == "") {

                    swal({
                        text: "Name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.lastname == "") {

                    swal({
                        text: "Lastname is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.email == "") {

                    swal({
                        text: "Email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_email == "") {

                    swal({
                        text: "Institution email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.password == "") {

                    swal({
                        text: "Password is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.password_confirmation != this.password) {

                    swal({
                        text: "Passwords don't match",
                        icon: "warning"
                    })

                    return false

                }

                return true



            },
            validateInstitutionRegister() {

                if (this.admin_institution_name == "") {

                    swal({
                        text: "Name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_lastname == "") {

                    swal({
                        text: "Lastname is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_email == "") {

                    swal({
                        text: "Email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_phone == "") {

                    swal({
                        text: "Phone is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_password == "") {

                    swal({
                        text: "Password is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_password != this
                    .admin_institution_password_confirmation) {

                    swal({
                        text: "Password don't match",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_type == "") {

                    swal({
                        text: "Institution type is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_name == "") {

                    swal({
                        text: "Institution name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_website == "") {

                    swal({
                        text: "Institution website is required",
                        icon: "warning"
                    })

                    return false

                }

                return true

            },
            resendEmail() {
                this.loading = true
                axios.post("{{ url('/resend-email') }}", {
                    id: this.user.id
                }).then(res => {
                    this.loading = false
                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        });

                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        });

                    }

                }).catch(err => {

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
            validateNextStepInstitution() {

                if (this.institution_type == "school" || this.institution_type == "university") {

                    if (this.selectedCountry == "" || this.selectedState == "" || this
                        .gender_institution_type == "" || this.lowest_age == "" || this.highest_age == "") {
                        return false
                    }

                } else if (this.institution_type == "organization") {

                    if (this.selectedCountry == "" || this.selectedState == "" || this.lowest_age == "" ||
                        this.highest_age == "") {
                        return false
                    }

                }

                return true

            },
            validateFirstUpdateInstitution() {

                if (this.institution_type == "school" || this.institution_type == "university") {

                    if (this.part_of_network_institution == "true" && this.which_network == ""){
                        swal({
                            text:"Institution network is required",
                            icon: "error"
                        })

                        return false
                    }
                    
                    else if(this.institution_public_or_private == ""){
                        
                        swal({
                            text:"Public or private institution?",
                            icon: "error"
                        })

                        return false

                    }else if(this.students_enrolled == ""){

                        swal({
                            text:"Stundents enrolled is required",
                            icon: "error"
                        })

                        return false

                    }else if(this.faculty_members == ""){

                        swal({
                            text:"Faculty members is required",
                            icon: "error"
                        })

                        return false
                    }

                } else if (this.institution_type == "organization") {

                    if (this.institution_public_or_private == "") {

                        swal({
                            text:"Public or private institution?",
                            icon: "error"
                        })

                        return false
                    }

                }

                return true

            },
            institutionFirstUpdate() {

                if (this.validateFirstUpdateInstitution()) {

                    this.loading = true

                    let form = new FormData;
                    form.append("country_id", this.selectedCountry)
                    form.append("state_id", this.selectedState)
                    form.append("gender_institution_type", this.gender_institution_type)
                    form.append("lowest_age", this.lowest_age)
                    form.append("highest_age", this.highest_age)
                    form.append("part_of_network_institution", this.part_of_network_institution)
                    form.append("which_network", this.which_network)
                    form.append("institution_public_or_private", this.institution_public_or_private)
                    form.append("students_enrolled", this.students_enrolled)
                    form.append("faculty_members", this.faculty_members)

                    axios.post("{{ url('/institution/first-update') }}", form).then(res => {

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

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false

                    })

                }

            }

        },
        mounted() {
            this.fetchAllInstitutions()

            if (this.showInstitutionStepForm == 1) {
                $(".stepFormModal").modal('show')
                this.fetchCountries()
            }

            @if(\Auth::check())

                this.institution_type = "{{ \Auth::user()->institution ? \Auth::user()->institution->type : ''  }}"

            @endif



        }
    })

</script>

@endpush
