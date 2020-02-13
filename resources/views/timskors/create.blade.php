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

        <form action="{{ route('timskor.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Tim Skor</th>
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
                    <td>Skor</td>
                    <td><input type="number" name="skor" value="{{ old('skor') }}"></td>
                </tr>
                <tr>
                    <td><a href="{{ route('timskor.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>