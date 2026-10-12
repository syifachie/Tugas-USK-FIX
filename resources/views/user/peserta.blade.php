<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.75rem;">Data Pendaftaran Saya</h2>

                @if($peserta)
                    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <th style="padding: 0.85rem 1rem; color: #64748b; width: 30%;">No. Pendaftaran</th>
                            <td style="padding: 0.85rem 1rem; font-family: monospace; font-weight: 700; color: #4f46e5;">{{ $peserta->no_pendaftaran }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <th style="padding: 0.85rem 1rem; color: #64748b;">Nama Lengkap</th>
                            <td style="padding: 0.85rem 1rem; font-weight: 700; color: #0f172a;">{{ $peserta->nama_peserta }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <th style="padding: 0.85rem 1rem; color: #64748b;">Email</th>
                            <td style="padding: 0.85rem 1rem; color: #334155;">{{ $peserta->email }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <th style="padding: 0.85rem 1rem; color: #64748b;">No. HP / WhatsApp</th>
                            <td style="padding: 0.85rem 1rem; color: #334155;">{{ $peserta->no_hp }}</td>
                        </tr>
                        <tr>
                            <th style="padding: 0.85rem 1rem; color: #64748b;">Skema Dipilih</th>
                            <td style="padding: 0.85rem 1rem;">
                                <span style="background-color: #f1f5f9; color: #0f172a; padding: 0.3rem 0.6rem; border-radius: 6px; font-weight: 600;">
                                    {{ $peserta->skema ? $peserta->skema->kd_skema . ' - ' . $peserta->skema->nm_skema : '-' }}
                                </span>
                            </td>
                        </tr>
                    </table>
                @else
                    <p style="text-align: center; color: #64748b; padding: 2rem;">Data peserta Anda belum terhubung.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
