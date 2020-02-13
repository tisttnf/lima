<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('sprintproject.create') }}">Create</a>

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
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Action</th>
            </tr>          
            @foreach ($sprintprojects as $sprintproject)
                <tr>
                    <td>{{ $sprintproject->id }}</td>
                    <td>{{ $sprintproject->project->nama }}</td>
                    <td>{{ $sprintproject->sprint }}</td>
                    <td>{{ $sprintproject->tanggal_mulai }}</td>   
                    <td>{{ $sprintproject->tanggal_akhir }}</td>   
                    <td><a href="{{ route('sprintproject.show', $sprintproject->id) }}">Read</a></td>
                    <td><a href="{{ route('sprintproject.edit', $sprintproject->id) }}">Edit</a></td>
                    <form action="{{ route('sprintproject.destroy', $sprintproject->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>