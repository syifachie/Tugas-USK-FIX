<x-guest-layout>
    <!-- Kontainer utama dengan latar belakang abu-abu terang di tengah layar -->
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background-color: #f1f5f9; padding: 1rem;">

        <!-- Kotak kartu (card) putih yang desainnya disamakan persis dengan halaman login -->
        <div style="width: 100%; max-width: 420px; background: #ffffff; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05); overflow: hidden; border: 1px solid #e2e8f0;">

            <!-- Header Kartu -->
            <div style="background-color: #1e293b; padding: 1.5rem; text-align: center; color: white;">
                <h2 style="font-size: 1.25rem; font-weight: 700; margin: 0;">Sistem Sertifikasi</h2>
                <p style="font-size: 0.8rem; color: #94a3b8; margin: 0.25rem 0 0 0;">Daftar Akun Baru Peserta</p>
            </div>

            <div style="padding: 1.5rem;">
                <!-- Session Status (Notifikasi jika akun berhasil dibuat) -->
                @if (session('status'))
                    <div style="background-color: #dcfce7; color: #15803d; padding: 0.75rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.875rem; font-weight: 600; text-align: center;">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Menampilkan pesan error validasi input -->
                @if ($errors->any())
                    <div style="background-color: #fee2e2; color: #dc2626; padding: 0.75rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.875rem;">
                        <ul style="margin: 0; padding-left: 1.2rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Register -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Input Nama Lengkap -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Masukkan nama lengkap Anda"
                               style="width: 100%; padding: 0.65rem 0.875rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; outline: none; box-sizing: border-box;">
                    </div>

                    <!-- Input Email -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email aktif"
                               style="width: 100%; padding: 0.65rem 0.875rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; outline: none; box-sizing: border-box;">
                    </div>

                    <!-- Input Password dengan Tombol Intip / Toggle Password -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Password</label>
                        <!-- (PERBAIKAN) Bungkus dengan position: relative agar ikon mata bisa menempel di dalam input -->
                        <div style="position: relative;">
                            <input id="password" type="password" name="password" required placeholder="Minimal 8 karakter"
                                   style="width: 100%; padding: 0.65rem 2.5rem 0.65rem 0.875rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; outline: none; box-sizing: border-box;">

                            <!-- Tombol Ikon Mata untuk Menyembunyikan/Menampilkan Password -->
                            <button type="button" onclick="togglePassword()" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #64748b; padding: 0; display: flex; align-items: center;">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: block; font-size: 0.875rem; font-weight: 600; color: #334155; margin-bottom: 0.5rem;">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                               style="width: 100%; padding: 0.65rem 0.875rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; outline: none; box-sizing: border-box;">
                    </div>

                    <!-- Tombol Aksi Register -->
                    <button type="submit" style="width: 100%; background-color: #1e293b; color: white; padding: 0.75rem; border: none; border-radius: 8px; font-weight: 700; font-size: 0.875rem; cursor: pointer; margin-bottom: 1rem;">
                        Daftar Akun
                    </button>
                </form>

                <!-- Tautan Kembali dan Pindah ke Login -->
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.8rem; border-top: 1px solid #f1f5f9; padding-top: 1rem;">
                    <!-- Tombol Kembali ke Halaman Utama / Welcome -->
                    <a href="{{ url('/') }}" style="color: #64748b; text-decoration: none; font-weight: 600;">
                        &larr; Kembali
                    </a>

                    <a href="{{ route('login') }}" style="color: #4f46e5; text-decoration: none; font-weight: 600;">
                        Sudah punya akun? Masuk
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Script JavaScript untuk Fungsi Toggle Lihat/Sembunyikan Password -->
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Mengubah ikon menjadi mata tercoret (Sembunyikan password)
                eyeIcon.innerHTML = '<path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.52 13.52 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/><line x1="2" x2="22" y1="2" y2="22"/>';
            } else {
                passwordInput.type = 'password';
                // Mengubah ikon kembali menjadi mata normal (Tampilkan password)
                eyeIcon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
            }
        }
    </script>
</x-guest-layout>
