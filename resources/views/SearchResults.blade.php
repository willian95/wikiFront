@extends('layouts.main')

@section('content')


<div class="main-results" id="dev-search">
    <div class="home-present mt-5 mb-5">
        <!---------------->
        <div class="">
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
                    <strong><a href="#" v-cloak>@{{ subject.letter }}</a></strong>
                    <p v-for="word in subject.results"><a :href="'{{ url('/subject/projects/') }}'+'/'+word.id" v-cloak>@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/hashtags/') }}'+'/'+this.query">
                <h3 class="text-center"> Hashtags</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="hashtag in hashtags">
                    <strong><a href="#" v-cloak>@{{ hashtag.letter }}</a></strong>
                    <p v-for="word in hashtag.results"><a :href="'{{ url('/hashtag/') }}'+'/'+word.id" v-cloak>#@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/teachers/') }}'+'/'+this.query">
                <h3 class="text-center"> Educators</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="teacher in teachers">
                    <strong><a href="#" v-cloak>@{{ teacher.letter }}</a></strong>
                    <p v-for="word in teacher.results"><a :href="'{{ url('/teacher/show') }}'+'/'+word.id" v-cloak>@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/schools/') }}'+'/'+this.query">
                <h3 class="text-center"> Schools</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="school in schools">
                    <strong><a href="#" v-cloak>@{{ school.letter }}</a></strong>
                    <p v-for="word in school.results"><a :href="'{{ url('/institution/show') }}'+'/'+word.id" v-cloak>@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/universities/') }}'+'/'+this.query">
                <h3 class="text-center"> Universities</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="university in universities">
                    <strong><a href="#" v-cloak>@{{ university.letter }}</a></strong>
                    <p v-for="word in university.results"><a :href="'{{ url('/institution/show') }}'+'/'+word.id" v-cloak>@{{ word.name }}</a></p>

                </div>
            </div>

        </div>

        <div class="col-md-12">
            <a :href="'{{ url('/search/only/organizations/') }}'+'/'+this.query">
                <h3 class="text-center"> Organizations</h3>
            </a>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="organization in organizations">
                    <strong><a href="#" v-cloak>@{{ organization.letter }}</a></strong>
                    <p v-for="word in organization.results"><a :href="'{{ url('/institution/show') }}'+'/'+word.id" v-cloak>@{{ word.name }}</a></p>

                </div>
            </div>

        </div>


        <!--------------wikiPBL’s Projects---------------------->
        <div class="col-md-12">
            <h3 class="text-center"> <a :href="'{{ url('/search/only/projects/') }}'+'/'+this.query">
            wikiPBL’s Projects
            </a></h3>
        </div>
        <div class="col-md-12 card-proyectos ">
            {{--<a class="card" v-for="(project,index) in projects" :href="'{{ url('/project/show/') }}'+'/'+project[0].id">
                <p v-if="project[0].titles[0]">@{{ project[0].titles[0].title }}, @{{ project[0].user.name }} @{{ project[0].user.lastname }}</p>
            </a>--}}
            <div class="card border-0" v-for="(project,index) in projects" v-if="project[0].type != 'following'">
                <a :href="'{{ url('/project/show/') }}'+'/'+project[0].id">
                    
                    <p v-if="project[0].titles[0]" v-cloak>@{{ project[0].titles[0].title }}, @{{ project[0].user.institution ? project[0].user.institution.name : project[0].user.pending_institution_name }}</p>
                </a>
                
                <!---------------------iconos------------------->
                <div class="grupo-iconos">

                    <span class="menu-icon_hover" v-if="project[0].is_incubator == 1">
                        <span class="tooltip-nav-info_last">Incubator</span>
                        <img alt='icon' class="login_icon mr-3 " src="http://imgfz.com/i/DmsV3CK.png">
                    </span>

                        <!---------------------icono1------------------->
                    <span v-cloak>
                        @{{ project[0].likes.length }}
                        <svg class="login_icon mr-3  hover-svg fill-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z" />
                        </svg>
                    </span>
                        <!---------------------icono2------------------->
                        <span v-if="project[0].is_private == 0">
                            <svg class="login_icon  hover-svg mr-3 " xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                            </svg>
                        </span>
                        <span v-if="project[0].is_private == 1">
                            <svg class="login_icon " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path d="M28.707,15.293l-2.412-2.412a14.574,14.574,0,0,0-20.59,0L3.293,15.293a1,1,0,0,0,0,1.414l2.412,2.412a14.575,14.575,0,0,0,20.59,0l2.412-2.412A1,1,0,0,0,28.707,15.293Zm-3.826,2.412a12.574,12.574,0,0,1-17.762,0L5.414,16l1.705-1.705a12.574,12.574,0,0,1,17.762,0L26.586,16Z" />
                                <path d="M16,11a5,5,0,1,0,5,5A5.006,5.006,0,0,0,16,11Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,16,19Z" />
                            </svg>
                        </span>
                        <!---------------------icono3------------------->
                    <span class="line_" v-cloak>@{{ dateFormatter(project[0].updated_at) }}</span>
                </div>

                <a v-if="project[0].status == 'launched'" :href="'{{ url('project/original/show/') }}'+'/'+project[0].id" class="btn btn-info line_ mt-0 mb-0">Original</a>
            </div>
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
                    projects:[],
                    teachers:[],
                    schools:[],
                    universities:[],
                    organizations:[]
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
                teacherSearch(){

                    axios.post("{{ url('/search/teacher') }}", {search: this.query}).then(res => {

                        this.teachers = res.data.teachers

                    })

                },
                schoolSearch(){

                    axios.post("{{ url('/search/school') }}", {search: this.query}).then(res => {

                        this.schools = res.data.schools

                    })

                },
                universitySearch(){

                    axios.post("{{ url('/search/university') }}", {search: this.query}).then(res => {

                        this.universities = res.data.universities

                    })

                },
                organizationSearch(){

                    axios.post("{{ url('/search/organization') }}", {search: this.query}).then(res => {

                        this.organizations = res.data.organizations

                    })

                },
                dateFormatter(date) {

                    let year = date.substring(0, 4)
                    let month = date.substring(5, 7)
                    let day = date.substring(8, 10)

                    if(day == "01" || day == "21" || day == "31"){
                        day = day+"st"
                    }

                    else if(day == "02" || day == "22"){
                        day = day+"nd"
                    }

                    else if(day == "03" || day == "23"){
                        day = day+"rd"
                    }

                    else{
                        day = day+"th"
                    }

                    if(month == "01"){
                        month = "January"
                    }

                    else if(month == "02"){
                        month = "February"
                    }

                    else if(month == "03"){
                        month = "March"
                    }

                    else if(month == "04"){
                        month = "April"
                    }

                    else if(month == "05"){
                        month = "May"
                    }

                    else if(month == "06"){
                        month = "June"
                    }

                    else if(month == "07"){
                        month = "July"
                    }

                    else if(month == "08"){
                        month = "August"
                    }

                    else if(month == "09"){
                        month = "September"
                    }

                    else if(month == "10"){
                        month = "October"
                    }

                    else if(month == "11"){
                        month = "November"
                    }

                    else if(month == "12"){
                        month = "December"
                    }

                    return day + " " + month + " " + year
                },
                search(){

                    this.hashtagSearch()
                    this.subjectSearch()
                    this.projectSearch()
                    this.teacherSearch()
                    this.schoolSearch()
                    this.universitySearch()
                    this.organizationSearch()

                }

            },
            mounted(){

                this.search()

            }
        })
    </script>

@endpush