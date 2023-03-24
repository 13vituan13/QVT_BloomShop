<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        .total {
            font-weight: bold;
            text-align: right;
            padding-top: 20px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đặt hàng thành công</h1>
        <p>Cảm ơn quý khách đã đặt hàng tại cửa hàng của chúng tôi. Dưới đây là chi tiết đơn hàng của quý khách:</p>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataMail['order_detail'] as $product)
                    <tr>
                        <td>{{ $product['product']['name'] }}</td>
                        <td>${{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>${{ $product['price'] * $product['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Tổng cộng</td>
                    <td>${{ $dataMail['total_money'] }}</td>
                </tr>
            </tfoot>
        </table>
        <p>Thông tin khách hàng:</p>
        <ul>
            <li><strong>Họ và tên:</strong> {{ $dataMail['customer_name'] }}</li>
            <li><strong>Địa chỉ:</strong> {{ $dataMail['customer_address'] }}</li>
            <li><strong>Email:</strong> {{ $dataMail['customer_email'] }}</li>
            <li><strong>Số điện thoại:</strong> {{ $dataMail['customer_phone'] }}</li>
        </ul>
        <p>Cảm ơn quý khách đã tin tưởng và mua hàng tại cửa hàng của chúng tôi. Chúng tôi sẽ tiếp tục cung cấp các sản
            phẩm chất lượng và dịch vụ tốt nhất đến quý khách hàng.</p>
        <p>Trân trọng,</p>
        <p>Đội ngũ cửa hàng Blooms của chúng tôi</p>
        <div class="footer">
            <p>Chúng tôi không gửi email xác nhận này nếu quý khách hàng không thực hiện đơn hàng.
                Nếu quý khách hàng không thực hiện đơn hàng này, vui lòng bỏ qua email này hoặc liên hệ với chúng tôi để
                biết thêm thông tin.</p>
            <p>Xin vui lòng không trả lời email này.</p>
        </div>
    </div>
</body>
</html>
