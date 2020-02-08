<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('prodi.create') }}">Create</a>

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
            @foreach ($prodis as $prodi)
                <tr>
                    <td>{{ $prodi->id }}</td>
                    <td>{{ $prodi->nama }}</td>   
                    <td><a href="{{ route('prodi.show', $prodi->id) }}">Read</a></td>
                    <td><a href="{{ route('prodi.edit', $prodi->id) }}">Edit</a></td>
                    <form action="{{ route('prodi.destroy', $prodi->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>