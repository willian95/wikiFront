@extends("layouts.project")

@section("content")

<div id="own-template">
    @include("partials.projectShowHeader")
    <div class="container p5">
        <div class="container  main-template mt-5">

            <div class="modal fade" id="calendarDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Activity description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @{{ activityDescription }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="reportConfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
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
                                WikiPBL is having problems, remember
                                to check always our FAQ’S for more
                                information about reporting issues
                                and accounts.
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" @click="reportProject()">Report</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="menu-template">
                        <!---  <p>Edit mode </p>--->
                        <div class="menu-template_option" style="overflow-y: auto; height: 360px;">
                            <ul>
                                <p>Main info</p>
                                <li> <a href="#title-p">@{{ title }}</a></li>
                                <li> <a href="#driving">@{{ drivingQuestionTitle }}</a></li>
                                <li> <a href="#subjecttitle">@{{ subjectTitle }}</a></li>
                                <li> <a href="#time">@{{ timeFrameTitle }}</a></li>
                                <li><a href="#projectsumary">Project Summary</a></li>
                                <li> <a href="#publictitle">@{{ publicProductTitle }}</a> </li>
                                <li> <a href="#leveltitle">@{{ levelTitle }}</a></li>
                                <li> <a href="#hashtags-menu">#hashtags</a></li>
                                <li v-if="showTools"> <a href="#toolstitle">@{{ toolsTitle }}</a></li>
                                <li v-if="showLearningGoals"><a href="#leargoals">@{{ learningGoalsTitle }}</a></li>
                                <li v-if="showResources"><a href="#resoustitle">@{{ resourcesTitle }}</a></li>
                                <li v-if="showProjectMilestone"><a href="projectmiles">@{{ projectMilestoneTitle }}</a></li>
                                <li v-if="showExpert"><a href="#experttitle">@{{ expertTitle }}</a></li>
                                <li v-if="showFieldWork"> <a href="#fielwork">@{{ fieldWorkTitle }}</a></li>
                                <li v-if="showGlobalConnections"> <a href="#globalconnections">@{{ globalConnectionsTitle }}</a> </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!----------------info----------------->
                <div class="col-md-9 info-template">

                    <div class="container-fluid">
                        @if(\Auth::check())
                        <div class="row">

                            <div class="col-md-4 flex-icons">
                                @foreach($assestmentPoints as $point)
                                <p>
                                    <button class="btn btn-votos" @click="upvoteAssestment({{$point->assestmentPointType->id}}, '{!! htmlspecialchars_decode($point->assestmentPointType->name) !!}')">
                                        <i class="fa {{ $point->assestmentPointType->icon }}"></i>
                                        {{ $point->assestmentPointType->name }}
                                    </button>
                                </p>
                                @endforeach
                            </div>
                            <div class="col-md-8">

                                <canvas id="myChart"></canvas>

                            </div>

                        </div>
                        @endif
                    </div>

                    <!--------------------general--------------------------->
                    <ul class="content_template content_template-general">
                        <li class="content_template-general-item last-menu">
                            <div>
                                <h3 class="titulo-templates">
                                    <span>@{{ title }}</span>
                                </h3>
                                <p><strong>By:</strong></p>
                            </div>
                            <div>
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">11/22/2021</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
                                        <style type="text/css">

                                        </style>
                                        <g>
                                            <g id="Icon-Calendar" transform="translate(30.000000, 478.000000)">
                                                <path class="st0" d="M19.6-424h-35.2c-2.4,0-4.4-2-4.4-4.4v-32.3c0-2.4,1.6-4.4,3.7-4.4h2.2v2.9h-2.2     c-0.3,0-0.7,0.6-0.7,1.5v32.3c0,0.8,0.7,1.5,1.5,1.5h35.2c0.8,0,1.5-0.7,1.5-1.5v-32.3c0-0.9-0.5-1.5-0.7-1.5h-2.2v-2.9h2.2     c2,0,3.7,2,3.7,4.4v32.3C24-426,22-424,19.6-424" id="Fill-133" style="fill: #134563;" />
                                                <path class="st0" d="M-9.7-459.2c-0.8,0-1.5-0.7-1.5-1.5v-5.9c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v5.9     C-8.3-459.9-8.9-459.2-9.7-459.2" id="Fill-134" style="fill: #134563;" />
                                                <path class="st0" d="M13.7-459.2c-0.8,0-1.5-0.7-1.5-1.5v-5.9c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5v5.9     C15.2-459.9,14.5-459.2,13.7-459.2" id="Fill-135" style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-136" points="-5.3,-465.1 9.3,-465.1 9.3,-462.1 -5.3,-462.1    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-137" points="-17.1,-456.3 21.1,-456.3 21.1,-453.3 -17.1,-453.3    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-138" points="15.2,-450.4 18.1,-450.4 18.1,-447.5 15.2,-447.5    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-139" points="9.3,-450.4 12.3,-450.4 12.3,-447.5 9.3,-447.5    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-140" points="3.5,-450.4 6.4,-450.4 6.4,-447.5 3.5,-447.5    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-141" points="-2.4,-450.4 0.5,-450.4 0.5,-447.5 -2.4,-447.5    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-142" points="-8.3,-450.4 -5.3,-450.4 -5.3,-447.5 -8.3,-447.5    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-143" points="15.2,-444.5 18.1,-444.5 18.1,-441.6 15.2,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-144" points="9.3,-444.5 12.3,-444.5 12.3,-441.6 9.3,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-145" points="3.5,-444.5 6.4,-444.5 6.4,-441.6 3.5,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-146" points="-2.4,-444.5 0.5,-444.5 0.5,-441.6 -2.4,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-147" points="-8.3,-444.5 -5.3,-444.5 -5.3,-441.6 -8.3,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-148" points="-14.1,-444.5 -11.2,-444.5 -11.2,-441.6 -14.1,-441.6    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-149" points="15.2,-438.7 18.1,-438.7 18.1,-435.7 15.2,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-150" points="9.3,-438.7 12.3,-438.7 12.3,-435.7 9.3,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-151" points="3.5,-438.7 6.4,-438.7 6.4,-435.7 3.5,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-152" points="-2.4,-438.7 0.5,-438.7 0.5,-435.7 -2.4,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-153" points="-8.3,-438.7 -5.3,-438.7 -5.3,-435.7 -8.3,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-154" points="-14.1,-438.7 -11.2,-438.7 -11.2,-435.7 -14.1,-435.7    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-155" points="9.3,-432.8 12.3,-432.8 12.3,-429.9 9.3,-429.9    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-156" points="3.5,-432.8 6.4,-432.8 6.4,-429.9 3.5,-429.9    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-157" points="-2.4,-432.8 0.5,-432.8 0.5,-429.9 -2.4,-429.9    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-158" points="-8.3,-432.8 -5.3,-432.8 -5.3,-429.9 -8.3,-429.9    " style="fill: #134563;" />
                                                <polygon class="st0" id="Fill-159" points="-14.1,-432.8 -11.2,-432.8 -11.2,-429.9 -14.1,-429.9    " style="fill: #134563;" />
                                            </g>
                                        </g>
                                        <metadata>
                                            <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                                                <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="1814093,calendar,events,schedule" dc:description="1814093,calendar,events,schedule" dc:publisher="Iconscout" dc:date="2017-02-06" dc:format="image/svg+xml" dc:language="en">
                                                    <dc:creator>
                                                        <rdf:Bag>
                                                            <rdf:li>Evil Icons</rdf:li>
                                                        </rdf:Bag>
                                                    </dc:creator>
                                                </rdf:Description>
                                            </rdf:RDF>
                                        </metadata>
                                    </svg>

                                    <!----hover----->
                                    <span class="tooltip-nav_last">
                                        <span>Hello</span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    Willian
                                </p>
                            </div>

                        </li>

                        <li class="content_template-general-item" id="driving">
                            <h3 class="titulo-templates">@{{ drivingQuestionTitle }}</h3>
                            {!! $drivingQuestion !!}

                        </li>
                        <li class="content_template-general-item" id="subjecttitle">
                            <h3 class="titulo-templates">@{{ subjectTitle }}</h3>

                            <div class="row mt-3">
                                <div v-for="(subject, index) in subjects" class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">

                                            @{{ subject }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item" id="time">
                            <h3 class="titulo-templates">@{{ timeFrameTitle }}</h3>

                            <div class="row">
                                <div class="col-md-6">
                                    @{{ timeFrame }}
                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item" id="projectsumary">
                            <h3 class="titulo-templates">Project summary</h3>
                            {!! $projectSumary !!}
                        </li>

                        <li class="content_template-general-item" id="publictitle">
                            <h3 class="titulo-templates">@{{ publicProductTitle }}</h3>
                            {!! $publicProduct !!}
                        </li>

                        <li class="content_template-general-item" id="leveltitle">
                            <h3 class="titulo-templates">@{{ levelTitle }}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inp"></label>
                                        <select id="inpt" class="form-control" v-model="level" disabled>
                                            <option value="">Choose your level </option>
                                            <option value="nursery">Nursery </option>
                                            <option value="early">Early Childhood </option>
                                            <option value="primary">Primary/Elementary School</option>
                                            <option value="middle">Middle School</option>
                                            <option value="high">High School</option>
                                            <option value="undergraduate">Undergraduate</option>
                                            <option value="masters">Masters</option>
                                            <option value="phd">PhD</option>
                                            <option value="no-apply">Doesn’t Apply
                                            </option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="row" v-show="level == 'nursery'">

                                        <div class="col-6" v-for="nurseryLevel in 4" v-if="checkTest(nurseryLevel-1)">
                                            <div class="form-check">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(nurseryLevel-1)" value="" :id="'age-'+(nurseryLevel-1)" disabled>
                                                <label class="form-check-label">
                                                    @{{ nurseryLevel - 1 }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'early'">

                                        <div class="col-6" v-for="earlyLevel in 6" v-if="earlyLevel > 3 && checkTest(earlyLevel)">
                                            <div class="form-check">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(earlyLevel)" value="" :id="'age-'+earlyLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ earlyLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'primary'">

                                        <div class="col-6" v-for="primaryLevel in 10" v-if="primaryLevel > 6 && checkTest(primaryLevel)">
                                            <div class="form-check" @click="addOrPopAges(primaryLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(primaryLevel)" value="" :id="'age-'+primaryLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ primaryLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'middle'">

                                        <div class="col-6" v-for="middleLevel in 13" v-if="middleLevel > 10 && checkTest(middleLevel)">
                                            <div class="form-check" @click="addOrPopAges(middleLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(middleLevel)" value="" :id="'age-'+middleLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ middleLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" v-show="level == 'high'">

                                        <div class="col-6" v-for="highLevel in 18" v-if="highLevel > 14 && checkTest(highLevel)">
                                            <div class="form-check" @click="addOrPopAges(highLevel)">
                                                <input class="form-check-input check-age" type="checkbox" :checked="checkTest(highLevel)" value="" :id="'age-'+highLevel" disabled>
                                                <label class="form-check-label">
                                                    @{{ highLevel }}
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-check" @click="addOrPopAges('18+')" v-show="level == 18 && checkTest('18+')">
                                        <input class="form-check-input check-age" type="checkbox" :checked="checkTest('18+')" value="" id="age-18">
                                        <label class="form-check-label">
                                            +18
                                        </label>
                                    </div>
                                    <div class="form-check" @click="addOrPopAges('all ages')" v-show="level != '' && checkTest('all ages')">
                                        <input class="form-check-input check-age" type="checkbox" :checked="checkTest('all ages')" value="" id="noapply" disabled>
                                        <label class="form-check-label">
                                            Doesn't apply
                                        </label>
                                    </div>


                                </div>
                            </div>
                        </li>

                        <li class="content_template-general-item" id="hashtags-menu">
                            <h3 class="titulo-templates">#hashtags</h3>

                            <div class="row mt-3">
                                <div v-for="(hashtag, index) in hashtags" class="col-md-3">
                                    <div class="card card-shows">
                                        <div class="card-body">
                                            #@{{ hashtag }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <div class="row" v-if="showTools">
                            <div class="col-12">

                                <li class="content_template-general-item" id="toolstitle">

                                    <h3 class="titulo-templates">@{{ toolsTitle }}</h3>

                                    <div class="row mt-3">
                                        <div v-for="(tool, index) in tools" class="col-md-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    @{{ tool }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-if="showLearningGoals">
                            <div class="col-12">

                                <li class="content_template-general-item" id="#leargoals">

                                    <h3 class="titulo-templates">@{{ learningGoalsTitle }}</h3>

                                    <div class="row">
                                        <div class="col-md-4" v-for="(goal, index) in learningGoals">
                                            <div class="card">
                                                <div class="card-body">
                                                    <strong>@{{ goal.title }}</strong>
                                                    <div v-html="goal.body"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showResources">
                            <div class="col-12">

                                <li class="content_template-general-item" id="resoustitle">

                                    <h3 class="titulo-templates">@{{ resourcesTitle }}</h3>
                                    <div>{!! $resources !!}</div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showProjectMilestone">
                            <div class="col-12">

                                <li class="content_template-general-item" id="projectmiles">

                                    <h3 class="titulo-templates">@{{ projectMilestoneTitle }}</h3>

                                    <div class="row">
                                        <div class="col-md-4" v-for="(milestone, index) in projectMilestones">
                                            <div class="card">
                                                <div class="card-body">
                                                    <strong>@{{ milestone.title }}</strong>
                                                    <div v-html="milestone.body"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </li>
                            </div>
                        </div>


                    </ul>
                    <!-----------------------END general------------------------>

                    <div class="content_template">

                        {!! $mainInfo !!}

                        <div class="contente_item mt-5 mb-5">
                            <h3 class="titulo-templates">Calendar of activities </h3>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">Day 1</div>
                                    <div class="col-md-2">Day 2</div>
                                    <div class="col-md-2">Day 3</div>
                                    <div class="col-md-2">Day 4</div>
                                    <div class="col-md-2">Day 5</div>
                                </div>
                                <div class="row mt-1" v-for="week in weeks">
                                    <div class="col-md-2">Week @{{ week }}</div>
                                    <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target="#calendarDescription">
                                        <div class="card" style="cursor: pointer">
                                            <div class="card-body card-body_tarea">
                                                @{{ showActivity(week, day) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row" v-show="showExpert">
                            <div class="col-12">


                                <li class="content_template-general-item" id="experttitle">

                                    <h3 class="titulo-templates">@{{ expertTitle  }}</h3>

                                    <div>{!! $expert !!}</div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showFieldWork">
                            <div class="col-12">

                                <li class="content_template-general-item" id="fielwork">

                                    <h3 class="titulo-templates">@{{ fieldWorkTitle }}</h3>
                                    <div>{!! $fieldWork !!}</div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showGlobalConnections">
                            <div class="col-12">

                                <li class="content_template-general-item" id="globalconnections">

                                    <h3 class="titulo-templates">@{{ globalConnectionsTitle }}</h3>
                                    <div>{!! $globalConnections !!}</div>
                                </li>
                            </div>
                        </div>

                        <div class="contente_item">
                            <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                            {!! $bibliography !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <a class="up" href="#own-template">
            <div class="arrow-up"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" fill="#fff">
                    <path d="M11.218 20.2L17 14.418l5.782 5.782a1 1 0 0 0 1.414-1.414L17.71 12.3a.997.997 0 0 0-.71-.292.997.997 0 0 0-.71.292l-6.486 6.486a1 1 0 0 0 1.414 1.414z" />
                    <metadata>
                        <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/">
                            <rdf:Description about="https://iconscout.com/legal#licenses" dc:title="arrow,carrot,up" dc:description="arrow,carrot,up" dc:publisher="Iconscout" dc:date="2017-09-25" dc:format="image/svg+xml" dc:language="en">
                                <dc:creator>
                                    <rdf:Bag>
                                        <rdf:li>Elegant Themes</rdf:li>
                                    </rdf:Bag>
                                </dc:creator>
                            </rdf:Description>
                        </rdf:RDF>
                    </metadata>
                </svg></div>
        </a>
        <footer class="footer-estyle">
            <div class="footer container mt-5 text-center">
                <p> <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a> - <a data-toggle="modal" data-target=".terms">Terms & Conditions</a> - <a href="#">About WikiPBL</a> - 2021
                    Copyrights - Contact us! </p>
            </div>
        </footer>
    </div>
</div>

@endsection

@push("script")

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

<script>
    const create = new Vue({
        el: '#own-template',
        data() {
            return {
                projectId: "{{ $id }}",
                title: "{!! htmlspecialchars_decode($title) !!}",
                drivingQuestionTitle: "{!! htmlspecialchars_decode($drivingQuestionTitle) !!}",
                subjectTitle: "{!! htmlspecialchars_decode($subjectTitle) !!}",
                subject: "",
                subjects: "",
                timeFrameTitle: "{!! htmlspecialchars_decode($timeFrameTitle) !!}",
                timeFrame: "{!! htmlspecialchars_decode($timeFrame) !!}",
                publicProductTitle: "{!! htmlspecialchars_decode($publicProductTitle) !!}",
                levelTitle: "{!! htmlspecialchars_decode($levelTitle) !!}",
                level: "",
                ages: [],
                hashtag: "",
                hashtags: "",
                calendarActivities: [],
                activityDescription: "",
                days: 5,
                weeks: 4,
                calendarDay: "",
                calendarWeek: "",
                toolsTitle: "{!! htmlspecialchars_decode($toolsTitle) !!}",
                showTools: true,
                tools: [],
                learningGoalsTitle: "{!! htmlspecialchars_decode($learningGoalsTitle) !!}",
                showLearningGoals: true,
                learningGoals: [],
                resourcesTitle: "{!! htmlspecialchars_decode($resourcesTitle) !!}",
                showResources: true,
                showProjectMilestone: true,
                projectMilestoneTitle: "{!! htmlspecialchars_decode($projectMilestonesTitle) !!}",
                projectMilestones: [],
                expertTitle: "{!! htmlspecialchars_decode($expertTitle) !!}",
                showExpert: true,
                fieldWorkTitle: "{!! htmlspecialchars_decode($fieldWorkTitle) !!}",
                showFieldWork: true,
                globalConnectionsTitle: "{!! htmlspecialchars_decode($globalConnectionsTitle) !!}",
                showGlobalConnections: true,
                follow: "{{ \Auth::check() ? App\ProjectShare::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                like: "{{ \Auth::check() ? App\Like::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                report: "{{ \Auth::check() ? App\ProjectReport::where('user_id', \Auth::user()->id)->where('project_id', $project[0]->id)->count() : 0 }}",
                likes:parseInt("{{ App\Like::where('project_id', $project[0]->id)->count() }}"),
                assestmentArray: JSON.parse('{!! $assestmentPointsArray !!}'),
                loading: false,
                myChart: null,
                labels: [],
                values: []
            }
        },
        methods: {


            showActivity(week, day) {


                var activity = null
                this.calendarActivities.forEach((data) => {

                    if (data.week == week && data.day == day) {
                        activity = data
                    }

                })

                if (activity) {
                    return activity.description
                }

            },
            setWeekAndDay(week, day) {

                this.activityDescription = ""
                this.calendarDay = day
                this.calendarWeek = week

                this.calendarActivities.forEach(data => {

                    if (data.week == week && data.day == day) {
                        this.activityDescription = data.description
                    }

                })

            },
            setCheckedAges() {

                this.ages.forEach((data) => {

                    if (data == "18+") {
                        document.getElementById("age-18").checked = true;
                    } else if (data == "all ages") {
                        document.getElementById("allages").checked = true;
                    } else {
                        document.getElementById("age-" + data).checked = true;
                    }

                })

            },
            checkTest(age) {
                var exists = false
                this.ages.forEach((data) => {
                    if (data == age) {
                        exists = true
                    }
                })

                return exists
            },
            followProject() {

                this.changeFollowIcon()

                axios.post("{{ url('project/follow') }}", {
                    "project_id": this.projectId
                }).then(res => {

                    if (res.data.success) {
                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                    } else {
                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })
                    }

                })

            },
            changeFollowIcon() {
                if (this.follow == "1") {
                    this.follow = "0"
                } else {
                    this.follow = "1"
                }
            },
            likeProject() {

                this.changeLikeIcon()

                axios.post("{{ url('project/like') }}", {
                    "project_id": this.projectId
                }).then(res => {

                    if (res.data.success) {
                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                    } else {
                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })
                    }

                })

            },
            changeLikeIcon() {
                if (this.like == "1") {
                    this.like = "0"
                    this.likes = this.likes - 1
                } else {
                    this.like = "1"
                    this.likes = this.likes + 1
                }
            },
            showReportConfirmation() {

                if (this.report == 0) {
                    $("#reportConfirmation").modal("show")
                } else {
                    this.reportProject()
                }

            },
            reportProject() {

                this.changeReportIcon()

                axios.post("{{ url('project/report') }}", {
                    "project_id": this.projectId
                }).then(res => {

                    if (res.data.success) {
                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                    } else {
                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })
                    }

                })

            },
            changeReportIcon() {
                if (this.report == "1") {
                    this.report = "0"
                } else {
                    this.report = "1"
                }
            },
            drawChart() {

                this.labels = []
                this.values = []

                this.assestmentArray.forEach((data) => {

                    this.labels.push(data.name)
                    this.values.push(data.value)

                })

                var ctx = document.getElementById("myChart").getContext('2d');

                if (this.myChart != undefined || this.myChart != null) {
                    this.myChart.destroy();
                }

                this.myChart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            data: this.values,
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }],
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    callback: function(value) {
                                        if (Number.isInteger(value)) {
                                            return value;
                                        }
                                    },
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
            },
            upvoteAssestment(upvoteType, upvoteTypeName) {

                var arrayIndex = 0
                this.assestmentArray.forEach((data, index) => {
                    if (data.name == upvoteTypeName) {
                        arrayIndex = index
                    }

                })

                axios.post("{{ url('project/assestment-point') }}", {
                    "project_id": this.projectId,
                    "assestmentPointTypeId": upvoteType
                }).then(res => {

                    if (res.data.action == "add") {
                        this.assestmentArray[arrayIndex].value = this.assestmentArray[arrayIndex].value + 1
                        this.drawChart()
                    } else {
                        this.assestmentArray[arrayIndex].value = this.assestmentArray[arrayIndex].value - 1
                        this.drawChart()
                    }

                })

            }


        },
        mounted() {

            let level = JSON.parse('{!! $level !!}')
            this.level = level.level
            this.ages = level.ages

            this.calendarActivities = JSON.parse('{!! $calendarActivities !!}')
            this.upvoteSystems = JSON.parse('{!! $upvoteSystem !!}')

            let learningGoals = '{!! $learningGoals !!}'
            if (learningGoals != '') {
                this.learningGoals = JSON.parse(learningGoals);
            }


            let milestone = '{!! $projectMilestones !!}'
            if (milestone) {
                this.projectMilestones = JSON.parse(milestone)
            }

            this.calendarActivities = JSON.parse('{!! $calendarActivities !!}')
            this.upvoteSystems = JSON.parse('{!! $upvoteSystem !!}')
            //this.setCheckedUpvoteSystems()

            if ("{{ strlen($subjects) }}" > 0) {
                this.subjects = ("{!! htmlspecialchars_decode($subjects) !!}").split(",")
            }

            if (("{{ $hashtag }}").length > 0) {
                this.hashtags = ("{!! htmlspecialchars_decode($hashtag) !!}").split(",")
            }

            this.tools = ("{!! htmlspecialchars_decode($tools) !!}").split(",")

            if (this.tools == "") {
                this.showTools = false
            }

            if (this.learningGoals.length == 0) {
                this.showLearningGoals = false
            }

            if ("{{ $resources }}" == "") {
                this.showResources = false
            }

            if (milestone.length == 0) {
                this.showProjectMilestone = false
            }

            if ("{{ $expert }}" == "") {
                this.showExpert = false
            }

            if ("{{ $fieldWork }}" == "") {
                this.showFieldWork = false
            }

            if ("{{ $globalConnections }}" == "") {
                this.showGlobalConnections = false
            }

            if (this.report > 0) {
                $("#reportIcon").css("fill", "#4674b8")
            }

            this.drawChart()

        }

    })
</script>

@endpush