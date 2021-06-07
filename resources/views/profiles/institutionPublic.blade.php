@extends("layouts.main")

@section("content")

    <div class="container" id="institutionProfile">

        <!---<div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>--->

        <div class="elipse loader-cover-custom" v-if="loading == true">
        <img src="{{ url('assets/img/logo.png') }}" alt="">
    </div>
        <div class="modal fade" id="reportConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center">Warning!</h3>

                        <p class="mt-2 text-center">
                        Thank you for letting us know this
                        wikiPBL Profile is having problems, remember
                        to check always our FAQ’S for more
                        information about reporting issues
                        and accounts.
                        </p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="reportInstitution()">Report</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-profile mt-5">
            <div class="main-profile_content">
                <!--<h1 class="text-center mt-4">Institution profile</h1><a href="#" @click="copyLink()">Share this profile</a>-->
                <input type="text" style="display: none" value="{{ url()->current() }}" id="myInput">
                @if(\Auth::check())
                    @if(\Auth::user()->id != $institution->id)
                    <a class="nav-item" style="cursor:pointer;" @click="showReportConfirmation()">
                        <svg id="reportIcon" class="login_icon  hover-svg" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 16 16"><path  d="M2.00146 4.00134C2.00146 2.89677 2.8969 2.00134 4.00146 2.00134H12.0001C13.1047 2.00134 14.0001 2.89677 14.0001 4.00134V10.1312L13.0001 8.43571V4.00134C13.0001 3.44906 12.5524 3.00134 12.0001 3.00134H4.00146C3.44918 3.00134 3.00146 3.44906 3.00146 4.00134V12C3.00146 12.5523 3.44918 13 4.00146 13H6.30766L6.26747 13.0681C6.10029 13.3516 6.0083 13.672 6.00054 14H4.00146C2.89689 14 2.00146 13.1046 2.00146 12V4.00134Z"/><path d="M7.19234 11.5L7.78213 10.5H7.00317C6.72703 10.5 6.50317 10.7239 6.50317 11 6.50317 11.2761 6.72703 11.5 7.00317 11.5H7.19234zM8.96155 8.50029L9.26972 7.9778C9.37807 7.79407 9.51219 7.63441 9.66466 7.5004L7.00325 7.5C6.72711 7.49996 6.50322 7.72378 6.50317 7.99993 6.50313 8.27607 6.72696 8.49996 7.0031 8.5L8.96155 8.50029zM5.5 5C5.5 5.41421 5.16421 5.75 4.75 5.75 4.33579 5.75 4 5.41421 4 5 4 4.58579 4.33579 4.25 4.75 4.25 5.16421 4.25 5.5 4.58579 5.5 5zM4.75 8.75189C5.16421 8.75189 5.5 8.41611 5.5 8.00189 5.5 7.58768 5.16421 7.25189 4.75 7.25189 4.33579 7.25189 4 7.58768 4 8.00189 4 8.41611 4.33579 8.75189 4.75 8.75189zM5.5 11C5.5 11.4142 5.16421 11.75 4.75 11.75 4.33579 11.75 4 11.4142 4 11 4 10.5858 4.33579 10.25 4.75 10.25 5.16421 10.25 5.5 10.5858 5.5 11zM7.00317 4.5C6.72703 4.5 6.50317 4.72386 6.50317 5 6.50317 5.27614 6.72703 5.5 7.00317 5.5H11.4773C11.7535 5.5 11.9773 5.27614 11.9773 5 11.9773 4.72386 11.7535 4.5 11.4773 4.5H7.00317zM10.7349 8.03453C10.9857 7.96839 11.2604 7.99559 11.5012 8.1296 11.6558 8.21564 11.7822 8.33911 11.8687 8.48581L14.8709 13.5761C15.005 13.8034 15.031 14.059 14.9659 14.2919 14.9007 14.5249 14.7436 14.737 14.5035 14.8706 14.3517 14.955 14.1788 15 14.0021 15H7.99763C7.7173 15 7.467 14.8901 7.28702 14.7152 7.1073 14.5407 7 14.3042 7 14.0453 7 13.8816 7.04402 13.7199 7.12882 13.5761L10.1311 8.48581C10.2656 8.25769 10.4843 8.10064 10.7349 8.03453zM11.5 9.5022C11.5 9.22606 11.2761 9.0022 11 9.0022 10.7239 9.0022 10.5 9.22606 10.5 9.5022V11.498C10.5 11.7741 10.7239 11.998 11 11.998 11.2761 11.998 11.5 11.7741 11.5 11.498V9.5022zM11 14.5C11.4142 14.5 11.75 14.1642 11.75 13.75 11.75 13.3358 11.4142 13 11 13 10.5858 13 10.25 13.3358 10.25 13.75 10.25 14.1642 10.5858 14.5 11 14.5z"/></svg>
                        <span class="tooltip-nav">
                        <span v-if="report == '0'">Report</span>
                            <span v-else>Unreport</span>
                        </span>    
                    
                    </a>
                    @endif
                @endif
            </div>

            <div class="row main-dates">
                <div class="col-md-4">
                    <p>Registered Educators:</p>
                    <span v-cloak>@{{ registeredEducatorsCount }}</span>

                </div>
                <div class="col-md-4">
                    <p>wikiPBL Pages (public):</p>
                    <span v-cloak>@{{ publicPBLCounts }}</span>
                </div>
                <div class="col-md-4">
                    <p> Private wikiPBL Pages:</p>
                    <span v-cloak>@{{ privatePBLCounts }}</span>
                </div>
            </div>

            <div class="main-profile_dates">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p v-cloak><strong> Name:</strong>@{{ institutionName }} </p>
                            <p v-cloak><strong>Member since:</strong> @{{ memberSince }}</p>
                            <p v-cloak><strong> Country:</strong> @{{ country }}</p>
                            <p v-cloak><strong>City:</strong> @{{ state }}</p>
                            <p v-cloak><strong>Lowest Age:</strong>@{{ lowestAge }}</p>
                            <p v-cloak><strong>Highest Age:</strong>@{{ highestAge }}</p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> Type:</strong> @{{ genderType }}</p>
                            <p v-cloak><strong>Type:</strong>@{{ privateOrPublicInstitution }}</p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong>PBL Network:</strong> @{{ whichNetwork }}</p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> # students enrolled:</strong>@{{ studentsEnrolled }}</p>
                            <p v-cloak v-if="type == 'school' || type == 'university'"><strong> # faculty members:</strong>@{{ facultyMembers }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div v-for="user in users">
                            <h3> Created by</h3>
                            <p v-cloak><strong> Name:</strong>@{{ user.name }} @{{ user.lastname }}</p>
                            <p v-cloak><strong> Email:</strong>@{{ user.email }}</p>

                        </div>
                        

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push("script")

    <script>

        const institutionProfile = new Vue({
            el: '#institutionProfile',
            data() {
                return{

                    registeredEducatorsCount:0,
                    publicPBLCounts:0,
                    privatePBLCounts:0,
                    loading:false,
                    institutionId:"{{ $institution->id }}",
                    type:"{{ $institution->type }}",
                    institutionName:"{{ $institution->name }}",
                    memberSince:"{{ $institution->created_at->format('m/d/Y') }}",
                    country:"{{ $institution->country ? strip_tags($institution->country->name) : '' }}",
                    state:"{{ $institution->state ? strip_tags($institution->state->name) : '' }}",
                    lowestAge:"{{ $institution->lowest_age }}",
                    highestAge:"{{ $institution->highest_age }}",
                    genderType:"{{ $institution->gender_institution_type }}",
                    privateOrPublicInstitution:"{{ $institution->institution_public_or_private }}",
                    studentsEnrolled:"{{ $institution->students_enrolled }}",
                    facultyMembers:"{{ $institution->faculty_members }}",
                    whichNetwork:"{{ strip_tags($institution->which_network) }}",
                    report:"{{ \Auth::check() ? App\InstitutionReport::where('user_id', \Auth::user()->id)->where('institution_id', $institution->id)->count() : 0 }}",
                    modalField:"",
                    userName:"",
                    userLastname:"",
                    userPassword:"",
                    userPasswordConfirmation:"",
                    userPhone:"",
                    userEmail:"",
                    users:[],
                    errors:[]

                }
            },
            methods:{

                getUsers(){

                    axios.get("{{ url('/institution/public/get-users/') }}"+"/"+this.institutionId).then(res => {

                        this.users = res.data.users

                    })

                },
                getTeachers(){

                    axios.get("{{ url('/institution/public/get-teachers') }}"+"/"+this.institutionId).then(res => {
                        this.registeredEducatorsCount = res.data.teachers
                    })

                },
                copyLink(){
                    const str = document.getElementById('myInput').value;
                    const el = document.createElement('textarea');
                    el.value = str;
                    el.setAttribute('readonly', '');
                    el.style.position = 'absolute';
                    el.style.left = '-9999px';
                    document.body.appendChild(el);
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);

                    swal({
                    text: "Link copied",
                    icon: "success"
                    })
                },
                showReportConfirmation(){
       
                    if(this.report == 0){
                        $("#reportConfirmation").modal("show")
                    }else{
                        this.reportInstitution()
                    }

                },
                reportInstitution(){


                    this.changeReportIcon()

                    axios.post("{{ url('institution/report') }}", {"institution_id": this.institutionId}).then(res => {

                        if(res.data.success){
                            swal({
                                text: res.data.msg,
                                icon: "success"
                            })

                        }else{
                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })
                        }

                    })

                },
                changeReportIcon(){
                    if(this.report == "1"){
                        this.report = "0"
                        $("#reportIcon").css("fill", "#000")
                    }else{
                        this.report = "1"
                        $("#reportIcon").css("fill", "#4674b8")
                    }
                },
                

            },
            mounted(){

                this.getUsers()
                this.getTeachers()

                if(this.report > 0){
                    $("#reportIcon").css("fill", "#4674b8")
                }

            }

        })

    </script>

@endpush
    
