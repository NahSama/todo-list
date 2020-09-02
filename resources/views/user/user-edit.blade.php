@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Profile Picture</div>
                @if (empty($user->photo))
                    <img style="width: 100%"src="{{ asset('img/default_photo.png') }}" alt="">
                @else
                    <img style="width: 100%"src="{{ asset('storage/img/profile_photos/'.$user->photo) }}" alt="">
                @endif
                
                <form action="{{ route('user.photo', ['user'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                    <div class="input-group-prepend">
                      <button type="submit" class="input-group-text" id="inputGroupFileAddon01">Upload</button>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="photo" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profile
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <form action="{{ route('user.update', ['user'=>$user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Joint</label>
                                <input disabled type="text" class="form-control" name="created_at" value="{{ $user->created_at }}">
                            </div>
                            <button type="submit" class="float-right btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  document.querySelector('.custom-file-input').addEventListener('change',function(e){
  var fileName = document.getElementById("inputGroupFile01").files[0].name;
  var nextSibling = e.target.nextElementSibling
  nextSibling.innerText = fileName
})
</script>
@endsection