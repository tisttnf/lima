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

        <form action="{{ route('membertim.update', $membertim->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Member Tim</th>
                </tr>   
                <tr>
                    <td>Tim</td>
                    <td>
                        <select name="tim_id">
                            <option value="{{ $membertim->tim_id }}" disabled selected>{{ $membertim->tim->nama }}</option>
                            @foreach ($tims as $tim)
                                <option value="{{ $tim->id }}" {{ (old("tim_id") == $tim->id ? "selected":"") }}>{{ $tim->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Mahasiswa</td>
                    <td>
                        <select name="mahasiswa_id">
                            <option value="{{ $membertim->mahasiswa_id }}" disabled selected>{{ $membertim->mahasiswa->nama }}</option>
                            @foreach ($mahasiswas as $mahasiswa)
                                <option value="{{ $mahasiswa->id }}" {{ (old("mahasiswa_id") == $mahasiswa->id ? "selected":"") }}>{{ $mahasiswa->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Peran</td>
                    <td>
                        <select name="peran_id">
                            <option value="{{ $membertim->peran_id }}" disabled selected>{{ $membertim->peran->nama }}</option>
                            @foreach ($perans as $peran)
                                <option value="{{ $peran->id }}" {{ (old("peran_id") == $peran->id ? "selected":"") }}>{{ $peran->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Tanggung Jawab</td>
                    <td><textarea name="tanggung_jawab">{{ $membertim->tanggung_jawab }}</textarea></td>
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td><input type="number" name="final_skor" value="{{ $membertim->final_skor }}"></td>
                </tr>
                <tr>
                    <td><a href="{{ route('membertim.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>