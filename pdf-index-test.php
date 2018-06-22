<?php
 
// Include Composer autoloader if not already done.
include 'vendor/autoload.php';
 
// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('20180605_Double-Shift-Invoices_New-Layout-1-431.pdf');
 
// Retrieve all details from the pdf file.
$details  = $pdf->getDetails();
 
// Loop over each property to extract values (string or array).
foreach ($details as $property => $value) {
    if (is_array($value)) {
        $value = implode(', ', $value);
    }
    echo $property . ' => ' . $value . "\n";
}



$text = $pdf->getText();
$text = explode("\n", $text);
echo '<pre>';
print_r(array_filter($text, create_function('$value', 'return $value !== "";')));
echo '</pre>';
echo '===========<br/>';
