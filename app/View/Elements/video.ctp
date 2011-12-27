<?php
if (!empty($selectedVideo)): 
?>
  <div class="video">
    <p>
      <strong>
        <?php echo $selectedVideo['Video']['title']; ?>
      </strong>
    </p>
    <?php 
      echo $this->Html->image('../files/' . $selectedVideo['Video']['thumbnail'], 
                                array(
                                  'width' => 500,
                                  'height' => 305
                                )
                             ); 
    ?>
    <p>
      <?php echo $selectedVideo['Video']['description']; ?>
    </p>
  </div>
  
  <div class="comments">
    <h5>
      Comments
    </h5>
    <span id="loginMessage" class="inv">
      <?php echo __('Please %s to post comments.', 
                  $this->Html->link(__('login'),array(
                                                  'controller' => 'users',
                                                  'action' => 'login'
                                                )
                                    )
                 ); 
      ?>
    </span>
    <div id="commentForm">
      <div id="commentMsg"></div>
	    <?php 
        echo $this->Form->create('Comment', array('id' => 'frmComment'));
	      echo $this->Form->input('description', array(
                                                    'type' => 'textarea',
                                                    'id' => 'commentDescription'
                                                  )
                                    );
        echo $this->Form->input('Comment.video_id', array(
                                                          'value' => $videoId,
                                                          'type' => 'hidden'
                                                        )
                                   ); 
      ?>
      <br />
	    <input name="" type="button" id="btnAddComment" value="submit" />
      </form>
    </div>
  </div>
  
  <div class="reviews">
    <?php 
    if (!empty($selectedVideoComments)):
      foreach ($selectedVideoComments as $videoComment):
    ?>  
        <p>
          <span class="profilename">
            <?php echo h($videoComment['User']['name']); ?>
          </span>
          <br />
          <?php echo h($videoComment['Comment']['description']); ?>
          <br />
          <span class="profile-post-time">
            <?php echo h($videoComment['Comment']['created']); ?>
          </span>                    
        </p>
    <?php 
      endforeach;
     endif;
    ?>
  </div>
<?php
endif;
?>