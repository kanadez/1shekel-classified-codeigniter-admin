<!DOCTYPE html>

<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <?php

    $page = get_current_page();


    if (!isset($sub_title))
        $sub_title = (isset($page['title'])) ? $page['title'] : lang_key('list_your_ad');

    $seo = (isset($page['seo_settings']) && $page['seo_settings'] != '') ? (array)json_decode($page['seo_settings']) : array();

    if (!isset($meta_desc))
        $meta_desc = (isset($seo['meta_description'])) ? $seo['meta_description'] : get_settings('site_settings', 'meta_description');?>

    <?php
    if(isset($post))
    {
        echo (isset($post))?social_sharing_meta_tags_for_post($post):'';
    }
    elseif(isset($blog_meta))
    {
        echo (isset($blog_meta))?social_sharing_meta_tags_for_blog($blog_meta):'';

    }

    ?>

    <title><?php echo translate($sub_title); ?><?php $arr = array(
'/' => 'Доска бесплатных объявлений Израиля',
'/index.php/ru' => 'Доска бесплатных объявлений Израиля',
'/index.php/ru/account/signup' => 'Регистрация на сайте', 
'/index.php/ru/show/page/rules' => 'Правила сайта', 
'/index.php/ru/account/recoverpassword' => 'Восстановление забытого пароля',  
'/index.php/ru/news-posts' => 'Новости', 
'/index.php/ru/choose-package' => 'Выберите тариф',
'/index.php/ru/account/trylogin' => 'Вход в свой аккаунт',  

// Бизнес и услуги
'/index.php/ru/show/categoryposts/9/%D0%91%D0%B8%D0%B7%D0%BD%D0%B5%D1%81-%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления бизнес и услуги в Израиле',
'/index.php/ru/show/categoryposts/47/%D0%A1%D1%82%D1%80%D0%BE%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D1%82%D0%B2%D0%BE-%D0%B8-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82' => 'Бесплатные объявления строительство и ремонт в Израиле',
'/index.php/ru/show/categoryposts/48/%D0%A4%D0%B8%D0%BD%D0%B0%D0%BD%D1%81%D0%BE%D0%B2%D1%8B%D0%B5-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления финансовые услуги в Израиле',
'/index.php/ru/show/categoryposts/49/%D0%9F%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B7%D0%BA%D0%B8-%D0%B8-%D0%B0%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82%D0%B0' => 'Бесплатные объявления перевозки и аренда транспорта в Израиле',
'/index.php/ru/show/categoryposts/50/%D0%A0%D0%B5%D0%BA%D0%BB%D0%B0%D0%BC%D0%B0-%D0%B8-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3' => 'Бесплатные объявления реклама и маркетинг в Израиле',
'/index.php/ru/show/categoryposts/51/%D0%9D%D1%8F%D0%BD%D0%B8-%D0%B8-%D1%81%D0%B8%D0%B4%D0%B5%D0%BB%D0%BA%D0%B8' => 'Бесплатные объявления няни и сиделки в Израиле',
'/index.php/ru/show/categoryposts/52/%D0%A1%D1%8B%D1%80%D1%8C%D0%B5-%D0%B8-%D0%BC%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%B0%D0%BB%D1%8B' => 'Бесплатные объявления сырье и материалы в Израиле',
'/index.php/ru/show/categoryposts/53/%D0%9A%D1%80%D0%B0%D1%81%D0%BE%D1%82%D0%B0-%D0%B8-%D0%B7%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D1%8C%D0%B5' => 'Бесплатные объявления красота и здоровье в Израиле',
'/index.php/ru/show/categoryposts/54/%D0%9E%D0%B1%D0%BE%D1%80%D1%83%D0%B4%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5' => 'Бесплатные объявления оборудование в Израиле',
'/index.php/ru/show/categoryposts/55/%D0%9E%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5-%D0%B8-%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления образование и спорт в Израиле',
'/index.php/ru/show/categoryposts/56/%D0%A3%D1%81%D0%BB%D1%83%D0%B3%D0%B8-%D0%B4%D0%BB%D1%8F-%D0%B6%D0%B8%D0%B2%D0%BE%D1%82%D0%BD%D1%8B%D1%85' => 'Бесплатные объявления услуги для животных в Израиле',
'/index.php/ru/show/categoryposts/57/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%B1%D0%B8%D0%B7%D0%BD%D0%B5%D1%81%D0%B0' => 'Бесплатные объявления продажа бизнеса в Израиле',
'/index.php/ru/show/categoryposts/58/%D0%98%D1%81%D0%BA%D1%83%D1%81%D1%81%D1%82%D0%B2%D0%BE,-%D1%84%D0%BE%D1%82%D0%BE-%D0%B8-%D0%B2%D0%B8%D0%B4%D0%B5%D0%BE' => 'Бесплатные объявления искусство, фото и видеосъемка сь в Израиле',
'/index.php/ru/show/categoryposts/59/%D0%A2%D1%83%D1%80%D0%B8%D0%B7%D0%BC-%D0%B8-%D0%B8%D0%BC%D0%BC%D0%B8%D0%B3%D1%80%D0%B0%D1%86%D0%B8%D1%8F' => 'Бесплатные объявления туризм и иммиграция в Израиле',
'/index.php/ru/show/categoryposts/60/%D0%A3%D1%81%D0%BB%D1%83%D0%B3%D0%B8-%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%87%D0%B8%D0%BA%D0%BE%D0%B2-%D0%B8-%D0%BD%D0%B0%D0%B1%D0%BE%D1%80%D0%B0-%D1%82%D0%B5%D0%BA%D1%81%D1%82%D0%B0' => 'Бесплатные объявления услуги переводчиков и набора текста в Израиле',
'/index.php/ru/show/categoryposts/61/%D0%90%D0%B2%D1%82%D0%BE-%D0%B8-%D0%BC%D0%BE%D1%82%D0%BE-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления авто и мото услуги в Израиле',
'/index.php/ru/show/categoryposts/62/%D0%9E%D0%B1%D1%81%D0%BB%D1%83%D0%B6%D0%B8%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5-%D0%B8-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82-%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B8' => 'Бесплатные объявления обслуживание и ремонт техники в Израиле',
'/index.php/ru/show/categoryposts/63/%D0%A1%D0%B5%D1%82%D0%B5%D0%B2%D0%BE%D0%B9-%D0%BC%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3' => 'Бесплатные объявления сетевой маркетинг в Израиле',
'/index.php/ru/show/categoryposts/64/%D0%AE%D1%80%D0%B8%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B5-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления юридические услуги в Израиле',
'/index.php/ru/show/categoryposts/65/%D0%9F%D1%80%D0%BE%D0%BA%D0%B0%D1%82-%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D0%BE%D0%B2' => 'Бесплатные объявления прокат товаров в Израиле',
'/index.php/ru/show/categoryposts/66/%D0%9F%D1%80%D0%BE%D1%87%D0%B8%D0%B5-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления прочие услуги в Израиле',
// Детский мир
'/index.php/ru/show/categoryposts/42/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B9-%D0%BC%D0%B8%D1%80' => 'Бесплатные объявления купить и продать детские вещи в Израиле',
'/index.php/ru/show/categoryposts/84/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B0%D1%8F-%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0' => 'Бесплатные объявления купить и продать детскую одежду в Израиле',
'/index.php/ru/show/categoryposts/85/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B0%D1%8F-%D0%BE%D0%B1%D1%83%D0%B2%D1%8C' => 'Бесплатные объявления купить и продать детскую обувь в Израиле',
'/index.php/ru/show/categoryposts/86/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D0%BA%D0%BE%D0%BB%D1%8F%D1%81%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать детские коляски в Израиле',
'/index.php/ru/show/categoryposts/87/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D0%B0%D0%B2%D1%82%D0%BE%D0%BA%D1%80%D0%B5%D1%81%D0%BB%D0%B0' => 'Бесплатные объявления купить и продать детские автокресла в Израиле',
'/index.php/ru/show/categoryposts/88/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B0%D1%8F-%D0%BC%D0%B5%D0%B1%D0%B5%D0%BB%D1%8C' => 'Бесплатные объявления купить и продать детскую мебель в Израиле',
'/index.php/ru/show/categoryposts/89/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D0%B8%D0%B3%D1%80%D1%83%D1%88%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать детские игрушки в Израиле',
'/index.php/ru/show/categoryposts/90/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B9-%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать детские игрушки в Израиле',
'/index.php/ru/show/categoryposts/91/%D0%A2%D0%BE%D0%B2%D0%B0%D1%80%D1%8B-%D0%B4%D0%BB%D1%8F-%D0%BA%D0%BE%D1%80%D0%BC%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F' => 'Бесплатные объявления купить и продать товары для кормления ребенка в Израиле',
'/index.php/ru/show/categoryposts/92/%D0%A2%D0%BE%D0%B2%D0%B0%D1%80%D1%8B-%D0%B4%D0%BB%D1%8F-%D1%88%D0%BA%D0%BE%D0%BB%D1%8C%D0%BD%D0%B8%D0%BA%D0%BE%D0%B2' => 'Бесплатные объявления купить и продать товары для школьников в Израиле',
'/index.php/ru/show/categoryposts/93/%D0%94%D1%80%D1%83%D0%B3%D0%B8%D0%B5-%D0%B4%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B' => 'Бесплатные объявления купить и продать детские товары в Израиле',
// Недвижимость
'/index.php/ru/show/categoryposts/7/%D0%9D%D0%B5%D0%B4%D0%B2%D0%B8%D0%B6%D0%B8%D0%BC%D0%BE%D1%81%D1%82%D1%8C' => 'Бесплатные объявления купить и продать, сдать в аренду недвижимость в Израиле',
'/index.php/ru/show/categoryposts/32/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%BA%D0%B2%D0%B0%D1%80%D1%82%D0%B8%D1%80' => 'Бесплатные объявления аренда квартир в Израиле',
'/index.php/ru/show/categoryposts/33/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%BA%D0%BE%D0%BC%D0%BD%D0%B0%D1%82' => 'Бесплатные объявления аренда комнат в Израиле',
'/index.php/ru/show/categoryposts/34/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%B4%D0%BE%D0%BC%D0%BE%D0%B2' => 'Бесплатные объявления аренда домов в Израиле',
'/index.php/ru/show/categoryposts/35/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%B7%D0%B5%D0%BC%D0%BB%D0%B8' => 'Бесплатные объявления аренда земли в Израиле',
'/index.php/ru/show/categoryposts/36/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%B3%D0%B0%D1%80%D0%B0%D0%B6%D0%B5%D0%B9-%D0%B8-%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%BE%D0%BA' => 'Бесплатные объявления аренда гаражей и стоянок в Израиле',
'/index.php/ru/show/categoryposts/67/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%BA%D0%B2%D0%B0%D1%80%D1%82%D0%B8%D1%80' => 'Бесплатные объявления продажа квартир в Израиле',
'/index.php/ru/show/categoryposts/68/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%BA%D0%BE%D0%BC%D0%BD%D0%B0%D1%82' => 'Бесплатные объявления продажа комнат в Израиле',
'/index.php/ru/show/categoryposts/69/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%B4%D0%BE%D0%BC%D0%BE%D0%B2' => 'Бесплатные объявления продажа домов в Израиле',
'/index.php/ru/show/categoryposts/70/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%B7%D0%B5%D0%BC%D0%BB%D0%B8' => 'Бесплатные объявления продажа земли в Израиле',
'/index.php/ru/show/categoryposts/71/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%B3%D0%B0%D1%80%D0%B0%D0%B6%D0%B5%D0%B9-%D0%B8-%D1%81%D1%82%D0%BE%D1%8F%D0%BD%D0%BE%D0%BA' => 'Бесплатные объявления продажа гаражей и стоянок в Израиле',
'/index.php/ru/show/categoryposts/72/%D0%90%D1%80%D0%B5%D0%BD%D0%B4%D0%B0-%D0%BF%D0%BE%D0%BC%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D0%B9' => 'Бесплатные объявления аренда помещений в Израиле',
'/index.php/ru/show/categoryposts/73/%D0%9F%D1%80%D0%BE%D0%B4%D0%B0%D0%B6%D0%B0-%D0%BF%D0%BE%D0%BC%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D0%B9' => 'Бесплатные объявления продажа помещений в Израиле',
'/index.php/ru/show/categoryposts/74/%D0%9E%D0%B1%D0%BC%D0%B5%D0%BD-%D0%BD%D0%B5%D0%B4%D0%B2%D0%B8%D0%B6%D0%B8%D0%BC%D0%BE%D1%81%D1%82%D0%B8' => 'Бесплатные объявления обмен недвижимости в Израиле',
'/index.php/ru/show/categoryposts/75/%D0%9F%D1%80%D0%BE%D1%87%D0%B0%D1%8F-%D0%BD%D0%B5%D0%B4%D0%B2%D0%B8%D0%B6%D0%B8%D0%BC%D0%BE%D1%81%D1%82%D1%8C' => 'Бесплатные объявления прочая недвижимость в Израиле',
);
echo isset($arr[$_SERVER['REQUEST_URI']]) ? $arr[$_SERVER['REQUEST_URI']] : '';?>

<?php $arr = array(
// Транспорт
'/index.php/ru/show/categoryposts/8/%D0%A2%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать транспорт в Израиле',
'/index.php/ru/show/categoryposts/37/%D0%9C%D0%BE%D1%82%D0%BE%D1%86%D0%B8%D0%BA%D0%BB%D1%8B' => 'Бесплатные объявления купить и продать мотоцикл в Израиле',
'/index.php/ru/show/categoryposts/38/%D0%A1%D0%BF%D0%B5%D1%86%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать спецтехнику в Израиле',
'/index.php/ru/show/categoryposts/39/%D0%9B%D0%B5%D0%B3%D0%BA%D0%BE%D0%B2%D1%8B%D0%B5-%D0%B0%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B1%D0%B8%D0%BB%D0%B8' => 'Бесплатные объявления купить и продать автомобиль в Израиле',
'/index.php/ru/show/categoryposts/40/%D0%90%D0%B2%D1%82%D0%BE%D0%B1%D1%83%D1%81%D1%8B' => 'Бесплатные объявления купить и продать автобус в Израиле',
'/index.php/ru/show/categoryposts/76/%D0%93%D1%80%D1%83%D0%B7%D0%BE%D0%B2%D1%8B%D0%B5-%D0%B0%D0%B2%D1%82%D0%BE%D0%BC%D0%BE%D0%B1%D0%B8%D0%BB%D0%B8' => 'Бесплатные объявления купить и продать грузовой автомобиль в Израиле',
'/index.php/ru/show/categoryposts/77/%D0%A1%D0%B5%D0%BB%D1%8C%D1%85%D0%BE%D0%B7%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать сельхозтехнику в Израиле',
'/index.php/ru/show/categoryposts/78/%D0%92%D0%BE%D0%B4%D0%BD%D1%8B%D0%B9-%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать водный транспорт в Израиле',
'/index.php/ru/show/categoryposts/79/%D0%92%D0%BE%D0%B7%D0%B4%D1%83%D1%88%D0%BD%D1%8B%D0%B9-%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать воздушный транспорт в Израиле',
'/index.php/ru/show/categoryposts/80/%D0%97%D0%B0%D0%BF%D1%87%D0%B0%D1%81%D1%82%D0%B8-%D0%B8-%D0%B0%D0%BA%D1%81%D0%B5%D1%81%D1%81%D1%83%D0%B0%D1%80%D1%8B' => 'Бесплатные объявления купить и продать запчасти для автомобиля и другого транспорта в Израиле',
'/index.php/ru/show/categoryposts/81/%D0%9F%D1%80%D0%B8%D1%86%D0%B5%D0%BF%D1%8B' => 'Бесплатные объявления купить и продать прицеп в Израиле',
'/index.php/ru/show/categoryposts/83/%D0%94%D1%80%D1%83%D0%B3%D0%BE%D0%B9-%D1%82%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать другой транспорт в Израиле',
// Электроника
'/index.php/ru/show/categoryposts/1/%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать электронику в Израиле',
'/index.php/ru/show/categoryposts/10/%D0%9A%D0%BE%D0%BC%D0%BF%D1%8C%D1%8E%D1%82%D0%B5%D1%80%D1%8B-%D0%B8-%D0%BD%D0%BE%D1%83%D1%82%D0%B1%D1%83%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать компьютеры и ноутбуки в Израиле',
'/index.php/ru/show/categoryposts/11/%D0%A4%D0%BE%D1%82%D0%BE-%D0%B8-%D0%B2%D0%B8%D0%B4%D0%B5%D0%BE' => 'Бесплатные объявления купить и продать фотоаппарат, зеркальную камеру и видеокамеру в Израиле',
'/index.php/ru/show/categoryposts/12/%D0%A2%D0%B5%D0%BB%D0%B5%D1%84%D0%BE%D0%BD%D1%8B-%D0%B8-%D0%BF%D0%BB%D0%B0%D0%BD%D1%88%D0%B5%D1%82%D1%8B' => 'Бесплатные объявления купить и продать телефон и планшет в Израиле',
'/index.php/ru/show/categoryposts/13/%D0%A2%D0%92-%D0%B8-%D0%B2%D0%B8%D0%B4%D0%B5%D0%BE%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать телевизор и видео технику в Израиле',
'/index.php/ru/show/categoryposts/105/%D0%90%D1%83%D0%B4%D0%B8%D0%BE%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать аудиотехнику в Израиле',
'/index.php/ru/show/categoryposts/106/%D0%98%D0%B3%D1%80%D1%8B-%D0%B8-%D0%B8%D0%B3%D1%80%D0%BE%D0%B2%D1%8B%D0%B5-%D0%BF%D1%80%D0%B8%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать игры и игровые приставки в Израиле',
'/index.php/ru/show/categoryposts/107/%D0%A2%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%B4%D0%BE%D0%BC%D0%B0' => 'Бесплатные объявления купить и продать технику для дома в Израиле',
'/index.php/ru/show/categoryposts/108/%D0%A2%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0-%D0%B4%D0%BB%D1%8F-%D0%BA%D1%83%D1%85%D0%BD%D0%B8' => 'Бесплатные объявления купить и продать технику для кухни в Израиле',
'/index.php/ru/show/categoryposts/109/%D0%9A%D0%BB%D0%B8%D0%BC%D0%B0%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5-%D0%BE%D0%B1%D0%BE%D1%80%D1%83%D0%B4%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5' => 'Бесплатные объявления купить и продать климатическое оборудование в Израиле',
'/index.php/ru/show/categoryposts/110/%D0%98%D0%BD%D0%B4%D0%B8%D0%B2%D0%B8%D0%B4%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9-%D1%83%D1%85%D0%BE%D0%B4' => 'Бесплатные объявления купить и продать технику для индивидуального ухода в Израиле',
'/index.php/ru/show/categoryposts/111/%D0%90%D0%BA%D1%81%D0%B5%D1%81%D1%81%D1%83%D0%B0%D1%80%D1%8B-%D0%B8-%D0%BA%D0%BE%D0%BC%D0%BF%D0%BB%D0%B5%D0%BA%D1%82%D1%83%D1%8E%D1%89%D0%B8%D0%B5' => 'Бесплатные объявления купить и продать аксессуары и комплектующие для техники в Израиле',
'/index.php/ru/show/categoryposts/112/%D0%9F%D1%80%D0%BE%D1%87%D0%B0%D1%8F-%D1%8D%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления купить и продать прочую электронику в Израиле',
// Мода и стиль
'/index.php/ru/show/categoryposts/3/%D0%9C%D0%BE%D0%B4%D0%B0-%D0%B8-%D1%81%D1%82%D0%B8%D0%BB%D1%8C' => 'Бесплатные объявления купить и продать модную одежду и вещи в Израиле',
'/index.php/ru/show/categoryposts/17/%D0%90%D0%BA%D1%81%D0%B5%D1%81%D1%81%D1%83%D0%B0%D1%80%D1%8B' => 'Бесплатные объявления купить и продать модные аксессуары и украшения в Израиле',
'/index.php/ru/show/categoryposts/18/%D0%9E%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0' => 'Бесплатные объявления купить и продать женскую и мужскую одежду в Израиле',
'/index.php/ru/show/categoryposts/19/%D0%AE%D0%B2%D0%B5%D0%BB%D0%B8%D1%80%D0%BD%D1%8B%D0%B5-%D0%B8%D0%B7%D0%B4%D0%B5%D0%BB%D0%B8%D1%8F' => 'Бесплатные объявления купить и продать ювелирные изделия в Израиле',
'/index.php/ru/show/categoryposts/20/%D0%9E%D0%B1%D1%83%D0%B2%D1%8C' => 'Бесплатные объявления купить и продать женскую и мужскую обувь в Израиле',
'/index.php/ru/show/categoryposts/21/%D0%9D%D0%B0%D1%80%D1%83%D1%87%D0%BD%D1%8B%D0%B5-%D1%87%D0%B0%D1%81%D1%8B' => 'Бесплатные объявления купить и продать женские и мужские наручные часы в Израиле',
'/index.php/ru/show/categoryposts/113/%D0%9A%D1%80%D0%B0%D1%81%D0%BE%D1%82%D0%B0-%D0%B8-%D0%B7%D0%B4%D0%BE%D1%80%D0%BE%D0%B2%D1%8C%D0%B5' => 'Бесплатные объявления купить и продать женскую и мужскую косметику в Израиле',
'/index.php/ru/show/categoryposts/114/%D0%9F%D0%BE%D0%B4%D0%B0%D1%80%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать подарки к праздникам в Израиле',
'/index.php/ru/show/categoryposts/115/%D0%9F%D1%80%D0%BE%D1%87%D0%B8%D0%B5-%D0%BC%D0%BE%D0%B4%D0%BD%D1%8B%D0%B5-%D0%B2%D0%B5%D1%89%D0%B8' => 'Бесплатные объявления купить и продать прочие модные вещи в Израиле',
);
echo isset($arr[$_SERVER['REQUEST_URI']]) ? $arr[$_SERVER['REQUEST_URI']] : '';?>

<?php $arr = array(
// Работа
'/index.php/ru/show/categoryposts/4/%D0%A0%D0%B0%D0%B1%D0%BE%D1%82%D0%B0C' => 'Бесплатные объявления свежие вакансии и предложения о работе в Израиле',
'/index.php/ru/show/categoryposts/22/%D0%A0%D0%BE%D0%B7%D0%BD%D0%B8%D1%87%D0%BD%D0%B0%D1%8F-%D1%82%D0%BE%D1%80%D0%B3%D0%BE%D0%B2%D0%BB%D1%8F' => 'Бесплатные объявления свежие вакансии и предложения о работе в сфере торговли в Израиле',
'/index.php/ru/show/categoryposts/23/%D0%A2%D1%80%D0%B0%D0%BD%D1%81%D0%BF%D0%BE%D1%80%D1%82-%D0%B8-%D0%BB%D0%BE%D0%B3%D0%B8%D1%81%D1%82%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления свежие вакансии и предложения о работе в сфере транспорта и логистики в Израиле',
'/index.php/ru/show/categoryposts/24/%D0%A1%D1%82%D1%80%D0%BE%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D1%82%D0%B2%D0%BE-%D0%B8-%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82' => 'Бесплатные объявления свежие вакансии и предложения о работе в сфере строительства и ремонта в Израиле',
'/index.php/ru/show/categoryposts/116/%D0%A0%D0%B5%D1%81%D1%82%D0%BE%D1%80%D0%B0%D0%BD%D1%8B,-%D0%BA%D0%B0%D1%84%D0%B5-%D0%B8-%D0%B3%D0%BE%D1%81%D1%82%D0%B8%D0%BD%D0%B8%D1%86%D1%8B' => 'Бесплатные объявления вакансии и предложения о работе в ресторанах, кафе и гостиницах в Израиле',
'/index.php/ru/show/categoryposts/117/%D0%AE%D1%80%D0%B8%D1%81%D1%82%D1%8B,-%D0%B0%D0%B4%D0%B2%D0%BE%D0%BA%D0%B0%D1%82%D1%8B-%D0%B8-%D0%BD%D0%BE%D1%82%D0%B0%D1%80%D0%B8%D1%83%D1%81%D1%8B' => 'Бесплатные объявления вакансии и предложения о работе юристом, адвокатом и нотариусом в Израиле',
'/index.php/ru/show/categoryposts/118/%D0%9E%D1%85%D1%80%D0%B0%D0%BD%D0%B0-%D0%B8-%D0%B1%D0%B5%D0%B7%D0%BE%D0%BF%D0%B0%D1%81%D0%BD%D0%BE%D1%81%D1%82%D1%8C' => 'Бесплатные объявления вакансии и предложения о работе в сфере охраны и безопасности в Израиле',
'/index.php/ru/show/categoryposts/119/%D0%94%D0%BE%D0%BC%D0%B0%D1%88%D0%BD%D0%B8%D0%B9-%D0%BF%D0%B5%D1%80%D1%81%D0%BE%D0%BD%D0%B0%D0%BB' => 'Бесплатные объявления вакансии и предложения о работе в сфере домашнего персонала в Израиле',
'/index.php/ru/show/categoryposts/120/%D0%9A%D1%80%D0%B0%D1%81%D0%BE%D1%82%D0%B0-%D0%B8-%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления вакансии и предложения о работе в сфере красоты и спорта в Израиле',
'/index.php/ru/show/categoryposts/121/%D0%A2%D1%83%D1%80%D0%B8%D0%B7%D0%BC-%D0%B8-%D0%BE%D1%82%D0%B4%D1%8B%D1%85' => 'Бесплатные объявления вакансии и предложения о работе в сфере туризма и отдыха в Израиле',
'/index.php/ru/show/categoryposts/122/%D0%9D%D0%B0%D1%83%D0%BA%D0%B0-%D0%B8-%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5' => 'Бесплатные объявления вакансии и предложения о работе в сфере науки и образования в Израиле',
'/index.php/ru/show/categoryposts/123/%D0%9A%D1%83%D0%BB%D1%8C%D1%82%D1%83%D1%80%D0%B0-%D0%B8-%D0%B8%D1%81%D0%BA%D1%83%D1%81%D1%81%D1%82%D0%B2%D0%BE' => 'Бесплатные объявления вакансии и предложения о работе в сфере культуры и искусства в Израиле',
'/index.php/ru/show/categoryposts/124/%D0%9C%D0%B5%D0%B4%D0%B8%D1%86%D0%B8%D0%BD%D0%B0-%D0%B8-%D1%84%D0%B0%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D1%8F' => 'Бесплатные объявления вакансии и предложения о работе в сфере медицины и фармации в Израиле',
'/index.php/ru/show/categoryposts/125/%D0%98%D0%A2-%D0%B8-%D1%82%D0%B5%D0%BB%D0%B5%D0%BA%D0%BE%D0%BC%D0%BC%D1%83%D0%BD%D0%B8%D0%BA%D0%B0%D1%86%D0%B8%D0%B8' => 'Бесплатные объявления вакансии и предложения о работе в сфере ИТ и телекоммуникаций в Израиле',
'/index.php/ru/show/categoryposts/126/%D0%9D%D0%B5%D0%B4%D0%B2%D0%B8%D0%B6%D0%B8%D0%BC%D0%BE%D1%81%D1%82%D1%8C' => 'Бесплатные объявления вакансии и предложения о работе в сфере недвижимости в Израиле',
'/index.php/ru/show/categoryposts/127/%D0%9C%D0%B0%D1%80%D0%BA%D0%B5%D1%82%D0%B8%D0%BD%D0%B3-%D0%B8-%D1%80%D0%B5%D0%BA%D0%BB%D0%B0%D0%BC%D0%B0' => 'Бесплатные объявления вакансии и предложения о работе в сфере маркетинга и рекламы в Израиле',
'/index.php/ru/show/categoryposts/128/%D0%9F%D1%80%D0%BE%D0%B8%D0%B7%D0%B2%D0%BE%D0%B4%D1%81%D1%82%D0%B2%D0%BE-%D0%B8-%D1%8D%D0%BD%D0%B5%D1%80%D0%B3%D0%B5%D1%82%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления вакансии и предложения о работе в сфере производства и энергетики в Израиле',
'/index.php/ru/show/categoryposts/129/C%D0%B5%D0%BA%D1%80%D0%B5%D1%82%D0%B0%D1%80%D0%B8%D0%B0%D1%82-%D0%B8-%D0%90%D0%A5%D0%9E' => 'Бесплатные объявления вакансии и предложения о работе в сфере секретариата и АХО в Израиле',
'/index.php/ru/show/categoryposts/130/%D0%A7%D0%B0%D1%81%D1%82%D0%B8%D1%87%D0%BD%D0%B0%D1%8F-%D0%B7%D0%B0%D0%BD%D1%8F%D1%82%D0%BE%D1%81%D1%82%D1%8C' => 'Бесплатные объявления вакансии и предложения о работе с частичной занятостью в Израиле',
'/index.php/ru/show/categoryposts/131/%D0%9D%D0%B0%D1%87%D0%B0%D0%BB%D0%BE-%D0%BA%D0%B0%D1%80%D1%8C%D0%B5%D1%80%D1%8B' => 'Бесплатные объявления вакансии и предложения о работе в начале карьеры и без стажа в Израиле',
'/index.php/ru/show/categoryposts/132/%D0%A1%D0%B5%D1%80%D0%B2%D0%B8%D1%81-%D0%B8-%D0%B1%D1%8B%D1%82' => 'Бесплатные объявления вакансии и предложения о работе в сфере обслуживания в Израиле',
'/index.php/ru/show/categoryposts/162/%D0%91%D1%83%D1%85%D0%B3%D0%B0%D0%BB%D1%82%D0%B5%D1%80%D0%B8%D1%8F,-%D0%BD%D0%B0%D0%BB%D0%BE%D0%B3%D0%B8-%D0%B8-%D1%84%D0%B8%D0%BD%D0%B0%D0%BD%D1%81%D1%8B-%D0%BF%D1%80%D0%B5%D0%B4%D0%BF%D1%80%D0%B8%D1%8F%D1%82%D0%B8%D1%8F' => 'Бесплатные объявления вакансии и предложения о работе в сфере бухгалтерии, налогов и финансов предприятия  в Израиле',
'/index.php/ru/show/categoryposts/133/%D0%94%D1%80%D1%83%D0%B3%D0%B8%D0%B5-%D1%81%D1%84%D0%B5%D1%80%D1%8B-%D0%B7%D0%B0%D0%BD%D1%8F%D1%82%D0%B8%D0%B9' => 'Бесплатные объявления вакансии и предложения о работе в других сферах занятий в Израиле',
// Дом и сад
'/index.php/ru/show/categoryposts/41/%D0%94%D0%BE%D0%BC-%D0%B8-%D1%81%D0%B0%D0%B4' => 'Бесплатные объявления купить и продать товары для сада и дома в Израиле',
'/index.php/ru/show/categoryposts/134/%D0%9A%D0%B0%D0%BD%D1%86%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B-%D0%B8-%D1%80%D0%B0%D1%81%D1%85%D0%BE%D0%B4%D0%BD%D1%8B%D0%B5-%D0%BC%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%B0%D0%BB%D1%8B' => 'Бесплатные объявления купить и продать канцтовары и расходные материалы для дома в Израиле',
'/index.php/ru/show/categoryposts/135/%D0%9C%D0%B5%D0%B1%D0%B5%D0%BB%D1%8C' => 'Бесплатные объявления купить и продать мебель для дома в Израиле',
'/index.php/ru/show/categoryposts/136/%D0%9F%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%82%D1%8B-%D0%BF%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F-%D0%B8-%D0%BD%D0%B0%D0%BF%D0%B8%D1%82%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать продукты питания и напитки в Израиле',
'/index.php/ru/show/categoryposts/137/%D0%A1%D0%B0%D0%B4-%D0%B8-%D0%BE%D0%B3%D0%BE%D1%80%D0%BE%D0%B4' => 'Бесплатные объявления купить и продать товары для сада и огорода в Израиле',
'/index.php/ru/show/categoryposts/138/%D0%9F%D1%80%D0%B5%D0%B4%D0%BC%D0%B5%D1%82%D1%8B-%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D1%8C%D0%B5%D1%80%D0%B0' => 'Бесплатные объявления купить и продать предметы интерьера в Израиле',
'/index.php/ru/show/categoryposts/139/%D0%A1%D1%82%D1%80%D0%BE%D0%B9%D0%BC%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%B0%D0%BB%D1%8B' => 'Бесплатные объявления купить и продать стройматериалы в Израиле',
'/index.php/ru/show/categoryposts/140/%D0%98%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B' => 'Бесплатные объявления купить и продать инструменты для дома в Израиле',
'/index.php/ru/show/categoryposts/141/%D0%9A%D0%BE%D0%BC%D0%BD%D0%B0%D1%82%D0%BD%D1%8B%D0%B5-%D1%80%D0%B0%D1%81%D1%82%D0%B5%D0%BD%D0%B8%D1%8F' => 'Бесплатные объявления купить и продать комнатные и экзотические растения в Израиле',
'/index.php/ru/show/categoryposts/142/%D0%9F%D0%BE%D1%81%D1%83%D0%B4%D0%B0-%D0%B8-%D0%BA%D1%83%D1%85%D0%BE%D0%BD%D0%BD%D1%8B%D0%B5-%D0%BF%D1%80%D0%B8%D0%B1%D0%BE%D1%80%D1%8B' => 'Бесплатные объявления купить и продать посуду и кухонные приборы в Израиле',
'/index.php/ru/show/categoryposts/143/%D0%A1%D0%B0%D0%B4%D0%BE%D0%B2%D1%8B%D0%B9-%D0%B8%D0%BD%D0%B2%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D1%8C' => 'Бесплатные объявления купить и продать садовый инвентарь в Израиле',
'/index.php/ru/show/categoryposts/144/%D0%A5%D0%BE%D0%B7%D1%8F%D0%B9%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D1%8B%D0%B9-%D0%B8%D0%BD%D0%B2%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D1%8C-%D0%B8-%D0%B1%D1%8B%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%85%D0%B8%D0%BC%D0%B8%D1%8F' => 'Бесплатные объявления купить и продать хозяйственный инвентарь и бытовую химию в Израиле',
'/index.php/ru/show/categoryposts/145/%D0%86%D0%BD%D1%88%D1%96-%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D0%B8-%D0%B4%D0%BB%D1%8F-%D0%B4%D0%BE%D0%BC%D1%83' => 'Бесплатные объявления купить и продать прочие товары для дома в Израиле',
);
echo isset($arr[$_SERVER['REQUEST_URI']]) ? $arr[$_SERVER['REQUEST_URI']] : '';?>

<?php $arr = array(
// Хобби и спорт
'/index.php/ru/show/categoryposts/5/%D0%A5%D0%BE%D0%B1%D0%B1%D0%B8-%D0%B8-%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления купить и продать товары для хобби и спорта в Израиле',
'/index.php/ru/show/categoryposts/25/%D0%90%D0%BD%D1%82%D0%B8%D0%BA%D0%B2%D0%B0%D1%80%D0%B8%D0%B0%D1%82-%D0%B8-%D0%BA%D0%BE%D0%BB%D0%BB%D0%B5%D0%BA%D1%86%D0%B8%D0%B8' => 'Бесплатные объявления купить и продать антиквариат и коллекции в Израиле',
'/index.php/ru/show/categoryposts/26/%D0%A1%D0%BF%D0%BE%D1%80%D1%82-%D0%B8-%D0%BE%D1%82%D0%B4%D1%8B%D1%85' => 'Бесплатные объявления купить и продать товары для спорта и отдыха в Израиле',
'/index.php/ru/show/categoryposts/27/%D0%9A%D0%BD%D0%B8%D0%B3%D0%B8-%D0%B8-%D0%B6%D1%83%D1%80%D0%BD%D0%B0%D0%BB%D1%8B' => 'Бесплатные объявления купить и продать книги и журналы в Израиле',
'/index.php/ru/show/categoryposts/146/%D0%9C%D1%83%D0%B7%D1%8B%D0%BA%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B5-%D0%B8%D0%BD%D1%81%D1%82%D1%80%D1%83%D0%BC%D0%B5%D0%BD%D1%82%D1%8B' => 'Бесплатные объявления купить и продать музыкальные инструменты в Израиле',
'/index.php/ru/show/categoryposts/147/%D0%94%D0%B8%D1%81%D0%BA%D0%B8,-%D0%BF%D0%BB%D0%B0%D1%81%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-%D0%B8-%D0%BA%D0%B0%D1%81%D1%81%D0%B5%D1%82%D1%8B' => 'Бесплатные объявления купить и продать диски, пластинки и кассеты в Израиле',
'/index.php/ru/show/categoryposts/148/%D0%91%D0%B8%D0%BB%D0%B5%D1%82%D1%8B' => 'Бесплатные объявления купить и продать билеты на концерты, матчи, фестивали и в театр в Израиле',
'/index.php/ru/show/categoryposts/149/%D0%9F%D0%BE%D1%88%D1%83%D0%BA-%D0%BF%D0%BE%D0%BF%D1%83%D1%82%D0%BD%D0%B8%D0%BA%D1%96%D0%B2' => 'Бесплатные объявления поиск попутчиков в Израиле',
'/index.php/ru/show/categoryposts/150/%D0%9F%D0%BE%D0%B8%D1%81%D0%BA-%D0%B3%D1%80%D1%83%D0%BF%D0%BF-%D0%B8-%D0%BC%D1%83%D0%B7%D1%8B%D0%BA%D0%B0%D0%BD%D1%82%D0%BE%D0%B2' => 'Бесплатные объявления поиск групп и музыкантов в Израиле',
'/index.php/ru/show/categoryposts/151/%D0%94%D1%80%D1%83%D0%B3%D0%BE%D0%B5' => 'Бесплатные объявления другие товары для хобби и спорта в Израиле',
// Животные
'/index.php/ru/show/categoryposts/6/%D0%96%D0%B8%D0%B2%D0%BE%D1%82%D0%BD%D1%8B%D0%B5' => 'Бесплатные объявления купить и продать домашних и экзотических животных в Израиле',
'/index.php/ru/show/categoryposts/28/%D0%9A%D0%BE%D1%88%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать кошку и котят в Израиле',
'/index.php/ru/show/categoryposts/29/%D0%A1%D0%BE%D0%B1%D0%B0%D0%BA%D0%B8' => 'Бесплатные объявления купить и продать собаку и щенков в Израиле',
'/index.php/ru/show/categoryposts/30/%D0%A0%D1%8B%D0%B1%D1%8B' => 'Бесплатные объявления купить и продать рыбок для аквариума в Израиле',
'/index.php/ru/show/categoryposts/31/%D0%97%D0%BE%D0%BE%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B' => 'Бесплатные объявления купить и продать зоотовары в Израиле',
'/index.php/ru/show/categoryposts/44/%D0%9F%D1%82%D0%B8%D1%86%D1%8B' => 'Бесплатные объявления купить и продать домашних и экзотических птиц в Израиле',
'/index.php/ru/show/categoryposts/46/%D0%A0%D0%B5%D0%BF%D1%82%D0%B8%D0%BB%D0%B8%D0%B8' => 'Бесплатные объявления купить и продать рептилий в Израиле',
'/index.php/ru/show/categoryposts/45/%D0%94%D1%80%D1%83%D0%B3%D0%B8%D0%B5-%D0%B6%D0%B8%D0%B2%D0%BE%D1%82%D0%BD%D1%8B%D0%B5' => 'Бесплатные объявления купить и продать других животных в Израиле',
// Требуется помощь
'/index.php/ru/show/categoryposts/2/%D0%A2%D1%80%D0%B5%D0%B1%D1%83%D0%B5%D1%82%D1%81%D1%8F-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C' => 'Бесплатные объявления требуется помощь в Израиле',
'/index.php/ru/show/categoryposts/161/%D0%A4%D1%96%D0%BD%D0%B0%D0%BD%D1%81%D0%BE%D0%B2%D0%B0-%D0%B4%D0%BE%D0%BF%D0%BE%D0%BC%D0%BE%D0%B3%D0%B0' => 'Бесплатные объявления требуется финансовая помощь в Израиле',
'/index.php/ru/show/categoryposts/14/%D0%9C%D0%B5%D0%B4%D0%B8%D1%86%D0%B8%D0%BD%D1%81%D0%BA%D0%B0%D1%8F-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C' => 'Бесплатные объявления требуется медицинская помощь в Израиле',
'/index.php/ru/show/categoryposts/15/%D0%9F%D1%80%D0%BE%D0%B4%D1%83%D0%BA%D1%82%D1%8B-%D0%BF%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F' => 'Бесплатные объявления требуется помощь продукты питания в Израиле',
'/index.php/ru/show/categoryposts/160/%D0%92%D0%B5%D1%89%D0%B5%D0%B2%D0%B0%D1%8F-%D0%BF%D0%BE%D0%BC%D0%BE%D1%89%D1%8C' => 'Бесплатные объявления требуется вещевая помощь одеждой и обувью в Израиле',
'/index.php/ru/show/categoryposts/16/%D0%94%D1%80%D1%83%D0%B3%D0%BE%D0%B5' => 'Бесплатные объявления требуется другая помощь в Израиле',
// Отдам даром
'/index.php/ru/show/categoryposts/43/%D0%9E%D1%82%D0%B4%D0%B0%D0%BC-%D0%B4%D0%B0%D1%80%D0%BE%D0%BC' => 'Бесплатные объявления отдам даром в Израиле',
'/index.php/ru/show/categoryposts/152/%D0%96%D0%B8%D0%B2%D0%BE%D1%82%D0%BD%D1%8B%D0%B5' => 'Бесплатные объявления отдам даром животное в Израиле',
'/index.php/ru/show/categoryposts/153/%D0%9C%D0%B5%D0%B1%D0%B5%D0%BB%D1%8C' => 'Бесплатные объявления отдам даром мебель в Израиле',
'/index.php/ru/show/categoryposts/154/%D0%9E%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-%D0%B8-%D0%BE%D0%B1%D1%83%D0%B2%D1%8C' => 'Бесплатные объявления отдам даром одежду и обувь в Израиле',
'/index.php/ru/show/categoryposts/155/%D0%AD%D0%BB%D0%B5%D0%BA%D1%82%D1%80%D0%BE%D0%BD%D0%B8%D0%BA%D0%B0' => 'Бесплатные объявления отдам даром электронику в Израиле',
'/index.php/ru/show/categoryposts/156/%D0%94%D0%B5%D1%82%D1%81%D0%BA%D0%B8%D0%B5-%D1%82%D0%BE%D0%B2%D0%B0%D1%80%D1%8B' => 'Бесплатные объявления отдам даром детские товары в Израиле',
'/index.php/ru/show/categoryposts/157/%D0%91%D1%83%D0%B4%D0%B8%D0%BD%D0%BE%D0%BA-%D1%96-%D1%81%D0%B0%D0%B4' => 'Бесплатные объявления отдам даром товары для дома и сада в Израиле',
'/index.php/ru/show/categoryposts/158/%D0%91%D0%B8%D0%B7%D0%BD%D0%B5%D1%81-%D0%B8-%D1%83%D1%81%D0%BB%D1%83%D0%B3%D0%B8' => 'Бесплатные объявления отдам даром бизнес и услуги в Израиле',
'/index.php/ru/show/categoryposts/159/%D0%A5%D0%BE%D0%B1%D0%B1%D0%B8,-%D0%BE%D1%82%D0%B4%D1%8B%D1%85-%D0%B8-%D1%81%D0%BF%D0%BE%D1%80%D1%82' => 'Бесплатные объявления отдам даром товары для хобби, отдыха и спорта в Израиле',
);
echo isset($arr[$_SERVER['REQUEST_URI']]) ? $arr[$_SERVER['REQUEST_URI']] : '';?>
<?php $arr = array(
// Города
'/index.php/ru/location-posts/556/city/%D0%98%D0%B5%D1%80%D1%83%D1%81%D0%B0%D0%BB%D0%B8%D0%BC' => 'Бесплатные частные объявления Иерусалима, подать без регистрации', 
);
echo isset($arr[$_SERVER['REQUEST_URI']]) ? $arr[$_SERVER['REQUEST_URI']] : get_location_name_by_id($location_id);?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo $meta_desc; ?>">

    <link rel="icon" type="image/png" href="<?php echo theme_url();?>/assets/img/favicon.png">
    <?php require_once 'includes_top.php'; ?>

    <?php

    $top_bar_bg_color = get_settings('banner_settings', 'top_bar_bg_color', '#fdfdfd');

    $bg_color = get_settings('banner_settings', 'menu_bg_color', '#ffffff');

    $text_color = get_settings('banner_settings', 'menu_text_color', '#666');

    $active_text_color = get_settings('banner_settings', 'active_menu_text_color', '#32c8de');

    ?>

<style>
    .top-bar{
        background: <?php echo $top_bar_bg_color;?>; 
    }
    
    .header-2{
        background: <?php echo $bg_color;?>; 
    }
    .header-2 .navy > ul > li > ul{
        background: <?php echo $bg_color;?>; 
        
    }
    .header-2 .navy > ul > li > a{
        color: <?php echo $text_color;?>
    }
    .header-2 .navy ul ul li a{
        color: <?php echo $text_color;?>        
    }
   .header-2 .navy > ul > li > a:hover{
        color: <?php echo $active_text_color;?>
    }
    .header-2 .navy ul ul li a:hover{
        color: <?php echo $active_text_color;?>        
    }
    .header-2 .navy > ul > .active > a{
        color: <?php echo $active_text_color;?>
    }
    .header-2 .navy ul ul .active a{
        color: <?php echo $active_text_color;?>        
    }

    .real-estate .re-big-form{
        padding: 15px 0 0 0;
        <?php 
        if(get_settings('banner_settings','show_bg_image','0')==1)
        {
        ?>
        background: <?php echo get_settings('banner_settings','search_panel_bg_color','#222222')?> url(<?php echo base_url('uploads/banner/'.get_settings('banner_settings','search_bg','heading-back.jpg'));?>) center center no-repeat fixed;
        <?php 
        }else{
        ?>
        background: <?php echo get_settings('banner_settings','search_panel_bg_color','#222222')?>;        
        <?php    
        }
        ?>
    }
</style>

<script type="text/javascript">var old_ie = 0;var rtl=false;</script>
<!--[if lte IE 8]> <script type="text/javascript"> old_ie = 1; </script> < ![endif]-->

</head>



<?php
$CI = get_instance();
$curr_lang = get_current_lang();
if($curr_lang=='ar' || $curr_lang=='fa' || $curr_lang=='he' || $curr_lang=='ur')
{
    $rtl = true;
?>
<script type="text/javascript">rtl=true;</script>
<link rel="stylesheet" href="<?php echo theme_url();?>/assets/css/rtl-fix.css">
<body class="home" dir="rtl">
<?php 
}else{
?>
<body class="home" dir="<?php echo get_settings('site_settings','site_direction','ltr');?>">
<?php 
}
?>

<!-- Outer Starts -->
<div class="outer">
<?php require_once 'header.php'; ?>

    <?php 
    if($alias=='home')
    {
        $banner_active = get_settings('classified_settings', 'show_home_page_banner', 'yes');

        if($banner_active == 'yes')
        {
            if(constant("ENVIRONMENT")=='demo')
                $banner_type = (isset($banner_type))?$banner_type:get_settings('banner_settings','banner_type','Layer Slider');
            else
                $banner_type = get_settings('banner_settings','banner_type','Layer Slider');

            if($banner_type == 'Parallax Slider'){
                require_once 'slider_view.php';
            }
            else if($banner_type == 'Layer Slider'){
                require_once 'layer_slider.php';
            }
            else{
                require_once 'map_view.php';
            }
        }

    }
    ?>
<!-- Main content starts -->
<div class="main-block">
    <?php echo (isset($content))?$content:'';?>
</div>

<!-- Main content ends -->
<?php require_once 'footer.php'; ?>


</div>
<?php require_once 'includes_bottom.php'; ?>

</body>

</html>