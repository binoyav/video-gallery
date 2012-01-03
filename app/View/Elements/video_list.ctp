<ul class="cat-list">
  <?php
    if (!empty($videos)):
  ?>
    <?php 
      foreach ($videos as $video): 
    ?>
				<li>
				  <a href="#" id="<?php echo $video['Video']['id'] ; ?>">
				    <?php echo $video['Video']['title'] ; ?>
				  </a>
				</li>
    <?php 
      endforeach;
    else:
      echo '<li>' . __('No videos found') . '</li>';
    endif;
 ?>
</ul>
<?php
echo $this->Paginator->options(array(
          'update' => '#video-list',
          'evalScripts' => true,
          'url' => array(
            'controller' => 'videos',
            'action' => 'getVideoList',
            'q' => $search,
            'genre' => $selGenreId,
            'language' => $selLangId,
          ),
        )
      );

      echo $this->Paginator->numbers(array(
        'separator' => '&nbsp;'
        )
      );
?>      
<?php echo $this->Js->writeBuffer(); ?>