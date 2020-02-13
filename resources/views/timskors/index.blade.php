<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('timskor.create') }}">Create</a>

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
                <th>Penilai</th>
                <th>Tanggal</th>
                <th>Skor</th>
                <th>Action</th>
            </tr>          
            @foreach ($timskors as $timskor)
                <tr>
                    <td>{{ $timskor->id }}</td>
                    <td>{{ $timskor->tim->nama }}</td> 
                    <td>{{ $timskor->penilai->nama }}</td> 
                    <td>{{ $timskor->tanggal }}</td> 
                    <td>{{ $timskor->skor }}</td> 
                    <td><a href="{{ route('timskor.show', $timskor->id) }}">Read</a></td>
                    <td><a href="{{ route('timskor.edit', $timskor->id) }}">Edit</a></td>
                    <form action="{{ route('timskor.destroy', $timskor->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>