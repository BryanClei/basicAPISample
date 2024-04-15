<h1>User Login</h1>
<form action="users" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Username"> 
    <span style="color:red;">@error('username'){{$message}}@enderror</span>
    <br><br>
    <input type="password" name="password" placeholder="Password"> 
    <span style="color:red;">@error('password'){{$message}}@enderror</span>
    <br><br>
    <button type="submit">Submit</button>
</form>