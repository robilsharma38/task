<div class="row" style="margin-top:22px;">
   <div class="col-lg-4">
      <label for="weave">Name</label> <small style="color:red;">*</small>
      <input type="text" name="full_name" value="{{old('full_name',$data->full_name)}}" class="form-control">
   </div>
   <div class="col-lg-4">
      <label for="category">Email</label> <small style="color:red;">*</small>
      <input type="email" name="email" value="{{old('email',$data->email)}}" class="form-control">
   </div>
   <div class="col-lg-4">
      <label for="category">Mobile</label> <small style="color:red;">*</small>
      <input type="text" name="mobile" value="{{old('mobile',$data->mobile)}}" class="form-control">
   </div>
</div>

<div class="row" style="margin-top:22px;">
   <div class="col-lg-4">
      <label for="weave">Country</label> <small style="color:red;">*</small>
      <select name="country" id="country" class="form-control">
         <option value="" disabled selected="true">Select</option>
         <option value="1" {{$data->country == '1' ? 'selected' : ''}}>1</option>
         <option value="2" {{$data->country == '2' ? 'selected' : ''}}>2</option>
      </select>
   </div>
   <div class="col-lg-4">
      <label for="category">State</label> <small style="color:red;">*</small>
      <select name="state" id="state" class="form-control">
         <option value="" disabled selected="true">Select</option>
         <option value="1" {{$data->state == '1' ? 'selected' : ''}}>1</option>
         <option value="2" {{$data->state == '2' ? 'selected' : ''}}>2</option>
      </select>
   </div>
   <div class="col-lg-4">
      <label for="category">District</label> <small style="color:red;">*</small>
      <select name="district" id="district" class="form-control">
         <option value="" disabled selected="true">Select</option>
         <option value="1" {{$data->district == '1' ? 'selected' : ''}}>1</option>
         <option value="2" {{$data->district == '2' ? 'selected' : ''}}>2</option>
      </select>
   </div>
</div>

<div class="row" style="margin-top:22px;">
   <div class="col-lg-6">
      <label for="category">Password</label> <small style="color:red;">*</small>
      <input type="password" name="password" id="password" class="form-control">
   </div>
   <div class="col-lg-3">
      <input type="hidden" name="old_image" value="{{$data->profile_image}}">
      <label for="weave">Profile</label> <small style="color:red;">*</small>
      <input type="file" name="profile_image" id="profile_image" class="form-control">
   </div>
   <div class="col-lg-3">
      <label for="weave">Role</label> <small style="color:red;">*</small>
      <select name="role" id="role" class="form-control">
         <option value="" disabled selected="true">Select</option>
         <option value="1" {{$data->role == '1' ? 'selected' : ''}}>Role 1</option>
         <option value="2" {{$data->role == '2' ? 'selected' : ''}}>Role 2</option>
      </select>
   </div>
</div>

<div class="row" style="margin-top:22px;margin-bottom:22px;">
   <div class="col-lg-12">
      <label for="category">Status</label> <small style="color:red;">*</small>
      <select class="form-control" name="status" id="status_1">
         <option value="" disabled selected="true">Select</option>
         <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Active</option>
         <option value="2" {{$data->status == '2' ? 'selected' : ''}}>Inactive</option>
      </select>
   </div>
</div>
<button class="btn btn-primary" type="submit">Submit form</button>
<br>
<p id="warning" style="color:red;margin-top:5px;"></p>