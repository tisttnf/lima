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

        <form action="{{ route('sprintproject.update', $sprintproject->id)}}" method="post">
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
                            <option value="{{ $sprintproject->proejct_id }}" disabled selected>{{ $sprintproject->project->nama }}</option>
                            @foreach ($projects as $project)                                
                                <option value="{{ $project->id }}">{{ $project->nama }}</option>  
                            @endforeach                                                                  
                        </select>
                    </td>                 
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="date" name="tanggal_rilis" value="{{ $sprintproject->tanggal_rilis }}"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ $sprintproject->deskripsi }}</textarea></td>
                </tr>
                <tr>
                    <td><a href="{{ route('sprintproject.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>