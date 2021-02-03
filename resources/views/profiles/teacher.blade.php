@extends('layouts.main')

@section('content')
<div class="container" id="teacherProfile">

        <div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>

    @include("profiles.modals.teacherProfileModal")

    <div class="main-profile">
        <div class="main-profile_content">
            <h1 class="text-center">Educator profile</h1>
            <p>Stats</p>
        </div>
        <div class="main-profile_dates mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p><strong> Name:</strong> @{{ name }}</p>
                        <p>
                            <strong>Email:</strong> @{{ email }}
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox" v-model="showMyEmail">
                                <span class="slider round"></span>
                            </label>
                        </p>
                        <p><strong>Institution:</strong> @{{ institutionName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('institution')"></i></p>
                        <p><strong>Member since: </strong> @{{ memberSince }}</p>
                        <p><strong>Country:</strong> @{{ countryName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('country')"></i></p>
                        <p><strong>City: </strong>@{{ stateName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('state')"></i></p>
                        <p><strong>CV/Resume:</strong> @{{ cvResume }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('cvResume')"></i></p>
                        <p><strong>Portfolio:</strong>@{{ portfolio }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('portfolio')"></i></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3> “Why do you educate?”</h3>
                    <textarea class="form-control" v-model="description"></textarea>

                    <div class="text-right">
                        <button class="btn btn-custom" @click="update()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-wikis mt-5">
            <div class="text-center">
                <h3>My projects - Dashboard</h3>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        My wikiPBL

                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    12
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        My Public wikiPB

                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    3
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Following
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    11
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div id="accordion" class="wiki-accordion">
                        <div class="card">
                            <div class="" id="wikigOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#wikiOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <p>1. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>

                            <div id="wikiOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <button class="btn btn-custom">ORIGINAL DOCUMENT</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="" id="wikiTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#wikiTwo"
                                        aria-expanded="false" aria-controls="wikiTwo">
                                        <p>2. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>
                            <div id="wikiTwo" class="collapse" aria-labelledby="wikiTwo" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="" id="wikithree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#wikithree" aria-expanded="false" aria-controls="collapseThree">
                                        <p>3. PBL Title, Name of the educator, Name of the institution</p>
                                    </button>
                                </h5>
                            </div>
                            <div id="wikithree" class="collapse" aria-labelledby="wikithree" data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson
                                    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                    you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push("script")

    <script>
        const teacherProfile = new Vue({
            el: '#teacherProfile',
            data() {
                return{

                    institutions:[],
                    institution:"{{ \Auth::user()->institution_id }}",
                    institutionName:"{{ \Auth::user()->institution ? \Auth::user()->institution->name : \Auth::user()->pending_institution_name }}",
                    name:"{{ \Auth::user()->name }}",
                    email:"{{ \Auth::user()->email }}",
                    memberSince:"{{ \Auth::user()->created_at->format('m/d/Y') }}",
                    description:"{{ strip_tags(\Auth::user()->why_do_you_educate) }}",
                    modalField:"",
                    countries:[],
                    countryName:"{{ \Auth::user()->country ? strip_tags(\Auth::user()->country->name) : '' }}",
                    country:"{{ \Auth::user()->country ? strip_tags(\Auth::user()->country->id) : '' }}",
                    states:[],
                    state:"{{ \Auth::user()->state ? strip_tags(\Auth::user()->state->id) : '' }}",
                    stateName:"{{ \Auth::user()->state ? strip_tags(\Auth::user()->state->name) : '' }}",
                    cvResume:"{{ strip_tags(\Auth::user()->cv_resume) }}",
                    portfolio:"{{ strip_tags(\Auth::user()->portfolio) }}",
                    showMyEmail:JSON.parse('{!! \Auth::user()->show_my_email !!}'),
                    loading:false,
                    errors:[]

                }
            },
            methods:{

                fetchAllInstitutions() {

                    axios.get("{{ url('/institutions/fetchAll') }}").then(res => {

                        this.institutions = res.data.institutions;

                    })

                },
                setModalField(field){
                    this.modalField = field

                    if(field == "state"){
                        this.fetchStates()
                    }

                },
                fetchCountries() {

                    axios.get("{{ url('/countries/fetch') }}").then(res => {

                        this.countries = res.data.countries

                    })

                },
                fetchStates() {

                    axios.get("{{ url('/states/fetch/') }}" + "/" + this.country).then(res => {

                        this.states = res.data.states

                    })

                },
                onChangeCountry(){

                    this.state = ""
                    this.stateName = ""

                    this.countries.forEach((data) => {
                        
                        if(data.id == this.country){
                            this.countryName = data.name
                        }
                    })

                },
                onChangeState(){

                    this.states.forEach((data) => {
                        
                        if(data.id == this.state){
                           
                            this.stateName = data.name
                        }
                    })

                },
                onChangeInstitution(){
                    this.institutions.forEach((data) => {
                        
                        if(data.id == this.institution){
                           
                            this.institutionName = data.name
                        }
                    })
                },
                update(){

                    this.loading = true

                    let formData = new FormData()
                    formData.append("country", this.country)
                    formData.append("state", this.state)
                    formData.append("cv_resume", this.cvResume)
                    formData.append("portfolio", this.portfolio)
                    formData.append("institution", this.institution)
                    formData.append("why_do_you_educate", this.description)
                    formData.append("show_my_email", this.showMyEmail)

                    axios.post("{{ url('/teacher/profile/update') }}", formData).then(res => {

                        this.loading = false

                        if(res.data.success == true){

                            swal({
                                text:res.data.msg,
                                icon:"success"
                            })

                        }else{

                        }

                    }).catch(err => {

                        this.loading = false
                        this.errors = err.response.data.errors

                    })

                }
            },
            mounted(){

                this.fetchCountries()
                this.fetchAllInstitutions()

            }
        })
    </script>

@endpush