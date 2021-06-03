@extends("layouts.main")

@section("content")


<div class="categories-layout" id="elements">
    <div class="text-center categories-layout_title mt-4 ">
        <h1>{{ $type }}: {{ $title }}</h1>
        <p>{{ $count }}+ {{ strtolower($title) }} and counting!</p>
    </div>
    <div class="row word">
        <div class="col-md-12">
            <h3> {{ $subtitle }}</h3>
            <div class="abc-home abc-categories">
                <div class="abc-content" v-for="letter in elements">
                    <strong>
                        @if($type == 'teacher')
                            <a :href="'{{ url('/teacher/show-by-letter/') }}'+'/'+letter.letter" v-cloak>@{{ letter.letter }}</a>
                        @elseif($type == 'school' || $type == 'university' || $type == 'organization')
                            <a :href="'{{ url('/institution/'.$type.'/show-by-letter/') }}'+'/'+letter.letter" v-cloak>@{{ letter.letter }}</a>
                        @else
                            <a :href="'{{ url('/subject/show-by-letter/') }}'+'/'+letter.letter" v-cloak> @{{ letter.letter }}</a>
                        @endif
                    </strong>
                    <p v-for="element in letter.elements">
                        @if($type == 'teacher')
                        <a :href="'{{ url($type) }}'+'/'+'show/'+element.id" v-cloak>@{{ element.name }}</a>
                        @elseif($type == 'school' || $type == 'university' || $type == 'organization')
                        <a :href="'{{ url('/institution') }}'+'/show/'+element.id" v-cloak>@{{ element.name }}</a>
                        @else
                        <a :href="'{{ url('/subject') }}'+'/projects/'+element.id" v-cloak>@{{ element.name }}</a>
                        @endif
                    </p>
                   
                </div>


            </div>

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
                    elements:[]
                }
            },
            methods:{
                getElements(){
                    
                    axios.get("{{ url($type.'/fetch-all') }}").then(res => {

                        this.elements = res.data.elements

                    })

                }
            },
            mounted(){

                this.getElements()

            }

        })
    
    </script>
@endpush