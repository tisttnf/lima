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

        <form action="{{ route('tim.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ old('nama') }}"></td>                
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="semester_id">
                            <option disabled selected>Pilih Semester</option>
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ (old("semester_id") == $semester->id ? "selected":"") }}>{{ $semester->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select name="prodi_id">
                            <option disabled selected>Pilih Prodi</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id }}" {{ (old("prodi_id") == $prodi->id ? "selected":"") }}>{{ $prodi->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td><a href="{{ route('tim.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>