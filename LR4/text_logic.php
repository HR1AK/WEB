<?php
    $arrContextOptions = array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );


    $preset1 = "https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%BE%D1%80%D0%B8%D0%BD%D1%85%D0%B8";
    $preset2 = "https://ru.wikipedia.org/wiki/%D0%A1%D0%B2%D0%B8%D0%BD%D1%8B%D0%B5";
    $preset3 = "https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/#glava-pervaya-v-kotoroj-my-znakomimsya-s-vinni-puhom-i-neskolkimi-pchy";
    $text = "DEFAULT TEX";
    if(isset($_GET["preset"]))
    {
        if($_GET["preset"] == "1")
        {
            $text = file_get_contents($preset1, false, stream_context_create($arrContextOptions));
        }
        elseif($_GET["preset"] == "2")
        {
            $text = file_get_contents($preset2, false, stream_context_create($arrContextOptions));
        }
        elseif($_GET["preset"] == "3")
        {
            $text = file_get_contents($preset3, false, stream_context_create($arrContextOptions));
        }
        else
        {
            $text = $_POST["text"];
        }

        $MyObject = new DoTasks($text);
    }
    else
    {
        if($_POST["text"])
        {
            $text = $_POST["text"];  
        }
        $MyObject = new DoTasks($text); 
    }

    class DoTasks{
        public $text_task3;
        public $text_task7;
        public $text_task11;
        public $text_task17;


        public function __construct($text)
        {
            $this->text_task3 = $text;
            $this->text_task7 = $text;
            $this->text_task11 = $text;
            $this->text_task17 = $text;
        }

        public function viewText($task)
        {
            echo $task;
        }

        public function TASK3()
        {
            preg_match_all('/<p?>—(.*?)<\/p>/u', $this->text_task3, $out, PREG_PATTERN_ORDER);
            
            for($m=0; $m <count($out) - 1; $m++)
            {
                for($n=0; $n<count($out[$m]); $n++)
                {
                    echo $out[$m][$n];
                }
            }
        }

        public function TASK7()
        {
            $this->text_task7 = preg_replace('/\?{4,}/', '???', $this->text_task7);
            $this->text_task7 = preg_replace('/\!{4,}/', '!!!', $this->text_task7);
            $this->text_task7 = preg_replace('/\.{4,}/', '&hellip;', $this->text_task7); #мнемоника

            $this->viewText($this->text_task7);
        }

        public function TASK11()
        {
            preg_match_all('/<h[1-3][^>]*?>(.*?)<\/h[1-3]>/si', $this->text_task11, $matches);
            $ch1=0;
            $ch2=0;
            $ch3=0;
            for($i=0; $i<count($matches[0]);$i++)
            {
                if(preg_match('/<h1[^>]*?>(.*?)<\/h1>/si', $matches[0][$i]))
                {
                    //echo '<li>';
                    echo "<a href='#h1_".$ch1."'>".strip_tags($matches[0][$i]). "</a>";
                   
                    $ch1++;
                    echo '<ol>';
                    for($j=$i+1; $j<count($matches[0]);$j++)
                    {
                        if (preg_match('/<h2[^>]*?>(.*?)<\/h2>/si', $matches[0][$j]))
                        {
                            echo "<li> <a href='#h2_".$ch2."'>" .strip_tags($matches[0][$j]). "</a>";
                            echo '<ol>';
                            $ch2++;
                            for ($e=$j+1; $e<count($matches[0]);$e++)
                            {
                                if (preg_match('/<h3[^>]*?>(.*?)<\/h3>/si', $matches[0][$e]))
                                {
                                    echo "<li> <a href='#h3_".$ch3."'>".strip_tags($matches[0][$e])."</a></li>";
                                    $ch3++;
                                }
                                else {
                                    break;
                                }
                            }
                            echo '</ol>';
                        }
                    }
                    echo '</ol></li>';
                    $dom = new DOMDocument('1.0', 'UTF-8');
                    error_reporting(0);
                    $dom->loadHTML("\xEF\xBB\xBF". $this->text_task11);
                    $h1 = $dom->getElementsByTagName('h1');
                    $h2 = $dom->getElementsByTagName('h2');
                    $h3 = $dom->getElementsByTagName('h3');
                    for($i = 0; $i < count($h1); $i++){
                            $h1[$i]->setAttribute('id', "h1_" .$i. "");
                    }
                    for($i = 0; $i < count($h2); $i++){
                            $h2[$i]->setAttribute('id', "h2_" .$i. "");
                    }
                    for($i = 0; $i < count($h3); $i++){
                            $h3[$i]->setAttribute('id', "h3_" .$i. "");
                    }
                    $text = $dom->saveHTML();
                    echo $text;
                }
            }
        } 

        public function NEW_TASK()
        {
            $this->text_task7 = str_replace("н", "*", $this->text_task7);
            $this->text_task7 = str_replace("л", "н", $this->text_task7);
            $this->text_task7 = str_replace("*", "л", $this->text_task7);

            return $this->text_task7;
        }

        public function TASK17()
        {
        // Поиск повторов
        preg_match_all('/(\b\w+\b)/ui', $this->text_task17, $matches);
        //print_r($matches);
        
        // Массив уникальных значений
        //$matches[0] = array_unique($matches[0]);
        
        foreach($matches[0] as $elem){
            $count = 0;

            //echo $elem;
            $this->text_task17 = preg_replace_callback("/(\b".$elem."\b)(?!=<\/r>)/ui", function($item) use(&$count){
                $count++;
                if($count > 1){
                    return "<span style='background-color: #FFBF00;'>".$item[0]."</span>";
                }else{
                    return $item[0];
                }
            },$this->text_task17);
        }

        //for ($i = 0; i < count($matches[0]); $i++)
        //{
        //}
        
        // echo $this->text_task17;
        }   

        public function TASK17_2()
        {
         
        }   
    }

    function hack($data){
        $input = str_replace("<", "&lt", $data);
        $input = str_replace(">", "&gt", $input);
        $input = urldecode($input);
        return $input;
    }
?>
