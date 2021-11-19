<nav class="navbar navbar-expand-lg navbar-white bg-white sticky-top">
    <a class="navbar-brand" href="#">
        <img src="/img/7.png" class="img-rounded" width="100%" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <form class="d-flex">
            <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <div class="collapse navbar-collapse">
        <a href="/"><i class="fa fa-home" style="font-size:28px"></i></a>
    </div>
    <div class="mr-2">
        <img src="{{asset ('img/profil/' . auth()->user()->profil->foto)}}" width="30px;" alt="">
    </div>

    <span class="navbar-text mr-4 font-weight-bold">
        {{auth()->user()->name;}}
    </span>
    <div class="btn-group">
        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item font-weight-bold" href="/edit/{{auth()->user()->id}}"><i class="fa fa-edit"></i>
                Edit Profil</a>
            <a class="dropdown-item font-weight-bold" href="/editpassword/{{auth()->user()->id}}"><i
                    class="fa fa-unlock-alt"></i> Ganti Sandi</a>
            <a class="dropdown-item font-weight-bold" href="/logout"><i class="fa fa-reply"></i> LogOut</a>
        </div>

    </div>
</nav>