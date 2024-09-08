@extends('admin.adminmaster')

@section('content')
    {{-- Table Start --}}

    {{-- @php
        dump($orders);
    @endphp --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class='d-flex align-items-center justify-content-between mb-3'>
                            <h5 class="card-title fw-bolder mb-0">Orders</h5>
                            {{-- <a href="{{ route('admin-products-create') }}" class="btn btn-primary m-1">Create</a> --}}
                        </div>

                        {{-- @php dump($products) @endphp --}}
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="ps-0">Id</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col" class="text-center">Contact</th>
                                        <th scope="col" class="text-center">Total Price</th>
                                        <th scope="col" class="text-center">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($orders as $order)
                                        <tr class="border-2 border-bottom border-primary border-0">
                                            <td scope="col" class="ps-0">{{ $order->id }}</td>
                                            <td scope="col">{{ $order->firstname . ' ' . $order->lastname }}</td>
                                            <td scope="col" class="text-center">{{ $order->contact }}</td>
                                            <td scope="col" class="text-center">{{ $order->total }}</td>
                                            <td scope="col" class="text-center">{{ $order->created_at }}</td>
                                            <td scope="col" class="text-center">
                                                <a href="{{ route('admin-orders-completed', $order->id) }}"
                                                    class="btn btn-success">Delivered</a>
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <th scope="row" class="ps-0 fw-medium">{{ $product->id }}</th>
                                            <td><img class='w-100' src="{{ asset('uploads/products/' . $product->image) }}"
                                                    alt="">
                                            </td>
                                            <td class="text-center fw-medium">{{ $product->name }}</td>
                                            <td class="text-center fw-medium">{{ $product->sku }}</td>
                                            <td class="text-center fw-medium">{{ $product->price }}</td>
                                            <td class="text-center fw-medium">{{ $product->created_at }}</td>
                                            <td class="text-center fw-medium">
                                                <a href={{ route('admin-products-edit', $product->id) }}
                                                    class="btn btn-info m-1">Edit</a>
                                                <a href={{ route('admin-products-destroy', $product->id) }} type="button"
                                                    class="btn btn-danger m-1">Delete</a>
                                            </td>
                                        </tr> --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    {{-- Table End --}}
@endsection
