<?php 
 ?>
    <div id="page-wrapper">
    
        <div id="header-wrapper">
            <div id="header">
                    
       
                
                <div style="clear:both"></div>
                
                <div id="menu-and-search">
                    
                    <div id="menu-left"></div>

                    <div class="menu-wrapper">
                                    
                                    <div id="home-link" style="float:left;"> 
                                        <a href="<?php print $base_path ?>" title="<?php print t('home') ?>" > <img src="<?php print $base_path . $directory; ?>/images/home.png" alt="<?php print t('home') ?>" /> </a>
                                    </div>
                                    
                                  <!--
  <?php if ($main_menu || $page['superfish_menu']): ?>
                                        <div id="<?php print $main_menu ? 'nav': 'superfish'; ?>">
                                            <div id="menu-separator"></div>
                                             <?php 
                                                if ($main_menu):
                                                print theme('links__system_main_menu', array('links' => $main_menu));
                                                elseif (!empty($page['superfish_menu'])):
                                                print render($page['superfish_menu']);
                                                endif;
                                             ?>
                                        </div>
                                    <?php endif; ?>
-->


         <div id="user-menu-and-feed">
                    
                    <div id="user-menu">
                      
                            <?php global $user;
                                if ($user->uid != 0):
                $user = user_load($user->uid);



                                    print '<div id="user-menu-block">';
                                    print '<div id="user-menu-user">' . ' <a href="' . url('user/' . $user->uid) . '">' . $user->name . '</a></div>';
                                    print '<div id="user-menu-avatar">';
                                        if($user->picture){
                                        print theme_image_style(
                                            array(
                                                'style_name' => 'user_avatar_header',
                                                'path' => $user->picture->uri,
                                                //'alt' =>  $alt,
                                                'width' => NULL,
                                                'height' => NULL,
                                                'attributes' => array(
                                                                    'class' => 'avatar'
                                                                )            
                                                )
                                        ); 
                                        }else{
                                            print '<div id="user-menu-user">' . ' <a href="' . url('user/' . $user->uid) . '">' . '<img src="' . $base_path . 'sites/all/themes/whitebull/images/no-avatar-header.png" /></a></div>';
                                        }     

                                        print '</div></div>';
                                    // print '<li class="last"> <a href="' . url('user/logout') . '">' . t('logout') . '</a></li>';
                                    print theme('links__system_secondary_menu',
                                        array(
                                          'links' => $secondary_menu,
                                          'attributes' => array(
                                            'id' => 'user-menu-items',
                                            'class' => array('links', 'clearfix'
                                                )
                                            )
                                          )
                                        );
                                else:
                                    print '<div class="login">' . t('login is ') . ' <a href="' . url('user') . '">' . t('here') . '</a></div>';
                                    print '<div class="register"> <a href="' . url('user/register') . '">' . t('register') . '</a></div>';
                                    endif;
                            ?>                
                        
                    </div><!--end of user-menu-->
                    
                    <?php if ($feed_icons): ?>
                        <div class="feed-wrapper">
                            <?php print $feed_icons; ?>
                        </div>
                    <?php endif; ?>
                
                </div>

                                        
                                <?php if ($page['search_box']): ?>
                                    <div id="search-box">
                                        <?php print render($page['search_box']); ?>
                                    </div>
                                <?php endif; ?>                                                                
                    </div>
                    
                    <div id="menu-right"></div>
                    
                </div>
                
            </div>
        </div>
           
        <div id="container-wrapper">
                               
                    <?php if ($breadcrumb): ?>
                        <?php if(!$is_front): ?>
                            <div id="breadcrumb">
                                <?php print $breadcrumb; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                                <div id="container-outer">    
                    
                <div class="top-shadow"></div>        
                <div class="middle-shadow">
                
                
            
                <div class="middle-fix">
                                    
                    <?php if ($page['sidebar_first']): ?>
                        <div id="sidebar-left-wrapper">
                                <div id="sidebar-left" class="sidebar">
                                    <?php print render($page['sidebar_first']); ?>
                                </div>
                        </div>    
                    <?php endif; ?><!--end of sidebar left-->
                                               
                    <div id="main-content">
                        
                        <?php if ($page['content_top']): ?><div id="content-top"><?php print render($page['content_top']); ?></div><?php endif; ?>
                        <?php if ($show_messages): print $messages; endif;?>
                        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                        <?php if ($title): ?><h1 class="title"><?php print render($title_suffix); ?></h1><?php endif; ?>
                        <?php print render($page['help']); ?>
                        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                        <?php if ($page['content']): ?><div id="content-middle"><?php print render($page['content']); ?></div><?php endif; ?>
                        <?php if ($page['content_bottom']): ?><div id="content-bottom"><?php print render($page['content_bottom']); ?></div><?php endif; ?>

                    </div>
                    
                        
                    <?php if ($page['sidebar_second']): ?>
                        <div id="sidebar-right-wrapper">
                                <div id="sidebar-right" class="sidebar">
                                    <?php print render($page['sidebar_second']); ?>
                                </div>    
                        </div>
                    <?php endif; ?><!--end of sidebar right-->
                    
                </div><!--end of middle fix-->
                    <div style="clear:both"></div>
                </div><!--end of middle shadow-->
                <div class="bottom-shadow"></div>
                    
            </div>    

        </div><!--end of conteiner wrapper-->        

        
            <?php if($page['bottom_first'] || $page['bottom_middle'] || $page['bottom_last']): ?>        
        <div id="bottom-teaser">

            <div class="top-shadow"></div>
            <div class="middle-shadow">
            <div class="middle-fix">
                
                <div class="triplet-wrapper in<?php print (bool) $page['bottom_first'] + (bool) $page['bottom_middle'] + (bool) $page['bottom_last']; ?>">
                <div class="separator-fix">
                                
                <?php if($page['bottom_first']): ?>
                    <div class="column A">
                        <?php print render($page['bottom_first']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if($page['bottom_middle']): ?>
                    <div class="column B">
                        <?php print render($page['bottom_middle']); ?>
                    </div>
                <?php endif; ?>
          
                <?php if($page['bottom_last']): ?>
                    <div class="column C">
                        <?php print render($page['bottom_last']); ?>
                    </div>
                <?php endif; ?>
                
                <div style="clear:both"></div>
                </div><!--end of separator fix-->
                </div>
            
            </div><!--end of middle fix-->
                <div style="clear:both"></div>
            </div><!--end of middle shadow-->    
            <div class="bottom-shadow"></div>
                        
        </div><!--end of bottom teaser-->
            <?php endif; ?>

            
            <?php if($page['bottom_1'] || $page['bottom_2'] || $page['bottom_3'] || $page['bottom_note']): ?>
        <div id="bottom-wrapper">
            
            <div class="top-shadow"></div>
            <div class="middle-shadow">    
            <div class="middle-fix">
            
                <div class="triplet-wrapper in<?php print (bool) $page['bottom_1'] + (bool) $page['bottom_2'] + (bool) $page['bottom_3']; ?>">
                <div class="separator-fix">    
                
                <?php if($page['bottom_1']): ?>
                    <div class="column A">
                        <?php print render($page['bottom_1']); ?>
                    </div>
                <?php endif; ?>
          
                <?php if($page['bottom_2']): ?>
                    <div class="column B">
                        <?php print render($page['bottom_2']); ?>
                    </div>
                <?php endif; ?>
          
                <?php if($page['bottom_3']): ?>
                    <div class="column C">
                        <?php print render($page['bottom_3']); ?>
                    </div>
                <?php endif; ?>
                        
                <div style="clear:both"></div>
                </div><!--end of separatir fix-->
                </div>
                
                <?php if($page['bottom_note']): ?>
                    <div class="bottom-note note">
                        <?php print render($page['bottom_note']); ?>
                    </div>
                <?php endif; ?>
                
            </div><!--end of middle fix-->    
                <div style="clear:both"></div>
            </div><!--end of middle shadow-->
            <div class="bottom-shadow"></div>
            
        </div><!--end of bottom wrapper-->
            <?php endif; ?>
                                     
        <div id="footer">

            <?php if($page['footer_note']): ?>
                <div class="footer-note note footer-message">
                    <?php print render($page['footer_note']); ?>
                </div>
            <?php endif; ?>
            
            
                                    <div style="clear:both"></div>

            <div class="footer">
                <?php print render($page['footer']); ?>
            </div>
                
            <div id="notice">
                <div class="notice" style="font-size:11px;font-style: italic;float: left;margin-left: 2px;">Copyright 2012 spaceblues.com</div>
            </div>
            
            <div style="clear:both"></div>
            
        </div><!--end of footer-->

    </div>
