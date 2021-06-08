@extends("layouts.project")

@section("content")

<div id="own-template">
    @include("partials.projectShowHeader")
    <div class="container p5">
        <div class="container  main-template " v-cloak>

            <div class="modal fade" id="calendarDescription" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
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
                                wikiPBL is having problems, remember
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
                                <li> <a style="cursor: pointer;" @click="scrollTo('title-p')"> @{{ title }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('driving')">@{{ drivingQuestionTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('subjecttitle')">@{{ subjectTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('time')">@{{ timeFrameTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('projectsumary')">Project Summary</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('publictitle')">@{{ publicProductTitle }}</a> </li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('leveltitle')">@{{ levelTitle }}</a></li>
                                <li> <a style="cursor: pointer;" @click="scrollTo('hashtags-menu')">#hashtags</a></li>
                                <li v-if="showTools"> <a style="cursor: pointer;" @click="scrollTo('toolstitle')">@{{ toolsTitle }}</a></li>
                                <li v-if="showLearningGoals"><a style="cursor: pointer;" @click="scrollTo('leargoals')">@{{ learningGoalsTitle }}</a></li>
                                <li v-if="showResources"><a style="cursor: pointer;" @click="scrollTo('resoustitle')">@{{ resourcesTitle }}</a></li>
                                <li v-if="showProjectMilestone"><a style="cursor: pointer;" @click="scrollTo('projectmiles')">@{{ projectMilestoneTitle }}</a></li>
                                <li><a style="cursor: pointer;" @click="scrollTo('projectcalendar')">Calendar</a></li>
                                <li v-if="showExpert"><a style="cursor: pointer;" @click="scrollTo('experttitle')">@{{ expertTitle }}</a></li>
                                <li v-if="showFieldWork"> <a style="cursor: pointer;" @click="scrollTo('fielwork')">@{{ fieldWorkTitle }}</a></li>
                                <li v-if="showGlobalConnections"> <a style="cursor: pointer;" @click="scrollTo('globalconnections')">@{{ globalConnectionsTitle }}</a> </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <!----------------info----------------->
                <div class="col-md-12 col-lg-9 info-template">



                    <!--------------------general--------------------------->
                    <ul class="content_template content_template-general">
                        <li class="content_template-general-item last-menu" id="title-p">
                            <div>
                                <h3 class="titulo-templates">
                                    <span>@{{ title }}</span>
                                </h3>
                                <p><strong>By:</strong> {{ $project[0]->user->name }}</p>
                            </div>
                            <div v-if="titleHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ titleHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="titleHistory.length > 1">
                                        <span v-for="(history, index) in titleHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ titleHistory[0].user }}
                                </p>
                            </div>

                        </li>

                        <div class="container-fluid">
                            <h3 class="titulo-templates">
                                <span>Upvote system</span>
                            </h3>
                            @if(count($assestmentPoints) > 0)
                            <div class="row">


                                <div class="col-md-12">

                                    <canvas id="myChart"></canvas>

                                </div>

                            </div>
                            @if(\Auth::check())
                            <div class="row">
                                <div class="col-md-12 mb-3 mt-5">
                                    <span class="txt-blue">Click to vote</span>
                                </div>
                                @foreach($assestmentPoints as $point)
                                <div class="col-md-4">

                                    <p>
                                        <button class="btn btn-votos" @click="upvoteAssestment({{$point->assestmentPointType->id}}, '{!! htmlspecialchars_decode($point->assestmentPointType->name) !!}')">
                                            <img src="{{ $point->assestmentPointType->icon }}" alt="">
                                            {{ $point->assestmentPointType->name }}
                                        </button>
                                    </p>

                                </div>
                                @endforeach
                            </div>
                            @endif
                            @endif

                        </div>

                        <li class="content_template-general-item last-menu" id="driving">
                            <div>
                                <h3 class="titulo-templates">@{{ drivingQuestionTitle }}</h3>
                                {!! $drivingQuestion !!}
                            </div>

                            <div v-if="drivingQuestionHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ drivingQuestionHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="drivingQuestionHistory.length > 1">
                                        <span v-for="(history, index) in drivingQuestionHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ drivingQuestionHistory[0].user }}
                                </p>
                            </div>

                        </li>
                        <li class="content_template-general-item last-menu" id="subjecttitle">
                            <div class="w-100">
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
                            </div>
                            <div v-if="subjectHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ subjectHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="subjectHistory.length > 1">
                                        <span v-for="(history, index) in subjectHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ subjectHistory[0].user }}
                                </p>
                            </div>
                        </li>

                        <li class="content_template-general-item last-menu" id="time">
                            <div>
                                <h3 class="titulo-templates">@{{ timeFrameTitle }}</h3>
                                @{{ timeFrame }}
                            </div>
                            <div v-if="timeFrameHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ timeFrameHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="timeFrameHistory.length > 1">
                                        <span v-for="(history, index) in timeFrameHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ timeFrameHistory[0].user }}
                                </p>
                            </div>
                        </li>

                        <li class="content_template-general-item last-menu" id="projectsumary">
                            <div>
                                <h3 class="titulo-templates">Project summary</h3>
                                {!! $projectSumary !!}
                            </div>
                            <div v-if="projectSumaryHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ projectSumaryHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="projectSumaryHistory.length > 1">
                                        <span v-for="(history, index) in projectSumaryHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ projectSumaryHistory[0].user }}
                                </p>
                            </div>
                        </li>

                        <li class="content_template-general-item last-menu" id="publictitle">
                            <div>
                                <h3 class="titulo-templates">@{{ publicProductTitle }}</h3>
                                {!! $publicProduct !!}
                            </div>
                            <div v-if="publicProjectHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ publicProjectHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="publicProjectHistory.length > 1">
                                        <span v-for="(history, index) in publicProjectHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ publicProjectHistory[0].user }}
                                </p>
                            </div>
                        </li>

                        <li class="content_template-general-item last-menu" id="leveltitle">
                            <div>
                                <h3 class="titulo-templates">@{{ levelTitle }}</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inp"></label>

                                            <label v-if="level == 'nursery'">Nursery </label>
                                            <label v-if="level == 'early'">Early Childhood </label>
                                            <label v-if="level == 'primary'">Primary/Elementary School</label>
                                            <label v-if="level == 'middle'">Middle School</label>
                                            <label v-if="level == 'high'">High School</label>
                                            <label v-if="level == 'undergraduate'">Undergraduate</label>
                                            <label v-if="level == 'masters'">Masters</label>
                                            <label v-if="level == 'phd'">PhD</label>


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

                                            <div class="col-6" v-for="earlyLevel in 6" v-if="checkTest(earlyLevel)">
                                                <div class="form-check">
                                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest(earlyLevel)" value="" :id="'age-'+earlyLevel" disabled>
                                                    <label class="form-check-label">
                                                        @{{ earlyLevel }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" v-show="level == 'primary'">

                                            <div class="col-6" v-for="primaryLevel in 10" v-if="checkTest(primaryLevel)">
                                                <div class="form-check" @click="addOrPopAges(primaryLevel)">
                                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest(primaryLevel)" value="" :id="'age-'+primaryLevel" disabled>
                                                    <label class="form-check-label">
                                                        @{{ primaryLevel }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" v-show="level == 'middle'">

                                            <div class="col-6" v-for="middleLevel in 13" v-if="checkTest(middleLevel)">
                                                <div class="form-check" @click="addOrPopAges(middleLevel)">
                                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest(middleLevel)" value="" :id="'age-'+middleLevel" disabled>
                                                    <label class="form-check-label">
                                                        @{{ middleLevel }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row" v-show="level == 'high'">

                                            <div class="col-6" v-for="highLevel in 18" v-if="checkTest(highLevel)">
                                                <div class="form-check" @click="addOrPopAges(highLevel)">
                                                    <input class="form-check-input check-age" type="checkbox" :checked="checkTest(highLevel)" value="" :id="'age-'+highLevel" disabled>
                                                    <label class="form-check-label">
                                                        @{{ highLevel }}
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-check" @click="addOrPopAges('18+')" v-show="checkTest('18+')">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest('18+')" value="" id="age-18">
                                            <label class="form-check-label">
                                                +18
                                            </label>
                                        </div>
                                        <div class="form-check" @click="addOrPopAges('all ages')" v-show="checkTest('all ages')">
                                            <input class="form-check-input check-age" type="checkbox" :checked="checkTest('all ages')" value="" id="noapply" disabled>
                                            <label class="form-check-label">
                                                Doesn't apply
                                            </label>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div v-if="levelHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ levelHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="levelHistory.length > 1">
                                        <span v-for="(history, index) in levelHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ levelHistory[0].user }}
                                </p>
                            </div>
                        </li>

                        <li class="content_template-general-item last-menu" id="hashtags-menu">
                            <div class="w-100">
                                <h3 class="titulo-templates">#hashtags</h3>
                                <div class="row mt-3">
                                    <div v-for="(hashtag, index) in hashtags" class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                #@{{ hashtag }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="hashtagHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ hashtagHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="hashtagHistory.length > 1">
                                        <span v-for="(history, index) in hashtagHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ hashtagHistory[0].user }}
                                </p>
                            </div>

                        </li>

                        <div class="row" v-if="showTools">
                            <div class="col-12">

                                <li class="content_template-general-item last-menu" id="toolstitle">
                                    
                                        <div class="">
                                            <div>
                                                <h3 class="titulo-templates">@{{ toolsTitle }}</h3>
                                            </div>

                                            <div class="row mt-3">
                                                <div v-for="(tool, index) in tools" class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            @{{ tool }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div v-if="toolHistory.length > 0">
                                                <span class="last-meu_p">Last update</span>
                                                <div class="calendario">
                                                    <p class="borde-calen">@{{ toolHistory[0].date }}</p>
                                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                                    <span class="tooltip-nav_last" v-if="toolHistory.length > 1">
                                                        <span v-for="(history, index) in toolHistory">
                                                            @{{ history.user }} @{{ history.date }}
                                                        </span>
                                                    </span>
                                                    <!--------->
                                                </div>
                                                <p class="user_last">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                                    </svg>
                                                    @{{ toolHistory[0].user }}
                                                </p>
                                            </div>
                                        </div>
                             


                                </li>
                            </div>
                        </div>

                        <div class="row" v-if="showLearningGoals">
                            <div class="col-12">

                                <li class="content_template-general-item last-menu" id="leargoals">
                                  
                                        <div class="">
                                            <div>
                                                <h3 class="titulo-templates">@{{ learningGoalsTitle }}</h3>
                                            </div>

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
                                        </div>
                                        <div class="">
                                            <div v-if="learningGoalHistory.length > 0">
                                                <span class="last-meu_p">Last update</span>
                                                <div class="calendario">
                                                    <p class="borde-calen">@{{ learningGoalHistory[0].date }}</p>
                                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                                    <span class="tooltip-nav_last" v-if="learningGoalHistory.length > 1">
                                                        <span v-for="(history, index) in learningGoalHistory">
                                                            @{{ history.user }} @{{ history.date }}
                                                        </span>
                                                    </span>
                                                    <!--------->
                                                </div>
                                                <p class="user_last">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                                    </svg>
                                                    @{{ learningGoalHistory[0].user }}
                                                </p>
                                            </div>
                                        </div>
                                  
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showResources">
                            <div class="col-12">

                                <li class="content_template-general-item last-menu" id="resoustitle">

                                    <div>
                                        <h3 class="titulo-templates">@{{ resourcesTitle }}</h3>
                                        <div>{!! $resources !!}</div>
                                    </div>
                                    <div v-if="resourceHistory.length > 0">
                                        <span class="last-meu_p">Last update</span>
                                        <div class="calendario">
                                            <p class="borde-calen">@{{ resourceHistory[0].date }}</p>
                                            <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                            <span class="tooltip-nav_last" v-if="resourceHistory.length > 1">
                                                <span v-for="(history, index) in resourceHistory">
                                                    @{{ history.user }} @{{ history.date }}
                                                </span>
                                            </span>
                                            <!--------->
                                        </div>
                                        <p class="user_last">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                            </svg>
                                            @{{ resourceHistory[0].user }}
                                        </p>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="" v-show="showProjectMilestone">
                            <div class="">

                                <li class="content_template-general-item last-menu" id="projectmiles">
                                    

                                        <div class="">
                                            <h3 class="titulo-templates">@{{ projectMilestoneTitle }}</h3>

                                            <div class="">
                                                <div class="" v-for="(milestone, index) in projectMilestones">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <strong>@{{ milestone.title }}</strong>
                                                            <div v-html="milestone.body"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="">
                                            <div v-if="projectMilestoneHistory.length > 0">
                                                <span class="last-meu_p">Last update</span>
                                                <div class="calendario">
                                                    <p class="borde-calen">@{{ projectMilestoneHistory[0].date }}</p>
                                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                                    <span class="tooltip-nav_last" v-if="projectMilestoneHistory.length > 1">
                                                        <span v-for="(history, index) in projectMilestoneHistory">
                                                            @{{ history.user }} @{{ history.date }}
                                                        </span>
                                                    </span>
                                                    <!--------->
                                                </div>
                                                <p class="user_last">
                                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                                    </svg>
                                                    @{{ projectMilestoneHistory[0].user }}
                                                </p>
                                            </div>
                                        </div>
                                  





                                </li>
                            </div>
                        </div>


                        <li class="content_template-general-item last-menu">
                            <div>
                                {!! $mainInfo !!}
                            </div>
                            <div v-if="mainInfoHistory.length > 0">
                                <span class="last-meu_p">Last update</span>
                                <div class="calendario">
                                    <p class="borde-calen">@{{ mainInfoHistory[0].date }}</p>
                                    <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                    <span class="tooltip-nav_last" v-if="mainInfoHistory.length > 1">
                                        <span v-for="(history, index) in mainInfoHistory">
                                            @{{ history.user }} @{{ history.date }}
                                        </span>
                                    </span>
                                    <!--------->
                                </div>
                                <p class="user_last">
                                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                        <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                    </svg>
                                    @{{ mainInfoHistory[0].user }}
                                </p>
                            </div>
                        </li>

                    </ul>
                    <!-----------------------END general------------------------>

                    <div class="content_template" id="projectcalendar">
                        <h3 class="titulo-templates">Calendar of Activities</h3>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="false">
                            <div class="carousel-inner">
                                <div :class=" index === 0 ? 'carousel-item active' : 'carousel-item'" v-for="(slide, index) in slides">

                                    <div class="row mt-2  days-none">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <svg version="1.1" id="Capa_1" class="icon-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                                <g>
                                                    <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                                    <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                                    <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                                    <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                                    <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                                    <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                                    <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                                    <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                                    <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                            </svg>
                                            Day 1
                                        </div>
                                        <div class="col-md-2">
                                            <svg version="1.1" id="Capa_1" class="icon-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                                <g>
                                                    <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                                    <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                                    <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                                    <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                                    <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                                    <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                                    <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                                    <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                                    <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                            </svg>
                                            Day 2
                                        </div>
                                        <div class="col-md-2">
                                            <svg version="1.1" id="Capa_1" class="icon-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                                <g>
                                                    <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                                    <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                                    <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                                    <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                                    <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                                    <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                                    <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                                    <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                                    <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                            </svg>
                                            Day 3
                                        </div>
                                        <div class="col-md-2">
                                            <svg version="1.1" id="Capa_1" class="icon-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                                <g>
                                                    <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                                    <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                                    <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                                    <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                                    <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                                    <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                                    <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                                    <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                                    <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                            </svg>
                                            Day 4
                                        </div>
                                        <div class="col-md-2">
                                            <svg version="1.1" id="Capa_1" class="icon-calendar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 219.786 219.786" style="enable-background:new 0 0 219.786 219.786;" xml:space="preserve">
                                                <g>
                                                    <path d="M109.881,183.46c-4.142,0-7.5,3.358-7.5,7.5v21.324c0,4.142,3.358,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V190.96 C117.381,186.817,114.023,183.46,109.881,183.46z" />
                                                    <path d="M109.881,36.329c4.143,0,7.5-3.358,7.5-7.5V7.503c0-4.142-3.357-7.5-7.5-7.5c-4.142,0-7.5,3.358-7.5,7.5v21.326C102.381,32.971,105.739,36.329,109.881,36.329z" />
                                                    <path d="M47.269,161.909l-15.084,15.076c-2.93,2.928-2.931,7.677-0.003,10.606c1.465,1.465,3.385,2.198,5.305,2.198 c1.919,0,3.837-0.732,5.302-2.195l15.084-15.076c2.93-2.928,2.931-7.677,0.003-10.606 C54.946,158.982,50.198,158.982,47.269,161.909z" />
                                                    <path d="M167.208,60.067c1.919,0,3.838-0.732,5.303-2.196l15.082-15.076c2.929-2.929,2.93-7.677,0.002-10.607 c-2.929-2.93-7.677-2.931-10.607-0.001l-15.082,15.076c-2.929,2.928-2.93,7.677-0.002,10.606 C163.368,59.335,165.288,60.067,167.208,60.067z" />
                                                    <path d="M36.324,109.895c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h21.324C32.966,117.395,36.324,114.037,36.324,109.895z" />
                                                    <path d="M212.286,102.395h-21.334c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h21.334c4.143,0,7.5-3.358,7.5-7.5 C219.786,105.754,216.429,102.395,212.286,102.395z" />
                                                    <path d="M47.267,57.871c1.464,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.303-2.196c2.929-2.929,2.929-7.678,0-10.607 L42.797,32.188c-2.929-2.929-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L47.267,57.871z" />
                                                    <path d="M172.52,161.911c-2.929-2.929-7.678-2.93-10.607-0.001c-2.93,2.929-2.93,7.678-0.001,10.606l15.074,15.076 c1.465,1.465,3.384,2.197,5.304,2.197c1.919,0,3.839-0.732,5.303-2.196c2.93-2.929,2.93-7.678,0.001-10.606L172.52,161.911z" />
                                                    <path d="M109.889,51.518c-32.187,0-58.373,26.188-58.373,58.377c0,32.188,26.186,58.375,58.373,58.375 c32.19,0,58.378-26.187,58.378-58.375C168.267,77.706,142.078,51.518,109.889,51.518z M109.889,153.27 c-23.916,0-43.373-19.458-43.373-43.375c0-23.918,19.457-43.377,43.373-43.377c23.919,0,43.378,19.459,43.378,43.377 C153.267,133.812,133.808,153.27,109.889,153.27z" />
                                            </svg>
                                            Day 5
                                        </div>
                                    </div>
                                    <div class="row mt-1" v-for="week in 4*currentSlide" v-if="week > (4*currentSlide - 4) && week <= weeks">
                                        <div class="col-md-2">
                                            <svg id="Capa_1" class="icon-calendar" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="m497 32h-46v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-60v-17c0-8.284-6.716-15-15-15s-15 6.716-15 15v17h-46c-8.284 0-15 6.716-15 15v450c0 8.284 6.716 15 15 15h482c8.284 0 15-6.716 15-15v-450c0-8.284-6.716-15-15-15zm-436 30v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h60v15c0 8.284 6.716 15 15 15s15-6.716 15-15v-15h31v60h-452v-60zm-31 420v-330h452v330z" />
                                                    <path d="m166 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                    <path d="m406 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                    <path d="m286 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                    <path d="m286 212h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                    <path d="m406 331h-60c-8.284 0-15 6.716-15 15v60c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-60c0-8.284-6.716-15-15-15zm-15 60h-30v-30h30z" />
                                                    <path d="m175.462 345.161c-6.428-5.226-15.875-4.25-21.101 2.176l-30.498 37.513-8.352-6.849c-6.406-5.255-15.857-4.318-21.11 2.087-5.253 6.406-4.318 15.857 2.088 21.11l20 16.4c6.438 5.28 15.922 4.295 21.15-2.136l40-49.2c5.226-6.428 4.251-15.875-2.177-21.101z" />
                                                </g>
                                            </svg>
                                            Week @{{ week }}
                                        </div>
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
                            <div class="text-center mt-4" v-if="slides > 1">
                                <button class="btn btn-success btn-sliders" @click="previousSlide()"><i class="fa fa-angle-left mr-2" aria-hidden="true"></i>Previous
                                </button>
                                <button class="btn btn-success btn-sliders btn-sliders-2" @click="nextSlide()">Next<i class="fa fa-angle-right ml-2" aria-hidden="true"></i>
                                </button>

                            </div>

                        </div>


                        <div class="row" v-show="showExpert">
                            <div class="col-12">


                                <li class="content_template-general-item last-menu" id="experttitle">

                                    <div>
                                        <h3 class="titulo-templates">@{{ expertTitle  }}</h3>

                                        <div>{!! $expert !!}</div>
                                    </div>
                                    <div v-if="expertHistory.length > 0">
                                        <span class="last-meu_p">Last update</span>
                                        <div class="calendario">
                                            <p class="borde-calen">@{{ expertHistory[0].date }}</p>
                                            <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                            <span class="tooltip-nav_last" v-if="expertHistory.length > 1">
                                                <span v-for="(history, index) in expertHistory">
                                                    @{{ history.user }} @{{ history.date }}
                                                </span>
                                            </span>
                                            <!--------->
                                        </div>
                                        <p class="user_last">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                            </svg>
                                            @{{ expertHistory[0].user }}
                                        </p>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showFieldWork">
                            <div class="col-12">

                                <li class="content_template-general-item last-menu" id="fielwork">

                                    <div>
                                        <h3 class="titulo-templates">@{{ fieldWorkTitle }}</h3>
                                        <div>{!! $fieldWork !!}</div>
                                    </div>
                                    <div v-if="fieldWorkHistory.length > 0">
                                        <span class="last-meu_p">Last update</span>
                                        <div class="calendario">
                                            <p class="borde-calen">@{{ fieldWorkHistory[0].date }}</p>
                                            <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                            <span class="tooltip-nav_last" v-if="fieldWorkHistory.length > 1">
                                                <span v-for="(history, index) in fieldWorkHistory">
                                                    @{{ history.user }} @{{ history.date }}
                                                </span>
                                            </span>
                                            <!--------->
                                        </div>
                                        <p class="user_last">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                            </svg>
                                            @{{ fieldWorkHistory[0].user }}
                                        </p>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="row" v-show="showGlobalConnections">
                            <div class="col-12">

                                <li class="content_template-general-item last-menu" id="globalconnections">

                                    <div>
                                        <h3 class="titulo-templates">@{{ globalConnectionsTitle }}</h3>
                                        <div>{!! $globalConnections !!}</div>
                                    </div>
                                    <div v-if="globalConnectionHistory.length > 0">
                                        <span class="last-meu_p">Last update</span>
                                        <div class="calendario">
                                            <p class="borde-calen">@{{ globalConnectionHistory[0].date }}</p>
                                            <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                            <span class="tooltip-nav_last" v-if="globalConnectionHistory.length > 1">
                                                <span v-for="(history, index) in globalConnectionHistory">
                                                    @{{ history.user }} @{{ history.date }}
                                                </span>
                                            </span>
                                            <!--------->
                                        </div>
                                        <p class="user_last">
                                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                            </svg>
                                            @{{ globalConnectionHistory[0].user }}
                                        </p>
                                    </div>
                                </li>
                            </div>
                        </div>

                        <div class="contente_item">
                            <div class="container-fluid mt-5 last-menu pl-0 pr-0">
                              
                                    <div class="pl-0">
                                        <h3 class="titulo-templates">Bibliography</h3>
                                    </div>
                                    <div class="">
                                        <div class="mt--22" v-if="bibliographyHistory.length > 0">
                                            <span class="last-meu_p">Last update</span>
                                            <div class="calendario">
                                                <p class="borde-calen">@{{ bibliographyHistory[0].date }}</p>
                                                <svg class="login_icon  hover-svg c-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1" style="enable-background:new 0 0 64 64;" version="1.1" viewBox="0 0 64 64" xml:space="preserve">
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
                                                <span class="tooltip-nav_last" v-if="bibliographyHistory.length > 1">
                                                    <span v-for="(history, index) in bibliographyHistory">
                                                        @{{ history.user }} @{{ history.date }}
                                                    </span>
                                                </span>
                                                <!--------->
                                            </div>
                                            <p class="user_last">
                                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 1024 1024" viewBox="0 0 1024 1024">
                                                    <path d="M670.1 278.4c0 8.8-.6 17.6-1.7 26.3.5-3.5 1-7.1 1.4-10.6-2.4 17.4-7 34.3-13.7 50.5 1.3-3.2 2.7-6.4 4-9.6-6.7 15.8-15.3 30.6-25.8 44.2 2.1-2.7 4.2-5.4 6.3-8.1-10.4 13.4-22.5 25.5-35.9 35.9 2.7-2.1 5.4-4.2 8.1-6.3-13.6 10.4-28.4 19.1-44.2 25.8 3.2-1.3 6.4-2.7 9.6-4-16.2 6.7-33.1 11.3-50.5 13.7 3.5-.5 7.1-1 10.6-1.4-17.5 2.3-35.1 2.3-52.6 0 3.5.5 7.1 1 10.6 1.4-17.4-2.4-34.3-7-50.5-13.7 3.2 1.3 6.4 2.7 9.6 4-15.8-6.7-30.6-15.3-44.2-25.8 2.7 2.1 5.4 4.2 8.1 6.3-13.4-10.4-25.5-22.5-35.9-35.9 2.1 2.7 4.2 5.4 6.3 8.1-10.4-13.6-19.1-28.4-25.8-44.2 1.3 3.2 2.7 6.4 4 9.6-6.7-16.2-11.3-33.1-13.7-50.5.5 3.5 1 7.1 1.4 10.6-2.3-17.5-2.3-35.1 0-52.6-.5 3.5-1 7.1-1.4 10.6 2.4-17.4 7-34.3 13.7-50.5-1.3 3.2-2.7 6.4-4 9.6 6.7-15.8 15.3-30.6 25.8-44.2-2.1 2.7-4.2 5.4-6.3 8.1 10.4-13.4 22.5-25.5 35.9-35.9-2.7 2.1-5.4 4.2-8.1 6.3 13.6-10.4 28.4-19.1 44.2-25.8-3.2 1.3-6.4 2.7-9.6 4 16.2-6.7 33.1-11.3 50.5-13.7-3.5.5-7.1 1-10.6 1.4 17.5-2.3 35.1-2.3 52.6 0-3.5-.5-7.1-1-10.6-1.4 17.4 2.4 34.3 7 50.5 13.7-3.2-1.3-6.4-2.7-9.6-4 15.8 6.7 30.6 15.3 44.2 25.8-2.7-2.1-5.4-4.2-8.1-6.3 13.4 10.4 25.5 22.5 35.9 35.9-2.1-2.7-4.2-5.4-6.3-8.1 10.4 13.6 19.1 28.4 25.8 44.2-1.3-3.2-2.7-6.4-4-9.6 6.7 16.2 11.3 33.1 13.7 50.5-.5-3.5-1-7.1-1.4-10.6C669.5 260.8 670 269.6 670.1 278.4c.1 20.9 18.3 41 40 40 21.6-1 40.1-17.6 40-40-.2-47.9-14.6-96.9-42.8-135.9-7.6-10.5-15.7-20.8-24.7-30.1-9.1-9.4-19.1-17.5-29.5-25.4-18.9-14.4-40-25-62.4-33.2-90.3-33.1-199.2-3.6-260.3 70.8-8.4 10.2-16.4 20.8-23.2 32.2-6.8 11.3-12.1 23.3-17 35.5-9.2 22.6-13.9 46.6-15.8 70.9-3.7 47.6 8.7 97.3 33.5 138.1 23.9 39.4 60 73.2 102.2 92.3 12.4 5.6 25.1 10.8 38.3 14.5 13.1 3.6 26.4 5.6 39.9 7.2 24.6 2.9 49.7.9 74-4 92.3-18.8 169.6-98.3 183.9-191.6 2.1-13.6 3.7-27.2 3.7-41 .1-20.9-18.5-41-40-40C688.3 239.4 670.1 256 670.1 278.4zM802.8 903.7c-19.6 0-39.2 0-58.8 0-46.7 0-93.3 0-140 0-56.2 0-112.4 0-168.7 0-48.5 0-97 0-145.6 0-22.7 0-45.4.2-68.1 0-2.5 0-5-.2-7.4-.5 3.5.5 7.1 1 10.6 1.4-4-.6-7.8-1.7-11.5-3.2 3.2 1.3 6.4 2.7 9.6 4-4-1.7-7.7-3.9-11.2-6.6 2.7 2.1 5.4 4.2 8.1 6.3-3-2.5-5.8-5.2-8.2-8.2 2.1 2.7 4.2 5.4 6.3 8.1-2.7-3.5-4.8-7.2-6.6-11.2 1.3 3.2 2.7 6.4 4 9.6-1.5-3.7-2.5-7.6-3.2-11.5.5 3.5 1 7.1 1.4 10.6-1.6-12.1-.5-24.9-.5-37.1 0-14.3 0-28.5 0-42.8 0-10.7.6-21.3 2-31.9-.5 3.5-1 7.1-1.4 10.6 2.8-20.5 8.2-40.6 16.3-59.7-1.3 3.2-2.7 6.4-4 9.6 7.8-18.2 17.8-35.3 29.9-51-2.1 2.7-4.2 5.4-6.3 8.1 12.1-15.5 26-29.5 41.6-41.6-2.7 2.1-5.4 4.2-8.1 6.3 15.7-12.1 32.8-22.1 51-29.9-3.2 1.3-6.4 2.7-9.6 4 19.1-8 39.1-13.5 59.7-16.3-3.5.5-7.1 1-10.6 1.4 14.8-1.9 29.5-2 44.4-2 18.3 0 36.6 0 54.9 0 42.7 0 85.4 0 128.1 0 16.5 0 32.9-.1 49.4 2-3.5-.5-7.1-1-10.6-1.4 20.5 2.8 40.6 8.2 59.7 16.3-3.2-1.3-6.4-2.7-9.6-4 18.2 7.8 35.3 17.8 51 29.9-2.7-2.1-5.4-4.2-8.1-6.3 15.5 12.1 29.5 26 41.6 41.6-2.1-2.7-4.2-5.4-6.3-8.1 12.1 15.7 22.1 32.8 29.9 51-1.3-3.2-2.7-6.4-4-9.6 8 19.1 13.5 39.1 16.3 59.7-.5-3.5-1-7.1-1.4-10.6 1.9 15.1 2 30.1 2 45.3 0 16.5 0 33 0 49.5 0 5.7.2 11.4-.5 17 .5-3.5 1-7.1 1.4-10.6-.6 4-1.7 7.8-3.2 11.5 1.3-3.2 2.7-6.4 4-9.6-1.7 4-3.9 7.7-6.6 11.2 2.1-2.7 4.2-5.4 6.3-8.1-2.5 3-5.2 5.8-8.2 8.2 2.7-2.1 5.4-4.2 8.1-6.3-3.5 2.7-7.2 4.8-11.2 6.6 3.2-1.3 6.4-2.7 9.6-4-3.7 1.5-7.6 2.5-11.5 3.2 3.5-.5 7.1-1 10.6-1.4C807.4 903.5 805.1 903.6 802.8 903.7c-10.3.1-20.9 4.4-28.3 11.7-6.9 6.9-12.2 18.3-11.7 28.3 1 21.4 17.6 40.3 40 40 38.9-.6 73.1-26 84.5-63.3 4.5-14.8 3.5-30.7 3.5-45.9 0-34.8 1.1-69.3-4.9-103.8-8.8-50.5-34.2-98-69-135.3-34.8-37.3-81.6-64.7-131.1-76.9-28.4-7-57-8.1-86-8.1-29.8 0-59.5 0-89.3 0-29.4 0-58.7 0-88.1 0-29.7 0-59.2 1.4-88.1 9.1-49.1 13-95.3 40.7-129.4 78.3-34.4 37.9-59.3 85.5-67.4 136.3-5.4 34.1-4.3 68.3-4.3 102.7 0 15.8-.9 32.3 4.8 47.4 7.4 19.4 19.2 34.7 36.5 46.2 13.5 8.9 30.6 13.2 46.6 13.4 7.8.1 15.6 0 23.4 0 20 0 39.9 0 59.9 0 28.4 0 56.7 0 85.1 0 33 0 66 0 99 0 33.9 0 67.7 0 101.6 0 31 0 61.9 0 92.9 0 24.3 0 48.6 0 72.8 0 13.9 0 27.8 0 41.7 0 1.8 0 3.6 0 5.4 0 20.9 0 41-18.4 40-40C841.9 922 825.3 903.7 802.8 903.7z" />
                                                </svg>
                                                @{{ bibliographyHistory[0].user }}
                                            </p>
                                        </div>
                                    </div>
                              
                            </div>

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

                <p class="items-footer">
                    <a data-toggle="modal" data-target="."> Terms and conditions</a>
                    <a data-toggle="modal" data-target=".privacypolicy">Privacy Policy </a>
                    <a data-toggle="modal" data-target=".faq-modal">FAQ'S</a>
                    <a href="{{ url('/about') }}">About wikiPBL</a>
                </p>
                <span class="copy-footer"> © 2021 Copyrights <strong>wikiPBL</strong> </span>
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
                weeks: parseInt("{{ $project[0]->number_of_weeks }}"),
                slides: 1,
                currentSlide: 1,
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
                likes: parseInt("{{ App\Like::where('project_id', $project[0]->id)->count() }}"),
                assestmentArray: JSON.parse('{!! $assestmentPointsArray !!}'),
                loading: false,
                myChart: null,
                labels: [],
                values: [],

                institutions: [],
                selected_institution: "",
                institution_not_registered: false,
                name: "",
                lastname: "",
                email: "",
                institution_email: "",
                password: "",
                password_confirmation: "",
                step: 1,
                errors: [],
                forgotPasswordErrors: [],
                loading: false,
                admin_institution_name: "",
                admin_institution_lastname: "",
                admin_institution_email: "",
                admin_institution_phone: "",
                admin_institution_password: "",
                admin_institution_password_confirmation: "",
                institution_name: "",
                institution_website: "",
                institution_email: "",
                institution_type: "",
                user: null,
                login_email: "",
                login_password: "",
                showInstitutionStepForm: false,
                stepForm: 1,
                countries: [],
                selectedCountry: "",
                states: [],
                selectedState: "",
                gender_institution_type: "",
                lowest_age: "",
                highest_age: "",
                part_of_network_institution: 'true',
                institution_public_or_private: "public",
                students_enrolled: "0-100",
                faculty_members: "0-50",
                which_network: "",
                forgotPasswordEmail: "",
                likes: parseInt("{{ App\Like::where('project_id', $project[0]->id)->count() }}"),
                backgroundColorChart: [],

                titleHistory: "",
                drivingQuestionHistory: "",
                timeFrameHistory: "",
                publicProjectHistory: "",
                mainInfoHistory: "",
                bibliographyHistory: "",
                subjectHistory: "",
                levelHistory: "",
                hashtagHistory: "",
                calendarActivitiesHistory: "",
                projectSumaryHistory: "",
                toolHistory: "",
                learningGoalHistory: "",
                resourceHistory: "",
                projectMilestoneHistory: "",
                expertHistory: "",
                fieldWorkHistory: "",
                globalConnectionHistory: "",

                unseenNotificationsCount: 0,
                notifications: [],
                problemErrors: [],
                problemEmail: "",
                problemName: "{{ \Auth::check() ? \Auth::user()->name : '' }}",
                problemDescription: ""
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
                    $("#followIcon").css("fill", "#000")
                } else {
                    this.follow = "1"
                    $("#followIcon").css("fill", "#4674b8")
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

                    $("#likeIcon").css("fill", "#000")


                } else {
                    this.like = "1"
                    this.likes = this.likes + 1

                    $("#likeIcon").css("fill", "#4674b8")

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

                    $("#reportIcon").css("fill", "#000")

                } else {
                    this.report = "1"

                    $("#reportIcon").css("fill", "#f44336")

                }
            },
            drawChart() {

                const backgroundColorArray = [
                    "#1abc9c",
                    "#2ecc71",
                    "#3498db",
                    "#9b59b6",
                    "#e74c3c",
                    "#f1c40f",
                    "#FDA7DF"
                ]
                this.labels = []
                this.values = []

                this.assestmentArray.forEach((data, index) => {

                    this.labels.push(data.name)
                    this.values.push(data.value)


                })

                var ctx = document.getElementById("myChart").getContext('2d');

                if (this.myChart != undefined || this.myChart != null) {
                    this.myChart.destroy();
                }

                this.myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            data: this.values,
                            borderColor: "rgb(0,0,200)",
                            backgroundColor: "rgba(0,0,200,0.2)",
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                        },
                        responsive: true,
                        scale: {
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    } else {
                                        return "";
                                    }
                                },
                            }
                        }

                        /*scales: {
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
                        }*/
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

            },
            nextSlide() {

                $("#carouselExampleControls").carousel('next')
                $('.carousel').carousel('pause');
                if (this.currentSlide < this.slides) {
                    this.currentSlide++
                } else {
                    this.currentSlide = 1
                }
            },
            previousSlide() {
                $("#carouselExampleControls").carousel('prev')
                $('.carousel').carousel('pause');
                if (this.currentSlide > 1) {
                    this.currentSlide--
                } else {
                    this.currentSlide = this.slides
                }
            },
            next(form = "teacher") {

                if (form == "institution") {
                    if (this.validateNextStepInstitution()) {
                        this.stepForm++
                    }

                } else {
                    this.step++
                }

            },
            previous(form = "teacher") {

                if (form == "institution") {
                    if (this.stepForm - 1 > 0) {
                        this.stepForm--
                    }
                } else {
                    if (this.step - 1 > 0) {
                        this.step--
                    }
                }
            },
            fetchCountries() {

                axios.get("{{ url('/countries/fetch') }}").then(res => {

                    this.countries = res.data.countries

                })

            },
            fetchStates() {

                axios.get("{{ url('/states/fetch/') }}" + "/" + this.selectedCountry).then(res => {

                    this.states = res.data.states

                })

            },
            fetchAllInstitutions() {

                axios.get("{{ url('/institutions/fetchAll') }}").then(res => {

                    this.institutions = res.data.institutions;

                })

            },
            resetRegistrationForm() {

                this.step = 1;
                this.selected_institution = ""
                this.name = ""
                this.lastname = ""
                this.email = ""
                this.institution_email = ""
                this.password = ""
                this.password_confirmation = ""
                this.user = null
                this.institution_not_registered = false
                this.institution_name = ""
                this.institution_contact_email = ""
                this.institution_website = ""

            },
            resetInstitutionRegistrationForm() {

                this.admin_institution_name = ""
                this.admin_institution_lastname = ""
                this.admin_institution_email = ""
                this.admin_institution_phone = ""
                this.admin_institution_password = ""
                this.admin_institution_password_confirmation = ""
                this.institution_name = ""
                this.institution_website = ""
                this.institution_type = ""

            },
            login() {

                this.loading = true
                this.errors = []

                axios.post("{{ url('/login') }}", {
                    "login_email": this.login_email,
                    "login_password": this.login_password
                }).then(res => {

                    this.loading = false
                    if (res.data.success == true) {



                        window.location.reload()


                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })

                    }

                }).catch(err => {
                    this.loading = false
                    this.errors = err.response.data.errors
                })
            },
            teacherRegister() {

                this.errors = []

                if (this.validateTeacherRegister()) {

                    let form = new FormData
                    form.append("name", this.name)
                    form.append("email", this.email)
                    form.append("lastname", this.lastname)
                    form.append("institution_email", this.institution_email)
                    form.append("password", this.password)
                    form.append("password_confirmation", this.password_confirmation)
                    form.append("institution_id", this.selected_institution.id)
                    form.append("institution_not_registered", this.institution_not_registered)
                    form.append("institution_name", this.institution_name)
                    form.append("institution_contact_email", this.institution_contact_email)
                    form.append("institution_website", this.institution_website)

                    this.loading = true

                    axios.post("{{ url('/register') }}", form).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            this.resetRegistrationForm()
                            this.user = res.data.user

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {


                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                                $('#mensaje').modal('show')

                            })


                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false
                        this.errors = err.response.data.errors
                    })
                }

            },
            institutionRegister() {

                this.errors = []

                if (this.validateInstitutionRegister()) {

                    this.loading = true

                    let formData = new FormData;
                    formData.append("admin_institution_name", this.admin_institution_name)
                    formData.append("admin_institution_lastname", this.admin_institution_lastname)
                    formData.append("admin_institution_email", this.admin_institution_email)
                    formData.append("admin_institution_phone", this.admin_institution_phone)
                    formData.append("admin_institution_password", this.admin_institution_password)
                    formData.append("admin_institution_password_confirmation", this
                        .admin_institution_password_confirmation)
                    formData.append("institution_name", this.institution_name)
                    formData.append("institution_website", this.institution_website)
                    formData.append("institution_type", this.institution_type)

                    axios.post("{{ url('/institution-register') }}", formData).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            this.resetInstitutionRegistrationForm()
                            this.user = res.data.user

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {



                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                                $('#mensaje').modal('show')

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false
                        this.errors = err.response.data.errors
                    })

                }

            },
            validateTeacherRegister() {

                if (!this.institution_not_registered) {

                    //console.log("institution_email", this.institution_email.toLowerCase())
                    //console.log("website", this.selected_institution.website.toLowerCase().replace("www.", "").replace("https", "").replace("http", "").replace("://", ""))
                    let domain = null
                    //console.log("test", this.isURL(this.selected_institution.website.toLowerCase()))

                    try {
                        domain = new URL(this.selected_institution.website.toLowerCase()).hostname
                    } catch {

                        domain = this.selected_institution.website.toLowerCase()

                    }

                    if (this.institution_email.toLowerCase().indexOf(domain.toLowerCase().replace("www.", "").replace("https", "").replace("http", "").replace("://", "")) < 0) {

                        swal({
                            text: "Institution website and your institution email doesn't match",
                            icon: "warning"
                        })

                        return false

                    }

                }

                if (this.institution_not_registered) {

                    if (this.institution_name == "") {
                        swal({
                            text: "Institution name is required",
                            icon: "warning"
                        })

                        return false
                    } else if (this.institution_contact_email == "") {
                        swal({
                            text: "Institution contact email is required",
                            icon: "warning"
                        })

                        return false
                    } else if (this.institution_website == "") {
                        swal({
                            text: "Institution website is required",
                            icon: "warning"
                        })

                        return false
                    }

                }


                if (this.name == "") {

                    swal({
                        text: "Name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.lastname == "") {

                    swal({
                        text: "Lastname is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.email == "") {

                    swal({
                        text: "Email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_email == "") {

                    swal({
                        text: "Institution email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.password == "") {

                    swal({
                        text: "Password is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.password_confirmation != this.password) {

                    swal({
                        text: "Passwords don't match",
                        icon: "warning"
                    })

                    return false

                }

                return true



            },
            validateInstitutionRegister() {

                if (this.admin_institution_name == "") {

                    swal({
                        text: "Name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_lastname == "") {

                    swal({
                        text: "Lastname is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_email == "") {

                    swal({
                        text: "Email is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_phone == "") {

                    swal({
                        text: "Phone is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_password == "") {

                    swal({
                        text: "Password is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.admin_institution_password != this
                    .admin_institution_password_confirmation) {

                    swal({
                        text: "Password don't match",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_type == "") {

                    swal({
                        text: "Institution type is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_name == "") {

                    swal({
                        text: "Institution name is required",
                        icon: "warning"
                    })

                    return false

                } else if (this.institution_website == "") {

                    swal({
                        text: "Institution website is required",
                        icon: "warning"
                    })

                    return false

                }

                return true

            },
            resendEmail() {
                this.loading = true
                axios.post("{{ url('/resend-email') }}", {
                    id: this.user.id
                }).then(res => {
                    this.loading = false
                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        });

                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        });

                    }

                }).catch(err => {

                    this.loading = false
                })

            },
            isNumber(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
                    evt.preventDefault();;
                } else {
                    return true;
                }
            },
            validateNextStepInstitution() {

                if (this.institution_type == "school" || this.institution_type == "university") {

                    if (this.selectedCountry == "" || this.selectedState == "" || this
                        .gender_institution_type == "" || this.lowest_age == "" || this.highest_age == "") {
                        return false
                    }

                } else if (this.institution_type == "organization") {

                    if (this.selectedCountry == "" || this.selectedState == "" || this.lowest_age == "" ||
                        this.highest_age == "") {
                        return false
                    }

                }

                return true

            },
            validateFirstUpdateInstitution() {

                if (this.institution_type == "school" || this.institution_type == "university") {

                    if (this.part_of_network_institution == "true" && this.which_network == "") {
                        swal({
                            text: "Institution network is required",
                            icon: "error"
                        })

                        return false
                    } else if (this.institution_public_or_private == "") {

                        swal({
                            text: "Public or private institution?",
                            icon: "error"
                        })

                        return false

                    } else if (this.students_enrolled == "") {

                        swal({
                            text: "Stundents enrolled is required",
                            icon: "error"
                        })

                        return false

                    } else if (this.faculty_members == "") {

                        swal({
                            text: "Faculty members is required",
                            icon: "error"
                        })

                        return false
                    }

                } else if (this.institution_type == "organization") {

                    if (this.institution_public_or_private == "") {

                        swal({
                            text: "Public or private institution?",
                            icon: "error"
                        })

                        return false
                    }

                }

                return true

            },
            institutionFirstUpdate() {

                if (this.validateFirstUpdateInstitution()) {

                    this.loading = true

                    let form = new FormData;
                    form.append("country_id", this.selectedCountry)
                    form.append("state_id", this.selectedState)
                    form.append("gender_institution_type", this.gender_institution_type)
                    form.append("lowest_age", this.lowest_age)
                    form.append("highest_age", this.highest_age)
                    form.append("part_of_network_institution", this.part_of_network_institution)
                    form.append("which_network", this.which_network)
                    form.append("institution_public_or_private", this.institution_public_or_private)
                    form.append("students_enrolled", this.students_enrolled)
                    form.append("faculty_members", this.faculty_members)

                    axios.post("{{ url('/institution/first-update') }}", form).then(res => {

                        this.loading = false

                        if (res.data.success == true) {

                            swal({
                                text: res.data.msg,
                                icon: "success"
                            }).then(res => {

                                $(".modalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                            })

                        } else {

                            swal({
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    }).catch(err => {

                        this.loading = false

                    })

                }

            },
            restorePassword() {
                this.errors = []
                axios.post("{{ url('/password/send-email') }}", {
                    "email": this.forgotPasswordEmail
                }).then(res => {

                    if (res.data.success == true) {

                        $(".modalClose").click();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '0px');
                        $('.modal-backdrop').remove();

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        });

                    }

                }).catch(err => {

                    this.loading = false
                    this.forgotPasswordErrors = err.response.data.errors

                })

            },
            forgotPasswordShowModal() {

                $(".modalClose").click();
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '0px');
                $('.modal-backdrop').remove();

                $(".forgotPassword").modal('show')

            },
            checkInstitution() {

                window.setTimeout(() => {
                    if (this.institution_not_registered == true) {
                        this.selected_institution = ""
                    }
                }, 200)

            },
            scrollTo(identifier) {

                let distance = $("#" + identifier).offset().top - 120

                $('html, body').animate({
                    scrollTop: distance
                }, 50);

            },
            setSeenNotifications() {

                this.unseenNotificationsCount = 0
                axios.post("{{ url('/notification/seen') }}").then(res => {


                })

            },
            getNotifications() {
                this.unseenNotificationsCount = 0
                axios.get("{{ url('/notification/last') }}").then(res => {

                    this.notifications = res.data.notifications

                    this.notifications.forEach((data) => {

                        if (data.is_seen == 0) {
                            this.unseenNotificationsCount++
                        }

                    })

                })

            },
            reportProblem() {

                this.loading = true
                this.problemErrors = []
                axios.post("{{ url('/problem-report') }}", {
                    "email": this.problemEmail,
                    "name": this.problemName,
                    "description": this.problemDescription,
                    "url": "{{ url()->current() }}"
                }).then(res => {
                    this.loading = false
                    if (res.data.success == true) {

                        swal({
                            text: res.data.msg,
                            icon: "success"
                        })

                        this.problemEmail = ""
                        this.problemName = ""
                        this.problemDescription = ""

                        $(".problems-modal").modal("hide")
                        $('.modal-backdrop').remove();

                    } else {

                        swal({
                            text: res.data.msg,
                            icon: "error"
                        })

                    }

                }).catch(err => {
                    this.loading = false
                    this.problemErrors = err.response.data.errors
                })


            },


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
            console.log("mile", milestone)
            if (milestone != '') {
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
                $("#reportIcon").css("fill", "#f44336")
            }

            this.fetchAllInstitutions()

            if (this.showInstitutionStepForm == 1) {
                $(".stepFormModal").modal('show')
                this.fetchCountries()
            }

            @if(\Auth::check())
            if ("{{ \Auth::check() }}" == "1") {

                this.institution_type = "{{ \Auth::user()->institution ? \Auth::user()->institution->type : ''  }}"

            }
            @endif

            this.drawChart()

            this.titleHistory = JSON.parse('{!! $titleHistory !!}')
            this.drivingQuestionHistory = JSON.parse('{!! $drivingQuestionHistory !!}')
            this.timeFrameHistory = JSON.parse('{!! $timeFrameHistory !!}')
            this.publicProjectHistory = JSON.parse('{!! $publicProjectHistory !!}')
            this.mainInfoHistory = JSON.parse('{!! $mainInfoHistory !!}')
            this.bibliographyHistory = JSON.parse('{!! $bibliographyHistory !!}')
            this.subjectHistory = JSON.parse('{!! $subjectHistory !!}')
            this.levelHistory = JSON.parse('{!! $levelHistory !!}')
            this.hashtagHistory = JSON.parse('{!! $hashtagHistory !!}')
            this.calendarActivitiesHistory = JSON.parse('{!! $calendarActivitiesHistory !!}')
            this.projectSumaryHistory = JSON.parse('{!! $projectSumaryHistory !!}')

            this.toolHistory = JSON.parse('{!! $toolHistory !!}')
            this.learningGoalHistory = JSON.parse('{!! $learningGoalHistory !!}')
            this.resourceHistory = JSON.parse('{!! $resourceHistory !!}')
            this.projectMilestoneHistory = JSON.parse('{!! $projectMilestoneHistory !!}')
            this.expertHistory = JSON.parse('{!! $expertHistory !!}')
            this.fieldWorkHistory = JSON.parse('{!! $fieldWorkHistory !!}')
            this.globalConnectionHistory = JSON.parse('{!! $globalConnectionHistory !!}')

            this.slides = Math.ceil("{{ $project[0]->number_of_weeks }}" / 4)

            this.getNotifications()

        }

    })
</script>
<!-- Modal FAQ -->
  <div class="modal fade faq-modal " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-center">
                        <h3>FAQ’S </h3>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Can I delete my wikiPBL once I have started the development process?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder. You can delete this wikiPBL any time. However, once you have published your wikiPBLfor shared development and use by others, it lives in two distinct and independent places: your personal folder and the public space. Once published to the public space, you will be unable to delete this version of the wikiPBL. However, you can still delete the version of the wikiPBL that lives in your personal folder. In other words, once you share a wikiPBL, the shared version cannot be deleted.</p>
                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q: Will I retain ownership of my wikiPBL once I publish it?</p>
                        <p>A: You will always be credited as the Original Poster (OP) of any wikiPBL you initiate or publish (including incubator wikiPBLs.) Resource sharing is a core philosophy at wikiPBL. Once a wikiPBL is published (in any stage of completion), it will become free to use and edit by our wikiPBL community.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Do I have to be associated with a school to use wikiPBL? What if I am a freelance educator or private tutor?</p>
                        <p>A: wikiPBL is a closed community (for safety reasons) intended for educators. You don’t have to be a associated with a school so if you are an educator outside of a school please send us an email at info@wikipbl.org </p>
                    </div>



                    <div class="mt-5 mb-5">
                        <p> Q: Can I share my wikiPBL without letting people edit it?</p>
                        <p>A: Yes you can by selecting “view only,” however the goal of wikiPBL is to encourage shared project development and open resource sharing. You will always have access to the original version of your wikiPBL (which will live in your personal folder), and you can edit on your own. Remember you can always use the ideas others suggest for your project for your own personal version, which can remain unpublished, but we encourage you to share your genius with others as well.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p> Q: Why will my wikiPBL make my projects better?</p>
                        <p>A: Your project ideas will benefit from suggestions by users around the world with varying levels of expertise, and a variety of experiences.</p>

                    </div>
                    <div class="mt-5 mb-5">
                        <p>Q. Can I have a private wikiPBL that no one can see?</p>
                        <p>A: Any wikiPBL you develop lives initially in your personal folder which only you can see. You can edit or delete this wikiPBL at any time.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade tyc " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-center">
                    <h3>Terms & Conditions - Privacy Policy </h3>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
                <div class="mt-5 mb-5">
                    <p><strong>Term 1</strong></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam ipsa, pariatur ex a saepe voluptas perferendis, fuga adipisci placeat eligendi tenetur amet! Inventore recusandae tempora quibusdam cumque asperiores deserunt voluptas.</p>
                </div>
            </div>
        </div>
        @endpush