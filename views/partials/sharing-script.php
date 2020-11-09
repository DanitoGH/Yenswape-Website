<?php
foreach($single_item as $item):?>
<?php $get_uri = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));?>
<?php $images = App::get('database')->singleImage($item->custom_id); ?>
<?php foreach ($images as $image) {} ?>
<meta property="og:url"           content="https://www.yenswape.com<?php echo $get_uri;?>" />
<meta property="og:type"          content="https://www.yenswape.com" />
<meta property="og:title"         content="<?php echo $item->title; ?>" />
<meta property="og:description"   content="<?php echo $item->description; ?>" />
<meta property="og:image"         content="https://www.yenswape.com/../images/user-submitted/thumb/<?php echo $image->images;?>" />
<?php endforeach; ?>
