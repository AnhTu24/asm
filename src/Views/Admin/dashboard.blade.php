@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 card_height_100 mx-auto">
            <div class="white_card mb_20">
                <div class="white_card_header">
                    <div class="box_header m-0">
                    </div>
                    <div class="col-lg-10 card_height_100">  
                        <div class="white_card mb_20">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Thống kê sản phẩm theo danh mục</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body" style="height: 286px;">
                                @if (!empty($productCountByCategory))
                                    <canvas id="productChart"></canvas> 
                                @else
                                    <p>Chưa có dữ liệu thống kê</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection