<?php
$code= $_GET['code'];
?>
<?php
require "fpdf.php";
$db= mysqli_connect('localhost','root','','wtf');


class myPDF extends FPDF{
    function header(){
        $dat1=date("Y-m-d");
        $dat2=date("h:i:sa");
        $this->Image('wpmu-icon.png', 40,6);
        $this->setFont('Arial', 'B', 14);
         //$this->SetTextColor();
        $this->setX((150)/2);
        $this->Cell(276,5,' WINGS TO FLY',0,0, 'c');
        $this->setX((450)/2);

        $this->Cell(200,5,$dat1,0,0, 'c');
         $this->Ln(10);
         $this->setX((450)/2);
         $this->Cell(200,5,$dat2,0,0, 'c');
         $this->Ln();
         $this->SetFont('Times','',14);
        $this->setX((150)/2);
        $this->Cell(276,10,'CLAIMS', 0,0,'c');
        $this->Ln(20);
    }
    function footer(){
       $this->SetY(-15);
        $this->SetFont('Arial', '',8);
        $this->Cell(50,10, 'page' .$this->PageNo(). '/{nb}', 0,0,'c');
        $this->SetFont('Times','',12);
        $this->setX((276)/2);
        $this->Cell(276,10,'EQUITY BANK', 0,0,'c');
    }

    //$html="hello world";
    function viewtable($db){
    	$code= $_GET['code'];
        $this->setFont('Times', 'B',12);
        $this->setX((20)/2);
        session_start();
      //  $id=$_SESSION['id'];

         $sql=" SELECT name,code, claim_type, claim_description FROM claims WHERE code='$code'";
            $result=mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        $this->setFont('Times', '',12);
        $this->setX((100)/2);
         $this->Cell(40,15,'NAME:',0,0,'c');
        $this->Cell(20,15,$row['name'],0,0,'c');
         $this->Ln(); 
         $this->setX((100)/2);
         $this->Cell(40,15,'code',0,0,'c');  
        $this->Cell(40,15,$row['code'],0,0,'c');

         $this->Ln(); 
         $this->setX((100)/2);
         $this->Cell(40,15,'Claim type',0,0,'c');  
        $this->Cell(40,15,$row['claim_type'],0,0,'c');
         $this->Ln(); 
         $this->setX((100)/2);
         $this->Cell(40,15,'claim descption',0,0,'c');  
        $this->Cell(40,15,$row['claim_description'],0,0,'c');
         $this->Ln();




        
                }
            }

        

}
              function others($db){
        



}
}
    
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
//$pdf->date($dat);
$pdf->viewtable($db);
//$pdf->headerTable();
//$pdf->others($db);
$pdf->Output();

?>