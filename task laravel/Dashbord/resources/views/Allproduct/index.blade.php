@extends('layouts.parent')

@section('title', 'All Product')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}"/>
@endsection

@section('content')

<div class="col-12">
    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>

    @endif
</div>
    <div class="col-12">
        <table class="table" id="example1" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Update Date</th>
                    <th scope="col">operation</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <th>{{$product->id}}</th>
                <td>{{$product->code}}</td>
                <td>{{$product->name_en}} - {{$product->name_ar}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->status}}</td>
                <td>{{$product->created_at}}</td>
                <td>{{$product->updated_at}}</td>

                <td>

                    <a class="btn btn-outline-dark" href="{{route('Allproduct.edit',$product->id)}}">Edit</a>
                    <form action="{{ route('product.delete',$product->id)}}" class="d-inline" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
              @endforeach



            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
            })
            .buttons()
            .container()
            .appendTo('#example1_wrapper .col-md-6:eq(0)');


        });
    </script>
@endsection
