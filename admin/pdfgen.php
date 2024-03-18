<?php
if($_POST){
    require('fpdf/fpdf.php');
    $name = $_POST['usname'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];
    $title = 'ABC LABORATORIES - Lab Report';

    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf->SetTitle($title);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $pdf->GetStringWidth($title)+6;
    $pdf->SetX((210-$w)/2);
    // Colors of frame, background and text
    $pdf->SetDrawColor(221,221,221,1);
    $pdf->SetFillColor(10,158,0,1);
    $pdf->SetTextColor(255,255,255,1);
    // Thickness of frame (1 mm)
    $pdf->SetLineWidth(1);
    // Title
    // Cell(width, height, content, border, nextline parametters, alignement[c - center], fill)
    $pdf->Cell($w, 9, $title, 1, 1, 'C', true);
    // Line break
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0,1);
    $w = $pdf->GetStringWidth($job)+6;
    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Patient Name:', 1, 0, 'C');
    $pdf->Cell($w, 10, $name, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Report ID:', 1, 0, 'C');
    $pdf->Cell($w, 10, $dob, 1, 1, 'C');

    $pdf->SetX((170-$w)/2);
    $pdf->Cell(40, 10, 'Lab Result:', 1, 0, 'C');
    $pdf->Cell($w, 10, $job, 1, 1, 'C');
    $pdf->Output();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="css\style.css">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0;">
    <div class="main-block" style="max-width: 400px; margin: 50px auto; background-color: #fff; border-radius: 8px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); padding: 20px;">
        <div class="header" style="background-color: #0A76D8; color: #fff; font-size: 24px; text-align: center; padding: 10px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            Make New Report
        </div>
        <div class="body" style="padding: 20px;">
            <form action='' method="POST">
                <input type="text" name="usname" placeholder="Name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
                <input type="text" name="dob" placeholder="Report Number" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
                <input type="text" name="job" placeholder="Result" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
                <input type="submit" value="GENERATE" style="width: 100%; background-color: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">
            </form>
        </div>
    </div>
</body>

</html>