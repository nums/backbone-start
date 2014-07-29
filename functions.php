<?php
function getFiles($dir)
{
	$directory = $dir;
	$filenames = array();
	$iterator = new DirectoryIterator($directory);
	foreach ($iterator as $fileinfo) {
		if ($fileinfo->isFile()) {
			$filenames[] = array('name' => $fileinfo->getFilename(), 'path' => str_replace('\\', '/', $fileinfo->getPathname()));
		}
	}
	return $filenames;
}

function showTemplates($dir)
{
	foreach(getFiles($dir) as $file)
	{
		$tplListArray[] = '<script type="text/template" id="tpl_'.array_shift(explode('.', $file['name'])).'">';
		$tplListArray[] = file_get_contents($file['path']);
		$tplListArray[] = '</script>';
	}
	return implode("\n\n", $tplListArray);
}

function showTemplate($file)
{
	$tplListArray[] = '<script type="text/template" id="tpl_'.array_shift(explode('.', $file['name'])).'">';
	$tplListArray[] = file_get_contents($file['path']);
	$tplListArray[] = '</script>';
	return implode("\n\n", $tplListArray);
}

function showJs($dir, $front = '')
{
	$front = FRONT_URL . $front;
	$files = getFiles($dir);
	asort($files);
	foreach($files as $file)
	{
		$jsListArray[] = '<script type="text/javascript" src="'.$front.	$dir.'/'.$file['name'].'"></script>';
	}
	return implode("\n\n", $jsListArray);
}
?>