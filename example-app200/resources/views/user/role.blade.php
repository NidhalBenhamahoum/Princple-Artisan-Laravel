@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Roles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div>
    <div>
        <h2>Select your role ::</h2>
        <a href="register" class="btn btn-primary">User</a>
        <a href="artisan/register" class="btn btn-danger">Artisan</a>
        <a href="admin/register" class="btn btn-info">Admin</a>

    </div>
</div>
@endsection
</body>
