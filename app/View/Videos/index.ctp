<div id="page-wrap">

  <div class="searchbox">
    <?php 
      echo $this->Form->create('Video', array(
                                              'class' => 'searchform',
                                              'id' => 'searchForm',
                                              'type' => 'get'
                                            )
                                  );
      $search = __('Search...');

      if (isset($this->request->named['q']) || isset($this->request->query['q'])):
        $search = isset($this->request->named['q']) ? $this->request->named['q'] : 
                                                    $this->request->query['q'];
      endif;
      
      echo $this->Form->input('q', array(
                                          'id' => 'searchField',
                                          'class' => 'searchfield',
                                          'default' => $search,
                                          'div' => false,
                                          'label' => false
                                       )
                                 );
    ?>
      <input class="searchbutton" id="searchButton" value="Go" type="button">
    </form>
  </div>

	<div class="page-title">
		<h1><?php echo __('Our Video Gallery'); ?></h1>
	</div>
	<ul id="portfolio-filter" class="gallery-filter">
		<li>Filter:</li>
		<li>
			<?php echo $this->Html->link(__('All'), array(
                                                  'controller' => 'videos', 
                                                  'action' => 'index',
                                                  'genre' => ''
                                                )
                                    ); 
        ?>
		</li>
		<?php 
      foreach ($genres as $genreId => $genreName):
        $class = '';
	      if ($selGenreId == $genreId):
          $class = 'current-menu-item'; 
        endif;      
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
		<li>Filter:</li>
		<li>
			<?php 
        echo $this->Html->link(__('All'), array(
                                             'controller' => 'videos', 
                                             'action' => 'index',
                                             'language' => ''
                                          )
                                    ); 
        ?>
		</li>
		<?php 
      foreach ($languages as $langId => $lang):
        $class = '';
        if ($selLangId == $langId):
          $class = 'current-menu-item'; 
        endif;
    ?>
		<li <?php echo 'class="' . $class . '"'; ?>>
			<?php 
        echo $this->Html->link($lang, array(
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
			<h6 class="side-title">
				<?php echo __('Videos'); ?>
			</h6>
			<div id="video-list">
				<?php echo $this->element('video_list'); ?>
			</div>
		</div>
	</div>
	<div id="side-content">
		<?php echo $this->element('video'); ?>
	</div>
	<div class="clear"></div>
</div>
<?php echo $this->Html->script('video'); ?>
