@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4 col">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Account Information ( <span class="text-danger">
                                Admin Role</span> )
                        </h6>
                    </div>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">

                            <img class="img-profile img-thumbnail" id="output"
                                src="{{ Auth::user()->profile != null ? Auth::user()->profile : asset('admin/img/undraw_profile.svg') }}">




                        </div>
                        <div class="col">

                            <div class="row mt-3">

                                <div class="col-2 h5">Name :</div>
                                <div class="col h5">
                                    {{ Auth::user()->name == null ? Auth::user()->nickname : Auth::user()->name }}
                                </div>

                            </div>


                            <div class="row mt-3">
                                <div class="col-2 h5">Email :</div>
                                <div class="col h5">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>




                            <div class="row mt-3">
                                <div class="col-2 h5">Phone :</div>
                                <div class="col h5">
                                    {{ Auth::user()->phone }}
                                </div>
                            </div>




                            <div class="row mt-3">
                                <div class="col-2 h5">Address :</div>
                                <div class="col h5">
                                    {{ Auth::user()->address }}
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-2 h5">Role :</div>
                                <div class="col h5">
                                    <span class="text-danger"> {{ Auth::user()->role }}</span>
                                </div>
                            </div>


                            <a href="{{ route('profile#changePasswordPage') }} " class="btn btn-primary mt-3 mr-2"><i
                                    class="fas fa-lock"></i> Change
                                Password</a>
                            <a href="{{ route('profile#profileEdit') }} " class="btn btn-primary mt-3"><i
                                    class="fas fa-edit"></i> Edit
                                Profile</a>





                        </div>





                    </div>



                </div>
        </div>
    </div>
    </form>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection
