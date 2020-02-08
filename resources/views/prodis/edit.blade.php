<html>
    <body>        

        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif

        @if (session('message'))
            {{ session('message') }}
        @endif

        <form action="{{ route('prodi.update', $prodi->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ $prodi->nama }}"></td>                
                </tr>
                <tr>
                    <td><a href="{{ route('prodi.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>