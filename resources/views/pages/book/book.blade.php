@extends('layout')
@section('content_category')


<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Đặt bàn</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="register-req">
           <center>
            <p>Làm ơn hãy đăng nhập hoặc đăng ký để Đặt bàn và xem lại lịch sử đặt bàn của mình nhé</p>
           </center>
        </div><!--/register-req-->
       

        <div class="shopper-informations">
            
            <div class="row">
            
                <div class="col-sm-10 clearfix">
                    <style>
                        input[type="datetime-local"] {
                            padding: 8px;
                            border: 1px solid #ccc;
                            border-radius: 3px;
                        }
                
                        button {
                            background-color: #007bff;
                            color: white;
                            padding: 10px 15px;
                            border: none;
                            border-radius: 3px;
                            cursor: pointer;
                        }
                
                        button:hover {
                            background-color: #0056b3;
                        }
                    </style>
                    <div class="bill-to">         
                        <div class="form-one">
                          
                            <form method="post" >
                                @csrf
                               
                                <label for="datetime">Điền email:</label>
                                <input required type="text" name="book_email" class="book_email" data-validation="email*" data-validation-error-msg="làm ơn điền đúng email" placeholder="Email*">
                                <label for="datetime">Điền tên người đặt bàn:</label>
                                <input required type="text" name="book_name" class="book_name" placeholder="Họ và tên*">
                                <label for="datetime">Điền số lượng người:</label>
                                <input required type="text" name="book_number" class="book_number" placeholder="Số lượng người*">
                                <label for="datetime">Chọn Ngày và Giờ:</label>
                                <input type="datetime-local"  class="book_time" name="book_time">
                                <label for="datetime">Điền số điện thoại:</label>
                                <input required type="text" name="book_phone" class="book_phone" placeholder="điện thoại*">
                                <label for="datetime">Điền ghi chú khi đặt bàn:</label>
                                <textarea required name="book_notes" class="book_notes"  placeholder="ghi chú yêu cầu đơn đặt bàn của bạn" rows="5"></textarea>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Cơ sở gần nhất</label>
                                      <select name="short_select" class="form-control input-sm m-bot15 short_select">
                                        <option value="">---Chọn cơ sở----</option>
                                        @foreach ($brand_product as $key => $brand) 
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach                      
                                    </select>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình thức Thanh toán</label>
                                      <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                                            <option value="0">chuyển khoản</option>
                                            <option value="1">tiền mặt</option>
                                           
                                    </select>
                                </div> 
                                <input class="btn btn-primary btn-sm book_order" type="button" name="book_order" value="Xác Nhận Đặt bàn" >
                              
                            </form>
                      
                           
                           
                             {{-- {{session()->get('fee')}} --}}
                        </div>
                      
                        </div>
                        
                   
                    </div>
                    
                </div>
 
                </div>
				
            </div>
        </div>
<style>
  .form-one {
    text-align: center;
    width: 100%;
    margin: 2px 140px auto;
    padding: 20px;
    box-sizing: border-box;
}



/* Adjust input and textarea styles if needed */
.form-one input,
.form-one textarea {
    width: 100%; /* Make inputs and textarea full width */
    padding: 10px; /* Add padding inside inputs */
    margin-bottom: 10px; /* Add margin between elements */
    box-sizing: border-box; /* Include padding in the total width */
}

</style>
    </div>
</section> <!--/#cart_items-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
$.validate({
    modules : 'security',
    onModulesLoaded : function() {
        var optionalConfig = {
            fontSize: '12pt',
            padding: '4px',
            bad : 'Very bad',
            weak : 'Weak',
            good : 'Good',
            strong : 'Strong'
        };

        $('input[name="customer_password"]').displayPasswordStrength(optionalConfig);
    }
});
</script>

@endsection