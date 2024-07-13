<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    private $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isPhpEnabled', true); // Mengaktifkan evaluasi PHP dalam HTML
        $options->set('isHtml5ParserEnabled', true);
        $this->dompdf = new Dompdf($options);
    }

    public function generate($html, $filename = 'document', $paper = 'A4', $orientation = 'portrait', $stream = true)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        if ($stream) {
            $this->dompdf->stream($filename . '.pdf', ['Attachment' => 0]);
        } else {
            return $this->dompdf->output();
        }
    }

    public function savePDF($html, $paper = 'A4', $orientation = 'portrait', $outputFilename = '')
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper($paper, $orientation);
        $this->dompdf->render();

        $output = $this->dompdf->output();

        if (!empty($outputFilename)) {
            // Simpan file PDF di server
            $file = FCPATH . 'assets/data_laporan/' . $outputFilename;
            file_put_contents($file, $output);
            return $file;
        } else {
            // Jika outputFilename kosong, kembalikan output PDF
            return $output;
        }
    }
}
