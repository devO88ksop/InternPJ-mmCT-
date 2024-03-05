@extends('admin.layouts.master')
@section('content')
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">

                <table class="table table-success table-striped align-middle table-nowrap mb-0">
                    <thead>
                        <!-- Buttons with Label -->
                        <div class="my-3">
                            <a href="{{ url('admin/sliders/create') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                            </a>
                        </div>
                        <div class="my-3">
                            <a href="{{ url('ui/product') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>UI List</button>
                            </a>
                        </div>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>
                                    @if ($slider->image == null)
                                        <img src="{{ asset('defaultphoto/default-image.jpg') }}"
                                            style="width: 80px;height: 60px" class="round shadow-sm">
                                    @else
                                        <img src="{{ asset('images/' . $slider->image) }}" style="width: 80px;height: 50px"
                                            class="round shadow-sm">
                                    @endif
                                </td>

                                <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ url('admin/sliders/' . $slider->id . '/edit') }}"
                                            href="javascript:void(0);" class="link-success fs-15"> <i
                                                class="ri-edit-2-line"></i>
                                        </a>
                                        <div class="remove">
                                            <form action="{{ url('admin/sliders/' . $slider->id) }}" method="POST">
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
                {{-- <div class="mt-2">
            {{ $slider->links() }}
           </div> --}}

            </div>
        </div>
    </div>
@endsection
