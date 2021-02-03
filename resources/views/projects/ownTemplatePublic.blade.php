@extends("layouts.main")

@section("content")

<div class="container  main-template mt-5" id="own-template">

    <div class="row">
        <div class="col-md-3">
            <div class="menu-template">
                <p>Edit mode </p>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li> wikiPBL title</li>
                        <li> Driving Question</li>
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
        const public = new Vue({
            el: '#own-template',
            data() {
                return {
                    calendarActivities:[],
                    activityDescription:"",
                    days:5,
                    weeks:4,
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

                }

            },
            mounted(){

                

            }

        })
    
    </script>

@endpush
