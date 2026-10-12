<x-app-layout>
    <!-- Kontainer utama halaman form edit skema -->
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0;">
            <h2 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 1.5rem;">Edit Skema Sertifikasi</h2>

            <!-- Pesan error validasi -->
            @if ($errors->any())
                <div style="background-color: #fee2e2; color: #dc2626; padding: 0.8rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.875rem;">
                    <ul style="margin: 0; padding-left: 1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('skema.update', $skema->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- (DIUBAH) Input Kode Skema dibuat readonly agar terkunci dan tidak bisa diubah -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Kode Skema</label>
                    <input type="text" name="kd_skema" value="{{ old('kd_skema', $skema->kd_skema) }}" readonly
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f1f5f9; color: #64748b; cursor: not-allowed;">
                    <small style="color: #64748b; font-size: 0.75rem;">Kode skema bersifat tetap dan tidak dapat diubah.</small>
                </div>

                <!-- Input Nama Skema -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Nama Skema</label>
                    <input type="text" name="nm_skema" value="{{ old('nm_skema', $skema->nm_skema) }}" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input Jenis Skema -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jenis Skema</label>
                    <input type="text" name="jenis" value="{{ old('jenis', $skema->jenis) }}" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Input Jumlah Unit -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">Jumlah Unit</label>
                    <input type="number" name="jml_unit" value="{{ old('jml_unit', $skema->jml_unit) }}" required
                           style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <!-- Tombol Aksi -->
                <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <a href="{{ route('skema.index') }}" style="background: #e2e8f0; color: #334155; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600;">Batal</a>
                    <button type="submit" style="background: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; border: none; font-weight: 700; cursor: pointer;">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
