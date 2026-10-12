<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 1200px; margin: 0 auto;">

            @if(session('success'))
                <div style="background-color: #dcfce7; color: #15803d; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-weight: 600;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background-color: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">

                <!-- Header: Judul, Kotak Pencarian, dan Tombol Tambah -->
                <div style="padding: 1.25rem 1.5rem; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f1f5f9; flex-wrap: wrap; gap: 1rem;">
                    <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin: 0;">Data Peserta</h2>

                    <!-- (TAMBAHAN) Form Search Bar untuk Peserta -->
                    <form action="{{ route('peserta.index') }}" method="GET" style="display: flex; gap: 0.5rem; align-items: center; margin: 0;">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / no. pendaftaran..."
                               style="padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.875rem; outline: none; width: 580px;">
                        <button type="submit" style="background-color: #4f46e5; color: white; padding: 0.5rem 1rem; border-radius: 8px; border: none; font-weight: 600; cursor: pointer; font-size: 0.875rem;">Cari</button>
                        @if(request('search'))
                            <a href="{{ route('peserta.index') }}" style="background-color: #e2e8f0; color: #334155; padding: 0.5rem 0.75rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem;">Reset</a>
                        @endif
                    </form>

                    <a href="{{ route('peserta.create') }}" style="background-color: #4f46e5; color: white; padding: 0.6rem 1.2rem; border-radius: 8px; text-decoration: none; font-weight: 700;">
                        + Tambah Peserta
                    </a>
                </div>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #f8fafc; color: #475569; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; border-bottom: 1px solid #e2e8f0;">
                                <th style="padding: 1rem 1.5rem;">No</th>
                                <th style="padding: 1rem 1.5rem;">No. Pendaftaran</th>
                                <th style="padding: 1rem 1.5rem;">Nama Peserta</th>
                                <th style="padding: 1rem 1.5rem;">Email</th>
                                <th style="padding: 1rem 1.5rem;">No. HP</th>
                                <th style="padding: 1rem 1.5rem;">Skema</th>
                                <th style="padding: 1rem 1.5rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.875rem; color: #334155;">
                            @forelse($pesertas as $index => $p)
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 1rem 1.5rem;">{{ $index + 1 }}</td>
                                    <td style="padding: 1rem 1.5rem; font-family: monospace; font-weight: 700; color: #4f46e5;">{{ $p->no_pendaftaran }}</td>
                                    <td style="padding: 1rem 1.5rem; font-weight: 700; color: #0f172a;">{{ $p->nama_peserta }}</td>
                                    <td style="padding: 1rem 1.5rem;">{{ $p->email }}</td>
                                    <td style="padding: 1rem 1.5rem;">{{ $p->no_hp }}</td>
                                    <td style="padding: 1rem 1.5rem;">
                                        <span style="background-color: #f1f5f9; color: #334155; padding: 0.25rem 0.6rem; border-radius: 6px; font-weight: 600; font-size: 0.75rem;">
                                            {{ $p->skema->nm_skema ?? '-' }}
                                        </span>
                                    </td>
                                    <td style="padding: 1rem 1.5rem; display: flex; gap: 0.5rem; align-items: center;">
                                        <a href="{{ route('peserta.show', $p->id) }}" style="background-color: #f3f4f6; color: #1f2937; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 700; text-decoration: none;">Detail</a>
                                        <a href="{{ route('peserta.edit', $p->id) }}" style="background-color: #e0f2fe; color: #0369a1; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 700; text-decoration: none;">Edit</a>
                                        <form action="{{ route('peserta.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')" style="margin: 0;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #fee2e2; color: #dc2626; border: none; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 700; cursor: pointer;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" style="padding: 2.5rem 1.5rem; text-align: center; color: #94a3b8;">Data peserta tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
