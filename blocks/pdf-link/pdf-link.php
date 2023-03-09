<?php 

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'pdflink-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

$title = get_field('title');
$pdf = get_field('upload_pdf');

?>

<div class="<?php echo esc_attr( $class_name ); ?> position-relative p-4">
	<a href="<?= $pdf; ?>" target="_blank" rel="noopener,noreferrer" class="d-block mb-0 stretched-link text-decoration-none h5 w-100"><?= $title; ?> <i class="fa fa-external-link fs-6 ms-2"></i></a>
</div>