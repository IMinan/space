<?php include '../theme/header.php'; // header.php ?>
  <?php include '../theme/sidebar.php'; // header.php ?>

  <div class="content-wrapper">
    <div class="area">
      <?php echo get_editor_script(); ?>
      <style media="screen">body{overflow: hidden; width: 100%; height: 100%;}</style>

      <?php if(isset($_GET['file'])){ $file = $_GET['file']; ?>

       <script type="text/javascript">
          var mixedMode = {
            name: "<?php echo codeMirror_script($_GET['file']); ?>",
            scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
             mode: null},
            {matches: /(text|application)\/(x-)?vb(a|script)/i,
             mode: "vbscript"}]
          };
        </script>

      <form class="" action="save_file.php" method="post">
        <div class="area-header">
          <span><a target="_blank" href="<?php echo $_GET['file'];?>" class="CGREEN" data-toggle="tooltip" data-placement="top" title="<?php echo $_GET['file'];?>">Chrome PAGE</a></span>
          <span class="pull-right arrows" id="plus"><a href="#"><i class="fa fa-search-plus"></i></a></span>
          <span class="pull-right arrows" id="minus"><a href="#"><i class="fa fa-search-minus"></i></a></span>
        </div><!--/ .area-header /-->
        <input id="file_way" type="text" value="<?php echo $_GET['file']; ?>" name="file_way" class="hidden">

        <article>
          <textarea style='margin: 0; background: #222d32; z-index: -2; display: block; opacity: 0; line-height: 0; border: 0; background: #222; padding: 0;' id="code" rows="8" cols="40" name="code"><?php code_install($file); ?></textarea>
        </article>
      </form>
      <?php  } ?>
    </div><!--/ .area /-->
  </div><!--/ .content-wrapper /-->
<?php include '../theme/footer.php'; // footer.php ?>
