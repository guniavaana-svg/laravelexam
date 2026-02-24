<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<form action="{{route('dashboard.posts.index')}}">
    <input type="text" placeholder="search" name="search" value="{{request()->has('search') ? request('search'):null}}">
    <button type="submit">find</button>
</form>
<a href="{{route('dashboard.posts.create')}}">create posts</a>
<ul>
    @foreach($posts as $post)
        <li>{{$post->title}}
            {{-- @foreach($post->categories as $category)
                <span class="">Category:{{$category->name}}</span>
            @endforeach --}}
            <span class="">Category:{{$post->category->name}}</span>
            
            <a href="{{route('dashboard.posts.edit' , $post->id)}}">Edit</a>

            <form action="{{ route('dashboard.posts.destroy', $post->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
<div>{{$posts->links()}}</div>
</body>
</html>

