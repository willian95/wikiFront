@extends('layouts.main')

@section('content')


<div class="main-results" id="dev-search">


        <!--------------wikiPBL’s Projects---------------------->
        <div class="col-md-12">
            <h3 class="text-center"> Subjects</h3>
        </div>

        <div class="col-md-12">
            <a class="card" v-for="(subject,index) in subjects" :href="'{{ url('/subject/projects/') }}'+'/'+subject.id">
                <p>@{{ subject.name }}</p>
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
                    subjects:[],
                    pages:0,
                    page:1
                }
            },
            methods:{

                fetchSearch(page = 1){

                    axios.post("{{ url('/search/only/subjects') }}", {search: this.query, page: this.page}).then(res => {

                        this.subjects = res.data.subjects
                        this.pages = Math.ceil(res.data.subjectsCount / res.data.dataAmount)


                    })

                },

                

            },
            mounted(){

                this.fetchSearch()


            }
        })
    </script>

@endpush