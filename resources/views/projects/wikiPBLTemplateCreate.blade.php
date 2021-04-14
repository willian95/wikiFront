@extends("layouts.project")

@section("content")

<div id="wiki-template">
    @include("partials.projectHeader", ["projectAction" => "creation"])
    <div class="container  main-template mt-5" id="own-template">

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
                        <input type="text" class="form-control" v-model="activityDescription">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalClose">Close</button>
                        <button type="button" class="btn btn-primary" @click="addCalendarDescription()">Save</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row" v-cloak>
            <div class="col-md-3">
                <div class="menu-template">
                    <p>Edit mode </p>
                    <div class="menu-template_option" style="overflow-y: auto; height: 260px;">
                        <ul>
                            <p>Main info</p>
                            <li> <a style="cursor: pointer;" @click="scrollTo('title-p')"><i class="fa fa-times" aria-hidden="true" v-if="title == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="title != '' || incubatorFeature == true"></i>@{{ title }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('driving')"><i class="fa fa-times" aria-hidden="true" v-if="drivingQuestion == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="drivingQuestion != '' || incubatorFeature == true"></i>@{{ drivingQuestionTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('subjecttitle')"><i class="fa fa-times" aria-hidden="true" v-if="subjects.length == 0 && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="subjects.length > 0 || incubatorFeature == true"></i>@{{ subjectTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('time')"><i class="fa fa-times" aria-hidden="true" v-if="timeFrame == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="timeFrame != '' || incubatorFeature == true"></i>@{{ timeFrameTitle }}</a></li>
                            <li><a style="cursor: pointer;" @click="scrollTo('projectsumary')"><i class="fa fa-times" aria-hidden="true" v-if="projectSumary == ''"></i> <i class="fa fa-check" aria-hidden="true" v-if="projectSumary != ''"></i>Project Summary</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('publictitle')"><i class="fa fa-times" aria-hidden="true" v-if="publicProduct == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="publicProduct != '' || incubatorFeature == true"></i>@{{ publicProductTitle }}</a> </li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('leveltitle')"><i class="fa fa-times" aria-hidden="true" v-if="level == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="level != '' || incubatorFeature == true"></i>@{{ levelTitle }}</a></li>
                            <li> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')"><i class="fa fa-times" aria-hidden="true" v-if="hashtags.length == 0 && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="hashtags.length > 0 || incubatorFeature == true"></i>#hashtags</a></li>
                            <li v-if="showTools"> <a style="cursor: pointer;" @click="scrollTo('toolstitle')">@{{ toolsTitle }}</a></li>
                            <li v-if="showLearningGoals"><a style="cursor: pointer;" @click="scrollTo('leargoals')">@{{ learningGoalsTitle }}</a></li>
                            <li v-if="showResources"><a style="cursor: pointer;" @click="scrollTo('resoustitle')">@{{ resourcesTitle }}</a></li>
                            <li v-if="showProjectMilestone"><a style="cursor: pointer;" @click="scrollTo('projectmiles')">@{{ projectMilestoneTitle }}</a></li>
                            <li v-if="showExpert"><a style="cursor: pointer;" @click="scrollTo('experttitle')">@{{ expertTitle }}</a></li>
                            <li v-if="showFieldWork"> <a style="cursor: pointer;" @click="scrollTo('fielwork')">@{{ fieldWorkTitle }}</a></li>
                            <li v-if="showGlobalConnections"> <a style="cursor: pointer;" @click="scrollTo('globalconnections')">@{{ globalConnectionsTitle }}</a> </li>
                        </ul>
                    </div>
                    <div class="menu-template_option menu-template_option-btn">
                        <ul>
                            <p>Main info</p>
                            <li><button class="btn btn-custom" @click="launch()">Launch</button></li>

                        </ul>
                    </div>
                </div>

            </div>
            <!----------------info----------------->
            <div class="col-md-9 info-template">
                <!--------------------general--------------------------->
                <ul style="list-style:none" class="content_template content_template-general">

                    <li class="content_template-general-item" @mouseleave="testChange()">
                        <h3 class="titulo-templates">
                            Incubator Features
                            <div class="help-icon" @click="showHelp('incubator')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                             
                            </div>
                        </h3>
                        <p class="help-icon-p" v-show="incubatorHelp">If you have a project idea without all the details, don’t
                                        hold back, be brave and get it out there. Our world of
                                        wikiPBL educators love taking projects from idea to
                                        Awesome!
                                    </p>
                        <div class="flex-custom--icon">
                            <img alt='icon' class="login_icon incubator " src="http://imgfz.com/i/DmsV3CK.png">
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox" v-model="incubatorFeature">
                                <span class="slider slider-nav round"></span>
                            </label>
                            <div>
                                <p><strong><small>Mark your <strong>wikiPBL</strong> as an “incubator” when you have an awesome idea but want help building upon your “ground floor” ideas. Think big!</small></strong></p>
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" style="margin-top: 100px;" id="title-p" @mouseleave="testChange()">
                        <h3 class="titulo-templates">
                            <span v-if="editSection != 'title'">@{{ title }}</span>
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

                    <li class="content_template-general-item" id="driving" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'drivingQuestionTitle'">@{{ drivingQuestionTitle }}</h3>
                            <input v-if="editSection == 'drivingQuestionTitle'" type="text" class="form-control" v-model="drivingQuestionTitle">

                            <a class="txt-edit" style="cursor:pointer;" @click="setEditSection('drivingQuestionTitle')">
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
                            <div class="help-icon" @click="showHelp('drivingQuestion')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">

                              
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="drivingQuestionHelp">An open-ended question that guides students'
                                    thinking and learning, empowering their explorations
                                    during PBL

                                </p>
                        <p class="subtitule_txt">(you can edit Driving question for whatever Title)</p>

                        <textarea name="" id="drivingQuestionEditor" cols="30" rows="10"></textarea>

                    </li>
                    <li class="content_template-general-item" id="subjecttitle" @mouseleave="testChange()">
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
                            <div class="help-icon" @click="showHelp('subjectTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                              
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="subjectTitleHelp"> What subjects (content areas) does your project address/emphasize?
                                </p>
                        <p class="subtitule_txt">(you can edit Subject(s) for whatever Title)</p>
                        <input class="form-control" type="text" placeholder="Type and press enter to add your subject" v-model="subject" v-on:keyup.enter="addSubject()">
                        <div class="row mt-3">
                            <div v-for="(subject, index) in subjects" class="col-md-3">
                                <div class="card">
                                    <div class="card-body">

                                        @{{ subject }}
                                        <span class=" close-tab" @click="popSubject(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="content_template-general-item" id="time" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates" v-if="editSection != 'timeFrameTitle'">@{{ timeFrameTitle }}</h3>
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
                            <div class="help-icon" @click="showHelp('timeFrame')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                               
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="timeFrameHelp">How long do you think your project will take?
                                </p>
                        <p class="subtitule_txt">(you can edit Time Frame for whatever Title) </p>
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
                        <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10"></textarea>
                    </li>

                    <li class="content_template-general-item" id="publictitle" @mouseleave="testChange()">
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
                            <div class="help-icon" @click="showHelp('publicProductTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                               
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="publicProductTitleHelp">What artifacts, presentations, performances or compositions will your students produce?
                                </p>
                        <p class="subtitule_txt">(you can edit this for whatever Title)
                        </p>
                        <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10"></textarea>
                    </li>

                    <li class="content_template-general-item" id="leveltitle" @mouseleave="testChange()">
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
                            <div class="help-icon" @click="showHelp('levelTitle')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                              
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="levelTitleHelp">For what age/grade level(s) is your project appropriate?
                                </p>
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

                    <li class="content_template-general-item" id="hashtags-menu" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates">#hashtags</h3>
                            <div class="help-icon" @click="showHelp('hashtag')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                               
                            </div>

                        </div>
                        <p class="help-icon-p" v-show="hashtagHelp">These are keywords to help others find your project in searches

</p>
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

                                        <span style="cursor: pointer" @click="popHashtag(index)">

                                            <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="toolstitle" @mouseleave="testChange()">
                            <div class="flex-section">
                                <small v-if="showTools">Feel free to remove this section</small>
                                <small v-if="!showTools">Show @{{ toolsTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('tools')">
                                    <span v-if="!showTools">
                                        <svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>
                                            <metadata>
                                                <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                    <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en">
                                                        <dc:creator>
                                                            <rdf:Bag>
                                                                <rdf:li>Feather Icons</rdf:li>
                                                            </rdf:Bag>
                                                        </dc:creator>
                                                    </rdf:Description>
                                                </rdf:RDF>
                                            </metadata>
                                        </svg>
                                    </span>
                                    <span v-if="showTools">
                                        <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>

                            </div>

                            <li class="content_template-general-item content_template-general-item__shadow" v-if="showTools">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'toolsTitle'">@{{ toolsTitle }}</h3>
                                    <input v-if="editSection == 'toolsTitle'" type="text" class="form-control" v-model="toolsTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('toolsTitle')">
                                        <span v-if="editSection != 'toolsTitle'">Click to edit</span>
                                        <span v-if="editSection == 'toolsTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('tools')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                      
                                    </div>
                                </div>
                                <p class="help-icon-p" v-show="toolsHelp">What prerequisites will be required for the start of this
                                            project (e.g. protractor, intermediate word processing
                                            skills, 4th grade reading ability)?

                                        </p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>

                                <input class="form-control" type="text" placeholder="Type and enter to add each tool" v-model="tool" v-on:keyup.enter="addTool()">

                                <div class="row mt-3">
                                    <div v-for="(tool, index) in tools" class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                @{{ tool }}

                                                <span class="ml-5" style="cursor: pointer" @click="popTool(index)"><strong>X</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </div>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="leargoals">
                            <div class="flex-section">
                                <small v-if="showLearningGoals">Feel free to remove this section</small>
                                <small v-if="!showLearningGoals">Show @{{ learningGoalsTitle }} section</small>

                                <button class="btn btn-info" @click="toggleShowSection('learningGoals')">
                                    <span v-if="!showLearningGoals">
                                        <svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>

                                        </svg></span>
                                    <span v-if="showLearningGoals"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>
                            </div>



                            <li class="content_template-general-item content_template-general-item__shadow" v-if="showLearningGoals">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'learningGoalsTitle'">@{{ learningGoalsTitle }}</h3>
                                    <input v-if="editSection == 'learningGoalsTitle'" type="text" class="form-control" v-model="learningGoalsTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('learningGoalsTitle')">
                                        <span v-if="editSection != 'learningGoalsTitle'">Click to edit</span>
                                        <span v-if="editSection == 'learningGoalsTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('learningGoals')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                     
                                    </div>
                                </div>

                                <p class="help-icon-p" v-show="learningGoalsHelp">What will your students learn from this project?
                                            These can be formal learning objectives, essential
                                            skills, core competencies or developmental
                                            competencies

                                        </p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>
                                <input type="text" placeholder="Type and enter to add each" v-model="learningGoalObjectives" class="form-control mb-2">

                                <textarea name="" id="learningGoalEditor" cols="30" rows="10"></textarea>

                                <p class="text-center">
                                    <button class="btn btn-success btn-custom mt-4" @click="addLearningGoal()">Add</button>
                                </p>

                                <div class="row">
                                    <div class="col-md-4" v-for="(goal, index) in learningGoals">
                                        <div class="card">
                                            <div class="card-body">
                                                <button class="btn-miles" @click="popLearningGoal(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                    </svg></button>
                                                <strong>@{{ goal.title }}</strong>
                                                <div v-html="goal.body"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </div>
                    </div>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="resoustitle">

                            <div class="flex-section">
                                <small v-if="showResources">Feel free to remove this section</small>
                                <small v-if="!showResources">Show @{{ resourcesTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('resources')">
                                    <span v-if="!showResources"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>

                                        </svg>
                                    </span>
                                    <span v-if="showResources"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>



                            <li class="content_template-general-item content_template-general-item__shadow" v-show="showResources">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'resourcesTitle'">@{{ resourcesTitle }}</h3>
                                    <input v-if="editSection == 'resourcesTitle'" type="text" class="form-control" v-model="resourcesTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('resourcesTitle')">
                                        <span v-if="editSection != 'resourcesTitle'">Click to edit</span>
                                        <span v-if="editSection == 'resourcesTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('resources')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                      
                                    </div>
                                </div>

                                <p class="help-icon-p" v-show="resourcesHelp">What actual things (artifacts, books or bodies of
                                            knowledge) will your students need to complete this
                                            project?

                                        </p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>
                                <textarea name="" id="resourcesEditor" cols="30" rows="10"></textarea>
                            </li>
                        </div>
                    </div>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="projectmiles">

                            <div class="flex-section">
                                <small v-if="showProjectMilestone">Feel free to remove this section</small>
                                <small v-if="!showProjectMilestone">Show @{{ projectMilestoneTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('projectMilestone')">
                                    <span v-if="!showProjectMilestone"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>

                                        </svg>
                                    </span>
                                    <span v-if="showProjectMilestone"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>
                            </div>



                            <li class="content_template-general-item content_template-general-item__shadow" v-show="showProjectMilestone">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'projectMilestoneTitle'">@{{ projectMilestoneTitle }}</h3>
                                    <input v-if="editSection == 'projectMilestoneTitle'" type="text" class="form-control" v-model="projectMilestoneTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('projectMilestoneTitle')">
                                        <span v-if="editSection != 'projectMilestoneTitle'">Click to edit</span>
                                        <span v-if="editSection == 'projectMilestoneTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('projectMilestone')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                     
                                    </div>
                                </div>
                                <p class="help-icon-p" v-show="projectMilestoneHelp">What are the major project steps toward project completion?

</p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>
                                <input type="text" class="form-control mb-2" v-model="milestoneTitle">
                                <textarea cols="30" rows="10" id="projectMilestoneEditor"></textarea>

                                <p class="text-center">
                                    <button class="btn btn-success btn-custom mt-4" @click="addProjectMilestone()">Add</button>
                                </p>

                                <div class="row">
                                    <div class="col-md-4" v-for="(milestone, index) in projectMilestones">
                                        <div class="card">
                                            <div class="card-body">
                                                <button class=" btn-miles mt-4" @click="popProjectMilestone(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                        <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                                    </svg></button>
                                                <strong>@{{ milestone.title }}</strong>
                                                <div v-html="milestone.body"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </li>
                        </div>
                    </div>

                </ul>
                <!-----------------------END general------------------------>

                <div class="content_template mt-5 mb-5" @mouseleave="testChange()">

                    <textarea name="" placeholder="" id="mainEditor" cols="30" rows="10"></textarea>

                    <div class="contente_item mt-5 mb-3">
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
                                    <option v-for="week in 18" :value="week" v-if="week > 0">@{{ week }} </option>
                                </select>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row  days-none">
                                <div class="col-md-2"></div>
                                <div class="col-md-2"> <svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                        <g>
                                            <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                            <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                            <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                            <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                            <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                            <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                            <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                            <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                            <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                    </svg>Day 1</div>
                                <div class="col-md-2"> <svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                        <g>
                                            <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                            <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                            <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                            <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                            <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                            <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                            <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                            <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                            <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                    </svg>Day 2</div>
                                <div class="col-md-2"> <svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                        <g>
                                            <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                            <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                            <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                            <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                            <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                            <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                            <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                            <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                            <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                    </svg>Day 3</div>
                                <div class="col-md-2"> <svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                        <g>
                                            <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                            <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                            <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                            <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                            <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                            <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                            <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                            <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                            <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                    </svg>Day 4</div>
                                <div class="col-md-2"> <svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                        <g>
                                            <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                            <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                            <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                            <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                            <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                            <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                            <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                            <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                            <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                    </svg>Day 5</div>
                            </div>
                            <div class="row" v-for="week in weeks">
                                <div class="col-md-2">
                                    <svg id="Capa_1" class="icon-calendar icon-calendar-blue" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="m497 32h-46v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-46c-8.284 0-15 6.716-15 15v450c0 8.284 6.716 15 15 15h482c8.284 0 15-6.716 15-15v-450c0-8.284-6.716-15-15-15zm-436 30v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h31v60h-452v-60zm-31 420v-330h452v330z" />
                                            <path d="m166 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                            <path d="m406 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                            <path d="m286 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                            <path d="m286 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                            <path d="m406 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                            <path d="m175.462 345.161c-6.428-5.226-15.875-4.25-21.101 2.176l-30.498 37.513-8.352-6.849c-6.406-5.255-15.857-4.318-21.11 2.087-5.253 6.406-4.318 15.857 2.088 21.11l20 16.4c6.438 5.28 15.922 4.295 21.15-2.136l40-49.2c5.226-6.428 4.251-15.875-2.177-21.101z" />
                                        </g>
                                    </svg>
                                    Week @{{ week }}
                                </div>
                                <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target=".calendarDescription">
                                    <div class="card" style="cursor: pointer">
                                        <div class="card-body card-body_tarea">
                                            @{{ showActivity(week, day) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="experttitle">
                            <div class="flex-section">
                                <small v-if="showExpert">Feel free to remove this section</small>
                                <small v-if="!showExpert">Show @{{ expertTitle  }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('expert')">
                                    <span v-if="!showExpert"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>
                                            <metadata>
                                                <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                    <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en">
                                                        <dc:creator>
                                                            <rdf:Bag>
                                                                <rdf:li>Feather Icons</rdf:li>
                                                            </rdf:Bag>
                                                        </dc:creator>
                                                    </rdf:Description>
                                                </rdf:RDF>
                                            </metadata>
                                        </svg>
                                    </span>
                                    <span v-if="showExpert"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>
                            </div>



                            <li class="content_template-general-item content_template-general-item__shadow" v-show="showExpert">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'expertTitle'">@{{ expertTitle  }}</h3>
                                    <input v-if="editSection == 'expertTitle'" type="text" class="form-control" v-model="expertTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('expertTitle')">
                                        <span v-if="editSection != 'expertTitle'">Click to edit</span>
                                        <span v-if="editSection == 'expertTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('expert')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                       
                                    </div>
                                </div>
                                <p class="help-icon-p" v-show="expertHelp">Will you invite experts outside of school to guide/critique/inspire your students' success on their projects?

</p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>

                                <textarea cols="30" rows="10" id="expertEditor"></textarea>
                            </li>
                        </div>
                    </div>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="fielwork">
                            <div class="flex-section">
                                <small v-if="showFieldWork">Feel free to remove this section</small>
                                <small v-if="!showFieldWork">Show @{{ fieldWorkTitle }} section</small>

                                <button class="btn btn-info" @click="toggleShowSection('fieldWork')">
                                    <span v-if="!showFieldWork"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>
                                            <metadata>
                                                <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                    <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en">
                                                        <dc:creator>
                                                            <rdf:Bag>
                                                                <rdf:li>Feather Icons</rdf:li>
                                                            </rdf:Bag>
                                                        </dc:creator>
                                                    </rdf:Description>
                                                </rdf:RDF>
                                            </metadata>
                                        </svg>
                                    </span>
                                    <span v-if="showFieldWork"><svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>

                            </div>


                            <li class="content_template-general-item content_template-general-item__shadow" v-show="showFieldWork">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'fieldWorkTitle'">@{{ fieldWorkTitle }}</h3>
                                    <input v-if="editSection == 'fieldWorkTitle'" type="text" class="form-control" v-model="fieldWorkTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('fieldWorkTitle')">
                                        <span v-if="editSection != 'fieldWorkTitle'">Click to edit</span>
                                        <span v-if="editSection == 'fieldWorkTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('fieldWork')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                      
                                    </div>
                                </div>
                                <p class="help-icon-p" v-show="fieldWorkHelp">Activities completed outside of the classroom such as taking water samples from a lake or interviewing Vietnam veterans
                                        </p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>

                                <textarea cols="30" rows="10" id="fieldWorkEditor"></textarea>
                            </li>
                        </div>
                    </div>

                    <div class="row seccion-btn" @mouseleave="testChange()">
                        <div class="col-12" id="globalconnections">
                            <div class="flex-section">
                                <small v-if="showGlobalConnections">Feel free to remove this section</small>
                                <small v-if="!showGlobalConnections">Show @{{ globalConnectionsTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('globalConnection')">
                                    <span v-if="!showGlobalConnections"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1">
                                            <title>plus</title>
                                            <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                                <g id="Artboard" transform="translate(-917.000000, -1941.000000)" stroke-width="2">
                                                    <g id="plus" transform="translate(918.000000, 1942.000000)">
                                                        <path d="M7 0v14" id="Shape" />
                                                        <path d="M0 7h14" id="Shape" />
                                                    </g>
                                                </g>
                                            </g>
                                            <metadata>
                                                <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                    <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en">
                                                        <dc:creator>
                                                            <rdf:Bag>
                                                                <rdf:li>Feather Icons</rdf:li>
                                                            </rdf:Bag>
                                                        </dc:creator>
                                                    </rdf:Description>
                                                </rdf:RDF>
                                            </metadata>
                                        </svg>
                                    </span>
                                    <span v-if="showGlobalConnections"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                        </svg></span>
                                </button>

                            </div>


                            <li class="content_template-general-item content_template-general-item__shadow" v-show="showGlobalConnections">
                                <div class="flex-edit">
                                    <h3 class="titulo-templates" v-if="editSection != 'globalConnectionsTitle'">@{{ globalConnectionsTitle }}</h3>
                                    <input v-if="editSection == 'globalConnectionsTitle'" type="text" class="form-control" v-model="globalConnectionsTitle">
                                    <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('globalConnectionsTitle')">
                                        <span v-if="editSection != 'globalConnectionsTitle'">Click to edit</span>
                                        <span v-if="editSection == 'globalConnectionsTitle'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <g data-name="Layer 2">
                                                <g data-name="edit">
                                                    <rect width="24" height="24" opacity="0" />
                                                    <path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                    <div class="help-icon" @click="showHelp('globalConnections')">
                                        <img src="{{ url('assets/img/help.png') }}" alt="">
                                  
                                    </div>
                                </div>
                                <p class="help-icon-p" v-show="globalConnectionsHelp">What individuals or groups from around the world would you like to be involved in your project? </p>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>

                                <textarea cols="30" rows="10" id="globalConnectionEditor"></textarea>
                            </li>
                        </div>
                    </div>


                    <div class="contente_item" @mouseleave="testChange()">
                        <div class="flex-edit">
                            <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                            <div class="help-icon" @click="showHelp('bibliography')">
                                <img src="{{ url('assets/img/help.png') }}" alt="">
                                
                            </div>
                        </div>
                        <p class="help-icon-p" v-show="bibliographyHelp">If you use someone else's stuff, give them credit </p>
                        <textarea name="" lang="" placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10"></textarea>
                    </div>

                    <div class="container-fluid" @mouseleave="testChange()">
                        <div class="row">
                            <div class="col-12">
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
                            </div>

                            @foreach(App\AssestmentPointType::get() as $point)
                            <div class="col-md-6 dflex-icon">
                                <img src="{{ $point->icon }}" class="img-icon"></img>
                                <div class="form-check" @click="addOrPopUpVoteSystems('{{ $point->id }}')">

                                    <input class="form-check-input" type="checkbox" value="" id="assestment{{ $point->id }}">
                                    <label class="form-check-label" for="assestment{{ $point->id }}">
                                        {{ $point->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach

                        </div>
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
            el: '#wiki-template',
            data() {
                return {
                    projectId:"{{ $project->id }}",
                    title:"Click to edit your wikiPBL Title",
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
                    projectSumary:"",
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
                    tool:"",
                    tools:[],
                    learningGoalsTitle:"Learning Goals",
                    showLearningGoals:true,
                    learningGoalObjectives:"",
                    learningGoals:[],
                    resourcesTitle:"Resources",
                    showResources:true,
                    showProjectMilestone:true,
                    projectMilestoneTitle:"Project Milestones",
                    projectMilestones:[],
                    milestoneTitle:"",
                    expertTitle:"Expert",
                    showExpert:true,
                    fieldWorkTitle:"Field Work",
                    showFieldWork:true,
                    globalConnectionsTitle:"Global connection/Groups of students needed/wanted",
                    showGlobalConnections:true,
                    lastSave:"",
                    private:0,
                    loading:false,
                    incubatorFeature:false,
                    incubatorHelp:false,
                    drivingQuestionHelp:false,
                    subjectTitleHelp:false,
                    timeFrameHelp:false,
                    projectSummaryHelp:false,
                    upvoteSystemHelp:false,
                    levelTitleHelp:false,
                    hashtagHelp:false,
                    calendarHelp:false,
                    bibliographyHelp:false,
                    upvoteSystemHelp:false,
                    publicProductTitleHelp:false,
                    toolsHelp:false,
                    learningGoalsHelp:false,
                    resourcesHelp:false,
                    projectMilestoneHelp:false,
                    fieldWorkHelp:false,
                    globalConnectionsHelp:false
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
            addTool() {

                if (this.tool != "") {
                    this.tools.push(this.tool)
                    this.tool = ""
                }


            },
            popTool(index) {

                this.tools.splice(index, 1)

            },
            addLearningGoal() {

                if (this.learningGoalObjectives != "" && CKEDITOR.instances.learningGoalEditor.getData()) {
                    this.learningGoals.push({
                        "title": this.learningGoalObjectives,
                        "body": CKEDITOR.instances.learningGoalEditor.getData()
                    })
                    this.learningGoalObjectives = ""
                    CKEDITOR.instances.learningGoalEditor.setData("")
                }


            },
            popLearningGoal(index) {

                this.learningGoals.splice(index, 1)

            },

            addProjectMilestone() {

                if (this.milestoneTitle != "" && CKEDITOR.instances.projectMilestoneEditor.getData()) {
                    this.projectMilestones.push({
                        "title": this.milestoneTitle,
                        "body": CKEDITOR.instances.projectMilestoneEditor.getData()
                    })
                    this.milestoneTitle = ""
                    CKEDITOR.instances.projectMilestoneEditor.setData("")
                }


            },
            popProjectMilestone(index) {

                this.projectMilestones.splice(index, 1)

            },
            setWeekAndDay(week, day) {

                this.calendarDay = day
                this.calendarWeek = week

            },
            addCalendarDescription() {

                if (this.activityDescription != "") {

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

                }

            },
            validateLaunch() {

                if (this.incubatorFeature == true) {

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
            toggleShowSection(section) {

                if (section == "tools") {

                    if (this.showTools == true) {
                        this.showTools = false
                    } else {
                        this.showTools = true
                    }

                } else if (section == "learningGoals") {

                    if (this.showLearningGoals == true) {
                        this.showLearningGoals = false
                    } else {
                        this.showLearningGoals = true
                    }

                } else if (section == "resources") {

                    if (this.showResources == true) {
                        this.showResources = false
                    } else {
                        this.showResources = true
                    }

                } else if (section == "projectMilestone") {

                    if (this.showProjectMilestone == true) {
                        this.showProjectMilestone = false
                    } else {
                        this.showProjectMilestone = true
                    }

                } else if (section == "expert") {

                    if (this.showExpert == true) {
                        this.showExpert = false
                    } else {
                        this.showExpert = true
                    }

                } else if (section == "globalConnection") {

                    if (this.showGlobalConnections == true) {
                        this.showGlobalConnections = false
                    } else {
                        this.showGlobalConnections = true
                    }

                } else if (section == "fieldWork") {

                    if (this.showFieldWork == true) {
                        this.showFieldWork = false
                    } else {
                        this.showFieldWork = true
                    }

                }
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
            saveProject() {

                let formData = this.setFormData()

                axios.post("{{ url('project/creation/save') }}", formData).then(res => {

                    this.saveDate();

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
            launch() {

                if (this.validateLaunch()) {

                    let string = this.private == 0 ? 'shared view ' : 'view only '

                    swal({
                        content: {
                                element: "img",
                                attributes: {
                                    width: "100",
                                    height: "100",
                                    src: "{{ asset('/assets/img/thumbs-up-black.png') }}",
                                },
                            },
                            title: "Are you sure?",
                            text: "Your wikiPBL is about to be published for the world to see and edit. Are you sure? This cannot be undone. Thanks for sharing! " + string + 'mode',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                                this.loading = true
                                let formData = this.setFormData()

                                axios.post("{{ url('project/creation/launch') }}", formData).then(res => {
                                    this.loading = false
                                    if (res.data.success == true) {

                                        swal({
                                            text: res.data.msg,
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
                        })

                }

            },
            popAllAges() {

                this.ages = []
                $(".check-age").attr("checked", false)

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
                formData.append("is_private", this.private)
                formData.append("number_of_weeks", this.weeks)
                formData.append("isIncubator", this.incubatorFeature)

                if (this.showTools == true) {
                    formData.append("toolsTitle", this.toolsTitle)
                    formData.append("tools", this.tools)
                } else {
                    formData.append("toolsTitle", "Tools/Software/Skills required")
                    formData.append("tools", [])
                }

                if (this.showLearningGoals == true) {
                    formData.append("learningGoalsTitle", this.learningGoalsTitle)
                    formData.append("learningGoals", JSON.stringify(this.learningGoals))
                } else {
                    formData.append("learningGoalsTitle", "Learning Goals")
                    formData.append("learningGoals", [])
                }

                if (this.showResources == true) {
                    formData.append("resourcesTitle", this.resourcesTitle)
                    formData.append("resources", CKEDITOR.instances.resourcesEditor.getData())
                } else {
                    formData.append("resourcesTitle", "Resources")
                    formData.append("resources", "")
                }

                if (this.showProjectMilestone == true) {
                    formData.append("projectMilestoneTitle", this.projectMilestoneTitle)
                    formData.append("projectMilestone", JSON.stringify(this.projectMilestones))
                } else {
                    formData.append("projectMilestoneTitle", "Project Milestones")
                    formData.append("projectMilestone", [])
                }

                if (this.showExpert == true) {
                    formData.append("expertTitle", this.expertTitle)
                    formData.append("expert", CKEDITOR.instances.expertEditor.getData())
                } else {
                    formData.append("expertTitle", "Experts")
                    formData.append("expert", "")
                }

                if (this.showFieldWork == true) {
                    formData.append("fieldWorkTitle", this.fieldWorkTitle)
                    formData.append("fieldWork", CKEDITOR.instances.fieldWorkEditor.getData())
                } else {
                    formData.append("fieldWorkTitle", "Field Work")
                    formData.append("fieldWork", "")
                }

                if (this.showGlobalConnections == true) {
                    formData.append("globalConnectionsTitle", this.globalConnectionsTitle)
                    formData.append("globalConnections", CKEDITOR.instances.globalConnectionEditor.getData())
                } else {
                    formData.append("globalConnectionsTitle", "Global connection/Groups of students needed/wanted")
                    formData.append("globalConnections", "")
                }

                formData.append("calendarActivitiesTitle", "calendarActivities")
                formData.append("calendarActivities", JSON.stringify(this.calendarActivities))
                formData.append("upvoteSystemTitle", "upvoteSystem")
                formData.append("upvoteSystem", JSON.stringify(this.upvoteSystems))

                return formData

            },
            scrollTo(identifier) {

                let distance = $("#" + identifier).offset().top - 120

                $('html, body').animate({
                    scrollTop: distance
                }, 50);

            },
            testChange() {

                this.drivingQuestion = CKEDITOR.instances.drivingQuestionEditor.getData()
                this.projectSumary = CKEDITOR.instances.projectSummaryEditor.getData()
                this.publicProduct = CKEDITOR.instances.publicProductEditor.getData()
                this.bibliography = CKEDITOR.instances.bibliographyEditor.getData()

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
            showHelp(section){

                this.clearHelps(section)

                if(section == "incubator"){
                    this.incubatorHelp == true ? this.incubatorHelp = false : this.incubatorHelp = true
                }

                else if(section == "drivingQuestion"){
                    this.drivingQuestionHelp == true ? this.drivingQuestionHelp = false : this.drivingQuestionHelp = true
                }

                else if(section == "subjectTitle"){

                    this.subjectTitleHelp == true ? this.subjectTitleHelp = false : this.subjectTitleHelp = true
                }

                else if(section == "timeFrame"){

                    this.timeFrameHelp == true ? this.timeFrameHelp = false : this.timeFrameHelp = true
                }

                else if(section == "projectSummary"){

                    this.projectSummaryHelp == true ? this.projectSummaryHelp = false : this.projectSummaryHelp = true
                }

                else if(section == "upvoteSystem"){

                    this.upvoteSystemHelp == true ? this.upvoteSystemHelp = false : this.upvoteSystemHelp = true
                }

                else if(section == "levelTitle"){

                    this.levelTitleHelp == true ? this.levelTitleHelp = false : this.levelTitleHelp = true
                }

                else if(section == "hashtag"){
                
                    this.hashtagHelp == true ? this.hashtagHelp = false : this.hashtagHelp = true
                }

                else if(section == "calendar"){

                    this.calendarHelp == true ? this.calendarHelp = false : this.calendarHelp = true
                }

                else if(section == "bibliography"){
                    
                    this.bibliographyHelp == true ? this.bibliographyHelp = false : this.bibliographyHelp = true
                }

                else if(section == "upvoteSystem"){

                    this.upvoteSystemHelp == true ? this.upvoteSystemHelp = false : this.upvoteSystemHelp = true
                }

                else if(section == "publicProductTitle"){

                    this.publicProductTitleHelp == true ? this.publicProductTitleHelp = false : this.publicProductTitleHelp = true
                }

                else if(section == "tools"){
                    this.toolsHelp == true ? this.toolsHelp = false : this.toolsHelp = true
                }

                else if(section == "learningGoals"){
                    this.learningGoalsHelp == true ? this.learningGoalsHelp = false : this.learningGoalsHelp = true
                }

                else if(section == "resources"){
                    this.resourcesHelp == true ? this.resourcesHelp = false : this.resourcesHelp = true
                }

                else if(section == "projectMilestone"){
                    this.projectMilestoneHelp == true ? this.projectMilestoneHelp = false : this.projectMilestoneHelp = true
                }

                else if(section == "expert"){
                    this.expertHelp == true ? this.expertHelp = false : this.expertHelp = true
                }

                else if(section == "fieldWork"){
                    this.fieldWorkHelp == true ? this.fieldWorkHelp = false : this.fieldWorkHelp = true
                }

                else if(section == "globalConnections"){
                    this.globalConnectionsHelp == true ? this.globalConnectionsHelp = false : this.globalConnectionsHelp = true
                }

            },
            clearHelps(section){

                if(section != "incubator")
                this.incubatorHelp = false

                if(section != "drivingQuestion")
                this.drivingQuestionHelp = false

                if(section != "subjectTitle")
                this.subjectTitleHelp = false

                if(section != "timeFrame")
                this.timeFrameHelp = false

                if(section != "projectSummary")
                this.projectSummaryHelp = false

                if(section != "upvoteSystem")
                this.upvoteSystemHelp = false

                if(section != "levelTitle")
                this.levelTitleHelp = false

                if(section != "hashtag")
                this.hashtagHelp = false

                if(section != "calendar")
                this.calendarHelp = false

                if(section != "bibliography")
                this.bibliographyHelp = false

                if(section != "upvoteSystem")
                this.upvoteSystemHelp = false

                if(section != "publicProductTitle")
                this.publicProductTitleHelp = false

                if(section != "tools")
                this.toolsHelp = false

                if(section != "learningGoals")
                this.learningGoalsHelp = false

                if(section != "resources")
                this.resourcesHelp = false

                if(section != "projectMilestone"){
                    this.projectMilestoneHelp = false
                }

                if(section != "expert"){
                    this.expertHelp = false
                }

                if(section != "fieldWork"){
      
                    this.fieldWorkHelp = false
                
                }

                if(section != "globalConnections"){
                    this.globalConnectionsHelp = false
                }

            }
        },
        mounted() {

            $("#private-icon").css("fill", "#547EBD")

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
            CKEDITOR.replace("resourcesEditor", options)
            CKEDITOR.replace("expertEditor", options)
            CKEDITOR.replace("fieldWorkEditor", options)
            CKEDITOR.replace("globalConnectionEditor", options)
            CKEDITOR.replace("learningGoalEditor", options)
            CKEDITOR.replace("projectMilestoneEditor", options)

            this.saveProject()

            window.setInterval(() => {
                this.saveProject()
            }, 120000)

            window.setInterval(() => {
                this.showCKEditorAlert()
            }, 1000)

            /*if (this.private == 0) {
                $("#privacyModalAlert").modal("show")

                $("#shared-icon").css("fill", "#547EBD")
                $("#private-icon").css("fill", "black")
            } else {

                $("#shared-icon").css("fill", "black")
                $("#private-icon").css("fill", "#547EBD")

            }*/

        }
    })
</script>

@endpush