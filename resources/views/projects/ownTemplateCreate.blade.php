@extends("layouts.project")

@section("content")

    <div id="own-template">
        @include("partials.projectHeader", ["projectAction" => "creation"])
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
                                <li> <a style="cursor: pointer;" @click="scrollTo('title-p')"><i class="fa fa-times" aria-hidden="true" v-if="title == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="title != '' || incubatorFeature == true"></i>@{{ title }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('driving')"><i class="fa fa-times" aria-hidden="true" v-if="drivingQuestion == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="drivingQuestion != '' || incubatorFeature == true"></i>@{{ drivingQuestionTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('subjecttitle')"><i class="fa fa-times" aria-hidden="true" v-if="subjects.length == 0 && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="subjects.length > 0 || incubatorFeature == true"></i>@{{ subjectTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('time')"><i class="fa fa-times" aria-hidden="true" v-if="timeFrame == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="timeFrame != '' || incubatorFeature == true"></i>@{{ timeFrameTitle }}</a></li>
                                <li><a style="cursor: pointer;" @click="scrollTo('projectsumary')"><i class="fa fa-times" aria-hidden="true" v-if="projectSumary == ''"></i> <i class="fa fa-check" aria-hidden="true" v-if="projectSumary != ''"></i>Project Summary</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('publictitle')"><i class="fa fa-times" aria-hidden="true" v-if="publicProduct == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="publicProduct != '' || incubatorFeature == true"></i>@{{ publicProductTitle }}</a> </li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('leveltitle')"><i class="fa fa-times" aria-hidden="true" v-if="level == '' && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="level != '' || incubatorFeature == true"></i>@{{ levelTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')"><i class="fa fa-times" aria-hidden="true" v-if="hashtags.length == 0 && incubatorFeature == false"></i> <i class="fa fa-check" aria-hidden="true" v-if="hashtags.length > 0 || incubatorFeature == true"></i>#hashtags</a></li>

                                </ul>
                            </div>
                            <div class="menu-template_option">
                                <ul>
                                    <p>Main info</p>
                                    <li><button class="btn btn-custom" @click="launch()">Launch</button></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!----------------info----------------->
                    <div class="col-md-9 info-template" id="title">
                        <!--------------------general--------------------------->
                        <ul class="content_template content_template-general">

                            <li class="content_template-general-item">
                                <p>Incubator Features</p>
                                <img alt='icon' class="login_icon incubator" src="http://imgfz.com/i/DmsV3CK.png">
                                <!-- Rounded switch -->
                                <label class="switch" >
                                    <input type="checkbox" v-model="incubatorFeature">
                                    <span class="slider slider-nav round"></span>
                                </label>
                            </li>

                            <li class="content_template-general-item" id="title-p" style="margin-top: 100px;" @mouseleave="testChange()">
                                <h3 class="titulo-templates">
                                    
                                    <span v-if="editSection != 'title'">@{{ title }}</span> 
                                    <input v-if="editSection == 'title'" type="text" class="form-control" v-model="title">
                                    
                                    <a class="txt-edit" href="#" @click="setEditSection('title')">
                                        <span v-if="editSection != 'title'">Click to edit</span>
                                        <span v-if="editSection == 'title'">Click to finish editing</span>
                                        <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

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
                                    <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

                                </a>
                            </div>
                              
                                <p class="subtitule_txt">(you can edit Driving question for whatever Title)</p>
                                
                                <textarea name="" id="drivingQuestionEditor" cols="30" rows="10"></textarea>

                            </li>
                            <li class="content_template-general-item" id="subjecttitle">
                            <div class="flex-edit" >
                            <h3 class="titulo-templates" v-if="editSection != 'subjectTitle'">@{{ subjectTitle }}</h3>
                                <input v-if="editSection == 'subjectTitle'" type="text" class="form-control" v-model="subjectTitle">
                                <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('subjectTitle')">
                                    <span v-if="editSection != 'subjectTitle'">Click to edit</span>
                                    <span v-if="editSection == 'subjectTitle'">Click to finish editing</span>
                                    <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

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
                                        <div class="card card-sub">
                                            <div class="card-body">
                                                
                                                @{{ subject }}
                                               
                                                <span class=" close-tab"  @click="popSubject(index)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="#000" d="M7.05022 7.05028C6.65969 7.4408 6.65969 8.07397 7.05022 8.46449L10.5858 12L7.05023 15.5356C6.6597 15.9261 6.6597 16.5593 7.05023 16.9498C7.44075 17.3403 8.07392 17.3403 8.46444 16.9498L12 13.4142L15.5355 16.9498C15.926 17.3403 16.5592 17.3403 16.9497 16.9498C17.3402 16.5592 17.3402 15.9261 16.9497 15.5356L13.4142 12L16.9497 8.46449C17.3402 8.07397 17.3402 7.4408 16.9497 7.05028C16.5592 6.65976 15.926 6.65976 15.5355 7.05028L12 10.5858L8.46443 7.05028C8.07391 6.65975 7.44074 6.65975 7.05022 7.05028Z"/></svg></span>

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
                                    <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

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
                                <textarea id="projectSummaryEditor" name="" placeholder="This will be shown as a preview of your wikiPBL project........." cols="30" rows="10"></textarea>
                            </li>

                            <li class="content_template-general-item"  id="publictitle" @mouseleave="testChange()">
                                <h3 class="titulo-templates" v-if="editSection != 'publicProductTitle'">@{{ publicProductTitle }}</h3>
                                <input v-if="editSection == 'publicProductTitle'" type="text" class="form-control" v-model="publicProductTitle">
                                <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('publicProductTitle')">
                                    <span v-if="editSection != 'publicProductTitle'">Click to edit</span>
                                    <span v-if="editSection == 'publicProductTitle'">Click to finish editing</span>
                                    <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

                                </a>
                                <p class="subtitule_txt">(you can edit this for whatever Title)
                                </p>
                                <textarea id="publicProductEditor" name="" placeholder="What will be the product that students will show to an audience? " cols="30" rows="10"></textarea>
                            </li>

                            <li class="content_template-general-item" id="leveltitle" @mouseleave="testChange()">
                            <div class="flex-edit">
                            <h3 class="titulo-templates"  v-if="editSection != 'levelTitle'">@{{ levelTitle }}</h3>
                                <input v-if="editSection == 'levelTitle'" type="text" class="form-control" v-model="levelTitle">
                                <a class="txt-edit" style="cursor: pointer;" @click="setEditSection('levelTitle')">
                                    <span v-if="editSection != 'levelTitle'">Click to edit</span>
                                    <span v-if="editSection == 'levelTitle'">Click to finish editing</span>
                                    <svg class="color-icon icnon-edit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="edit"><rect width="24" height="24" opacity="0"/><path d="M19.4 7.34L16.66 4.6A2 2 0 0 0 14 4.53l-9 9a2 2 0 0 0-.57 1.21L4 18.91a1 1 0 0 0 .29.8A1 1 0 0 0 5 20h.09l4.17-.38a2 2 0 0 0 1.21-.57l9-9a1.92 1.92 0 0 0-.07-2.71zM9.08 17.62l-3 .28.27-3L12 9.32l2.7 2.7zM16 10.68L13.32 8l1.95-2L18 8.73z"/></g></g></svg>

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
                                        <div class="row" v-show="level == 'nursery'" >
                                            
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
                                            <input class="form-check-input check-age"  type="checkbox" :checked="checkTest('all ages')" value="" id="noapply">
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
                                        <div class="card card-sub">
                                            <div class="card-body"> 
                                                #@{{ hashtag }}

                                                <span class="close-tab" style="pointer" @click="popHashtag(index)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path fill="#000" d="M7.05022 7.05028C6.65969 7.4408 6.65969 8.07397 7.05022 8.46449L10.5858 12L7.05023 15.5356C6.6597 15.9261 6.6597 16.5593 7.05023 16.9498C7.44075 17.3403 8.07392 17.3403 8.46444 16.9498L12 13.4142L15.5355 16.9498C15.926 17.3403 16.5592 17.3403 16.9497 16.9498C17.3402 16.5592 17.3402 15.9261 16.9497 15.5356L13.4142 12L16.9497 8.46449C17.3402 8.07397 17.3402 7.4408 16.9497 7.05028C16.5592 6.65976 15.926 6.65976 15.5355 7.05028L12 10.5858L8.46443 7.05028C8.07391 6.65975 7.44074 6.65975 7.05022 7.05028Z"/></svg></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>

                        </ul>
                        <!-----------------------END general------------------------>

                        <div class="content_template">

                            <textarea name="" placeholder="" id="mainEditor" cols="30" rows="10"></textarea>

                            <div class="contente_item mt-5 mb-5">
                                <h3 class="titulo-templates  mt-5 mb-5">Calendar of activities </h3>
                                
                                <div class="container-fluid">
                                    
                                    <div class="row">
                                        
                                        <label for="inp">Weeks</label>
                                        <select id="inpt" class="form-control" v-model="weeks">
                                            <option v-for="week in 18" :value="week" v-if="week > 0">@{{ week }} </option>
                                        </select>
                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2"><svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                            <g> <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" /><path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" /> <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" /> <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" /><path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" /> <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" /> <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" /><path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" /> <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                        </svg>Day 1</div>
                                        <div class="col-md-2"><svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                            <g> <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" /><path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" /> <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" /> <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" /><path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" /> <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" /> <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" /><path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" /> <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                        </svg>Day 2</div>
                                        <div class="col-md-2"><svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                            <g> <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" /><path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" /> <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" /> <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" /><path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" /> <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" /> <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" /><path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" /> <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                        </svg>Day 3</div>
                                        <div class="col-md-2"><svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                            <g> <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" /><path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" /> <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" /> <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" /><path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" /> <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" /> <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" /><path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" /> <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                        </svg>Day 4</div>
                                        <div class="col-md-2"><svg version="1.1" id="Capa_1" class="icon-calendar icon-calendar-blue" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                            <g> <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" /><path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" /> <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" /> <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" /><path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" /> <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" /> <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" /><path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" /> <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                        </svg>Day 5</div>
                                    </div>
                                    <div class="row mt-1" v-for="week in weeks">
                                        <div class="col-md-2">    <svg id="Capa_1" class="icon-calendar icon-calendar-blue" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="m497 32h-46v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-46c-8.284 0-15 6.716-15 15v450c0 8.284 6.716 15 15 15h482c8.284 0 15-6.716 15-15v-450c0-8.284-6.716-15-15-15zm-436 30v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h31v60h-452v-60zm-31 420v-330h452v330z" />
                                                <path d="m166 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                <path d="m406 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                <path d="m286 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                <path d="m286 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                <path d="m406 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                <path d="m175.462 345.161c-6.428-5.226-15.875-4.25-21.101 2.176l-30.498 37.513-8.352-6.849c-6.406-5.255-15.857-4.318-21.11 2.087-5.253 6.406-4.318 15.857 2.088 21.11l20 16.4c6.438 5.28 15.922 4.295 21.15-2.136l40-49.2c5.226-6.428 4.251-15.875-2.177-21.101z" />
                                            </g>
                                        </svg>    Week @{{ week }}</div>
                                        <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target="#calendarDescription">
                                            <div class="card days">
                                                <div class="card-body card-body_tarea">
                                                    @{{ showActivity(week, day) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>


                            </div>

                            <div class="contente_item mt-5 mb-5" @mouseleave="testChange()">
                                <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                                <textarea name="" lang="" placeholder="Always cite!" id="bibliographyEditor" cols="30" rows="10"></textarea>
                            </div>

                            <div class="mt-5 mb-5">
                                <h1>Which Upvote System
                                    options will your wikiPBL
                                    have?
                                </h1>
                                
                                <div class="row">
                                    @foreach(App\AssestmentPointType::get() as $point)
                                        <div class="col-md-6">
                                            <i class="{{ $point->icon }}"></i>
                                            <div class="form-check" @click="addOrPopUpVoteSystems('{{ $point->id }}')">
                                                
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
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
            <a class="up" href="#own-template">            <div class="arrow-up"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 32 32" fill="#fff"><path d="M11.218 20.2L17 14.418l5.782 5.782a1 1 0 0 0 1.414-1.414L17.71 12.3a.997.997 0 0 0-.71-.292.997.997 0 0 0-.71.292l-6.486 6.486a1 1 0 0 0 1.414 1.414z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="arrow,carrot,up" dc:description="arrow,carrot,up" dc:publisher="Iconscout" dc:date="2017-09-25" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Elegant Themes</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg></div>
</a>
            <footer class="footer-estyle">
                <div class="footer container mt-5 text-center">
                    <p> <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a> - <a data-toggle="modal"
                            data-target=".terms">Terms & Conditions</a> - <a href="#">About wikiPBL</a> - 2021
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
                    projectId: "{{ $project->id }}",
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
                    projectSumary:"",
                    level:"",
                    ages:[],
                    hashtag:"",
                    hashtags:[],
                    calendarActivities:[],
                    activityDescription:"",
                    days:5,
                    weeks:4,
                    calendarDay:"",
                    lastSave:"",
                    private:0,
                    calendarWeek:"",
                    upvoteSystems:[],
                    editSection:"",
                    loading:false,
                    incubatorFeature:false
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
                    this.activityDescription = ""
                    this.calendarDay = day
                    this.calendarWeek = week
                    this.calendarActivities.forEach(data => {
                        if(data.week == week && data.day == day){
                            this.activityDescription = data.description
                        }
                    })
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
                        this.weeks = this.weeks
                        $("#calendarDescription").modal('hide')
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
                launch(){
                    if(this.validateLaunch()){
                        this.loading = true
                        let formData = this.setFormData()
                        
                        axios.post("{{ url('project/creation/launch') }}", formData).then(res => {
                            this.loading = false
                            if(res.data.success == true){
                                swal({
                                    text: res.data.msg,
                                    icon: "success"
                                }).then(() => {
                                    window.location.href="{{ url('/teacher/profile') }}"
                                })
                            }else{
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
                saveProject(){
                    let formData = this.setFormData()
                    axios.post("{{ url('project/creation/save') }}", formData).then(res => {
                        this.saveDate();
                    })
                },
                saveDate(){
                    let today = new Date();
                    let dd = String(today.getDate()).padStart(2, '0');
                    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    let yyyy = today.getFullYear();
                    let hour = today.getHours();
                    let minutes = today.getMinutes();
                    this.lastSave =  mm + '/' + dd + '/' + yyyy + " " + hour + " : "+minutes;
                },
                setFormData(){
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
                    formData.append("isIncubator", this.incubatorFeature)
                    
                    return formData
                },
                validateLaunch(){

                    if(this.incubatorFeature == true){

                        if(CKEDITOR.instances.projectSummaryEditor.getData() == ""){
                            swal({
                                text: "Project summary is required",
                                icon:"error"
                            })
                            return false
                        }

                        return true
                    }

                    if(this.title == ""){
                        swal({
                            text: "Title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.drivingQuestionTitle == ""){
                        swal({
                            text: "Driving question title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(CKEDITOR.instances.drivingQuestionEditor.getData() == ""){
                        swal({
                            text: "Driving question is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.subjectTitle == ""){
                        swal({
                            text: "Subject title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.subjects.length == 0){
                        swal({
                            text: "You have to add subjects to continue",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.timeFrameTitle == ""){
                        swal({
                            text: "Time frame title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.timeFrame == ""){
                        swal({
                            text: "Time frame is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(CKEDITOR.instances.projectSummaryEditor.getData() == ""){
                        swal({
                            text: "Project summary is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.publicProductTitle == ""){
                        swal({
                            text: "Public product title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(CKEDITOR.instances.publicProductEditor.getData() == ""){
                        swal({
                            text: "Public product is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.levelTitle == ""){
                        swal({
                            text: "Level title is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.level == ""){
                        swal({
                            text: "Level is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.ages.length == 0){
                        swal({
                            text: "You have to add ages to continue",
                            icon:"error"
                        })
                        return false
                    } 
                    
                    else if(this.hashtags.length == 0){
                        swal({
                            text: "You have to add hashtags to continue",
                            icon:"error"
                        })
                        return false
                    } 
                    else if(CKEDITOR.instances.mainEditor.getData() == ""){
                        swal({
                            text: "Main info is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.calendarActivities.length == 0){
                        swal({
                            text: "You have to add activities to continue",
                            icon:"error"
                        })
                        return false
                    } 
                    else if(CKEDITOR.instances.bibliographyEditor.getData() == ""){
                        swal({
                            text: "Bibliography is required",
                            icon:"error"
                        })
                        return false
                    }
                    else if(this.upvoteSystems.length == 0){
                        swal({
                            text: "You have to add upvote systems to continue",
                            icon:"error"
                        })
                        return false
                    } 
                    return true
                },
                showProjectPrivacyAlert(){

                    window.setTimeout(() => {

                        if(this.private == 1){
                            $("#privacyModalAlert").modal("show")
                        }

                    }, 500);

                },
                checkTest(age){
                    var exists = false
                    this.ages.forEach((data) => {
                        if(data == age){
                            exists = true
                        }
                    })

                    return exists
                },
                popAllAges(){

                    this.ages = []
                    $(".check-age").attr("checked", false)

                },
                scrollTo(identifier){

                    let distance = $("#"+identifier).offset().top - 120

                    $('html, body').animate({
                        scrollTop: distance
                    }, 50);

                },
                testChange(){
    
                    this.drivingQuestion = CKEDITOR.instances.drivingQuestionEditor.getData()
                    this.projectSumary = CKEDITOR.instances.projectSummaryEditor.getData()
                    this.publicProduct = CKEDITOR.instances.publicProductEditor.getData()
                    this.bibliography = CKEDITOR.instances.bibliographyEditor.getData()

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
            mounted(){
                
                let options = {
                    filebrowserUploadUrl:"{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                    filebrowserUploadMethod: 'form',
                    language:"en"
                }

                CKEDITOR.replace('drivingQuestionEditor', options);
                CKEDITOR.replace("projectSummaryEditor", options)
                CKEDITOR.replace("publicProductEditor", options)
                CKEDITOR.replace("bibliographyEditor", options)
                CKEDITOR.replace("mainEditor", options)
                this.saveProject()
                window.setInterval(() =>{
                    this.saveProject()

                }, 120000)

                window.setInterval(() => {
                    this.showCKEditorAlert()
                }, 1000)

            }
        })
    
    </script>

@endpush