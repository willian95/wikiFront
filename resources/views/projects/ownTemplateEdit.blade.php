@extends("layouts.project")

@section("content")

<div id="own-template">
    @include("partials.projectHeader", ["projectAction" => "edition"])
    <div class="container">
        <div class="container  main-template mt-5">

            <div class="modal fade" id="calendarDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
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
        </div>


        <div class="row">
            <div class="col-md-3">
                <div class="menu-template">
                    <p>Edit mode </p>
                    <div class="menu-template_option" style="overflow-y: auto; height: 260px;">
                        <ul>
                            <p>Main info</p>
                            <li> <a style="cursor: pointer;" @click="scrollTo('title-p')"> @{{ title }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('driving')">@{{ drivingQuestionTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('subjecttitle')">@{{ subjectTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('time')">@{{ timeFrameTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('projectsumary')">Project Summary</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('publictitle')">@{{ publicProductTitle }}</a> </li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('leveltitle')">@{{ levelTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')">#hashtags</a></li>

                        </ul>
                    </div>
                    <div class="menu-template_option">
                        <ul>
                            <p>Main info</p>
                            @if($project[0]->status == 'pending')
                            <li><button class="btn btn-custom" @click="launch()">Launch</button></li>
                            @else
                            <li><button class="btn btn-custom" @click="launch()">Update</button></li>
                            @endif

                        </ul>
                    </div>
                </div>

            </div>
            <!----------------info----------------->
            <div class="col-md-9 info-template">
                <!--------------------general--------------------------->
                <ul class="content_template content_template-general">
                    <li class="content_template-general-item" style="margin-top: 100px;">
                        <h3 class="titulo-templates">

                            <span id="title-p" v-if="editSection != 'title'">@{{ title }}</span>
                            <input v-if="editSection == 'title'" type="text" class="form-control" v-model="title">

                            <a class="txt-edit" href="#" @click="setEditSection('title')">
                                <span v-if="editSection != 'title'">Click to edit</span>
                                <span v-if="editSection == 'title'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </h3>

                    </li>

                    <li class="content_template-general-item">

                        <div class="flex-edit">
                            <h3 class="titulo-templates" id="driving" v-if="editSection != 'drivingQuestionTitle'">@{{ drivingQuestionTitle }}</h3>
                            <input v-if="editSection == 'drivingQuestionTitle'" type="text" class="form-control" v-model="drivingQuestionTitle">
                            <a class="txt-edit" href="#" @click="setEditSection('drivingQuestionTitle')">
                                <span v-if="editSection != 'drivingQuestionTitle'">Click to edit</span>
                                <span v-if="editSection == 'drivingQuestionTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </div>

                        <p class="subtitule_txt">(you can edit Driving question for whatever Title)</p>

                        <textarea name="" id="drivingQuestionEditor" cols="30" rows="10">{!! $drivingQuestion !!}</textarea>

                    </li>
                    <li class="content_template-general-item" id="subjecttitle">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'subjectTitle'">@{{ subjectTitle }}</h3>
                            <input v-if="editSection == 'subjectTitle'" type="text" class="form-control" v-model="subjectTitle">
                            <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('subjectTitle')">
                                <span v-if="editSection != 'subjectTitle'">Click to edit</span>
                                <span v-if="editSection == 'subjectTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </div>


                        <p class="subtitule_txt">(you can edit Subject(s) for whatever Title)</p>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" v-model="subject" class="form-control" v-on:keyup.enter="addSubject()">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div v-for="(subject, index) in subjects" class="col-md-3">
                                <div class="card">
                                    <div class="card-body">

                                        @{{ subject }}
                                        <span class="float: right;" style="cursor: pointer" @click="popSubject(index)">X</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" id="time">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'timeFrameTitle'">Time Frame</h3>
                            <input v-if="editSection == 'timeFrameTitle'" type="text" class="form-control" v-model="timeFrameTitle">
                            <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('timeFrameTitle')">
                                <span v-if="editSection != 'timeFrameTitle'">Click to edit</span>
                                <span v-if="editSection == 'timeFrameTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </div>


                        <p class="subtitule_txt">(you can edit Time Frame for whatever Title) </p>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="3 Week - 5 hours a week" v-model="timeFrame">
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" id="projectsumary">
                        <h3 class="titulo-templates">Project summary</h3>
                        <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10">{!! $projectSumary !!}</textarea>
                    </li>

                    <li class="content_template-general-item" id="publictitle">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'publicProductTitle'">@{{ publicProductTitle }}</h3>
                            <input v-if="editSection == 'publicProductTitle'" type="text" class="form-control" v-model="publicProductTitle">
                            <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('publicProductTitle')">
                                <span v-if="editSection != 'publicProductTitle'">Click to edit</span>
                                <span v-if="editSection == 'publicProductTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </div>


                        <p class="subtitule_txt">(you can edit this for whatever Title)
                        </p>
                        <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10">{!! $publicProduct !!}</textarea>
                    </li>

                    <li class="content_template-general-item" id="leveltitle">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'levelTitle'">@{{ levelTitle }}</h3>
                            <input v-if="editSection == 'levelTitle'" type="text" class="form-control" v-model="levelTitle">
                            <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('levelTitle')">
                                <span v-if="editSection != 'levelTitle'">Click to edit</span>
                                <span v-if="editSection == 'levelTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>
                        </div>


                        <p class="subtitule_txt">(you can edit this for whatever Title)
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inp"></label>
                                    <select id="inpt" class="form-control" v-model="level" @change="popAllAges()">
                                        <option value="">Choose your level </option>
                                        <option value="nursery">Nursery </option>
                                        <option value="early">Early Childhood </option>
                                        <option value="primary">Primary/Elementary School</option>
                                        <option value="middle">Middle School</option>
                                        <option value="high">High School</option>
                                        <option value="undergraduate">Undergraduate</option>
                                        <option value="masters">Masters</option>
                                        <option value="phd">PhD</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" v-show="level == 'nursery'">

                                    <div class="col-6" v-for="nurseryLevel in 4">
                                        <div class="form-check" @click="addOrPopAges(nurseryLevel - 1)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(nurseryLevel-1)" value="" :id="'age-'+(nurseryLevel-1)">
                                            <label class="form-check-label">
                                                @{{ nurseryLevel - 1 }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'early'">

                                    <div class="col-6" v-for="earlyLevel in 6" v-if="earlyLevel > 3">
                                        <div class="form-check" @click="addOrPopAges(earlyLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(earlyLevel)" value="" :id="'age-'+earlyLevel">
                                            <label class="form-check-label">
                                                @{{ earlyLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'primary'">

                                    <div class="col-6" v-for="primaryLevel in 10" v-if="primaryLevel > 6">
                                        <div class="form-check" @click="addOrPopAges(primaryLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(primaryLevel)" value="" :id="'age-'+primaryLevel">
                                            <label class="form-check-label">
                                                @{{ primaryLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'middle'">

                                    <div class="col-6" v-for="middleLevel in 13" v-if="middleLevel > 10">
                                        <div class="form-check" @click="addOrPopAges(middleLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(middleLevel)" value="" :id="'age-'+middleLevel">
                                            <label class="form-check-label">
                                                @{{ middleLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'high'">

                                    <div class="col-6" v-for="highLevel in 18" v-if="highLevel > 14">
                                        <div class="form-check" @click="addOrPopAges(highLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(highLevel)" value="" :id="'age-'+highLevel">
                                            <label class="form-check-label">
                                                @{{ highLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-check" @click="addOrPopAges('18+')" v-show="level == 'undergraduate' || level == 'masters' || level == 'phd'">
                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest('18+')" value="" id="age-18">
                                    <label class="form-check-label">
                                        +18
                                    </label>
                                </div>
                                <div class="form-check" @click="addOrPopAges('all ages')" v-show="level != ''">
                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest('all ages')" value="" id="noapply">
                                    <label class="form-check-label">
                                        Doesn't apply
                                    </label>
                                </div>


                            </div>

                        </div>
                    </li>

                    <li class="content_template-general-item" id="hashtags-menu">
                        <h3 class="titulo-templates">#hashtags</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Type and enter to add each #hashtag" v-model="hashtag" v-on:keyup.enter="addHashtag()">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div v-for="(hashtag, index) in hashtags" class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        #@{{ hashtag }}

                                        <span style="pointer" @click="popHashtag(index)">X</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>

                </ul>
                <!-----------------------END general------------------------>

                <div class="content_template">

                    <textarea name="" placeholder="" id="mainEditor" cols="30" rows="10">{!! $mainInfo !!}</textarea>

                    <div class="contente_item mt-5 mb-5">
                        <h3 class="titulo-templates">Calendar of activities </h3>

                        <div class="container-fluid">

                            <div class="row">
                                        
                                <label for="inp">Weeks</label>
                                <select id="inpt" class="form-control" v-model="weeks">
                                    <option v-for="week in 18" :value="week" v-if="week > 0">@{{ week }} </option>
                                </select>
                                
                            </div>

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
                        <textarea name="" lang="" placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10">{!! $bibliography !!}</textarea>
                    </div>

                    @if($project[0]->status == 'pending')
                    <div>
                        <h1 class="mt-5">Which Upvote System
                            options will your wikiPBL
                            have?
                        </h1>
                        <div class="row">
                            @foreach(App\AssestmentPointType::get() as $point)
                            <div class="col-md-6">

                                <i class="{{ $point->icon }}"></i>
                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" value="" id="index-{{ $point->id }}" @click="addOrPopUpVoteSystems('{{ $point->id }}')">
                                    <label class="form-check-label" for="index-{{ $point->id }}">
                                        {{ $point->name }}
                                    </label>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-estyle">
        <div class="footer container mt-5 text-center">
            <p> <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a> - <a data-toggle="modal" data-target=".terms">Terms & Conditions</a> - <a href="#">About wikiPBL</a> - 2021
                Copyrights - Contact us! </p>
        </div>
    </footer>
</div>
</div>

@endsection

@push("script")

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>

<script>
    const create = new Vue({
        el: '#own-template',
        data() {
            return {
                projectId: "{{ $id }}",
                title: "{!! htmlspecialchars_decode($title) !!}",
                drivingQuestionTitle: "{!! htmlspecialchars_decode($drivingQuestionTitle) !!}",
                subjectTitle: "{!! htmlspecialchars_decode($subjectTitle) !!}",
                subject: "",
                subjects: "",
                timeFrameTitle: "{!! htmlspecialchars_decode($timeFrameTitle) !!}",
                timeFrame: "{!! htmlspecialchars_decode($timeFrame) !!}",
                publicProductTitle: "{!! htmlspecialchars_decode($publicProductTitle) !!}",
                levelTitle: "{!! htmlspecialchars_decode($levelTitle) !!}",
                level: "",
                ages: [],
                hashtag: "",
                hashtags: "",
                calendarActivities: [],
                activityDescription: "",
                days: 5,
                weeks: parseInt("{{ $project[0]->number_of_weeks }}"),
                calendarDay: "",
                calendarWeek: "",
                upvoteSystems: [],
                editSection: "",
                lastSave: "",
                private: JSON.parse('{!! $project[0]->is_private !!}'),
                isIncubator:"{{ $project[0]->is_incubator }}",
                loading: false
            }
        },
        methods: {

            setEditSection(section) {

                if (this.editSection != section) {
                    this.editSection = section
                } else {
                    this.editSection = ""
                }

            },
            addOrPopAges(age) {

                if (!this.ages.includes(age)) {

                    this.ages.push(age)

                } else {

                    let index = this.ages.findIndex(data => data == age)
                    this.ages.splice(index, 1)

                }

            },
            addOrPopUpVoteSystems(upvoteType) {

                if (!this.upvoteSystems.includes(upvoteType)) {

                    this.upvoteSystems.push(upvoteType)

                } else {

                    let index = this.upvoteSystems.findIndex(data => data == upvoteType)
                    this.upvoteSystems.splice(index, 1)

                }

            },
            addSubject() {

                if (this.subject != "") {
                    this.subjects.push(this.subject)
                    this.subject = ""
                }


            },
            popSubject(index) {

                this.subjects.splice(index, 1)

            },
            addHashtag() {

                if (this.hashtag != "") {
                    this.hashtags.push(this.hashtag)
                    this.hashtag = ""
                }


            },
            popHashtag(index) {

                this.hashtags.splice(index, 1)

            },
            setWeekAndDay(week, day) {

                this.activityDescription = ""
                this.calendarDay = day
                this.calendarWeek = week

                this.calendarActivities.forEach(data => {

                    if (data.week == week && data.day == day) {
                        this.activityDescription = data.description
                    }

                })

            },
            addCalendarDescription() {

                //if(this.activityDescription != ""){

                let activity = {
                    "week": this.calendarWeek,
                    "day": this.calendarDay,
                    "description": this.activityDescription
                }

                this.calendarActivities.push(activity)
                this.activityDescription = ""
                this.weeks = this.weeks

                $("#calendarDescription").modal('hide')
                $('.modal-backdrop').remove();

                //}

            },
            showActivity(week, day) {


                var activity = null
                this.calendarActivities.forEach((data) => {

                    if (data.week == week && data.day == day) {
                        activity = data
                    }

                })

                if (activity) {
                    return activity.description
                }

            },
            launch() {

                if (this.validateLaunch()) {

                    this.loading = true
                    let formData = this.setFormData()

                    axios.post("{{ url('project/creation/launch') }}", formData).then(res => {
                        this.loading = false
                        if (res.data.success == true) {

                            swal({
                                text: "Project succesfully updated",
                                icon: "success"
                            }).then(() => {

                                window.location.href = "{{ url('/teacher/profile') }}"

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false
                        swal({
                            text: "Something went wrong",
                            icon: "error"
                        })

                    })

                }

            },
            saveEditionProject() {

                let formData = this.setFormData()

                axios.post("{{ url('project/edition/save') }}", formData).then(res => {

                    this.saveDate()

                })

            },
            saveDate() {

                let today = new Date();
                let dd = String(today.getDate()).padStart(2, '0');
                let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                let yyyy = today.getFullYear();
                let hour = today.getHours();
                let minutes = today.getMinutes();

                this.lastSave = mm + '/' + dd + '/' + yyyy + " " + hour + " : " + minutes;

            },
            setFormData() {

                let level = {
                    "level": this.level,
                    "ages": this.ages
                }

                let formData = new FormData
                formData.append("projectId", this.projectId)
                formData.append("title", this.title)
                formData.append("drivingQuestionTitle", this.drivingQuestionTitle)
                formData.append("drivingQuestion", CKEDITOR.instances.drivingQuestionEditor.getData())
                formData.append("timeFrameTitle", this.timeFrameTitle)
                formData.append("timeFrame", this.timeFrame)
                formData.append("projectSumaryTitle", "Project Sumary")
                formData.append("projectSumary", CKEDITOR.instances.projectSummaryEditor.getData())
                formData.append("publicProductTitle", this.publicProductTitle)
                formData.append("publicProduct", CKEDITOR.instances.publicProductEditor.getData())
                formData.append("mainInfoTitle", "mainInfo")
                formData.append("mainInfo", CKEDITOR.instances.mainEditor.getData())
                formData.append("bibliographyTitle", "bibliography")
                formData.append("bibliography", CKEDITOR.instances.bibliographyEditor.getData())
                formData.append("subjectTitle", this.subjectTitle)
                formData.append("subject", this.subjects)
                formData.append("levelTitle", this.levelTitle)
                formData.append("level", JSON.stringify(level))
                formData.append("hashtagTitle", "hashtag")
                formData.append("hashtag", this.hashtags)
                formData.append("calendarActivitiesTitle", "calendarActivities")
                formData.append("calendarActivities", JSON.stringify(this.calendarActivities))
                formData.append("upvoteSystemTitle", "upvoteSystem")
                formData.append("upvoteSystem", JSON.stringify(this.upvoteSystems))
                formData.append("is_private", this.private)
                formData.append("number_of_weeks", this.weeks)

                return formData

            },
            validateLaunch() {

                if(this.isIncubator == 1){
                    return true;
                }

                if (this.title == "") {
                    swal({
                        text: "Title is required",
                        icon: "error"
                    })
                    return false
                } else if (this.drivingQuestionTitle == "") {
                    swal({
                        text: "Driving question title is required",
                        icon: "error"
                    })
                    return false
                } else if (CKEDITOR.instances.drivingQuestionEditor.getData() == "") {
                    swal({
                        text: "Driving question is required",
                        icon: "error"
                    })
                    return false
                } else if (this.subjectTitle == "") {
                    swal({
                        text: "Subject title is required",
                        icon: "error"
                    })
                    return false
                } else if (this.subjects.length == 0) {
                    swal({
                        text: "You have to add subjects to continue",
                        icon: "error"
                    })
                    return false
                } else if (this.timeFrameTitle == "") {
                    swal({
                        text: "Time frame title is required",
                        icon: "error"
                    })
                    return false
                } else if (this.timeFrame == "") {
                    swal({
                        text: "Time frame is required",
                        icon: "error"
                    })
                    return false
                } else if (CKEDITOR.instances.projectSummaryEditor.getData() == "") {
                    swal({
                        text: "Project summary is required",
                        icon: "error"
                    })
                    return false
                } else if (this.publicProductTitle == "") {
                    swal({
                        text: "Public product title is required",
                        icon: "error"
                    })
                    return false
                } else if (CKEDITOR.instances.publicProductEditor.getData() == "") {
                    swal({
                        text: "Public product is required",
                        icon: "error"
                    })
                    return false
                } else if (this.levelTitle == "") {
                    swal({
                        text: "Level title is required",
                        icon: "error"
                    })
                    return false
                } else if (this.level == "") {
                    swal({
                        text: "Level is required",
                        icon: "error"
                    })
                    return false
                } else if (this.ages.length == 0) {
                    swal({
                        text: "You have to add ages to continue",
                        icon: "error"
                    })
                    return false
                } else if (this.hashtags.length == 0) {
                    swal({
                        text: "You have to add hashtags to continue",
                        icon: "error"
                    })
                    return false
                } else if (CKEDITOR.instances.mainEditor.getData() == "") {
                    swal({
                        text: "Main info is required",
                        icon: "error"
                    })
                    return false
                } else if (this.calendarActivities.length == 0) {
                    swal({
                        text: "You have to add activities to continue",
                        icon: "error"
                    })
                    return false
                } else if (CKEDITOR.instances.bibliographyEditor.getData() == "") {
                    swal({
                        text: "Bibliography is required",
                        icon: "error"
                    })
                    return false
                } else if (this.upvoteSystems.length == 0) {
                    swal({
                        text: "You have to add upvote systems to continue",
                        icon: "error"
                    })
                    return false
                }

                return true

            },
            setCheckedUpvoteSystems() {

                this.upvoteSystems.forEach((data) => {

                    document.getElementById("index-" + data).checked = true;
                })

            },
            checkTest(age) {
                var exists = false
                this.ages.forEach((data) => {
                    if (data == age) {
                        exists = true
                    }
                })

                return exists
            },
            popAllAges() {

                this.ages = []
                $(".check-age").attr("checked", false)

            },
            scrollTo(identifier){

                let distance = $("#"+identifier).offset().top - 120

                $('html, body').animate({
                    scrollTop: distance
                }, 50);

            },
            showCKEditorAlert(){

                if(window.localStorage.getItem("showCKEditorMsg") != null){

                    swal({
                        "text": window.localStorage.getItem("showCKEditorMsg"),
                        "icon": "success"
                    })

                    window.localStorage.removeItem("showCKEditorMsg")

                }

            }


        },
        mounted() {

            let options = {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form',
                language: "en"
            }

            CKEDITOR.replace('drivingQuestionEditor', options);
            CKEDITOR.replace("projectSummaryEditor", options)
            CKEDITOR.replace("publicProductEditor", options)
            CKEDITOR.replace("bibliographyEditor", options)
            CKEDITOR.replace("mainEditor", options)

            let level = JSON.parse('{!! $level !!}')
            this.level = level.level
            this.ages = level.ages
            //this.setCheckedAges()

            this.calendarActivities = JSON.parse('{!! $calendarActivities !!}')
            this.upvoteSystems = JSON.parse('{!! $upvoteSystem !!}')
            if ("{{ $project[0]->status }}" == "pending") {
                this.setCheckedUpvoteSystems()
            }


            if ("{{ strlen($subjects) }}" > 0) {
                this.subjects = ("{!! htmlspecialchars_decode($subjects) !!}").split(",")
            }else{
                this.subjects = []
            }

            if (("{{ $hashtag }}").length > 0) {
                this.hashtags = ("{!! htmlspecialchars_decode($hashtag) !!}").split(",")
            }else{
                this.hashtags = []
            }

            window.setInterval(() => {
                this.saveEditionProject()
            }, 120000)

            window.setInterval(() => {
                this.showCKEditorAlert()
            }, 1000)

        }

    })
</script>

@endpush