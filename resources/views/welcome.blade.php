@extends("layouts.main")

@section("content")


    <section class="mt-5 mb-5" id="home">

        <div class="home">
            <div class="home-present">
                <h1>Best source for Project Based Learning!</h1>
                <!---------------->
                <div>
                    <div>
                        <i class="fa fa-search icon-sear "></i>
                        <input v-model="query" type="text" class="search-home " placeholder="PBL names, teachers, #Hashtags!" v-on:keyup.enter="search()">
                    </div>
                </div>
                <!---------------->
                <p>9.000+ projects and counting!</p>
                <div class="hashtag-home">
                    <a :href="'{{ url('/hashtag/') }}'+'/'+hashtag.id" v-for="hashtag in hashtags"> <span v-cloak>#@{{ hashtag.name }}</span></a>
                </div>

            </div>
            <!---------------->
            <div class="row word">
                <div class="col-md-4">
                    <h3>Type</h3>
                    <div class="check-inst check-inst-home">
                        <label>
                            <input type="radio" class="option-input radio" value="school" v-model="categoryType" @click="setLevelByType()" />
                            School
                        </label>
                        <label>
                            <input type="radio" class="option-input radio" value="university" v-model="categoryType" @click="setLevelByType()" />
                            University
                        </label>
                    </div>
                </div>
                <div class="col-md-5">
                    <h3>Find Categories/Subjects</h3>
                    <div class="abc-home">
                        <div class="abc-content" v-for="(letter, key) in subjects">
                            <strong><a :href="'{{ url('subject/show-by-letter/') }}'+'/'+letter.letter" v-cloak>@{{ letter.letter }}</a></strong>
                            <p v-for="subject in letter.subjects"><a :href="'{{ url('subject/projects/') }}'+'/'+subject.id" v-cloak>@{{ subject.name }}</a></p>
                        </div>
                        

                    </div>

                </div>
                <div class="col-md-3">
                    <h3 v-if="categoryType == 'school'"> Age groups</h3>
                   
                    <div class="form-group" v-if="categoryType == 'school'">
                        <label for=""></label>
                        <select id="" class="form-control" v-model="level" @change="getSubjects()">
                            <option v-if="categoryType == 'school'" value="nursery">Nursery 0 - 3 </option>
                            <option v-if="categoryType == 'school'" value="early">Early Childhood 4 - 6</option>
                            <option v-if="categoryType == 'school'" value="primary">Primary/Elementary 7 - 10</option>
                            <option v-if="categoryType == 'school'" value="middle">Middle School 11 - 13</option>
                            <option v-if="categoryType == 'school'" value="high">High School 14 - 18</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>


        @php

            if(App\Project::count() > 0){
                $project = App\Like::select('project_id', \DB::raw('COUNT(project_id) as project_count'))->groupBy('project_id')->orderBy("project_count", "desc")->first();

                if($project){
                    $project = App\Project::where("id", $project->project_id)->with(["titles" => function($q){
                        $q->orderBy("id", "desc")->where("status", "launched")->take(1);
                        }
                    ])->with("user")->first();

                    $drivingQuestion = App\SecondaryField::where("project_id", $project->id)->where("type", "drivingQuestion")->orderBy("id", "desc")->where("status", "launched")->first();
                }
                
            }


        @endphp
        
        @if(App\Project::count() > 0 && $project)
        <div class="feactured-home">
            <h3 class="ml-3 mb-4 font-titulos text-center pt-4">Today’s featured wikiPBL!</h3>
            <div class="feactured-one">
                <p class="titulo">{{ $project->titles[0]->title }} <br> <span>by {{ $project->user->name }}</span> </p>
                <div class="row">
                    <div class="col-lg-6 col-md-12 ov-auto">
                        <p>{!! $drivingQuestion->description !!}</p>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        
                        {{ App\SubjectProject::where("project_id", $project->id)->with("subject")->first()->subject->name }}
                        <p>{{ $drivingQuestion->title }}</p>
                    </div>
                    <div class="col-lg-3 col-md-12">
                       <div class="hashtag-home mt-0 mb-5 pb-5">
                       @foreach(App\HashtagProject::where("project_id", $project->id)->with("hashtag")->get() as $hashtag)
                            <a href="{{ url('/hashtag/show/'.$hashtag->hashtag->id) }}"> <span>#{{ $hashtag->hashtag->name }}</span></a>
                        @endforeach
                    </div>
                        <a href="{{ url('/project/show/'.$project->id) }}" class="btn btn-custom btn-custom-green ">View complete PBL</a>
                    </div>





                </div>
            </div>
        </div>
        @endif
    </div>

    </section>


@endsection

@push("script")

    <script>
        const home = new Vue({
            el: '#home',
            data() {
                return {
                    categoryType:"school",
                    level:"nursery",
                    query:"",
                    hashtags:[],
                    subjects:[]
                }
            },
            methods:{

                getSubjects(){

                    axios.post("{{ url('/home/get-subjects') }}", {"institution_type": this.categoryType}).then(res => {

                        this.subjects = res.data.subjects

                    })

                },
                getHashtags(){

                    axios.get("{{ url('/home/get-hashtags') }}").then(res => {

                        this.hashtags = res.data.hashtags

                    })

                },
                setLevelByType(){

                    window.setTimeout(() => {

                        if(this.categoryType == "school"){

                            this.level = "nursery"
                            this.getSubjects()

                        }else{

                            //this.level = "1"
                            this.getSubjects()

                        }

                    }, 200);

                },
                search(){

                    window.location.href="{{ url('/search-results') }}"+"/"+this.query

                }

            },
            mounted(){

                this.getSubjects()
                this.getHashtags()

            }
        })
    </script>

@endpush