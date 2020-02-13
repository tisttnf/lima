<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('membertim.create') }}">Create</a>

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
                <th>Tim</th>
                <th>Mahasiswa</th>
                <th>Peran</th>
                <th>Final Skor</th>
                <th>Action</th>
            </tr>          
            @foreach ($membertims as $membertim)
                <tr>
                    <td>{{ $membertim->id }}</td>
                    <td>{{ $membertim->tim->nama }}</td> 
                    <td>{{ $membertim->mahasiswa->nama }}</td> 
                    <td>{{ $membertim->peran->nama }}</td> 
                    <td>{{ $membertim->final_skor }}</td> 
                    <td><a href="{{ route('membertim.show', $membertim->id) }}">Read</a></td>
                    <td><a href="{{ route('membertim.edit', $membertim->id) }}">Edit</a></td>
                    <form action="{{ route('membertim.destroy', $membertim->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>