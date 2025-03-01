@php
use App\Core\Request;
$request = new Request();
@endphp
<div class="col-9">
   <h1>{{$title}}</h1>
   <hr>
   <div class="row mb-3">
      <div class="col-12 mb-3">
         <a href="{{_WEB_HOST_ROOT.'/nguoi-dung/them-nguoi-dung'}}" class="btn btn-success"><i class="fa-regular fa-square-plus mr-2"></i>Thêm người dùng</a>
      </div>
      <div class="col-12">
         <form action="" method="get">
            <div class="row">
               <div class="col-3">
                  <select name="status" id="" class="form-control">
                     <option value="all">Tất cả trạng thái</option>
                     <option value="active" {{(!empty($request->getFields()['status'])) && $request->getFields()['status'] == 'active' ? 'selected' : false}}>Kích hoạt</option>
                     <option value="inactive" {{(!empty($request->getFields()['status'])) && $request->getFields()['status'] == 'inactive' ? 'selected' : false}}>Chưa kích hoạt</option>
                  </select>
               </div>
               <div class="col-3">
                  <select name="group_id" id="" class="form-control">
                     <option value="0">Tất cả nhóm</option>
                     @if(!empty($listGroups))
                        @foreach ($listGroups as $group)
                           <option value="{{$group['id']}}" {{!empty($request->getFields()['group_id']) && $request->getFields()['group_id'] == $group['id'] ? 'selected' : false}}>{{$group['name']}}</option>
                        @endforeach
                     @endif
                  </select>
               </div>
               <div class="col-4">
                  <input type="text" class="form-control" name="keyword" value="{!$request->getFields()['keyword'] ?? false!}" placeholder="Từ khóa..." />
               </div>
               <div class="col-2">
                  <button type="submit" class="btn btn-info btn-block">Tìm kiếm</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <table class="table table-bordered table-responsive">
      <thead>
         <tr>
            <th><input type="checkbox" id="checkAllUser"/></th>
            <th width="50%">Tên</th>
            <th width="50%">Email</th>
            <th>Nhóm</th>
            <th>Trạng thái</th>
            <th>Thời gian</th>
            <th>Sửa</th>
            <th>Xóa</th>
         </tr>
      </thead>
      <tbody>
         @if(!empty($listUsers))
            @foreach($listUsers as $user)
               <tr>
                  <td><input type="checkbox" value="{{$user['id']}}" class="check-item-user"></td>
                  <td>{{$user["fullname"]}}</td>
                  <td>{{$user["email"]}}</td>
                  <td>{{$user['nameGroup']}}</td>
                  <td>{!$user['status'] == 1 ? '<p class="badge badge-success">Kích hoạt</p>' : '<p class="badge badge-danger">Chưa kích hoạt</p>'!}</td>
                  <td>{{getDateFormat($user['created_at'], 'd/m/Y')}}<br>{{getDateFormat($user['created_at'], 'h:i:s')}}</td>
                  <td><a href="{{_WEB_HOST_ROOT.'/nguoi-dung/chinh-sua/'.$user['id']}}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td><a href="{{_WEB_HOST_ROOT.'/nguoi-dung/xoa-nguoi-dung/'.$user['id']}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
               </tr>
            @endforeach
         @else
            <tr>
               <td colspan="8"><div class="alert alert-danger text-center">Không có người dùng</div></td>
            </tr>
         @endif
      </tbody>
   </table>
   <div class="row">
      <div class="col-6">
         <button type="button" class="btn btn-danger btn-delete-multi-user disabled" aria-disabled="true">Xóa đã chọn (<span>0</span><i></i>)</button>
      </div>
      <div class="col-6">
         {!$links!}
      </div>
   </div>
</div>