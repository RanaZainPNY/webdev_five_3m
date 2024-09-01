@extends('admin.adminmaster')

@section('content')
    {{-- Table Start --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class='d-flex align-items-center justify-content-between mb-3'>
                            <h5 class="card-title fw-bolder mb-0">Products</h5>
                            <a href="{{ route('admin-products-create') }}" class="btn btn-primary m-1">Create</a>
                        </div>

                        {{-- @php dump($products) @endphp --}}
                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="ps-0">Id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">SKU</th>
                                        <th scope="col" class="text-center">Price</th>
                                        <th scope="col" class="text-center">Created At</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($products as $product)
                                        <tr>
                                            <th scope="row" class="ps-0 fw-medium">{{ $product->id }}</th>
                                            <td>{{ $product->image }}</td>
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
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Welcome to our
                                                website</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/index.html</a>
                                        </td>
                                        <td class="text-center fw-medium">18,456</td>
                                        <td class="text-center fw-medium">$2.40</td>
                                    </tr> --}}


                                    {{-- <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Modern Admin
                                                Dashboard Template</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/dashboard</a>
                                        </td>
                                        <td class="text-center fw-medium">17,452</td>
                                        <td class="text-center fw-medium">$0.97</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Explore our
                                                product catalog</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/product-checkout</a>
                                        </td>
                                        <td class="text-center fw-medium">12,180</td>
                                        <td class="text-center fw-medium">$7,50</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">Comprehensive
                                                User Guide</span>
                                        </th>
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/docs</a>
                                        </td>
                                        <td class="text-center fw-medium">800</td>
                                        <td class="text-center fw-medium">$5,50</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium border-0">
                                            <span class="table-link1 text-truncate d-block">Check out our
                                                services</span>
                                        </th>
                                        <td class="border-0">
                                            <a href="javascript:void(0)"
                                                class="link-primary text-dark fw-medium d-block">/services</a>
                                        </td>
                                        <td class="text-center fw-medium border-0">1300</td>
                                        <td class="text-center fw-medium border-0">$2,15</td>
                                    </tr> --}}
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
