 {{Form::open(array('url' => 'password/reset', 'method' => 'Post'))}}
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="submit" value="Reset Password">
{{Form::close()}}