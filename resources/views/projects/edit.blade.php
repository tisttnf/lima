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

        <form action="{{ route('project.update', $project->id)}}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ $project->nama }}"></td>                
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ $project->deskripsi }}</textarea></td> 
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="date" name="tanggal_mulai" value="{{ $project->tanggal_mulai }}"></td> 
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td><input type="date" name="tanggal_akhir" value="{{ $project->tanggal_akhir }}"></td> 
                </tr>
                <tr>
                    <td>Budget</td>
                    <td><input type="text" name="budget" id="budget" value="Rp. {{ number_format($project->budget) }}"></td> 
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option value="{{ $project->status }}" disabled selected>{{ $project->status }}</option>
                            <option value="Propose">Propose</option>
                            <option value="On Going">On Going</option>
                            <option value="Done">Done</option>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Persen</td>
                    <td><input type="number" name="persen" value="{{ $project->persen }}"></td>  
                </tr>                
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="semester_id">
                            <option value="{{ $project->semester_id }}" disabled selected>{{ $project->semester->nama }}</option>
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
                            @if(!is_null($project->tim_id))
                                <option value="{{ $project->tim_id }}" disabled selected>{{ $project->tim->nama }}</option>
                            @else
                                <option disabled selected>Pilih Tim</option>
                            @endif                              
                                <option value="">Belum Ada</option>
                            @foreach ($tims as $tim)                                
                                <option value="{{ $tim->id }}">{{ $tim->nama }}</option>  
                            @endforeach                                  
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td><input type="number" name="final_skor" value="{{ $project->final_skor }}"></td> 
                </tr>
                <tr>
                    <td><a href="{{ route('project.index') }}">Kembali</a></td>
                    <td><button type="submit">Update</button></td>
                </tr>
            </table>
        </form>

        <script type="text/javascript">
		
            var rupiah = document.getElementById('budget');
            rupiah.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');
            });
    
            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                rupiah     		= split[0].substr(0, sisa),
                ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>

    </body>
</html>