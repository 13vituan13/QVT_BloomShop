<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{   
    private $TEMPLATE_BILL;
    public function __construct()
    {
        $this->TEMPLATE_BILL = config('path.TEMPLATE_BILL');
        $this->BILL_PATH = config('path.BILL_PATH');
    }
    public function exportBill(Request $request)
    {
        $inputs = $request->all();
        $order_id = $inputs['order_id'];
        $res = getOrderById($order_id);
        $order_detail = getOrderDetailById($order_id);

        // Lấy đường dẫn tới file Excel mẫu
        $template = public_path($this->TEMPLATE_BILL);

        // Tạo một đối tượng Spreadsheet từ file mẫu
        $spreadsheet = IOFactory::load($template);

        // Lấy sheet hiện tại của Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('E6', $res->customer_name);
        $sheet->setCellValue('E7', $res->customer_address);
        $sheet->setCellValue('E8', $res->customer_phone);

        if(count($order_detail) > 0){
            $rowIndex = 10; // Bắt đầu từ ô hàng thứ 10
            foreach ($order_detail as $key => $value) {
                $sheet->insertNewRowBefore($rowIndex + 1, 1);
                $sheet->setCellValue('C'.$rowIndex, ($key+1));
                $sheet->setCellValue('D'.$rowIndex, $value->product->name);
                $sheet->setCellValue('E'.$rowIndex, 'Bó');
                $sheet->setCellValue('F'.$rowIndex, $value->quantity);
                $sheet->setCellValue('G'.$rowIndex, $value->price);
                $sheet->setCellValue('H'.$rowIndex, $value->price*$value->quantity);
                $rowIndex++;
            }
            $sheet->setCellValue('H'.$rowIndex+1, '=SUM(H10:H'.($rowIndex).')');
        }
        
        // Lưu Spreadsheet vào bộ nhớ tạm
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $namefile = 'bill_'.$res->order_id.'.xlsx';
        $path = public_path($this->BILL_PATH.$namefile);
        $writer->save($path);

        // Trả về đường dẫn tới file Excel
        return response()->json(['path' => '/'.$this->BILL_PATH.$namefile]);
    }
}
