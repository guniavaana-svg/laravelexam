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
<form action="{{route('dashboard.posts.update', $post->id)}}" METHOD="POST">
    @csrf
    @method('PUT');
    <input type="text" name="title" id="title"  value="{{$post->title}}" placeholder="name">
    @error('title')
    {{$message}}
    @enderror
    <select name="category_id[]" multiple>
        <option value="">select</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}" @selected(in_array($category->id,$selectedCategories))>{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    {{$message}}
    @enderror
    <textarea name="description" id="description"  placeholder="description" >{{$post->description}}</textarea>
    @error('description')
    {{$message}}
    @enderror
    <button type="submit">update post</button>
</form>
</body>
</html>
