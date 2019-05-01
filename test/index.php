<?
function check_images($path,$extension) {
    $dir = opendir($path);
    $files = array();
    while ($current = readdir($dir)) {
        if ($current != "." && $current != "..") {
            if (is_dir($path . $current)) {
                showFiles($path . $current . '/');
            } 
			else {
				if(substr($current,-3)==$extension){
				  $files[] = $current;
				  
				}
				
				
            }
        }
    }
    return $files;
}

if(check_images("img","jpg")!=null && check_images("img","jpg")!="" || check_images("img","png")!=null && check_images("img","png")!=""){
	// Example for creating a slideshow from images in the "./img/" dir.
	require "../src/GifCreator/AnimGif.php";

	$anim = new GifCreator\AnimGif();

	// Load all images from "./img/", in ascending order,
	// apply the given delays, and save the result...
	
	$anim	-> create("img/", array(30)) // first 3s, then 5s for all the others
	-> save("anim.gif");

	
}
else{
	print "Folder empty!";
}
?>
