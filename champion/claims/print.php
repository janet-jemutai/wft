<?php
require "fpdf.php";
include "dbconnect.php";
$db= mysqli_connect('localhost','root','','employees');

class myPDF extends FPDF{
    function header(){
          $dat1=date("Y-m-d");
        $dat2=date("h:i:sa");

       $this->Image('wpmu-icon.png', 10,6);
        $this->setFont('Arial', 'B', 14);
        $this->setX((200)/2);
        $this->Cell(276,5,' XYZ TECHNOLOGIES COMPANY',0,0, 'c');
         $this->Ln(10);
         $this->SetFont('Times','',12);
        $this->setX((200)/2);
        $this->Cell(276,10,'EMPLOYEE RECORDS', 0,0,'c');
         $this->setX((450)/2);
        $this->SetFont('Times','B',14);
        $this->Cell(200,5,$dat1,0,0, 'c');
         $this->Ln(10);
         $this->setX((450)/2);
         $this->Cell(200,5,$dat2,0,0, 'c');
         $this->Ln(10);
            }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '',8);
        $this->Cell(50,10, 'page' .$this->PageNo(). '/{nb}', 0,0,'c');
        $this->SetFont('Times','',12);
        $this->setX((276)/2);
        $this->Cell(276,10,'visit:http://localhost/cosc326/stuff/empRegister.php', 0,0,'c');
        
    
    }
    function headerTable(){
        $this->setFont('Times', 'B',12);
        $this->setX((20)/2);
        $this->Cell(20,10,'ID',1,0,'c');
        $this->Cell(20,10,'firstName',1,0,'c');
        $this->Cell(20,10,'NetPay',1,0,'c');
        $this->Cell(20,10,'Lastname',1,0,'c');
        $this->Cell(20,10,'allowances',1,0,'c'); 
        $this->Cell(20,10,'bankLoan',1,0,'c');
        $this->Cell(20,10,'SaccoLoan',1,0,'c');
        $this->Cell(15,10,'NHIF',1,0,'c');
        $this->Cell(15,10,'NSSF',1,0,'c');
        $this->Cell(12,10,'Group',1,0,'c');  
        $this->Cell(20,10,'Transport',1,0,'c'); 
        $this->Cell(15,10,'House',1,0,'c');
        $this->Cell(20,10,'Medical',1,0,'c');
        $this->Cell(20,10,'basicPay',1,0,'c');
        $this->Cell(20,10,'PAYE',1,0,'c');
        
        $this->Ln();
    }

    function viewtable($db){
        $this->setFont('Times', 'B',12);
        $this->setX((20)/2);

         $sql=" SELECT 
            empid,empFirstname,emplastName,grosspay,allowances,deductions,jobGroup,houseAllowance,medicalAllowance,travelAllowance,nhif,nssf,netpay,saccoshares,password,bank_Loan,sacco_loan,overtime,paye,basicPay FROM employee";
            $result=mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        $this->setFont('Times', '',12);
        $this->setX((20)/2);

        $this->Cell(20,10,$row['empid'],1,0,'c');
        $this->Cell(20,10,$row['empFirstname'],1,0,'c');
        $this->Cell(20,10,$row['netpay'],1,0,'c');
        $this->Cell(20,10,$row['emplastName'],1,0,'c');
        $this->Cell(20,10,$row['allowances'],1,0,'c');
        $this->Cell(20,10,$row['bank_Loan'],1,0,'c');
        $this->Cell(20,10,$row['sacco_loan'],1,0,'c');
        $this->Cell(15,10,$row['nhif'],1,0,'c');
        $this->Cell(15,10,$row['nssf'],1,0,'c');
        $this->Cell(12,10,$row['jobGroup'],1,0,'c');  
        $this->Cell(20,10,$row['travelAllowance'],1,0,'c');
        $this->Cell(15,10,$row['houseAllowance'],1,0,'c');
        $this->Cell(20,10,$row['medicalAllowance'],1,0,'c');
        $this->Cell(20,10,$row['basicPay'],1,0,'c');
        $this->Cell(20,10,$row['paye'],1,0,'c');
                     
        $this->Ln();
                }
            }

        


}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewtable($db);
//$pdf->WriteHTML($html);
$pdf->Output();

?>