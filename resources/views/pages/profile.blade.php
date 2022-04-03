@extends('app')
@section('title', 'profile ')



@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <!--<img class="rounded-circle mb-3 mt-4"
                                                                                                                                                                                                src="assets/img/Screenshot%202022-02-17%20171714.png" width="160" height="160">-->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="160" height="160">
                            <path
                                d="M12 2.5a5.25 5.25 0 00-2.519 9.857 9.005 9.005 0 00-6.477 8.37.75.75 0 00.727.773H20.27a.75.75 0 00.727-.772 9.005 9.005 0 00-6.477-8.37A5.25 5.25 0 0012 2.5z">
                            </path>
                        </svg>
                        <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">User Settings</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('updateprofile') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="username"><strong>Username</strong></label><input
                                                    class="form-control" type="text" value="{{ Auth::user()->name }}"
                                                    name="name"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="email"><strong>Email
                                                        Address</strong></label><input class="form-control" type="email"
                                                    value="{{ Auth::user()->email }}" name="email"></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label for="address"><strong>Address</strong></label><input
                                            class="form-control" type="text" placeholder="Sunset Blvd, 38" name="address">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="city"><strong>City</strong></label><input class="form-control"
                                                    type="text" placeholder="Benin" name="city"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="tel"><strong>Phone
                                                        Number</strong></label><input class="form-control" type="tel"
                                                    value="+22997933988" name="tel">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Update
                                            profile</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Change your password</p>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group"><label for="Old_password"><strong>Old
                                                password</strong></label><input class="form-control" type="password"
                                            name="Old_password">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="New_pasword"><strong>New
                                                        password</strong></label><input class="form-control" type="text"
                                                    name="New_password"></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm"
                                            type="submit">Save&nbsp;Settings</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
