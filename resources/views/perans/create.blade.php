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

        <form action="{{ route('peran.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ old('nama') }}"></td>                
                </tr>
                <tr>
                    <td><a href="{{ route('peran.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>