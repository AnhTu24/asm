@extends('layouts.master')

@section('title')
    Xem chi tiết: {{ $product['name'] }}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="box_header m-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>TRƯỜNG</th>
                                    <th>GIÁ TRỊ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>
                                            @if (preg_match('/\.(jpg|jpeg|png|gif|bmp)$/i', $value))
                                                <img src="{{ asset($product['img_thumbnail']) }}" width="100px"
                                                    alt="">
                                            @else
                                                {!! $value !!}
                                            @endif
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
@endsection
