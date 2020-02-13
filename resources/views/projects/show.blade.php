<html>
    <body>        
        <form action="{{ route('project.store')}}" method="post">
            {{ csrf_field() }}
            <table border=1>
                <tr>
                    <th>Project</th>
                </tr>   
                <tr>
                    <td>ID</td>
                    <td>{{ $project->id }}</td>                
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>{{ $project->nama }}</td>                
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>{{ $project->deskripsi }}</td>                
                </tr>
                <tr>
                    <td>Tanggal Mulai</td>
                    <td>{{ $project->tanggal_mulai }}</td>
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td>{{ $project->tanggal_akhir }}</td>
                </tr>
                <tr>
                    <td>Jumlah Sprint</td>
                    <td>{{ $project->jumlah_sprint }}</td>
                </tr>
                <tr>
                    <td>Budget</td>
                    <td>Rp. {{ number_format($project->budget) }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $project->status }}</td>
                </tr>
                <tr>
                    <td>Persen</td>
                    <td>{{ $project->persen }}</td> 
                </tr>                
                <tr>
                    <td>Semester</td>
                    <td>{{ $project->semester_id }}</td>
                </tr>
                <tr>
                    <td>Tim</td>
                    <td>{{ $project->tim_id }}</td>
                </tr>
                <tr>
                    <td>Final Skor</td>
                    <td>{{ $project->final_skor }}</td>
                </tr>
                <tr>
                    <td>Created By</td>
                    <td>{{ $project->created_by->nama }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $project->created_at }}</td>                
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $project->updated_at }}</td>                
                </tr>	
                <tr>
                    <td><a href="{{ route('project.index') }}">Kembali</a></td>
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