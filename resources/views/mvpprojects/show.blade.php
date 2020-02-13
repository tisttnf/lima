<html>
    <body>        
        <form action="{{ route('mvpproject.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>MVP Project</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $mvpproject->id }}</td>                
                </tr>
                <tr>
                    <td>Project</td>
                    <td>{{ $mvpproject->project->nama }}</td>                
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td>{{ $mvpproject->tanggal_rilis }}</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>{{ $mvpproject->deskripsi }}</td>
                </tr>
                <tr>
                    <td>Created By</td>
                    <td>{{ $mvpproject->created_by }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $mvpproject->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $mvpproject->updated_at }}</td>                
                </tr>	
                <tr>
                    <td><a href="{{ route('mvpproject.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>