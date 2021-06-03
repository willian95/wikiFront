@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title mt-4 ">
        <h1>{{ $letter }}</h1>
    </div>
    <div class="row word">
        <div class="col-md-12">
            
            <a :href="'{{ url('teacher/show/') }}'+'/'+teacher.id" v-for="teacher in teachers">
                <div class="card">
                    <div class="card-body">
                        <p v-cloak>@{{ teacher.name }} @{{ teacher.lastname }}</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
    <div class="row" v-cloak>
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
                    letter:"{{ $letter }}",
                    page:1,
                    pages:0,
                    teachers:[]
                }
            },
            methods:{
                fetch(page = 1){
                    
                    this.page = page

                    axios.get("{{ url('teacher/fetch/by-letter/') }}"+'/'+this.letter+"/"+this.page).then(res => {

                        this.teachers = res.data.teachers
                        this.pages = Math.ceil(res.data.teachersCount / res.data.dataAmount)

                    })

                }
            },
            mounted(){

                this.fetch()

            }

        })
    
    </script>
@endpush