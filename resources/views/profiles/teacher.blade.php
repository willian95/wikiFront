@extends('layouts.main')

@section('content')
<div class="container" id="teacherProfile">

    <div class="loader-cover-custom" v-if="loading == true">
        <div class="loader-custom"></div>
    </div>

    @include("profiles.modals.teacherProfileModal")

    <div class="main-profile">
        <div class="main-profile_content">
            <h1 class="text-center">Educator profile</h1>
            <p>Stats</p>
        </div>
        <div class="main-profile_dates mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p><strong> Name:</strong> @{{ name }}</p>
                        <p>
                            <strong>Email:</strong> @{{ email }}
                            <!-- Rounded switch -->
                            <label class="switch">
                                <input type="checkbox" v-model="showMyEmail">
                                <span class="slider round"></span>
                            </label>
                        </p>
                        <p><strong>Institution:</strong> @{{ institutionName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('institution')"></i></p>
                        <p><strong>Member since: </strong> @{{ memberSince }}</p>
                        <p><strong>Country:</strong> @{{ countryName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('country')"></i></p>
                        <p><strong>City: </strong>@{{ stateName }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('state')"></i></p>
                        <p><strong>CV/Resume:</strong> @{{ cvResume }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('cvResume')"></i></p>
                        <p><strong>Portfolio:</strong>@{{ portfolio }} <i class="fa fa-edit" data-toggle="modal" data-target="#teacherProfileModal" @click="setModalField('portfolio')"></i></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3> “Why do you educate?”</h3>
                    <textarea class="form-control" v-model="description"></textarea>

                    <div class="text-right mt-5">
                        <button class="btn btn-custom" @click="update()">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-wikis mt-5">
            <div class="text-center mb-5">
                <h3>@{{typeTitle}} - Dashboard</h3>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="info_wikis">
                        <div class="card" @click="fetchProjects()">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="none" d="M0 0h24v24H0V0z" />
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" />
                                </svg>
                                My wikiPBL
                            </p>
                            <span>{{ App\Project::where("user_id", \Auth::user()->id)->count() }}</span>

                        </div>
                        <div class="card" @click="fetchPublicProjects()">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                                    <metadata>
                                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                            <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="group" dc:description="group" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en">
                                                <dc:creator>
                                                    <rdf:Bag>
                                                        <rdf:li>Typicons</rdf:li>
                                                    </rdf:Bag>
                                                </dc:creator>
                                            </rdf:Description>
                                        </rdf:RDF>
                                    </metadata>
                                </svg>
                                My Public wikiPB
                            </p>
                            <span>{{ App\Project::where("user_id", \Auth::user()->id)->where("is_private", 0)->count() }}</span>
                        </div>
                        <div class="card" @click="fetchSharedProjects()">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <g data-name="Layer 2">
                                        <path d="M19,27H8a1,1,0,0,1-1-1V25a9,9,0,0,1,15.36-6.36,1,1,0,0,0,1.41-1.41A11,11,0,0,0,20,14.75a7,7,0,1,0-8,0A11,11,0,0,0,5,25v1a3,3,0,0,0,3,3H19a1,1,0,0,0,0-2ZM11,9a5,5,0,1,1,5,5A5,5,0,0,1,11,9Z" />
                                        <path d="M28.15,21.2A3.24,3.24,0,0,0,25.88,20a3.17,3.17,0,0,0-1.88.47A3.13,3.13,0,0,0,22.12,20a3.24,3.24,0,0,0-2.27,1.19A4,4,0,0,0,20,26.28l2.81,3.17a1.59,1.59,0,0,0,2.41,0L28,26.28A4,4,0,0,0,28.15,21.2ZM26.52,25,24,27.79,21.48,25a2,2,0,0,1-.1-2.48,1.26,1.26,0,0,1,.87-.48h.08a1.2,1.2,0,0,1,.8.33,1.29,1.29,0,0,0,1.73,0,1.17,1.17,0,0,1,.88-.32,1.26,1.26,0,0,1,.87.48A2,2,0,0,1,26.52,25Z" />
                                    </g>
                                </svg>
                                Following
                            </p>
                            <span>{{ App\ProjectShare::where("user_id", \Auth::user()->id)->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 card-proyectos">

                    <a class="card" v-for="(project,index) in projects" :href="'{{ url('/project/edit/') }}'+'/'+project.id" v-if="type == 'my-projects' || type == 'public'">
                        <p v-if="project.titles[0]">@{{ project.titles[0].title }}, {{ \Auth::user()->institution ? \Auth::user()->institution->name : \Auth::user()->pendingInstitution->name }}</p>
                        <!---------------------iconos------------------->
                        <div>
                             <!---------------------icono1------------------->
                            <span>
                                50
                                <svg class="login_icon mr-3  hover-svg fill-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z" />
                                </svg>
                            </span>
                               <!---------------------icono2------------------->
                            <span>
                                <svg class="login_icon  hover-svg mr-3 " xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                                </svg>
                            </span>
                               <!---------------------icono3------------------->
                               <span class="line_">20/12/20</span>
                        </div>
                    </a>


                    <a class="card" v-for="(project,index) in projects" :href="'{{ url('/project/edit/') }}'+'/'+project.project.id" v-if="type == 'following'">
                        <span v-if="project.project">
                            <p v-if="project.project.titles[0]">@{{ project.project.titles[0].title }}, {{ \Auth::user()->institution ? \Auth::user()->institution->name : \Auth::user()->pendingInstitution->name }}</p>
                        </span>
                    </a>

                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination">
                                <li class="page-item" v-for="index in pages">
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchProjects(index)" v-if="type == 'my-projects'">@{{ index }}</a>
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchPulbicProjects(index)" v-if="type == 'following'">@{{ index }}</a>
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchSharedProjects(index)" v-if="type == 'public'">@{{ index }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{--<div :id="'accordion'+index" class="wiki-accordion" v-for="(project,index) in projects">
                <div class="card">
                    <div class="" :id="'wiki'+index">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#'wiki'+index"
                                aria-expanded="true" aria-controls="collapseOne">
                                <p>@{{ project.titles[0].title }}</p>
                    </button>
                    </h5>
                </div>

                <div :id="'wiki'+index" class="collapse" aria-labelledby="headingOne" :data-parent="'#accordion'+index">
                    <div class="card-body">
                        <button class="btn btn-custom">ORIGINAL DOCUMENT</button>
                    </div>
                </div>
            </div>

        </div>--}}



    </div>
</div>
</div>
</div>

</div>
@endsection

@push("script")

<script>
    const teacherProfile = new Vue({
        el: '#teacherProfile',
        data() {
            return {

                institutions: [],
                typeTitle: "My projects",
                type: "my-projects",
                institution: "{{ \Auth::user()->institution_id }}",
                institutionName: "{{ \Auth::user()->institution ? \Auth::user()->institution->name : \Auth::user()->pending_institution_name }}",
                name: "{{ \Auth::user()->name }}",
                email: "{{ \Auth::user()->email }}",
                memberSince: "{{ \Auth::user()->created_at->format('m/d/Y') }}",
                description: "{{ strip_tags(\Auth::user()->why_do_you_educate) }}",
                modalField: "",
                countries: [],
                countryName: "{{ \Auth::user()->country ? strip_tags(\Auth::user()->country->name) : '' }}",
                country: "{{ \Auth::user()->country ? strip_tags(\Auth::user()->country->id) : '' }}",
                states: [],
                state: "{{ \Auth::user()->state ? strip_tags(\Auth::user()->state->id) : '' }}",
                stateName: "{{ \Auth::user()->state ? strip_tags(\Auth::user()->state->name) : '' }}",
                cvResume: "{{ strip_tags(\Auth::user()->cv_resume) }}",
                portfolio: "{{ strip_tags(\Auth::user()->portfolio) }}",
                showMyEmail: JSON.parse('{!! \Auth::user()->show_my_email !!}'),
                loading: false,
                page: 1,
                pages: 0,
                projects: [],
                errors: []

            }
        },
        methods: {

            fetchAllInstitutions() {

                axios.get("{{ url('/institutions/fetchAll') }}").then(res => {

                    this.institutions = res.data.institutions;

                })

            },
            setModalField(field) {
                this.modalField = field

                if (field == "state") {
                    this.fetchStates()
                }

            },
            fetchCountries() {

                axios.get("{{ url('/countries/fetch') }}").then(res => {

                    this.countries = res.data.countries

                })

            },
            fetchStates() {

                axios.get("{{ url('/states/fetch/') }}" + "/" + this.country).then(res => {

                    this.states = res.data.states

                })

            },
            onChangeCountry() {

                this.state = ""
                this.stateName = ""

                this.countries.forEach((data) => {

                    if (data.id == this.country) {
                        this.countryName = data.name
                    }
                })

            },
            onChangeState() {

                this.states.forEach((data) => {

                    if (data.id == this.state) {

                        this.stateName = data.name
                    }
                })

            },
            onChangeInstitution() {
                this.institutions.forEach((data) => {

                    if (data.id == this.institution) {

                        this.institutionName = data.name
                    }
                })
            },
            update() {

                this.loading = true

                let formData = new FormData()
                formData.append("country", this.country)
                formData.append("state", this.state)
                formData.append("cv_resume", this.cvResume)
                formData.append("portfolio", this.portfolio)
                formData.append("institution", this.institution)
                formData.append("why_do_you_educate", this.description)
                formData.append("show_my_email", this.showMyEmail)

                axios.post("{{ url('/teacher/profile/update') }}", formData).then(res => {

                    this.loading = false

                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                    } else {

                    }

                }).catch(err => {

                    this.loading = false
                    this.errors = err.response.data.errors

                })

            },
            fetchProjects(page = 1) {

                this.typeTitle = "My projects",
                    this.type = "my-projects",

                    this.page = page

                axios.get("{{ url('/project/my-projects') }}" + "/" + page).then(res => {

                    this.projects = res.data.projects
                    this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                })

            },
            fetchPublicProjects(page = 1) {

                this.typeTitle = "My public projects",
                    this.type = "public",

                    this.page = page

                axios.get("{{ url('/project/my-public-projects') }}" + "/" + page).then(res => {

                    this.projects = res.data.projects
                    this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                })

            },
            fetchSharedProjects(page = 1) {

                this.typeTitle = "Following projects",
                    this.type = "following",

                    this.page = page

                axios.get("{{ url('/project/my-follow-projects') }}" + "/" + page).then(res => {

                    this.projects = res.data.projects
                    this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                })

            }
        },
        mounted() {

            this.fetchCountries()
            this.fetchAllInstitutions()
            this.fetchProjects()

        }
    })
</script>

@endpush