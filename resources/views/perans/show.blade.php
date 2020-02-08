<html>
    <body>        
        <form action="{{ route('peran.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Semester</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $peran->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $peran->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $peran->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $peran->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('peran.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>