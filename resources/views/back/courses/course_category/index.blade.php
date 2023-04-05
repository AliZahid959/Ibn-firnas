@extends('back.layout.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">All Categories</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div>
                        <table id="product_table" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sr_no = 1;
                                @endphp
                                @foreach ($course_categories as $item)
                                    <tr>
                                        <td>{{ $sr_no++ }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>
                                            <span class="{{$item->status}}">{{$item->status}}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm w-50" style="background: #fff; border:1px solid #696cff;"
                                                href="{{ route('course-category.edit', $item) }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            </a>
                                            <form action="{{ route('course-category.destroy', $item) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="w-50 btn btn-primary btn-sm mt-2"><i
                                                    class="bx bx-trash me-1"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#product_table').DataTable({
                "dom": '<lfB<t>ip>',
                buttons: ['excel', 'print'],
                paging: true,
                searching: true,
                autoWidth: true,
                lengthChange: true,
                columnDefs: [{
                    orderable: true,
                    targets: '_all'
                }],
                pageLength: 10
            });
        });
    </script>
@endsection
