<x-app-layout>
    <!-- Kontainer utama halaman detail skema -->
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 700px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">
            <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">Detail Skema Sertifikasi</h2>

            <!-- Informasi Detail Skema -->
            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Kode Skema</label>
                <p style="font-size: 1rem; font-weight: 700; color: #1e293b;">{{ $skema->kd_skema }}</p>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Nama Skema</label>
                <p style="font-size: 1rem; font-weight: 700; color: #1e293b;">{{ $skema->nm_skema }}</p>
            </div>

            <div style="margin-bottom: 1rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Jenis Skema</label>
                <p style="font-size: 1rem; color: #1e293b;">{{ $skema->jenis }}</p>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; font-weight: 600; color: #64748b; font-size: 0.875rem;">Jumlah Unit</label>
                <p style="font-size: 1rem; color: #1e293b;">{{ $skema->jml_unit }} Unit</p>
            </div>

            <!-- Tombol Kembali -->
            <div style="display: flex; justify-content: flex-end;">
                <a href="{{ route('skema.index') }}" style="background: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
