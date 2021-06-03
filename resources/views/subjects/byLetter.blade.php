@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title mt-4 ">
        <h1>{{ $letter }}</h1>
    </div>
    <div class="row word">
        <div class="col-md-12">
            
            <a :href="'{{ url('subject/projects/') }}'+'/'+subject.id" v-for="subject in subjects">
                <div class="card">
                    <div class="card-body">
                        <p v-cloak>@{{ subject.name }}</p>
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
                    subjects:[]
                }
            },
            methods:{
                fetch(page = 1){
                    
                    this.page = page

                    axios.get("{{ url('subject/fetch/by-letter/') }}"+'/'+this.letter+"/"+this.page).then(res => {

                        this.subjects = res.data.subjects
                        this.pages = Math.ceil(res.data.subjectsCount / res.data.dataAmount)

                    })

                }
            },
            mounted(){

                this.fetch()

            }

        })
    
    </script>
@endpush