@extends('layouts.main')

@section('content')


<div class="main-results" id="dev-search">
    <div class="home-present">
        <!---------------->
        <div>
            <div>
                <i class="fa fa-search icon-sear "></i>
                <input type="text" class="search-home " placeholder="PBL names, teachers, #Hashtags!" v-on:keyup.enter="search()" v-model="query">
            </div>
        </div>
        <!---------------->

    </div>
    <!------------------------>
    <div class="row word">
        <div class="col-md-12">
            <h3 class="text-center"><a :href="'{{ url('/search/only/subjects/') }}'+'/'+this.query">Subjects</a></h3>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="subject in subjects">
                    <strong><a href="#">@{{ subject.letter }}</a></strong>
                    <p v-for="word in subject.results"><a :href="'{{ url('/subject/projects/') }}'+'/'+word.id">#@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/hashtags/') }}'+'/'+this.query">
                <h3 class="text-center"> Hashtags</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="hashtag in hashtags">
                    <strong><a href="#">@{{ hashtag.letter }}</a></strong>
                    <p v-for="word in hashtag.results"><a :href="'{{ url('/hashtag/') }}'+'/'+word.id">#@{{ word.name }}</a></p>

                </div>
            </div>

        </div>


        <!--------------wikiPBL’s Projects---------------------->
        <div class="col-md-12">
            <h3 class="text-center"> <a :href="'{{ url('/search/only/projects/') }}'+'/'+this.query">
            wikiPBL’s Projects
            </a></h3>
        </div>

        <div class="col-md-12">
            <a class="card" v-for="(project,index) in projects" :href="'{{ url('/project/show/') }}'+'/'+project[0].id">
                <p v-if="project[0].titles[0]">@{{ project[0].titles[0].title }}, @{{ project[0].user.name }} @{{ project[0].user.lastname }}</p>
            </a>
        </div>






    </div>
</div>


@endsection

@push("script")

    <script>
        const home = new Vue({
            el: '#dev-search',
            data() {
                return {
                    query:"{{ $search }}",
                    hashtags:[],
                    subjects:[],
                    projects:[]
                }
            },
            methods:{

                hashtagSearch(){

                    axios.post("{{ url('/search/hashtag') }}", {search: this.query}).then(res => {

                        this.hashtags = res.data.hashtags

                    })

                },
                subjectSearch(){

                    axios.post("{{ url('/search/subject') }}", {search: this.query}).then(res => {

                        this.subjects = res.data.subjects

                    })

                },
                projectSearch(){

                    axios.post("{{ url('/search/project') }}", {search: this.query}).then(res => {

                        this.projects = res.data.projects
                        console.log("projects", this.projects)
                    })

                },
                search(){

                    this.hashtagSearch()
                    this.subjectSearch()
                    this.projectSearch()

                }

            },
            mounted(){

                this.search()

            }
        })
    </script>

@endpush