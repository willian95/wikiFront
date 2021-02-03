@extends("layouts.main")

@section("content")

<div class="container  main-template mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="menu-template">
                <p>Edit mode </p>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li> wikiPBL Title</li>
                        <li> Driving Question</li>
                        <li> Subject (s)</li>
                        <li> Time Frame</li>
                        <li>Project Summary</li>
                        <li> Public Product (Individual and in
                            Groups)</li>
                        <li> Level & Age</li>
                        <li> #hashtags</li>

                    </ul>
                </div>
                <div class="menu-template_option">
                    <ul>
                        <p>Main info</p>
                        <li><button class="btn btn-custom">Launch</button></li>

                    </ul>
                </div>
            </div>

        </div>
        <!----------------info----------------->
        <div class="col-md-9 info-template">
            <ul>
                <li>
                    <h3>wikiPBL Title</h3>
                    <a href="#">Click to edit </a>
                </li>

                <li>
                    <h3>Driving question</h3>
                    <p>(you can edit Driving question for whatever Title)</p>
                    <textarea name="" id="" cols="30" rows="10"></textarea>

                </li>
                <li>
                    <h3>Subject (s)</h3>
                    <p>(you can edit Subject(s) for whatever Title)</p>
                    <input type="text" placeholder="asdfg">
                    <div>
                        Subject (s)
                    </div>
                </li>

                <li>
                    <h3>Time Frame</h3>
                    <p>(you can edit Time Frame for whatever Title) </p>
                    <textarea name="" placeholder="3 Week - 5 hours a week
" id="" cols="30" rows="10"></textarea>
                </li>

                <li>
                    <h3>Project summary</h3>
                    <textarea name="" placeholder="This will be shown as a preview of your wikiPBL project.........
" id="" cols="30" rows="10"></textarea>
                </li>

                <li>
                    <h3>Public Product
                        (Individual and in
                        Groups)</h3>
                    <p>(you can edit this for whatever Title)
                    </p>
                </li>

                <li>
                    <h3>Level</h3>
                    <p>(you can edit this for whatever Title)
                    </p>
                </li>
            </ul>
        </div>
    </div>
</div>




@endsection
