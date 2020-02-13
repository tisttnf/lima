<html>
    <body>        
        <form action="{{ route('tim.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $tim->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $tim->nama }}</td>                
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $tim->semester->nama }}</td>                
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>{{ $tim->prodi->nama }}</td>                
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td>{{ $tim->final_skor }}</td>                
                </tr>
                <tr>
                    <td>Asisten Dosen</td>
                    <td>{{ (is_null($tim->asisten_dosen)? "Belum Ada":$tim->asisten_dosen->nama) }}</td>                
                </tr>
                <tr>
                    <td>Created By</td>
                    <td>{{ $tim->created_by->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $tim->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $tim->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('tim.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>