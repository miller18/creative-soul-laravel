<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
</head>
<body>
<!-- Password Form Input -->
<div class="form-group">
    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', ['class' => 'form-control']) }}
</div>


</body>
</html>
