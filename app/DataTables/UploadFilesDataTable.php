<?php

namespace App\DataTables;

use App\Models\UploadFile;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UploadFilesDataTable extends DataTable
{
    public function dataTable($query)
    {
        return (new EloquentDataTable($query))
            ->addColumn('uploaded_by', fn($row) => $row->uploader->name)
            ->editColumn('created_at', fn($row) => $row->uploaded_at)
            ->addColumn('action', 'upload_files.datatables_actions');
    }

    public function query(UploadFile $model)
    {
        return $model->newQuery()->with('uploader');
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '150px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'order' => [[0, 'desc']],
            ]);
    }

    protected function getColumns()
    {
        return [
            'name' => ['title' => 'File Name'],
            'detail' => ['title' => 'Details'],
            'uploaded_by' => ['title' => 'Uploaded By'],
            'created_at' => ['title' => 'Uploaded At'],
        ];
    }

    protected function filename(): string
    {
        return 'upload_files_' . time();
    }
}
