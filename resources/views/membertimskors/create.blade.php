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

        <form action="{{ route('membertimskor.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Member Tim Skor</th>
                </tr>   
                <tr>
                    <td>Member Tim</td>
                    <td>
                        <select name="member_tim_id">
                            <option disabled selected>Pilih Member Tim</option>
                            @foreach ($membertims as $membertim)
                                <option value="{{ $membertim->id }}" {{ (old("member_tim_id") == $membertim->id ? "selected":"") }}>{{ $membertim->mahasiswa->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td>Skor</td>
                    <td><input type="number" name="skor" value="{{ old('skor') }}"></td>
                </tr>
                <tr>
                    <td><a href="{{ route('membertimskor.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>