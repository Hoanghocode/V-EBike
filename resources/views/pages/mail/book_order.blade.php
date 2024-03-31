<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt Bàn  thành công</title>
</head>
<body>
  <div class="email-container">
    <h1>Chúc mừng  ✅ <span class="checkmark"></span></h1>
    <p>Cảm ơn bạn <span style="color: #007bff">{{$booking_array['customer_name']}}</span> đã đặt bàn thành công. Chúc bạn có những trải nghiệm tuyệt vời với sản phẩm của chúng tôi!</p>
    
    <h2>Thông tin đơn đặt bàn</h2>

<ul>
    <li>Tên người đặt: <Strong>{{$booking_array['book_name']}}</Strong></li>
    <li>Email: <strong>{{$booking_array['book_email']}}</strong></li>
    <li>Số lượng người: <strong>{{$booking_array['book_number']}}</strong></li>
    <li>Thời gian: <strong>{{$booking_array['book_time']}}</strong></li>
    <li>Điện thoại: <strong>{{$booking_array['book_phone']}}</strong></li> 
    <li>Ghí chú: <strong>{{$booking_array['book_notes']}}</strong></li> 

    <li>Cơ sở đặt bàn: <strong><?php echo $booking_array['short_select']; ?></strong></li>


 

    <li>Hình thức muốn thanh toán:
        @if($booking_array['payment_select']==0)
        <strong>CHUYỂN KHOẢN </strong>
        @else       
           <strong>TIỀN MẶT</strong>
         @endif </li> 
    
   
  </ul>

    <img src="https://i.imgur.com/ewVqDIR.jpeg" alt="lo go tiệm" style="max-width: 100%; height: auto; display: block; margin: 20px 0;">
    
    <p>Xin vui lòng liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi nào và chúng tôi sẽ liên lạc trong thời gian nhanh nhất</p>
    
    <p>Trân trọng và cảm ơn</p>
    <p>Tiệm ăn vặt Hoa Nghĩa</p>
  </div>
</body>
</html>
<style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
  
    .email-container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  
    h1 {
      color: #007bff;
    }
  
    ul {
      padding: 0;
      list-style: none;
    }
    .checkmark::after {
      content: '\2713'; /* Unicode value for checkmark */
      font-size: 24px;
      color: #28a745; /* Green color for the checkmark */
      margin-left: 5px;
    }
    img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 20px 0;
    }
  </style>
  