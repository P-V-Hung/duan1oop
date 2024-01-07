@extends('layout.index')
@section('title')
<title>Danh sách đơn hàng</title>
@endsection

@section('content')
<main class="container-xxl mt-5">
    <table class="table-hung">
        <tr>
            <th>
                <p>Tên người nhận</p>
            </th>
            <th style="width: 120px;">
                <p>Địa chỉ</p>
            </th>
            <th>
                <p>SĐT</p>
            </th>
            <th>
                <p>Số lượng</p>
            </th>
            <th>
                <p>Thành tiền</p>
            </th>
            <th>
                <p>PTTT</p>
            </th>
            <th>
                <p>Ngày đặt</p>
            </th>
            <th>
                <p>Trạng thái</p>
            </th>
            <th>
                <p>Thao tác</p>
            </th>
            <th>
            <i class="fa-solid fa-question"></i>
            </th>
        </tr>
        <tbody>
            @foreach ($echoBill as $bill)
                <tr>
                    <td>
                        <p>{{ $bill['fullname'] }}</p>
                    </td>
                    <td>{{ $bill['address'] }}</td>
                    <td>{{ $bill['tel'] }}</td>
                    <td>{{ $bill['count'] }}</td>
                    <td>{{ $bill['price'] }}</td>
                    <td>{{ $bill['pttt'] }}</td>
                    <td>{{ $bill['created_at'] }}</td>
                    <td>{{ $bill['status'] }}</td>
                    <td><a href="/billinfo?id={{$bill['id']}}"><i>chi tiết</i></a></td>
                    <td><a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng không')" href="{{$bill['link']}}">{{$bill['thaotac']}}</a></td>
                </tr>
                @endforeach 
            </tbody>
        </table>
</main>
@endsection