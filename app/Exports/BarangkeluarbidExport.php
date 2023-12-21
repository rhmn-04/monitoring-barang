<?php

namespace App\Exports;

use App\Models\Barangkeluar;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BarangkeluarbidExport implements FromCollection, WithMapping , WithHeadings, WithEvents
{
    public function collection()
    {
        return Barangkeluar::where('user_id', Auth::user()->id)->with('barang')->get();
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {


                $event->sheet->getDelegate()->getStyle('A1:A2')
                                    ->getFont()
                                    ->setBold(true);

                $event->sheet->getDelegate()->getStyle('A4:I4')
                                    ->getFont()
                                    ->setBold(true);
                // $event->sheet->setCellValue('G'. ($event->sheet->getHighestRow()+1), '=SUM(G3:G'.$event->sheet->getHighestRow().')');
                $event->sheet->setCellValue('I'. ($event->sheet->getHighestRow()+1), '=SUM(I2:I'.$event->sheet->getHighestRow().')');
            }
        ];
    }

    public function map($registration) : array {

        return [

            $registration->id,

            $registration->barang->user->name,
            $registration->barang->name,
            $registration->tujuan,
            $registration->barang->tahun,
            $registration->barang->harga,
            $registration->jml,
            $registration->barang->jumlah,
            $registration->barang->stock,
        ] ;
    }
        public function headings() : array {

            return [
                ['BADAN PENGELOLAAN PAJAK DAN RETRIBUSI DAERAH KOTA JAMBI'],
                ['LAPORAN DATA BARANG MASUK'],
                [''],



                ['NO',
                'NAMA BIDANG',
                'NAMA BARANG',
                'TUJUAN',
                 'TAHUN PEMBELIAN',
                'HARGA BARANG',
                'BARANG KELUAR',
                'JUMLAH BARANG',
                 'PAGU'
                 ]
            ];

        }
    }
