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

        <form action="{{ route('mvpproject.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>MVP Project</th>
                </tr>   
                <tr>
                    <td>Project</td>
                    <td>
                        <select name="project_id">
                            <option disabled selected>Pilih Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ (old("project_id") == $project->id ? "selected":"") }}>{{ $project->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td>                 
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="date" name="tanggal_rilis" value="{{ old('tanggal_rilis') }}"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ old('deskripsi') }}</textarea></td>
                </tr>
                <tr>
                    <td><a href="{{ route('mvpproject.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>

    </body>
</html>