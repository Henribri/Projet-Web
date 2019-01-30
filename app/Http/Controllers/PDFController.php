<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use DB;
use PDF;
 
class PDFController extends Controller
{
function get_signin()
{
$signin = DB::table('_sign_in')
->join('_user', '_sign_in.Id_user','=','_user.Id_user')
->where('_sign_in.Id_event', request('id_event'))
->get();
return $signin;
}
 
function pdf()
{
$pdf = \App::make('dompdf.wrapper');
$pdf->loadHTML($this->convert_signin_to_html());
return $pdf->stream();
}
 
function convert_signin_to_html()
{
$signin = $this->get_signin();
$output = '
<h3 align="center">Inscriptions</h3>
<table width="100%" style="border-collapse: collapse; border: 0px;">
<tr>
<th style="border: 1px solid; padding:12px;" width="20%">Name</th>
</tr>
';
foreach($signin as $si)
{
$output .= '
<tr>
<td style="border: 1px solid; padding:12px;">'.$si->Name_user.' '.$si->Surname_user.'</td>
</tr>
';
}
$output .= '</table>';
return $output;
}
}