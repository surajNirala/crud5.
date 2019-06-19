<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post</title>
</head>
<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
        @if (session('success'))
            <div class="alert alert-success">
                <h2>{{ session('success') }}</h2>
            </div>
        @endif
    <table class="table table-striped custab">
    <thead>
    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Parent ID</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    @php
        $i = 1;
    @endphp
        @if (!empty($posts))
            @foreach ($posts as $post)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->description }}</td>
                <td class="text-center">
                    <a class='btn btn-primary btn-xs' href="{{ route('posts.show',$post->id) }}"><span class="glyphicon glyphicon-eyes"></span> Show</a>
                    <a class='btn btn-info btn-xs' href="{{ route('posts.edit',$post->id) }}"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                    <form action="{{ route('posts.destroy',$post->id) }}" method="post">  
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del </button>
                    </form>
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        @else
            <tr><h1>No Any Posts</h1></tr>    
        @endif
            
    </table>
    {{ $posts->links() }}
    </div>
</div>
</body>
</html>