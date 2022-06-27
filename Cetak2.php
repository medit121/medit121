<?php
require __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$header = '<!--mpdf

<htmlpageheader name="letterheader">
    <td width="50%" style="text-align: right; vertical-align: top;">Nomor<br />'.$_POST['no'].'<span style="font-weight: bold; font-size: 12pt;"></span></td>
    Malang {DATE jS F Y}<br>
    <table width="100%" style=" font-family: sans-serif;">
        <tr>
          <td width="50%" style="color:black; ">Kepada Yth</span><br />Sdr Direktur'.$_POST['rujukan'].'<br/>'.$_POST['almt'].'<br />Malang<br /></td>
        </tr>
    </table>
    <div style="margin-top: 1cm; text-align: left; font-family: sans-serif;">
        
        perihal : Rawat Inap<br><br>
        Dengan Hormat, <br>
        Dengan ini diberitahukan bahwa :
    </div>
</htmlpageheader>

<htmlpagefooter name="letterfooter2">
    <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; font-family: sans-serif; ">
        Page {PAGENO} of {nbpg}
    </div>
</htmlpagefooter>
mpdf-->

<style>
    @page {
        margin-top: 2.5cm;
        margin-bottom: 2.5cm;
        margin-left: 2cm;
        margin-right: 2cm;
        footer: html_letterfooter2;
        background-color: white;
    }
  
    @page :first {
        margin-top: 7cm;
        margin-bottom: 2cm;
        header: html_letterheader;
        footer: _blank;
        resetpagenum: 1;
        background-color: white;
    }
  
    @page letterhead :first {
        margin-top: 5cm;
        margin-bottom: 2cm;
        header: html_letterheader;
        footer: _blank;
        resetpagenum: 1;
        background-color: white;
    }
    .letter {
        page-break-before: always;
        page: letterhead;
    }
</style>';

$html = '<html>
    <body>
        <span style="font-weight: bold; font-size: 11pt;">Data Pasien</span>
        <div>'.'NIK :' . $_POST['nik'] . '</div>
        <div>'.'Nama :' . $_POST['nama'] . '</div>
        <div>'.'BP :' . $_POST['bp'] . '</div>
        <div>'.'Status :' . $_POST['status'] . '</div>
        <div>'.'Tanggal :' . $_POST['tanggal'] . '</div>
        <div>'.'Keterangan :' . $_POST['keterangan'] . '</div>
        <div>'.'No.BPJS :' . $_POST['bpjs'] . '</div>
        <div>'.'Umur :' . $_POST['umur'] . '</div>
        <div>'.'Kamar  :' . $_POST['Kamar'] . '</div>
        <span style="font-weight: bold; font-size: 11pt;">Data Wali</span>
        <div>'.'NIK :' . $_POST['NiK'] . '</div>
        <div>'.'Nama :' . $_POST['NAMA'] . '</div>
        <div>'.'Posisi :' . $_POST['posis'] . '</div>
        <div>'.'Kelas :' . $_POST['kelas'] . '</div>
        <div>'.'Lokasi :' . $_POST['lokasi'] . '</div>
        <br> Semua biaya Sehubungan Dengan Perawatan Penderita agar ditagihkan ke  YAKES TELKOM AREA JATIM (Surabaya) dengan melampirkan :
        <br><br>     1. perincian biaya selama Perawatan.
        <br>     2. Surat Kes I.B. 
        <br>     3. Surat Pengantar dari PT. TELKOM Malang. 
        <br><br>
        Demikian Atas bantuan dan kerja sama yang baik diucapkan terima kasih.



    <br><br><br><br>
    <br><br><br>

         Hormat Kami,<br>
            ASMAN HR WITEL MALANG <br><br><br><br><br><br>
            '.$_POST['tanda'].'<br>'.$_POST['nim1'].' 
    </body>
</html>';
    
    $mpdf->WriteHTML($header);
    $mpdf->WriteHTML($html);

    $mpdf->Output();
