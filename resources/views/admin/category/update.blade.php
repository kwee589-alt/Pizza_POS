@extends('admin.layouts.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category List</h1>

        </div>

        <div class="">
            <div class="row">
                <div class="col-4 offset-2 ">

                    <a href="{{ route('category#listCategory') }}" class="btn btn-sm bg-primary text-white mb-3">Back</a>

                    <div class="card">
                        <div class="card-body shadow">
                            <form action="{{ route('category#updatePage', $category->category_id) }}" class="p-3 rounded"
                                method="post">
                                @csrf
                                <input type="text" value="{{ old('categoryName', $category->title) }}"
                                    class="form-control  @error('categoryName')
                                    is-invalid @enderror"
                                    name="categoryName" placeholder="Category Name ...">

                                @error('categoryName')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror

                                <input type="submit" class="btn btn-outline-primary mt-3" value="Create" id="">
                            </form>
                        </div>
                    </div>
                </div>

                {{-- <div class="col">

                    <table class="table table-hover  table-bordered border text-center shadow-sm">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->created_at->format('j-F-Y') }}</td>
                                    <td>
                                        <a href="{{ route('category#updatePage', $item->category_id) }}"><i
                                                class="fas fa-pen-to-square btn btn-sm btn-outline-primary"></i></a>
                                        <a href="{{ route('category#delete', $item->category_id) }}"
                                            class="btn btn-sm  btn-outline-danger"><i class="fas fa-trash "></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <span class="d-flex justify-end text-black">{{ $categories->links() }}</span>
                </div> --}}

            </div>
        </div>


    </div>
@endsection
