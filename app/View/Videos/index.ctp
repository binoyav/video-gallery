<div id="page-wrap">
  <div class="page-title"><h1>Our Video Gallery</div>
  <ul id="portfolio-filter" class="gallery-filter">
	  <li>Filter: </li>
	  <li><?php echo $this->Html->link(__('All'), array(
                                                  'controller' => 'videos', 
                                                  'action' => 'index',
                                                  'genre' => ''
                                                )
                                    ); 
        ?>
    </li>
	  <?php foreach ($genres as $genreId => $genreName):
             $class = '';
	           if ($selGenreId == $genreId)
             { 
               $class = 'gallery-filter-hover'; 
             } 
	  ?>
	  <li>
	     <?php echo $this->Html->link($genreName, array(
                                                  'controller' => 'videos', 
                                                  'action' => 'index', 
                                                  'genre' => $genreId,
                                                ),
                                                array(
                                                  'class' => $class
                                                )
                                   );
      ?>
    </li>
	  <?php endforeach; ?>
  </ul>
  <div class="clear"></div>
  <ul class="gallery-filter">
    <li>Filter: </li>
    <li><?php echo $this->Html->link(__('All'), array(
                                                  'controller' => 'videos', 
                                                  'action' => 'index',
                                                  'language' => ''
                                                )
                                    ); 
        ?>
    </li>
    <?php foreach ($languages as $langId => $lang):
            $class = '';
            if ($selLangId == $langId)
            { 
              $class = 'gallery-filter-hover'; 
            }
    ?>
    <li><?php echo $this->Html->link($lang, array(
                                             'controller' => 'videos', 
                                             'action' => 'index', 
                                             'language' => $langId
                                           ),
                                            array(
                                              'class' => $class
                                            )
                                      ); 
         ?>
    </li>
    <?php endforeach; ?>
  </ul>
	<div class="clear"></div>
  <div id="sidebar">
     <div class="sideblock">
       <h6 class="side-title"><?php echo __('Videos'); ?></h6>
       <ul class="cat-list">
       <?php
         if (!empty($videos)):
       ?>
           <?php foreach ($videos as $video): ?>
           <li><a href="#" id="<?php echo $video['Video']['id'] ; ?>">
                 <?php echo $video['Video']['title'] ; ?>
               </a>
           </li>
          <?php 
                 endforeach;
           ?>
         
         <?php         
           else:
              echo '<li>' . __('No videos found') . '</li>';
            endif;
          ?>
        </ul>
      </div>
	  </div>
		<div id="side-content">
		  <?php echo $this->element('video'); ?>
		</div>
		<div class="clear"></div>
  </div>
</div>
<?php echo $this->Html->script('video'); ?>