@extends('app')
@section('title', 'profile ')



@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img class="img-fluid" alt="Responsive image" src="images/{{ Auth::user()->image }}"
                            width="250" height="250">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-7">
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Profile information </p>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('updateprofile') }}" method="post">
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
                                            class="form-control" type="text" value="{{ Auth::user()->address }}"
                                            name="address">
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="Country"><strong>City</strong></label><input class="form-control"
                                                    type="text" value="{{ Auth::user()->country }}" name="country">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="tel"><strong>Phone
                                                        Number</strong></label><input class="form-control" type="tel"
                                                    value="{{ Auth::user()->phoneNumber }}" name="phoneNumber">
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
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <form action="{{ url('updatePassword') }}" method="post">
                                    @csrf
                                    <div class="form-group ">
                                        <label for="password"><strong>Old
                                                password</strong></label>
                                        <input class="form-control" type="password" name="password">

                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="new_pasword"><strong>New
                                                        password</strong></label><input class="form-control" type="text"
                                                    name="new_password"></div>
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
