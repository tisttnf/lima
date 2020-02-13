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

        <form action="{{ route('timskor.update', $timskor->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Tim Skor</th>
                </tr>                   
                <tr>
                    <td>Tim</td>
                    <td>
                        <select name="tim_id">
                            <option value="{{ $timskor->tim_id }}" disabled selected>{{ $timskor->tim->nama }}</option>
                            @foreach ($tims as $tim)                                
                                <option value="{{ $tim->id }}">{{ $tim->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Skor</td>
                    <td><input type="number" name="skor" value="{{ $timskor->skor }}"></td>                
                </tr>
                <tr>
                    <td><a href="{{ route('timskor.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>