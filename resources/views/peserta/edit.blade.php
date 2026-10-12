<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div
            style="max-width: 600px; margin: 0 auto; background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem;">Edit Data Peserta
            </h2>

            {{-- Pesan Error Validasi --}}
            @if ($errors->any())
                <div
                    style="background-color: #fee2e2; color: #dc2626; padding: 0.8rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.875rem;">
                    <ul style="margin: 0; padding-left: 1.2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input No. Pendaftaran (DIUBAH: Dibuat readonly agar tidak bisa diubah saat edit) -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">No. Pendaftaran</label>
                    <input type="text" name="no_pendaftaran"
                        value="{{ old('no_pendaftaran', $peserta->no_pendaftaran) }}" readonly
                        style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f1f5f9; color: #64748b; cursor: not-allowed;">
                    <small style="color: #64748b; font-size: 0.75rem;">Nomor pendaftaran bersifat tetap dan tidak dapat
                        diubah.</small>
                </div>

                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Nama
                        Peserta</label>
                    <input type="text" name="nama_peserta" value="{{ old('nama_peserta', $peserta->nama_peserta) }}"
                        required
                        style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 1rem;">
                    <label
                        style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Email</label>
                    <input type="email" name="email" value="{{ old('email', $peserta->email) }}" required
                        style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; box-sizing: border-box;">
                </div>

                <!-- Input No. HP / WA pada form edit.blade.php -->
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; font-weight: 600; margin-bottom: 0.4rem;">No. HP / WA</label>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $peserta->no_hp) }}" maxlength="15"
                        required style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px;">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: #334155; margin-bottom: 0.4rem;">Pilih
                        Skema</label>
                    <select name="skema_id" required
                        style="width: 100%; padding: 0.6rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: white; box-sizing: border-box;">
                        <option value="">-- Pilih Skema --</option>
                        @foreach ($skemas as $s)
                            <option value="{{ $s->id }}"
                                {{ old('skema_id', $peserta->skema_id) == $s->id ? 'selected' : '' }}>
                                {{ $s->kd_skema }} - {{ $s->nm_skema }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <a href="{{ route('peserta.index') }}"
                        style="background: #e2e8f0; color: #334155; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem;">Batal</a>
                    <button type="submit"
                        style="background: #d97706; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; border: none; font-weight: 700; font-size: 0.875rem; cursor: pointer;">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
