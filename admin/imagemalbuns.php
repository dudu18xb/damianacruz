<?php
	
function LoadImg($imagem,$cod,$pastaFotos) {
		
	list($largura1, $altura1) = getimagesize($imagem);
	
	$largura = 720;
	$percent = ($largura/$largura1);
	$altura = $altura1 * $percent;

	$imagem_gerada = $pastaFotos.$cod."p.jpg";
	$path = $imagem;
	$imagem_orig = ImageCreateFromJPEG($path);
	$pontoX = ImagesX($imagem_orig);
	$pontoY = ImagesY($imagem_orig);
	$imagem_fin = ImageCreateTrueColor($largura, $altura);
	ImageCopyResampled($imagem_fin, $imagem_orig, 0, 0, 0, 0, $largura+1, $altura+1, $pontoX, $pontoY);
	ImageJPEG($imagem_fin, $imagem_gerada,80);
	ImageDestroy($imagem_orig);
	ImageDestroy($imagem_fin);

	//apagar a imagem antiga
	unlink ($imagem);
}

	