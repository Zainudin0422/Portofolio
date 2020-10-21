<?php
$Salary .= '
            <div style="width: 250px; margin: 15px; padding: 10px; float: left; border: 2px solid #000;">
                <div style="text-align: center;">
                    <div style="width: 50px; height: 50px; text-align: center; float: left;">
                        <img class=" attachment-img " src="../public/dist/img/LOGO_LP3I.png" style="width: 40px;  margin-top: 1px;" alt="Attachment Image">
                    </div>
                    <div style="width: 195px; height: 50px; text-align: center; float: left;">
                        <p style="font-size: 8px; font-weight: bold; text-align: center; margin-top: 10px; margin-bottom: -10px;">SLIP GAJI KARYAWAN DAN DOSEN TETAP</p>
                        <p style="font-size: 11px; font-weight: bold; text-align: center; margin-top: -1px; margin-bottom: -10px;">LP3I COLLEGE BALIKPAPAN</p>
                        <p style="font-size: 8px; font-weight: bold; text-align: center; margin-top: -1px;">Periode 26 Januari - 25 Februari 2020</p>
                    </div>
                </div>
                <div style="width: 313px; padding: 7px;">
                    <div>
                        <div style="width: 80px; padding-left: 17px; padding-right: -25px; font-size: 9px; font-weight: bold; float: left;">Nama</div>
                        <div style="width: 25px; padding-left: -10px; padding-right: -10px; text-align: center; font-size: 9px; font-weight: bold; float: left;">:</div>
                        <div style="font-size: 9px; padding-left: 10px; padding-right: -10px; font-weight: bold; float: left;">' . $Employees_Salarys['full_name'] . '</div>
                    </div>
                    <div style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
                        <div style="width: 80px; padding-left: 17px; padding-right: -25px; font-size: 9px; font-weight: bold; float: left;">No.Induk</div>
                        <div style="width: 25px; padding-left: -10px; padding-right: -10px; text-align: center; font-size: 9px; font-weight: bold; float: left;">:</div>
                        <div style="font-size: 9px; padding-left: 10px; padding-right: -10px; font-weight: bold; float: left;">Example Your Primary Key</div>
                    </div>
                    <div>
                        <div style="width: 80px; padding-left: 17px; padding-right: -25px; font-size: 9px; font-weight: bold; float: left;">Jabatan</div>
                        <div style="width: 25px; padding-left: -10px; padding-right: -10px; text-align: center; font-size: 9px; font-weight: bold; float: left;">:</div>
                        <div style="font-size: 9px; padding-left: 10px; padding-right: -10px; font-weight: bold; float: left;">Example Your Major</div>
                    </div>
                </div>
                <div style="width: 313; padding: 7px;">
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Gaji Pokok</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['gaji_pokok']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Tunjangan Jabatan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['tunjangan_jabatan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Tunjangan Transport (@Rp. 15.000,-)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['tunjangan_transport']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Tunjangan Fungsional</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['tunjangan_fungsional']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Potongan Transport (Izin, Sakit, Perdin)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['potongan_transport']) . '</div>
                        </div>
                    </div>
                    <div style="background-color: #ccc; font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Total Gaji Kotor</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['total_gaji_kotor']) . '</div>
                        </div>
                    </div>
        
        
                    <div style="font-weight: bold;">
                        <div style="width: 190px; font-size: 9px;"><i><u>Potongan :</u></i></div>
                    </div>
        
        
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Biaya Jabatan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['biaya_jabatan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Income Per Bulan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['income_per_bulan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Income Per Tahun</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['income_per_tahun']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">PTKP</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['ptkp']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">PKP</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['pkp']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">PPH 21 Per Bulan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['pph_21_per_bulan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">PPH 21 Per Tahun 5%</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['pph_21_per_tahun']) . '</div>
                        </div>
                    </div>
                    <div style="background-color: #ccc; font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Income Setelah Pajak</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['income_setelah_pajak']) . '</div>
                        </div>
                    </div>
        
        
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">BPJS Kesehatan (0,5%)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['bpjs_kesehatan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">BPJS Ketenagakerjaan (2%)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['bpjs_ketenagakerjaan']) . '</div>
                        </div>
                    </div>
                    <div style="background-color: #ccc; font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Take Home Pay</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['take_home_pay']) . '</div>
                        </div>
                    </div>
        
        
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Pembayaran Pinjaman</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['pembayaran_pinjaman']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Potongan Absen Tanpa Keterangan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['potongan_absen_tanpa_keterangan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Potongan Absen Keterlambatan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['potongan_absen_keterlambatan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Potongan Sanksi (Surat Peringatan)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['potongan_sanksi']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">ZIS (2,5%)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['zis']) . '</div>
                        </div>
                    </div>
                    <div style="background-color: #ccc; font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Total Potongan</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['total_potongan']) . '</div>
                        </div>
                    </div>
        
        
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;"><i><u>Net Salary 2020</u></i></div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['net_salary']) . '</div>
                        </div>
                    </div>
        
        
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Uang Makan (@Rp. 25.000,-)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['uang_makan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Potongan Makan (Izin, Sakit, Perdin)</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['potongan_uang_makan']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Tunjangan Lembur</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['tunjangan_lembur']) . '</div>
                        </div>
                    </div>
                    <div>
                        <div style="width: 160px; font-size: 9px; float: left;">Tunjangan Bensin</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 10px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['tunjangan_bensin']) . '</div>
                        </div>
                    </div>
                    <div style="background-color: #ccc; font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Gaji Yang Diterima</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -12px; float: left;">
                            <div style="width: 7px; font-size: 9px; float: left;">Rp.</div>
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . IndoRupiah($Employees_Salarys['gaji_diterima']) . '</div>
                        </div>
                    </div>
        
        
        
                    <div style="margin-top: 5px; padding-top: 3px; padding-bottom: 3px; font-weight: bold; border-top: 1px solid #000; border-bottom: 1px solid #000;">
                        <div style="width: 160px; font-size: 9px; float: left;">Jumlah Hari Kerja</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['izin']) . '</div>
                        </div>
                    </div>

                    <div style="font-weight: bold; padding-top: 3px;">
                        <div style="width: 160px; font-size: 9px; float: left;">Izin</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['izin']) . '</div>
                        </div>
                    </div>
                    <div style="font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Sakit</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['sakit']) . '</div>
                        </div>
                    </div>
                    <div style="font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Perdin</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['perdin']) . '</div>
                        </div>
                    </div>
                    <div style="font-weight: bold;">
                        <div style="width: 160px; font-size: 9px; float: left;">Cuti</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['cuti']) . '</div>
                        </div>
                    </div>
                    <div style="margin-bottom: 5px; padding-bottom: 3px; font-weight: bold; border-bottom: 1px solid #000;">
                        <div style="width: 160px; font-size: 9px; float: left;">Alpa</div>
                        <div style="width: 19px; text-align: center; padding-left: -10; padding-right: -10; font-size: 9px; float: left;">:</div>
                        <div style="width: 70px; padding-left: 7px; padding-right: -10px; float: left;">
                            <div style="font-size: 9px; text-align: right; padding-right: 3px; float: left;">' . Absen($Employees_Salarys['alpa']) . '</div>
                        </div>
                    </div>
                </div>
        
                <div style="width: 251px;">
                    <div style="width: 123px; font-size: 9px; text-align: center; float: left; border-right: 1px solid #ccc;">
                        <div style="margin-bottom: 50px;">Keuangan,</div>
                        <div style="font-size: 10px; font-weight: bold;"><u>Listio Widodo</u></div>
                        <div>Head of Finance & HRD</div>
                    </div>
                    <div style="width: 122px; font-size: 9px; text-align: center; float: left; border-left: 1px solid #ccc;">
                        <div style="margin-bottom: 50px;">Penerima,</div>
                        <div style="font-size: 10px; font-weight: bold;"><u>' . $Employees_Salarys['full_name'] . '</u></div>
                        <div>Karyawan</div>
                    </div>
                </div>  
            </div>';
