<?php  
 function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "sloc");
	   mysqli_set_charset($conn,"utf8");
	  
      $sql = "SELECT * FROM basic_data WHERE certified_cnt = 1 order by cntID asc";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {      
  
      $output .= '<tr>    <td>'.$row["cnt_name"].'</td>  
                          <td>'.$row["city"].'</td>  
                          <td>'.$row["address"].'</td>  
                          <td>'.$row["phone"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }  
 if(isset($_POST["generate_pdf"]))  
 {  

	require_once('tcpdf/tcpdf.php');  

		 // Extend the TCPDF class to create custom Header and Footer
	class MYPDF extends TCPDF {

		//Page header
		public function Header() {
			// Logo
			$image_file = K_PATH_IMAGES.'logo.png';
			$this->Image($image_file, 'l', 2, '', '', 'png', false, 'l', false, 300, 'l', false, false, 0, false, false, false);	
			// Title
			$this->SetFont('aefurat', '', 10);
			$this->Cell(0, 15, '<< الرخصة السودانية لتشغيل الحاسوب >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');			
		}

		// Page footer
		public function Footer() {
			// Position at 15 mm from bottom
			$this->SetY(-15);
			// Set font
			$this->SetFont('aefurat', '', 10);
			// Page number
			$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		}
	}

	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'ISO-8859-1', false);

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('slco');
	$pdf->SetTitle('الرخصة السودانية لتشغيل الحاسوب');
	$pdf->SetSubject('الخرطوم - المنشية - برج الاتصالات - الطابق الخامس');
	$pdf->SetTopMargin(6);
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// set some language-dependent strings (optional)
		$l = Array();
		$l['a_meta_charset'] = 'ISO-8859-1';
		$l['a_meta_dir'] = 'rtl';
		$l['a_meta_language'] = 'ar';
		$pdf->setLanguageArray($l);

	// ---------------------------------------------------------

	// set font
	$pdf->SetFont('aefurat', '', 10);

	// add a page
	$pdf->AddPage();
    $content = '';  
    $content .= '  
      <h1 align="right">مراكز التدريب المعتمدة للرخصة السودانية لتشغيل الحاسوب</h1><br /> 
      <table border="1"  cellspacing="0" cellpadding="3">  
           <tr bgcolor="#ddd" font>  
                <th width="40%"><font size="18">اسم المركز</font></th>  
                <th width="10%"><font size="18">الولاية</font></th>  
                <th width="35%"><font size="18">العنوان</font></th>  
                <th width="15%"><font size="18">الهاتف</font></th>  
			</tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
	  $content .= '<br><br>'; 	  
      $pdf->writeHTML($content);  
      $pdf->Output('approvedCnt.pdf', 'I');  
 }  
 ?> 