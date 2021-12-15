<?php

class controller_pharsing extends Controller
{
    function __construct()
    {
        $this->model = new Model_pharsing();
        $this->view = new View();
    }

    function brute_force($content, $name)
    {
        $url = 'https://cooperandhunter.ua/ua/product/' . $name;
        $file = file_get_contents($url);
        $doc = phpQuery::newDocument($file);
        $img = array();
        foreach ($doc->find($content) as $articale) {
            $articale = pq($articale);
            $img[] = $articale->find('img')->attr('src');
            $text [] = $articale->find('ul');

        }
        foreach ($img as $item => $value) {
            $png = file_get_contents('https://cooperandhunter.ua' . $value );
            $path = array_pop(explode("/", $value));
            $paths = explode("/", $value);
            file_put_contents('E:\MyOpenServer\domains\klimat-blog.com.ua\public_html\image\catalog' . trim($value), $png);
        }
        /*$text [] = $articale->find('ul');*/
        return $img;
    }

    function brute_force1($content, $name)
    {
        $url = 'https://cooperandhunter.ua/ua/product/' . $name ;
        $file = file_get_contents($url);
        $doc = phpQuery::newDocument($file);
        $text = $doc->find($content);
        return $text;
    }

    function brute_force2($content, $name)
    {
        $url = 'https://cooperandhunter.ua/ua/product/' . $name . '/';
        $file = file_get_contents($url);
        $doc = phpQuery::newDocument($file);
        $table = array();
        $table1 = array();
        foreach ($doc->find($content) as $articale) {
            $articale = pq($articale);
            $table[] = $articale->end('td')->html();

        }
        return $table;
    }

    function action_index()
    {
        /*$pices = "'CH-S07XN7','9340','CH-S09XN7','10150','CH-S12XN7','11950','CH-S18XN7','19460','CH-S24XN7','24940','CH-S30XN7','29730','CH-S36XL9','45560','CH-S24GKP8','21660','CH-S07FTX5','13340','CH-S09FTX5','14590','CH-S12FTX5','15890','CH-S18FTX5','24850','CH-S24FTX5','28740','CH-S07FTXF-NG','13490','CH-S09FTXF-NG','15490','CH-S12FTXF-NG','17110','CH-S18FTXF-NG','26130','CH-S24FTXF-NG','29460','CH-S07FTXE','14300','CH-S09FTXE-NG','15890','CH-S12FTXE-NG','17280','CH-S18FTXE-NG','26450','CH-S24FTXL2E-NG','33260','CH-S07FTXQ','14440','CH-S09FTXQ-NG','16040','CH-S12FTXQ-NG','17490','CH-S18FTXQ-NG','26620','CH-S24FTXL2Q-NG','33610','CH-S09FTXD','19750','CH-S12FTXD','21460','CH-S18FTXD','30650','CH-S24FTXD','35530','CH-S09FTXD-BL','21550','CH-S12FTXD-BL','22880','CH-S18FTXD-BL','32890','CH-S24FTXD-BL','37530','CH-S09FTXB-W','32480','CH-S12FTXB-W','33730','CH-S09FTXB-G','34020','CH-S12FTXB-G','35210','CH-S09FTXZ-NG','33180','CH-S12FTXZ-NG','35870','CH-S18FTXZ-NG','39180','CH-S09FTXAL-WP','23370','CH-S12FTXAL-WP','24220','CH-S18FTXAL-WP','33640','CH-S24FTXAL-WP','39560','CH-S09FTXAL-BL','23370','CH-S12FTXAL-BL','24220','CH-S18FTXAL-BL','33640','CH-S24FTXAL-BL','39560','CH-S12FTXAL-GD','24220','CH-S18FTXAL-GD','33640','CH-S24FTXAL-GD','39560','CH-S09FTXAL-SC','23370','CH-S12FTXAL-SC','24220','CH-S18FTXAL-SC','33640','CH-S24FTXAL-SC','39560','CH-S09FTXAL-FB','23370','CH-S12FTXAL-FB','24220','CH-S18FTXAL-FB','33640','CH-S24FTXAL-FB','39560','CH-S09FTXTB2S-NG','30130','CH-S12FTXTB2S-NG','31520','CH-S18FTXTB2S-NG','38020','CH-S24FTXTB2S-NG','46140','CH-S09FTXN-NG','19580','CH-S12FTXN-NG','21230','CH-S18FTXN-NG','31410','CH-S24FTXN-NG','36630','CH-S09FTXR-NG','18910','CH-S12FTXR-NG','20560','CH-S18FTXR-NG','29900','CH-S24FTXR-NG','34280','CH-S09FTXLA-NG','21000','CH-S12FTXLA-NG','22620','CH-S18FTXLA-NG','33150','CH-S24FTXLA-NG','39180','CH-S09FTXN-PW','23900','CH-S12FTXN-PW','25840','CH-S18FTXN-PW','35550','CH-S24FTXN-PW','39960','CH-S09FTXN-PB','24530','CH-S12FTXN-PB','26560','CH-S18FTXN-PB','36420','CH-S24FTXN-PB','40950','CH-S09FVX','23840','CH-S09FTXAM2S-WP','32450','CH-S12FTXAM2S-WP','33730','CH-S18FTXAM2S-WP','38630','CH-S24FTXAM2S-WP','43240','CH-S09FTXAM2S-BL','32450','CH-S12FTXAM2S-BL','33730','CH-S18FTXAM2S-BL','38630','CH-S24FTXAM2S-BL','43240','CH-S09FTXAM2S-GD','32450','CH-S12FTXAM2S-GD','33730','CH-S18FTXAM2S-GD','38630','CH-S24FTXAM2S-GD','43240','CH-S09FTXAM2S-SC','32450','CH-S12FTXAM2S-SC','33730','CH-S18FTXAM2S-SC','38630'";
        $inter_value = ",'OSH-08LD7W','8530','OSH-10LD7W','9670','OSH-14LD7W','11890','OSH-18LD7W','19140','OSH-24LD7W','23390','OSH-07FRH2','11120','OSH-09FRH2','11400','OSH-12FRH2','12790','OSH-18FRH2','22800','OSH-24FRH2','27160','OSH-09FR9','11630','OSH-10FR9','11930','OSH-12FR9','13440','OSH-18FR9','22560','OSH-24FR9','27340'";
         $inter_values = ",,'$$$',,'$$$''OSH-10FR9','11930',OSH-12FR9','13440','OSH-18FR9','22560','OSH-24FR9','27340'"
        */$names_do = "'ch-p15cw3i-tatras','1240','ch-p55w5i','1500','ch-p36w5-alps','1800','ch-p23w5i','1950','ch-p25b3i-himalaya','1952'";
        $name_did = array();
        $names = array();
        $prices = array();
        $name_did = explode(",", $names_do);
        foreach ($name_did as $key => $value) {
            $bcom = bcmod($key, '2');

            if ($bcom > 0) {
                array_push($prices, trim($value));
            } else {
                array_push($names, trim($value));
            }
        }
        $i = 0;
        foreach ($names as $key => $values) {
            $name = str_replace("'", "", trim($names[$key]));
            $price = (int)str_replace("'", "", trim($prices[$key]));
            $table_pic = array();
            $image = 'https://cooperandhunter.ua/';
            $content = '.slide-inner ';
            /*$content_olmo ='#slider .detail-img-thumbs-l-i';*/
            $img = ($this->brute_force($content, $name));
            echo '<pre>' . print_r($img) . '</pre>>';
            $content = '.catalog__items ul';
            /*$content='.catalogueItemDescription div';*/
            $text = ($this->brute_force1($content, $name));
            $content = '.item-model-info__content table tr td';
            /*$content = '.technical_table tr td';*/
            $table = ($this->brute_force2($content, $name));
            $this->view->img = $img;
            $this->view->table = $table;
            $this->view->text = $text;
            $table_efect = array();
            $table_vaga = array();
            $table_pic = explode("×", $table[38], 3);
            $table_efect = explode("/", $table[17]);
            $table_vaga = explode("/", $table[33]);
            $imgs = array(
                'image' => $image,
                'sort_order' => '0',
                'img' => $img,
            );
            $descr = array(
                'name' => $name,
                'tag' => $name,
                'meta_title' => $name,
                'meta_description' => $name,
                'meta_keyword' => $name,
                'description' => str_replace("'", '', $text),
            );
            $data = array(
                'model' => $name,
                'sku' => $name,
                'upc' => '',
                'ean' => '',
                'jan' => '',
                'isbn' => '',
                'mpn' => '',
                'location' => '',
                'quantity' => '100',
                'minimum' => '',
                'subtract' => '',
                'stock_status_id' => '',
                'date_available' => '2021-11-29',
                'image' => $img[0],
                'manufacturer_id' => '12',
                'shipping' => '2',
                'points' => '11',
                'price' => $price,
                'weight' => (int)$table[42],
                'weight_class_id' => '',
                'length_class_id' => '',
                'length' => $table_pic[0],
                'width' => $table_pic[1],
                'height' => $table_pic[2],
                'status' => '1',
                'sort_order' => '0',
                'tax_class_id' => '',
                'viewed' => '2'
            );
            $tables = array(
                /*'12' => $table[3],/*Продуктивність, холод,  кВт*/
                /*'13' => $table[6],/*Продуктивність, тепло,  кВт*/
                '14' => $table[8],/*Джерело електроживлення, */
                '15' => $table[14],/*Номінальна споживана потужність, холод, кВт, */
                /*'16' => $table[15],/*Номінальна споживана потужність, тепло, кВт, */
                /*'17' => $table[19],/*Енергоефективність, EER (холод), 	кВт/кВт, */
                /*'18' => $table[22],/*Енергоефективність, EER (тепло), 	кВт/кВт, */
                '19' => $table[20],/*Повітрявиробництво, м³/ч, */
                '20' => $table[17],/*Рівень шуму, Вн. блок (мін/серед/мак),  дБ (А)*/
               /* '21' => $table[48],/*Рівень шуму, Зовн. блок ,  дБ (А)*/
                /*'22' => $table[34],/*Тип холодагенту*/
                '23' => $table[2],/*Габаритні розміри (ширина/висота/глибина), Вн. блок, мм*/
               /* '24' => $table[24],/*Габаритні розміри (ширина/висота/глибина), Зовн. блок, мм*/
                '25' => $table[23],/* Маса, Вн. блок, кг*/
                /*'26' => $table[44],/* Маса, Зов. блок, кг*/
                /*'27' => $table[50],/*Осушення, л/ч */
                /*'28' => $table[54],/*Температурний діапазон роботи, на охолодження, °C*/
               /* '29' => $table[57],/*Температурний діапазон роботи, на обігрів, °C*/
                /*'30' => $table[47], /*Маса холодагенту, кг*/
               /* '31' => $table[54], /*Діаметр рідинної магістралі, мм/дюйм, 6,38/1/4&quo...*/
                /*'32' => $table[56], /* Діаметр газової магістралі, мм/дюйм, 6,38/1/4&quot...*/
                /*'33' => $table[60], /*Максимальний перепад висоти магістралі*/
                /*'34' => trim($table[58]), /*Максимальна довжина магістралі, м*/
                /*'35' => trim($table[60]), /*Відстань між болтами кріплення Зов. блоку, мм */
                  '36' => ($table[5]), /*Площа очистки */
                  '37' => ($table[14]), /*Потужність */
                  '38' => ($table[25]), /*Цвет */
            );
            $i = ($i + 1);
            echo $i . ' ' . 'Model =' . $name . ' ' . 'Price = ' . $price . ' Weight = ' . $table[45] . '+' . $table[48];
            echo '</br>';

            $this->view->tables = $tables;
            $this->view->data = $data;
            $this->model->addProduct($data, $tables, $descr, $imgs);
            $this->view->name = 'pharsing';
            $this->view->generate();
        }

    }

}