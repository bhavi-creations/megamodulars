<?php

/** Render a quotation in memory; customer files are never saved publicly. */
function buildQuotationPdf($html)
{
    require_once __DIR__ . '/pdf-library/vendor/autoload.php';

    $options = new \Dompdf\Options();
    $options->set('isRemoteEnabled', false);
    $options->set('isPhpEnabled', false);
    $options->set('isJavascriptEnabled', false);
    $options->set('defaultFont', 'DejaVu Sans');
    $options->set('tempDir', sys_get_temp_dir());
    $options->set('fontCache', sys_get_temp_dir());

    $pdf = new \Dompdf\Dompdf($options);
    // Keep wide email styling within A4 and make long quotations paginate.
    $styles = '<style>@page { margin: 30pt; }
        body { font-family: "DejaVu Sans", sans-serif; font-size: 10pt; }
        .container { width: auto; max-width: none; padding: 12px; }
        table { table-layout: fixed; width: 100%; }
        th, td { overflow-wrap: break-word; font-size: 9pt; }
        tr { page-break-inside: avoid; }
        h4 { page-break-after: avoid; }
    </style>';
    $html = str_replace('</head>', $styles . '</head>', $html);
    $pdf->loadHtml($html, 'UTF-8');
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->output();
}
