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
                <div class='offcanvas-collapse fil' id='navbarNav'>
                    <ul class='navbar-nav container'>
                        <div class="row">
                            <div class="col-md-12  mt-3">
                                <div class="menu-flex">
                                    <li class='nav-item  border-nav' data-toggle="modal" data-target=".login-modal">
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
            </div>
        </nav>
    </header>


    <!-- registro modal -->
    <div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="content-modal_register main-modal container">
                    <button type="button" class="modalClose" data-dismiss="modal" style="display:none">cerrar</button>
                    <div v-if="step == 1">
                        <div class="content-titulo">
                            <p class="titulo">Educator Registration - Welcome!</p>
                            <div class="info-regrister">
                                <img src="{{ url('assets/img/iconos/info.svg') }}" alt="">
                                <p> Before registering, remember that your email address must be valid and approved by your
                                    Institution & the wikiPB Admin
                                </p>
                            </div>
                        </div>
                        <div action="">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="inputinstitutioe"></label>
                                        <select id="inputinstitutio" class="form-control" v-model="selected_institution">
                                            <option value="">Choose your institution </option>
                                            <option :value="institution" v-for="institution in institutions">@{{ institution.name }}</option>
                                        </select>
                                       
                                    </div>
                                    <div class="">
                                        <!---check--->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    My institution is not registered/listed
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 center-flex">
                                    <!--bnt--->
                                    <button type="button" class="btn btn-custom" @click="next()" :disabled="selected_institution == ''">Continue</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div v-if="step == 2">
                        <div class="content-titulo">
                            <p class="titulo">Educator Registration - Welcome!</p>
                            <div class="info-regrister info-regrister-2">
                                <img src="{{ url('assets/img/iconos/graduation-hat.svg') }}" alt="">
                                <p class="m-0 ml-2">@{{ selected_institution.name }} </p>

                            </div>
                        </div>
                        <div action="">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Name" v-model="name">
                                                <small style="color:red" v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last name " v-model="lastname">
                                                <small style="color:red" v-if="errors.hasOwnProperty('lastname')">@{{ errors['lastname'][0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Institutional Email" v-model="institution_email">
                                                <small style="color:red" v-if="errors.hasOwnProperty('institution_email')">@{{ errors['institution_email'][0] }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Personal Email" v-model="email">
                                                <small style="color:red" v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password" v-model="password">
                                                <small style="color:red" v-if="errors.hasOwnProperty('password')">@{{ errors['password'][0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Repeat Password" v-model="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 center-flex">
                                    <!--bnt--->
                                    <button type="button" class="btn btn-custom" :disabled="name == '' || lastname == '' || email == '' || institution_email == '' || password == '' || password_confirmation == ''" @click="register()">Register</button>
                                </div>


                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- institution-modal modal -->
    <div class="modal fade bd-example-modal-lg institution-modal" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="content-modal_register main-modal container ">
                    <div class="content-titulo mb-3">
                        <p class="titulo">Institution Registration - Welcome!</p>
                    </div>
                    <div>

                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-regrister   info-regrister--inst mb-4">
                                        <img src="{{ url('assets/img/iconos/user.svg') }}" alt="">
                                        <p>Designated
                                            Institution User</p>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last name ">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="John@harvard.org">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="+1()123)4567890">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="info-regrister   info-regrister--inst">
                                        <img src="{{ url('assets/img/iconos/university.svg') }}" alt="">
                                        <p>Institution Info</p>
                                    </div>
                                    <div class="check-inst">

                                        <label>
                                            <input type="radio" class="option-input radio" name="example" checked />
                                            School
                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio" name="example" />
                                            University
                                        </label>
                                        <label>
                                            <input type="radio" class="option-input radio" name="example" />
                                            Organization
                                        </label>
                                    </div>


                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Url">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-md-12 text-center mt-2 mb-4">
                                    <!--bnt--->
                                    <button type="submit" class="btn btn-custom">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!------------------------------MODAL ESTEP DE instituto DEPUES DE REGISTRO------------------------------------------->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form id="regForm">

                        <!-- One "tab" for each step in the form: -->
                        <div class="tab" v-if="step == 1">
                            <div class="content-titulo">
                                <p class="titulo"> Welcome back John! <span>Step 1/2</span></p>
                                <div class="info-regrister">
                                    <img src="{{ url('assets/img/iconos/like.svg') }}" alt="">
                                    <p>The institution: Harvard University was
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

    <!------------------------------mensaje de confimacion de regitro instituto------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="mensaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p> Thanks!</p><br>
                        You just submitted your institution to be
                        part of wikiPBL! You should get a
                        confirmation email to finish the
                        registration, so all of your teachers and
                        associates can start creating WikiPBL
                        projects ASAP! Remember to check y
                    </div>
                </div>
                <div class="modal-footers">
                    <button type="button" class="btn " data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn " @click="resendEmail()">Resend confirmation</button>
                </div>
            </div>
        </div>
    </div>

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
                    pendingInstitution:false,
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
                    user:null
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

                },
                register(){

                    if(this.validateRegister()){

                        let form = new FormData
                        form.append("name", this.name)
                        form.append("email", this.email)
                        form.append("lastname", this.lastname)
                        form.append("institution_email", this.institution_email)
                        form.append("password", this.password)
                        form.append("password_confirmation", this.password_confirmation)
                        form.append("institution_id", this.selected_institution.id)

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
                validateRegister(){

                    if(!this.pendingInstitution){

                        if(this.institution_email.indexOf(this.selected_institution.website) < 0){

                            swal({
                                text:"Institution website and your institution email doesn't match",
                                icon: "warning"
                            })

                            return false

                        }

                        else if(this.name == ""){

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

                    }

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

                }

            },
            mounted(){
                this.fetchAllInstitutions()
            }
        })
    </script>

@endpush