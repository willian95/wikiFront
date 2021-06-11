@extends('layouts.main')

@section('content')
<div class="container" id="teacherProfile">

      <!---  <div class="loader-cover-custom" v-if="loading == true">
            <div class="loader-custom"></div>
        </div>-->
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="reportTeacher()">Report</button>
                    </div>
                </div>
            </div>
        </div>

    <div class="main-profile">
        <div class="main-profile_content pb-3">
            <h1 class="text-center mt-4" v-cloak>@{{ name }}'s Educator profile</h1>
            
            @if(\Auth::check())
                @if(\Auth::user()->id != $user->id)
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
        <div class="main-profile_dates mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <p v-cloak><strong> Name:</strong> @{{ name }}</p>
                        <p v-if="showMyEmail" v-cloak>
                            <strong>Email:</strong> @{{ email }}
                        </p>
                        <p v-cloak><strong>Institution:</strong> @{{ institutionName }}</p>
                        <p v-cloak><strong>Member since: </strong> @{{ memberSince }}</p>
                        <p v-cloak><strong>Country:</strong> @{{ countryName }}</p>
                        <p v-cloak><strong>City: </strong>@{{ stateName }}</p>
                        <p v-cloak><strong>CV Resume:</strong> @{{ cvResume }}</p>
                        <p v-cloak><strong>Portfolio:</strong>@{{ portfolio }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3> “Why do you educate?”</h3>
                    <p v-cloak>@{{ description }}</p>

                </div>
            </div>
        </div>

        <div class="main-wikis mt-5">
            <div class="text-center">
                <h3 v-cloak>@{{typeTitle}} - Dashboard</h3>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="info_wikis">
                        <div class="card" @click="fetchProjects()" style="cursor: pointer;">
                           <p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg> 
                                @{{ name }}'s wikiPBL
                            </p>
                            <span>{{ App\Project::where("user_id", $user->id)->where("status", "launched")->count() }}</span>

                        </div>
                        <div class="card" @click="fetchPublicProjects()" style="cursor: pointer;">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24"><path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="group" dc:description="group" dc:publisher="Iconscout" dc:date="2017-09-24" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Typicons</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
                                @{{ name }}'s Public wikiPBL
                            </p>
                            <span>{{ App\Project::where("user_id", $user->id)->where("is_private", 0)->where("status", "launched")->count() }}</span>
                        </div>
                        <div class="card" @click="fetchSharedProjects()" style="cursor: pointer;">
                            <p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g data-name="Layer 2"><path d="M19,27H8a1,1,0,0,1-1-1V25a9,9,0,0,1,15.36-6.36,1,1,0,0,0,1.41-1.41A11,11,0,0,0,20,14.75a7,7,0,1,0-8,0A11,11,0,0,0,5,25v1a3,3,0,0,0,3,3H19a1,1,0,0,0,0-2ZM11,9a5,5,0,1,1,5,5A5,5,0,0,1,11,9Z"/><path d="M28.15,21.2A3.24,3.24,0,0,0,25.88,20a3.17,3.17,0,0,0-1.88.47A3.13,3.13,0,0,0,22.12,20a3.24,3.24,0,0,0-2.27,1.19A4,4,0,0,0,20,26.28l2.81,3.17a1.59,1.59,0,0,0,2.41,0L28,26.28A4,4,0,0,0,28.15,21.2ZM26.52,25,24,27.79,21.48,25a2,2,0,0,1-.1-2.48,1.26,1.26,0,0,1,.87-.48h.08a1.2,1.2,0,0,1,.8.33,1.29,1.29,0,0,0,1.73,0,1.17,1.17,0,0,1,.88-.32,1.26,1.26,0,0,1,.87.48A2,2,0,0,1,26.52,25Z"/></g></svg>
                                Following
                            </p>
                            <span>{{ App\ProjectShare::where("user_id", $user->id)->whereHas("project", function($q){
                                $q->where("status", "launched");
                            })->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 card-proyectos">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td style="cursor:pointer;" @click="orderByField('title')">Title <span v-if="orderByColumn == 'title' && orderOrientation == 'desc'"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span v-if="orderByColumn == 'title' && orderOrientation == 'asc'"><i class="fa fa-angle-up" aria-hidden="true"></i></span></td>
                                    <td style="cursor:pointer;" @click="orderByField('incubator')">Incubator <span v-if="orderByColumn == 'incubator' && orderOrientation == 'desc'"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span v-if="orderByColumn == 'incubator' && orderOrientation == 'asc'"><i class="fa fa-angle-up" aria-hidden="true"></i></span></td>
                                    <td style="cursor:pointer;" @click="orderByField('likes')">Likes <span v-if="orderByColumn == 'likes' && orderOrientation == 'desc'"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span v-if="orderByColumn == 'likes' && orderOrientation == 'asc'"><i class="fa fa-angle-up" aria-hidden="true"></i></span></td>
                                    <!--<td>Project Type</td>-->
                                    <td class="w-td_last" style="cursor:pointer;" @click="orderByField('update')">Last updated <span v-if="orderByColumn == 'update' && orderOrientation == 'desc'"><i class="fa fa-angle-down" aria-hidden="true"></i></span><span v-if="orderByColumn == 'update' && orderOrientation == 'asc'"><i class="fa fa-angle-up" aria-hidden="true"></i></span></td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody v-if="type != 'following'">
                                <tr v-for="(project,index) in projects">
                                    <td>

                                        <a :href="'{{ url('/project/show/') }}'+'/'+project.project.id">
                                            <p v-if="project.title" v-cloak>@{{ project.title }}, @{{ project.project.user.institution ? project.project.user.institution.name : project.project.user.pending_institution_name }}</p>
                                        </a>

                                    </td>
                                    <td>

                                        <span class="menu-icon_hover" v-if="project.project.is_incubator">
                                            <span class="tooltip-nav-info_last">Incubator</span>
                                            <img alt='icon' class="login_icon mr-3 " src="http://imgfz.com/i/DmsV3CK.png">
                                        </span>

                                    </td>
                                    <td>

                                        <span class="menu-icon_hover" v-cloak>
                                        <span class="tooltip-nav-info_last"> @{{ project.project.likes.length }}</span>
                                            <svg class="login_icon mr-3  hover-svg fill-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z" />
                                            </svg>
                                        </span>

                                    </td>
                                    <!--<td>

                                        <span v-if="project.project.is_private == 0">
                                            <svg class="login_icon  hover-svg mr-3 " xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                                            </svg>
                                        </span>
                                        <span v-if="project.project.is_private == 1">
                                            <svg class="login_icon " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <path d="M28.707,15.293l-2.412-2.412a14.574,14.574,0,0,0-20.59,0L3.293,15.293a1,1,0,0,0,0,1.414l2.412,2.412a14.575,14.575,0,0,0,20.59,0l2.412-2.412A1,1,0,0,0,28.707,15.293Zm-3.826,2.412a12.574,12.574,0,0,1-17.762,0L5.414,16l1.705-1.705a12.574,12.574,0,0,1,17.762,0L26.586,16Z" />
                                                <path d="M16,11a5,5,0,1,0,5,5A5.006,5.006,0,0,0,16,11Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,16,19Z" />
                                            </svg>
                                        </span>
                                    
                                    </td>-->
                                    <td>

                                        <span class="line_" v-cloak>@{{ dateFormatter(project.project.updated_at) }}</span>

                                    </td>
                                    <td>

                                        <a v-if="project.project.status == 'launched'" :href="'{{ url('project/original/show/') }}'+'/'+project.project.id" class="btn btn-info line_ mt-0 mb-0">Original/Published</a>
                                    
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-if="type == 'following'">
                                <tr v-for="(project,index) in projects">
                                    <td>
                                        
                                        <a :href="'{{ url('/project/show/') }}'+'/'+project.project.project_id">
                                            <p v-if="project.title" v-cloak>@{{ project.title }}, @{{ project.project.project.user.institution ? project.project.project.user.institution.name : project.project.project.user.pending_institution_name }}</p>
                                        </a>

                                    </td>
                                    <td>

                                        <span class="menu-icon_hover" v-if="project.project.project.is_incubator">
                                            <span class="tooltip-nav-info_last">Incubator</span>
                                            <img alt='icon' class="login_icon mr-3 " src="http://imgfz.com/i/DmsV3CK.png">
                                        </span>

                                    </td>
                                    <td>

                                        <span v-cloak>
                                            @{{ project.project.project.likes.length }}
                                            <svg class="login_icon mr-3  hover-svg fill-blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M21.3,10.08A3,3,0,0,0,19,9H14.44L15,7.57A4.13,4.13,0,0,0,11.11,2a1,1,0,0,0-.91.59L7.35,9H5a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17.73a3,3,0,0,0,2.95-2.46l1.27-7A3,3,0,0,0,21.3,10.08ZM7,20H5a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H7Zm13-7.82-1.27,7a1,1,0,0,1-1,.82H9V10.21l2.72-6.12A2.11,2.11,0,0,1,13.1,6.87L12.57,8.3A2,2,0,0,0,14.44,11H19a1,1,0,0,1,.77.36A1,1,0,0,1,20,12.18Z" />
                                            </svg>
                                        </span>

                                    </td>
                                    <td>

                                        <span v-if="project.project.project.is_private == 0">
                                            <svg class="login_icon  hover-svg mr-3 " xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M12 14c1.381 0 2.631-.56 3.536-1.465C16.44 11.631 17 10.381 17 9s-.56-2.631-1.464-3.535C14.631 4.56 13.381 4 12 4s-2.631.56-3.536 1.465C7.56 6.369 7 7.619 7 9s.56 2.631 1.464 3.535A4.985 4.985 0 0 0 12 14zm8 1a2.495 2.495 0 0 0 2.5-2.5c0-.69-.279-1.315-.732-1.768A2.492 2.492 0 0 0 20 10a2.495 2.495 0 0 0-2.5 2.5A2.496 2.496 0 0 0 20 15zm0 .59c-1.331 0-2.332.406-2.917.968C15.968 15.641 14.205 15 12 15c-2.266 0-3.995.648-5.092 1.564C6.312 15.999 5.3 15.59 4 15.59c-2.188 0-3.5 1.09-3.5 2.182 0 .545 1.312 1.092 3.5 1.092.604 0 1.146-.051 1.623-.133l-.04.27c0 1 2.406 2 6.417 2 3.762 0 6.417-1 6.417-2l-.02-.255c.463.073.995.118 1.603.118 2.051 0 3.5-.547 3.5-1.092 0-1.092-1.373-2.182-3.5-2.182zM4 15c.69 0 1.315-.279 1.768-.732A2.492 2.492 0 0 0 6.5 12.5 2.495 2.495 0 0 0 4 10a2.496 2.496 0 0 0-2.5 2.5A2.495 2.495 0 0 0 4 15z" />
                                            </svg>
                                        </span>
                                        <span v-if="project.project.project.is_private == 1">
                                            <svg class="login_icon " xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                <path d="M28.707,15.293l-2.412-2.412a14.574,14.574,0,0,0-20.59,0L3.293,15.293a1,1,0,0,0,0,1.414l2.412,2.412a14.575,14.575,0,0,0,20.59,0l2.412-2.412A1,1,0,0,0,28.707,15.293Zm-3.826,2.412a12.574,12.574,0,0,1-17.762,0L5.414,16l1.705-1.705a12.574,12.574,0,0,1,17.762,0L26.586,16Z" />
                                                <path d="M16,11a5,5,0,1,0,5,5A5.006,5.006,0,0,0,16,11Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,16,19Z" />
                                            </svg>
                                        </span>
                                    
                                    </td>
                                    <td class="">

                                        <span class="line_ modif-last" v-cloak>@{{ dateFormatter(project.project.project.updated_at) }}</span>

                                    </td>
                                    <td>

                                        <a v-if="project.project.project.status == 'launched'" :href="'{{ url('project/original/show/') }}'+'/'+project.project.project.id" class="btn btn-info line_ mt-0 mb-0">Original/Published</a>
                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination" v-cloak>
                                <li class="page-item" v-for="index in pages">
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchProjects(index)" v-if="type == 'my-projects'">@{{ index }}</a>
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchPulbicProjects(index)" v-if="type == 'following'">@{{ index }}</a>
                                    <a class="page-link" style="cursor: pointer" :key="index" @click="fetchSharedProjects(index)" v-if="type == 'public'">@{{ index }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                
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
                return{

                    institutions:[],
                    teacherId:"{{ $user->id }}",
                    institution:"{{ $user->institution_id }}",
                    institutionName:"{{ $user->institution ? $user->institution->name : $user->pending_institution_name }}",
                    name:"{{ $user->name }}",
                    email:"{{ $user->email }}",
                    memberSince:"{{ $user->created_at->format('m/d/Y') }}",
                    description:"{{ strip_tags($user->why_do_you_educate) }}",
                    countryName:"{{ $user->country ? strip_tags($user->country->name) : '' }}",
                    stateName:"{{ $user->state ? strip_tags($user->state->name): '' }}",
                    cvResume:"{{ strip_tags($user->cv_resume) }}",
                    portfolio:"{{ strip_tags($user->portfolio) }}",
                    showMyEmail:JSON.parse('{!! $user->show_my_email !!}'),
                    loading:false,
                    report:"{{ \Auth::check() ? App\TeacherReport::where('user_id', \Auth::user()->id)->where('teacher_id', $user->id)->count() : 0 }}",
                    errors:[],
                    projects:[],
                    page:1,
                    pages:0,
                    typeTitle:"My projects",
                    type:"my-projects",
                    orderByColumn:"update",
                    orderOrientation:"desc"

                }
            },
            methods:{

                showReportConfirmation(){
       
                    if(this.report == 0){
                        $("#reportConfirmation").modal("show")
                    }else{
                        this.reportTeacher()
                    }

                },
                reportTeacher(){


                    this.changeReportIcon()

                    axios.post("{{ url('teacher/report') }}", {"teacher_id": this.teacherId}).then(res => {

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
                fetchProjects(page  = 1 ){

                    this.typeTitle = this.name+"'s projects",
                    this.type = "my-projects",
                    this.projects = []
                    this.page = page

                    let orderBy = "?field="+this.orderByColumn+"&orientation="+this.orderOrientation

                    axios.get("{{ url('/project/public/my-projects') }}"+"/"+page+"/"+this.teacherId+orderBy).then(res => {

                        this.projects = res.data.projects
                        this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                    })

                },
                fetchPublicProjects(page  =1 ){

                    this.typeTitle = this.name+"'s public projects",
                    this.type = "public",
                    this.projects = []
                    this.page = page

                    let orderBy = "?field="+this.orderByColumn+"&orientation="+this.orderOrientation

                    axios.get("{{ url('/project/public/my-public-projects') }}"+"/"+page+"/"+this.teacherId+orderBy).then(res => {

                        this.projects = res.data.projects
                        this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                    })

                },
                fetchSharedProjects(page = 1){

                    this.typeTitle = "Following projects",
                    this.type = "following",
                    this.projects = []
                    this.page = page

                    let orderBy = "?field="+this.orderByColumn+"&orientation="+this.orderOrientation

                    axios.get("{{ url('/project/public/my-follow-projects') }}"+"/"+page+"/"+this.teacherId+orderBy).then(res => {

                        this.projects = res.data.projects
                        this.pages = Math.ceil(res.data.projectsCount / res.data.dataAmount)

                    })

                },
                orderByField(field){
 
                    this.orderByColumn = field
                    this.orderOrientation == "desc" ? this.orderOrientation = "asc" : this.orderOrientation = "desc" 

                    if(this.type == "my-projects"){
                        this.fetchProjects(this.page)
                    }

                    else if(this.type == "public"){
                        this.fetchPublicProjects(this.page)
                    }

                    else if(this.type == "following"){
                        this.fetchSharedProjects(this.page)
                    }
                        

                },
                dateFormatter(date) {

                    let year = date.substring(0, 4)
                    let month = date.substring(5, 7)
                    let day = date.substring(8, 10)

                    if(day == "01" || day == "21" || day == "31"){
                        day = day+"st"
                    }

                    else if(day == "02" || day == "22"){
                        day = day+"nd"
                    }

                    else if(day == "03" || day == "23"){
                        day = day+"rd"
                    }

                    else{
                        day = day+"th"
                    }

                    if(month == "01"){
                        month = "January"
                    }

                    else if(month == "02"){
                        month = "February"
                    }

                    else if(month == "03"){
                        month = "March"
                    }

                    else if(month == "04"){
                        month = "April"
                    }

                    else if(month == "05"){
                        month = "May"
                    }

                    else if(month == "06"){
                        month = "June"
                    }

                    else if(month == "07"){
                        month = "July"
                    }

                    else if(month == "08"){
                        month = "August"
                    }

                    else if(month == "09"){
                        month = "September"
                    }

                    else if(month == "10"){
                        month = "October"
                    }

                    else if(month == "11"){
                        month = "November"
                    }

                    else if(month == "12"){
                        month = "December"
                    }

                    return day + " " + month + " " + year
                    },
                
            },
            mounted(){

                if(this.report > 0){
                    $("#reportIcon").css("fill", "#4674b8")
                }

                this.fetchProjects()

            }
        })
    </script>

@endpush