@extends('user.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid mt-5 py-5 px-5 ">


        <!-- DataTales Example -->
        <div class="card shadow mt-5 col">
            <div class="card-header py-2">
                <div class="">
                    <div class="mt-3">
                        <h6 class="m-0 font-weight-bold text-primary">User Profile Edit ( <span class="text-danger">
                                {{ Auth::user()->role }} </span> )
                        </h6>
                    </div>
                </div>
            </div>
            <form action="{{ route('user#updateProfile') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-3 py-5 px-5">

                            <img class="img-profile img-thumbnail  " id="output"
                                src="{{ asset(Auth::user()->profile != null ? 'profile/' . Auth::user()->profile : 'admin/img/undraw_profile.svg') }}">


                            <input type="file" name="image" id=""
                                class="form-control mt-1  @error('image') is-invalid @enderror " onchange="loadFile(event)">

                            @error('image')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col  py-5 px-5">

                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-5">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Name</label>
                                        <input type="text" name="userName"
                                            value=" {{ old('userName', Auth::user()->name != null ? Auth::user()->name : Auth::user()->nickname) }}"
                                            class="form-control @error('userName') is-invalid @enderror"
                                            placeholder="Name...">

                                        @error('userName')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', Auth::user()->email) }}" placeholder="Email...">
                                        @error('email')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Phone</label>
                                        <input type="text" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', Auth::user()->phone) }}" placeholder="09xxxxxx">
                                        @error('phone')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="mb-5">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            Address</label>
                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address', Auth::user()->address) }}" placeholder="Address">
                                        @error('address')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="Edit Profile" class="btn btn-primary mt-3">
                        </div>



                    </div>

                </div>
        </div>
        </form>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection
