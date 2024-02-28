@extends('admin.layouts.master')
@section('content')
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">

                <table class="table table-success table-striped align-middle table-nowrap mb-0">
                    <thead>
                        <!-- Buttons with Label -->
                        <div class="my-3">
                            <a href="{{ url('admin/subcategories/create') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>Add</button>
                            </a>
                        </div>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($subcategories as $subcategory)
                            <tr>
                                <th scope="row">{{ $subcategory->id }}</th>
                                <th>{{ $subcategory->name }}</th>
                                <th>{{ $subcategory->category->name }}</th>

                                <td>
                                    @if ($subcategory->image != null)
                                        <img src="{{ asset('images/' . $subcategory->image) }}"
                                            class="img-thumbnail shadow-sm rounded" style="height: 60px">
                                    @else
                                        <img src="{{ asset('defaultImage/index.jpeg') }}"
                                            class="img-thumbnail shadow-sm rounded" style="height: 60px">
                                    @endif
                                </td>
                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ url('admin/subcategories/' . $subcategory->id . '/edit') }}"
                                            href="javascript:void(0);" class="link-success fs-15">
                                            <i class="ri-edit-2-line"></i>
                                        </a>
                                        <div class="remove">
                                            <form action="{{ url('admin/subcategories/' . $subcategory->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background-color: transparent; border:none;"
                                                    class="link-danger fs-15">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $subcategories->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
