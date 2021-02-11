@extends("layouts.main")

@section("content")

<div class="container  main-template mt-5 p5" id="own-template">

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
                    <input type="text" class="form-control" v-model="activityDescription">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>
                    <button type="button" class="btn btn-primary" @click="addCalendarDescription()">Save</button>
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
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li><button class="btn btn-custom">Launch</button></li>

                    </ul>
                </div>
            </div>

        </div>
        <!----------------info----------------->
        <div class="col-md-9 info-template">
            <!--------------------general--------------------------->
            <ul style="list-style:none" class="content_template content_template-general">
                <li class="content_template-general-item">
                    <h3 class="titulo-templates">
                        
                        <span v-if="editSection != 'title'">@{{ title }}</span> 
                        <input v-if="editSection == 'title'" type="text" class="form-control" v-model="title">
                        
                        <a class="txt-edit" href="#" @click="setEditSection('title')">
                            <span v-if="editSection != 'title'">Click to edit</span>
                            <span v-if="editSection == 'title'">Click to finish editing</span>
                            <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                        </a>
                    </h3>

                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates" v-if="editSection != 'drivingQuestionTitle'">@{{ drivingQuestionTitle }}</h3>
                    <input v-if="editSection == 'drivingQuestionTitle'" type="text" class="form-control" v-model="drivingQuestionTitle">
                    <a class="txt-edit" href="#" @click="setEditSection('drivingQuestionTitle')">
                        <span v-if="editSection != 'drivingQuestionTitle'">Click to edit</span>
                        <span v-if="editSection == 'drivingQuestionTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit Driving question for whatever Title)</p>
                    
                    <textarea name="" id="drivingQuestionEditor" cols="30" rows="10"></textarea>

                </li>
                <li class="content_template-general-item">
                    <h3 class="titulo-templates" v-if="editSection != 'subjectTitle'">@{{ subjectTitle }}</h3>
                    <input v-if="editSection == 'subjectTitle'" type="text" class="form-control" v-model="subjectTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('subjectTitle')">
                        <span v-if="editSection != 'subjectTitle'">Click to edit</span>
                        <span v-if="editSection == 'subjectTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit Subject(s) for whatever Title)</p>
                    <input type="text" placeholder="asdfg" v-model="subject" v-on:keyup.enter="addSubject()">
                    <div v-for="(subject, index) in subjects">
                        @{{ subject }}
                        <span @click="popSubject(index)">X delete</span>
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates" v-if="editSection != 'timeFrameTitle'">Time Frame</h3>
                    <input v-if="editSection == 'timeFrameTitle'" type="text" class="form-control" v-model="timeFrameTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('timeFrameTitle')">
                        <span v-if="editSection != 'timeFrameTitle'">Click to edit</span>
                        <span v-if="editSection == 'timeFrameTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit Time Frame for whatever Title) </p>
                    <textarea name="" placeholder="3 Week - 5 hours a week" cols="30" rows="1" v-model="timeFrame"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Project summary</h3>
                    <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates" v-if="editSection != 'publicProductTitle'">Public Product (Individual and in Groups)</h3>
                    <input v-if="editSection == 'publicProductTitle'" type="text" class="form-control" v-model="publicProductTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('publicProductTitle')">
                        <span v-if="editSection != 'publicProductTitle'">Click to edit</span>
                        <span v-if="editSection == 'publicProductTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10"></textarea>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates"  v-if="editSection != 'levelTitle'">@{{ levelTitle }}</h3>
                    <input v-if="editSection == 'levelTitle'" type="text" class="form-control" v-model="levelTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('levelTitle')">
                        <span v-if="editSection != 'levelTitle'">Click to edit</span>
                        <span v-if="editSection == 'levelTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inp"></label>
                                <select id="inpt" class="form-control" v-model="level">
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
                            <div class="form-check" @click="addOrPopAges(13)">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    13
                                </label>
                            </div>
                            <div class="form-check" @click="addOrPopAges(15)">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    15
                                </label>
                            </div>
                            <div class="form-check" @click="addOrPopAges(16)">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    16
                                </label>
                            </div>
                            <div class="form-check" @click="addOrPopAges(17)">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    17
                                </label>
                            </div>
                            <div class="form-check" @click="addOrPopAges('18+')">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    +18
                                </label>
                            </div>
                            <div class="form-check" @click="addOrPopAges('all ages')">
                                <input class="form-check-input"  type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    This project is suitable for all age

                                </label>
                            </div>


                        </div>
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">#hashtags</h3>
                    <div v-for="(hashtag, index) in hashtags">
                        @{{ hashtag }}

                        <span @click="popHashtag(index)">X delete</span>
                    </div>
                    <input type="text" placeholder="Type and enter to add each #hashtag" v-model="hashtag" v-on:keyup.enter="addHashtag()">
                </li>

                <button class="btn btn-info" @click="toggleShowSection('tools')">+</button>
                <small v-if="showTools">Feel free to remove this section</small>
                <small v-if="!showTools">Show tools section</small>

                <li class="content_template-general-item" v-if="showTools">

                    <h3 class="titulo-templates"  v-if="editSection != 'toolsTitle'">@{{ toolsTitle }}</h3>
                    <input v-if="editSection == 'toolsTitle'" type="text" class="form-control" v-model="toolsTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('toolsTitle')">
                        <span v-if="editSection != 'toolsTitle'">Click to edit</span>
                        <span v-if="editSection == 'toolsTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <div v-for="(hashtag, index) in hashtags">
                        @{{ hashtag }}

                        <span @click="popHashtag(index)">X delete</span>
                    </div>
                    <input type="text" placeholder="Type and enter to add each #hashtag" v-model="hashtag" v-on:keyup.enter="addHashtag()">
                </li>

                <button class="btn btn-info" @click="toggleShowSection('learningGoals')">+</button>
                <small v-if="showLearningGoals">Feel free to remove this section</small>
                <small v-if="!showLearningGoals">Show learning goals section</small>

                <li class="content_template-general-item" v-if="showLearningGoals">

                    <h3 class="titulo-templates"  v-if="editSection != 'learningGoalsTitle'">@{{ learningGoalsTitle }}</h3>
                    <input v-if="editSection == 'learningGoalsTitle'" type="text" class="form-control" v-model="learningGoalsTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('learningGoalsTitle')">
                        <span v-if="editSection != 'learningGoalsTitle'">Click to edit</span>
                        <span v-if="editSection == 'learningGoalsTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <input type="text" placeholder="Type and enter to add each #hashtag" v-model="learningGoalObjectives" class="form-control">
                </li>

                <button class="btn btn-info" @click="toggleShowSection('resources')">+</button>
                <small v-if="showResources">Feel free to remove this section</small>
                <small v-if="!showResources">Show learning goals section</small>

                <li class="content_template-general-item" v-show="showResources">

                    <h3 class="titulo-templates"  v-if="editSection != 'resourcesTitle'">@{{ resourcesTitle }}</h3>
                    <input v-if="editSection == 'resourcesTitle'" type="text" class="form-control" v-model="resourcesTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('resourcesTitle')">
                        <span v-if="editSection != 'resourcesTitle'">Click to edit</span>
                        <span v-if="editSection == 'resourcesTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <textarea name="" id="resourcesEditor" cols="30" rows="10"></textarea>
                </li>


                <button class="btn btn-info" @click="toggleShowSection('projectMilestone')">+</button>
                <small v-if="showProjectMilestone">Feel free to remove this section</small>
                <small v-if="!showProjectMilestone">Show learning goals section</small>

                <li class="content_template-general-item" v-show="showProjectMilestone">

                    <h3 class="titulo-templates"  v-if="editSection != 'projectMilestoneTitle'">@{{ projectMilestoneTitle }}</h3>
                    <input v-if="editSection == 'projectMilestoneTitle'" type="text" class="form-control" v-model="projectMilestoneTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('projectMilestoneTitle')">
                        <span v-if="editSection != 'projectMilestoneTitle'">Click to edit</span>
                        <span v-if="editSection == 'projectMilestoneTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    <input type="text">
                    <textarea cols="30" rows="10"></textarea>
                </li>

            </ul>
            <!-----------------------END general------------------------>

            <div class="content_template">

                <textarea name="" placeholder="" id="mainEditor" cols="30" rows="10"></textarea>

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
                        <div class="row" v-for="week in weeks">
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


                <button class="btn btn-info" @click="toggleShowSection('expert')">+</button>
                <small v-if="showExpert">Feel free to remove this section</small>
                <small v-if="!showExpert">Show learning goals section</small>

                <li class="content_template-general-item" v-show="showExpert">

                    <h3 class="titulo-templates"  v-if="editSection != 'expertTitle'">@{{ expertTitle  }}</h3>
                    <input v-if="editSection == 'expertTitle'" type="text" class="form-control" v-model="expertTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('expertTitle')">
                        <span v-if="editSection != 'expertTitle'">Click to edit</span>
                        <span v-if="editSection == 'expertTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    
                    <textarea cols="30" rows="10" id="expertEditor"></textarea>
                </li>

                <button class="btn btn-info" @click="toggleShowSection('fieldWork')">+</button>
                <small v-if="showFieldWork">Feel free to remove this section</small>
                <small v-if="!showFieldWork">Show learning goals section</small>

                <li class="content_template-general-item" v-show="showFieldWork">

                    <h3 class="titulo-templates"  v-if="editSection != 'fieldWorkTitle'">@{{ fieldWorkTitle }}</h3>
                    <input v-if="editSection == 'fieldWorkTitle'" type="text" class="form-control" v-model="fieldWorkTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('fieldWorkTitle')">
                        <span v-if="editSection != 'fieldWorkTitle'">Click to edit</span>
                        <span v-if="editSection == 'fieldWorkTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    
                    <textarea cols="30" rows="10" id="fieldWorkEditor"></textarea>
                </li>

                <button class="btn btn-info" @click="toggleShowSection('globalConnection')">+</button>
                <small v-if="showGlobalConnections">Feel free to remove this section</small>
                <small v-if="!showGlobalConnections">Show learning goals section</small>

                <li class="content_template-general-item" v-show="showGlobalConnections">

                    <h3 class="titulo-templates"  v-if="editSection != 'globalConnectionsTitle'">@{{ globalConnectionsTitle }}</h3>
                    <input v-if="editSection == 'globalConnectionsTitle'" type="text" class="form-control" v-model="globalConnectionsTitle">
                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('globalConnectionsTitle')">
                        <span v-if="editSection != 'globalConnectionsTitle'">Click to edit</span>
                        <span v-if="editSection == 'globalConnectionsTitle'">Click to finish editing</span>
                        <img alt='icon' class="icnon-edit" src="{{ url('assets/img/iconos/edit-pinc.svg') }}">
                    </a>
                    <p>(you can edit this for whatever Title)
                    </p>
                    
                    <textarea cols="30" rows="10" id="globalConnectionEditor"></textarea>
                </li>


                <div class="contente_item">
                    <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                    <textarea name="" lang="" placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10"></textarea>
                </div>

                <div>
                    <h1>Which Upvote System
                        options will your WikiPBL
                        have?
                    </h1>
                    <div class="col-md-6">
                        @foreach(App\AssestmentPointType::get() as $point)
                        <i class="{{ $point->icon }}"></i>
                        <div class="form-check" @click="addOrPopUpVoteSystems('{{ $point->id }}')">
                            
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $point->name }}
                            </label>
                        </div>
                        @endforeach
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push("script")

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    const create = new Vue({
        el: '#own-template',
        data() {
            return {
                title:"wikiPBL Title",
                drivingQuestionTitle:"Driving question",
                drivingQuestion:"",
                subjectTitle:"Subject (s)",
                subject:"",
                subjects:[],
                timeFrameTitle:"Time Frame",
                timeFrame:"",
                publicProductTitle:"Public Product (Individual And In Groups)",
                publicProduct:"",
                levelTitle:"Level & age",
                level:"",
                ages:[],
                hashtag:"",
                hashtags:[],
                calendarActivities:[],
                activityDescription:"",
                days:5,
                weeks:4,
                calendarDay:"",
                calendarWeek:"",
                upvoteSystems:[],
                editSection:"",
                toolsTitle:"Tools/Software/Skills required",
                showTools:true,
                tools:[],
                learningGoalsTitle:"Learning Goals",
                showLearningGoals:true,
                learningGoalObjectives:"",
                learningGoals:[],
                resourcesTitle:"Resources",
                showResources:true,
                showProjectMilestone:true,
                projectMilestoneTitle:"Project Milestones",
                expertTitle:"Expert",
                showExpert:true,
                fieldWorkTitle:"Field Work",
                showFieldWork:true,
                globalConnectionsTitle:"Global connection/Groups of students needed/wanted",
                showGlobalConnections:true

            }
        },
        methods:{

            setEditSection(section){

                if(this.editSection != section){
                    this.editSection = section
                }else{
                    this.editSection = ""
                }

            },
            addOrPopAges(age){
                
                if(!this.ages.includes(age)){

                    this.ages.push(age)

                }else{

                    let index = this.ages.findIndex(data => data == age)
                    this.ages.splice(index, 1)

                }

            },
            addOrPopUpVoteSystems(upvoteType){
                
                if(!this.upvoteSystems.includes(upvoteType)){

                    this.upvoteSystems.push(upvoteType)

                }else{

                    let index = this.upvoteSystems.findIndex(data => data == upvoteType)
                    this.upvoteSystems.splice(index, 1)

                }

            },
            addSubject(){

                if(this.subject != ""){
                    this.subjects.push(this.subject)
                    this.subject = ""
                }
                

            },
            popSubject(index){

                this.subjects.splice(index, 1)

            },
            addHashtag(){

                if(this.hashtag != ""){
                    this.hashtags.push(this.hashtag)
                    this.hashtag = ""
                }


            },
            popHashtag(index){

                this.hashtags.splice(index, 1)

            },
            setWeekAndDay(week, day){

                this.calendarDay = day
                this.calendarWeek = week

            },
            addCalendarDescription(){

                if(this.activityDescription != ""){

                    let activity = {
                        "week": this.calendarWeek,
                        "day": this.calendarDay,
                        "description": this.activityDescription
                    }

                    this.calendarActivities.push(activity)
                    this.activityDescription = ""
                    this.weeks = 4

                    $("#modalClose").click();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '0px');
                    $('.modal-backdrop').remove();

                }

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
            toggleShowSection(section){

                if(section == "tools"){

                    if(this.showTools == true){
                        this.showTools = false
                    }else{
                        this.showTools = true
                    }

                }else if(section == "learningGoals"){

                    if(this.showLearningGoals == true){
                        this.showLearningGoals = false
                    }else{
                        this.showLearningGoals = true
                    }

                }else if(section == "resources"){

                    if(this.showResources == true){
                        this.showResources = false
                    }else{
                        this.showResources = true
                    }

                }else if(section == "projectMilestone"){

                    if(this.showProjectMilestone == true){
                        this.showProjectMilestone = false
                    }else{
                        this.showProjectMilestone = true
                    }

                }else if(section == "expert"){

                    if(this.showExpert == true){
                        this.showExpert = false
                    }else{
                        this.showExpert = true
                    }

                }else if(section == "globalConnection"){
                    
                    if(this.showGlobalConnections == true){
                        this.showGlobalConnections = false
                    }else{
                        this.showGlobalConnections = true
                    }

                }
            }

        },
        mounted(){

            CKEDITOR.replace('drivingQuestionEditor');
            CKEDITOR.replace("projectSummaryEditor")
            CKEDITOR.replace("publicProductEditor")
            CKEDITOR.replace("bibliographyEditor")
            CKEDITOR.replace("mainEditor")
            CKEDITOR.replace("resourcesEditor")
            CKEDITOR.replace("expertEditor")
            CKEDITOR.replace("fieldWorkEditor")
            CKEDITOR.replace("globalConnectionEditor")

        }

    })

</script>

@endpush
