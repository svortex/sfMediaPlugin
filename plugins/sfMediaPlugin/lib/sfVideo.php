<?php
class sfVideo
{
    protected $type = "";
    protected $id = -1;
    protected $title = "no title";
    protected $description = "no description";
    protected $code = "no code";
    protected $img = "no image";

public function __construct()
{

}


public function getVideoInfo($url){
    //Détermination du "type" de vidéo :
    if(preg_match('/youtube/',$url))            $type="youtube";
    else if(preg_match("/dailymotion/",$url))    $type="dailymotion";
    else if(preg_match("/google/",$url))        $type="google";
    else if(preg_match("/vimeo/",$url))        $type="vimeo";
   // else return false;
    else throw new Exception("Ce service vidéo n'est pas pris en charge ou le lien est invalide");

    //Détermination de l'"ID" de la vidéo :
    if($type=="youtube"){
    	$reg_ex_video = '%(?:http:\/\/www\.youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|http:\/\/www\.youtu\.be/)([^"&?/ ]{11})(?:.+)?%i';
		preg_match_all($reg_ex_video, $url, $code);

		$url = $code[0][0];
        $debut_id = explode("/v/",$url,2);
        $id = $code[1][0];

    }
    else if($type=="dailymotion"){
        $debut_id = explode("/video/",$url,2);

        $id_et_fin_url = explode("_",$debut_id[1],2);
        $id = $id_et_fin_url[0];
       	if(strstr($id, "?")) {
        	$pos = stripos($id, "?");
        	$id = substr($id, 0, $pos);
        }
    }
    else if($type=="google"){
        $debut_id =  explode("docid=",$url,2);
        $id_et_fin_url = explode("&",$debut_id[1],2);
        $id = $id_et_fin_url[0];
    }
    else if($type=="vimeo"){
        $l_id= preg_match("/([0-9]+)$/",$url,$lid);
        $id = $lid[0];
    }
    //Analyse et stockage des informations de la vidéo
    if($type=="youtube"){
         $xml = @file_get_contents("http://gdata.youtube.com/feeds/api/videos/".
$id);
        if(empty($xml))
        throw new Exception("Ce service vidéo n'est pas pris en charge ou le lien est invalide");
        //titre
        preg_match('#<title(.*?)>(.*)<\/title>#is',$xml,$resultTitre);

        $title = $resultTitre[count($resultTitre)-1];
        //description
        preg_match('#<content(.*?)>(.*)<\/content>#is',$xml,$resultDescription);
        $description = $resultDescription[count($resultTitre)-1];
 		//Image
        $img = "http://img.youtube.com/vi/".$id."/0.jpg";
        //Code HTML
        $code = 'http://www.youtube.com/v/'.$id;
    }
    else if ($type=="dailymotion"){
        $tags = get_meta_tags("http://www.dailymotion.com/video/".$id);

        if(empty($tags))
        throw new Exception("Ce service vidéo n'est pas pris en charge ou le lien est invalide");
        //titre
        $title = htmlspecialchars(trim(str_replace("Dailymotion -","",$tags[
"keywords"])));
        //description
        $description = $tags["description"];
       	$img = "http://www.dailymotion.com/thumbnail/200x200/video/".$id;
        // code HTML
        $code = 'http://www.dailymotion.com/swf/'.$id;
    }
    else if ($type=="google"){
        $xml_string = @file_get_contents(
"http://video.google.com/videofeed?docid=".$id);
        if(empty($xml_string))
        throw new Exception("Ce service vidéo n'est pas pris en charge ou le lien est invalide");
        //titre
        $xml_title_debut = explode("<title>",$xml_string,2);
        $xml_title_fin = explode("</title>",$xml_title_debut[1],2);
        $title = $xml_title_fin[0];
        //description
        $xml_description_debut = explode("<description>",$xml_string,2);
        $xml_description_fin = explode("</description>",$xml_description_debut[1
],2);
        $description = $xml_description_fin[0];

        //image
        $xml_image_debut = explode('&lt;img src="',$xml_string,2);
        $xml_image_fin = explode('" width="',$xml_image_debut[1],2);
        $img = $xml_image_fin[0];
        //code HTML
        $code = 'http://video.google.com/googleplayer.swf?docId='.$id.'&hl=fr';
    }
    else if ($type=="vimeo"){
       // $xml_string = @file_get_contents("http://vimeo.com/api/clip/".$id.".xml"
       $json_string = json_decode(@file_get_contents("http://vimeo.com/api/v2/video/".$id.".json"),true);

      if(empty($json_string))
        throw new Exception("Ce service vidéo n'est pas pris en charge ou le lien est invalide");

       $json_string = $json_string[0];
        //titre
        // $xml_title_debut = explode("<title>",$xml_string,2);
        // $xml_title_fin = explode("</title>",$xml_title_debut[1],2);
        // $title = $xml_title_fin[0];
        $title = $json_string['title'];
        //description
//         $xml_description_debut = explode("<desc>",$xml_string,2);
//         $xml_description_fin = explode("</caption>",$xml_description_debut[1],2)
// ;
//         $description = $xml_description_fin[0];
       $description = $json_string['description'];
        //image
        // $xml_image_debut = explode("<thumbnail_medium>",$xml_string,2);
        // $xml_image_fin = explode("</thumbnail_medium>",$xml_image_debut[1],2);
        // $img = $xml_image_fin[0];
        $img = $json_string["thumbnail_medium"];
        //code HTML
        $code = "http://vimeo.com/api/oembed.xml?url=http%3A//vimeo.com/".$id;
    }
    $id = str_replace(array("?fs=1", "="), "", $id);
    return array("code"=>$id,"type"=>$type,"img"=>$img,"url"=>$code, "title"=>$title, "description"=>$description);
}


	// function xml2assoc($xml) {
	// 	$assoc = null;
	// 	while($xml->read()){
	// 		switch ($xml->nodeType) {
	// 			case XMLReader::END_ELEMENT: return $assoc;
	// 			case XMLReader::ELEMENT:
	// 				$assoc[$xml->name][] = array('value' => $xml->isEmptyElement ? '' : $this->xml2assoc($xml));
	// 				if($xml->hasAttributes){
	// 					$el =& $assoc[$xml->name][count($assoc[$xml->name]) - 1];
	// 					while($xml->moveToNextAttribute()) $el['attributes'][$xml->name] = $xml->value;
	// 				}
	// 				break;
	// 			case XMLReader::TEXT:
	// 			case XMLReader::CDATA: $assoc .= $xml->value;
	// 		}
	// 	}
	// 	return $assoc;
	// }


}
?>
