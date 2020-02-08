<html>
    <body>        
        <form action="{{ route('semester.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Semester</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $semester->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $semester->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $semester->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $semester->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('semester.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>