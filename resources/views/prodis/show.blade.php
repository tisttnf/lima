<html>
    <body>        
        <form action="{{ route('prodi.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $prodi->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $prodi->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $prodi->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $prodi->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('prodi.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>