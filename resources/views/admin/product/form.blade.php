<div class="form-group mb-3">
   <label for="title">Product Name</label> <small style="color:red;">*</small>
   <input type="text" class="form-control" id="title"
      placeholder="Enter Product Name" name="name" value="{{old('name',$data->name)}}" required>
</div>
<div class="form-group mb-3">
   <label for="description">Product Description</label> <small style="color:red;">*</small>
   <textarea cols="30" rows="10" name="description" id="description" class="form-control">{{old('description',$data->description)}}</textarea>
</div>
<div class="row" style="margin-top:22px;">
   <div class="col-lg-6">
      <label for="weave">Quantity</label> <small style="color:red;">*</small>
      <input type="number" name="quantity" value="{{old('quantity',$data->quantity)}}" class="form-control">
   </div>
   <div class="col-lg-6">
      <label for="category">Price</label> <small style="color:red;">*</small>
      <input type="number" name="price" value="{{old('price',$data->price)}}" class="form-control">
   </div>
</div>
<div class="form-group mb-3" style="margin-top:22px;">
   <label for="title">Status</label> <small style="color:red;">*</small>
   <select class="form-control" name="status" id="status_1">
      <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Active</option>
      <option value="2" {{$data->status == '2' ? 'selected' : ''}}>Inactive</option>
   </select>
</div>
<div class="panel panel-default" style="margin-top:30px;margin-bottom:30px;">
<input type="hidden" name="old_image" value="{{$data->image}}">
   <div class="panel-heading">Image</div>
   <div class="panel-body">
      <div class="row">
         <div class="col-lg-12">
            <label for="image_1">Image</label> <small style="color:red;">*</small>
            <input name="image" type="file" value="{{old('image')}}" class="form-control">
         </div>
      </div>
   </div>
</div>
<button class="btn btn-primary" type="submit">Submit form</button>
<br>
<p id="warning" style="color:red;margin-top:5px;"></p>