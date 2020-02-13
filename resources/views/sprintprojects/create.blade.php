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

        <form action="{{ route('sprintproject.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Sprint Project</th>
                </tr>   
                <tr>
                    <td>Project</td>
                    <td>
                        <select name="project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ (old("project_id") == $project->id ? "selected":"") }}>{{ $project->nama }}</option>                                 
                            @endforeach                                  
                        </select>
                    </td>                 
                </tr>
                <tr>
                    <td>Project</td>
                    <td>
                        <select name="project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ (old("project_id") == $project->id ? "selected":"") }}>{{ $project->nama }}</option>                                 
                            @endforeach                                  
                        </select>
                    </td>                 
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"></td>
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td><input type="date" name="tanggal_akhir" value="{{ old('tanggal_akir') }}"></td>
                </tr>
                <tr>
                    <td><a href="{{ route('sprintproject.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
                </tr>
            </table>
        </form>

    </body>
</html>