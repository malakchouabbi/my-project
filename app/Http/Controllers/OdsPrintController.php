<?php

/*namespace App\Http\Controllers;

use App\Models\Ods;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OdsPrintController extends Controller
{
    public function imprimer(Ods $ods)
    {
        // تنظيف num_ods من أي / أو \
        $safeFileName = 'ods-' . str_replace(['/', '\\'], '-', $ods->num_ods) . '.pdf';
    
        $pdf = PDF::loadView('pdf.ods', compact('ods'));
        $pdf = Pdf::loadView('pdf.ods', compact('ods'))
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4', 'portrait')
        ->setOptions(['defaultFont' => 'DejaVu Serif']);
       
        return $pdf->download('ordre-de-service.pdf');
        $ods = Ods::with('projet')->findOrFail($recordId);
    }
    


}
*/



  namespace App\Http\Controllers;

use App\Models\Ods;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class OdsPrintController extends Controller
{
public function imprimer($id)
{
    $ods = Ods::with('projet.entreprise')->findOrFail($id);

    // تجهيز الصورة كشيفرة Base64
    $imagePath = public_path('images/logo-algtelecom.png'); // تأكد أن الصورة موجودة هنا
    $type = pathinfo($imagePath, PATHINFO_EXTENSION);
    $data = file_get_contents($imagePath);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    // تحميل الـ View وتحويله إلى PDF
    return Pdf::loadView('pdf.ods', compact('ods', 'base64'))
        ->setOptions(['isRemoteEnabled' => true])
        ->setPaper('A4', 'portrait')
        ->download('ordre-de-service.pdf');
}
}