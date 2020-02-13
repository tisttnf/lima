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

        <form action="{{ route('tim.update', $tim->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ $tim->nama }}"></td>                
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="semester_id">
                            <option value="{{ $tim->semester_id }}" disabled selected>{{ $tim->semester->nama }}</option>
                            @foreach ($semesters as $semester)                                
                                <option value="{{ $semester->id }}">{{ $semester->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>
                        <select name="prodi_id">
                            <option value="{{ $tim->prodi_id }}" disabled selected>{{ $tim->prodi->nama }}</option>
                            @foreach ($prodis as $prodi)                                
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td><input type="number" name="final_skor" value="{{ $tim->final_skor }}"></td>                
                </tr>
                <tr>
                    <td>Asisten Dosen</td>
                    <td>
                        <select name="asisten_dosen_id">
                            @if(!is_null($tim->asisten_dosen_id))
                                <option value="{{ $tim->asisten_dosen_id }}" disabled selected>{{ $tim->asisten_dosen->nama }}</option>
                            @else
                                <option disabled selected>Pilih Asisten Dosen</option>
                            @endif                 
                                <option value="">Belum Ada</option>             
                            @foreach ($asisten_dosens as $asisten_dosen)                                
                                <option value="{{ $asisten_dosen->id }}">{{ $asisten_dosen->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td><a href="{{ route('tim.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </body>
</html>