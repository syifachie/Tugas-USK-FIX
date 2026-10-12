<x-guest-layout>
    <!-- Kontainer utama card login yang berada di tengah layar -->
    <div style="width: 100%; max-width: 400px; background: #ffffff; border-radius: 12px; box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.12), 0 8px 10px -6px rgba(15, 23, 42, 0.04); overflow: hidden; border: 1px solid #e2e8f0;">

        <!-- Header Card dengan latar belakang Navy dan aksen garis bawah Teal -->
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 1.25rem 1.5rem; text-align: center; border-bottom: 3px solid #0d9488;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                <!-- Ikon logo kecil di header -->
                <div style="width: 32px; height: 32px; background: #0d9488; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>
                </div>
                <span style="font-size: 1.15rem; font-weight: 700; color: #ffffff; letter-spacing: 0.3px;">Sistem Sertifikasi</span>
            </div>
        </div>

        <!-- Bagian Isi/Form Login -->
        <div style="padding: 1.5rem;">

            <!-- Menampilkan status sesi autentikasi jika ada -->
            <x-auth-session-status style="margin-bottom: 1rem; font-size: 0.85rem;" :status="session('status')" />

            <!-- Form login yang mengirim data dengan metode POST ke route 'login' -->
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Token keamanan CSRF wajib di Laravel -->

                <!-- Input Field untuk Email -->
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; font-weight: 600; font-size: 0.825rem; color: #334155; margin-bottom: 0.35rem;">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           placeholder="Masukkan email Anda"
                           style="width: 100%; padding: 0.6rem 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; outline: none; box-sizing: border-box; background-color: #ffffff;"
                           onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 2px rgba(13, 148, 136, 0.15)';"
                           onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">
                    <x-input-error :messages="$errors->get('email')" style="margin-top: 0.3rem; font-size: 0.75rem; color: #ef4444;" />
                </div>

                <!-- Input Field untuk Password dengan Fitur Toggle (Intip Password) -->
                <div style="margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.35rem;">
                        <label for="password" style="font-weight: 600; font-size: 0.825rem; color: #334155;">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 0.75rem; font-weight: 600; color: #0d9488; text-decoration: none;">Lupa?</a>
                        @endif
                    </div>
                    <div style="position: relative;">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               placeholder="••••••••"
                               style="width: 100%; padding: 0.6rem 2.5rem 0.6rem 0.8rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; outline: none; box-sizing: border-box; background-color: #ffffff;"
                               onfocus="this.style.borderColor='#0d9488'; this.style.boxShadow='0 0 0 2px rgba(13, 148, 136, 0.15)';"
                               onblur="this.style.borderColor='#cbd5e1'; this.style.boxShadow='none';">

                        <!-- Tombol Ikon Mata untuk Menyembunyikan/Menampilkan Password -->
                        <button type="button" onclick="togglePassword()" style="position: absolute; right: 0.75rem; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #64748b; padding: 0; display: flex; align-items: center;">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" style="margin-top: 0.3rem; font-size: 0.75rem; color: #ef4444;" />
                </div>

                <!-- Checkbox Ingat Saya (Remember Me) -->
                <div style="display: flex; align-items: center; margin-bottom: 1.25rem;">
                    <input id="remember_me" type="checkbox" name="remember" style="width: 0.9rem; height: 0.9rem; border-radius: 4px; accent-color: #0d9488; cursor: pointer;">
                    <label for="remember_me" style="margin-left: 0.4rem; font-size: 0.8rem; color: #64748b; cursor: pointer;">Ingat saya</label>
                </div>

                <!-- Tombol Submit / Tombol Masuk -->
                <button type="submit" style="width: 100%; background: #0f172a; color: #ffffff; font-weight: 600; font-size: 0.875rem; padding: 0.7rem; border: none; border-radius: 6px; cursor: pointer; transition: all 0.2s; letter-spacing: 0.2px;"
                        onmouseover="this.style.backgroundColor='#1e293b'"
                        onmouseout="this.style.backgroundColor='#0f172a'">
                    Masuk
                </button>
            </form>

            <!-- Tautan Navigasi Tambahan (Tombol Kembali & Daftar) -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1.25rem; pt-3; border-top: 1px solid #f1f5f9; padding-top: 1rem; font-size: 0.8rem;">
                <!-- Tombol Kembali ke Halaman Utama / Welcome -->
                <a href="{{ url('/') }}" style="color: #64748b; text-decoration: none; font-weight: 600;">
                    &larr; Kembali
                </a>

                <!-- Tautan menuju halaman Register jika belum punya akun -->
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="color: #0d9488; text-decoration: none; font-weight: 600;">
                        Belum punya akun? Daftar
                    </a>
                @endif
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
