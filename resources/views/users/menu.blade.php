

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand" href="#">Users</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <span class="navbar-text">
                    enter user count:
                </span>

                <li class="nav-item" id="setCount">

                    <input class="form-control mr-md-1" type="number" min="0" max="{{$count}}" step="1" placeholder="0 - {{$count}}" aria-label="count" id="usersCount">

                </li>

                <li class="nav-item">
                    <button type="button" class="btn btn-light" type = "button" id="showUsers">GO!</button>
                </li>

            </ul>
        </div>
    </nav>



