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

        <form action="{{ route('mvpproject.update', $mvpproject->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>
                <tr>
                    <td>Project</td>
                    <td>
                        <select name="project_id">
                            <option value="{{ $mvpproject->proejct_id }}" disabled selected>{{ $mvpproject->project->nama }}</option>
                            @foreach ($projects as $project)                                
                                <option value="{{ $project->id }}">{{ $project->nama }}</option>  
                            @endforeach                                                                  
                        </select>
                    </td>                 
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="date" name="tanggal_rilis" value="{{ $mvpproject->tanggal_rilis }}"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ $mvpproject->deskripsi }}</textarea></td>
                </tr>
                <tr>
                    <td><a href="{{ route('mvpproject.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>