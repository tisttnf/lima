<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('project.create') }}">Create</a>

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
                <th>Nama</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
                <th>Persen</th>
                <th>Action</th>
            </tr>          
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->nama }}</td>
                    <td>{{ $project->tanggal_akhir }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->persen }}</td>   
                    <td><a href="{{ route('project.show', $project->id) }}">Read</a></td>
                    <td><a href="{{ route('project.edit', $project->id) }}">Edit</a></td>
                    <form action="{{ route('project.destroy', $project->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>