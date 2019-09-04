<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel-Markdoc</title>
  <link href="/vendor/markdoc/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
  <link href="/vendor/markdoc/css/font-awesome.css?v=4.4.0" rel="stylesheet">
  <link href="/vendor/markdoc/css/plugins/jsTree/style.min.css" rel="stylesheet">
  <link href="/vendor/markdoc/css/animate.min.css" rel="stylesheet">
  <link href="/vendor/markdoc/css/style.min.css?v=4.1.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row"> 

    <div class="col-sm-3">
      <div class="ibox float-e-margins">
        <div class="ibox-title"><h5>Navigator</h5></div>
        <div class="ibox-content"> <div id="jstree1"></div> </div>
      </div>
    </div><!-- end of col of tree -->

    <div class="col-xs-9">
      <div class="ibox float-e-margins">
        <div class="ibox-title"><h5>Content</h5></div>
        <div class="ibox-content" style="min-height:500px;">
        <p id="md-content"> aabbcc </p>
        </div>
      </div>
    </div>

</div><!-- end of row & col -->




</div><!-- end of wrapper -->
<script src="/vendor/markdoc/js/jquery.min.js?v=2.1.4"></script>
<script src="/vendor/markdoc/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/vendor/markdoc/js/plugins/jsTree/jstree.min.js"></script>
<script src="/vendor/markdoc/js/plugins/markdownit/markdown-it.js"></script>
<style>
.jstree-open > .jstree-anchor > .fa-folder:before {
  content: "\f07c";
}
.jstree-default .jstree-icon.none {
  width: 0;
}

pre{
    background-color:#fff;
    border:none;
}
code{
    background-color:#fff;
    border:none;
}
</style>

<script>
md = window.markdownit();

function refreshContent(filePath){
    $.get('/markdoc/getcontent?path='+filePath).then(function(d){
        var resp = JSON.parse(d);
        var result = md.render(resp.data.content);
        $('#md-content').html(result);
    });
}

$(document).ready(function () {
    var result = md.render('<?php echo $welcome;?>');
    $('#md-content').html(result);

    $('#jstree1')
    .jstree({
        'core': { 'data': <?php echo $folderFiles;?>, }
    })
    .on('changed.jstree', function(e, data){
        var fullPath = data.node.a_attr.full_path;
        refreshContent(fullPath);
    });

});//end of ready function 
</script>
</body>
</html>
