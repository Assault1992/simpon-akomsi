<?php
class PDF extends FPDF
{
	//Page header
	function Header()
	{
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(100,6,"Tiket Pemesanan Makanan",0,0,'L',1); 
	}
 
	function Content($cabor,$contingent,$detail,$date,$jumlah)
	{      
                $this->Ln(12);
                $this->setFont('Arial','',14);
                $this->setFillColor(255,255,255);
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,'Tiket Pemesanan Makanan PON XIX',0,1,'L',1); 
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,"Tanggal : ".$date["tanggal"],0,1,'L',1); 
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,"Cabor : ".$cabor->name,0,1,'L',1); 
                $this->cell(25,6,'',0,0,'C',0); 
                $this->cell(100,6,'Kontingen :'.$contingent->name,0,1,'L',1); 
                
                
                $this->Ln(5);
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(35,6,'',0,0,'C',0); 
                $this->setFillColor(230,230,200);
                $this->cell(10,6,'No.',1,0,'C',1);
                $this->cell(50,6,'Jenis Menu',1,0,'C',1);
                $this->cell(30,6,'Pukul',1,0,'C',1);
                $this->cell(30,6,'Status',1,1,'C',1);
            $ya = 46;
            $rw = 6;
            $no = 1;
            foreach ($detail->result() as $item) {
                $tgl = $item->date;
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->cell(35,6,'',0,0,'C',0); 
                        $this->setFillColor(255,255,255);   
                        $this->cell(10,10,$no,1,0,'L',1);
                        $this->cell(50,10,$item->n_type_menu,1,0,'C',1);
                        $this->cell(30,10,$item->t_type_menu,1,0,'C',1);
                        $this->cell(30,10," ",1,1,'C',1);
                        $ya = $ya + $rw;
                        $no++;
            }
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(35,6,'',0,0,'C',0); 
                $this->setFillColor(230,230,200);
                $this->cell(90,6,'Jumlah Partisipan',1,0,'C',1);
                $this->setFillColor(255,255,255);   
                $this->cell(30,6,$jumlah->total,1,1,'C',1);
                $this->setFillColor(230,230,200);
	}
	function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
        $this->Cell(0,10,'SIMPON Akomodasi dan Konsumsi PON XIX' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}

}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($cabor,$contingent,$detail,$date,$jumlah);
$pdf->Output();
?>