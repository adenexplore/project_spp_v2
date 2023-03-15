<h1 class="display-4">Data Karyawan</h1>
<table class="table" border="1">
    <thead>
        <tr>
            <th cope="col">No</th>
            <th cope="col">Id Petugas</th>
            <th cope="col">Nisn</th>
            <th cope="col">Tgl Bayar</th>
            <th cope="col">Bulan Dibayar</th>
            <th cope="col">Tahun Dibayar</th>
            <th cope="col">Tunggakan</th>
            <th cope="col">Id Spp</th>
            <th cope="col">Jumlah Bayar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporans as $laporan)
            <tr>
                <td>{{ ++$i }}</td>
                                <td>{{ $laporan->id_petugas }}</td>
                                <td>{{ $laporan->nisn }}</td>
                                <td>{{ $laporan->tgl_bayar}}</td>
                                <td>{{ $laporan->bulan_dibayar }}</td>
                                <td>{{ $laporan->tahun_dibayar }}</td>
                                <td>{{ $laporan->tunggakan}} Bulan</td>
                                <td>{{ $laporan->id_spp }}</td>
                                <td>{{ $laporan->jumlah_bayar }}</td>
            </tr>
        @endforeach
    </tbody>
</table>