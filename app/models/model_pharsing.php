<?php

class model_pharsing
{
    function db()
    {
        try {
            $pdo = new PDO('mysql:dbname=testing; host=localhost', 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        echo "It's Fine   ";
    }
    function addProduct($data, $tables, $descr, $imgs)
    {
        $pdo = new PDO('mysql:dbname=testings.loc; host=127.0.0.1', 'root', '');
        $product = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product SET model = '" . $data['model'] . "', sku = '" . $data['sku'] . "', upc = '" . $data['upc'] . "', ean = '" . $data['ean'] . "', jan = '" . $data['jan'] . "', isbn = '" . $data['isbn'] . "', mpn = '" . $data['mpn'] . "', location = '" . $data['location'] . "', quantity = '" . (int)$data['quantity'] . "',image = '". 'catalog'. $data['image'] . "', minimum = '" . (int)$data['minimum'] . "', subtract = '" . (int)$data['subtract'] . "', stock_status_id = '" . (int)$data['stock_status_id'] . "', date_available = '" . $data['date_available'] . "', manufacturer_id = '" . (int)$data['manufacturer_id'] . "', shipping = '" . (int)$data['shipping'] . "', price = '" . (float)$data['price'] . "', points = '" . (int)$data['points'] . "', weight = '" . (float)$data['weight'] . "', weight_class_id = '" . (int)$data['weight_class_id'] . "', length = '" . (float)$data['length'] . "', width = '" . (float)$data['width'] . "', height = '" . (float)$data['height'] . "', length_class_id = '" . (int)$data['length_class_id'] . "', status = '" . (int)$data['status'] . "', tax_class_id = '" . (int)$data['tax_class_id'] . "', sort_order = '" . (int)$data['sort_order'] . "', date_added = NOW(), date_modified = NOW()");
        $product->execute($data);
        $products_id = $pdo->lastInsertId();
        echo $products_id;
        foreach ($tables as $key => $value) {
            for ($i = 1; $i <= 3; $i++) {
                $language_id = $i;
                $product_id = $products_id;
                $product_atrib = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product_attribute SET product_id = '" . $product_id . "', attribute_id = '" . $key . "', language_id = '" . $language_id . "', text = '" . $value . "'");
                $product_atrib->execute($tables);
                $product_descr = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . $product_id . "', language_id = '" . $language_id . "', name = '" . $descr['name'] . "', description = '" . $descr['description'] . "', tag = '" . $descr['tag'] . "', meta_title = '" . $descr['meta_title'] . "', meta_keyword = '" . $descr['meta_keyword'] . "', meta_description = '" . $descr['meta_description'] . "'");
                $product_descr->execute($descr);
            }
        }
        foreach ($imgs['img'] as $key => $value) {
            $product_img = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . $product_id . "', image = '" . 'catalog'.$value . "', sort_order = '" . $imgs['sort_order'] . "'");
            $product_img->execute($imgs);
        }
        $store_id ='0';
        $category_id = '63';
        $main_category = '0';
        $product_to_category = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . $product_id . "', category_id = '" . $category_id . "', main_category = '" . $main_category . "'");
        $product_to_category->execute();
        $product_to_store = $pdo->prepare("INSERT INTO " . DB_PREFIX . "product_to_store SET product_id = '" . $product_id . "', store_id = '" . $store_id . "'");
        $product_to_store->execute();
    }
}
