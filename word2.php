<?php
$searchTerms=array();
$searchCounts=array();
if(!empty($_POST))
{
	$in=$_POST['key_word'];
	for($i=0;$i<count($searchTerms);$i++)
	{
		if($searchTerms[$i]==$in) break;
	}
	if($i<count($searchTerms))
	{
		$searchCounts[$i]+=1;
	}
	else
	{
		$searchTerms[]=$in;
		$searchCounts[]=1;
	}
}

                if(!empty($_GET))
                {
                        $ret="";
			
			$word_count=array();
			for($i=0;$i<count($searchTerms);$i++)
			{
				$word_count[$searchTerms[$i]]=$searchCounts[$i];
			}
			arsort($word_count);
                        $in=$_GET['word'];
                        foreach($word_count as $word=>$val)
                        {
                                $len1=strlen($in);
                                $len2=strlen($word);
                                if($len1>$len2) continue;
                                for($i=0;$i<$len1;$i++)
                                {
                                        if($in[$i]!=$word[$i]) break;
                                }
                                if($i<$len1) continue;
                                $ret.="<option value='".$word."'>";
                        }
			echo $ret;
                }

?>
