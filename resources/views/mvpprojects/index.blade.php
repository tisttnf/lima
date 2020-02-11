<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('mvpproject.create') }}">Create</a>

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif

        @if (session('message'))
            {{ session('message') }}
        @endif

        <table border=1> 
            <tr>
                <th>Id</th>    
                <th>Project</th>
                <th>Sprint</th>
                <th>Tanggal Rilis</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>          
            @foreach ($mvpprojects as $mvpproject)
                <tr>
                    <td>{{ $mvpproject->id }}</td>
                    <td>{{ $mvpproject->project->nama }}</td>
                    <td>{{ $mvpproject->sprint }}</td>
                    <td>{{ $mvpproject->tanggal_rilis }}</td>
                    <td>{{ $mvpproject->deskripsi }}</td>   
                    <td><a href="{{ route('mvpproject.show', $mvpproject->id) }}">Read</a></td>
                    <td><a href="{{ route('mvpproject.edit', $mvpproject->id) }}">Edit</a></td>
                    <form action="{{ route('mvpproject.destroy', $mvpproject->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>