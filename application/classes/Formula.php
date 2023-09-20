<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Класс для получения виджетов
 * ж
 */

class Formula {

    protected $_text;
    protected $_fore_color;
    protected $_fore_color_id;
    protected $_back_color;
    protected $_dpi;
    protected $_dpi_id;
    protected $_image_format = 'png';
    protected $_formulas_dir;

/*
    public static function factory($formula_text, $dpi = 90, $fore_color="000000", $back_color="FFFFFF")
    {
        return new Formula($formula_text, $dpi, $fore_color, $back_color);
    }
*/
    public static function factory($formula_text, $size, $color)
    {
        return new Formula($formula_text, $size, $color);
    }
    
    /*
    public function __construct($formula_text, $dpi, $fore_color, $back_color)
    {
        if ($formula_text != NULL)
        {
            $this->_text = $formula_text;
        }
	$this->_formulas_dir = DOCROOT.'uploads/formulas';
	$this->_fore_color = $fore_color;
	$this->_back_color = $back_color;
	$this->_dpi = $dpi;
    }
*/
    public function __construct($formula_text, $size, $color)
    {
        if ($formula_text != NULL)
        {
            $this->_text = $formula_text;
        }
	$this->_formulas_dir = DOCROOT.'uploads/formulas';
	$this->_fore_color = $color[1];
	$this->_fore_color_id = $color[0];
	$this->_dpi = $size[1];
	$this->_dpi_id = $size[0];
    }
    
    public function render()
    {
       return $this->render_frm($this->_text, $this->_dpi_id, $this->_dpi, $this->_fore_color_id, $this->_fore_color);
    }

    public function clean_up($tempfname,$todir) {
	#Cleans the various files that probably got created for a specific run, based on the run's filename.
	if (chdir($todir)===FALSE)
	{
	    return '[directory access error, fix permissions (and empty tmp manually this time)]'.$todir;
	}
	error_reporting(0); #at least one of these probably won't exist, but disable the error reporting related to that.
	unlink($tempfname);     #the longer/cleaner way would be check for existance for each
	unlink($tempfname.".tex");  unlink($tempfname.".log");
	unlink($tempfname.".aux");  unlink($tempfname.".dvi");
	unlink($tempfname.".ps");   unlink($tempfname.".".$this->_image_format);
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	return '';
      }
      
      
    public function phplatex_colorhex($r,$g,$b) {
	#there must be a better way of doing this. It's not even particularly clean.
	$hex=array("","","");
	
	if(strlen($hex[0]=dechex(min(256*$r,255)))==1)
	{
	    $hex[0]="0".$hex[0];
	}
	if(strlen($hex[1]=dechex(min(256*$g,255)))==1)
	{
	    $hex[1]="0".$hex[1];
	}
	if(strlen($hex[2]=dechex(min(256*$b,255)))==1)
	{
	    $hex[2]="0".$hex[2];
	}
	return implode("",$hex);
    }
    
    public function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
	   $r =  hexdec(substr($hex,0,1).substr($hex,0,1)) /255;
	   $g =  hexdec(substr($hex,1,1).substr($hex,1,1)) /255;
	   $b =  hexdec(substr($hex,2,1).substr($hex,2,1)) /255;
	} else {
	   $r =   hexdec(substr($hex,0,2)) /255;
	   $g = hexdec(substr($hex,2,2)) /255;
	   $b = hexdec(substr($hex,4,2)) /255;
	}
	$rgb = array($r, $g, $b);
	//return implode(",", $rgb); // returns the rgb values separated by commas
	return $rgb; // returns an array with the rgb values
    }

    public function get_html($link, $alt)
    {
	return '<img class="formula" title="'.$alt.'" alt="LaTeX formula: '.$alt.'" src="'.$link.'">';
    }
    
    public function render_frm($string, $dpi_id="1", $dpi=200, $fore_color_id="1", $fore_color = "FF0000") {
	$back_color = "#FFFFFF";
	$extraprelude="";
	$sharpen=FALSE;
	
	if ($dpi>300) $dpi=300;
	$formula_text = trim(preg_replace('/\s+/', ' ', $string));
//$formula_text = $string;
	$f_rgb = $this->hex2rgb($fore_color);
	$b_rgb = $this->hex2rgb($back_color);
	
	# Figure out TeX, either to get the right cache entry or to, you know, compile
	# Semi-common (ams) symbol packages are included.
	$totex = "\\documentclass[14pt,landscape]{extarticle}\n".
		 "\\usepackage{color}\n".
		 "\\usepackage{amsmath}\n\\usepackage{amsfonts}\n\\usepackage{amssymb}\n".
		 "\\pagestyle{empty}\n".  #removes header/footer; necessary for trim
		 "\\begin{document}\n".
		 "\\color[rgb]{".implode(',', $f_rgb)."}\n". 
		 "\\pagecolor[rgb]{".implode(',', $b_rgb)."}\n".
		 "$$".$formula_text."$$\n".
		 "\\end{document}\n";
	
	$brand_new_name = sha1($formula_text).'.'.$dpi_id.'.'.$fore_color_id; #file cache entry string:  40-char hash string plus size
	
	/*
	$stralt = str_replace("&","&amp;", preg_replace("/[\"\n]/","",$string)); #stuck in the alt and title attributes
										 #May need some extra safety.
	$heredir=getcwd();

	$ascenders ="/(b|d|f|h|i|j|k|l|t|A|B|C|D|E|F|G|H|I|J|L|K|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z|\[|\]|\\{|\\}|\(|\)|\/|0|1|2|3|4|5|6|7|8|9|\\#|\*|\?|'|\\\\'|\\\\`|\\\\v)/";
	$monoliners="/(a|c|e|m|n|o|r|s|u|v|w|x|z|-|=|\+|:|.)/";
	$descenders="/(g|j|p|\/|q|y|Q|,|;|\[|\]|\\{|\\}|\(|\)|\#|\\\\LaTeX|\\\\TeX|\\\\c\{)/"; 

	$deepdescenders="/(\[|\]|\\{|\\}|\(|\)|\\int)/";
	$ba = preg_match_all($ascenders,  $string,$m); 
	$bm = preg_match_all($monoliners, $string,$m); 
	$bd = preg_match_all($descenders, $string,$m); 
	$dd = preg_match_all($deepdescenders, $string,$m); 
	if      ($dd>0)            $verticalalign="vertical-align: -27%";   # descenders only: move down
	else if ($bd>0 && $ba==0)  $verticalalign="vertical-align: -20%";   # descenders only: move down
	else if ($bd==0 && $ba>0)  $verticalalign="vertical-align: -1%";    # ascenders only: move up/do nothing?
	else if ($bd==0 && $ba==0) $verticalalign="vertical-align: -2%";    # neither    vertical-align: 0%
	else                       $verticalalign="vertical-align: -19%";   # both ascender and regular descender
*/
	#check image cache, return link if exists
	#the vertical-align is to fix text baseline/descender(/tail) details in and on-average sort of way
	if (file_exists($this->_formulas_dir.$brand_new_name.'.'.$this->_image_format))
	{
	  //return '<img style="'.$verticalalign.'" title="'.$stralt.'" alt="LaTeX formula: '.$stralt.'" src="images/'.$brand_new_name.'.'.$this->_image_format.'">';
	    return $this->get_html('/uploads/formulas/'.$brand_new_name.'.'.$this->_image_format, $formula_text);
	}


	#chdir to have superfluous file be created in tmp.
	error_reporting(0); # not checking existance myself, that'd be double.
	if (chdir(DOCROOT."uploads/tmp/")===FALSE)
	{
	    return '[directory access error, fix permissions]';
	} #I should chech whether file creation is allowed to give a nice error for that problem case
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	$tfn = tempnam(getcwd(), 'PTX'); #file in tmp dir

	#write temporary .tex file
	if ( ($tex = fopen($tfn.'.tex', "w"))==FALSE)
	{
	    return '[file access error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}
	
	fwrite($tex, $totex); fclose($tex);

	#Run latex to create a .dvi. Try to fix minor errors instead of breaking/pausing on them.
	exec('/usr/bin/latex --interaction=nonstopmode '.$tfn.'.tex');
	if (!file_exists($tfn.".dvi"))
	{
	    $log = file_get_contents($tfn.'.log'); #The log always exists, but now it's actually interesting since it'll contain an error
	    return '[latex error, code follows]<pre>'.$totex.'</pre><p><b>Log file:</b><pre>'.$log.'</pre></p> '.$this->clean_up($tfn,$this->_formulas_dir);
	}

	#DVI -> PostScript.   Since dvips uses lpr, which may be configured to actually print by default, force writing to a file with -o
	exec('/usr/bin/dvips '.$tfn.'.dvi -o '.$tfn.'.ps');
	if ( !file_exists($tfn.'.ps'))  {
	  return '[dvi2ps error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}

	#PostScript -> image. Trim based on corner pixel, and set transparent color.

exec('/usr/bin/convert -colorspace RGB  -transparent-color "#'.$back_color.'" -density '.$dpi.' -trim +page '.$tfn.'.ps '.$tfn.'.'.$this->_image_format);

	#Note: +page OR -page +0+0 OR +repage moves the image to the cropped area (kills offset)
	if (!file_exists($tfn.'.'.$this->_image_format))  {
	  return '[image convert error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}
	#Older code tried: exec('/usr/bin/mogrify -density 90 -trim +page -format $imgfmt '.$tfn.'.ps');
	# It seems some versions of convert may not have -trim. Old versions?

	#Copy result image to chache.
	$fileName = $brand_new_name.'.'.$this->_image_format;
	copy($tfn.'.'.$this->_image_format, $this->_formulas_dir.'/'.$fileName);

	#Clean up temporary files, and return link to just-created image
//	$this->clean_up($tfn,$this->_formulas_dir);
	//return '<img class="formula" title="'.$stralt.'" alt="LaTeX formula: '.$stralt.'" src="/uploads/formulas/'.$brand_new_name.'.'.$this->_image_format.'">';
	return $this->get_html('/uploads/formulas/'.$fileName, $formula_text);
	
    }
    
    /*
    public function render_frm($string,$dpi='90', $r=0.0,$g=0.0,$b=0.0, $br=1.0,$bg=1.0,$bb=1.0,$extraprelude="", $sharpen=FALSE) {
	if ($dpi>300) $dpi=300;

	$back=$this->phplatex_colorhex($br,$bg,$bb);
	$fore=$this->phplatex_colorhex($r,$g,$b);

	# Figure out TeX, either to get the right cache entry or to, you know, compile
	# Semi-common (ams) symbol packages are included.
	$totex = "\\documentclass[14pt,landscape]{extarticle}\n".
		 "\\usepackage{color}\n".
		 "\\usepackage{amsmath}\n\\usepackage{amsfonts}\n\\usepackage{amssymb}\n".
		 $extraprelude."\n".
		 "\\pagestyle{empty}\n".  #removes header/footer; necessary for trim
		 "\\begin{document}\n".
		 "\\color[rgb]{".$r.",".$g.",".$b."}\n". 
		 "\\pagecolor[rgb]{".$br.",".$bg.",".$bb."}\n".
		 $string."\n".
		 "\\end{document}\n";

	$strhash = sha1($totex).'.'.$dpi; #file cache entry string:  40-char hash string plus size
	$stralt = str_replace("&","&amp;", preg_replace("/[\"\n]/","",$string)); #stuck in the alt and title attributes
										 #May need some extra safety.
	$heredir=getcwd();
	

	#Experiment: Tries to guess vertical positioning fix that will look short rendered works look natural inside HTML text.
	#Only descenders are really a problem since HTML's leeway is upwards.
	#TODO: avoid using letters that are part of TeX commands.
	# the slash varies per font. In the default CM it is, in Times and others it isn't.
	$ascenders ="/(b|d|f|h|i|j|k|l|t|A|B|C|D|E|F|G|H|I|J|L|K|M|N|O|P|Q|R|S|T|U|V|W|X|Y|Z|\[|\]|\\{|\\}|\(|\)|\/|0|1|2|3|4|5|6|7|8|9|\\#|\*|\?|'|\\\\'|\\\\`|\\\\v)/";
	$monoliners="/(a|c|e|m|n|o|r|s|u|v|w|x|z|-|=|\+|:|.)/";
	$descenders="/(g|j|p|\/|q|y|Q|,|;|\[|\]|\\{|\\}|\(|\)|\#|\\\\LaTeX|\\\\TeX|\\\\c\{)/"; 

	$deepdescenders="/(\[|\]|\\{|\\}|\(|\)|\\int)/";
	$ba = preg_match_all($ascenders,  $string,$m); 
	$bm = preg_match_all($monoliners, $string,$m); 
	$bd = preg_match_all($descenders, $string,$m); 
	$dd = preg_match_all($deepdescenders, $string,$m); 
	if      ($dd>0)            $verticalalign="vertical-align: -27%";   # descenders only: move down
	else if ($bd>0 && $ba==0)  $verticalalign="vertical-align: -20%";   # descenders only: move down
	else if ($bd==0 && $ba>0)  $verticalalign="vertical-align: -1%";    # ascenders only: move up/do nothing?
	else if ($bd==0 && $ba==0) $verticalalign="vertical-align: -2%";    # neither    vertical-align: 0%
	else                       $verticalalign="vertical-align: -19%";   # both ascender and regular descender

	#check image cache, return link if exists
	#the vertical-align is to fix text baseline/descender(/tail) details in and on-average sort of way
	if (file_exists($this->_formulas_dir.$strhash.'.'.$this->_image_format)) 
	  return '<img style="'.$verticalalign.'" title="'.$stralt.'" alt="LaTeX formula: '.$stralt.'" src="images/'.$strhash.'.'.$this->_image_format.'">';


	#chdir to have superfluous file be created in tmp.
	error_reporting(0); # not checking existance myself, that'd be double.
	if (chdir(DOCROOT."uploads/tmp/")===FALSE)
	{
	    return '[directory access error, fix permissions]';
	} #I should chech whether file creation is allowed to give a nice error for that problem case
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	$tfn = tempnam(getcwd(), 'PTX'); #file in tmp dir

	#write temporary .tex file
	if ( ($tex = fopen($tfn.'.tex', "w"))==FALSE)
	{
	    return '[file access error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}
	
	fwrite($tex, $totex); fclose($tex);

	#Run latex to create a .dvi. Try to fix minor errors instead of breaking/pausing on them.
	exec('/usr/bin/latex --interaction=nonstopmode '.$tfn.'.tex');
	if (!file_exists($tfn.".dvi"))
	{
	    $log = file_get_contents($tfn.'.log'); #The log always exists, but now it's actually interesting since it'll contain an error
	    return '[latex error, code follows]<pre>'.$totex.'</pre><p><b>Log file:</b><pre>'.$log.'</pre></p> '.$this->clean_up($tfn,$this->_formulas_dir);
	}

	#DVI -> PostScript.   Since dvips uses lpr, which may be configured to actually print by default, force writing to a file with -o
	exec('/usr/bin/dvips '.$tfn.'.dvi -o '.$tfn.'.ps');
	if ( !file_exists($tfn.'.ps'))  {
	  return '[dvi2ps error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}

	#PostScript -> image. Trim based on corner pixel, and set transparent color.
	exec('/usr/bin/convert -transparent-color "#'.$back.'" -density '.$dpi.' -trim +page '.$tfn.'.ps '.$tfn.'.'.$this->_image_format);

	#Note: +page OR -page +0+0 OR +repage moves the image to the cropped area (kills offset)
	if (!file_exists($tfn.'.'.$this->_image_format))  {
	  return '[image convert error] '.$this->clean_up($tfn,$this->_formulas_dir);
	}
	#Older code tried: exec('/usr/bin/mogrify -density 90 -trim +page -format $imgfmt '.$tfn.'.ps');
	# It seems some versions of convert may not have -trim. Old versions?

	#Copy result image to chache.
	copy($tfn.'.'.$this->_image_format, $this->_formulas_dir.'/'.$strhash.'.'.$this->_image_format);

	#Clean up temporary files, and return link to just-created image
	$this->clean_up($tfn,$this->_formulas_dir);
	return '<img style="'.$verticalalign.'" title="'.$stralt.'" alt="LaTeX formula: '.$stralt.'" src="/uploads/formulas/'.$strhash.'.'.$this->_image_format.'">';
    }
    */

}
