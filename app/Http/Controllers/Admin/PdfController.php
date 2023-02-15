<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;
use auth;

class PdfController extends Controller
{
    public function admin_generate_pdf()
    {
    $datas = EmployeeAttendance::all();
    $pdf = Pdf::loadView('report.admin_attendance_invoice',compact('datas'));
    return $pdf->stream('attendance-invoice');
    }
    public function generate_pdf(int $id)
    {
    $datas = EmployeeAttendance::where('employee_id','=', $id)->get();
    $pdf = Pdf::loadView('report.attendance_invoice',compact('datas'));
    return $pdf->stream('attendance-invoice');
    }

    public function download_pdf()
    {
        $data = 'retinasoft';
        $pdf = Pdf::loadView('billing_invoice',compact('data'));
        return $pdf->download('attendance_report.pdf');
    }
}
