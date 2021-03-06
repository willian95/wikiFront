<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link href="{{ url('/assets/css/style.css') }}">
    </head>
    <body>
        
        <a href="{{ url('/') }}">
            <img src="https://www.wikipbl.org/assets/img/logo.svg" alt="" style="200px;">
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
        

        
        <h3 class="titulo-templates">#hashtags</h3>
        <p>
            {!! htmlspecialchars_decode($hashtag) !!}
        </p>
        
        {!! $mainInfo !!}

        <h3 class="titulo-templates">Bibliography</h3>
        {!! $bibliography !!}


    </body>

</html>

