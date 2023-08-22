<?php

namespace App\Exports;

use App\Models\Pekerjaan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $params;

    public function __construct(array $params) {
        $this->params = (object) $params;
    }

    public function collection()
    {
        $query = "SELECT pekerjaan, tanggal1, tanggal2, tanggal3, created_at FROM pekerjaan";

        if ($this->params->start_date && $this->params->end_date) {
            $query .= " WHERE created_at BETWEEN '{$this->params->start_date}' AND '{$this->params->end_date}' ";
        }
        else if ($this->params->start_date){
            $query .= " WHERE created_at BETWEEN '{$this->params->start_date}' AND '{$this->params->start_date}' ";
        }
        
        return collect(\DB::select($query));

        
    }

    public function headings(): array{
        return [
            'Pekerjaan',
            'Tanggal 1',
            'Tanggal 2',
            'Tanggal 3',
            'Tanggal Input',
        ];
    }
}
