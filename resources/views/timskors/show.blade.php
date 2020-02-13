<html>
    <body>        
        <form action="{{ route('timskor.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $timskor->id }}</td>                
                </tr>
                <tr>
                    <td>Tim</td>
                    <td>{{ $timskor->tim->nama }}</td>                
                </tr>
                <tr>
                    <td>Penilai</td>
                    <td>{{ $timskor->penilai->nama }}</td>                
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>{{ $timskor->tanggal }}</td>                
                </tr>
                <tr>
                    <td>Skor</td>
                    <td>{{ $timskor->skor }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $timskor->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $timskor->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('timskor.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>