@extends('layout.mainlayout')
@section('content')

<div class="container mt-4">
    <div class="row">

        <ul class="dashboard">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="user/profile">Profile</a>
            </li>
            <li>
                <a href="/dashboard">Dashboard</a>
            </li>
            <li>
                <form method="post" action="{{route('logout')}}" class="nav-link2">
                    @csrf
                    <input type="submit"  value="Logout">
                </form>
            </li>
        </ul>

    </div>
</div>

@endsection