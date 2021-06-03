@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title mt-4 ">
        <h1>{{ $letter }}</h1>
    </div>
    <div class="row word">
        <div class="col-md-12">
            
            <a :href="'{{ url('institution/show/') }}'+'/'+institution.id" v-for="institution in institutions">
                <div class="card">
                    <div class="card-body">
                        <p v-cloak>@{{ institution.name }}</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <ul class="pagination">
                <li class="page-item" v-for="index in pages">
                    <a class="page-link" href="#" :key="index" @click="fetch(index)" v-cloak>@{{ index }}</a>
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
                    type:"{{ $type }}",
                    page:1,
                    pages:0,
                    institutions:[]
                }
            },
            methods:{
                fetch(page = 1){
                    
                    this.page = page

                    axios.get("{{ url('institution/'.$type.'/fetch/by-letter/') }}"+'/'+this.letter+"/"+this.page).then(res => {

                        this.institutions = res.data.institutions
                        this.pages = Math.ceil(res.data.institutionsCount / res.data.dataAmount)

                    })

                }
            },
            mounted(){

                this.fetch()

            }

        })
    
    </script>
@endpush