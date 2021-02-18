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

            <div class="row">
                <div class="col-md-3">
                    <div class="menu-template">
                        <p>Edit mode </p>
                        <div class="menu-template_option">
                            <ul>
                                <p>Main info</p>
                                <li> @{{ title }}</li>
                                <li> @{{ drivingQuestionTitle }}</li>
                                <li> @{{ subjectTitle }}</li>
                                <li> @{{ timeFrameTitle }}</li>
                                <li>Project Summary</li>
                                <li> @{{ publicProductTitle }}</li>
                                <li> @{{ levelTitle }}</li>
                                <li> #hashtags</li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!----------------info----------------->
                <div class="col-md-9 info-template">

                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-md-4">
                                @foreach($assestmentPoints as $point)
                                    <p>
                                        <button class="btn btn-success" @click="upvoteAssestment({{$point->assestmentPointType->id}}, '{!! htmlspecialchars_decode($point->assestmentPointType->name) !!}')">
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
                    </div>

                    <!--------------------general--------------------------->
                    <ul class="content_template content_template-general">
                        <li class="content_template-general-item">
                            <h3 class="titulo-templates">
                                
                                <span>@{{ title }}</span> 
                                
                            </h3>

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

                        <div class="contente_item">
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
                                            <div class="card-body">
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
                    follow:"{{ App\ProjectShare::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() }}",
                    like:"{{ App\Like::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() }}",
                    report:"{{ App\ProjectReport::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() }}",
                    assestmentArray:JSON.parse('{!! $assestmentPointsArray !!}'),
                    loading:false,
                    myChart:null,
                    labels:[],
                    values:[]
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
                    }else{
                        this.follow = "1"
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
                    }else{
                        this.like = "1"
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
                    }else{
                        this.report = "1"
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

            this.drawChart()

        }

    })
    
</script>

@endpush
