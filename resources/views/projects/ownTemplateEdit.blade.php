@extends("layouts.project")

@section("content")

<style>
    .modal-backdrop.show {
        opacity: 0 !important;
        z-index: 0 !important;
    }
</style>

<div id="own-template">
    @include("partials.projectHeader", ["projectAction" => "edition"])
    <div class="container">
        <div class="container  main-template mt-5">

            <div class="modal fade calendarDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Activity description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <textarea type="text" class="form-control heith-input" maxlength="500" v-model="activityDescription" name="" id="" cols="30" rows="10"></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>
                            <button type="button" class="btn btn-primary" @click="addCalendarDescription()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" v-cloak>
            <div class="col-md-3" v-cloak>
                <div class="menu-template">
                    <p>Edit mode </p>
                    <div class="menu-template_option" style="overflow-y: auto; height: 260px;">
                        <ul>
                            <p>Main info</p>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('title-p')"><i class="fa fa-times" aria-hidden="true" v-if="title == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="title != '' || isIncubator == true"></i> @{{ title }}</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('driving')"><i class="fa fa-times" aria-hidden="true" v-if="drivingQuestion == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="drivingQuestion != '' || isIncubator == true"></i>@{{ drivingQuestionTitle }}</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('subjecttitle')"><i class="fa fa-times" aria-hidden="true" v-if="subjects.length == 0 && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="subjects.length > 0 || isIncubator == true"></i>@{{ subjectTitle }}</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('time')"><i class="fa fa-times" aria-hidden="true" v-if="timeFrame == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="timeFrame != '' || isIncubator == true"></i>@{{ timeFrameTitle }}</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('projectsumary')"><i class="fa fa-times" aria-hidden="true" v-if="projectSumary == ''"></i> <i class="fa fa-check" aria-hidden="true" v-if="projectSumary != ''"></i>Project Summary</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('publictitle')"><i class="fa fa-times" aria-hidden="true" v-if="publicProduct == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="publicProduct != '' || isIncubator == true"></i>@{{ publicProductTitle }}</a> </li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('leveltitle')"><i class="fa fa-times" aria-hidden="true" v-if="level == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="level != '' || isIncubator == true"></i>@{{ levelTitle }}</a></li>
                            <li v-cloak> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')"><i class="fa fa-times" aria-hidden="true" v-if="hashtags.length == 0 && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="hashtags.length > 0 || isIncubator == true"></i>#hashtags</a></li>

                        </ul>
                    </div>
                    <div class="menu-template_option menu-template_option-btn">
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
                @if($project[0]->status == 'pending')
                <button class="btn btn-custom launch-xs" @click="launch()">Launch</button>
                @else
                <button class="btn btn-custom launch-xs" @click="launch()">Update</button>

                @endif
            </div>
            <!----------------info----------------->
            <div class="col-md-12 col-lg-9 info-template" v-cloak>


                <!--------------------general--------------------------->
                <ul class="content_template content_template-general">

                    @if(\Auth::user()->id == $project[0]->user_id)
                    <li class="content_template-general-item incubator-top">
                        <h3 class="titulo-templates">Incubator Features</h3>
                        <div class="help-icon" @click="showHelp('incubator')">
                            <img src="{{ url('assets/img/help.png') }}" alt="">


                        </div>
                        <p class="help-icon-p" v-show="incubatorHelp">If you have a project idea without all the details, don’t
                            hold back, be brave and get it out there. Our world of
                            wikiPBL educators love taking projects from idea to
                            Awesome!
                        </p>
                        <div class="flex-custom--icon">
                            <img alt='icon' class="login_icon incubator" src="http://imgfz.com/i/DmsV3CK.png">
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox" v-model="isIncubator">
                                <span class="slider slider-nav round"></span>
                            </label>
                            <div>
                                <p><strong><small>Mark your <strong>wikiPBL</strong> as an “incubator” when you have an awesome idea but want help building upon your “ground floor” ideas. Think big!</small></strong></p>
                            </div>
                        </div>

                    </li>
                    @endif

                    <li class="content_template-general-item edit-top" @mouseleave="testChange()">
                        <h3 class="titulo-templates">

                            <span id="title-p" v-if="editSection != 'title'" v-cloak>@{{ title }}</span>
                            <input v-if="editSection == 'title'" type="text" class="form-control" v-model="title">

                            <a class="txt-edit" style="cursor:pointer;" @click="setEditSection('title')">
                                <span v-if="editSection != 'title'"></span>
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

                    <li class="content_template-general-item" @mouseleave="testChange()">

                        <div class="flex-edit">
                            <h3 class="titulo-templates" id="driving" v-if="editSection != 'drivingQuestionTitle'" v-cloak>@{{ drivingQuestionTitle }}</h3>
                            <input v-if="editSection == 'drivingQuestionTitle'" type="text" class="form-control" v-model="drivingQuestionTitle">

                            <div class="help-icon" @click="showHelp('drivingQuestion')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">


                            </div>
                        </div>
                        <p class="help-icon-p" v-show="drivingQuestionHelp">An open-ended question that guides students'
                            thinking and learning, empowering their explorations
                            during PBL

                        </p>
                        <!--<p class="subtitule_txt">(you can edit Driving question for whatever Title)</p>-->

                        <textarea name="" id="drivingQuestionEditor" cols="30" rows="10">{!! $drivingQuestion !!}</textarea>

                    </li>
                    <li class="content_template-general-item" id="subjecttitle" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'subjectTitle'" v-cloak>@{{ subjectTitle }}</h3>
                            <input v-if="editSection == 'subjectTitle'" type="text" class="form-control" v-model="subjectTitle">
                            <!--<a class="txt-edit" style="cursor: pointer;" @click="setEditSection('subjectTitle')">
                                <span v-if="editSection != 'subjectTitle'"></span>
                                <span v-if="editSection == 'subjectTitle'">Click to finish editing</span>
                                <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <g data-name="edit">
                                            <rect width="24" height="24" opacity="0" />
                                            <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                        </g>
                                    </g>
                                </svg>

                            </a>-->
                            <div class="help-icon" @click="showHelp('subjectTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>

                        <p class="help-icon-p" v-show="subjectTitleHelp">What subjects (content areas) does your project address/emphasize?
                        </p>
                        <!--<p class="subtitule_txt">(you can edit Subject(s) for whatever Title)</p>-->

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" v-model="subject" class="form-control" v-on:keyup.enter="addSubject()" placeholder="Type and press enter to add your subject">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div v-for="(subject, index) in subjects" class="col-md-3">
                                <div class="card">
                                    <div class="card-body" v-cloak>

                                        @{{ subject }}
                                        <span class="float: right;" style="cursor: pointer" @click="popSubject(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" id="time" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'timeFrameTitle'">Time Frame</h3>
                            <input v-if="editSection == 'timeFrameTitle'" type="text" class="form-control" v-model="timeFrameTitle">

                            <div class="help-icon" @click="showHelp('timeFrame')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>

                        <p class="help-icon-p" v-show="timeFrameHelp">How long do you think your project will take?
                        </p>
                        <!--<p class="subtitule_txt">(you can edit Time Frame for whatever Title) </p>-->
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="3 Weeks - 5 hours a week" v-model="timeFrame">
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" id="projectsumary" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates">Project summary</h3>
                            <div class="help-icon" @click="showHelp('projectSummary')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>
                        <p class="help-icon-p" v-show="projectSummaryHelp">Briefly summarize your project
                        </p>
                        <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10">{!! $projectSumary !!}</textarea>
                    </li>

                    <li class="content_template-general-item" id="publictitle" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'publicProductTitle'" v-cloak>@{{ publicProductTitle }}</h3>
                            <input v-if="editSection == 'publicProductTitle'" type="text" class="form-control" v-model="publicProductTitle">

                            <div class="help-icon" @click="showHelp('publicProductTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>

                        <p class="help-icon-p" v-show="publicProductTitleHelp">What artifacts, presentations, performances or compositions will your students produce?
                        </p>
                        <!--<p class="subtitule_txt">(you can edit this for whatever Title)
                        </p>-->
                        <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10">{!! $publicProduct !!}</textarea>
                    </li>

                    <li class="content_template-general-item" id="leveltitle" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'levelTitle'" v-cloak>@{{ levelTitle }}</h3>
                            <input v-if="editSection == 'levelTitle'" type="text" class="form-control" v-model="levelTitle">

                            <div class="help-icon" @click="showHelp('levelTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>
                        <p class="help-icon-p" v-show="levelTitleHelp">For what age/grade level(s) is your project appropriate?
                        </p>

                        <!--<p class="subtitule_txt">(you can edit this for whatever Title)
                        </p>-->
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
                                            <label class="form-check-label" v-cloak>
                                                @{{ nurseryLevel - 1 }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'early'">

                                    <div class="col-6" v-for="earlyLevel in 6" v-if="earlyLevel > 3">
                                        <div class="form-check" @click="addOrPopAges(earlyLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(earlyLevel)" value="" :id="'age-'+earlyLevel">
                                            <label class="form-check-label" v-cloak>
                                                @{{ earlyLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'primary'">

                                    <div class="col-6" v-for="primaryLevel in 10" v-if="primaryLevel > 6">
                                        <div class="form-check" @click="addOrPopAges(primaryLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(primaryLevel)" value="" :id="'age-'+primaryLevel">
                                            <label class="form-check-label" v-cloak>
                                                @{{ primaryLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'middle'">

                                    <div class="col-6" v-for="middleLevel in 13" v-if="middleLevel > 10">
                                        <div class="form-check" @click="addOrPopAges(middleLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(middleLevel)" value="" :id="'age-'+middleLevel">
                                            <label class="form-check-label" v-cloak>
                                                @{{ middleLevel }}
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" v-show="level == 'high'">

                                    <div class="col-6" v-for="highLevel in 18" v-if="highLevel > 14">
                                        <div class="form-check" @click="addOrPopAges(highLevel)">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest(highLevel)" value="" :id="'age-'+highLevel">
                                            <label class="form-check-label" v-cloak>
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

                    <li class="content_template-general-item" id="hashtags-menu" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates">#hashtags</h3>
                            <div class="help-icon" @click="showHelp('hashtag')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>

                        </div>
                        <p class="help-icon-p" v-show="hashtag">These are keywords to help others find your project in searches

                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Type and enter to add each #hashtag" v-model="hashtag" v-on:keyup.enter="addHashtag()">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div v-for="(hashtag, index) in hashtags" class="col-md-3">
                                <div class="card">
                                    <div class="card-body" v-cloak>
                                        #@{{ hashtag }}

                                        <span style="pointer" @click="popHashtag(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg></span>
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
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates">Calendar of activities </h3>
                                    <div class="help-icon" @click="showHelp('calendar')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">

                                    </div>

                                </div>
                                <p class="help-icon-p" v-show="calendarHelp">Share your schedule of activities

                                </p>
                            </div>
                            <div class="col-md-6 flex-wee">
                                <label class="ml-5 mr-4" for="inp">Weeks</label>
                                <select id="inpt" class="form-control" v-model="weeks">
                                    <option v-for="week in 18" :value="week" v-if="week > 0" v-cloak>@{{ week }} </option>
                                </select>
                            </div>
                        </div>


                        <div class="container-fluid">


                            <div class="row  days-none">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">Day 1</div>
                                <div class="col-md-2">Day 2</div>
                                <div class="col-md-2">Day 3</div>
                                <div class="col-md-2">Day 4</div>
                                <div class="col-md-2">Day 5</div>
                            </div>
                            <div class="row mt-1" v-for="week in weeks">
                                <div class="col-md-2" v-cloak>Week @{{ week }}</div>
                                <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target=".calendarDescription">
                                    <div class="card" style="cursor: pointer">
                                        <div class="card-body card-body_tarea" v-cloak>
                                            @{{ showActivity(week, day) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="contente_item">
                        <div class="flex-edit">
                            <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                            <div class="help-icon">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>
                        <p class="help-icon-p" v-show="bibliographyHelp" @click="showHelp('bibliography')">If you use someone else's stuff, give them credit </p>
                        <textarea name="" lang="" placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10">{!! $bibliography !!}</textarea>
                    </div>

                    @if($project[0]->status == 'pending')
                    <div>
                        <div class="flex-edit">
                            <h1 class="mt-5">Which Upvote System
                                options will your wikiPBL
                                have?
                            </h1>
                            <div class="help-icon" @click="showHelp('upvoteSystem')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                            </div>
                        </div>
                        <p class="help-icon-p" v-show="upvoteSystemHelp">Identify the essential elements that you think your
                            project highlights, so your peers can like/upvote your
                            wikiPBL </p>
                        <div class="row">
                            @foreach(App\AssestmentPointType::get() as $point)
                            <div class="col-md-6 dflex-icon" @click="addOrPopUpVoteSystems('{{ $point->id }}')">

                                <img src="{{ $point->icon }}" class="img-icon"></img>
                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" value="" id="index-{{ $point->id }}">
                                    <label class="form-check-label" for="index-{{ $point->id }}" @click="addOrPopUpVoteSystems('{{ $point->id }}')">
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

            <p class="items-footer">
                <a data-toggle="modal" data-target="."> Terms and conditions</a>
                <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a>
                <a data-toggle="modal" data-target=".faq-modal">FAQ'S</a>
                <a href="{{ url('/about') }}">About wikiPBL</a>
            </p>
            <span class="copy-footer"> © 2021 Copyrights <strong>wikiPBL</strong> </span>
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
                drivingQuestion: "",
                projectSumary: "",
                publicProduct: "",
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
                //private: JSON.parse('{!! $project[0]->is_private !!}'),
                private: 0,
                isIncubator: JSON.parse("{{ $project[0]->is_incubator }}"),
                loading: false,
                incubatorHelp: false,
                drivingQuestionHelp: false,
                subjectTitleHelp: false,
                timeFrameHelp: false,
                projectSummaryHelp: false,
                upvoteSystemHelp: false,
                levelTitleHelp: false,
                hashtagHelp: false,
                calendarHelp: false,
                bibliographyHelp: false,
                upvoteSystemHelp: false,
                publicProductTitleHelp: false,
                problemErrors: [],
                problemEmail: "",
                problemName: "{{ \Auth::check() ? \Auth::user()->name : '' }}",
                problemDescription: ""
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

                $(".calendarDescription").modal('hide')
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
                formData.append("isIncubator", this.isIncubator)

                return formData

            },
            validateLaunch() {

                if (this.isIncubator == 1) {
                    if (CKEDITOR.instances.projectSummaryEditor.getData() == "") {
                        swal({
                            text: "Project summary is required",
                            icon: "error"
                        })
                        return false
                    }

                    return true
                }

                if (this.title == "") {
                    swal({
                        text: "Title is required",
                        icon: "error"
                    })
                    return false
                } else if (this.drivingQuestionTitle == "") {
                    swal({
                        text: "Driving question is required",
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
            scrollTo(identifier) {

                let distance = $("#" + identifier).offset().top - 120

                $('html, body').animate({
                    scrollTop: distance
                }, 50);

            },
            showCKEditorAlert() {

                if (window.localStorage.getItem("showCKEditorMsg") != null) {

                    swal({
                        "text": window.localStorage.getItem("showCKEditorMsg"),
                        "icon": "success"
                    })

                    window.localStorage.removeItem("showCKEditorMsg")

                }

            },
            testChange() {

                this.drivingQuestion = CKEDITOR.instances.drivingQuestionEditor.getData()
                this.projectSumary = CKEDITOR.instances.projectSummaryEditor.getData()
                this.publicProduct = CKEDITOR.instances.publicProductEditor.getData()
                this.bibliography = CKEDITOR.instances.bibliographyEditor.getData()

            },
            erase() {

                swal({
                        title: "Are you sure?",
                        text: "You will delete this project!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            axios.post("{{ url('/project/delete') }}", {
                                id: this.projectId
                            }).then(res => {

                                if (res.data.success == true) {

                                    swal({
                                        "text": res.data.msg,
                                        "icon": "success"
                                    }).then(res => {

                                        window.location.href = "{{ url('teacher/profile') }}"

                                    })

                                } else {

                                    swal({
                                        "text": res.data.msg,
                                        "icon": "error"
                                    })

                                }

                            })

                        }
                    })

            },
            showProjectPrivacyAlert() {

                window.setTimeout(() => {

                    if (this.private == 0) {
                        $("#privacyModalAlert").modal("show")

                        $("#shared-icon").css("fill", "#547EBD")
                        $("#private-icon").css("fill", "black")
                    } else {

                        $("#shared-icon").css("fill", "black")
                        $("#private-icon").css("fill", "#547EBD")

                    }

                }, 500);

            },
            showHelp(section) {

                this.clearHelps(section)

                if (section == "incubator") {
                    this.incubatorHelp == true ? this.incubatorHelp = false : this.incubatorHelp = true
                } else if (section == "drivingQuestion") {
                    this.drivingQuestionHelp == true ? this.drivingQuestionHelp = false : this.drivingQuestionHelp = true
                } else if (section == "subjectTitle") {

                    this.subjectTitleHelp == true ? this.subjectTitleHelp = false : this.subjectTitleHelp = true
                } else if (section == "timeFrame") {

                    this.timeFrameHelp == true ? this.timeFrameHelp = false : this.timeFrameHelp = true
                } else if (section == "projectSummary") {

                    this.projectSummaryHelp == true ? this.projectSummaryHelp = false : this.projectSummaryHelp = true
                } else if (section == "upvoteSystem") {

                    this.upvoteSystemHelp == true ? this.upvoteSystemHelp = false : this.upvoteSystemHelp = true
                } else if (section == "levelTitle") {

                    this.levelTitleHelp == true ? this.levelTitleHelp = false : this.levelTitleHelp = true
                } else if (section == "hashtag") {

                    this.hashtagHelp == true ? this.hashtagHelp = false : this.hashtagHelp = true
                } else if (section == "calendar") {

                    this.calendarHelp == true ? this.calendarHelp = false : this.calendarHelp = true
                } else if (section == "bibliography") {

                    this.bibliographyHelp == true ? this.bibliographyHelp = false : this.bibliographyHelp = true
                } else if (section == "upvoteSystem") {

                    this.upvoteSystemHelp == true ? this.upvoteSystemHelp = false : this.upvoteSystemHelp = true
                } else if (section == "publicProductTitle") {

                    this.publicProductTitleHelp == true ? this.publicProductTitleHelp = false : this.publicProductTitleHelp = true
                }

            },
            clearHelps(section) {

                if (section != "incubator")
                    this.incubatorHelp = false

                if (section != "drivingQuestion")
                    this.drivingQuestionHelp = false

                if (section != "subjectTitle")
                    this.subjectTitleHelp = false

                if (section != "timeFrame")
                    this.timeFrameHelp = false

                if (section != "projectSummary")
                    this.projectSummaryHelp = false

                if (section != "upvoteSystem")
                    this.upvoteSystemHelp = false

                if (section != "levelTitle")
                    this.levelTitleHelp = false

                if (section != "hashtag")
                    this.hashtagHelp = false

                if (section != "calendar")
                    this.calendarHelp = false

                if (section != "bibliography")
                    this.bibliographyHelp = false

                if (section != "upvoteSystem")
                    this.upvoteSystemHelp = false

                if (section != "publicProductTitle")
                    this.publicProductTitleHelp = false

            },
            reportProblem() {

                this.loading = true
                this.problemErrors = []
                axios.post("{{ url('/problem-report') }}", {
                    "email": this.problemEmail,
                    "name": this.problemName,
                    "description": this.problemDescription,
                    "url": "{{ url()->current() }}"
                }).then(res => {
                    this.loading = false
                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                        this.problemEmail = ""
                        this.problemName = ""
                        this.problemDescription = ""

                        $(".problems-modal").modal("hide")
                        $('.modal-backdrop').remove();

                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })

                    }

                }).catch(err => {
                    this.loading = false
                    this.problemErrors = err.response.data.errors
                })


            },


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
            } else {
                this.subjects = []
            }

            if (("{{ $hashtag }}").length > 0) {
                this.hashtags = ("{!! htmlspecialchars_decode($hashtag) !!}").split(",")
            } else {
                this.hashtags = []
            }

            this.testChange()

            window.setInterval(() => {
                this.saveEditionProject()
            }, 120000)

            window.setInterval(() => {
                this.showCKEditorAlert()
            }, 1000)

            if (this.private == 0) {
                //$("#privacyModalAlert").modal("show")

                $("#shared-icon").css("fill", "#547EBD")
                $("#private-icon").css("fill", "black")
            } else {

                $("#shared-icon").css("fill", "black")
                $("#private-icon").css("fill", "#547EBD")

            }

        }

    })
</script>
<!-- Modal FAQ -->
<div class="modal fade faq-modal " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                        <h3>FAQ’S </h3>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Can I delete my wikiPBL once I have started the development process?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder. You can delete this wikiPBL any time. However, once you have published your wikiPBLfor shared development and use by others, it lives in two distinct and independent places: your personal folder and the public space. Once published to the public space, you will be unable to delete this version of the wikiPBL. However, you can still delete the version of the wikiPBL that lives in your personal folder. In other words, once you share a wikiPBL, the shared version cannot be deleted.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Will I retain ownership of my wikiPBL once I publish it?</p>
                        <p>A: You will always be credited as the Original Poster (OP) of any wikiPBL you initiate or publish (including incubator wikiPBLs.) Resource sharing is a core philosophy at wikiPBL. Once a wikiPBL is published (in any stage of completion), it will become free to use and edit by our wikiPBL community.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Do I have to be associated with a school to use wikiPBL? What if I am a freelance educator or private tutor?</p>
                        <p>A: wikiPBL is a closed community (for safety reasons) intended for educators. You don’t have to be a associated with a school so if you are an educator outside of a school please send us an email at info@wikipbl.org </p>
                    </div>



                    <div class="mt-5 mb-5">
                        <p> Q: Can I share my wikiPBL without letting people edit it?</p>
                        <p>A: Yes you can by selecting “view only,” however the goal of wikiPBL is to encourage shared project development and open resource sharing. You will always have access to the original version of your wikiPBL (which will live in your personal folder), and you can edit on your own. Remember you can always use the ideas others suggest for your project for your own personal version, which can remain unpublished, but we encourage you to share your genius with others as well.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Why will my wikiPBL make my projects better?</p>
                        <p>A: Your project ideas will benefit from suggestions by users around the world with varying levels of expertise, and a variety of experiences.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q. Can I have a private wikiPBL that no one can see?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder which only you can see. You can edit or delete this wikiPBL at any time.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade tyc " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-center">
                    <h3>Terms & Conditions - Privacy Policy </h3>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
            </div>
        </div>
        @endpush