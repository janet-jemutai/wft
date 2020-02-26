<?php
$admission=$_GET['admission'];
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
        $this->Cell(276,10,'RESULTS', 0,0,'c');
        $this->Ln(10);
    }
    function above_table($db){
                $admission=$_GET['admission'];
        $this->setFont('Times', 'B',12);
        session_start();
      

         $sql=" SELECT name,admission, mathematics, english,kiswahili,chemistry,biology,physics,religious_education,history,geography,agriculture,business,home_science,art_drawing,french,music,mean_grade,class_position,overal_position,attendance,behavior,perfomance FROM results WHERE admission='$admission'";
            $result=mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $this->setFont('Times', 'B','',12);
        $this->setX((120)/2);
        $this->Cell(15,7,"Name:",0,0,'c');
        $this->Cell(45,7,$row['name'],0,0,'c');
        $this->Cell(25,7,"Admission:",0,0,'c');
        $this->Cell(15,7,$row['admission'],0,0,'c');
        $this->Cell(20,7,"M.Grade:",0,0,'c');
        $this->Cell(15,7,$row['mean_grade'],0,0,'c');
        $this->Cell(20,7,"C.position:",0,0,'c');
        $this->Cell(15,7,$row['class_position'],0,0,'c');
         $this->Cell(20,7,"O.position:",0,0,'c');
        $this->Cell(20,7,$row['overal_position'],0,0,'c');
         $this->Ln();


    }
}}
    function footer(){
       $this->SetY(-15);
        $this->SetFont('Arial', '',8);
        $this->Cell(50,10, 'page' .$this->PageNo(). '/{nb}', 0,0,'c');
        $this->SetFont('Times','',12);
        $this->setX((276)/2);
        $this->Cell(276,10,'EQUITY BANK', 0,0,'c');
    }
        function headerTable(){
        $this->setFont('Times', 'B',12);
        $this->setX((120)/2);
        $this->Cell(100,10,'Subject',1,0,'c');
        $this->Cell(100,10,'Grade',1,0,'c');
        
        $this->Ln();
    }

    //$html="hello world";
    function viewtable($db){
    	$admission=$_GET['admission'];
        $this->setFont('Times', 'B',12);      

         $sql=" SELECT name,admission, mathematics, english,kiswahili,chemistry,biology,physics,religious_education,history,geography,agriculture,business,home_science,art_drawing,french,music,mean_grade,class_position,overal_position,attendance,behavior,perfomance FROM results WHERE admission='$admission'";
            $result=mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
        $this->setFont('Times', '',12);
        $this->setX((120)/2);
        $this->Cell(100,7,"Mathematics",1,0,'c');
        $this->Cell(100,7,$row['mathematics'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"English",1,0,'c');
        $this->Cell(100,7,$row['english'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Kiswahili",1,0,'c');
        $this->Cell(100,7,$row['kiswahili'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"Chemistry",1,0,'c');
        $this->Cell(100,7,$row['chemistry'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Biology",1,0,'c');
        $this->Cell(100,7,$row['biology'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"Physics",1,0,'c');
        $this->Cell(100,7,$row['physics'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Religious_education",1,0,'c');
        $this->Cell(100,7,$row['religious_education'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"History",1,0,'c');
        $this->Cell(100,7,$row['history'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Geography",1,0,'c');
        $this->Cell(100,7,$row['geography'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"Agriculture",1,0,'c');
        $this->Cell(100,7,$row['agriculture'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Business",1,0,'c');
        $this->Cell(100,7,$row['business'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"Home Science",1,0,'c');
        $this->Cell(100,7,$row['home_science'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Art Drawing",1,0,'c');
        $this->Cell(100,7,$row['art_drawing'],1,0,'c');
       $this->Ln();
       $this->setX((120)/2);
        $this->Cell(100,7,"French",1,0,'c');
        $this->Cell(100,7,$row['french'],1,0,'c');
        $this->Ln();
        $this->setX((120)/2);
        $this->Cell(100,7,"Music",1,0,'c');
        $this->Cell(100,7,$row['music'],1,0,'c');
       $this->Ln(10);

         
         }
            }

        

}

              function others($db){
                $admission=$_GET['admission'];
        $this->setFont('Times', 'B',12);
        
      

         $sql=" SELECT name,admission, mathematics, english,kiswahili,chemistry,biology,physics,religious_education,history,geography,agriculture,business,home_science,art_drawing,french,music,mean_grade,class_position,overal_position,attendance,behavior,perfomance FROM results WHERE admission='$admission'";
            $result=mysqli_query($db,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $this->setFont('Times', 'B','',12);
        $this->setX((120)/2);
        $this->Cell(45,7,"Attendance:",0,0,'c');
        $this->Cell(45,7,$row['attendance'],0,0,'c');
         $this->Ln(10);
         $this->setX((120)/2);
        $this->Cell(45,7,"Behavior Comment:",0,0,'c');
        $this->Cell(15,7,$row['behavior'],0,0,'c');
         $this->Ln(10);
         $this->setX((120)/2);
        $this->Cell(45,7,"Perfomance Comment:",0,0,'c');
        $this->Cell(15,7,$row['perfomance'],0,0,'c');
         $this->Ln();


    }
}
}
}
    
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
//$pdf->date($dat);
$pdf->above_table($db);
$pdf->headerTable();
$pdf->viewtable($db);
$pdf->others($db);
$pdf->Output();

?>