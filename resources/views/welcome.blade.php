@extends("layouts.main")

@section("content")


    <section class="mt-5 mb-5" id="home">

        <div class="home">
            <div class="home-present">
                <h1>Best source for Project Based Learning!</h1>
                <!---------------->
                <div>
                    <form action="">
                        <i class="fa fa-search icon-sear "></i>
                        <input type="text" class="search-home " placeholder="PBL names, teachers, #Hashtags!">
                    </form>
                </div>
                <!---------------->
                <p>9.000+ projects and counting!</p>
                <div class="hashtag-home">
                    <a :href="'{{ url('/hashtag/') }}'+'/'+hashtag.id" v-for="hashtag in hashtags"> <span>#@{{ hashtag.name }}</span></a>
                </div>

            </div>
            <!---------------->
            <div class="row word">
                <div class="col-md-4">
                    <h3>Type</h3>
                    <div class="check-inst check-inst-home">
                        <label>
                            <input type="radio" class="option-input radio" value="school" v-model="categoryType" @click="setLevelByType()" />
                            School
                        </label>
                        <label>
                            <input type="radio" class="option-input radio" value="university" v-model="categoryType" @click="setLevelByType()" />
                            University
                        </label>
                    </div>
                </div>
                <div class="col-md-5">
                    <h3> Categories/Subjects</h3>
                    <div class="abc-home">
                        <div class="abc-content" v-for="(letter, key) in subjects">
                            <strong><a href="1">@{{ letter.letter }}</a></strong>
                            <p v-for="subject in letter.subjects"><a :href="'{{ url('subject/projects/') }}'+'/'+subject.id">@{{ subject.name }}</a></p>
                        </div>
                        

                    </div>

                </div>
                <div class="col-md-3">
                    <h3 v-if="categoryType == 'school'"> Age groups</h3>
                    <h3 v-else>Months</h3>
                    <div class="form-group">
                        <label for=""></label>
                        <select id="" class="form-control" v-model="level" @change="getSubjects()">
                            <option v-if="categoryType == 'school'" value="nursery">Nursery 0 - 3 </option>
                            <option v-if="categoryType == 'school'" value="early">Early childhood 4 - 6</option>
                            <option v-if="categoryType == 'school'" value="primary">Primary/Elementary 7 - 10</option>
                            <option v-if="categoryType == 'school'" value="middle">Middle School 11 - 13</option>
                            <option v-if="categoryType == 'school'" value="high">Highe School 14 - 18</option>
                            <option :value="i" v-for="i in 18" v-if="categoryType == 'university'">@{{ i }} Month</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>

        <div class="feactured-home">
            <h3 class="ml-3 mb-4 font-titulos text-center pt-4">Today’s featured wikiPBL!</h3>
            <div class="feactured-one">
                <p class="titulo">What ever title <br> <span>by Alicia Suarez</span> </p>
                <div class="row">
                    <div class="col-md-6">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum fugit dignissimos praesentium
                            fuga
                            eveniet labore neque quos officiis earum eaque unde minima corporis voluptatum voluptatem
                            molestiae,
                            voluptatibus consequatur tenetur impedit?Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Ipsum fugit dignissimos praesentium
                            fuga
                            eveniet labore neque quos officiis earum eaque unde minima corporis voluptatum voluptatem
                            molestiae,
                            voluptatibus consequatur tenetur impedit?</p>
                    </div>
                    <div class="col-md-3">
                        <p>Level & Age</p>
                        <p> Subject Name</p>
                        <p>Skills</p>
                        <p> Driving question</p>
                    </div>
                    <div class="col-md-3">
                       <div class="hashtag-home mt-0 mb-5 pb-5">
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                        <a href="#"> <span>#Hashtag</span></a>
                    </div>
                        <button class="btn btn-custom">View complete PBL</button>
                    </div>





                </div>
            </div>
        </div>
    </div>

    </section>


@endsection

@push("script")

    <script>
        const home = new Vue({
            el: '#home',
            data() {
                return {
                    categoryType:"school",
                    level:"nursery",
                    hashtags:[],
                    subjects:[]
                }
            },
            methods:{

                getSubjects(){

                    axios.post("{{ url('/home/get-subjects') }}", {"institution_type": this.categoryType, "level": this.level}).then(res => {

                        this.subjects = res.data.subjects

                    })

                },
                getHashtags(){

                    axios.get("{{ url('/home/get-hashtags') }}").then(res => {

                        this.hashtags = res.data.hashtags

                    })

                },
                setLevelByType(){

                    window.setTimeout(() => {

                        if(this.categoryType == "school"){

                            this.level = "nursery"
                            this.getSubjects()

                        }else{

                            this.level = "1"
                            this.getSubjects()

                        }

                    }, 200);

                }

            },
            mounted(){

                this.getSubjects()
                this.getHashtags()

            }
        })
    </script>

@endpush