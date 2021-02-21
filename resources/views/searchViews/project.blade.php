@extends('layouts.main')

@section('content')


<div class="main-results" id="dev-search">


        <!--------------wikiPBL’s Projects---------------------->
        <div class="col-md-12">
            <h3 class="text-center"> Projects</h3>
        </div>

        <div class="col-md-12">
            <a class="card" v-for="(project,index) in projects" :href="'{{ url('/project/show/') }}'+'/'+project[0].id">
                <p v-if="project[0].titles[0]">@{{ project[0].titles[0].title }}, @{{ project[0].user.name }} @{{ project[0].user.lastname }}</p>
            </a>
        </div>


        <div class="row">
            <div class="col-12">
                <ul class="pagination">
                    <li class="page-item" v-for="index in pages">
                        <a class="page-link" style="cursor: pointer" :key="index" @click="fetchSearch(index)">@{{ index }}</a>
                    </li>
                </ul>
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
                    projects:[],
                    pages:0,
                    page:1
                }
            },
            methods:{

                fetchSearch(page = 1){
                    this.page = page
                    axios.post("{{ url('/search/only/projects') }}", {search: this.query, page: this.page}).then(res => {

                        this.projects = res.data.projects
                        this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)


                    })

                },

                

            },
            mounted(){

                this.fetchSearch()


            }
        })
    </script>

@endpush