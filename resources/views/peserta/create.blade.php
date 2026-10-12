<x-app-layout>
    <!-- Kontainer utama untuk tata letak halaman dengan latar belakang abu-abu terang -->
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">

        <!-- Kotak kartu (card) putih di tengah layar sebagai wadah form -->
        <div style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">

            <!-- Judul halaman -->
            <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">Tambah Peserta Baru</h2>

            <!-- Blok untuk menampilkan pesan error jika validasi input dari controller gagal -->
            @if ($errors->any())
                <div style="background-color: #fee2e2; color: #dc2626; padding: 0.8rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.875rem;">
                    <ul style="margin: 0; padding-left: 1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form untuk mengirim data peserta baru ke route 'peserta.store' -->
            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf <!-- Token keamanan wajib di Laravel untuk melindungi form dari serangan CSRF -->

                <!-- Input No. Pendaftaran (DIUBAH: Dibuat otomatis terisi dari controller dan dikunci/readonly agar tidak bisa diketik manual) -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">No. Pendaftaran</label>
                    <input type="text" name="no_pendaftaran" value="{{ $noPendaftaranOtomatis }}" readonly
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f1f5f9; color: #64748b; cursor: not-allowed;">
                    <small style="color: #64748b; font-size: 0.75rem;">Nomor pendaftaran diisi secara otomatis oleh sistem.</small>
                </div>

                <!-- Input Nama Peserta (Hanya boleh berisi huruf dan spasi sesuai validasi controller) -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nama Peserta</label>
                    <input type="text" name="nama_peserta" value="{{ old('nama_peserta') }}" placeholder="Masukkan nama lengkap" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input Email Peserta -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Contoh: email@domain.com" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input No. HP / WA (DIUBAH: Ditambahkan atribut maxlength agar digitnya dibatasi maksimal 15 karakter) -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">No. HP / WA</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" maxlength="20" placeholder="Contoh: 081234567890" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Dropdown Pilih Skema Sertifikasi -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Pilih Skema</label>
                    <select name="skema_id" required style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                        <option value="">-- Pilih Skema --</option>

                        <!-- Melakukan perulangan untuk menampilkan daftar pilihan skema dari database -->
                        @foreach($skemas as $s)
                            <option value="{{ $s->id }}" {{ old('skema_id') == $s->id ? 'selected' : '' }}>
                                {{ $s->kd_skema }} - {{ $s->nm_skema }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Navigasi Batal dan Simpan -->
                <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <!-- Tombol kembali ke halaman daftar peserta -->
                    <a href="{{ route('peserta.index') }}" style="background: #e2e8f0; color: #334155; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Batal</a>

                    <!-- Tombol untuk mengirim/menyimpan data form -->
                    <button type="submit" style="background: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; border: none; font-weight: 700; cursor: pointer;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
