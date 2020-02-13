<html>
    <body>        
        <form action="{{ route('sprintproject.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>MVP Project</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $sprintproject->id }}</td>                
                </tr>
                <tr>
                    <td>Project</td>
                    <td>{{ $sprintproject->project->nama }}</td>                
                </tr>
                <tr>
                    <td>Sprint</td>
                    <td>{{ $sprintproject->sprint }}</td>                
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td>{{ $sprintproject->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td>{{ $sprintproject->tanggal_akhir }}</td>
                </tr>
                <tr>
                    <td>Created By</td>
                    <td>{{ $sprintproject->created_by }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $sprintproject->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $sprintproject->updated_at }}</td>                
                </tr>	
                <tr>
                    <td><a href="{{ route('sprintproject.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>