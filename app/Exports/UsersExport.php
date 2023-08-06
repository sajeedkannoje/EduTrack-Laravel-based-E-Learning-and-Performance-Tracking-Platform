<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromArray, ShouldAutoSize, WithHeadings, WithColumnWidths, WithStyles, WithProperties, WithEvents
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            '#',
            'First Name',
            'Last Name',
            '% Correct',
            'Modules Completed',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:f1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            },
        ];
    }

    public function properties(): array
    {
        return [
            'creator' => 'Follow For Now Life Skills 101',
            'lastModifiedBy' => 'Follow For Now Life Skills 101',
            'title' => 'Students Performance',
            'description' => 'Students Performance',
            'subject' => 'Students Performance',
            'keywords' => 'Follow For Now Life Skills 101,',
            'category' => 'Students Performance',
            'manager' => 'Follow For Now Life Skills 101',
            'company' => 'Follow For Now Life Skills 101',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => [
                'bold' => true,
                'size' => 13,
            ]],

            // Styling a specific cell by coordinate.
            'A1' => ['font' => ['italic' => true]],

        ];
    }
}
