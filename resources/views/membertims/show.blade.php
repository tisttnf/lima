<html>
    <body>        
        <form action="{{ route('membertim.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Member Tim</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $membertim->id }}</td>                
                </tr>
                <tr>
                    <td>Tim</td>
                    <td>{{ $membertim->tim->nama }}</td>                
                </tr>
                <tr>
                    <td>Mahasiswa</td>
                    <td>{{ $membertim->mahasiswa->nama }}</td>                
                </tr>
                <tr>
                    <td>Peran</td>
                    <td>{{ $membertim->peran->nama }}</td>                
                </tr>
                <tr>
                    <td>Tanggung Jawab</td>
                    <td>{{ $membertim->tanggung_jawab }}</td>                
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td>{{ $membertim->final_skor }}</td>                
                </tr>
                <tr>
                    <td>Created By</td>
                    <td>{{ $membertim->created_by->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $membertim->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $membertim->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('membertim.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>