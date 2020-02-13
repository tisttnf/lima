<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('membertimskor.create') }}">Create</a>

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
                <th>Member Tim</th>
                <th>Penilai</th>
                <th>Tanggal</th>
                <th>Skor</th>
                <th>Action</th>
            </tr>          
            @foreach ($membertimskors as $membertimskor)
                <tr>
                    <td>{{ $membertimskor->id }}</td>
                    <td>{{ $membertimskor->member_tim->mahasiswa->nama }}</td> 
                    <td>{{ $membertimskor->penilai->nama }}</td> 
                    <td>{{ $membertimskor->tanggal }}</td> 
                    <td>{{ $membertimskor->skor }}</td> 
                    <td><a href="{{ route('membertimskor.show', $membertimskor->id) }}">Read</a></td>
                    <td><a href="{{ route('membertimskor.edit', $membertimskor->id) }}">Edit</a></td>
                    <form action="{{ route('membertimskor.destroy', $membertimskor->id)}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                    </form> 
                </tr>
            @endforeach            
        </table>
    </body>
</html>