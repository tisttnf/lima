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

        <form action="{{ route('membertim.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Member Tim</th>
                </tr>   
                <tr>
                    <td>Tim</td>
                    <td>
                        <select name="tim_id">
                            <option disabled selected>Pilih Tim</option>
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
                            <option disabled selected>Pilih Mahasiswa</option>
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
                            <option disabled selected>Pilih Peran</option>
                            @foreach ($perans as $peran)
                                <option value="{{ $peran->id }}" {{ (old("peran_id") == $peran->id ? "selected":"") }}>{{ $peran->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Tanggung Jawab</td>
                    <td><textarea name="tanggung_jawab">{{ old('tanggung_jawab') }}</textarea></td>
                </tr>
                <tr>
                    <td><a href="{{ route('membertim.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>