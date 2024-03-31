@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê người dùng
    </div>
  
    <div class="table-responsive">
      <?php
      $message = session()->get('message');
      if($message){
          echo '<span class="chau">' .$message. '</span>';
          session()->put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
          <th>Tên người dùng</th>
            <th>Email</th>
            <th></th>
            <th>Phone</th>
            <th>Password</th>
            <th>Nhân viên</th>
            <th>Admin</th>
            <th>Người dùng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($admin as $key => $user)
            <form action="{{url('/assign-roles')}}" method="POST">
              @csrf
              <tr>
               
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $user->admin_name }}</td>
                <td>{{ $user->admin_email }} <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"></td>
                <td><input type="hidden" name="admin_id" value="{{ $user->admin_id }}"></td>
                <td>{{ $user->admin_phone }}</td>
                <td>{{ $user->admin_password }}</td>
                <td><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>

              <td>
                  
                    
                 <input type="submit" value="Phân quyền" class="btn btn-sm btn-default">
                 <a  class="btn btn-sm btn-danger" href="{{url  ('/delete-user-roles/'.$user->admin_id)}}">Xóa user</a>
                
              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$admin->links('pagination::bootstrap-4')!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection
<style>
  i.fa.fa-pencil-square-o.text-success.text-active {
font-size: 26px;
}
i.fa.fa-times.text-danger.text {
font-size: 26px;
}
    span.chau {
color: blueviolet;
font-size: 17px;
width: 100%;
text-align: center;
}
  span.fa-thumb-styling.fa.fa-thumbs-down {
font-size: 30px;
color: darkred;
}
span.fa-thumb-styling.fa.fa-thumbs-up {
font-size: 30px;
color: rgba(0, 139, 76, 0.552);
}
</style>