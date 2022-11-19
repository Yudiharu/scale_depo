<?php

namespace App\DataTables;

use App\Petambak;
use Yajra\DataTables\Services\DataTable;

class PetambakDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('nama_petambak', function ($query){
                return link_to($query->edit_url,$query->nama_petambak);
            })
            ->addColumn('action', function ($query){
                $action =
                    '<a href="'.$query->show_url.'" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i> Lihat</a>'.'&nbsp'.
                    '<a href="'.$query->edit_url.'" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> Edit</a>'.'&nbsp'.
                    '<a href="javascript:;" onclick="del(\''.$query->id.'\',\''.$query->destroy_url.'\')" 
                    id="hapus" class="btn btn-danger btn-sm"> <i class="fa fa-times-circle"></i> Hapus</a>'.'&nbsp';

                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Petambak $model)
    {
        return $model->newQuery()->select('id', 'nama_petambak', 'alamat_rumah','telepon', 'hp');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'searchDelay' => 1400,
                "autoWidth" => false
            ])
            ->addAction(['width' => '200px']);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'nama_petambak',
            'alamat_rumah',
            'telepon',
            'hp'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Petambak_' . date('YmdHis');
    }
}
