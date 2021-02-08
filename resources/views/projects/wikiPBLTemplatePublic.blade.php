@extends("layouts.main")

@section("content")

<div class="container  main-template mt-5" id="own-template">

    <div class="row">
        <div class="col-md-3">
            <div class="menu-template">
                <p>Edit mode </p>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li> wikiPBL title</li>
                        <li> Driving Question</li>
                        <li> Subject</li>
                        <li> Time Frame</li>
                        <li>Project Summary</li>
                        <li> Public product</li>
                        <li> level title</li>
                        <li> #hashtags</li>

                    </ul>
                </div>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>

                    </ul>
                </div>
            </div>

        </div>
        <!----------------info----------------->
        <div class="col-md-9 info-template">

            <div class="row">
                <div class="col-md-2">
                    27 likes
                </div>
                <div class="col-md-2">
                    Follow
                </div>
                <div class="offset-md-2 col-md-6">
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <!--------------------general--------------------------->
            <ul class="content_template content_template-general">
                <li class="content_template-general-item">
                    <h3 class="titulo-templates">
                        
                        <span v-if="editSection != 'title'">WikiPBL Title</span> 
                    </h3>

                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Driving Queston</h3>
                    
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla erat nunc, semper non odio a, dignissim accumsan turpis. Nunc est dui, viverra at libero nec, congue volutpat leo. Integer eu neque magna. Nulla tristique tellus eget justo pharetra, non iaculis purus aliquam. Vivamus auctor lacinia blandit. Duis porta lobortis nisi id cursus. Phasellus molestie ullamcorper felis. Integer nulla dolor, posuere a purus ac, consequat rutrum elit. Curabitur a eros id tellus laoreet lobortis ut ac ante. Vivamus scelerisque ac dolor ut tempor. Nunc eu suscipit dui. Nam dictum lobortis arcu at scelerisque. Sed congue purus ac interdum aliquet. Proin quis lacus placerat, auctor lectus a, fringilla lacus.
                    </p>

                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>

                </li>
                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Subjects</h3>

                    <p>Math   Language</p>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Time Frame</h3>
                    <p>3 - 4 weeks</p>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Project summary</h3>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla erat nunc, semper non odio a, dignissim accumsan turpis. Nunc est dui, viverra at libero nec, congue volutpat leo. Integer eu neque magna. Nulla tristique tellus eget justo pharetra, non iaculis purus aliquam. Vivamus auctor lacinia blandit. Duis porta lobortis nisi id cursus. Phasellus molestie ullamcorper felis. Integer nulla dolor, posuere a purus ac, consequat rutrum elit. Curabitur a eros id tellus laoreet lobortis ut ac ante. Vivamus scelerisque ac dolor ut tempor. Nunc eu suscipit dui. Nam dictum lobortis arcu at scelerisque. Sed congue purus ac interdum aliquet. Proin quis lacus placerat, auctor lectus a, fringilla lacus.
                    </p>

                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Public Product (Individual and in Groups)</h3>
                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                    
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates" >@{{ levelTitle }}</h3>
                    <div class="row">
                        <div class="col-md-4">
                            
                                <p>Middle school</p>

                        </div>
                        <div class="col-md-4">
                            <p>05 - 12 years</p>

                        </div>
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">#hashtags</h3>
                    <p>#hashtags   #hashtags     #hashtags</p>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Tools/Software/Skills required</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                                Excel
                            </div>
                            <div class="col-md-2">
                                Mac OS
                            </div>

                            <div class="col-md-2">
                                Programming
                            </div>
                        </div>
                    </div>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Learning Goals</h3>
                    <p>Objective 1</p>
                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                    <p>Objective 2</p>
                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                </li>

                <li class="content_template-general-item">
                    <h3 class="titulo-templates">Resources</h3>
                    <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                </li>

            </ul>
            <!-----------------------END general------------------------>

            <div class="content_template">

                <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                </p>

                <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                </p>

                <p>
                    Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                </p>

                <div class="contente_item">
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
                        <div class="row" v-for="week in weeks">
                            <div class="col-md-2">Week @{{ week }}</div>
                            <div class="col-md-2" v-for="day in days" @click="setWeekAndDay(week, day)" data-toggle="modal" data-target="#calendarDescription">
                                <div class="card" style="cursor: pointer">
                                    <div class="card-body">
                                        @{{ showActivity(week, day) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="contente_item">
                    <h3 class="titulo-templates">Bibliography (mandatory)</h3>
                    <p>
                        Mauris tristique est sed arcu lobortis posuere. Integer dignissim velit vitae metus fermentum aliquet. Ut urna diam, cursus in magna nec, scelerisque congue enim. Praesent sed tortor lectus. Mauris eu mattis risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec mollis placerat mattis. Nulla congue ullamcorper velit, eu volutpat purus eleifend vitae. Phasellus vitae sapien vitae tortor auctor varius id vitae lacus. Fusce eget nibh tempor, mollis felis convallis, scelerisque nisl. Maecenas tempus orci ut ligula commodo, vitae suscipit augue vehicula. Quisque dignissim odio leo, at ultricies libero feugiat ultricies. Pellentesque bibendum ex convallis fringilla sagittis. Praesent auctor fermentum tellus, vitae sagittis ante vehicula ut. Pellentesque non mollis sapien. Nunc sit amet odio iaculis, ullamcorper arcu interdum, blandit sem.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@push("script")
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <script>
        const public = new Vue({
            el: '#own-template',
            data() {
                return {
                    calendarActivities:[
                        {
                            day:2,
                            week:1,
                            description:"activity 1"
                        },
                        {
                            day:4,
                            week:3,
                            description:"activity 2"
                        }
                    ],
                    activityDescription:"",
                    days:5,
                    weeks:4,
                }
            },
            methods:{

                showActivity(week, day){

                    
                    var activity = null
                    this.calendarActivities.forEach((data) => {

                        if(data.week == week && data.day == day){
                            activity = data
                        }

                    })

                    if(activity){
                        return activity.description
                    }

                }

            },
            mounted(){

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: ['Sustained Inquiry', 'Authenticity', 'Student voice & choice', 'Reflection', 'Critique & Revision', 'Public product', 'Challenging problem or question'],
                        datasets: [{
                            data: [12, 19, 3, 5, 2, 3, 2],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(68, 23, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(68, 23, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                            labels: {
                                fontColor: 'rgb(255, 99, 132)'
                            }
                        }
                    }
                });

            }

        })
    
    </script>

@endpush
