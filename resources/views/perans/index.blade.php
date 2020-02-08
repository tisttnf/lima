<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('peran.create') }}">Create</a>

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
                <th>Action</th>
            </tr>          
            @foreach ($perans as $peran)
                <tr>
                    <td>{{ $peran->id }}</td>
                    <td>{{ $peran->nama }}</td>   
                    <td><a href="{{ route('peran.show', $peran->id) }}">Read</a></td>
                    <td><a href="{{ route('peran.edit', $peran->id) }}">Edit</a></td>
                    <form action="{{ route('peran.destroy', $peran->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>