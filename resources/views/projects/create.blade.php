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

        <form action="{{ route('project.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Prodi</th>
                </tr>   
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ old('nama') }}"></td>                
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi">{{ old('deskripsi') }}</textarea></td>                
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td><input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"></td>                
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td><input type="date" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}"></td>
                </tr>
                <tr>
                    <td>Budget</td>
                    <td><input type="text" name="budget" id="budget" value="{{ old('budget') }}"></td>   
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <select name="semester_id">
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ (old("semester_id") == $semester->id ? "selected":"") }}>{{ $semester->nama }}</option>
                            @endforeach                                  
                        </select>
                    </td>                
                </tr>
                <tr>
                    <td><a href="{{ route('project.index') }}">Kembali</a></td>
                    <td><button type="submit">Create</button></td>
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