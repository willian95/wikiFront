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


            <div class="row">
                <div class="col-md-3">
                    <div class="menu-template">
                        <p>Edit mode </p>
                        <div class="menu-template_option" style="overflow-y: auto; height: 260px;">
                            <ul>
                                <p>Main info</p>
                                <li> <a style="cursor: pointer;" @click="scrollTo('title-p')"><i class="fa fa-times" aria-hidden="true" v-if="title == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="title != '' || isIncubator == true"></i>@{{ title }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('driving')"><i class="fa fa-times" aria-hidden="true" v-if="drivingQuestion == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="drivingQuestion != '' || isIncubator == true"></i>@{{ drivingQuestionTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('subject')"><i class="fa fa-times" aria-hidden="true" v-if="subjects.length == 0 && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="subjects.length > 0 || isIncubator == true"></i>@{{ subjectTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('time')"><i class="fa fa-times" aria-hidden="true" v-if="timeFrame == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="timeFrame != '' || isIncubator == true"></i>@{{ timeFrameTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('projectsumary')"><i class="fa fa-times" aria-hidden="true" v-if="projectSumary == ''"></i> <i class="fa fa-check" aria-hidden="true" v-if="projectSumary != ''"></i>Project Summary</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('publictitle')"><i class="fa fa-times" aria-hidden="true" v-if="publicProduct == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="publicProduct != '' || isIncubator == true"></i>@{{ publicProductTitle }}</a> </li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('leveltitle')"><i class="fa fa-times" aria-hidden="true" v-if="publicProduct == '' && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="publicProduct != '' || isIncubator == true"></i>@{{ levelTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')"><i class="fa fa-times" aria-hidden="true" v-if="hashtags.length == 0 && isIncubator == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="hashtags.length > 0 || isIncubator == true"></i>#hashtags</a></li>
                                <li v-if="showTools"> <a style="cursor: pointer;" @click="scrollTo('toolstitle')">@{{ toolsTitle }}</a></li>
                                <li v-if="showLearningGoals"><a style="cursor: pointer;" @click="scrollTo('leargoals')">@{{ learningGoalsTitle }}</a></li>
                                <li v-if="showResources"><a style="cursor: pointer;" @click="scrollTo('resoustitle')">@{{ resourcesTitle }}</a></li>
                                <li v-if="showProjectMilestone"><a style="cursor: pointer;" @click="scrollTo('projectmiles')">@{{ projectMilestoneTitle }}</a></li>
                                <li v-if="showExpert"><a style="cursor: pointer;" @click="scrollTo('experttitle')">@{{ expertTitle }}</a></li>
                                <li v-if="showFieldWork"> <a style="cursor: pointer;" @click="scrollTo('fielwork')">@{{ fieldWorkTitle }}</a></li>
                                <li v-if="showGlobalConnections"> <a style="cursor: pointer;" @click="scrollTo('globalconnections')">@{{ globalConnectionsTitle }}</a> </li>

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

                        @if(\Auth::user()->id == $project[0]->user_id)
                            <li class="content_template-general-item">
                            <h3 class="titulo-templates">Incubator Features</h3>

                                <div class="flex-custom--icon">
                                <img alt='icon' class="login_icon incubator" src="http://imgfz.com/i/DmsV3CK.png">
                                <!-- Rounded switch -->
                                <label class="switch" >
                                    <input type="checkbox" v-model="isIncubator">
                                    <span class="slider slider-nav round"></span>
                                </label>
                                <div> <p><strong><small>Mark your <strong>wikiPBL</strong>  as an “incubator” when you have an awesome idea but want help building upon your “ground floor” ideas. Think big!</small></strong></p></div>
                                </div>
                               
                            </li>
                        @endif

                        <li class="content_template-general-item" style="margin-top: 100px;" id="title-p" @mouseleave="testChange()">

                            <h3 class="titulo-templates">

                                <span v-if="editSection != 'title'">@{{ title }}</span>
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

                        <li class="content_template-general-item" id="driving" @mouseleave="testChange()">
                            <div class="flex-edit">
                                <h3 class="titulo-templates" v-if="editSection != 'drivingQuestionTitle'">@{{ drivingQuestionTitle }}</h3>
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

                            <textarea name="" id="drivingQuestionEditor" cols="30" rows="10">{!! htmlspecialchars_decode($drivingQuestion) !!}</textarea>

                        </li>
                        <li class="content_template-general-item" id="subject" @mouseleave="testChange()">
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
                                            <span class="float: right;" style="cursor: pointer" @click="popSubject(index)">    <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item" id="time" @mouseleave="testChange()">
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

                        <li class="content_template-general-item" id="projectsumary" @mouseleave="testChange()">
                            <h3 class="titulo-templates">Project summary</h3>
                            <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10">{!! htmlspecialchars_decode($projectSumary) !!}</textarea>
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
                            </div>

                            <p class="subtitule_txt">(you can edit this for whatever Title)
                            </p>
                            <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10">{!! $publicProduct !!}</textarea>
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

                        <li class="content_template-general-item" id="hashtags-menu" @mouseleave="testChange()">
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

                                            <span style="pointer" @click="popHashtag(index)">    <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <div class="row seccion-btn">
                            <div class="col-12" id="toolstitle" @mouseleave="testChange()">
                            <div class="flex-section">
                            <small v-if="showTools">Feel free to remove this section</small>
                                <small v-if="!showTools">Show @{{ toolsTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('tools')">
                                    <span v-if="!showTools"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
</span>
                                    <span v-if="showTools">   <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
                                    </div>



                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>

                                    <input class="form-control" type="text" placeholder="Type and enter to add each tool" v-model="tool" v-on:keyup.enter="addTool()">

                                    <div class="row mt-3">
                                        <div v-for="(tool, index) in tools" class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    @{{ tool }}

                                                    <span style="cursor: pointer" @click="popTool(index)">X</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="row seccion-btn" id="leargoals" @mouseleave="testChange()">
                            <div class="col-12">
                            <div class="flex-section">
                            <small v-if="showLearningGoals">Feel free to remove this section</small>
                                <small v-if="!showLearningGoals">Show @{{ learningGoalsTitle }} section</small>

                            <button class="btn btn-info" @click="toggleShowSection('learningGoals')">
                                    <span v-if="!showLearningGoals"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
</span>
                                    <span v-if="showLearningGoals"><svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
                                    </div>


                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>
                                    <input type="text" placeholder="Type and enter to add each" v-model="learningGoalObjectives" class="form-control mb-2">

                                    <textarea name="" id="learningGoalEditor" cols="30" rows="10"></textarea>


                                    <p class="text-center mt-4">
                                        <button class="btn btn-customs" @click="addLearningGoal()">Add</button>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-4" v-for="(goal, index) in learningGoals">
                                            <div class="card">
                                                <div class="card-body">
                                                <button class="btn-miles" @click="popLearningGoal(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></button>
                                                  
                                                    <strong>@{{ goal.title }}</strong>
                                                    <div v-html="goal.body"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </div>
                        </div>

                        <div class="row seccion-btn" id="resoustitle" @mouseleave="testChange()">
                            <div class="col-12">
                            <div class="flex-section">
                            <small v-if="showResources">Feel free to remove this section</small>
                                <small v-if="!showResources">Show @{{ resourcesTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('resources')">
                                    <span v-if="!showResources"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
</span>
                                    <span v-if="showResources">  <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg></span>
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
                                    </div>



                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>
                                    <textarea name="" id="resourcesEditor" cols="30" rows="10">{!! $resources !!}</textarea>
                                </li>
                            </div>
                        </div>

                        <div class="row seccion-btn" id="projectmiles" @mouseleave="testChange()">
                            <div class="col-12">
                            <div class="flex-section">
                            <small v-if="showProjectMilestone">Feel free to remove this section</small>
                                <small v-if="!showProjectMilestone">Show @{{ projectMilestoneTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('projectMilestone')">
                                    <span v-if="!showProjectMilestone"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
</span>
                                    <span v-if="showProjectMilestone"><svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
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
                                    </div>


                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>
                                    <input type="text" class="form-control mb-2" v-model="milestoneTitle">
                                    <textarea cols="30" rows="10" id="projectMilestoneEditor"></textarea>

                                    <p class="text-center">
                                        <button class="btn btn-success" @click="addProjectMilestone()">Add</button>
                                    </p>

                                    <div class="row">
                                        <div class="col-md-4" v-for="(milestone, index) in projectMilestones">
                                            <div class="card">
                                                <div class="card-body">
                                                    <button class="btn-miles btn btn-sucess" @click="popProjectMilestone(index)"> <svg class="hast-trash" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z"/></svg></button>
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

                    <div class="content_template">

                        <textarea name="" placeholder="" id="mainEditor" cols="30" rows="10">{!! $mainInfo !!}</textarea>

                        <div class="contente_item mt-5 mb-5" @mouseleave="testChange()">
                        <div class="row mb-5">
                                <div class="col-md-6">
                                <h3 class="titulo-templates">Calendar of activities </h3>
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

                        <div class="row seccion-btn" id="experttitle" @mouseleave="testChange()">
                            <div class="col-12">
                            <div class="flex-section">
                            <small v-if="showExpert">Feel free to remove this section</small>
                                <small v-if="!showExpert">Show @{{ expertTitle  }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('expert')">
                                    <span v-if="!showExpert"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
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

                                    </div>



                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>

                                    <textarea cols="30" rows="10" id="expertEditor">{!! $expert !!}</textarea>
                                </li>
                            </div>
                        </div>

                        <div class="row seccion-btn" id="fielwork" @mouseleave="testChange()">
                            <div class="col-12">
                            <div class="flex-section">
                            <small v-if="showFieldWork">Feel free to remove this section</small>
                                <small v-if="!showFieldWork">Show @{{ fieldWorkTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('fieldWork')">
                                    <span v-if="!showFieldWork"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
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

                                    </div>


                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>

                                    <textarea cols="30" rows="10" id="fieldWorkEditor">{!! $fieldWork !!}</textarea>
                                </li>
                            </div>
                        </div>

                        <div class="row seccion-btn" @mouseleave="testChange()">
                            <div class="col-12">
                                <div class="flex-section">
                                <small v-if="showGlobalConnections">Feel free to remove this section</small>
                                <small v-if="!showGlobalConnections">Show @{{ globalConnectionsTitle }} section</small>
                                <button class="btn btn-info" @click="toggleShowSection('globalConnection')">
                                    <span v-if="!showGlobalConnections"><svg class="btn-mas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px" viewBox="0 0 16 16" version="1.1"><title>plus</title><g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"><g id="Artboard" transform="translate(-917.000000, -1941.000000)"  stroke-width="2"><g id="plus" transform="translate(918.000000, 1942.000000)"><path d="M7 0v14" id="Shape"/><path d="M0 7h14" id="Shape"/></g></g></g><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="plus" dc:description="plus" dc:publisher="Iconscout" dc:date="2017-09-15" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Feather Icons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
</span>
                                    <span v-if="showGlobalConnections"> <svg class="login_icon color-blue_icon hover-trash color-blue_icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18ZM20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Zm-3-1a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                            </svg></span>
                                </button>
                                </div>
                              
                               
                                <li class="content_template-general-item" v-show="showGlobalConnections">
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
                                    </div>


                                    <p class="subtitule_txt">(you can edit this for whatever Title)
                                    </p>

                                    <textarea cols="30" rows="10" id="globalConnectionEditor">{!! $globalConnections !!}</textarea>
                                </li>
                            </div>
                        </div>

                        <div class="contente_item" @mouseleave="testChange()">
                            <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                            <textarea placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10">{!! $bibliography !!}</textarea>
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
                                        <label class="form-check-label" for="index-{{ $loop->index }}">
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
                drivingQuestion:"",
                projectSumary:"",
                publicProduct:"",
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
                toolsTitle: "{!! htmlspecialchars_decode($toolsTitle) !!}",
                showTools: true,
                tool: "",
                tools: [],
                learningGoalsTitle: "{!! htmlspecialchars_decode($learningGoalsTitle) !!}",
                showLearningGoals: true,
                learningGoalObjectives: "",
                learningGoals: [],
                resourcesTitle: "{!! htmlspecialchars_decode($resourcesTitle) !!}",
                showResources: true,
                showProjectMilestone: true,
                projectMilestoneTitle: "{!! htmlspecialchars_decode($projectMilestonesTitle) !!}",
                projectMilestones: [],
                milestoneTitle: "",
                expertTitle: "{!! htmlspecialchars_decode($expertTitle) !!}",
                showExpert: true,
                fieldWorkTitle: "{!! htmlspecialchars_decode($fieldWorkTitle) !!}",
                showFieldWork: true,
                globalConnectionsTitle: "{!! htmlspecialchars_decode($globalConnectionsTitle) !!}",
                showGlobalConnections: true,
                lastSave: "",
                isIncubator:"{{ $project[0]->is_incubator }}",
                private: JSON.parse('{!! $project[0]->is_private !!}'),
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

                if (this.milestoneTitle != "" && CKEDITOR.instances.learningGoalEditor.getData()) {
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
            popAllAges() {

                this.ages = []
                $(".check-age").attr("checked", false)

            },
            saveProject() {

                let formData = this.setFormData()

                axios.post("{{ url('project/creation/save') }}", formData).then(res => {

                    this.saveDate();

                })

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
            checkTest(age) {
                var exists = false
                this.ages.forEach((data) => {
                    if (data == age) {
                        exists = true
                    }
                })

                return exists
            },
            testChange(){
    
                this.drivingQuestion = CKEDITOR.instances.drivingQuestionEditor.getData()
                this.projectSumary = CKEDITOR.instances.projectSummaryEditor.getData()
                this.publicProduct = CKEDITOR.instances.publicProductEditor.getData()
                this.bibliography = CKEDITOR.instances.bibliographyEditor.getData()

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

                return formData

            },
            validateLaunch() {

                if(this.isIncubator == 1){
                    if(CKEDITOR.instances.projectSummaryEditor.getData() == ""){
                        swal({
                            text: "Project summary is required",
                            icon:"error"
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

            setCheckedUpvoteSystems() {

                this.upvoteSystems.forEach((data) => {
                    console.log("data", data)
                    document.getElementById("index-" + data).checked = true;
                })

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

                } else if (section == "fieldWork") {

                    if (this.showFieldWork == true) {
                        this.showFieldWork = false
                    } else {
                        this.showFieldWork = true
                    }

                } else if (section == "globalConnection") {

                    if (this.showGlobalConnections == true) {
                        this.showGlobalConnections = false
                    } else {
                        this.showGlobalConnections = true
                    }

                }
            },
            addLearningGoal() {

                if (this.learningGoalObjectives && CKEDITOR.instances.learningGoalEditor.getData()) {

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

                if (this.milestoneTitle && CKEDITOR.instances.projectMilestoneEditor.getData()) {

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
            launch() {

                if (this.validateLaunch()) {

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

            },
            erase(){

                swal({
                    title: "Are you sure?",
                    text: "You will delete this project!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        axios.post("{{ url('/project/delete') }}", {id: this.projectId}).then(res => {

                            if(res.data.success == true){

                                swal({
                                    "text": res.data.msg,
                                    "icon": "success"
                                }).then(res => {

                                    window.location.href="{{ url('teacher/profile') }}"

                                })

                            }else{

                                swal({
                                    "text": res.data.msg,
                                    "icon": "error"
                                })

                            }

                        })

                    }
                })

            },
            showProjectPrivacyAlert(){

                window.setTimeout(() => {

                    if(this.private == 0){
                        $("#privacyModalAlert").modal("show")
                    
                        $("#shared-icon").css("fill", "#547EBD")
                        $("#private-icon").css("fill", "black")
                    }else{

                        $("#shared-icon").css("fill", "black")
                        $("#private-icon").css("fill", "#547EBD")

                    }

                }, 500);

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
            CKEDITOR.replace("resourcesEditor", options)
            CKEDITOR.replace("expertEditor", options)
            CKEDITOR.replace("fieldWorkEditor", options)
            CKEDITOR.replace("globalConnectionEditor", options)
            CKEDITOR.replace("learningGoalEditor", options)
            CKEDITOR.replace("projectMilestoneEditor", options)


            let level = JSON.parse('{!! $level !!}')
            this.level = level.level
            this.ages = level.ages

            let learningGoals = '{!! $learningGoals !!}'
            if (learningGoals) {
                this.learningGoals = JSON.parse(learningGoals);
            }

            let milestone = '{!! $projectMilestones !!}'
            if (milestone) {
                this.projectMilestones = JSON.parse(milestone)
            }

            let calendarActivities = '{!! $calendarActivities !!}'
            if (calendarActivities) {
                this.calendarActivities = JSON.parse(calendarActivities)
            }

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

            this.tools = ("{!! htmlspecialchars_decode($tools) !!}").split(",")

            if (this.tools == "") {
                this.showTools = false
            }

            if (this.learningGoals.length == 0) {
                this.showLearningGoals = false
            }

            if ("{{ $resources }}" == "") {
                this.showResources = false
            }

            if (milestone == '') {
                this.showProjectMilestone = false
            }

            if ("{{ $expert }}" == "") {
                this.showExpert = false
            }

            if ("{{ $fieldWork }}" == "") {
                this.showFieldWork = false
            }

            if ("{{ $globalConnections }}" == "") {
                this.showGlobalConnections = false
            }

            this.testChange()

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