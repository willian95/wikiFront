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
                                            <option value="no-apply">Doesn’t Apply
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-0" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    0
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-2" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    2
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-3" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    3
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-13" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    13
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-14" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    14
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check" >
                                                <input class="form-check-input" type="checkbox" value="" id="age-16" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    16
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="age-17" disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    17
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="age-18" disabled>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            +18
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"  type="checkbox" value="" id="allages" disabled>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            This project is suitable for all age

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

<script>
    const create = new Vue({
        el: '#own-template',
        data() {
            return {
                projectId: "{{ $id }}",
                title:"{{ $title }}",
                drivingQuestionTitle:"{{ $drivingQuestionTitle }}",
                subjectTitle:"{{ $subjectTitle }}",
                subject:"",
                subjects:("{{ $subjects }}").split(","),
                timeFrameTitle:"{{ $timeFrameTitle }}",
                timeFrame:"{{ $timeFrame }}",
                publicProductTitle:"{{ $publicProductTitle }}",
                levelTitle:"{!! htmlspecialchars_decode($levelTitle) !!}",
                level:"",
                ages:[],
                hashtag:"",
                hashtags:("{{ $hashtag }}").split(","),
                calendarActivities:[],
                activityDescription:"",
                days:5,
                weeks:4,
                calendarDay:"",
                calendarWeek:"",
                loading:false
            }
        },
        methods:{


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

            }
            

        },
        mounted(){

            let level = JSON.parse('{!! $level !!}')
            this.level = level.level
            this.ages = level.ages
            this.setCheckedAges()

            this.calendarActivities = JSON.parse('{!! $calendarActivities !!}')
            this.upvoteSystems = JSON.parse('{!! $upvoteSystem !!}')

        }

    })
    
</script>

@endpush
