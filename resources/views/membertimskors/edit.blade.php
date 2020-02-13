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

        <form action="{{ route('membertimskor.update', $membertimskor->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Member Tim Skor</th>
                </tr>                   
                <tr>
                    <td>Member Tim</td>
                    <td>
                        <select name="member_tim_id">
                            <option value="{{ $membertimskor->member_tim_id }}" disabled selected>{{ $membertimskor->member_tim->mahasiswa->nama }}</option>
                            @foreach ($membertims as $membertim)                                
                                <option value="{{ $membertim->id }}">{{ $membertim->mahasiswa->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Skor</td>
                    <td><input type="number" name="skor" value="{{ $membertimskor->skor }}"></td>                
                </tr>
                <tr>
                    <td><a href="{{ route('membertimskor.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>