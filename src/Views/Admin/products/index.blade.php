@extends('layouts.master')

@section('title')
    Quản lý Sản phẩm
@endsection

@section('content')
    @if (isset($_SESSION['status']) && $_SESSION['status'])
        <div class="alert alert-success">{{ $_SESSION['msg'] }}</div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    @if (isset($_SESSION['status']) && !$_SESSION['status'])
        <div class="alert alert-warning">{{ $_SESSION['msg'] }}</div>

        @php
            unset($_SESSION['status']);
            unset($_SESSION['msg']);
        @endphp
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h1 class="m-0">Danh sách Sản phẩm</h1>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">

                    <a href="{{ url("admin/products/create") }}" class="btn btn-primary">Thêm mới</a>

                    @if (isset($_SESSION['status']) && $_SESSION['status'])
                        <div class="alert alert-success">
                            {{ $_SESSION['msg'] }}
                        </div>

                        @php
                            unset($_SESSION['status']);
                            unset($_SESSION['msg']);
                        @endphp
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IMG THUMBNAIL</th>
                                    <th>NAME</th>
                                    <th>Category Name</th>
                                    <th>PRICE_REGULAR</th>
                                    <th>PRICE_SALE</th>
                                    <th>CREATED AT</th>
                                    <th>UPDATED AT</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                            
                                    <tr>
                                        <td>{{ $product['id'] }}</td>
                                        <td>
                                            <img src="{{ asset($product['img_thumbnail']) }}" width="100px" alt="">
                                        </td>
                                        <td>{{ $product['name'] }}</td>
                                        <td>{{ $product['c_name'] }}</td>
                                        <td>{{ $product['price_regular'] }}</td>
                                        <td>{{ $product['price_sale'] }}</td>
                                        <td>{{ $product['created_at'] }}</td>
                                        <td>{{ $product['updated_at'] }}</td>
                                        <td>
                                            <a href="{{ url("admin/products/{$product['id']}/show") }}" class="btn btn-info">Xem</a>
                                            <a href="{{ url("admin/products/{$product['id']}/edit") }}" class="btn btn-warning">Sửa</a>
                                            <a href="{{ url("admin/products/{$product['id']}/delete") }}"
                                                onclick="return confirm('Chắc chắn xóa không?');" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center pagination-lg">
                            {{-- Nút về trang đầu --}}
                            <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="?page=1" aria-label="First">
                                    <span aria-hidden="true">&laquo;&laquo;</span>
                                </a>
                            </li>
        
                            {{-- Nút về trang trước --}}
                            @if ($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $currentPage - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            @endif
        
                            {{-- Hiển thị số trang --}}
                            @php
                                $startPage = max(1, $currentPage - 1);
                                $endPage = min($totalPage, $currentPage + 1);
                            @endphp
        
                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endfor
        
                            {{-- Nút đến trang sau --}}
                            @if ($currentPage < $totalPage)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $currentPage + 1 }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            @endif
        
                            {{-- Nút đến trang cuối --}}
                            <li class="page-item {{ $currentPage == $totalPage ? 'disabled' : '' }}">
                                <a class="page-link" href="?page={{ $totalPage }}" aria-label="Last">
                                    <span aria-hidden="true">&raquo;&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection