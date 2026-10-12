<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 600px; margin: 0 auto;">

            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.75rem;">Edit Profil Pendaftaran Saya</h2>

                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- No Pendaftaran (Dikunci / Readonly karena kunci utama) -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 0.4rem;">No. Pendaftaran</label>
                        <input type="text" value="{{ $peserta->no_pendaftaran ?? '' }}" disabled style="width: 100%; padding: 0.75rem; background-color: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 8px; font-family: monospace; color: #64748b;">
                        <small style="color: #94a3b8; font-size: 0.75rem;">Nomor pendaftaran bersifat tetap dan tidak dapat diubah.</small>
                    </div>

                    <!-- Nama Lengkap -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 0.4rem;">Nama Lengkap</label>
                        <input type="text" name="nama_peserta" value="{{ old('nama_peserta', $peserta->nama_peserta ?? '') }}" required style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                        @error('nama_peserta')
                            <span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email (Readonly) -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 0.4rem;">Email</label>
                        <input type="email" value="{{ $peserta->email ?? '' }}" disabled style="width: 100%; padding: 0.75rem; background-color: #f1f5f9; border: 1px solid #cbd5e1; border-radius: 8px; color: #64748b;">
                    </div>

                    <!-- No HP -->
                    <div style="margin-bottom: 1.25rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 0.4rem;">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp ?? '') }}" required style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                        @error('no_hp')
                            <span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Pilihan Skema -->
                    <div style="margin-bottom: 1.75rem;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 700; color: #475569; margin-bottom: 0.4rem;">Skema Sertifikasi</label>
                        <select name="skema_id" required style="width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem; background-color: white;">
                            @foreach($skemas as $skema)
                                <option value="{{ $skema->id }}" {{ (isset($peserta) && $peserta->skema_id == $skema->id) ? 'selected' : '' }}>
                                    {{ $skema->kd_skema }} - {{ $skema->nm_skema }}
                                </option>
                            @endforeach
                        </select>
                        @error('skema_id')
                            <span style="color: #ef4444; font-size: 0.8rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div style="display: flex; gap: 1rem;">
                        <button type="submit" style="background-color: #4f46e5; color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; font-weight: 700; cursor: pointer; font-size: 0.9rem;">Simpan Perubahan</button>
                        <a href="{{ route('user.dashboard') }}" style="background-color: #e2e8f0; color: #334155; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; font-weight: 700; display: inline-block; font-size: 0.9rem;">Batal</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
