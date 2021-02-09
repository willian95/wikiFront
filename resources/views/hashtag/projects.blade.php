@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title">
        <h1>{{ $hashtag }}</h1>
        <p>{{ $count }}+ and counting!</p>
    </div>
    <div class="row word">
        <div class="col-md-12">
            
            <a :href="'{{ url('project/show/') }}'+'/'+project.titles[0].slug" v-for="project in projects">
                <div class="card">
                    <div class="card-body">
                        <p>@{{ project.titles[0].title }} @{{ project.user.institution ? project.user.institution.name : project.user.pending_institution.name }}</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
</div>

@endsection

@push("script")

    <script>
        const subjects = new Vue({
            el: '#elements',
            data() {
                return {
                    hashtag:"{{ $hashtag }}",
                    projects:[]
                }
            },
            methods:{
                getProjects(){
                    
                    axios.get("{{ url('hashtag/projects') }}"+'/'+this.hashtag).then(res => {

                        this.projects = res.data.projects

                    })

                }
            },
            mounted(){

                this.getProjects()

            }

        })
    
    </script>
@endpush