<html>
    <body>
        <a href="{{ url('/') }}">Home</a>
        <br>
        <a href="{{ route('tim.create') }}">Create</a>

        @if(count($errors) > 0)
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
                <th>Semester</th>
                <th>Prodi</th>
                <th>Final Skor</th>
                <th>Asdos</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>          
            @foreach ($tims as $tim)
                @if (Auth::User()->id == $tim->created_by_id)
                    <tr>
                        <td>{{ $tim->id }}</td>
                        <td>{{ $tim->nama }}</td> 
                        <td>{{ $tim->semester->nama }}</td> 
                        <td>{{ $tim->prodi->nama }}</td> 
                        <td>{{ $tim->final_skor }}</td>                     
                        <td>{{ (is_null($tim->asisten_dosen)? "Belum Ada":$tim->asisten_dosen->nama) }}</td>   
                        <td>{{ $tim->created_by->nama }}</td>
                        <td><a href="{{ route('tim.show', $tim->id) }}">Read</a></td>
                        @if (Auth::User()->role == 'Admin')
                            <td><a href="{{ route('tim.edit', $tim->id) }}">Edit</a></td>
                            <form action="{{ route('tim.destroy', $tim->id)}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <td><button onclick="return confirm('Apakah yakin dihapus?')" type="submit">Delete</button></td>
                            </form> 
                        @endif                    
                    </tr>
                @endif
            @endforeach            
        </table>
    </body>
</html>