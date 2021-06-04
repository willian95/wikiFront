<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="{{ url('/assets/css/style.css') }}">
    </head>
    <body>
        
    <a href="{{ url('/') }}">
        <img src="https://www.wikipbl.org/assets/img/logo.png" alt="" style="150px;">
    </a>

        <h3 class="titulo-templates">
                        
            <span>{!! htmlspecialchars_decode($title) !!}</span> 
        </h3>
        <p>By: {{ $project->user->name }} {{ $project->user->lastname }}</p>
        
        
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($drivingQuestionTitle) !!}</h3>
        
        {!! $drivingQuestion !!}
        
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($subjectTitle) !!}</h3>
        
        <p>{!! htmlspecialchars_decode($subjects) !!}</p>
        
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($timeFrameTitle) !!}</h3>
        <p>{!! htmlspecialchars_decode($timeFrame) !!}</p>
        
        <h3 class="titulo-templates">Project summary</h3>
        {!! $projectSumary !!}
        
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($publicProductTitle) !!}</h3>
        {!! $publicProduct !!}
        
        <h3 class="titulo-templates" >{!! htmlspecialchars_decode($levelTitle) !!}</h3>

  
                
        <p>{{ json_decode($level)->level }}</p>


        <p>Ages</p>
        
        <p>
            @foreach(json_decode($level)->ages as $age)
                {{ $age }}
                @if($loop->index < count(json_decode($level)->ages)-1)
                    ,
                @endif
            @endforeach
        </p>



        @if($tools != "")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode($toolsTitle) !!}</h3>
            <p>
                {!! htmlspecialchars_decode($tools) !!}
            </p>
        @endif

        @if($learningGoals != "")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode($learningGoalsTitle) !!}</h3>
            
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $learningGoalCount = 0;
                        $ignoreCount = false;
                    @endphp
                    
                    @foreach(json_decode($learningGoals) as $learningGoal)

                        @if($learningGoalCount == 0)
                            <tr>
                            @php
                                $ignoreCount = false;
                            @endphp
                        @endif

                        @if($learningGoalCount < 2)
                            <td>
                                <h4>{!! htmlspecialchars_decode($learningGoal->title) !!}</h4>
                                <div>
                                    {!! $learningGoal->body !!}
                                </div>
                            </td>
                        @endif

                        @if($learningGoalCount == 1)
                            </tr>
                            @php
                                $learningGoalCount = 0;
                                $ignoreCount = true;
                            @endphp
                        @endif
                        
                        @if($ignoreCount == false)
                            @php
                                $learningGoalCount++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>

        @endif

        @if($resources != "")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode($resourcesTitle) !!}</h3>
            <div>{!! $resources !!}</div>
        @endif

        @if($projectMilestones != "" && $projectMilestones != "[]")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode($projectMilestonesTitle) !!}</h3>
            
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $projectMilestoneCount = 0;
                        $ignoreCount = false;
                    @endphp
                    
                    @foreach(json_decode($projectMilestones) as $projectMilestone)

                        @if($projectMilestoneCount == 0)
                            <tr>
                            @php
                                $ignoreCount = false;
                            @endphp
                        @endif

                        @if($projectMilestoneCount < 2)
                            <td>
                                <h4>{!! htmlspecialchars_decode($projectMilestone->title) !!}</h4>
                                <div>
                                    {!! $projectMilestone->body !!}
                                </div>
                            </td>
                        @endif

                        @if($projectMilestoneCount == 1)
                            </tr>
                            @php
                                $projectMilestoneCount = 0;
                                $ignoreCount = true;
                            @endphp
                        @endif
                        
                        @if($ignoreCount == false)
                            @php
                                $projectMilestoneCount++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>

        @endif
        
        <h3 class="titulo-templates">#hashtags</h3>
        <p>
            {!! htmlspecialchars_decode($hashtag) !!}
        </p>
        
        {!! $mainInfo !!}

        
        <h3 class="titulo-templates">Calendar of activities</h3>
        
        <table style="width: 100%">
            <thead>
                <tr style="width: 100%">
                    <th></th>
                    <th>Day 1</th>
                    <th>Day 2</th>
                    <th>Day 3</th>
                    <th>Day 4</th>
                    <th>Day 5</th>
                </tr>
            </thead>
            <tbody>

                
                @for($week = 1; $week <= $numberOfWeeks; $week++)
                    <tr style="width: 100%">
                        <td>Week {{ $week }}</td>
                        @for($day = 1; $day <= 5; $day++)
                            <td>
                                @foreach($calendarActivities as $activity)
                                    @if($activity->week == $week && $activity->day == $day)
                                        {{ $activity->description }}
                                    @endif
                                @endforeach
                            </td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>

       



        @if($fieldWork != "")
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($fieldWorkTitle) !!}</h3>
        <div>{!! $fieldWork !!}</div>
        @endif

        @if($globalConnections != "")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode($globalConnectionsTitle) !!}</h3>
            <div>{!! $globalConnections !!}</div>
        @endif

        <h3 class="titulo-templates">Bibliography</h3>
        {!! $bibliography !!}

        <footer class="footer-estyle">
            <div class="footer container mt-5 text-center">
                <p class="text-dark"> <a>Privacy Policy </a> - <a >Terms & Conditions</a> - <a >About wikiPBL</a> - 2021
                Copyrights - Contact us! </p>
            </div>
        </footer>


    </body>

</html>

