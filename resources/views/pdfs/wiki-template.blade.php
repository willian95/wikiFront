<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="{{ url('/assets/css/style.css') }}">
    </head>
    <body>
        
        <h3 class="titulo-templates">
                        
            <span>{!! htmlspecialchars_decode($title) !!}</span> 
        </h3>
        
        
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
        <div class="row">
            <div class="col-md-4">
                
                {{ json_decode($level)->level }}
        
            </div>
            <div class="col-md-4">
                Ages
                
                <p>
                    @foreach(json_decode($level)->ages as $age)
                        {{ $age }}
                        @if($loop->index < count(json_decode($level)->ages)-1)
                            ,
                        @endif
                    @endforeach
                </p>
            </div>
        </div>

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
            <h3 class="titulo-templates">{!! htmlspecialchars_decode(resourcesTitle) !!}</h3>
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

        @if($fieldWork != "")
        <h3 class="titulo-templates">{!! htmlspecialchars_decode($fieldWorkTitle) !!}</h3>
        <div>{!! $fieldWork !!}</div>
        @endif

        @if($globalConnections != "")
            <h3 class="titulo-templates">{!! htmlspecialchars_decode(globalConnectionsTitle) !!}</h3>
            <div>{!! $globalConnections !!}</div>
        @endif

        <h3 class="titulo-templates">Bibliography</h3>
        {!! $bibliography !!}


    </body>

</html>

