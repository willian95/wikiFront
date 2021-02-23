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
                        <li class="content_template-general-item  last-menu">
                            <div>
                                <h3 class="titulo-templates">
                                    <span>@{{ title }}</span> 
                                </h3>
                                <p><strong>By:</strong></p>
                            </div>
                            <div>
                              <span>Last update</span>
                               <div>
                                11/22/2021
                                </div>
                                <svg class="login_icon  hover-svg"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve"><style type="text/css">

                                    </style><g><g id="Icon-Calendar" transform="translate(30.000000, 478.000000)"><path class="st0" d="M19.6-424h-35.2c-2.4,0-4.4-2-4.4-4.4v-32.3c0-2.4,1.6-4.4,3.7-4.4h2.2v2.9h-2.2     c-0.3,0-0.7,0.6-0.7,1.5v32.3c0,0.8,0.7,1.5,1.5,1.5h35.2c0.8,0,1.5-0.7,1.5-1.5v-32.3c0-0.9-0.5-1.5-0.7-1.5h-2.2v-2.9h2.2     c2,0,3.7,2,3.7,4.4v32.3C24-426,22-424,19.6-424" id="Fill-133" style="fill: #134563;"/><path class="st0" d="M-9.7-459.2c-0.8,0-1.5-0.7-1.5-1.5v-5.9c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v5.9     C-8.3-459.9-8.9-459.2-9.7-459.2" id="Fill-134" style="fill: #134563;"/><path class="st0" d="M13.7-459.2c-0.8,0-1.5-0.7-1.5-1.5v-5.9c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v5.9     C15.2-459.9,14.5-459.2,13.7-459.2" id="Fill-135" style="fill: #134563;"/><polygon class="st0" id="Fill-136" points="-5.3,-465.1 9.3,-465.1 9.3,-462.1 -5.3,-462.1    " style="fill: #134563;"/><polygon class="st0" id="Fill-137" points="-17.1,-456.3 21.1,-456.3 21.1,-453.3 -17.1,-453.3    " style="fill: #134563;"/><polygon class="st0" id="Fill-138" points="15.2,-450.4 18.1,-450.4 18.1,-447.5 15.2,-447.5    " style="fill: #134563;"/><polygon class="st0" id="Fill-139" points="9.3,-450.4 12.3,-450.4 12.3,-447.5 9.3,-447.5    " style="fill: #134563;"/><polygon class="st0" id="Fill-140" points="3.5,-450.4 6.4,-450.4 6.4,-447.5 3.5,-447.5    " style="fill: #134563;"/><polygon class="st0" id="Fill-141" points="-2.4,-450.4 0.5,-450.4 0.5,-447.5 -2.4,-447.5    " style="fill: #134563;"/><polygon class="st0" id="Fill-142" points="-8.3,-450.4 -5.3,-450.4 -5.3,-447.5 -8.3,-447.5    " style="fill: #134563;"/><polygon class="st0" id="Fill-143" points="15.2,-444.5 18.1,-444.5 18.1,-441.6 15.2,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-144" points="9.3,-444.5 12.3,-444.5 12.3,-441.6 9.3,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-145" points="3.5,-444.5 6.4,-444.5 6.4,-441.6 3.5,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-146" points="-2.4,-444.5 0.5,-444.5 0.5,-441.6 -2.4,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-147" points="-8.3,-444.5 -5.3,-444.5 -5.3,-441.6 -8.3,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-148" points="-14.1,-444.5 -11.2,-444.5 -11.2,-441.6 -14.1,-441.6    " style="fill: #134563;"/><polygon class="st0" id="Fill-149" points="15.2,-438.7 18.1,-438.7 18.1,-435.7 15.2,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-150" points="9.3,-438.7 12.3,-438.7 12.3,-435.7 9.3,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-151" points="3.5,-438.7 6.4,-438.7 6.4,-435.7 3.5,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-152" points="-2.4,-438.7 0.5,-438.7 0.5,-435.7 -2.4,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-153" points="-8.3,-438.7 -5.3,-438.7 -5.3,-435.7 -8.3,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-154" points="-14.1,-438.7 -11.2,-438.7 -11.2,-435.7 -14.1,-435.7    " style="fill: #134563;"/><polygon class="st0" id="Fill-155" points="9.3,-432.8 12.3,-432.8 12.3,-429.9 9.3,-429.9    " style="fill: #134563;"/><polygon class="st0" id="Fill-156" points="3.5,-432.8 6.4,-432.8 6.4,-429.9 3.5,-429.9    " style="fill: #134563;"/><polygon class="st0" id="Fill-157" points="-2.4,-432.8 0.5,-432.8 0.5,-429.9 -2.4,-429.9    " style="fill: #134563;"/><polygon class="st0" id="Fill-158" points="-8.3,-432.8 -5.3,-432.8 -5.3,-429.9 -8.3,-429.9    " style="fill: #134563;"/><polygon class="st0" id="Fill-159" points="-14.1,-432.8 -11.2,-432.8 -11.2,-429.9 -14.1,-429.9    " style="fill: #134563;"/></g></g>
                                        <metadata>
                                            <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="1814093,calendar,events,schedule" dc:description="1814093,calendar,events,schedule" dc:publisher="Iconscout" dc:date="2017-02-06" dc:format="image/svg+xml" dc:language="en">
                                                    <dc:creator>
                                                        <rdf:Bag>
                                                            <rdf:li>Evil Icons</rdf:li>
                                                        </rdf:Bag>
                                                    </dc:creator>
                                                </rdf:Description>
                                            </rdf:RDF>
                                        </metadata></svg>

                                        <p>Willian</p>
                            </div> 

                            
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
                        this.likes = this.likes - 1
                        
                        $("#likeIcon").css("fill", "#000")
            
                    }else{
                        this.like = "1"
                        this.likes = this.likes + 1
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
