@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title">
        <h1>{{ $subject->name }}</h1>
        <p>{{ $count }}+ and counting!</p>
    </div>
    <div class="row word">
        <div class="col-md-12">
            
            <a :href="'{{ url('project/show/') }}'+'/'+project.id" v-for="project in projects">
                <div class="card">
                    <div class="card-body">
                        <p>@{{ project.titles[0].title }} @{{ project.user.institution ? project.user.institution.name : project.user.pending_institution.name }}</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <ul class="pagination">
                <li class="page-item" v-for="index in pages">
                    <a class="page-link" href="#" :key="index" @click="fetch(index)" >@{{ index }}</a>
                </li>
            </ul>
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
                    subject:"{{ $subject->id }}",
                    page:1,
                    pages:0,
                    projects:[]
                }
            },
            methods:{
                fetch(page = 1){
                    
                    this.page = page

                    axios.get("{{ url('subject/fetch/projects') }}"+'/'+this.subject+"/"+this.page).then(res => {

                        this.projects = res.data.projects
                        this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                    })

                }
            },
            mounted(){

                this.fetch()

            }

        })
    
    </script>
@endpush