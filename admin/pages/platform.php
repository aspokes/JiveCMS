
<?php 
include 'template/page-header.php';
include 'template/page-navigation.php';
?>

<form name="myform" id="myform" method="post" action="#" data-toggle="validator" role="form" enctype="multipart/form-data" autocomplete="off">
    <input id="view" name="view" value="" type="hidden" />
    <input id="viewpage" name="viewpage" value="" type="hidden" />
    <input id="keys" name="keys" value="" type="hidden" />
    <input id="data" name="data" value="" type="hidden" />
    <input id="microtime" name="microtime" value="<?php echo md5(microtime()); ?>" type="hidden" />

    <?php
    $engine = new EngineClass();
    switch($pg) {
        case md5('sitecontacts'):
            include 'sitecontacts/platform.php';
        break;
        case md5('sitepages'):
            include 'sitepages/platform.php';
        break;
        case md5('siteposts'):
            include 'siteposts/platform.php';
        break;
        case md5('sitevideoposts'):
            include 'sitevideoposts/platform.php';
        break;
        case md5('siteecommerce'):
            include 'siteecommerce/platform.php';
        break;
        case md5('sitemedia'):
            include 'sitemedia/platform.php';
        break;

        case md5('sitetemplate'):
            include 'sitetemplate/platform.php';
        break;
        
        case md5('sitesettings'):
            include 'sitesettings/platform.php';
        break;

        case md5('sitesocialportal'):
            include 'sitesocialportal/platform.php';
        break;
        
        default:
            include 'dashboard/platform.php';
        break;
    }
    ?>
</form>
<?php include 'template/page-footer.php';?>