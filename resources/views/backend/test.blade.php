<h1>{{session("sdt")}}</h1>
{{-- <form action="" method="post">
    @if($errors->any()) 
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif
    <input type="text" name="email" value="{{old("email")}}">
    <input type="text" name="password" value="{{old("password")}}">
    <button type="submit" name="sbm">send</button>
    @csrf
    {{-- bảo mật thông tin form  --}}