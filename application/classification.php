<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Classification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	var $image;
	var $fechanoticia;
	var $title;
	var $description;
	var $sourceurl;

	public function index()
	{
		$this->load->view('vclassification');
		// $this->load->helpers('simple_html_dom');
	}

// 	function get_image( ) {
// 	    return $this->image;
// 	}

// 	function set_image ($image, $new_image) {
// 	    $image->src = $new_image;
// 	}

// 	function get_fechanoticia( ) {
// 	    return $this->fechanoticia;
// 	}

// 	function set_fechanoticia ($new_fechanoticia) {
// 	    $this->fechanoticia = $new_fechanoticia;
// 	}

// 	function get_title( ) {
// 	    return $this->title;
// 	}

// 	function set_title ($new_title) {
// 	    $this->title = $new_title;
// 	}

// 	function get_description( ) {
// 	    return $this->description;
// 	}

// 	function set_description ($new_description) {
// 	    $this->description = $new_description;
// 	}

// 	function get_sourceurl( ) {
// 	    return $this->sourceurl;
// 	}

// 	function set_sourceurl ($new_sourceurl) {
// 	    $this->sourceurl = $new_sourceurl;
// 	}

// }
// $html = file_get_html($this->load->post('curl', TRUE));
// 	if(!$html){
// 		continue;
// 	}
// 	else
// 	{
// 		$parsedNews = array();
// 		foreach($html->find('.kcm-read') as $element) {

// 			$newItem = new htmlDOM;
// 			// Parse the news item's thumbnail image.
//             foreach ($element->find('src') as $image) {
//                 $property = 'img';
//                 $image->removeAttribute('class');
//                 $newItem->set_image($image , $image->$property);
//                 // echo $newItem->get_image() . "<br />";
//                 $linkgambar = $image->$property;
//             }

//             foreach ($element->find('href') as $link) {
//                 $link->outertext = '';
//             }
                
//             // Parse the news item's title.
//             foreach ($element->find('h2') as $title) {
//                 $newItem->set_title($title->innertext);
//                 $judul = $newItem->get_title(); echo $judul."<br /><br>";
//             }

//             foreach ($element->find('h2') as $link) {
//                 $link->outertext = '';
//             }

//             foreach ($element->find('.meta') as $link) {
//                 $link->outertext = '';
//             }

//             foreach ($element->find('p') as $text) {
//             	$newItem->set_description($text->innertext);
//             	$term = $newItem->get_description();

//             	$term = strip_tags($term);
//             	// $term = str_replace("/^\s*/", " ", $term);
//             	// $term = str_replace("/\s*$/", " ", $term);
//             	$term = strtolower($term);

//             	// if($term=="<p>"){
//             	// 	$start = 1;
//             	// }
//             	// elseif ($term=="</p>") {
//             	// 	$start = 0;
//             	// }

//             	// if ($start==1 && $term!="<p>") {
//             	// 	$kata = preg_split("/[\s,.:]+/", $term);
//             	// 	foreach ($kata as $tok) {
//             	// 		$tok = preg_replace('/[?!.,()*]|\"/', " ", $tok);
//             	// 		$tok = preg_replace('/^[a-z]/', ' ', $tok);
//             	// 		if (preg_match("/^[a-z]/", $tok)) {
//             	// 			$freq[$tok]+=1;
//             	// 			$s++; //hitung jumlah seluruh kata
//             	// 		}
//             	// 	}
//             	// }
            	
//             	// arsort($freq); //mengurutkan kata dari frequensi yang terbesar
//             	// foreach ($freq as $key => $val) {
//             	// 	echo "$key=>$val<br />";
//              //    }

//                 //menghilangkan tanda baca
//                 $term = str_replace(".", "", $term);
//                 $term = str_replace(",", "", $term);
//                 $term = str_replace("'", "", $term);
//                 $term = str_replace("-", "", $term);
//                 $term = str_replace(")", "", $term);
//                 $term = str_replace("(", "", $term);
//                 $term = str_replace("\'", "", $term);
//                 $term = str_replace("/", "", $term);
//                 $term = str_replace("=", "", $term);
//                 $term = str_replace(":", "", $term);
//                 $term = str_replace("!", "", $term);
//                 $term = str_replace("?", "", $term);
//                 $term = str_replace("*", "", $term);
//                 $term = str_replace("&", "", $term);
//                 $term = str_replace("%", "", $term);
//                 $term = str_replace(";", "", $term);
//                 $term = str_replace("nbsp", "", $term);
//                 $term = str_replace("—", "", $term);

//                 //Hapus stoplist
//                 $query = mysql_query("SELECT * from stopword");
//                 while ($daftar=mysql_fetch_array($query)) {
//                     $stoplist = $daftar['daftar'];

//                     $term = str_replace($stoplist, "", $term);
//                 }
//             }
//         }
    }
?>