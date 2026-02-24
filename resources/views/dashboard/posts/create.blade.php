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
<form action="{{route('dashboard.posts.store')}}" METHOD="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" id="title" placeholder="title" value="{{old('title')}}">
    {{-- old-არ შლის ინფუტში შეყვანილ ინფოს--}}
    @error('title')
    {{$message}}
    @enderror
    <div>
        <select name="category_id">
            <option value="">Select</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        {{$message}}
    @enderror
    </div>
    <textarea name="description" id="description"  placeholder="description" >{{old('description')}}</textarea>
    @error('description')
        {{$message}}
    @enderror
    <input type="file"  name="images[]" multiple>
    @error('images')
        {{$message}}
    @enderror
    <button type="submit">Create posts</button>
</form>
</body>
</html>
