<x-app-layout>
    <!-- Kontainer utama halaman form tambah skema -->
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">
            <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">Tambah Skema Baru</h2>

            <form action="{{ route('skema.store') }}" method="POST">
                @csrf <!-- Token keamanan wajib di Laravel untuk form POST -->

                <!-- (DIUBAH) Input Kode Skema otomatis dan terkunci (readonly) -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Kode Skema</label>
                    <input type="text" name="kd_skema" value="{{ $kdSkemaOtomatis }}" readonly
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f1f5f9; color: #64748b; cursor: not-allowed;">
                    <small style="color: #64748b; font-size: 0.75rem;">Kode skema digenerate secara otomatis oleh sistem.</small>
                </div>

                <!-- Input Nama Skema -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nama Skema</label>
                    <input type="text" name="nm_skema" value="{{ old('nm_skema') }}" placeholder="Masukkan nama skema" required style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input Jenis Skema -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jenis Skema</label>
                    <input type="text" name="jenis" value="{{ old('jenis') }}" placeholder="Contoh: KKNI / Okupasi / Klaster" required style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input Jumlah Unit -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jumlah Unit</label>
                    <input type="number" name="jml_unit" value="{{ old('jml_unit') }}" placeholder="Contoh: 10" required style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Tombol Navigasi Batal dan Simpan -->
                <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <a href="{{ route('skema.index') }}" style="background: #e2e8f0; color: #334155; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Batal</a>
                    <button type="submit" style="background: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; border: none; font-weight: 700; cursor: pointer;">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
