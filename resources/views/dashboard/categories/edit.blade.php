<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('dashboard.categories.update', $category->id)}}" METHOD="POST">
    @csrf
    @method('PUT');
    <input type="text" name="name" id="name"  value="{{$category->name}}" placeholder="name">
    @error('name')
    {{$message}}
    @enderror
    <div>
        <label>active</label>
        <input type="checkbox" name="is_active" value="1" @checked($category->is_active)>
    </div>
    <button type="submit">update category</button>

</form>
</body>
</html>
