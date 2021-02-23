@extends("layouts.project")

@section("content")

<div id="own-template">
    @include("partials.projectShowHeader")
    <div class="container p5">
        <div class="container  main-template mt-5">

            <div class="modal fade" id="calendarDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Activity description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @{{ activityDescription }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="reportConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3 class="text-center">Warning!</h3>

                            <p class="mt-2 text-center">
                            Thank you for letting us know this
                            WikiPBL is having problems, remember
                            to check always our FAQ’S for more
                            information about reporting issues
                            and accounts.
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="reportProject()">Report</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="menu-template">
                        <p>Edit mode </p>
                        <div class="menu-template_option" style="overflow-y: auto; height: 360px;">
                            <ul>
                                <p>Main info</p>
                                <li> <a href="#title-p">@{{ title }}</a></li>
                                <li> <a href="#driving">@{{ drivingQuestionTitle }}</a></li>
                                <li> <a href="#subjecttitle">@{{ subjectTitle }}</a></li>
                                <li> <a href="#time">@{{ timeFrameTitle }}</a></li>
                                <li><a href="#projectsumary">Project Summary</a></li>
                                <li> <a href="#publictitle">@{{ publicProductTitle }}</a> </li>
                                <li> <a href="#leveltitle">@{{ levelTitle }}</a></li>
                                <li> <a href="#hashtags-menu">#hashtags</a></li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!----------------info----------------->
                <div class="col-md-9 info-template">

                    <div class="container-fluid">
                        @if(\Auth::check())
                            <div class="row">
                                
                                <div class="col-md-4">
                                    @foreach($assestmentPoints as $point)
                                        <p>
                                            <button class="btn btn-votos" @click="upvoteAssestment({{$point->assestmentPointType->id}}, '{!! htmlspecialchars_decode($point->assestmentPointType->name) !!}')">
                                                <i class="fa {{ $point->assestmentPointType->icon }}"></i>
                                                {{ $point->assestmentPointType->name }}
                                            </button>
                                        </p>
                                    @endforeach
                                </div>
                                <div class="col-md-8">

                                    <canvas id="myChart"></canvas>
                                    
                                </div>
                
                            </div>
                        @endif
                    </div>

                    <!--------------------general--------------------------->
                    <ul class="content_template content_template-general">
                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">
                                <span>@{{ title }}</span> 
                            </h3>
                            <p><strong>By:</strong></p>
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">@{{ drivingQuestionTitle }}</h3>
                            {!! $drivingQuestion !!}

                        </li>
                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">@{{ subjectTitle }}</h3>

                            <div class="row mt-3">
                                <div v-for="(subject, index) in subjects" class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            
                                            @{{ subject }}
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">@{{ timeFrameTitle }}</h3>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    @{{ timeFrame }}
                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">Project summary</h3>
                            {!! $projectSumary !!}
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">@{{ publicProductTitle }}</h3>
                            {!! $publicProduct !!}
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">@{{ levelTitle }}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inp"></label>
                                        <select id="inpt" class="form-control" v-model="level" disabled>
                                            <option value="">Choose your level </option>
                                            <option value="nursery">Nursery </option>
                                            <option value="early">Early Childhood </option>
                                            <option value="primary">Primary/Elementary School</option>
                                            <option value="middle">Middle School</option>
                                            <option value="high">High School</option>
                                            <option value="undergraduate">Undergraduate</option>
                                            <option value="masters">Masters</option>
                                            <option value="phd">PhD</option>
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        
                                    <div class="row" v-show="level == 'nursery'">
                                        
                                        <div class="col-6" v-for="nurseryLevel in 4">
                                            <div class="form-check" @click="addOrPopAges(nurseryLevel - 1)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(nurseryLevel-1)" value="" :id="'age-'+(nurseryLevel-1)" disabled>
                                                <label class="form-check-label">
                                                    @{{ nurseryLevel - 1 }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'early'">
                                        
                                        <div class="col-6" v-for="earlyLevel in 6" v-if="earlyLevel > 3">
                                            <div class="form-check" @click="addOrPopAges(earlyLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(earlyLevel)" value="" :id="'age-'+earlyLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ earlyLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'primary'">
                                        
                                        <div class="col-6" v-for="primaryLevel in 10" v-if="primaryLevel > 6">
                                            <div class="form-check" @click="addOrPopAges(primaryLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(primaryLevel)" value="" :id="'age-'+primaryLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ primaryLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'middle'">
                                        
                                        <div class="col-6" v-for="middleLevel in 13" v-if="middleLevel > 10">
                                            <div class="form-check" @click="addOrPopAges(middleLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(middleLevel)" value="" :id="'age-'+middleLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ middleLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'high'">
                                        
                                        <div class="col-6" v-for="highLevel in 18" v-if="highLevel > 14">
                                            <div class="form-check">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(highLevel)" value="" :id="'age-'+highLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ highLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-check" @click="addOrPopAges('18+')" v-show="level == 18">
                                        <input class="form-check-input check-age" type="checkbox" :checked="checkTest('18+')" value="" id="age-18">
                                        <label class="form-check-label">
                                            +18
                                        </label>
                                    </div>
                                    <div class="form-check" v-show="level != ''">
                                        <input class="form-check-input check-age"  type="checkbox" :checked="checkTest('all ages')" value="" id="noapply" disabled>
                                        <label class="form-check-label">
                                            Doesn't apply
                                        </label>
                                    </div>


                                </div>
                                
                            </div>
                        </li>

                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">#hashtags</h3>

                            <div class="row mt-3">
                                <div v-for="(hashtag, index) in hashtags" class="col-md-3">
                                    <div class="card">
                                        <div class="card-body"> 
                                            #@{{ hashtag }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                    </ul>
                    <!-----------------------END general------------------------>

                    <div class="content_template">

                        {!! $mainInfo !!}

                        <div class="contente_item mt-5 mb-5">
                            <h3 class="titulo-templates">Calendar of activities </h3>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">Day 1</div>
                                    <div class="col-md-2">Day 2</div>
                                    <div class="col-md-2">Day 3</div>
                                    <div class="col-md-2">Day 4</div>
                                    <div class="col-md-2">Day 5</div>
                                </div>
                                <div class="row mt-1" v-for="week in weeks">
                                    <div class="col-md-2">Week @{{ week }}</div>
                                    <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target="#calendarDescription">
                                        <div class="card" style="cursor: pointer">
                                            <div class="card-body card-body_tarea">
                                                @{{ showActivity(week, day) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="contente_item">
                            <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                            {!! $bibliography !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a class="up" href="#own-template">            <div class="arrow-up"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 32 32" fill="#fff"><path d="M11.218 20.2L17 14.418l5.782 5.782a1 1 0 0 0 1.414-1.414L17.71 12.3a.997.997 0 0 0-.71-.292.997.997 0 0 0-.71.292l-6.486 6.486a1 1 0 0 0 1.414 1.414z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="arrow,carrot,up" dc:description="arrow,carrot,up" dc:publisher="Iconscout" dc:date="2017-09-25" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Elegant Themes</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg></div>
</a>
        <footer class="footer-estyle">
            <div class="footer container mt-5 text-center">
                <p> <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a> - <a data-toggle="modal"
                    data-target=".terms">Terms & Conditions</a> - <a href="#">About WikiPBL</a> - 2021
                Copyrights - Contact us! </p>
            </div>
        </footer>
    </div>
</div>

@endsection

@push("script")

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <script>
        const create = new Vue({
            el: '#own-template',
            data() {
                return {
                    projectId: "{{ $id }}",
                    title:"{!! htmlspecialchars_decode($title) !!}",
                    drivingQuestionTitle:"{!! htmlspecialchars_decode($drivingQuestionTitle) !!}",
                    subjectTitle:"{!! htmlspecialchars_decode($subjectTitle) !!}",
                    subject:"",
                    subjects:"",
                    timeFrameTitle:"{!! htmlspecialchars_decode($timeFrameTitle) !!}",
                    timeFrame:"{!! htmlspecialchars_decode($timeFrame) !!}",
                    publicProductTitle:"{!! htmlspecialchars_decode($publicProductTitle) !!}",
                    levelTitle:"{!! htmlspecialchars_decode($levelTitle) !!}",
                    level:"",
                    ages:[],
                    hashtag:"",
                    hashtags:"",
                    calendarActivities:[],
                    activityDescription:"",
                    days:5,
                    weeks:4,
                    calendarDay:"",
                    calendarWeek:"",
                    follow:"{{ \Auth::check() ? App\ProjectShare::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                    like:"{{ \Auth::check() ? App\Like::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                    report:"{{ \Auth::check() ? App\ProjectReport::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                    assestmentArray:JSON.parse('{!! $assestmentPointsArray !!}'),
                    loading:false,
                    myChart:null,
                    labels:[],
                    values:[],

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
                    showInstitutionStepForm: false,
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
                    likes:parseInt("{{ App\Like::where('project_id', $project[0]->id)->count() }}")

                }
            },
            methods:{

                checkTest(age){
                    var exists = false
                    this.ages.forEach((data) => {
                        if(data == age){
                            exists = true
                        }
                    })

                    return exists
                },
                showActivity(week, day){

                    
                    var activity = null
                    this.calendarActivities.forEach((data) => {

                        if(data.week == week && data.day == day){
                            activity = data
                        }

                    })

                    if(activity){
                        return activity.description
                    }

                },
                setWeekAndDay(week, day){

                    this.activityDescription = ""
                    this.calendarDay = day
                    this.calendarWeek = week

                    this.calendarActivities.forEach(data => {

                        if(data.week == week && data.day == day){
                            this.activityDescription = data.description
                        }

                    })

                },
                setCheckedAges(){

                    this.ages.forEach((data) => {
                    
                        if(data == "18+"){
                            document.getElementById("age-18").checked = true;
                        }else if(data == "all ages"){
                            document.getElementById("allages").checked = true;
                        }else{
                            document.getElementById("age-"+data).checked = true;
                        }
                        

                    })

                },
                followProject(){

                    this.changeFollowIcon()

                    axios.post("{{ url('project/follow') }}", {"project_id": this.projectId}).then(res => {

                        if(res.data.success){
                            swal({
                                text: res.data.msg,
                                icon: "success"
                            })

                        }else{
                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })
                        }

                    })

                },
                changeFollowIcon(){
                    if(this.follow == "1"){
                        this.follow = "0"
                        $("#followIcon").css("fill", "#000")
                    }else{
                        this.follow = "1"
                        $("#followIcon").css("fill", "#4674b8")
                    }
                },
                likeProject(){

                    this.changeLikeIcon()

                    axios.post("{{ url('project/like') }}", {"project_id": this.projectId}).then(res => {

                        if(res.data.success){
                            swal({
                                text: res.data.msg,
                                icon: "success"
                            })

                        }else{
                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })
                        }

                    })

                },
                changeLikeIcon(){
                    if(this.like == "1"){
                        this.like = "0"
                        this.likes = this.likes--
                        
                        $("#likeIcon").css("fill", "#000")
            
                    }else{
                        this.like = "1"
                        this.likes = this.likes++
                        $("#likeIcon").css("fill", "#4674b8")
                    }
                },
                showReportConfirmation(){

                    if(this.report == 0){
                        $("#reportConfirmation").modal("show")
                    }else{
                        this.reportProject()
                    }

                },
                reportProject(){


                    this.changeReportIcon()

                    axios.post("{{ url('project/report') }}", {"project_id": this.projectId}).then(res => {

                        if(res.data.success){
                            swal({
                                text: res.data.msg,
                                icon: "success"
                            })

                        }else{
                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })
                        }

                    })

                },
                changeReportIcon(){
                    if(this.report == "1"){
                        this.report = "0"
                        $("#reportIcon").css("fill", "#000")
                    }else{
                        this.report = "1"
                        $("#reportIcon").css("fill", "#4674b8")
                    }
                },
                drawChart(){

                    this.labels = []
                    this.values = []

                    this.assestmentArray.forEach((data) => {

                        this.labels.push(data.name)
                        this.values.push(data.value)

                    })

                    var ctx = document.getElementById("myChart").getContext('2d');

                    if (this.myChart != undefined || this.myChart !=null) {
                        this.myChart.destroy();
                    }

                    this.myChart = new Chart(ctx, {
                        type: 'horizontalBar',
                        data: {
                            labels: this.labels,
                            datasets: [{
                                data: this.values,
                            }]
                        },
                        options: {
                            legend: {
                            display: false,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        beginAtZero:true,
                                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                                        stepSize: 1
                                    }
                                }]
                            }
                        }
                    });
                },
                upvoteAssestment(upvoteType, upvoteTypeName){

                    var arrayIndex = 0
                    this.assestmentArray.forEach((data, index) => {
                        if(data.name == upvoteTypeName){
                            arrayIndex = index
                        }

                    })
                    

                    axios.post("{{ url('project/assestment-point') }}", {"project_id": this.projectId, "assestmentPointTypeId": upvoteType}).then(res => {

                        if(res.data.action == "add"){
                            this.assestmentArray[arrayIndex].value = this.assestmentArray[arrayIndex].value + 1
                            this.drawChart()
                        }else{
                            this.assestmentArray[arrayIndex].value = this.assestmentArray[arrayIndex].value - 1
                            this.drawChart()
                        }

                    })

                },
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

                }
        
            },
            mounted(){

                let level = JSON.parse('{!! $level !!}')
                this.level = level.level
                this.ages = level.ages

                this.calendarActivities = JSON.parse('{!! $calendarActivities !!}')
                this.upvoteSystems = JSON.parse('{!! $upvoteSystem !!}')
                
                if("{{ strlen($subjects) }}" > 0){
                    this.subjects = ("{!! htmlspecialchars_decode($subjects) !!}").split(",")
                }

                if(("{{ $hashtag }}").length > 0){
                    this.hashtags = ("{!! htmlspecialchars_decode($hashtag) !!}").split(",")
                }

                if(this.like > 0){
                    $("#likeIcon").css("fill", "#4674b8")
                }

                if(this.report > 0){
                    $("#reportIcon").css("fill", "#4674b8")
                }

                if(this.follow > 0){
                    $("#followIcon").css("fill", "#4674b8")
                }

                this.fetchAllInstitutions()

                if (this.showInstitutionStepForm == 1) {
                    $(".stepFormModal").modal('show')
                    this.fetchCountries()
                }

                @if(\Auth::check())

                    this.institution_type = "{{ \Auth::user()->institution ? \Auth::user()->institution->type : ''  }}"

                @endif

                //this.drawChart()

            }

        })
    
</script>

@endpush
