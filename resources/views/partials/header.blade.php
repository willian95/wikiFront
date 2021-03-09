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
                        <li class="nav-box_li"><a href="{{ url('/about') }}">
                            <div class="blue-box"></div>About wikiPBL
                        </a></li>
                        <li class="nav-box_li"><a data-toggle="modal" data-target=".faq-modal" >
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

                            @if(\Auth::user()->role_id == 2)
                            <li class="nav-item  flex-main mr-0">

                                <!-- <img alt='icon' class="login_icon" src="{{ url('assets/img/iconos/add-file.svg') }}">--->
                                <a class='nav-link  pl-0' href="{{ url('/project/choose-template') }}">
                                    <svg  class="login_icon color-blue_icon w29" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="file-add"><rect width="24" height="24" opacity="0"/><path d="M19.74 8.33l-5.44-6a1 1 0 0 0-.74-.33h-7A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V9a1 1 0 0 0-.26-.67zM14 5l2.74 3h-2a.79.79 0 0 1-.74-.85zm3.44 15H6.56a.53.53 0 0 1-.56-.5v-15a.53.53 0 0 1 .56-.5H12v3.15A2.79 2.79 0 0 0 14.71 10H18v9.5a.53.53 0 0 1-.56.5z"/><path d="M14 13h-1v-1a1 1 0 0 0-2 0v1h-1a1 1 0 0 0 0 2h1v1a1 1 0 0 0 2 0v-1h1a1 1 0 0 0 0-2z"/></g></g></svg>
                                New wikiPBL</a>
                            </li>
                            @endif



                        </div>
                        <!-- Iconos temlate option-->

                        <div class="dropdown drop-notificacion mr-4">
                            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="setSeenNotifications()">
                               <svg class="notificacion" id="Capa_1" enable-background="new 0 0 512 512"  viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m450.201 407.453c-1.505-.977-12.832-8.912-24.174-32.917-20.829-44.082-25.201-106.18-25.201-150.511 0-.193-.004-.384-.011-.576-.227-58.589-35.31-109.095-85.514-131.756v-34.657c0-31.45-25.544-57.036-56.942-57.036h-4.719c-31.398 0-56.942 25.586-56.942 57.036v34.655c-50.372 22.734-85.525 73.498-85.525 132.334 0 44.331-4.372 106.428-25.201 150.511-11.341 24.004-22.668 31.939-24.174 32.917-6.342 2.935-9.469 9.715-8.01 16.586 1.473 6.939 7.959 11.723 15.042 11.723h109.947c.614 42.141 35.008 76.238 77.223 76.238s76.609-34.097 77.223-76.238h109.947c7.082 0 13.569-4.784 15.042-11.723 1.457-6.871-1.669-13.652-8.011-16.586zm-223.502-350.417c0-14.881 12.086-26.987 26.942-26.987h4.719c14.856 0 26.942 12.106 26.942 26.987v24.917c-9.468-1.957-19.269-2.987-29.306-2.987-10.034 0-19.832 1.029-29.296 2.984v-24.914zm29.301 424.915c-25.673 0-46.614-20.617-47.223-46.188h94.445c-.608 25.57-21.549 46.188-47.222 46.188zm60.4-76.239c-.003 0-213.385 0-213.385 0 2.595-4.044 5.236-8.623 7.861-13.798 20.104-39.643 30.298-96.129 30.298-167.889 0-63.417 51.509-115.01 114.821-115.01s114.821 51.593 114.821 115.06c0 .185.003.369.01.553.057 71.472 10.25 127.755 30.298 167.286 2.625 5.176 5.267 9.754 7.861 13.798z"/></svg>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a v-for="notification in notifications" class="dropdown-item" :href="notification.url">@{{ notification.body }}</a>
                                
                            </div>

                            <span class="noti">@{{ unseenNotificationsCount }}</span>
                            </div>



                        <li class='nav-item  flex-main'>
                            <img alt='icon' class="teacher-icon "
                            src="{{ url('assets/img/iconos/user-teacher.png') }}">
                            <a @if(\Auth::user()->role_id == 2) href="{{ url('/teacher/profile') }}" @else href="{{ url('/institution/profile') }}" @endif class='nav-link pl-2'>{{ \Auth::user()->name }}
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
                            <a class='nav-link  '>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="92px" height="92px" viewBox="0 0 92 92" xml:space="preserve"><path id="XMLID_1253_" d="M46 57.1c14.8 0 26.9-12.1 26.9-27C72.9 15.1 60.8 3 46 3S19.1 15.1 19.1 30c0 15 12.1 27.1 26.9 27.1zM46 11c10.4 0 18.9 8.5 18.9 19S56.4 49 46 49s-18.9-8.5-18.9-19S35.6 11 46 11zm12.5 48.7c-1.3-.4-2.8-.1-3.8.8L46 67.9l-8.7-7.4c-1.1-.9-2.5-1.2-3.8-.8C27.9 61.5 0 71.1 0 85c0 2.2 1.8 4 4 4h84c2.2 0 4-1.8 4-4 0-13.9-27.9-23.5-33.5-25.3zM10.1 81c4.4-4.7 15-9.9 23.8-12.9l9.5 8.1c1.5 1.3 3.7 1.3 5.2 0l9.5-8.1c8.8 3.1 19.4 8.3 23.8 12.9H10.1z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="user" dc:description="user" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Amit Jakhu</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
                            Register</a>
                        </li>
                        <li class='nav-item w-nav' data-toggle="modal" data-target=".institution-modal">
                            <a class='nav-link'>
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 464 464" style="enable-background:new 0 0 464 464;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M456,217.12H353.68v-19.76c-0.005-2.886-1.564-5.546-4.08-6.96L240,128.8V97.44h21.68v11.92c0,4.418,3.582,8,8,8h65.36
                                        c4.418-0.002,7.998-3.585,7.997-8.003c0-0.926-0.162-1.845-0.477-2.717L336,88l6.64-18.24c1.502-4.155-0.648-8.741-4.803-10.243
                                        c-0.871-0.315-1.79-0.476-2.717-0.477h-29.76v-11.6c0-4.418-3.582-8-8-8H240v-9.76c0-4.418-3.582-8-8-8s-8,3.582-8,8v99.12
                                        l-109.6,61.52c-2.516,1.414-4.075,4.074-4.08,6.96v19.76H8c-4.418,0-8,3.582-8,8v209.28c0,4.418,3.582,8,8,8h448
                                        c4.418,0,8-3.582,8-8v-209.2C464,220.702,460.418,217.12,456,217.12z M305.36,89.44l-0.32-0.32V75.36h18.24L320,85.6
                                        c-0.655,1.782-0.655,3.738,0,5.52l3.76,10.24h-46.08v-3.92h19.68C301.778,97.44,305.36,93.858,305.36,89.44z M240,55.44h49.36
                                        v11.92v14.08H240V55.44z M110.32,426.32H16v-193.2h94.32V426.32z M224,426.32h-42v-91.36h42V426.32z M282,426.32h-42v-91.36h42
                                        V426.32z M338,426.32h-40v-99.36c0-4.418-3.582-8-8-8H174c-4.418,0-8,3.582-8,8v99.36h-40v-224l106-59.68L337.68,202l0.32,23.04
                                        V426.32z M448,426.32h-94.32v-193.2H448V426.32z"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M232,167.12c-18.526,0.044-33.52,15.074-33.52,33.6c0.044,18.513,15.087,33.484,33.6,33.44
                                        c18.513-0.044,33.484-15.087,33.44-33.6C265.476,182.079,250.481,167.12,232,167.12z M232,218.16
                                        c-9.676-0.044-17.484-7.924-17.44-17.6c0.044-9.613,7.826-17.396,17.44-17.44c9.689,0.044,17.52,7.911,17.52,17.6h0.08
                                        C249.556,210.396,241.676,218.204,232,218.16z"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="35.28" y="250.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="74.72" y="250.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="150.32" y="250.72" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="216" y="250.72" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="281.68" y="250.72" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="150.32" y="288" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="216" y="288" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="281.68" y="288" width="32" height="16"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="35.28" y="313.68" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="74.72" y="313.68" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="35.28" y="376.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="74.72" y="376.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="373.28" y="250.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="412.72" y="250.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="373.28" y="313.68" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="412.72" y="313.68" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="373.28" y="376.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <rect x="412.72" y="376.72" width="16" height="32"/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>

                        Institution Registration</a>
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

<!-- forgot Password -->
@include("partials.authModals.forgotPasswordModal")

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
                forgotPasswordErrors:[],
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
                which_network: "",
                forgotPasswordEmail:"",
                notifications:[],
                unseenNotificationsCount:0

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
                let token = window.localStorage.getItem("fcm_token")

                axios.post("{{ url('/login') }}", {
                    "login_email": this.login_email,
                    "login_password": this.login_password,
                    "token": token
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
            isURL(str) {
                const pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
                return !!pattern.test(str);
            },
            validateTeacherRegister() {

                if (!this.institution_not_registered) {

                    //console.log("institution_email", this.institution_email.toLowerCase())
                    //console.log("website", this.selected_institution.website.toLowerCase().replace("www.", "").replace("https", "").replace("http", "").replace("://", ""))
                    let domain = null
                    //console.log("test", this.isURL(this.selected_institution.website.toLowerCase()))

                    try{
                        domain = new URL(this.selected_institution.website.toLowerCase()).hostname
                    }catch{

                        domain = this.selected_institution.website.toLowerCase()

                    }

                    if (this.institution_email.toLowerCase().indexOf(domain.toLowerCase().replace("www.", "").replace("https", "").replace("http", "").replace("://", "")) < 0) {

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
                            text: "Institution website is required",
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

        },
        restorePassword(){

            axios.post("{{ url('/password/send-email') }}", {"email": this.forgotPasswordEmail}).then(res => {

                if(res.data.success == true){

                    $(".modalClose").click();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '0px');
                    $('.modal-backdrop').remove();

                    swal({
                        text: res.data.msg,
                        icon: "success"
                    });

                }

            }).catch(err => {

                swal({
                    text: "Check some fields, please",
                    icon: "error"
                });

                this.loading = false
                this.forgotPasswordErrors = err.response.data.errors

            })

        },
        forgotPasswordShowModal(){

            $(".modalClose").click();
            $('body').removeClass('modal-open');
            $('body').css('padding-right', '0px');
            $('.modal-backdrop').remove();

            $(".forgotPassword").modal('show')

        },
        checkInstitution(){

            window.setTimeout(() => {
                if(this.institution_not_registered == true){
                    this.selected_institution = ""
                }
            }, 200)

        },

        getNotifications(){
            this.unseenNotificationsCount = 0
            axios.get("{{ url('/notification/last') }}").then(res => {

                this.notifications = res.data.notifications

                this.notifications.forEach((data) => {

                    if(data.is_seen == 0){
                        this.unseenNotificationsCount++
                    }

                })

            })

        },

        setSeenNotifications(){

            this.unseenNotificationsCount = 0
            axios.post("{{ url('/notification/seen') }}").then(res => {


            })

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

        window.setInterval(() => {

            if(window.localStorage.getItem("show_notifications") == "1"){
                window.localStorage.setItem("show_notifications", "0")
                this.getNotifications();

            }

        }, 1000)

        this.getNotifications()

    }
    })

</script>

@endpush
