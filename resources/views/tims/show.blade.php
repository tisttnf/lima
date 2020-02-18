<html>
    <body>        
        {{-- <form action="{{ route('tim.store')}}" method="post">
            {{ csrf_field() }} --}}
            <table border=1>
                <tr>
                    <th>Tim</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $tim->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $tim->nama }}</td>                
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{ $tim->semester->nama }}</td>                
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>{{ $tim->prodi->nama }}</td>                
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td>{{ $tim->final_skor }}</td>                
                </tr>
                <tr>
                    <td>Asisten Dosen</td>
                    {{-- <td>{{ (is_null($tim->asisten_dosen)? "Belum Ada":$tim->asisten_dosen->nama) }}</td>    --}}
                    @if (Auth::User()->role == 'Dosen')        
                        <form action="{{ route('tim.update', $tim->id)}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PATCH">      
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
                            <td>
                                <button type="submit">Pilih</button>
                            </td>
                        </form>                         
                    @else
                        <td>{{ $tim->asisten_dosen->nama }}</td>   
                    @endif
                </tr>
                @if (Auth::User()->role == 'Dosen')        
                    <tr>
                        <td>Member Tim</td>
                        <td>
                            <table border=1> 
                                <tr>
                                    <th>ID</th>                                    
                                    <th>Mahasiswa</th>
                                    <th>Peran</th>
                                    <th>Tanggung Jawab</th>
                                    <th>Final Skor</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>          
                                @foreach ($membertims as $membertim)
                                    <tr>
                                        <td>{{ $membertim->id }}</td> 
                                        <td>{{ $membertim->mahasiswa->nama }}</td> 
                                        <td>{{ $membertim->peran->nama }}</td>
                                        <td>{{ $membertim->tanggung_jawab }}</td>  
                                        <td>{{ $membertim->final_skor }}</td>                                        
                                        <form action="{{ route('membertimskor.store')}}" method="post">
                                            {{ csrf_field() }}    
                                            <input type="hidden" name="member_tim_id" value="{{ $membertim->id }}">
                                            <td><input type="number" name="skor" value="{{ old('skor') }}"></td>
                                            <td><button type="submit">Nilai</button></td>
                                        </form>
                                    </tr>
                                @endforeach            
                            </table>
                        </td>
                        <td>
                            <form action="{{ route('membertim.store')}}" method="post">
                                {{ csrf_field() }}
                                <table border=1>
                                    <tr>
                                        <th>Member Tim</th>
                                    </tr>   
                                    <tr>
                                        <td><input type="hidden" name="tim_id" value="{{ $tim->id }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Mahasiswa</td>
                                        <td>
                                            <select name="mahasiswa_id">
                                                <option disabled selected>Pilih Mahasiswa</option>
                                                @foreach ($mahasiswas as $mahasiswa)
                                                    <option value="{{ $mahasiswa->id }}" {{ (old("mahasiswa_id") == $mahasiswa->id ? "selected":"") }}>{{ $mahasiswa->nama }}</option>
                                                @endforeach                                  
                                            </select>
                                        </td>                
                                    </tr>
                                    <tr>
                                        <td>Peran</td>
                                        <td>
                                            <select name="peran_id">
                                                <option disabled selected>Pilih Peran</option>
                                                @foreach ($perans as $peran)
                                                    <option value="{{ $peran->id }}" {{ (old("peran_id") == $peran->id ? "selected":"") }}>{{ $peran->nama }}</option>
                                                @endforeach                                  
                                            </select>
                                        </td>                
                                    </tr>
                                    <tr>
                                        <td>Tanggung Jawab</td>
                                        <td><textarea name="tanggung_jawab">{{ old('tanggung_jawab') }}</textarea></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit">Create</button></td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>Created By</td>
                    <td>{{ $tim->created_by->nama }}</td>                
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $tim->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $tim->updated_at }}</td>                
                </tr>
                <tr>
                    <td><a href="{{ route('tim.index') }}">Kembali</a></td>
                </tr>
            </table>
        {{-- </form> --}}
    </body>
</html>