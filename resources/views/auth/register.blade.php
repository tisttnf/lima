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

        <form method="POST" action="{{ route('register') }}" id="register">
            {{ csrf_field() }}

            <table border=1>
                <tr>
                    <th>Register</th>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="{{ old('nama') }}" required autofocus></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <select name="role">
                            <option disabled selected>Pilih Role</option>       
                            <option value="Admin">Admin</option>                    
                            <option value="Project Owner">Project Owner</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Asisten Dosen">Asisten Dosen</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" value="{{ old('email') }}" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="password_confirmation" required></td>
                </tr>
                <tr>
                    <td>No Handphone</td>
                    <td><input type="text" name="nohp" value="{{ old('nohp') }}" required></td>
                </tr>
                <tr>
                    <td>NIDN</td>
                    <td><input type="text" name="nidn" value="{{ old('nidn') }}"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" value="{{ old('nim') }}"></td>
                </tr>
                <tr>
                    <td><a href="{{ url('/') }}">Kembali</a></td>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </td>
                </tr>
            </table>
        </form>
        <script type="text/javascript">
            function toggleShared() {
                var form = this.form,
                    role = form.elements.role,
                    nidn = form.elements.nidn.parentNode.parentNode,
                    nim = form.elements.nim.parentNode.parentNode;
                nidn.style.display = 'none';
                nim.style.display = 'none';
            
                if (role.value == 'Dosen') {
                    nidn.style.display = '';
                }else if (role.value == 'Asisten Dosen') {
                    nim.style.display = '';
                }else if (role.value == 'Mahasiswa'){
                    nim.style.display = '';
                }
            }
        
            var form = document.getElementById('register');
            form.elements.role.onchange = toggleShared;
            form.elements.role.onchange();
        </script>
    </body>
</html>