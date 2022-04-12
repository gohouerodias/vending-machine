@extends('app')

@section('title', 'profile room')


@section('content')
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

    <div class="container-fluid">
        <h3 class="text-dark mb-4">{{ $room->name }}</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <!--<img class="rounded-circle mb-3 mt-4"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                src="assets/img/product%20icon.png" width="160" height="160">-->
                        <svg width="150" height="150" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 19C12.5523 19 13 18.5523 13 18C13 17.4477 12.5523 17 12 17C11.4477 17 11 17.4477 11 18C11 18.5523 11.4477 19 12 19Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15 13.9997C16.2144 14.9119 17 16.3642 17 18C17 20.7614 14.7614 23 12 23C9.23858 23 7 20.7614 7 18C7 16.3642 7.78555 14.9119 9 13.9997V4C9 2.34315 10.3431 1 12 1C13.6569 1 15 2.34315 15 4V13.9997ZM13 4V15.1707C14.1652 15.5826 15 16.6938 15 18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18C9 16.6938 9.83481 15.5826 11 15.1707V4C11 3.44772 11.4477 3 12 3C12.5523 3 13 3.44772 13 4Z"
                                fill="currentColor" />
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
                                <p class="text-primary m-0 font-weight-bold">Room information</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('update_room/' . $room->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="productname"><strong>Room
                                                        name</strong></label>
                                                <input class="form-control" type="text" value="{{ $room->nom }}"
                                                    name="name" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="description"><strong>Description</strong><br></label><input
                                                    class="form-control" type="text" name="description"
                                                    value="{{ $room->description }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">
                                            Update data</button></div>
                                </form>
                            </div>
                        </div>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> Indicates a successful or positive action.
                        </div>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong> product insufficient
                        </div>


                    </div>

                </div>
            </div>
        </div>

    @endsection
