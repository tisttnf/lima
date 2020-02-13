<html>
    <body>        
        <form action="{{ route('membertimskor.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $membertimskor->id }}</td>                
                </tr>
                <tr>
                    <td>Member Tim</td>
                    <td>{{ $membertimskor->member_tim->mahasiswa->nama }}</td>                
                </tr>
                <tr>
                    <td>Penilai</td>
                    <td>{{ $membertimskor->penilai->nama }}</td>                
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>{{ $membertimskor->tanggal }}</td>                
                </tr>
                <tr>
                    <td>Skor</td>
                    <td>{{ $membertimskor->skor }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $membertimskor->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $membertimskor->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('membertimskor.index') }}">Kembali</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>