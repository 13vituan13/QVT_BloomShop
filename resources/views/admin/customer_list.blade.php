@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
    <style>
        .w95 {
            width: 95px;
        }

        .form-control {
            background: #fff;
            color: #152036;
        }

        .close {
            position: absolute;
            top: 25%;
            right: 15px;
        }
    </style>
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Danh Sách Khách Hàng</h4>
                        <div class="add-product">
                            <a data-toggle="modal" data-target="#CustomerModal">Thêm mới</a>
                        </div>
                        <table>
                            <thead>
                                <th>Ảnh</th>
                                <th>Tên Khách Hàng</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Email</th>
                                <th>Ngày Sinh</th>
                                <th>Loại Khách Hàng</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($customer_list) > 0)
                                    @foreach ($customer_list as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    $path = isset($item->avatar) > 0 ? $item->avatar : '';
                                                @endphp
                                                <img src="{{ asset('storage/{$path}') }}" alt="" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->birthday }}</td>
                                            <td>
                                                @if (isset($item->vip_member['name']))
                                                    @php
                                                        $colorVIP = isset($item->vip_member['vip_color']) ? $item->vip_member['vip_color'] : '';
                                                    @endphp
                                                    <button style="background:{{ $colorVIP }}" class="pd-setting w95">
                                                        {{ $item->vip_member['name'] }}
                                                    </button>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                    onclick="showEditModal('{{ $item->customer_id }}')">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button onclick="remove('{{ $item->customer_id }}',this)"
                                                    data-toggle="tooltip" title="Trash" class="pd-setting-ed">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="custom-pagination">
                            {{ $customer_list->links('admin.partial.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="text" id="customer_id" hidden value="">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Tên khách hàng:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="address">
                        </div>
                        <div class="form-group">
                            <label for="city_id" class="col-form-label">Thành phố:</label>
                            <select id="city_id" onchange="getDistrict()" class="form-control"
                                aria-label="Default select example">
                                <option value="" selected>Chọn Thành Phố</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="district_id" class="col-form-label">Quận:</label>
                            <select id="district_id" class="form-control" aria-label="Default select example">
                                <option value="" selected>Chọn Quận</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="vip_id" class="col-form-label">Loại khách hàng:</label>
                            <select id="vip_id" class="form-control" aria-label="Default select example">
                                <option value="" selected>Chọn loại khách hàng</option>
                                @if (count($vip_member_list) > 0)
                                    @foreach ($vip_member_list as $vip_item)
                                        <option value="{{ $vip_item->vip_id }}"
                                            @if (isset($customers) && $customers->vip_id == $vip_item->vip_id) {{ 'selected' }} @endif>
                                            {{ $vip_item->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary" onclick="save()">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const citysList = @json($citys_list);
        const districtsList = @json($districts_list);
        $(function() {
            let cityHTML = ""
            citysList.forEach(item => {
                cityHTML += `<option value="` + item.id + `">` + item.name + `</option>`
            });
            $('#city_id').append(cityHTML);

            $('#CustomerModal').on('hidden.bs.modal', function() {
                $('#customer_id').val('')
                $('#name').val('')
                $('#address').val('')
                $('#city_id').val('').change();
                $('#district_id').val('').change();
                $('#phone').val('')
                $('#email').val('')
                $('#password').val('')
                $("#vip_id").val('').change();
            });
        }); //end document ready
        function goToPage(url) {
            window.location.href = url
        }

        function getDistrict() {

            let cityValue = $('#city_id').val()
            let districtHTML = ""
            districtsList.forEach(item => {
                if (item.city_id == cityValue) {
                    districtHTML += `<option value="` + item.id + `">` + item.name + `</option>`
                }
            });
            $('#district_id').html(districtHTML);
        }

        function save() {
            let id = $('#customer_id').val()
            if (id == "") {
                store()
            } else {
                update(id)
            }
        }

        function store() {
            var formData = new FormData();
            formData.append('name', $('#name').val())
            formData.append('address', $('#address').val())
            formData.append('city_id', $('#city_id').val())
            formData.append('district_id', $('#district_id').val())
            formData.append('phone', $('#phone').val())
            formData.append('email', $('#email').val())
            formData.append('password', $('#password').val())
            formData.append('vip_id', $('#vip_id').val())
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.customer.store') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm Thành Công',
                        text: 'Đã thêm khách hàng mới!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }

        function update(id) {
            var formData = new FormData();
            formData.append('customer_id', id)
            formData.append('name', $('#name').val())
            formData.append('address', $('#address').val())
            formData.append('city_id', $('#city_id').val())
            formData.append('district_id', $('#district_id').val())
            formData.append('phone', $('#phone').val())
            formData.append('email', $('#email').val())
            formData.append('password', $('#password').val())
            formData.append('vip_id', $('#vip_id').val())
            console.log([...formData])
            $.ajax({
                url: '{{ route('api.customer.update') }}',
                type: 'POST',
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    const res = response.dataReponse;
                    Swal.fire({
                        icon: 'success',
                        title: 'Sửa Thành Công',
                        text: 'Đã cập nhật lại khách hàng!!!',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        location.reload();

                    });
                },
                error: function(e) {
                    console.log(e)
                }
            }); //end ajax
        }

        function showEditModal(id) {
            $.ajax({
                url: "{{ route('admin.ajax_get_customer_by_id') }}",
                type: "GET", //send it through get method
                data: {
                    id: id,
                },
                success: function(response) {

                    let res = response.result
                    console.log(res)
                    $('#customer_id').val(res.customer_id)
                    $('#name').val(res.name)
                    $('#address').val(res.address)
                    $('#city_id').val(res.city_id).change();
                    $('#district_id').val(res.district_id).change();
                    $('#phone').val(res.phone)
                    $('#email').val(res.email)
                    $("#vip_id").val(res.vip_id).change();
                    $("#CustomerModal").modal("show");
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            }); //end ajax
        }

        function remove(id, element) {
            Swal.fire({
                icon: 'question',
                title: 'Bạn có chắc muốn xóa ?',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "{{ route('api.customer.remove') }}",
                    type: 'DELETE',
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    headers: {
                        'Authorization': 'Bearer ' + $('meta[name="token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        const res = response.dataResponse;
                        Swal.fire({
                            icon: 'success',
                            title: 'Xóa Thành Công',
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            var row = element.parentNode.parentNode;
                            row.parentNode.removeChild(row);
                        });
                    },
                    error: function(e) {
                        console.log(e);
                    }
                }); //end ajax
                }
            });
        }
    </script>

@endsection
