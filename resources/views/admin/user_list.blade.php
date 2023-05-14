@extends('layouts.admin.master')
@section('title', 'Customer')
@section('content')
    <style>
        .w80 {
            width: 80px;
        }

        .pd_btn {
            border: none;
            color: #fff;
            padding: 5px 15px;
            font-size: 15px;
            border-radius: 3px;
        }

        .pd-admin {
            background: #f72f2f;
        }

        .pd-user {
            background: #2665f5;
        }

        .product-status-wrap img {
            width: 40px;
            height: 40px;
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
                        <h4>Danh Sách Nhân Viên</h4>
                        <div class="add-product">
                            <a data-toggle="modal" data-target="#UserModal">Thêm mới</a>
                        </div>

                        <table>
                            <thead>
                                <th>Avatar</th>
                                <th>Tên nhân viên</th>
                                <th>Chức Vụ</th>
                                <th>Email</th>
                                <th>Mô tả</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (count($user_list) > 0)
                                    @foreach ($user_list as $item)
                                        <tr>
                                            <td>
                                                @php
                                                    $path = isset($item->avatar) > 0 ? $item->avatar : '';
                                                @endphp
                                                <img src="{{ asset("storage/{$path}") }}" alt="" />
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @php
                                                    switch ($item->role[0]['id']) {
                                                        case 1:
                                                            $status_cl = 'pd-admin';
                                                            break;
                                                        case 2:
                                                            $status_cl = 'pd-user';
                                                            break;
                                                        default:
                                                            $status_cl = '';
                                                            break;
                                                    }
                                                @endphp
                                                @if (isset($item->role[0]['name']))
                                                    <button class="pd_btn w80 {{ $status_cl }}">
                                                        {{ $item->role[0]['name'] }}
                                                    </button>
                                                @endif
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role[0]['description'] }}</td>
                                            <td>
                                                <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"
                                                    onclick="showEditModal('{{ $item->id }}')">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button data-toggle="tooltip" title="Trash" class="pd-setting-ed">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="custom-pagination">
                            {{ $user_list->links('admin.partial.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="form-group">
                            <label for="name" class="col-form-label">Tên nhân viên:</label>
                            <input type="text" class="form-control" id="name">
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
                            <label for="password-confirm" class="col-form-label">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control" id="password-confirm">
                        </div>
                        <div class="form-group">
                            <label for="role-select" class="col-form-label">Chức vụ:</label>
                            <select id="role-select" class="form-control" aria-label="Default select example">
                                <option value="" selected>Chọn chức vụ</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Mô tả:</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#UserModal').on('hidden.bs.modal', function() {
                $('#name').val('')
                $('#email').val('')
                $('#description').val('')
                $("#role-select").val('').change();
            });
        }); //end document ready

        
        function goToPage(url) {
            window.location.href = url
        }
        function showEditModal(id) {
            $.ajax({
                url: "{{ route('admin.ajax_get_user_by_id') }}",
                type: "GET", //send it through get method
                data: {
                    id: id,
                },
                success: function(response) {
                    let res = response.result
                    $('#name').val(res[0].name)
                    $('#email').val(res[0].email)
                    $('#description').val(res[0].role[0].description)
                    $("#role-select").val(res[0].role[0].pivot.role_id).change();
                    $("#UserModal").modal("show");
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            }); //end ajax
        }
    </script>

@endsection
