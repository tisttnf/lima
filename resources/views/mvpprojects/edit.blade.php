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
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ $mvpproject->nama }}"></td>                
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ $mvpproject->deskripsi }}</textarea></td> 
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="date" name="tanggal_mulai" value="{{ $mvpproject->tanggal_mulai }}"></td> 
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td><input type="date" name="tanggal_akhir" value="{{ $mvpproject->tanggal_akhir }}"></td> 
                </tr>
                <tr>
                    <td>Budget</td>
                    <td><input type="number" name="budget" value="{{ $mvpproject->budget }}"></td> 
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="{{ $mvpproject->status }}" disabled selected>{{ $mvpproject->status }}</option>
                            <option value="Propose">Propose</option>
                            <option value="On Going">On Going</option>
                            <option value="Done">Done</option>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Persen</td>
                    <td><input type="number" name="persen" value="{{ $mvpproject->persen }}"></td>  
                </tr>                
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="semester_id">
                            <option value="{{ $mvpproject->semester_id }}" disabled selected>{{ $mvpproject->semester->nama }}</option>
                            @foreach ($semesters as $semester)                                
                                <option value="{{ $semester->id }}">{{ $semester->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Tim</td>
                    <td>
                        <select name="tim_id">
                            @if(!is_null($mvpproject->tim_id))
                                <option value="{{ $mvpproject->tim_id }}" disabled selected>{{ $mvpproject->tim->nama }}</option>
                            @else
                                <option disabled selected>Pilih Tim</option>
                            @endif                              
                            @foreach ($tims as $tim)                                
                                <option value="{{ $tim->id }}">{{ $tim->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td><input type="number" name="final_skor" value="{{ $mvpproject->final_skor }}"></td> 
                </tr>
                <tr>
                    <td><a href="{{ route('mvpproject.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>