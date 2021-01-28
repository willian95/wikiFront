<div id="auth">

    <div class="loader-cover-custom" v-if="loading == true">
        <div class="loader-custom"></div>
    </div>

    <header>
        <nav class='navbar navbar-expand-md navbar-fixed-js'>
            <div class='flex-custom'>
                <a class='brand ' href='{{ url('/front-test') }}'>
                    <img alt='redes' src="{{ url('assets/img/logo.svg') }}">
                </a>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg' data-toggle='offcanvas'
                    type='button'>
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
                                        <li class='nav-item  border-nav'>
                                            <a class='nav-link'>{{ \Auth::user()->name }} {{ substr(\Auth::user()->lastname, 0, 1) }}.</a>
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
                                        <li class='nav-item  border-nav' data-toggle="modal" data-target=".register-modal" @click="resetRegistrationForm()">
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


    <!------------------------------MODAL ESTEP DE instituto DEPUES DE REGISTRO------------------------------------------->
    @include("partials.authModals.institutionStepForm")
    

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
            data(){
                return{
                    institutions:[],
                    selected_institution:"",
                    institution_not_registered:false,
                    name:"",
                    lastname:"",
                    email:"",
                    institution_email:"",
                    password:"",
                    password_confirmation:"",
                    step:1,
                    topStep:4,
                    errors:[],
                    loading:false,
                    admin_institution_name:"",
                    admin_institution_lastname:"",
                    admin_institution_email:"",
                    admin_institution_phone:"",
                    admin_institution_password:"",
                    admin_institution_password_confirmation:"",
                    institution_name:"",
                    institution_website:"",
                    institution_email:"",
                    institution_type:"",
                    user:null,
                    login_email:"",
                    login_password:"",
                    showInstitutionStepForm:"{{ $showModal }}"
                }
            },
            methods:{

                next(){
                    
                    if(this.step + 1 < this.topStep){
                        this.step++
                    }
                },
                previous(){
                    if(this.step - 1 > 0){
                        this.step--
                    }
                },
                fetchAllInstitutions(){

                    axios.get("{{ url('/institutions/fetchAll') }}").then(res => {

                        this.institutions = res.data.institutions;
                 
                    })

                },
                resetRegistrationForm(){

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
                resetInstitutionRegistrationForm(){

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
                login(){

                    this.loading = true

                    axios.post("{{ url('/login') }}", {"login_email": this.login_email, "login_password": this.login_password}).then(res => {

                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                text:res.data.msg,
                                icon:"success"
                            }).then(res => {

                                window.location.reload()

                            })

                        }else{

                            swal({
                                text:res.data.msg,
                                icon:"error"
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
                teacherRegister(){

                    if(this.validateTeacherRegister()){

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

                            if(res.data.success == true){

                                this.resetRegistrationForm()
                                this.user = res.data.user

                                swal({
                                    text:res.data.msg,
                                    icon: "success"
                                }).then(res => {

                                    
                                    $(".modalClose").click();
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();

                                    $('#mensaje').modal('show')

                                })


                            }else{

                                swal({
                                    text: res.data.msg,
                                    icon:"error"
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
                institutionRegister(){

                    if(this.validateInstitutionRegister()){

                        this.loading = true

                        let formData = new FormData;
                        formData.append("admin_institution_name", this.admin_institution_name)
                        formData.append("admin_institution_lastname", this.admin_institution_lastname)
                        formData.append("admin_institution_email", this.admin_institution_email)
                        formData.append("admin_institution_phone", this.admin_institution_phone)
                        formData.append("admin_institution_password", this.admin_institution_password)
                        formData.append("admin_institution_password_confirmation", this.admin_institution_password_confirmation)
                        formData.append("institution_name", this.institution_name)
                        formData.append("institution_website", this.institution_website)
                        formData.append("institution_type", this.institution_type)

                        axios.post("{{ url('/institution-register') }}", formData).then(res => {

                            this.loading = false

                            if(res.data.success == true){

                                this.resetInstitutionRegistrationForm()
                                this.user = res.data.user

                                swal({
                                    text:res.data.msg,
                                    icon: "success"
                                }).then(res => {

                                    

                                    $(".modalClose").click();
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();

                                    $('#mensaje').modal('show')

                                })

                            }else{

                                swal({
                                    text:res.data.msg,
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
                validateTeacherRegister(){

                   
                    if(!this.institution_not_registered){
                        if(this.institution_email.toLowerCase().indexOf(this.selected_institution.website.toLowerCase()) < 0){

                            swal({
                                text:"Institution website and your institution email doesn't match",
                                icon: "warning"
                            })

                            return false

                        }

                    }
                    
                    if(this.institution_not_registered){
                        
                        if(this.institution_name == ""){
                            swal({
                                text:"Institution name is required",
                                icon: "warning"
                            })

                            return false
                        }

                        else if(this.institution_contact_email == ""){
                            swal({
                                text:"Institution contact email is required",
                                icon: "warning"
                            })

                            return false
                        }

                        else if(this.institution_website == ""){
                            swal({
                                text:"Institution websote is required",
                                icon: "warning"
                            })

                            return false
                        }

                    }


                        if(this.name == ""){

                            swal({
                                text:"Name is required",
                                icon: "warning"
                            })

                            return false

                        }

                        else if(this.lastname == ""){

                            swal({
                                text:"Lastname is required",
                                icon: "warning"
                            })

                            return false

                        }
                        else if(this.email == ""){

                            swal({
                                text:"Email is required",
                                icon: "warning"
                            })

                            return false

                        }
                        else if(this.institution_email == ""){

                            swal({
                                text:"Institution email is required",
                                icon: "warning"
                            })

                            return false

                        }

                        else if(this.password == ""){

                            swal({
                                text:"Password is required",
                                icon: "warning"
                            })

                            return false

                        }

                        else if(this.password_confirmation != this.password){

                            swal({
                                text:"Passwords don't match",
                                icon: "warning"
                            })

                            return false

                        }

                        return true

                 

                },
                validateInstitutionRegister(){

                    if(this.admin_institution_name == ""){

                        swal({
                            text:"Name is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.admin_institution_lastname == ""){

                        swal({
                            text:"Lastname is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.admin_institution_email == ""){

                        swal({
                            text:"Email is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.admin_institution_phone == ""){

                        swal({
                            text:"Phone is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.admin_institution_password == ""){

                        swal({
                            text:"Password is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.admin_institution_password != this.admin_institution_password_confirmation){

                        swal({
                            text:"Password don't match",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.institution_type == ""){

                        swal({
                            text:"Institution type is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.institution_name == ""){

                        swal({
                            text:"Institution name is required",
                            icon: "warning"
                        })

                        return false

                    }

                    else if(this.institution_website == ""){

                        swal({
                            text:"Institution website is required",
                            icon: "warning"
                        })

                        return false

                    }

                    return true

                },
                resendEmail(){
                    this.loading = true
                    axios.post("{{ url('/resend-email') }}", {id: this.user.id}).then(res => {
                        this.loading = false
                        if(res.data.success == true){

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            });

                        }else{

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
                }

            },
            mounted(){
                this.fetchAllInstitutions()
                $(".stepFormModal").modal('show')
            }
        })
    </script>

@endpush