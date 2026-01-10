@extends('user.layouts.master')


@section('content')
    <div class="container " style="margin-top: 150px">
        <div class="row">
            <div class="card col-12 shadow-sm"
                style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);">
                <div class="card-body">
                    <div class="row">

                        

                        <div class="col-5">
                            <div class="card text-white"
                                style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="card-header">
                                    <div class="card-body">
                                        <h5 class="mb-4">Contact Me</h5>

                                        <div class="col-5">



                                            <div class="">
                                                <b></b> ( Name : U Mg Mg (Office Manager) )
                                            </div>

                                            Account : 09444777888



                                        </div>


                                        Email : pizzahunter@gmail.com


                                        <div>
                                            Address: MoKaungPagoda(14-BC),No-2,MinMaHaw Road,Yangon.
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col">
                            <div class="card text-white shadow-sm"
                                style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);">
                                <div class="card-header">
                                    Contact Info
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <form action="{{ route('userList#contactCreate') }}" method="post"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <div class="row mt-4">
                                                <div class="col">
                                                    <input type="text" name="name" id="" readonly
                                                        value="{{ Auth::user()->name }}" readonly class="form-control "
                                                        style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);"
                                                        placeholder="User Name...">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="phone" id="" value=""
                                                        style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);"
                                                        class="form-control " placeholder="09xxxxxxxx">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="address" id="" value=""
                                                        style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);"
                                                        class="form-control " placeholder="Address...">
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-8">
                                                    <textarea type="text" name="reason" id="" value="" class="form-control "
                                                        style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);"
                                                        placeholder="Reason..."></textarea>
                                                </div>
                                                {{-- <div class="col-4">
                                                    <input type="file" name="contactImage" id=""
                                                        class="form-control ">
                                                </div> --}}
                                            </div>



                                            <div class="row mt-4 mx-2">
                                                <button type="submit" class="btn btn-outline-success w-100"
                                                    style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);"><i
                                                        class="fa-solid fa-paper-plane"></i> Send
                                                    Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
